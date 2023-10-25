<?php
/**
 * @package EMLOG
 * @link https://emlog.io
 */

require_once 'init.php';

$emDispatcher = Dispatcher::getInstance();
$emDispatcher->dispatch();
View::output();
