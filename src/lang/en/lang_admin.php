<?php

$lang = array(

//---------------------------
//admin/admin_log.php
 'drafts'		=> 'Drafts',//'草稿箱',
 'post_manage'		=> 'Post Manager',//'文章管理',
 'no_permission'	=> 'Insufficient permissions!',//'权限不足！',
// 'no_permission'	=> 'Insufficient permissions!',//'权限不足！',
// 'no_permission'	=> 'Insufficient permissions!',//'权限不足！',

//---------------------------
//admin/attachment.php
 'attachment_delete_error'	=> 'Attachment delete failed!',//'删除附件失败!',
// 'attachment_delete_error'	=> 'Attachment delete failed!',//'删除附件失败!',

//---------------------------
//admin/configure.php
 'verification_code_not_supported' => 'Open verification Code failed! Server does not support the GD graphics library',//'开启登录验证码失败!服务器空间不支持GD图形库',
 'verification_code_comment_not_supported' =>'Open verification code for comments failed! Server does not support the GD graphics library.',//'开启评论验证码失败!服务器空间不支持GD图形库',

//---------------------------
//admin/data.php
 'backup_directory_not_writable'	=> 'Backup failed. Backup directory (content/backup) is not writable.',//'备份失败。备份目录(content/backup)不可写',
 'backup_create_file_error'	=> 'Create a backup file failed. Backup directory (content/backup) is not writable.',//'创建备份文件失败。备份目录(content/backup)不可写',
 'backup_empty' 		=> 'Nothing to backup. Database tables have no any content.',//'数据表没有任何内容',
 'file_not_exists'		=> 'File does not exist',//'文件不存在',
 'import_only_emlog'		=> 'You can import only emlog SQL backup file',//'只能导入emlog备份的SQL文件',
 'info_illegal'			=> 'Submitted information is illegal',//'非法提交的信息',
 'attachment_exceed_system_limit'	=> 'Attachment size exceeds the system limit ',//'附件大小超过系统 ',//+end space
// '_limit'			=> ' ',//' limit',//'限制',//LEAVE THIS EMPTY???
 'upload_failed_code'		=> 'Upload failed. Error code: ',//'上传文件失败,错误码: ',
 'import_only_emlog_no_change'	=> 'You can only import emlog backup archive, and the archive file name can not be changed!',//'只能导入emlog备份的压缩包，且不能修改压缩包文件名！',
// 'import_only_emlog'		=> 'You can import only emlog SQL backup file',//'只能导入emlog备份的SQL文件',
 'import_failed_not_read'	=> 'Import failed! Can not read the file',//'导入失败！读取文件失败',
 'import_failed_not_emlog'	=> 'Import failed! The backup file is not the emlog backup file!',//'导入失败！该备份文件不是 emlog的备份文件!',
 'import_failed_not_emlog_ver'	=> 'Import failed! The backup file is not the emlog ' . EMLOG_VERSION . ' backup file!',//'导入失败！该备份文件不是emlog ' . EMLOG_VERSION . '  生成的备份!',
 'import_failed_bad_prefix'	=> 'Import failed! The database backup file prefix does not match the current system database prefix ',//'导入失败！备份文件中的数据库前缀与当前系统数据库前缀不匹配 ',

//---------------------------
//admin/globals.php
// 'no_permission'	=> 'Insufficient permissions!',//'权限不足！',

//---------------------------
//admin/index.php
 'supported'		=> 'Supported',//'支持',
 'not_supported'	=> 'NOT supported',//'不支持',
 'phpinfo_disabled'	=> 'phpinfo function is disabled!',//'phpinfo函数被禁用!',

//---------------------------
//admin/plugin.php
 'plugin_upload_error'	=> 'Plugin upload failed',//'插件上传失败',

//---------------------------
//admin/store.php
 'template'		=> 'Template',//'模板',
 'template_view'	=> 'View template',//'查看模板',
 'plugin'		=> 'Plugin',//'插件',
 'plugins'		=> 'Plug-ins',//'插件',
 'plugin_view'		=> 'View Plugin',//'查看插件',

//---------------------------
//admin/style.php
// 'user'	=> 'User',//'作者',
// 'users'	=> 'Users',//'作者',

//---------------------------
//admin/template.php
 'ok_for_emlog'		=> 'Suitable for emlog: ',//'适用于emlog: ',
// 'user'		=> 'User',//'作者'
// 'user'		=> 'User',//'作者',
 'template_upload_failed'	=> 'Template upload failed',//'模板上传失败',

//---------------------------
//admin/views/add_page.php
 'add_page'		=> 'Add page',//'新建页面',
 'page_title_info'	=> 'Enter the page title',//'输入页面标题',
// 'upload_insert'	=> 'Insert upload',//'上传插入',
 'link_alias'		=> 'Link Alias',//'链接别名',
 'link_alias_info'	=> 'The page link custom address. Required',//'用于自定义该页面的链接地址。需要',
 'link_alias_enable'	=> 'Enable Link Alias',//'启用链接别名',
 'page_template'	=> 'Page template: ',//'页面模板：',
 'page_template_info'	=> '(For custom page template, use the corresponding .php file under the template directory)',//'（用于自定义页面模板，对应模板目录下.php文件）',
 'page_enable_comments'	=> 'Page accepted comments',//'页面接受评论'
 'page_publish'		=> 'Publish Page',//'发布页面',
 'save'			=> 'Save',//'保存',

//---------------------------
//admin/views/admin_page.php
 'page_management'	=> 'Page management',//'页面管理',
 'page_deleted_ok'	=> 'Page has been removed successfully',//'删除页面成功',
 'page_published_ok'	=> 'Page has been published successfully',//'发布页面成功',
 'page_disabled_ok'	=> 'Page has been disabled successfully',//'禁用页面成功',
 'page_saved_ok'	=> 'Page has been saved successfully',//'页面保存成功',
// 'title'		=> 'Title',//'标题',
// 'comments'		=> 'Comments',//'评论',
// 'time'		=> 'Date',//'时间',
// 'draft'		=> 'Draft',//'草稿',
 'page_view'		=> 'View page',//'查看页面',
// 'attachments'	=> 'Attachments',//'附件',
 'no_pages'		=> 'No pages',//'还没有页面',
// 'select_all'		=> 'Select all',//'全选',
// 'selected_items'	=> 'Selected items',//'选中项',
// 'delete'		=> 'Delete',//'删除',
 'make_draft'		=> 'Convert to draft',//'转为草稿',
// 'publish'		=> 'Publish',//'发布',
// 'add_page'		=> 'Add page',//'新建页面',
// 'have'		=> 'Have ',//'有',
 '_pages'		=> ' pages',//'个页面',
 'select_page_to_operate'	=> 'Please, select the page to operate',//'请选择要操作的页面',
 'sure_delete_selected_pages'	=> 'Are you sure you want to delete selected pages?',//'你确定要删除所选页面吗？',

//---------------------------
//admin/views/attlib.php
 'attachment_upload'	=> 'Upload attachment',//'上传附件',
 'bulk_upload'		=> 'Bulk upload',//'批量上传',//'('
 'attachment_library'	=> 'Attachment Library',//'附件库',
// ')',//'）',
 'no_attachments'	=> 'The post has no attachment',//'该文章没有附件',
 'insert'		=> 'Insert',//'插入 ',
 'insert_full_size'	=> 'Insert full size image',//'插入原图',
 'full_size'		=> 'Full size image',//'原图',
 'insert_thumbnail'	=> 'Insert thumbnail',//'插入缩略图',
 'thumbnail'		=> 'Thumbnail',//'缩略图',
// 'insert'		=> 'Insert',//'插入',
// 'delete'		=> 'Delete',//'删除',

//---------------------------
//admin/views/configure.php
// 'basic_settings'	=> 'Basic Settings',//'基本设置',
// 'seo_settings'	=> 'SEO Settings',//'SEO设置',
// 'background_style'	=> 'Background style',//'后台风格',
// 'personal_settings'	=> 'Personal Settings',//'个人设置',
 'settings_saved_ok'	=> 'Settings have been saved successfully',//'设置保存成功',
 'site_title'		=> 'Site title',//'站点标题',
 'site_subtitle'	=> 'Site subtitle',//'站点副标题',
 'site_address	'	=> 'Site address',//'站点地址',
 'per_page'		=> 'Show per page',//'每页显示',
 '_posts'		=> 'posts',//'篇文章',
 'your_timezone'	=> 'Your time zone',//'你所在时区',
 'tz-12'	=> '[-12:00] Dateline West',//'(标准时-12) 日界线西',
 'tz-11'	=> '[-11:00] Midway Island, Samoa',//'(标准时-11) 中途岛、萨摩亚群岛',
 'tz-10'	=> '[-10:00] Hawaii',//'(标准时-10) 夏威夷',
 'tz-9'		=> '[-09:00] Alaska',//'(标准时-9) 阿拉斯加',
 'tz-8'		=> '[-08:00] Pacific Time (U.S. & Canada)',//'(标准时-8) 太平洋时间(美国和加拿大)',
 'tz-7'		=> '[-07:00] Mountain Time (U.S. & Canada)',//'(标准时-7) 山地时间(美国和加拿大)',
 'tz-6'		=> '[-06:00] Central Time (U.S. & Canada), Mexico City',//'(标准时-6) 中部时间(美国和加拿大)、墨西哥城',
 'tz-5'		=> '[-05:00] Eastern Time (U.S. & Canada), Bogota',//'(标准时-5) 东部时间(美国和加拿大)、波哥大',
 'tz-4'		=> '[-04:00] Atlantic Time (Canada), Caracas',//'(标准时-4) 大西洋时间(加拿大)、加拉加斯',
 'tz-3.5'	=> '[-03:30] Newfoundland',//'(标准时-3:30) 纽芬兰',
 'tz-3'		=> '[-03:00] Brazil, Buenos Aires, Georgetown',//'(标准时-3) 巴西、布宜诺斯艾利斯、乔治敦',
 'tz-2'		=> '[-02:00] Mid-Atlantic',//'(标准时-2) 中大西洋',
 'tz-1'		=> '[-01:00] Azores, Cape Verde Islands',//'(标准时-1) 亚速尔群岛、佛得角群岛',
 'tz0'		=> '[ 00:00] Western European Time, London, Casablanca',//'(标准时) 西欧时间、伦敦、卡萨布兰卡',
 'tz1'		=> '[+01:00] Central European Time, Angola, Libya',//'(标准时+1) 中欧时间、安哥拉、利比亚',
 'tz2'		=> '[+02:00] Eastern European Time, Cairo, Athens',//'(标准时+2) 东欧时间、开罗，雅典',
 'tz3'		=> '[+03:00] Baghdad, Kuwait',//'(标准时+3) 巴格达、科威特、莫斯科',
 'tz3.5'	=> '[+03:30] Tehran',//'(标准时+3:30) 德黑兰',
 'tz4'		=> '[+04:00] Abu Dhabi, Baku, Moscow, Muscat',//'(标准时+4) 阿布扎比、马斯喀特、巴库',
 'tz4.5'	=> '[+04:30] Kabul',//'(标准时+4:30) 喀布尔',
 'tz5'		=> '[+05:00] Ekaterinburg, Islamabad, Karachi',//'(标准时+5) 叶卡捷琳堡、伊斯兰堡、卡拉奇',
 'tz5.5'	=> '[+05:30] Bombay, Calcutta, New Delhi',//'(标准时+5:30) 孟买、加尔各答、新德里',
 'tz6'		=> '[+06:00] Almaty, Dhaka, New Elijah Abel',//'(标准时+6) 阿拉木图、 达卡、新亚伯利亚',
 'tz7'		=> '[+07:00] Bangkok, Hanoi, Jakarta',//'(标准时+7) 曼谷、河内、雅加达',
 'tz8'		=> '[+08:00] Beijing, Chongqing, Hong Kong, Singapore',//'(标准时+8) 北京、重庆、香港、新加坡',
 'tz9'		=> '[+09:00] Tokyo, Seoul, Osaka, Yakutsk',//'(标准时+9) 东京、汉城、大阪、雅库茨克',
 'tz9.5'	=> '[+09:30] Adelaide, Darwin',//'(标准时+9:30) 阿德莱德、达尔文',
 'tz10'		=> '[+10:00] Sydney, Guam',//'(标准时+10) 悉尼、关岛',
 'tz11'		=> '[+11:00] Magadan, Solomon Islands',//'(标准时+11) 马加丹、索罗门群岛',
 'tz12'		=> '[+12:00] Auckland, Wellington, Kamchatka',//'(标准时+12) 奥克兰、惠灵顿、堪察加半岛',
 'local_time'			=> 'Local Time',//'本地时间',
 'function_switch'		=> 'Function switch',//'功能开关',
 'login_verification_code'	=> 'Login verification code',//'登录验证码',
// 'image_attachment_thumbnails'	=> 'Image Attachment thumbnails',//'图片附件缩略图',
 'gzip_compression'		=> 'Gzip compression',//'Gzip压缩',
 'offline_writing'		=> 'Offline Writing (Support the use of tools such as Windows Live Writer to write articles)',//'离线写作（支持用Windows Live Writer等工具写文章）',
 'mobile_access_address'	=> 'Mobile Access version, address',//'手机访问版，地址',
 'access_site_by_mobile'	=> 'Access to your site using a mobile phone',//'用手机访问你的站点',
 'auto_summary'			=> 'Automatic summary, intercept from the post',//'自动摘要，截取文章的前',
 'characters_as_summary'	=> ' characters as the summary',//'个字作为摘要',
// 'twitters'			=> 'Twitters',//'微语',
// 'twitters_enable'		=> 'Enable twitters, ',//'开启微语，',
// 'per_page'			=> 'Show per page',//'每页显示',
// '_twitters'			=> ' twitters',//'条微语',
// 'twitter_reply_enable'	=> 'Enable twitter reply, ',//'开启微语回复，',
 'reply_verification_code'	=> 'Reply verification code, ',//'回复验证码，',
 'reply_audit'			=> 'Reply audit',//'回复审核',
 'rss'				=> 'RSS',//'RSS',
 'export'			=> 'Export ',//'输出',
 '_posts_and_output'		=> ' posts, and output',//'篇文章，且输出',
 'full_text'			=> 'Full Text',//'全文',
 'summary'			=> 'Summary',//'摘要',
// 'comments'			=> 'Comments',//'评论',
 'enable_comment_interval'	=> ' Enable comments, comment interval ',//'开启评论，发表评论间隔',
 '_seconds'			=> ' seconds',//'秒',
 'comment_moderation'		=> 'Comment moderation',//'评论审核',
 'comment_verification_code'	=> 'Comments Verification Code',//'评论验证码',
 'comment_avatar'		=> 'Comments author avatar',//'评论人头像',
 'comment_must_contain_chinese'	=> 'Comments must contain Chinese',//'评论内容必须包含中文',
 'comment_per_page'		=> 'Comments per page, ',//'评论分页，',
// 'per_page'			=> 'Show per page ',//'每页显示',
 '_comments_'			=> ' comments, ',//'条评论，',
 'newer'			=> 'Newer',//'较新的',
 'older'			=> 'Older',//'较旧的',
 'standing_in_front'		=> 'Standing in front',//'排在前面',
// 'attachments'		=> 'Attachments',//'附件',
 'upload_max_size'		=> 'Upload attachment maximum size',//'附件上传最大限制',
 'php_upload_max_size'		=> 'Upload file has been configured by server PHP maximum upload space ',//'上传文件还受到服务器空间PHP配置最大上传'
 'allow_attach_type'		=> 'Allow attachment types to upload',//'允许上传的附件类型',
 'separate_by_comma'		=> ' (Separate multiple by comma)',//'（多个用半角逗号分隔）',
 'thumbnail_max_size'		=> 'Uploaded pictures generated thumbnail maximum size: ',//'上传图片生成缩略图，最大尺寸：',
 'unit_pixels'			=> ' (Unit: pixels)',//'（单位：像素）',
 'icp_reg_no'			=> 'ICP Registration No.',//'ICP备案号',
 'home_footer_info'		=> 'Home footer information',//'首页底部信息',
 'home_footer_info_html'	=> '(HTML supported, can be used to add a traffic statistics code)',//'(支持html，可用于添加流量统计代码)',
 'save_settings'		=> 'Save Settings',//'保存设置',

//---------------------------
//admin/views/data.php
 'data_backup'			=> 'Data Backup',//'数据备份',
 'backup_delete_ok'		=> 'Backup file deleted successfully',//'备份文件删除成功',
 'backup_create_ok'		=> 'Data backup created successfully',//'数据备份成功',
 'backup_import_ok'		=> 'Backup imported successfully',//'备份导入成功',
 'backup_file_select'		=> 'Please select the backup file you want to delete',//'请选择要删除的备份文件',
 'backup_file_invalid'		=> 'Invalid backup file name (use only letters, digits and underscore)',//'备份文件名错误(应由英文字母、数字、下划线组成)',
 'backup_import_zip_unsupported'	=> 'Server does not support zip, can not import zip backup',//'服务器不支持zip，无法导入zip备份',
 'backup_upload_failed'			=> 'Backup Upload Failed',//'上传备份失败',
 'backup_file_wrong'			=> 'Wrong backup file',//'错误的备份文件',
 'backup_export_zip_unsupported'	=> 'Server does not support zip, zip backup can not be exported',//'服务器不支持zip，无法导出zip备份',
 'cache_update_ok'		=> 'Cache updated successfully',//'缓存更新成功',
 'backup_file'			=> 'Backup file',//'备份文件',
 'backup_time'			=> 'Backup time',//'备份时间',
 'file_size'			=> 'File size',//'文件大小',
 'import'			=> 'Import',//'导入',
 'backup_no'			=> 'No backups found',//'还没有备份',
// 'select_all'			=> 'Select all',//'全选',
// 'selected_items'		=> 'Selected items',//'选中项',
// 'delete'			=> 'Delete',//'删除',
 'db_backup'			=> 'Database Backup',//'备份数据库',
 'backup_create'		=> 'Create Backup',//'备份数据',//'备份数据+',
 'backup_import_local'		=> 'Import Local Backup',//'导入本地备份',
 'cache_update'			=> 'Update cache',//'更新缓存',
// 'spacer'			=> ' ',//'　',//It is the empty space between two words
 'backup_choose_table'		=> 'Choose the database table to backup',//'选择要备份的数据库表',
 'backup_export_to'		=> 'Export database backup to',//'将站点内容数据库备份到',
 'backup_local'			=> 'Local (your computer)',//'本地（自己电脑）',
 'backup_server'		=> 'Server',//'服务器空间',
 'compress_zip'			=> 'Compress to zip format',//'压缩成zip包',
 'backup_file_name'		=> 'Backup file name',//'备份文件名',
 'backup_start'			=> 'Start Backup',//'开始备份',
 'backup_version_tip'		=> 'You can import only the same emlog version database backup files, and the database table prefix must be the same.<br />Current database table prefix: ',//'仅可导入相同版本emlog导出的数据库备份文件，且数据库表前缀需保持一致。<br />当前数据库表前缀：',
// 'import'			=> 'Import',//'导入',
 'cache_update_info'		=> 'Caching can speed up the site loading speed. Usually the system will automatically update the cache, no manual operation required. But in some special cases, such as the cache file or the database were modified manually, and so the page appears abnormal, it is only need to update the cache manually.',//'缓存可以加快站点的加载速度。通常系统会自动更新缓存，无需手动。有些特殊情况，比如缓存文件被修改、手动修改过数据库、页面出现异常等才需要手动更新。',
 'cache_update'			=> 'Update the cache',//'更新缓存',
 'backup_file_select'		=> 'Please select the backup file you want to operate',//'请选择要操作的备份文件',
 'backup_delete_sure'		=> 'Are you sure you want to delete the selected backup files? ',//'你确定要删除所选备份文件吗？',
//// 'backup_format_supported'	=> '(supports emlog backup exported to sql and zip format)',//'(支持emlog导出的sql及zip格式备份)',
//// 'data_cache'		=> 'Data Cache',//'数据缓存',

//---------------------------
//admin/views/edit_page.php
 'page_edit'			=> 'Edit Page',//'编辑页面',
// 'page_title_info'		=> 'Enter the page title',//'输入页面标题',
// 'upload_insert'		=> 'Insert upload',//'上传插入',
// 'link_alias'			=> 'Link Alias',//'链接别名',
// 'link_alias_info'		=> 'The page link custom address. Required',//'用于自定义该页面的链接地址。需要',
// 'link_alias_enable'		=> 'Enable Link Alias',//'启用链接别名',
// 'page_template'		=> 'Page template: ',//'页面模板：',
// 'page_template_info'		=> '(For custom page template, use the corresponding .php file under the template directory)',//'（用于自定义页面模板，对应模板目录下.php文件）',
// 'page_enable_comments'	=> 'Page accepted comments',//'页面接受评论',
// 'save_and_return'		=> 'Save and Return',//'保存并返回',
// 'save'			=> 'Save',//'保存',

//---------------------------
//admin/views/footer.php
 'welcome_using'	=> 'Welcome using the',//'欢迎使用',

//---------------------------
//admin/views/header.php
 'admin_center'		=> 'AdminCP',//'管理中心',
 'return_to_admin_center'	=> 'Return to AdminCP',//'返回管理首页',
 'to_site_new_window'	=> 'Visit the site in a new window',//'在新窗口浏站点',
 'to_site'		=> 'View My site',//'查看我的站点',
 'settings'		=> 'Settings',//'设置',
 'logout'		=> 'Logout',//'退出',
// 'post_write'		=> 'Write post',//'写文章',
// 'draft'		=> 'Draft',//'草稿',
// 'posts'		=> 'posts',//'文章',
 'posts_pending'	=> ' Pending posts',//'篇文章待审',
// 'tags'		=> 'Tags',//'标签',
// 'categories'		=> 'Categories',//'分类',
// 'comments'		=> 'Comments',//'评论',
 'comments_pending'	=> ' Pending comments',//'条评论待审',
// 'twitters'		=> 'Twitters',//'微语',
 'sidebar'		=> 'Sidebar',//'侧边栏',
 'navigation'		=> 'Navigation',//'导航',
 'pages'		=> 'Pages',//'页面',
 'links'		=> 'Links',//'链接',
 'users'		=> 'Users',//'用户',
 'data'			=> 'Data',//'数据',
// 'plugins'		=> 'Plug-ins',//'插件',
// 'templates'		=> 'Templates',//'模板',
 'applications'		=> 'Apps',//'应用',
 'extensions'		=> 'Extensions',//'扩展功能',
// '<!--Sidebar Toggle-->',//'<!--边栏折叠-->'

//---------------------------
//admin/views/index.php
// 'twitter_write_placeholder'	=> 'Write some words to the twitter...',//'用微语记录生活 ……',
// 'publish'			=> 'Publish',//'发布',
 'cancel'			=> 'Cancel',//'取消',
// 'twitter_write_length'	=> '(You can enter 140 characters maximum)',//'(你还可以输入140字)',
 'site_info'			=> 'Site Info',//'站点信息',
// 'have'			=> 'Have ',//'有',
// '_posts'			=> ' posts',//'篇文章',
// '_comments'			=> ' comments',//'条评论',
// '_twitters'			=> ' twitters',//'条微语',
 'db_prefix'			=> 'Database table prefix',//'数据库表前缀',
 'php_version'			=> 'PHP version',//'PHP版本',
 'mysql_version'		=> 'MySQL version',//'MySQL版本',
 'server_environment'		=> 'Server environment',//'服务器环境',
 'gd_library'			=> 'GD graphic library',//'GD图形处理库',
 'server_max_upload_size'	=> 'Maximum upload file size allowed by server',//'服务器空间允许上传最大文件',
 'more_php_info'		=> 'More Info&raquo;',//'更多信息&raquo;',
 'official_source'		=> 'Official sources',//'官方消息',
 'using_emlog'			=> 'You are using emlog',//'您正在使用emlog',
 'update_check'			=> 'Check for updates',//'检查更新',
 'reading'			=> 'Is reading...',//'正在读取...',
 'checking_wait'		=> 'Is checking, please wait',//'正在检查，请稍后',
 'updates_no'			=> 'There is no updates for your current version!',//'目前还没有适合您当前版本的更新！',
 'update_exists'		=> 'It is available emlog updated version ',//'有可用的emlog更新版本 ',
 'backup_before_update'		=> ' Do not forget to make a backup before updating job, ',//' ，更新之前请您做好数据备份工作，',
 'update_now'			=> 'Update now',//'现在更新',
 'update_check_failed'		=> 'Check failed, may be a network problem exists',//'检查失败，可能是网络问题',
 'updating'			=> 'Updating the system, please be patient',//'系统正在更新中，请耐心等待',
 'update_completed'		=> 'Congratulations! Update is successfully completed, please ',//'恭喜您！更新成功了，请',
 'page_refresh'			=> 'Refresh the page',//'刷新页面',
 'start_new_emlog'		=> ' Start experiencing the new emlog version',//'开始体验新版emlog',
 'update_download_failed'	=> 'Download the update failed, may be a network problem exists',//'下载更新失败，可能是服务器网络问题',
 'update_extract_failed'	=> 'Extract the update failed, may be the server does not support the zip extension',//'解压更新失败，可能是你的服务器空间不支持zip模块',
 'update_failed_nonwritable'	=> 'Update failed, the directory is not writable',//'更新失败，目录不可写',
 'update_failed'		=> 'Update failed',//'更新失败',
 'you_can_enter'		=> '(You can enter ',//'(你还可以输入',
 '_characters'			=> ' characters',//'字',
 'exceeds'			=> 'has been exceeded ',//'已超出',
// '_characters'		=> ' characters',//'字',
// 'twitter_write_length'	=> '(You can enter 140 characters maximum)',//'(你还可以输入140字)',
// 'twitter_write_placeholder'	=> 'Write some words to the twitter...',//'用微语记录生活……',
// '('				=> '(',//'（',
// '_posts'			=> ' posts',//'篇文章',
// '_comments'			=> 'comments',//'条评论',
// ')'				=> ')',//'）',

//---------------------------
//admin/views/plugin.php
 'plugin_manage'		=> 'Plugin Management',//'插件管理',
 'plugin_upload_ok'		=> 'Plugin uploaded successfully, please activate it to use',//'插件上传成功，请激活使用',
 'plugin_active_ok'		=> 'Plug-in activated successfully',//'插件激活成功',
// 'deleted_ok'			=> 'Deleted successfully',//'删除成功',
 'plugin_active_failed'		=> 'Plug-in activation failed',//'插件激活失败',
 'plugin_disable_ok'		=> 'Plug-in disabled successfully',//'插件禁用成功',
 'plugin_delete_failed'		=> 'Delete failed, check the plug-in file permissions',//'删除失败，请检查插件文件权限',
// 'status'			=> 'Status',//'状态',
 'version'			=> 'Version',//'版本',
// 'description'		=> 'Description',//'描述',
 'plugin_active_ok'		=> 'Click to activate the plug-in',//'点击激活插件',
 'plugin_disable_ok'		=> 'Click to disable the plug-in',//'点击禁用插件',
 'plugin_settings_click'	=> 'Click to plug-in settings',//'点击设置插件',
// 'more_info'			=> 'More Info&raquo;',//'更多信息&raquo;',
// 'ok_for_emlog'		=> 'Suitable for emlog',//'适用于emlog',
// 'user'			=> 'User',//'作者',
// 'delete'			=> 'Delete',//'删除',
 'plugin_no_installed'		=> 'No installed plugins',//'还没有安装插件',
 'plugin_install'		=> 'Install plugin',//'安装插件',

//---------------------------
//admin/views/plugin_install.php
// 'plugin_install'		=> 'Install plugin',//'安装插件',
 'plugin_zipped_only'		=> 'Supports plug-in package only in zip compression format',//'只支持zip压缩格式的插件包',
 'plugin_upload_failed_nonwritable'	=> 'Upload failed, plugin directory (content/plugins) is not writable',//'上传失败，插件目录(content/plugins)不可写',
 'plugin_zip_nonsupport'	=> 'Server does not support zip module, follow the prompts to install the plugin manually' ,//'空间不支持zip模块，请按照提示手动安装插件',
 'plugin_zip_select'		=> 'Please select a zipped plug-in installation package',//'请选择一个zip插件安装包',
 'plugin_install_failed_wrong_format'	=> 'Installation failed, plug-in installation package does not meet the standards',//'安装失败，插件安装包不符合标准',
 'plugin_install_manually'	=> 'Install the plug-in manually',//'手动安装插件',
 'install_promt_1'		=> '1) Unzip the plugin file and upload it to the content/plugins directory.',//'1、把解压后的插件文件夹上传到 content/plugins 目录下。',
 'install_prompt2'		=> '2) Log in to AdminCP, go to Plug-in management, and if the plug-in is already listed, you can click on it to activate it.',//'2、登录后台进入插件管理,插件管理里已经有了该插件，点击激活即可。',
 'upload_install'		=> 'Upload installation',//'上传安装',
 'upload_install_info'		=> '(Upload a plug-in installation package in zip compressed format)',//'（上传一个zip压缩格式的插件安装包）',
 'plugin_get_more'		=> 'Get More Plugins',//'获取更多插件',
 'app_center'			=> 'App center &raquo;',//'应用中心&raquo;',

//---------------------------
//admin/views/seo.php
// 'basic_settings'		=> 'Basic Settings',//'基本设置',
// 'seo_settings'		=> 'SEO Settings',//'SEO设置',
// 'background_style'		=> 'Background style',//'后台风格',
// 'personal_settings'		=> 'Personal Settings',//'个人设置',
// 'settings_saved_ok'		=> 'Settings have been saved successfully',//'设置保存成功',
 'htaccess_not_writable'	=> 'Save failed: .htaccess file in the root directory is not writable',//'保存失败：根目录下的.htaccess不可写',
 'post_url_settings'		=> 'Post URL settings',//'文章链接设置',
 'post_url_rewriting'		=> 'Here you can modify the form of the post link. If the post URL can not be accessed, may be your server environment does not support the URL rewriting. Please restore back the default form, and disable the article post alias connection.',//'你可以在这里修改文章链接的形式，如果修改后文章无法访问，那可能是你的服务器空间不支持URL重写，请修改回默认形式、关闭文章连接别名。',
 'post_url_custom'		=> 'You can customize the of link enabled alias address for defined articles and pages.',//'启用链接别名后可以自定义文章和页面的链接地址。',
 'default_format'		=> 'Default format',//'默认形式',
 'file_format'			=> 'File format',//'文件形式',
 'directory_format'		=> 'Directory format',//'目录形式',
 'category_format'		=> 'Category format',//'分类形式',
// 'post_alias_enable'		=> 'Enable post link alias',//'启用文章链接别名',
 'enable_html_suffix'		=> 'Enable html suffix for article link alias',//'启用文章链接别名html后缀',
 'meta_settings'		=> 'Meta settings',//'meta信息设置',
 'meta_title'			=> 'Site Browser Title (title)',//'站点浏览器标题(title)',
 'meta_keywords'		=> 'Site keywords (keywords)',//'站点关键字(keywords)',
 'meta_description'		=> 'Site Browser Description (description)',//'站点浏览器描述(description)',
 'meta_title_scheme'		=> 'Post browser title scheme',//'文章浏览器标题方案',
 'post_title'			=> 'Post title',//'文章标题',
 'post_title_site_title'	=> 'Post title - Site title',//'文章标题 - 站点标题',
 'post_title_site_meta_title'	=> 'Post title - Site browser title',//'文章标题 - 站点浏览器标题',
// 'save_settings'		=> 'Save Settings',//'缓存更新成功保存设置',

//---------------------------
//admin/views/store.php
// 'app_center'		=> 'App center',//'应用中心',

//---------------------------
//admin/views/store_install.php
 'install'			=> 'Install',//'安装',
 'package_downloading'		=> 'Downloading package...',//'正在下载安装中',
 'plugin_install_ok'		=> 'Plugin has been installed successfully',//'安装成功，',
 'plugin_download_failed'	=> 'Download failed. It may be network problem. Please, download and install manually.',//'下载失败，可能是服务器网络问题，请手动下载安装，',
 'return_app_center'		=> 'Return to app center',//'返回应用中心',
 'install_failed_zip_nonsupport'	=> 'Installation failed. It seems your server does not support zip module. Please, download and install manually.',//'安装失败，可能是你的服务器空间不支持zip模块，请手动下载安装，',
// 'return_app_center'		=> 'Return to app center',//'返回应用中心',
 'install_failed_folder_nonwritable'	=> 'Installation failed. Probably, directory is not wirtable.',//'安装失败，可能是应用目录不可写，',
// 'return_app_center'		=> 'Return to app center',//'返回应用中心',
 'install_failed'		=> 'Installation failed.',//'安装失败，',
// 'return_app_center'		=> 'Return to app center',//'返回应用中心',

//---------------------------
//admin/views/style.php
// 'basic_settings'	=> 'Basic Settings',//'基本设置',
// 'seo_settings'	=> 'SEO Settings',//'SEO设置',
// 'background_style'	=> 'Background style',//'后台风格',
// 'personal_settings'	=> 'Personal Settings',//'个人设置',
// 'settings_saved_ok'	=> 'Settings have been saved successfully',//'设置保存成功',
 'use_this_style'	=> 'Click to use this style',//'点击使用该风格',
// 'use_this_style'	=> 'Click to use this style',//'点击使用该风格',

//---------------------------
//admin/views/tag.php

//---------------------------
//admin/views/tag.php
 '_save_'	=> ' Save ',//'保 存',
 '_cancel_'	=> ' Cancel ',//'取 消',

//---------------------------
//admin/views/template.php
 'template_current'		=> 'Current template',//'当前模板',
 'template_mount'		=> 'Mounting template',//'安装模板',
 'template_change_ok'		=> 'Template have been replaced successfully',//'模板更换成功',
 'template_current_use'		=> 'Currently used template',//'当前使用的模板',
 'template_damaged'		=> 'This template has been damaged! Please choose another template.',//'已被删除或损坏，请选择其他模板。',
 'template_top_image'		=> 'Custom top image',//'自定义顶部图片',
 'template_library'		=> 'Template library',//'模板库',
 'template_upload_ok'		=> 'Template have been uploaded successfully',//'模板上传成功',
 'template_delete_ok'		=> 'Template have been removed successfully',//'删除模板成功',
 'template_delete_failed'	=> 'Delete failed, check the template file permissions',//'删除失败，请检查模板文件权限',
 'template_use_this'		=> 'Click to use this template',//'点击使用该模板',
// 'delete'			=> 'Delete',//'删除',

//---------------------------
//admin/views/template_crop.php
 'image_crop'		=> 'Crop image',//'裁剪图片',
// 'template_change_ok'	=> 'Template have been replaced successfully',//'模板更换成功',
 'crop_and_save'	=> 'Crop and save',//'剪裁并保存',
 'crop_cancel'		=> 'Cancel crop',//'取消裁剪',
 'crop_load_prompt'	=> '(When page loading is completed, but it is not appear in the select area, then press the left mouse button to drag the selected manually)',//'(页面加载完毕后，未出现选择区域时请按下鼠标左键手动拖曳选取)',

//---------------------------
//admin/views/template_install.php
// 'template_current'		=> 'Current template',//'当前模板',
// 'template_mount'		=> 'Mounting template',//'安装模板',
 'template_zip_support'		=> 'Only supported for .zip files.',//'只支持zip压缩格式的模板包',
 'template_upload_failed_nonwritable'	=> 'Upload failed. Template directory (content/templates) cannot be written.',//'上传失败，模板目录(content/templates)不可写',
 'template_no_zip_install_manually'	=> 'Server does not support zip module, follow the prompts to install the template manually',//'空间不支持zip模块，请按照提示手动安装模板',
 'template_select_zip'		=> 'Please select a zipped template installation package',//'请选择一个zip模板安装包',
 'template_non_standard'	=> 'Installation failed, template installation package does not meet the standards',//'安装失败，模板安装包不符合标准',
 'template_install_manual'	=> 'Template manual installation',//'手动安装模板',
 'template_install_prompt1'	=> '1) After extracting the template files upload the template folder to the content/templates directory.',//'1、把解压后的模板文件夹上传到 content/templates目录下。,
 'template_install_prompt2'	=> '2) Log in to the AdminCP to change a template. If template library already have a template you just added, then click on it to use this template.',//'2、登录后台换模板，模板库中已经有了你刚才添加的模板，点击使用即可。',
// 'upload_install'		=> 'Upload installation',//'上传安装',
 'template_upload_prompt'	=> '(Upload .zip file that contains installation package)',//'(上传一个zip压缩格式的模板安装包)',
 'template_get_more'		=> 'Get more templates',//'获取更多模板',
// 'app_center'			=> 'App center &raquo;',//'应用中心&raquo;',

//---------------------------
//admin/views/template_top.php
// 'template_top_image'	=> 'Custom top image',//'自定义顶部图片',
 'image_replace_ok'	=> 'Image has been replaced successfully.',//'顶部图片更换成功',
// 'deleted_ok'		=> 'Deleted successfully',//'删除成功',
 'image_crop_error'	=> 'Image crop error',//'裁剪图片失败',
 'top_image_unavailable'	=> 'Current top image is unused or deleted',//'当前未使用顶部图片或者使用中的顶部图片被删除',
 'images_optional'	=> 'Optional images',//'可选图片',
 'image_click_to_use'	=> 'Click on image to use it',//'点击使用该图片',
// 'delete'		=> 'Delete',//'删除',
 'top_image_not_use'	=> 'Do not use the top image.',//'不使用顶部图片',
// 'top_image_not_use'	=> 'Do not use the top image.',//'不使用顶部图片',
 'top_image_custom'	=> 'Custom image',//'自定义图片',
 'upload'		=> 'Upload',//'上传',
 'top_image_upload_prompt'	=> '(Upload your favourite picture to top. Supported formats: jpg, png.)',//'(上传一张你喜欢的顶部图片，支持JPG、PNG格式)',

//---------------------------
//admin/views/upload.php
// 'attachment_upload'	=> 'Upload attachment',//'上传附件',
// 'bulk_upload'	=> 'Bulk upload',//'批量上传',
// 'attachment_library'	=> 'Attachment Library',//'附件库',
// '('			=> '(',//'（',
// ')'			=> ' )',//' ）',
 'attach_max_size'	=> 'Maximum size of single attachment',//'单个附件最大',
// ','			=> ',',//'，',
 'types_allowed'	=> 'Allowed types',//'允许类型',
// 'upload'		=> 'Upload',//'上传',
 'attachment_add'	=> 'Add attachment',//'增加附件',
// 'plus_button'	=> '[ + ]',//'[ + ]',
 'attach_reduce'	=> 'Reduce attachments',//'减少附件',
// 'minus_button'	=> '[ - ]',//'[ - ]',

//---------------------------
//admin/views/upload_multi.php
// 'attachment_upload'	=> 'Upload attachment',//'上传附件',
// 'bulk_upload'	=> 'Bulk upload',//'批量上传',
// 'attachment_library'	=> 'Attachment Library',//'附件库',
// ')'			=> ')',//'）',
 'browser_upgrade'	=> 'Your browser is too old to display this feature. You cannot use the bulk upload. Please, upgrade your web browser or switch to another.',//'您正在使用的浏览器版本太低，无法使用批量上传功能。为了更好的使用emlog，建议您升级浏览器或者换用其他浏览器。',
 'file_select'		=> 'Select the file',//'选择文件',

//---------------------------
//admin/views/widgets.php
 'widget_manage'	=> 'Sidebar widget management',//'侧边栏组件管理',
// 'settings_saved_ok'	=> 'Settings have been saved successfully',//'设置保存成功',
// 'blogger'		=> 'Personal information',//'个人资料',
// 'title'		=> 'Title',//'标题',
 'change'		=> 'Change',//'更改',
 'calendar'		=> 'Calendar',//'日历',
// 'title'		=> 'Title',//'标题',
// 'change'		=> 'Change',//'更改',
 'twitter_latest'	=> 'Latest twits',//'最新微语',
// 'title'		=> 'Title',//'标题',
 'twitter_latest_num'	=> 'Number of latest twits',//'首页显示最新微语数',
// 'change'		=> 'Change',//'更改',
// 'tags'		=> 'Tags',//'标签',
// 'title'		=> 'Title',//'标题',
// 'change'		=> 'Change',//'更改',
// 'categories'		=> 'Categories',//'分类',
// 'title'		=> 'Title',//'标题',
// 'change'		=> 'Change',//'更改',
// 'archive'		=> 'Archive',//'存档',
// 'title'		=> 'Title',//'标题',
// 'change'		=> 'Change',//'更改',
// 'new_comments'	=> 'Latest comments',//'最新评论',
// 'title'		=> 'Title',//'标题',
 'new_comments_home'	=> 'Home Latest comments',//'首页最新评论数',
 'new_comments_length'	=> 'Summary length for latest comments',//'新近评论截取字节数',
// 'change'		=> 'Change',//'更改',
// 'new_posts'		=> 'Latest entries',//'最新文章',
// 'title'		=> 'Title',//'标题',
 'new_posts_home'	=> 'Show Latest Posts at Home',//'首页显示最新文章数',
// 'change'		=> 'Change',//'更改',
// 'hot_posts'		=> 'Popular posts',//'热门文章',
// 'title'		=> 'Title',//'标题',
 'hot_posts_home'	=> 'Show popular entries at Home',//'首页显示热门文章数',
// 'change'		=> 'Change',//'更改',
// 'random_post'	=> 'Random post',//'随机文章',
// 'title'		=> 'Title',//'标题',
 'random_post_home'	=> 'Show random entries at Home',//'首页显示随机文章数',
// 'change'		=> 'Change',//'更改',
// 'links'		=> 'Links',//'链接',
// 'title'		=> 'Title',//'标题',
// 'change'		=> 'Change',//'更改',
// 'search'		=> 'Search',//'搜索',
// 'title'		=> 'Title',//'标题',
// 'change'		=> 'Change',//'更改',
// 'widget_custom'	=> 'Custom widget',//'自定义组件',
 'widgets_custom'	=> 'Custom widgets',//'自定义组件',
 'widget_untitled'	=> 'Untitled widget',//'未命名组件',
// 'change'		=> 'Change',//'更改',
 'widget_delete'	=> 'Remove widget',//'删除该组件',
 'widget_custom_add'	=> 'Add new custom widget+',//'自定义一个新的组件+',
 'widget_title'		=> 'Widget title',//'组件名',
 'widget_content_info'	=> 'Content (html supported)',//'内容 （支持html）',
 'widget_add'		=> 'Add widget',//'添加组件',
 'sidebar'		=> 'Sidebar',//'侧边栏',
// 'sidebar'		=> 'Sidebar',//'侧边栏',
// 'widget_untitled'	=> 'Untitled widget',//'未命名组件',
 'widget_category'	=> 'Save widget in category',//'保存组件排序',
 'widget_setting_reset'	=> 'Reset widget settings to initial values',//'恢复组件设置到初始安装状态',

);
