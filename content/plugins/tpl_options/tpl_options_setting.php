<?php
/*
Plugin Name: Template options
*/
defined('EMLOG_ROOT') || exit('access denied!');

//Plugin settings page
function plugin_setting_view() {
    TplOptions::getInstance()->setting();
}
