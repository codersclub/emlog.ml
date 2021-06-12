<?php
// LANG_CORE
$lang = array(

//---------------------------
//include/lib/cache.php
 'cache_date_format'	=> 'Y-m',//'Y年n月',
 'cache_read_error'	=> 'Cache read failed. If you are using a Unix/Linux host, modify the permissions of the cache directory (content/cache) and all the folders inside it to 777. If you are using a Windows host, please contact the administrator, and make all files under this directory writeable.',//'读取缓存失败。如果您使用的是Unix/Linux主机，请修改缓存目录 (content/cache) 下所有文件的权限为777。如果您使用的是Windows主机，请联系管理员，将该目录下所有文件设为可写',
 'cache_not_writable'	=> 'The cache directory (content/cache) is not writable.',//'写入缓存失败，缓存目录 (content/cache) 不可写',

//---------------------------
//include/lib/calendar.php

 'weekday1'	=> 'Mo',//'Monday',//'一',
 'weekday2'	=> 'Tu',//'Tuesday',//'二',
 'weekday3'	=> 'We',//'Wednesday',//'三',
 'weekday4'	=> 'Th',//'Thursday',//'四',
 'weekday5'	=> 'Fr',//'Friday',//'五',
 'weekday6'	=> 'Sa',//'Saturday',//'六',
 'weekday7'	=> 'Su',//'Sunday',//'日',

//---------------------------
//include/lib/function.base.php
 '_load_failed'	=> ' load failed.',//'加载失败。',
 '_bytes'	=> ' bytes',//'字节',
 'home'		=> 'Home',//'首页',
 'first_page'	=> 'First',//'首页',
 'last_page'	=> 'Last',//'尾页',
 'read_more'	=> 'Read more&gt;&gt;',//'阅读全文&gt;&gt;',
 '_sec_ago'	=> ' seconds ago.',//'秒前',
 '_min_ago'	=> ' minutes ago.',//'分钟前',
 'about_'	=> '~ ',//'约 ',
 '_hour_ago'	=> ' hour(s) ago.',//' 小时前',
 'file_size_exceeds_system'	=> 'File size exceeds the system limit ',//'文件大小超过系统 ',
 '_limit'			=> '',//' limit',//LEAVE THIS EMPTY???//'限制',
 'upload_failed_error_code'	=> 'Upload failed. Error code: ',//'上传文件失败,错误码: ',
 'file_type_not_supported'	=> 'This file type is not supported.',//'错误的文件类型',
 'file_size_exceeds_'		=> 'File size exceeds the limit ',//'文件大小超出',
 '_of_limit'			=> '',//' limit',//'的限制',
 'upload_folder_create_error'	=> 'Failed to create file upload directory.',//'创建文件上传目录失败',
 'upload_folder_unwritable'	=> 'Upload failed. Directory (content/uploadfile) cannot be written.',//'上传失败。文件上传目录(content/uploadfile)不可写',
 '404_description'		=> 'Sorry, the page that you requested does not exist.',//'抱歉，你所请求的页面不存在！',
 'prompt'			=> 'Prompt Message',//'提示信息',
 'click_return'			=> 'Return back',//'点击返回',

//---------------------------
//include/lib/loginauth.php
 'captcha'			=> 'Captcha',//'验证码',
 'captcha_error_reenter'	=> 'Captcha error. Please, re-enter.',//'验证错误，请重新输入',
 'user_name_wrong_reenter'	=> 'Wrong username. Please, re-enter.',//'用户名错误，请重新输入',
 'password_wrong_reenter'	=> 'Wrong password. Please, re-enter.',//'密码错误，请重新输入',
// 'no_permission'		=> 'Insufficient permissions!',//'权限不足！',
 'token_error'			=> 'token error','Token error',

//---------------------------
//include/lib/option.php
 'blogger'		=> 'Personal info',//'个人资料',
 'calendar'		=> 'Calendar',//'日历',
 'twitter_latest'	=> 'Latest twits',//'最新微语',
 'tags'			=> 'Tags',//'标签',
 'category'		=> 'Category',//'分类',
 'archive'		=> 'Archive',//'存档',
 'new_comments'		=> 'Latest comments',//'最新评论',
 'new_posts'		=> 'Latest posts',//'最新文章',
 'random_post'		=> 'Random entry',//'随机文章',
 'hot_posts'		=> 'Popular entries',//'热门文章',
 'links'		=> 'Links',//'链接',
 'search'		=> 'Search',//'搜索',
 'widget_custom'	=> 'Custom widget',//'自定义组件',
 'search_placeholder'	=> 'Search...and Enter',//'Search...and Enter',

//---------------------------
//include/lib/view.php
 'template_not_found'	=> 'The current template has been deleted or corrupted. Please please login as administrator to replace other template.',//'当前使用的模板已被删除或损坏，请登录后台更换其他模板。',

//---------------------------------------
//include/lib/mysql.php
 'php_mysql_not_supported'	=> 'Server does not support PHP MySql database',//'服务器空间PHP不支持MySql数据库',
 'db_database_unavailable'	=> 'Database connection error: The database server or database is unavailable.',//'连接数据库失败，数据库地址错误或者数据库服务器不可用',
 'db_port_invalid'		=> 'Database connection error: The database port is invalid.',//'连接数据库失败，数据库端口错误',
 'db_server_unavailable'	=> 'Database connection error: The database server is unavailable.',//'连接数据库失败，数据库服务器不可用',
 'db_credential_error'		=> 'Database connection error: Wrong username or password.',//'连接数据库失败，数据库用户名或密码错误',
 'db_error_code'		=> 'Database connection error: Please, check database information. Error code: ',//'连接数据库失败，请检查数据库信息。错误编号：',
 'db_not_found'			=> 'Database connection failed. The database you filled in was not found.',//'连接数据库失败，未找到您填写的数据库',
 'db_sql_error'			=> 'SQL statement execution error',//'SQL语句执行错误',

//---------------------------------------
//include/lib/mysqlii.php
 'mysqli_not_supported'		=> 'Server does not support PHP MySqli extension',//'服务器空间PHP不支持MySqli函数',
// 'db_credential_error'	=> 'Database connection error: Wrong username or password.',//'连接数据库失败，数据库用户名或密码错误',
// 'db_not_found'		=> 'Database connection failed. The database you filled in was not found.',//'连接数据库失败，未找到您填写的数据库',
// 'db_port_invalid'		=> 'Database connection error: The database port is invalid.',//'连接数据库失败，数据库端口错误',
// 'db_unavailable'		=> 'Database connection error: The database server or database is unavailable.',//'连接数据库失败，数据库地址错误或者数据库服务器不可用',
// 'db_server_unavailable'	=> 'Database connection error: The database server is unavailable.',//'连接数据库失败，数据库服务器不可用',
// 'db_error_code'		=> 'Database connection error: Please, check database information. Error code ',//'连接数据库失败，请检查数据库信息。错误编号：',
 'db_error_name'		=> 'Database connection error:  Please fill out the database name',//'连接数据库失败，请填写数据库名',
// 'db_sql_error'		=> 'SQL statement execution error',//'SQL语句执行错误',

//---------------------------
//content/templates/default/404.php
 '404_error'		=> 'Error - page not found.',//'错误提示-页面未找到',
 '404_description'	=> 'Sorry, the page that you requested does not exist.',//'抱歉，你所请求的页面不存在！',
 'click_return'		=> '&laquo;Return back',//'&laquo;点击返回',

//---------------------------
//content/templates/default/footer.php
 'powered_by'		=> 'Powered by ',
 'powered_by_emlog'	=> 'Powered by Emlog',//'采用emlog系统',

//---------------------------
//content/templates/default/module.php
// '_posts'			=> 'posts',//'篇文章',
// 'subscribe_category'	=> 'Subscribe this category',//'订阅该分类',
// 'subscribe_category'	=> 'Subscribe this category',//'订阅该分类',
 'view_image'		=> 'View image',//'查看图片',
 'more'			=> 'More &raquo;',//'更多&raquo;',
 'site_management'	=> 'Site management',//'管理站点',
 'logout'		=> 'Logout',//'退出',
 'top_posts'		=> 'Top entries',//'置顶文章',
 'cat_top_posts'	=> 'Category Top entries',//'分类置顶文章',
 'edit'			=> 'Edit',//'编辑',
// 'category'		=> 'Category',//'分类',
// 'tags'		=> 'Tags',//'标签',
// 'comments'		=> 'Comments',//'评论',
// 'reply'		=> 'Reply',//'回复',
// 'reply'		=> 'Reply',//'回复',
 'cancel_reply'		=> 'Cancel reply',//'取消回复',
 'comment_leave'	=> 'Leave a comment',//'发表评论',
 'nickname'		=> 'Nicname',//'昵称',
 'email_optional'	=> 'E-Mail adress (optional)',//'邮件地址 (选填)',
 'email'		=> 'E-Mail adress',//'邮件地址',
 'homepage'		=> 'Homepage',//'个人主页',
 'homepage_optional'	=> 'Homepage (optional)',//'个人主页 (选填)',
 'comment_leave'	=> 'Post a comment',//'发布评论',

//---------------------------
//content/templates/default/side.php
 'rss_feed'	=> 'RSS Subscription',//'RSS订阅',
 'feed_rss'	=> 'RSS Subscription',//'订阅Rss',


);