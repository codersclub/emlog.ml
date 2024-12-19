<?php

/**
 * FrontEnd User Center
 */
defined('EMLOG_ROOT') || exit('access denied!');

/*

Instructions for using the front-end user center template are as follows:

Determine whether you are logged in
if (ISLOGIN) {
    //do something
}

Get the currently logged in user information
$userData['photo']
$userData['nickname']
$userData['description']
$userData['email']

Get the current route path
The variable $routerPath stores the routing path of the current request, such as /user/profile, where the value of $routerPath is profile

Import the header template file (whether to import can be determined based on the route)
if (in_array($routerPath, ['', 'order', 'account', 'profile', 'weiyu'])) {
    include View::getView('header');
}

Implement routing correspondence function
if ($routerPath === 'profile') {
    //Display profile page
} elseif ($routerPath === 'weiyu') {
    // Show microblog page
} elseif ($routerPath === 'order_calback') {
    // Processing payment callback logic
} else {
    show_404_page();
}

Import the bottom template file
include View::getView('footer')

*/

emDirect('/');
