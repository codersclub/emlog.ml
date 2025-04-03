<?php

/**
 * plugin user interface
 * @package EMLOG
 * @link https://www.emlog.net
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once 'globals.php';

$plugin = Input::getStrVar('plugin', '');

if (empty($action) && $plugin) {
    require_once "../content/plugins/{$plugin}/{$plugin}_user.php";

    include View::getAdmView(User::haveEditPermission() ? 'header' : 'uc_header');
    plugin_user_view();
    include View::getAdmView(User::haveEditPermission() ? 'footer' : 'uc_footer');
}
