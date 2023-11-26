<?php
/*
Plugin Name: Template options plugin
*/
defined('EMLOG_ROOT') || exit('access denied!');

//Plugin settings page
function plugin_setting_view() {
    TplOptions::getInstance()->setting();
}
