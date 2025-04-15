<?php

/**
 * Service: User
 *
 * @package EMLOG
 * @link https://www.emlog.net
 */

class User
{

    const ROLE_ADMIN = 'admin';     // Administrator, Founder
    const ROLE_WRITER = 'writer';   // Registered user
    const ROLE_VISITOR = 'visitor'; // Guest
    const ROLE_EDITOR = 'editor';   // Content editor

    static function isFounder($role = ROLE, $uid = UID)
    {
        $uid = (int)$uid;
        return $role == self::ROLE_ADMIN && $uid === 1;
    }

    static function isAdmin($role = ROLE)
    {
        return $role == self::ROLE_ADMIN;
    }

    static function isVisitor($role = ROLE)
    {
        return $role == self::ROLE_VISITOR;
    }

    static function isEditor($role = ROLE)
    {
        return $role == self::ROLE_EDITOR;
    }

    static function isWriter($role = ROLE)
    {
        return $role == self::ROLE_WRITER;
    }

    /**
     * @deprecated This function is deprecated and will be removed in the future. Use isWriter instead.
     */
    static function isWiter($role = ROLE)
    {
        return $role == self::ROLE_WRITER;
    }

    /**
     * @deprecated This function is deprecated and will be removed in the future. Use isVisitor instead.
     */
    static function isVistor($role = ROLE)
    {
        return $role == self::ROLE_VISITOR;
    }

    static function haveEditPermission($role = ROLE)
    {
        if (self::isAdmin($role)) {
            return true;
        }
        if (self::isEditor($role)) {
            return true;
        }
        return false;
    }

    static function getRoleName($role, $uid = 0)
    {
        $role_name = '';
        switch ($role) {
            case self::ROLE_ADMIN:
                $role_name = $uid == 1 ? lang(ROLE_FOUNDER) : lang(ROLE_ADMIN);
                break;
            case self::ROLE_EDITOR:
                $role_name = lang(ROLE_EDITOR);
                break;
            case self::ROLE_WRITER:
                $role_name = lang(ROLE_WRITER);
                break;
            case self::ROLE_VISITOR:
                $role_name = lang(ROLE_VISITOR);
                break;
        }
        return $role_name;
    }

    static function checkLoginCode($login_code)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $session_code = isset($_SESSION['code']) ? $_SESSION['code'] : '';
        unset($_SESSION['code']);
        if ((!$login_code || $login_code !== $session_code) && Option::get('login_code') === 'y') {
            return false;
        }
        return true;
    }

    static function checkMailCode($mail_code)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $session_code = isset($_SESSION['mail_code']) ? $_SESSION['mail_code'] : '';
        unset($_SESSION['code']);
        if (!$mail_code || $mail_code !== $session_code) {
            return false;
        }
        return true;
    }

    static function checkRolePermission()
    {
        $request_uri = strtolower(substr(basename($_SERVER['SCRIPT_NAME']), 0, -4));
        if (ROLE === self::ROLE_WRITER && !in_array($request_uri, ['article', 'media', 'blogger', 'comment', 'index', 'article_save', 'plugin_user'])) {
            emMsg(lang('group_no_permission'), './');
        }
        if (ROLE === self::ROLE_EDITOR && !in_array($request_uri, ['article', 'twitter', 'media', 'blogger', 'comment', 'index', 'article_save', 'plugin_user'])) {
            emMsg(lang('group_no_permission'), './');
        }
    }

    static function getAvatar($avatar_path)
    {
        if (empty($avatar_path)) {
            return BLOG_URL . 'admin/views/images/avatar.svg';
        }
        if (filter_var($avatar_path, FILTER_VALIDATE_URL)) {
            return $avatar_path;
        }
        if (strpos($avatar_path, '../') === false) {
            return getFileUrl('../' . $avatar_path);
        }
        return getFileUrl($avatar_path);
    }

    static function avatar($uid, $mail = '')
    {
        $avatar = '';
        if ($uid) {
            $userModel = new User_Model();
            $user = $userModel->getOneUser($uid);
            $avatar = $user['photo'];
        } elseif ($mail) {
            $avatar = getGravatar($mail);
        }
        return $avatar ?: BLOG_URL . "admin/views/images/avatar.svg";
    }

    static function updateUserActivity()
    {
        $uid = UID;
        if (!$uid) {
            return;
        }
        if (!isset($_SESSION)) {
            session_start();
        }

        $lastActivity = isset($_SESSION['last_activity']) ? $_SESSION['last_activity'] : 0;
        $currentTime = time();

        // Update user activity time every 6 hours
        if ($currentTime - $lastActivity >= 21600) { // 21600 seconds = 6 hours
            $userModel = new User_Model();
            $userModel->updateUserActivityTime($uid);
            $_SESSION['last_activity'] = $currentTime;
        }
    }
}
