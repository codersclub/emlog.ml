<?php
header("location: ./install.php");
exit;
//MySQL database host
const DB_HOST = 'localhost';
//MySQL database username
const DB_USER = 'root';
//MySQL database user password
const DB_PASSWD = '';
//Database name
const DB_NAME = 'emlog';
//Database table prefix
const DB_PREFIX = 'emlog_';
//Auth key
const AUTH_KEY = 'emlog-key';
//Cookie name
const AUTH_COOKIE_NAME = 'emlog-cookie';

// Production/Development Mode
const ENVIRONMENT = 'production'; // Operating mode: 'production' - production mode, 'develop' - development mode

//Default blog language
const DEFAULT_LANG = 'en'; //'en', 'ru', 'zh-CN', 'zh-TW', 'pt-BR', etc.

// Enabled language list
// Icons: https://unicode.bootstrap-4.ru/emoji/flags/
const LANG_LIST = [
/*
    'ar' => [
        'name'  => 'العربية',
        'title' => 'Arabic',
        'icon'  => '??',
        'dir'   => 'rtl',
    ],
*/
    'en'    => [
        'name'  => 'English',
        'title' => 'English',
        'dir'   => 'ltr',
    ],
    'ru'    => [
        'name'  => 'Русский',
        'title' => 'Russian',
        'dir'   => 'ltr',
    ],
    'zh-CN' => [
        'name'  => '简体中文',
        'title' => 'Simplified Chinese',
        'dir'   => 'ltr',
    ],
];
