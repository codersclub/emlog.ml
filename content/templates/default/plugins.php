<?php
/**
 * Template file system call
 * After the template is enabled, this file will be automatically loaded by the system. Can be used to implement plug-in-like functionality.
 */

defined('EMLOG_ROOT') || exit('access denied!');

/* eg:

function sameFunc() {
    echo "hello world";
}

addAction('adm_head', 'sameFunc');

*/

/*
// 后台模板设置菜单增加 icon 图标
function optionIconFont() {
    echo sprintf('<link rel="stylesheet" href="%s">', 'https://cdn.bootcdn.net/ajax/libs/remixicon/3.5.0/remixicon.min.css?ver=' . Option::EMLOG_VERSION_TIMESTAMP);
}

addAction('adm_head', 'optionIconFont');
*/
