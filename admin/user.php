<?php
/**
 * user
 * @package EMLOG
 * @link https://www.emlog.net
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once 'globals.php';

$User_Model = new User_Model();

if (empty($action)) {
    $page = Input::getIntVar('page', 1);
    $keyword = Input::getStrVar('keyword');
    $admin = Input::getStrVar('admin');

    $email = $nickname = '';
    if (filter_var($keyword, FILTER_VALIDATE_EMAIL)) {
        $email = $keyword;
    } else {
        $nickname = $keyword;
    }

    $addUrl = $admin ? "admin=y&" : '';

    $users = $User_Model->getUsers($email, $nickname, $admin, $page);
    $userCount = $User_Model->getUserCount($email, $nickname, $admin);
    $pageurl = pagination($userCount, Option::get('admin_perpage_num'), $page, "./user.php?{$addUrl}page=");

    include View::getAdmView('header');
    require_once View::getAdmView('user');
    include View::getAdmView('footer');
    View::output();
}

if ($action == 'new') {
    $email = isset($_POST['email']) ? addslashes(trim($_POST['email'])) : '';
    $password = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';
    $password2 = isset($_POST['password2']) ? addslashes(trim($_POST['password2'])) : '';
    $role = isset($_POST['role']) ? addslashes(trim($_POST['role'])) : self::ROLE_WRITER;

    LoginAuth::checkToken();

    if (User::isAdmin()) {
        $ischeck = 'n';
    }

    if ($email == '') {
        emDirect('./user.php?error_email=1');
    }
    if ($User_Model->isMailExist($email)) {
        emDirect("./user.php?error_exist_email=1");
    }
    if (strlen($password) < 6) {
        emDirect('./user.php?error_pwd_len=1');
    }
    if ($password != $password2) {
        emDirect('./user.php?error_pwd2=1');
    }

    $PHPASS = new PasswordHash(8, true);
    $password = $PHPASS->HashPassword($password);

    $User_Model->addUser('', $email, $password, $role);
    $CACHE->updateCache(array('sta', 'user'));
    emDirect('./user.php?active_add=1');
}

if ($action == 'edit') {
    $uid = isset($_GET['uid']) ? (int)$_GET['uid'] : '';

    $data = $User_Model->getOneUser($uid);

    $nickname = $data['nickname'];
    $role = $data['role'];
    $description = $data['description'];
    $username = $data['username'];
    $email = $data['email'];

    $ex1 = $ex2 = $ex3 = '';
    if (user::isVisitor($role)) {
        $ex1 = 'selected="selected"';
    } elseif (User::isEditor($role)) {
        $ex2 = 'selected="selected"';
    } elseif (User::isAdmin($role)) {
        $ex3 = 'selected="selected"';
    }

    include View::getAdmView('header');
    require_once View::getAdmView('user_edit');
    include View::getAdmView('footer');
    View::output();
}

if ($action == 'update') {
    $username = isset($_POST['username']) ? addslashes(trim($_POST['username'])) : '';
    $nickname = isset($_POST['nickname']) ? addslashes(trim($_POST['nickname'])) : '';
    $password = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';
    $password2 = isset($_POST['password2']) ? addslashes(trim($_POST['password2'])) : '';
    $email = isset($_POST['email']) ? addslashes(trim($_POST['email'])) : '';
    $description = isset($_POST['description']) ? addslashes(trim($_POST['description'])) : '';
    $role = isset($_POST['role']) ? addslashes(trim($_POST['role'])) : User::ROLE_WRITER;
    $uid = isset($_POST['uid']) ? (int)$_POST['uid'] : '';

    LoginAuth::checkToken();

    //Founder account can not be edited by others
    if (!User::isFounder() && $uid === 1) {
        emDirect('./user.php?error_del_b=1');
    }
    if ($uid === 1) {
        $role = User::ROLE_ADMIN;
    }
    if (empty($nickname)) {
        emDirect("./user.php?action=edit&uid={$uid}&error_nickname=1");
    }
    if (empty($email) && empty($username)) {
        emDirect("./user.php?action=edit&uid={$uid}&error_email=1");
    }
    if ($User_Model->isMailExist($email, $uid)) {
        emDirect("./user.php?action=edit&uid={$uid}&error_exist_email=1");
    }
    if ($User_Model->isUserExist($username, $uid)) {
        emDirect("./user.php?action=edit&uid={$uid}&error_exist=1");
    }
/*vot*/    if (strlen($password) > 0 && strlen($password) < 5) { // Minimum 5 characters
        emDirect("./user.php?action=edit&uid={$uid}&error_pwd_len=1");
    }
    if ($password != $password2) {
        emDirect("./user.php?action=edit&uid={$uid}&error_pwd2=1");
    }

    $userData = [
        'username'    => $username,
        'nickname'    => $nickname,
        'email'       => $email,
        'description' => $description,
        'role'        => $role,
    ];

    if (!empty($password)) {
        $PHPASS = new PasswordHash(8, true);
        $password = $PHPASS->HashPassword($password);
        $userData['password'] = $password;
    }

    $User_Model->updateUser($userData, $uid);
    $CACHE->updateCache('user');
    emDirect('./user.php?active_update=1');
}

if ($action == 'del') {
    LoginAuth::checkToken();
    $uid = isset($_GET['uid']) ? (int)$_GET['uid'] : '';

    if (UID == $uid) {
        emDirect('./user.php');
    }

    //Founder account can not be deleted
    if ($uid == 1) {
        emDirect('./user.php?error_del_a=1');
    }

    $User_Model->deleteUser($uid);
    $CACHE->updateCache(array('sta', 'user'));
    emDirect('./user.php?active_del=1');
}

if ($action == 'forbid') {
    LoginAuth::checkToken();
    $uid = isset($_GET['uid']) ? (int)$_GET['uid'] : '';

    if (UID == $uid) {
        emDirect('./user.php');
    }

    // Founder account cannot be disabled
    if ($uid == 1) {
        emDirect('./user.php');
    }

    $User_Model->forbidUser($uid);
    emDirect('./user.php?active_fb=1');
}

if ($action == 'unforbid') {
    LoginAuth::checkToken();
    $uid = isset($_GET['uid']) ? (int)$_GET['uid'] : '';

    $User_Model->unforbidUser($uid);
    emDirect('./user.php?active_unfb=1');
}
