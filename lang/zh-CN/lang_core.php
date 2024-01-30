<?php
// LANG_CORE
$lang = array(

//---------------------------
//init.php
'language'           => '语言',//'Language',

//---------------------------
//include\controller\api_controller.php
'article_private'	=> 'This article is private',

//---------------------------
//include/lib/cache.php
'cache_date_format'  => 'Y年n月',//'m.Y',
'cache_read_error'   => '写入缓存失败，可能是缓存目录(content/cache)不可写',//'Failed to write to the cache, it may be that the cache directory (content/cache) is not writable',
'cache_not_writable' => '写入缓存失败，缓存目录(content/cache)不可写',//'Failed to write to the cache, the cache directory (content/cache) is not writable',

//---------------------------
//include/lib/calendar.php

'weekday1' => '一',//'Mo',//'Monday',
'weekday2' => '二',//'Tu',//'Tuesday',
'weekday3' => '三',//'We',//'Wednesday',
'weekday4' => '四',//'Th',//'Thursday',
'weekday5' => '五',//'Fr',//'Friday',
'weekday6' => '六',//'Sa',//'Saturday',
'weekday7' => '日',//'Su',//'Sunday',

'month_1'                    => '一月',
'month_2'                    => '二月',
'month_3'                    => '行进',
'month_4'                    => '四月',
'month_5'                    => '可能',
'month_6'                    => '六月',
'month_7'                    => '七月',
'month_8'                    => '八月',
'month_9'                    => '九月',
'month_10'                   => '十月',
'month_11'                   => '十一月',
'month_12'                   => '十二月',

//---------------------------
//include/lib/common.php
'not_editable'               => '审核通过的文章用户不可编辑、删除',//'Approved articles cannot be edited or deleted by users',
'file_upload_failed'         => '文件上传失败',//'File upload failed',

//---------------------------
//include/lib/emcurl.php
'curl_install'		=> '请求失败，请先安装 PHP 的 Curl 扩展。',//'The request failed, please install the PHP Curl extension first.',

//---------------------------
//include/lib/function.base.php
'_load_failed'               => '加载失败。',//' load failed.',
'_bytes'                     => '字节',//' bytes',
'home'                       => '首页',//'Home',
'first_page'                 => '首页',//'First',
'last_page'                  => '尾页',//'Last',
'read_more'                  => '阅读全文&gt;&gt;',//'Read more&gt;&gt;',
'_sec_ago'                   => '秒前',//' seconds ago.',
'_min_ago'                   => '分钟前',//' minutes ago.',
'about_'                     => '约 ',//'~ ',
'_hour_ago'                  => ' 小时前',//' hour(s) ago.',
'file_size_exceeds_system'   => '文件大小超过系统',//'File size exceeds the system limit ',
'_limit'                     => '限制',//'',//' limit',//LEAVE THIS EMPTY???
'upload_failed_error_code'   => '上传文件失败,错误码：',//'Upload failed. Error code: ',
'file_type_not_supported'    => '错误的文件类型',//'This file type is not supported.',
'file_size_exceeds_'         => '文件大小超出',//'File size exceeds the limit ',
'_of_limit'                  => '的限制',//'',//' limit',
'upload_folder_create_error' => '创建文件上传目录失败',//'Failed to create file upload directory.',
'upload_folder_unwritable'   => '上传失败。文件上传目录(content/uploadfile)不可写',//'Upload failed. Directory (content/uploadfile) cannot be written.',
'404_description'            => '抱歉，你所请求的页面不存在！',//'Sorry, the page that you requested does not exist.',
'prompt'                     => '提示信息',//'Prompt Message',
'click_return'               => '点击返回',//'Return back',
'upload_ok'                  => '上传成功',//'Upload successful',

//---------------------------
//include/lib/loginauth.php
'captcha'                    => '验证码',//'Captcha',
'captcha_error_reenter'      => '验证错误，请重新输入',//'Captcha error. Please, re-enter.',
'user_name_wrong_reenter'    => '用户名错误，请重新输入',//'Wrong username. Please, re-enter.',
'password_wrong_reenter'     => '密码错误，请重新输入',//'Wrong password. Please, re-enter.',
// 'no_permission'		=> '权限不足！',//'Insufficient permissions!',
'token_error'                => '安全Token校验失败，请尝试刷新页面或者更换浏览器重试',//'Security Token verification failed, please try to refresh the page or change the browser and try again',

//---------------------------
//include/lib/option.php
'blogger'                    => '个人资料',//'Personal info',
'categories'                 => '分类',//'Categories',
'category'                   => '分类',//'Category',
'calendar'                   => '日历',//'Calendar',
'twitter_latest'             => '最新微语',//'Latest twits',
'tags'                       => '标签',//'Tags',
'archive'                    => '存档',//'Archive',
'new_comments'               => '最新评论',//'Latest comments',
'new_posts'                  => '最新文章',//'Latest posts',
'random_post'                => '随机文章',//'Random entry',
'hot_posts'                  => '热门文章',//'Popular entries',
'links'                      => '链接',//'Links',
'search'                     => '搜索',//'Search',
'widget_custom'              => '自定义组件',//'Custom widget',
'search_placeholder'         => 'Search...and Enter',//'Search...and Enter',
'unregistered_version'       => '&#x672A;&#x6CE8;&#x518C;&#x7684;&#x7248;&#x672C; ',//'Unregistered version ',

//---------------------------
//include/lib/sendmail.php
'smtp_test'                  => '测试邮件STMP发送',//'Send STMP test mail',

//---------------------------
//include/lib/view.php
'template_not_found'         => '当前使用的模板已被删除或损坏，请登录后台更换其他模板。',//'The current template has been deleted or corrupted. Please please login as administrator to replace other template.',
'template_corrupted'         => '后台模板已损坏',//'Background template is corrupted',

//---------------------------------------
//include/lib/mysql.php
'mysql_not_supported'        => '服务器PHP不支持MySQL数据库',//'Server does not support PHP MySql database',
'db_database_unavailable'    => '连接数据库失败，数据库地址错误或者数据库服务器不可用',//'Database connection error: The database server or database is unavailable.',
'db_port_invalid'            => '连接数据库失败，数据库端口错误',//'Database connection error: The database port is invalid.',
'db_server_unavailable'      => '连接数据库失败，数据库服务器不可用',//'Database connection error: The database server is unavailable.',
'db_credential_error'        => '连接数据库失败，数据库用户名或密码错误',//'Database connection error: Wrong username or password.',
'db_error_code'              => '连接MySQL数据库失败，请检查数据库信息。错误信息：',//'Failed to connect to the MySQL database, please check the database information. Error message: ',
'db_not_found'               => '连接数据库失败，未找到您填写的数据库',//'Database connection failed. The database you filled in was not found.',
'db_sql_error'               => 'SQL执行错误',//'SQL execution error',

//---------------------------------------
//include/lib/mysqlii.php
'mysqli_not_supported'       => '服务器PHP不支持mysqli函数',//'Server PHP does not support mysqli function',
'db_credential_error'        => '连接MySQL数据库失败，数据库用户名或密码错误',//'Failed to connect to the MySQL database, the database user name or password is incorrect',
'db_not_found'               => '连接MySQL数据库失败，未找到你填写的数据库',//'Failed to connect to the MySQL database, the database you filled in was not found',
// 'db_port_invalid'		=> '连接数据库失败，数据库端口错误',//'Database connection error: The database port is invalid.',
'db_unavailable'             => '连接MySQL数据库失败，数据库地址错误或者数据库服务器不可用',//'Failed to connect to the MySQL database, the database address is wrong or the database server is unavailable',
// 'db_server_unavailable'	=> '连接数据库失败，数据库服务器不可用',//'Database connection error: The database server is unavailable.',
'db_error_code'              => '连接MySQL数据库失败，请检查数据库信息。错误编号：',//'Failed to connect to the MySQL database, please check the database information. Error code: ',
'db_error_name'              => '连接数据库失败，请填写数据库名',//'Database connection error:  Please fill out the database name',
// 'db_sql_error'		=> 'SQL语句执行错误',//'SQL statement execution error',
'utf8mb4_not_support'		=> 'MySQL缺少utf8mb4字符集，请升级到MySQL5.6或更高版本',//'MySQL does not support utf8mb4 character set, please upgrade to MySQL5.6 or later',

//---------------------------------------
//include/lib/mysqlpdo.php
'pdo_not_supported'          => '服务器空间PHP不支持PDO函数',//'Server PHP does not support PDO function',
'pdo_connect_error'          => '连接数据库失败，请检查数据库信息。错误原因：',//'Failed to connect to the database, please check the database information. Error message: ',

//---------------------------------------
//include/lib/twitter_model.php
// 'no_permission'	=> '权限不足！',//'Insufficient permissions!',

//---------------------------------------
//include/model/media_model.php
'del_failed'                 => '删除失败!',//'Failed to delete!',

//---------------------------
//include/model/sort_model.php
'uncategorized'            => '未分类',//'Uncategorized',

//---------------------------------------
//include/service/notice.php
'new_article_review'         => '你的站点收到新的文章投稿',//'Your site has received new submissions',
'new_article_title'          => '文章标题：',//'Article title: ',
'new_comment_reply_review'	=> '你的评论收到一条回复',//'Your comment has received a new reply',
'new_comment_review'         => '你的文章收到新的评论',//'Your article has received a new comment',
'new_comment_is'             => '评论内容：',//'Comment content: ',
'from_article'			=> '来自文章',//'From article: ',
'email_verif_code_title'	=> '注册用户邮件验证码',//'Registered user email verification code';
'email_verif_code'		=> '邮件验证码：',//'Email Verification Code: '

//---------------------------------------
//include/service/user.php
'reset_password_code'        => '找回密码邮件验证码',//'Recover Password Email Verification Code',
'email_verify_code'          => '邮件验证码: ',//'Email verification code: ',
'group_no_permission'        => '你所在的用户组无法使用该功能，请联系管理员',//'The user group you are in cannot use this function, please contact the administrator',
'admin'                      => '管理员',//'Administrator',
'registered_user'            => '注册用户',//'Registered user',
'visitor'                    => '游客',//'Guest',
'editor'                     => '内容编辑',//'Content Editor',

//---------------------------
//content/templates/default/404.php
'404_error'                  => '错误提示-页面未找到',//'Error - page not found.',
'404_description'            => '抱歉，你所请求的页面不存在！',//'Sorry, the page that you requested does not exist.',
'click_return'               => '&laquo;点击返回',//'&laquo;Return back',

//---------------------------
//content/templates/default/footer.php
'powered_by'                 => 'Powered by',
'powered_by_emlog'           => '采用emlog系统',//'Powered by Emlog',

//---------------------------
//content/templates/default/header.php
'enable_tpl_settings'        => '请开启【模板设置】插件, <a href="./admin/plugin.php">去开启</a>',//'Please enable the [Template Settings] plug-in, <a href="./admin/plugin.php">Enable</a>',

//---------------------------
//content/templates/default/module.php
// '_posts'			=> '篇文章',//'posts',
// 'subscribe_category'	=> '订阅该分类',//'Subscribe this category',
// 'subscribe_category'	=> '订阅该分类',//'Subscribe this category',
'view_image'                 => '查看图片',//'View image',
'more'                       => '更多&raquo;',//'More &raquo;',
'site_management'            => '管理',//'Management',
'logout'                     => '退出',//'Logout',
'top_posts'                  => '置顶文章',//'Top entries',
'cat_top_posts'              => '分类置顶文章',//'Category Top entries',
'edit'                       => '编辑',//'Edit',
// 'category'		=> '分类',//'Category',
// 'tags'		=> '标签',//'Tags',
// 'comments'		=> '评论',//'Comments',
// 'reply'		=> '回复',//'Reply',
// 'reply'		=> '回复',//'Reply',
'cancel_reply'               => '取消回复',//'Cancel reply',
'comment_leave'              => '发表评论',//'Leave a comment',
'nickname'                   => '昵称',//'Nicname',
'email_optional'             => '邮件地址 (选填)',//'E-Mail adress (optional)',
'email_addr'                 => '邮件地址',//'E-Mail address',
'email'                      => '邮箱',//'E-mail',
'homepage'                   => '个人主页',//'Homepage',
'homepage_optional'          => '个人主页 (选填)',//'Homepage (optional)',
'comment_leave'              => '发布评论',//'Post a comment',
'enter_captcha'			=> '输入验证码',//'Enter confirmation code',

//---------------------------
//content/templates/default/options.php
'tpl_setting_tab_name' => '定义设置项标签页名称',//'Define settings tab name',
'tpl_setting_header' => '头部设置',//'Header settings',
'tpl_setting_descr' => '你好，这是默认模板的设置界面，请点击上方菜单进入设置项。',//'Hello, this is the setting interface of the default template. Please click the menu above to enter the setting item.',
'tpl_logo_mode' => 'LOGO显示模式',//'LOGO display mode',
'tpl_logo_text' => '文字',//'Text',
'tpl_logo_image' => '图片',//'Image',
'tpl_logo_upload' => 'LOGO上传',//'LOGO upload',
'tpl_logo_upload_descr' => '上传LOGO图片。',//'Upload the LOGO image.',

//---------------------------
//content/templates/default/pw.php
'submit'                                  => '提交',//'Submit',

//---------------------------
//content/templates/default/side.php
'rss_feed'                   => 'RSS订阅',//'RSS Subscription',
'feed_rss'                   => '订阅Rss',//'RSS Subscription',


);
