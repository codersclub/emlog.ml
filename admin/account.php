<?php

/**
 * account administration
 * @package EMLOG
 * @link https://www.emlog.net
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once '../init.php';

/*vot*/ load_language('admin');

$sta_cache = $CACHE->readCache('sta');
$user_cache = $CACHE->readCache('user');
$action = Input::getStrVar('action');
$admin_path_code = Input::getStrVar('s', '');
$User_Model = new User_Model();

// Account has been deactivated
if ($action == 'signin') {
    loginAuth::checkLogged();
    if (defined('ADMIN_PATH_CODE') && $admin_path_code !== ADMIN_PATH_CODE) {
        show_404_page(true);
    }
    $login_code = Option::get('login_code') === 'y';
    $is_signup = Option::get('is_signup') === 'y';

    $page_title = lang('login');
    require_once View::getAdmView('user_head');
    require_once View::getAdmView('signin');
    View::output();
}

// Login verification
if ($action == 'dosignin') {
    loginAuth::checkLogged();
    if (defined('ADMIN_PATH_CODE') && $admin_path_code !== ADMIN_PATH_CODE) {
        show_404_page(true);
    }
    $username = Input::postStrVar('user');
    $password = Input::postStrVar('pw');
    $persist = Input::postIntVar('persist');
    $resp = Input::postStrVar('resp'); // eg: json (only support json now)
    $login_code = Option::get('login_code') === 'y' ? strtoupper(Input::postStrVar('login_code')) : '';

    if (!User::checkLoginCode($login_code)) {
        if ($resp === 'json') {
            Output::error(lang('auth_error'));
        }
        emDirect('./account.php?action=signin&err_ckcode=1');
    }

    $uid = LoginAuth::checkUser($username, $password);
    switch ($uid) {
        case $uid > 0:
            Register::isRegServer();
            $User_Model->updateUser(['ip' => getIp()], $uid);
            LoginAuth::setAuthCookie($username, $persist);
            doAction('login_succeed', $uid, $resp);
            if ($resp === 'json') {
                Output::ok();
            }
            emDirect("./");
            break;
        case LoginAuth::LOGIN_ERROR_USER:
        case LoginAuth::LOGIN_ERROR_PASSWD:
            doAction('login_fail');
            if ($resp === 'json') {
                Output::error(lang('wrong_user_password'));
            }
            emDirect("./account.php?action=signin&err_login=1");
            break;
        case LoginAuth::LOGIN_ERROR_FORBID:
            doAction('login_fail');
            if ($resp === 'json') {
                Output::error(lang('account_deactivated'));
            }
            emDirect("./account.php?action=signin&err_forbid=1");
            break;
    }
}

// Registration Page
if ($action == 'signup') {
    loginAuth::checkLogged();
    $login_code = Option::get('login_code') === 'y';
    $email_code = Option::get('email_code') === 'y';
    $error_msg = '';

    if (Option::get('is_signup') !== 'y') {
        emMsg(lang('registration_disabled'));
    }

    $page_title = lang('account_register');
    include View::getAdmView('user_head');
    require_once View::getAdmView('signup');
    View::output();
}

// Registration Verification
if ($action == 'dosignup') {
    loginAuth::checkLogged();

    if (Option::get('is_signup') !== 'y') {
        return;
    }

    $mail = Input::postStrVar('mail');
    $passwd = Input::postStrVar('passwd');
    $repasswd = Input::postStrVar('repasswd');
    $login_code = strtoupper(Input::postStrVar('login_code'));
    $mail_code = Input::postStrVar('mail_code');
    $resp = Input::postStrVar('resp'); // eg: json (only support json now)

    if (!checkMail($mail)) {
        if ($resp === 'json') {
            Output::error(lang('email_format_error'));
        }
        emDirect('./account.php?action=signup&error_login=1');
    }
    if (!User::checkLoginCode($login_code)) {
        if ($resp === 'json') {
            Output::error(lang('captcha_error'));
        }
        emDirect('./account.php?action=signup&err_ckcode=1');
    }
    if (Option::get('email_code') === 'y' && !User::checkMailCode($mail_code)) {
        if ($resp === 'json') {
            Output::error(lang('verification_error'));
        }
        emDirect('./account.php?action=signup&err_mail_code=1');
    }
    if ($User_Model->isMailExist($mail)) {
        if ($resp === 'json') {
            Output::error(lang('email_in_use'));
        }
        emDirect('./account.php?action=signup&error_exist=1');
    }
    if (strlen($passwd) < 5) {
        if ($resp === 'json') {
            Output::error(lang('password_short'));
        }
        emDirect('./account.php?action=signup&error_pwd_len=1');
    }
    if ($passwd !== $repasswd) {
        if ($resp === 'json') {
            Output::error(lang('password_not_equal'));
        }
        emDirect('./account.php?action=signup&error_pwd2=1');
    }

    $PHPASS = new PasswordHash(8, true);
    $passwd = $PHPASS->HashPassword($passwd);

    $uid = $User_Model->addUser('', $mail, $passwd, User::ROLE_WRITER);
    $CACHE->updateCache(['sta', 'user']);

    doAction('register_succeed', $uid);

    if ($resp === 'json') {
        Output::ok();
    }
    emDirect("./account.php?action=signin&succ_reg=1");
}

if ($action == 'send_email_code') {
    $mail = Input::postStrVar('mail');

    if (!checkMail($mail)) {
        Output::error(lang('email_wrong'));
    }

    doAction('send_email_code', $mail);

    $ret = Notice::sendVerifyMailCode($mail);
    if ($ret) {
        Output::ok();
    } else {
        Output::error(lang('test_mail_failed'));
    }
}

if ($action == 'reset') {
    if (ISLOGIN === true) {
        emDirect("../admin/");
    }

    $login_code = Option::get('login_code') === 'y';
    $error_msg = '';

    $page_title = lang('retrieve_password');
    include View::getAdmView('user_head');
    require_once View::getAdmView('reset');
    View::output();
}

if ($action == 'doreset') {
    loginAuth::checkLogged();

    $mail = Input::postStrVar('mail');
    $login_code = strtoupper(Input::postStrVar('login_code'));
    $resp = Input::postStrVar('resp'); // eg: json (only support json now)

    if (!User::checkLoginCode($login_code)) {
        if ($resp === 'json') {
            Output::error(lang('captcha_error'));
        }
        emDirect('./account.php?action=reset&err_ckcode=1');
    }
    if (!$mail || !$User_Model->isMailExist($mail)) {
        if ($resp === 'json') {
            Output::error(lang('email_invalid'));
        }
        emDirect('./account.php?action=reset&error_mail=1');
    }

    $ret = Notice::sendResetMailCode($mail);
    if ($ret) {
        if ($resp === 'json') {
            Output::ok();
        }
        emDirect("./account.php?action=reset2&succ_mail=1");
    } else {
        if ($resp === 'json') {
            Output::error(lang('email_send_error'));
        }
        emDirect("./account.php?action=reset&error_sendmail=1");
    }
}

if ($action == 'reset2') {
    if (ISLOGIN === true) {
        emDirect("../admin/");
    }

    $login_code = Option::get('login_code') === 'y';
    $error_msg = '';

    $page_title = lang('retrieve_password');
    include View::getAdmView('user_head');
    require_once View::getAdmView('reset2');
    View::output();
}

if ($action == 'doreset2') {
    $mail_code = Input::postStrVar('mail_code');
    $passwd = Input::postStrVar('passwd');
    $repasswd = Input::postStrVar('repasswd');
    $resp = Input::postStrVar('resp'); // only json

    if (strlen($passwd) < 6) {
        if ($resp === 'json') {
            Output::error(lang('password_length_invalid'));
        }
        emDirect('./account.php?action=reset2&error_pwd_len=1');
    }
    if ($passwd !== $repasswd) {
        if ($resp === 'json') {
            Output::error(lang('password_not_equal'));
        }
        emDirect('./account.php?action=reset2&error_pwd2=1');
    }
    if (!$mail_code || !User::checkMailCode($mail_code)) {
        if ($resp === 'json') {
            Output::error(lang('mail_code_invalid'));
        }
        emDirect('./account.php?action=reset2&err_mail_code=1');
    }

    $PHPASS = new PasswordHash(8, true);
    $passwd = $PHPASS->HashPassword($passwd);
    if (!isset($_SESSION)) {
        session_start();
    }
    $mail = isset($_SESSION['mail']) ? $_SESSION['mail'] : '';
    $User_Model->updateUserByMail(['password' => $passwd], $mail);
    if ($resp === 'json') {
        Output::ok();
    }
    emDirect("./account.php?action=signin&succ_reset=1");
}

if ($action == 'logout') {
    setcookie(AUTH_COOKIE_NAME, ' ', time() - 31536000, '/');
/*vot*/ unset($_SESSION['username']);
    emDirect("../");
}
