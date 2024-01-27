<?php
defined('EMLOG_ROOT') || exit('access denied!');

// Execute this function when the plugin is started
function callback_init() {
    // do something
}

// Execute this function when the plugin is removed
function callback_rm() {
    $plugin_storage = Storage::getInstance('tips');
    $plugin_storage->deleteAllName('YES'); // 删除时清理插件的设置信息
}

// Execute this function when the plugin is updated
function callback_up() {
    // do something
}
