<?php
/**
 * init.
 * @package EMLOG
 * @link https://www.emlog.net
 */

/*vot*/ session_start();

/*vot*/ if (!is_file('config.php')) {
/*vot*/     @copy('config.sample.php', 'config.php');
/*vot*/ }
ob_start();
header('Content-Type: text/html; charset=UTF-8');

/*vot*/ define('EMLOG_ROOT', str_replace('\\', '/', __DIR__));

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


//vot: Set Interface language
$url = $_SERVER['REQUEST_URI'];
if (isset($_GET['language'])) {
    $url = removeParam('language', $url);
    $_SESSION['LANG'] = $_GET['language'];
    emDirect($url);
}

if (empty($_SESSION['LANG'])) {
    $_SESSION['LANG'] = DEFAULT_LANG;
}
define('LANG', $_SESSION['LANG']);

// blog language direction
const LANG_DIR = LANG_LIST[LANG]['dir']; //'ltr', 'rtl'

// Load the core Lang File
load_language('core');


$CACHE = Cache::getInstance();

$userData = [];

define('ISLOGIN', LoginAuth::isLogin());
date_default_timezone_set(Option::get('timezone'));

const ROLE_ADMIN = 'admin';
const ROLE_EDITOR = 'editor';
const ROLE_WRITER = 'writer';
const ROLE_VISITOR = 'visitor';
/*vot*/ const ROLE_FOUNDER = 'founder';

define('ROLE', ISLOGIN === true ? $userData['role'] : User::ROLE_VISITOR);
define('UID', ISLOGIN === true ? (int)$userData['uid'] : 0);
//Site fixed URL
define('BLOG_URL', Option::get('blogurl'));
//Template Library URL
const TPLS_URL = BLOG_URL . 'content/templates/';
//Template Library Path
const TPLS_PATH = EMLOG_ROOT . '/content/templates/';
const PLUGIN_URL = BLOG_URL . 'content/plugins/';
const PLUGIN_PATH = EMLOG_ROOT . '/content/plugins/';

//Site URL
define('DYNAMIC_BLOGURL', Option::get('blogurl'));
//Front template URL
define('TEMPLATE_URL', TPLS_URL . Option::get('nonce_templet') . '/');
//Admin Template Path
define('ADMIN_TEMPLATE_PATH', EMLOG_ROOT . '/admin/views/');
//Frontend template absolute path
define('TEMPLATE_PATH', TPLS_PATH . Option::get('nonce_templet') . '/');

//Error code
const MSGCODE_EMKEY_INVALID = 1001;
const MSGCODE_NO_UPUPDATE = 1002;
const MSGCODE_SUCCESS = 200;

//Access Scheme
/*vot*/ define('SCHEME', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://');
/*vot*/ $root = str_replace('\\', '/', dirname($_SERVER['PHP_SELF']));
/*vot*/ define('ROOT_URL', rtrim($root, '/') . '/');

$active_plugins = Option::get('active_plugins');
$emHooks = [];
if ($active_plugins && is_array($active_plugins)) {
    foreach ($active_plugins as $plugin) {
        if (true === checkPlugin($plugin)) {
            include_once(EMLOG_ROOT . '/content/plugins/' . $plugin);
        }
    }
}

// Load template file system call
define('TEMPLATE_HOOK_PATH', TPLS_PATH . Option::get('nonce_templet') . '/plugins.php');
if (file_exists(TEMPLATE_HOOK_PATH)) {
    include_once(TEMPLATE_HOOK_PATH);
}
