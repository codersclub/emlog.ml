<?php

/**
 * init.
 * @package EMLOG
 * @link https://www.emlog.net
 */

ob_start();
header('Content-Type: text/html; charset=UTF-8');

const EMLOG_ROOT = __DIR__;

require_once EMLOG_ROOT . '/config.php';
require_once EMLOG_ROOT . '/include/lib/common.php';

if (getenv('EMLOG_ENV') === 'develop' || (defined('ENVIRONMENT') && ENVIRONMENT === 'develop')) {
    error_reporting(E_ALL);
} else {
    error_reporting(1);
}

if (extension_loaded('mbstring')) {
    mb_internal_encoding('UTF-8');
}

spl_autoload_register("emAutoload");

$CACHE = Cache::getInstance();

$userData = [];

define('ISLOGIN', LoginAuth::isLogin());
date_default_timezone_set(Option::get('timezone'));

const ROLE_ADMIN = 'admin';
const ROLE_EDITOR = 'editor';
const ROLE_WRITER = 'writer';
const ROLE_VISITOR = 'visitor';

define('ROLE', ISLOGIN === true ? $userData['role'] : User::ROLE_VISITOR);
define('UID', ISLOGIN === true ? (int)$userData['uid'] : 0);

define('BLOG_URL', Option::get('blogurl'));

const TPLS_URL = BLOG_URL . 'content/templates/';
const TPLS_PATH = EMLOG_ROOT . '/content/templates/';
const PLUGIN_URL = BLOG_URL . 'content/plugins/';
const PLUGIN_PATH = EMLOG_ROOT . '/content/plugins/';

//站点URL
define('DYNAMIC_BLOGURL', Option::get('blogurl'));
//当前模板的URL
define('TEMPLATE_URL', TPLS_URL . Option::get('nonce_templet') . '/');
//后台模板的绝对路径
define('ADMIN_TEMPLATE_PATH', EMLOG_ROOT . '/admin/views/');
//前台模板的绝对路径
define('TEMPLATE_PATH', TPLS_PATH . Option::get('nonce_templet') . '/');

const MSGCODE_EMKEY_INVALID = 1001;
const MSGCODE_NO_UPUPDATE = 1002;
const MSGCODE_SUCCESS = 200;

$active_plugins = Option::get('active_plugins');
$emHooks = [];
if ($active_plugins && is_array($active_plugins)) {
    foreach ($active_plugins as $plugin) {
        if (true === checkPlugin($plugin)) {
            include_once(EMLOG_ROOT . '/content/plugins/' . $plugin);
        }
    }
}

// 加载模板的系统调用文件
define('TEMPLATE_HOOK_PATH', TEMPLATE_PATH . 'plugins.php');
if (file_exists(TEMPLATE_HOOK_PATH)) {
    include_once(TEMPLATE_HOOK_PATH);
}

User::updateUserActivity();
