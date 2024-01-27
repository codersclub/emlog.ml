<?php
defined('EMLOG_ROOT') || exit('access denied!');

// Execute this function when the plugin is started
function callback_init() {
    // do something
}

// Execute this function when the plugin is removed
function callback_rm() {
    $plugin_storage = Storage::getInstance('tips');
    $plugin_storage->deleteAllName('YES'); // Clean up plug-in setting information when deleting
}

// Execute this function when the plugin is updated
function callback_up() {
    // do something
}
