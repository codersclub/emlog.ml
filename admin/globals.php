<?php
/**
 * global
 * @package EMLOG
 * @link https://emlog.io
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once '../init.php';

load_language('admin');

$sta_cache = $CACHE->readCache('sta');
$user_cache = $CACHE->readCache('user');
$action = Input::getStrVar('action');

loginAuth::checkLogin();
User::checkRolePermission();
