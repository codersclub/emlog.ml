<?php
/*
Plugin Name: 模版设置插件
*/
!defined('EMLOG_ROOT') && exit('access deined!');

//Plugin settings page
function plugin_setting_view() {
	TplOptions::getInstance()->setting();
}

//Plugin settings empty function
function plugin_setting() {
}
