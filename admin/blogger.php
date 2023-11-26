<?php
/**
 * user profile
 *
 * @package EMLOG
 * @link https://emlog.io
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once 'globals.php';

if (empty($action)) {
    $User_Model = new User_Model();
    $row = $User_Model->getOneUser(UID);
    extract($row);

    $icon = $photo ?: "./views/images/avatar.svg";

    include View::getAdmView(User::haveEditPermission() ? 'header' : 'uc_header');
    require_once(View::getAdmView('blogger'));
    include View::getAdmView(User::haveEditPermission() ? 'footer' : 'uc_footer');
    View::output();
}

if ($action == 'update') {
    LoginAuth::checkToken();
    $User_Model = new User_Model();
    $nickname = Input::postStrVar('name');
    $email = Input::postStrVar('email');
    $description = Input::postStrVar('description');
    $login = Input::postStrVar('username');
    $newpass = Input::postStrVar('newpass');
    $repeatpass = Input::postStrVar('repeatpass');

    if (empty($nickname)) {
        Output::error(lang('nickname_is_empty'));
    } elseif (!checkMail($email)) {
        Output::error(lang('email_enter_please'));
    } elseif (strlen($newpass) > 0 && strlen($newpass) < 6) {
        Output::error(lang('password_length_short'));
    } elseif (!empty($newpass) && $newpass != $repeatpass) {
        Output::error(lang('password_not_equal'));
    } elseif ($User_Model->isUserExist($login, UID)) {
        Output::error(lang('username_exists'));
    } elseif ($User_Model->isNicknameExist($nickname, UID)) {
        Output::error(lang('nickname_exists'));
    } elseif ($User_Model->isMailExist($email, UID)) {
        Output::error(lang('email_is_used'));
    }

    $d = [
        'nickname'    => $nickname,
        'description' => $description,
        'email'       => $email,
        'username'    => $login,
    ];

    if (!empty($newpass)) {
        $PHPASS = new PasswordHash(8, true);
        $newpass = $PHPASS->HashPassword($newpass);
        $d['password'] = $newpass;
    }

    $User_Model->updateUser($d, UID);
    $CACHE->updateCache('user');
    Output::ok();
}

if ($action == 'update_avatar') {
    $ret = uploadCropImg();
    $file_path = $ret['file_info']['file_path'];

    $User_Model = new User_Model();
    $User_Model->updateUser(array('photo' => $file_path), UID);
    $CACHE->updateCache('user');
    Output::ok($file_path);
}
