<?php

$lang = array(

//---------------------------
//admin/admin_log.php
[56] 'drafts'		=> 'Drafts',//'草稿箱',
[60] 'post_manager'	=> 'Post Manager',//'文章管理',
[166] 'no_permission'	=> 'Insufficient permissions!',//'权限不足！',
[178]// 'no_permission'	=> 'Insufficient permissions!',//'权限不足！',
[187]// 'no_permission'	=> 'Insufficient permissions!',//'权限不足！',

//---------------------------
//admin/attachment.php
[130] 'attachment_delete_error'		=> 'Attachment delete failed!',//'删除附件失败!',
[137]// 'attachment_delete_error'	=> 'Attachment delete failed!',//'删除附件失败!',

//---------------------------
//admin/configure.php
[88] 'verification_code_not_supported' => 'Open verification Code failed! Server does not support this feature.',//'开启登录验证码失败!服务器不支持该功能',
[91] 'verification_code_comment_not_supported' =>'Open verification code for comments failed! Server does not support this feature',//'开启评论验证码失败!服务器不支持该功能',

//---------------------------
//admin/data.php
[72] 'backup_directory_not_writable'	=> 'Backup failed. Backup directory (content/backup) is not writable.',//'备份失败。备份目录(content/backup)不可写',
[77] 'backup_create_file_error'		=> 'Create a backup file failed. Backup directory (content/backup) is not writable.',//'创建备份文件失败。备份目录(content/backup)不可写',
[81] 'backup_empty' 			=> 'Nothing to backup. Database tables have no any content.',//'数据表没有任何内容',
[90] 'file_not_exists'			=> 'File does not exist',//'文件不存在',
[94] 'import_only_emlog'		=> 'You can import only emlog SQL backup file',//'只能导入emlog备份的SQL文件',
[107] 'info_illegal'			=> 'Submitted information is illegal',//'非法提交的信息',
[110] 'attachment_exceed_system_limit'	=> 'Attachment size exceeds the system limit ',//'附件大小超过系统 ',//+end space
[110]// '_limit'				=> ' limit',//'限制',//LEAVE THIS EMPTY???
[112] 'upload_failed_code'		=> 'Upload failed. Error code',//'上传文件失败,错误码',
[130] 'import_only_emlog_no_change'	=> 'You can only import emlog backup archive, and the archive file name can not be changed!',//'只能导入emlog备份的压缩包，且不能修改压缩包文件名！',
[133]// 'import_only_emlog'		=> 'You can import only emlog SQL backup file',//'只能导入emlog备份的SQL文件',
[160] 'import_failed_not_read'		=> 'Import failed! Can not read the file',//'导入失败！读取文件失败',
[171] 'import_failed_not_emlog'		=> 'Import failed! The backup file is not the emlog backup file!',//'导入失败！该备份文件不是 emlog的备份文件!',
[174] 'import_failed_not_emlog_ver'	=> 'Import failed! The backup file is not the emlog ' . Option::EMLOG_VERSION . ' backup file!',//'导入失败！该备份文件不是emlog ' . Option::EMLOG_VERSION . '  生成的备份!',
[177] 'import_failed_bad_prefix'	=> 'Import failed! The database backup file prefix does not match the current system database prefix ',//'导入失败！备份文件中的数据库前缀与当前系统数据库前缀不匹配 ',

//---------------------------
//admin/globals.php
[44]// 'no_permission'	=> 'Insufficient permissions!',//'权限不足！',

//---------------------------
//admin/index.php
[25] 'supported'	=> 'Supported',//'支持',
[28] 'not_supported'	=> 'NOT supported',//'不支持',
[94] 'phpinfo_disabled'	=> 'phpinfo function is disabled!',//'phpinfo函数被禁用!',

//---------------------------
//admin/plugin.php
[95] 'plugin_upload_error'	=> 'Plugin upload failed',//'插件上传失败',

//---------------------------
//admin/store.php
[20] 'template'		=> 'Template',//'模板',
[21] 'template_view'	=> 'View template',//'查看模板',
[30] 'plugins'		=> 'Plug-ins',//'插件',
[31] 'plugin_view'	=> 'View Plugin',//'查看插件',

//---------------------------
//admin/template.php
[21] 'ok_for_emlog'		=> 'Suitable for emlog',//'适用于emlog',
[24]// 'user'			=> 'User',//'作者'
[24]// 'user'			=> 'User',//'作者',
[205] 'template_upload_failed'	=> 'Template upload failed',//'模板上传失败',

//---------------------------
//admin/views/add_page.php
[4] 'add_page'			=> 'Add page',//'新建页面',
[9] 'page_title_info'		=> 'Enter the page title',//'输入页面标题',
[15]// 'upload_insert'		=> 'Insert upload',//'上传插入',
[27] 'link_alias'		=> 'Link Alias',//'链接别名',
[27] 'link_alias_info'		=> 'The page link custom address. Required',//'用于自定义该页面的链接地址。需要',
[27] 'link_alias_enable'	=> 'Enable Link Alias',//'启用链接别名',
[32] 'page_enable_comments'	=> 'Page accepted comments',//'页面接受评论'
[38] 'page_publish'		=> 'Publish Page',//'发布页面',
[39] 'save'			=> 'Save',//'保存',

//---------------------------
//admin/views/admin_page.php
[2] 'page_management'	=> 'Page management',//'页面管理',
[3] 'page_deleted_ok'	=> 'Page has been removed successfully',//'删除页面成功',
[4] 'page_published_ok'	=> 'Page has been published successfully',//'发布页面成功',
[5] 'page_disabled_ok'	=> 'Page has been disabled successfully',//'禁用页面成功',
[6] 'page_saved_ok'	=> 'Page has been saved successfully',//'页面保存成功',
[13]// 'title'		=> 'Title',//'标题',
[14]// 'comments'	=> 'Comments',//'评论',
[15]// 'time'		=> 'Date',//'时间',
[27]// 'draft'		=> 'Draft',//'草稿',
[28] 'page_view'	=> 'View page',//'查看页面',
[35]// 'attachment'	=> 'Attachment',//'附件',
[41] 'no_pages'		=> 'No pages',//'还没有页面',
[48]// 'select'		=> 'Select',//'全选',
[48]// 'selected_items'	=> 'Selected items',//'选中项',
[49]// 'delete'		=> 'Delete',//'删除',
[50] 'make_draft'	=> 'Convert to draft',//'转为草稿',
[51]// 'publish'	=> 'Publish',//'发布',
[53]// 'add_page'	=> 'Add page',//'新建页面',
[54]// 'have'		=> 'Have',//'有',
[54] '_pages'		=> ' pages',//'个页面',
[66] 'select_page_to_operate'	=> 'Please, select the page to operate',//'请选择要操作的页面',
[68] 'sure_delete_selected_pages'	=> 'Are you sure you want to delete selected pages?',//'你确定要删除所选页面吗？',

//---------------------------
//admin/views/attlib.php
[22] 'attachment_upload'	=> 'Upload attachment',//'上传附件',
[23] 'bulk_upload'		=> 'Bulk upload',//'批量上传',//'('
[24] 'attachment_library'	=> 'Attachment Library',//'附件库',
[24]// '）',//'）',
[28] 'no_attachments'	=> 'The post has no attachment',//'该文章没有附件',
[35] 'insert'		=> 'Insert',//'插入',
[39] 'insert_full_size'	=> 'Insert full size image',//'插入原图',
[39] 'full_size'	=> 'Full size image',//'原图',
[42] 'insert_thumbnail'	=> 'Insert thumbnail',//'插入缩略图',
[42] 'thumbnail'	=> 'Thumbnail',//'缩略图',
[46]// 'insert'		=> 'Insert',//'插入',
[57]// 'delete'		=> 'Delete',//'删除',

//---------------------------
//admin/views/configure.php
[4]// 'basic_settings'	=> 'Basic Settings',//'基本设置',
[5]// 'seo_settings'	=> 'SEO Settings',//'SEO设置',
[6]// 'backround_style'	=> 'Background style',//'后台风格',
[7]// 'personal_settings'	=> 'Personal Settings',//'个人设置',
[8] 'settings_saved_ok'	=> 'Settings have been saved successfully',//'设置保存成功',
[13] 'site_title'	=> 'Site title',//'站点标题',
[17] 'site_subtitle'	=> 'Site subtitle',//'站点副标题',
[21] 'site_address'	=> 'Site address',//'站点地址',
[25] 'per_page'		=> 'Show per page',//'每页显示',
[26] '_posts'		=> 'posts',//'篇文章',
[29] 'your_timezone'	=> 'Your time zone',//'你所在时区',
[33] 'tz-12'	=> '[-12:00] Dateline West',//'(标准时-12) 日界线西',
[34] 'tz-11'	=> '[-11:00] Midway Island, Samoa',//'(标准时-11) 中途岛、萨摩亚群岛',
[35] 'tz-10'	=> '[-10:00] Hawaii',//'(标准时-10) 夏威夷',
[36] 'tz-9'	=> '[-09:00] Alaska',//'(标准时-9) 阿拉斯加',
[37] 'tz-8'	=> '[-08:00] Pacific Time (U.S. & Canada)',//'(标准时-8) 太平洋时间(美国和加拿大)',
[38] 'tz-7'	=> '[-07:00] Mountain Time (U.S. & Canada)',//'(标准时-7) 山地时间(美国和加拿大)',
[39] 'tz-6'	=> '[-06:00] Central Time (U.S. & Canada), Mexico City',//'(标准时-6) 中部时间(美国和加拿大)、墨西哥城',
[40] 'tz-5'	=> '[-05:00] Eastern Time (U.S. & Canada), Bogota',//'(标准时-5) 东部时间(美国和加拿大)、波哥大',
[41] 'tz-4'	=> '[-04:00] Atlantic Time (Canada), Caracas',//'(标准时-4) 大西洋时间(加拿大)、加拉加斯',
[42] 'tz-3.5'	=> '[-03:30] Newfoundland',//'(标准时-3:30) 纽芬兰',
[43] 'tz-3'	=> '[-03:00] Brazil, Buenos Aires, Georgetown',//'(标准时-3) 巴西、布宜诺斯艾利斯、乔治敦',
[44] 'tz-2'	=> '[-02:00] Mid-Atlantic',//'(标准时-2) 中大西洋',
[45] 'tz-1'	=> '[-01:00] Azores, Cape Verde Islands',//'(标准时-1) 亚速尔群岛、佛得角群岛',
[46] 'tz0'	=> '[ 00:00] Western European Time, London, Casablanca',//'(标准时) 西欧时间、伦敦、卡萨布兰卡',
[47] 'tz1'	=> '[+01:00] Central European Time, Angola, Libya',//'(标准时+1) 中欧时间、安哥拉、利比亚',
[48] 'tz2'	=> '[+02:00] Eastern European Time, Cairo, Athens',//'(标准时+2) 东欧时间、开罗，雅典',
[49] 'tz3'	=> '[+03:00] Baghdad, Kuwait',//'(标准时+3) 巴格达、科威特、莫斯科',
[50] 'tz3.5'	=> '[+03:30] Tehran',//'(标准时+3:30) 德黑兰',
[51] 'tz4'	=> '[+04:00] Abu Dhabi, Baku, Moscow, Muscat',//'(标准时+4) 阿布扎比、马斯喀特、巴库',
[52] 'tz4.5'	=> '[+04:30] Kabul',//'(标准时+4:30) 喀布尔',
[53] 'tz5'	=> '[+05:00] Ekaterinburg, Islamabad, Karachi',//'(标准时+5) 叶卡捷琳堡、伊斯兰堡、卡拉奇',
[54] 'tz5.5'	=> '[+05:30] Bombay, Calcutta, New Delhi',//'(标准时+5:30) 孟买、加尔各答、新德里',
[55] 'tz6'	=> '[+06:00] Almaty, Dhaka, New Elijah Abel',//'(标准时+6) 阿拉木图、 达卡、新亚伯利亚',
[56] 'tz7'	=> '[+07:00] Bangkok, Hanoi, Jakarta',//'(标准时+7) 曼谷、河内、雅加达',
[57] 'tz8'	=> '[+08:00] Beijing, Chongqing, Hong Kong, Singapore',//'(标准时+8) 北京、重庆、香港、新加坡',
[58] 'tz9'	=> '[+09:00] Tokyo, Seoul, Osaka, Yakutsk',//'(标准时+9) 东京、汉城、大阪、雅库茨克',
[59] 'tz9.5'	=> '[+09:30] Adelaide, Darwin',//'(标准时+9:30) 阿德莱德、达尔文',
[60] 'tz10'	=> '[+10:00] Sydney, Guam',//'(标准时+10) 悉尼、关岛',
[61] 'tz11'	=> '[+11:00] Magadan, Solomon Islands',//'(标准时+11) 马加丹、索罗门群岛',
[62] 'tz12'	=> '[+12:00] Auckland, Wellington, Kamchatka',//'(标准时+12) 奥克兰、惠灵顿、堪察加半岛',
[70] 'local_time'	=> 'Local Time',//'本地时间',
[74] 'function_switch'	=> 'Function switch',//'功能开关',
[76] 'login_verification_code'	=> 'Login verification code',//'登录验证码',
[77] 'image_attachment_thumbnails'	=> 'Image Attachment thumbnails',//'图片附件缩略图',
[78] 'gzip_compression'		=> 'Gzip compression',//'Gzip压缩',
[79] 'offline_writing'		=> 'Offline Writing (Support the use of tools such as Windows Live Writer to write articles)',//'离线写作（支持用Windows Live Writer等工具写文章）',
[80] 'mobile_access_address'	=> 'Mobile Access version, address',//'手机访问版，地址',
[80] 'access_site_by_mobile'	=> 'Access to your site using a mobile phone',//'用手机访问你的站点',
[81] 'auto_summary'		=> 'Automatic summary, intercept from the post',//'自动摘要，截取文章的前',
[82] 'characters_as_summary'	=> ' characters as the summary',//'个字作为摘要',
[89]// 'twitter'			=> 'Twitter',//'微语',
[91]// 'twitters_enable'		=> 'Enable twitters, ',//'开启微语，',
[92]// 'per_page'		=> 'Show per page',//'每页显示',
[92]// '_twitters'		=> ' twitters',//'条微语',
[93]// 'twitter_reply_enable'	=> 'Enable twitter reply, ',//'开启微语回复，',
[94] 'reply_verification_code'	=> 'Reply verification code, ',//'回复验证码，',
[95] 'reply_audit'		=> 'Reply audit',//'回复审核',
[102] 'rss'			=> 'RSS',//'RSS',
[104] 'export'			=> 'Export',//'输出',
[104] '_posts_and_output'	=> ' posts, and output',//'篇文章，且输出',
[106] 'full_text'		=> 'Full Text',//'全文',
[107] 'summary'			=> 'Summary',//'摘要',
[115]// 'comments'		=> 'Comments',//'评论',
[117] 'enable_comment_interval'	=> 'Enable comments, comment interval',//'开启评论，发表评论间隔',
[117] 'seconds'			=> ' seconds',//'秒',
[118] 'comment_moderation'	=> 'Comment moderation',//'评论审核',
[119] 'comment_verification_code'	=> 'Comments Verification Code',//'评论验证码',
[120] 'comment_avatar'		=> 'Comments author avatar',//'评论人头像',
[121] 'comment_must_contain_chinese'	=> 'Comments must contain Chinese',//'评论内容必须包含中文',
[122] 'comment_per_page'	=> 'Comments per page, ',//'评论分页，',
[123]// 'per_page'		=> 'Show per page',//'每页显示',
[123] '_comments_'		=> ' comments, ',//'条评论，',
[124] 'newer'			=> 'Newer',//'较新的',
[124] 'older'			=> 'Older',//'较旧的',
[124] 'standing_in_front'	=> 'Standing in front',//'排在前面',
[131] 'icp_reg_no'		=> 'ICP Registration No.',//'ICP备案号',
[135] 'home_footer_info'	=> 'Home footer information',//'首页底部信息',
[138] 'home_footer_info_html'	=> '(HTML supported, can be used to add a traffic statistics code)',//'(支持html，可用于添加流量统计代码)',
[145] 'save_settings'		=> 'Save Settings',//'保存设置',

//---------------------------
//admin/views/data.php
[2] 'data_backup'	=> 'Data Backup',//'数据备份',
[3] 'backup_delete_ok'	=> 'Backup file deleted successfully',//'备份文件删除成功',
[4] 'backup_create_ok'	=> 'Data backup created successfully',//'数据备份成功',
[5] 'backup_import_ok'	=> 'Backup imported successfully',//'备份导入成功',
[6] 'backup_file_select'	=> 'Please select the backup file you want to delete',//'请选择要删除的备份文件',
[7] 'backup_file_invalid'	=> 'Invalid backup file name (use only letters, digits and underscore)',//'备份文件名错误(应由英文字母、数字、下划线组成)',
[8] 'backup_import_zip_unsupported'	=> 'Server does not support zip, can not import zip backup',//'服务器不支持zip，无法导入zip备份',
[9] 'backup_upload_failed'	=> 'Backup Upload Failed',//'上传备份失败',
[10] 'backup_file_wrong'	=> 'Wrong backup file',//'错误的备份文件',
[11] 'backup_export_zip_unsupported'	=> 'Server does not support zip, zip backup can not be exported',//'服务器不支持zip，无法导出zip备份',
[18] 'backup_file'	=> 'Backup file',//'备份文件',
[19] 'backup_time'	=> 'Backup time',//'备份时间',
[20] 'file_size'	=> 'File size',//'文件大小',
[37] 'import'		=> 'Import',//'导入',
[40] 'backup_no'	=> 'No backups found',//'还没有备份',
[45]// 'select'		=> 'Select',//'全选',
[45]// 'selected_items'	=> 'Selected items',//'选中项',
[45]// 'delete'		=> 'Delete',//'删除',
[47] 'backup_create'	=> 'Create Backup',//'备份数据',//'备份数据+',
[47] 'spacer'		=> ' ',//'　',//It is the empty space between two words
[47] 'backup_import_local'	=> 'Import Local Backup',//'导入本地备份',//'导入本地备份+',
[50] 'backup_choose_table'	=> 'Choose the database table to backup',//'选择要备份的数据库表',
[55] 'backup_export_to'		=> 'Export backup file to',//'导出备份文件到',
[57] 'local'			=> 'Local',//'本地',
[58] 'server'			=> 'Server',//'服务器',
[61] 'compress_zip'		=> 'Compress (zip format)',//'压缩(zip格式)',
[62] 'backup_file_name'		=> 'Backup file name',//'备份文件名',
[63] 'backup_start'		=> 'Start Backup',//'开始备份',
[68]// 'import'			=> 'Import',//'导入',
[68] 'backup_format_supported'	=> '(supports emlog backup exported to sql and zip format)',//'(支持emlog导出的sql及zip格式备份)',
[71] 'data_cache'		=> 'Data Cache',//'数据缓存',
[72] 'cache_update_ok'		=> 'Cache updated successfully',//'缓存更新成功',
[76] 'cache_update_info'	=> 'Caching can greatly improve the site loading speed. Usually no need to update the cache manually, because the system will update the cache automatically, but in some cases, for example, when the cache files was modified, or when the database was manually modified, then you need to update the cache manually.',//'缓存可以大幅度提高站点的加载速度。通常系统会自动更新缓存，无需手动。有些特殊情况，比如缓存文件被修改、手动修改过数据库、页面出现异常等才需要手动更新。',
[77] 'cache_update'		=> 'Update cache',//'更新缓存',
[91] 'backup_file_select'	=> 'Please select the backup file you want to operate',//'请选择要操作的备份文件',
[94] 'backup_delete_sure'	=> 'Are you sure you want to delete the selected backup files? ',//'你确定要删除所选备份文件吗？',

//---------------------------
//admin/views/edit_page.php
[4] 'page_edit'			=> 'Edit Page',//'编辑页面',
[9]// 'page_title_info'		=> 'Enter the page title',//'输入页面标题',
[14]// 'upload_insert'		=> 'Insert upload',//'上传插入',
[26]// 'link_alias'		=> 'Link Alias',//'链接别名',
[26]// 'link_alias_info'		=> 'The page link custom address. Required',//'用于自定义该页面的链接地址。需要',
[26]// 'link_alias_enable'	=> 'Enable Link Alias',//'启用链接别名',
[31]// 'page_enable_comments'	=> 'Page accepted comments',//'页面接受评论',
[38]// 'save_and_return'	=> 'Save and Return',//'保存并返回',
[39]// 'save'			=> 'Save',//'保存',

//---------------------------
//admin/views/index.php
[10]// 'twitter_write_placeholder'	=> 'Write some words to the twitter...',//'用微语记录生活 ……',
[11]// 'publish'		=> 'Publish',//'发布',
[11] 'cancel'			=> 'Cancel',//'取消',
[11]// 'twitter_write_length'	=> '(You can enter 140 characters maximum)',//'(你还可以输入140字)',
[20] 'site_info'		=> 'Site Info',//'站点信息',
[22]// 'have'			=> 'Have',//'有',
[22]// '_posts'			=> 'posts',//'篇文章',
[22]// '_comments_'		=> ' comments, ',//'条评论，',
[22]// '_twitters'		=> ' twitters',//'条微语',
[23] 'php_version'		=> 'PHP version',//'PHP版本',
[24] 'mysql_version'		=> 'MySQL version',//'MySQL版本',
[25] 'server_environment'	=> 'Server environment',//'服务器环境',
[26] 'gd_library'		=> 'GD graphic library',//'GD图形处理库',
[27] 'server_max_upload_size'	=> 'Maximum upload file size allowed by server',//'服务器允许上传最大文件',
[28] 'more_info'		=> 'More Info&raquo;',//'更多信息&raquo;',
[32] 'official_source'		=> 'Official sources',//'官方消息',
[37] 'using_emlog'		=> 'You are using emlog',//'您正在使用emlog',
[37] 'update_check'		=> 'Check for updates',//'检查更新',
[44] 'reading'			=> 'Is reading...',//'正在读取...',
[58] 'checking_wait'		=> 'Is checking, please wait',//'正在检查，请稍后',
[62] 'updates_no'		=> 'There is no updates for your current version!',//'目前还没有适合您当前版本的更新！',
[64] 'update_exists'		=> 'It is available emlog updated version ',//'有可用的emlog更新版本 ',
[64] 'backup_before_update'	=> ' Do not forget to make a backup before updating job, ',//' ，更新之前请您做好数据备份工作，',
[64] 'update_now'		=> 'Update now',//'现在更新',
[66] 'update_check_failed'	=> 'Check failed, may be a network problem exists',//'检查失败，可能是网络问题',
[71] 'updating'			=> 'Updating the system, please be patient',//'系统正在更新中，请耐心等待',
[76] 'update_completed'		=> 'Congratulations! Update is successfully completed, please ',//'恭喜您！更新成功了，请',
[76] 'page_refresh'		=> 'Refresh the page',//'刷新页面',
[76] 'start_new_emlog'		=> 'Start experiencing the new emlog version',//'开始体验新版emlog',
[78] 'update_download_failed'	=> 'Download the update failed, may be a network problem exists',//'下载更新失败，可能是服务器网络问题',
[80] 'update_extract_failed'	=> 'Extract the update failed, may be the server does not support the zip module',//'解压更新失败，可能是服务器不支持zip模块',
[82] 'update_failed_nonwritable'	=> 'Update failed, the directory is not writable',//'更新失败，目录不可写',
[84] 'update_failed'		=> 'Update failed',//'更新失败',
[99] 'you_can_enter'		=> 'You can enter ',//'你还可以输入',
[99] '_characters'		=> ' characters',//'字',
[101] 'exceeds'			=> 'has been exceeded',//'已超出',
[101]// '_characters'		=> ' characters',//'字',
[107]// 'twitter_write_length'	=> '(You can enter 140 characters maximum)',//'(你还可以输入140字)',
[108]// 'twitter_write_placeholder'	=> 'Write some words to the twitter...',//'用微语记录生活 ……',
[120]// '('			=> '(',//'（',
[120]// '_posts'		=> 'posts',//'篇文章',//'篇文章，',
[120]// '_comments'		=> 'comments',//'条评论',
[120] ')'			=> ')',//'）',

//---------------------------
//admin/views/plugin.php
[2] 'plugin_manage'		=> 'Plugin Management',//'插件管理',
[3] 'plugin_upload_ok'		=> 'Plugin uploaded successfully, please activate it to use',//'插件上传成功，请激活使用',
[4] 'plugin_active_ok'		=> 'Plug-in activated successfully',//'插件激活成功',
[5]// 'deleted_ok'		=> 'Deleted successfully',//'删除成功',
[6] 'plugin_active_failed'	=> 'Plug-in activation failed',//'插件激活失败',
[7] 'plugin_disable_ok'		=> 'Plug-in disabled successfully',//'插件禁用成功',
[8] 'plugin_delete_failed'	=> 'Delete failed, check the plug-in file permissions',//'删除失败，请检查插件文件权限',
[15]// 'status'			=> 'Status',//'状态',
[16] 'version'			=> 'Version',//'版本',
[17]// 'description'		=> 'Description',//'描述',
[28] 'plugin_active_ok'		=> 'Click to activate the plug-in',//'点击激活插件',
[33] 'plugin_disable_ok'	=> 'Click to disable the plug-in',//'点击禁用插件',
[37] 'plugin_settings_click'	=> 'Click to plug-in settings',//'点击设置插件',
[48]// 'more_info'		=> 'More Info&raquo;',//'更多信息&raquo;',
[50]// 'ok_for_emlog'		=> 'Suitable for emlog',//'适用于emlog',
[52]// 'user'			=> 'User',//'作者',
[61]// 'delete'			=> 'Delete',//'删除',
[66] 'plugin_no_installed'	=> 'No installed plugins',//'还没有安装插件',
[71] 'plugin_install'		=> 'Install plugin',//'安装插件',

//---------------------------
//admin/views/plugin_install.php
[3]// 'plugin_install'		=> 'Install plugin',//'安装插件',
[4] 'plugin_zipped_only'	=> 'Supports plug-in package only in zip compression format',//'只支持zip压缩格式的插件包',
[5] 'plugin_upload_failed_nonwritable'	=> 'Upload failed, plugin directory (content/plugins) is not writable',//'上传失败，插件目录(content/plugins)不可写',
[6] 'plugin_zip_nonsupport'	=> 'Server does not support zip module, follow the prompts to install the plugin manually' ,//'空间不支持zip模块，请按照提示手动安装插件',
[7] 'plugin_zip_select'		=> 'Please select a zipped plug-in installation package',//'请选择一个zip插件安装包',
[8] 'plugin_install_failed_wrong_format'	=> 'Installation failed, plug-in installation package does not meet the standards',//'安装失败，插件安装包不符合标准',
[14] 'plugin_install_maually'	=> 'Install the plug-in manually',//'手动安装插件',
[15] 'install_promt_1'		=> '1) Unzip the plugin file and upload it to the content/plugins directory.',//'1、把解压后的插件文件夹上传到 content/plugins 目录下。',
[16] 'install_prompt2'		=> '2) Log in to AdminCP, go to Plug-in management, and if the plug-in is already listed, you can click on it to activate it.',//'2、登录后台进入插件管理,插件管理里已经有了该插件，点击激活即可。',
[24] 'upload_install'		=> 'Upload installation',//'上传安装',
[24] 'upload_install_info'	=> '(Upload a plug-in installation package in zip compressed format)',//'（上传一个zip压缩格式的插件安装包）',
[28] 'plugin_get_more'		=> 'Get More Plugins',//'获取更多插件',
[28]// 'app_center'		=> 'App center',//'应用中心',

//---------------------------
//admin/views/seo.php
[4]// 'basic_settings'	=> 'Basic Settings',//'基本设置',
[5]// 'seo_settings'	=> 'SEO Settings',//'SEO设置',
[6]// 'backround_style'	=> 'Background style',//'后台风格',
[7]// 'personal_settings'	=> 'Personal Settings',//'个人设置',
[8]// 'settings_saved_ok'	=> 'Settings have been saved successfully',//'设置保存成功',
[9] 'htaccess_not_writable'	=> 'Save failed: .htaccess file in the root directory is not writable',//'保存失败：根目录下的.htaccess不可写',
[13] 'post_url_settings'	=> 'Post URL settings',//'文章链接设置',
[15] 'post_url_rewriting'	=> 'Here you can modify the form of the post link. If the post URL can not be accessed, may be your server environment does not support the URL rewriting. Please restore back the default form, and disable the article post alias connection.',//'你可以在这里修改文章链接的形式，如果修改后文章无法访问，那可能是你的服务器环境不支持URL重写，请修改回默认形式、关闭文章连接别名。',
[16] 'post_url_custom'		=> 'You can customize the of link enabled alias address for defined articles and pages.',//'启用链接别名后可以自定义文章和页面的链接地址。',
[19] 'default_format'		=> 'Default format',//'默认形式',
[20] 'file_format'		=> 'File format',//'文件形式',
[21] 'directory_format'		=> 'Directory format',//'目录形式',
[22] 'category_format'		=> 'Category format',//'分类形式',
[24]// 'post_alias_enable'	=> 'Enable post link alias',//'启用文章链接别名',
[25] 'enable_html_suffix'	=> 'Enable html suffix for article link alias',//'启用文章链接别名html后缀',
[28] 'meta_settings'		=> 'Meta settings',//'Meta设置',
[30] 'meta_title'		=> 'Site Browser Title (title)',//'站点浏览器标题(title)',
[31] 'meta_keywords'		=> 'Site keywords (keywords)',//'站点关键字(keywords)',
[32] 'meta_description'		=> 'Site Browser Description (description)',//'站点浏览器描述(description)',
[33] 'meta_title_scheme'	=> 'Post browser title scheme',//'文章浏览器标题方案',
[35] 'post_title'		=> 'Post title',//'文章标题',
[36] 'post_title_site_title'	=> 'Post title - Site title',//'文章标题 - 站点标题',
[37] 'post_title_site_meta_title'	=> 'Post title - Site browser title',//'文章标题 - 站点浏览器标题',
[40]// 'save_settings'	=> 'Save Settings',//'保存设置',

//---------------------------
//admin/views/store.php
[2]// 'app_center'	=> 'App center',//'应用中心',

//---------------------------
//admin/views/store_install.php
[3] 'install'	=> 'Install',//'安装',
[5] 'package_downloading'	=> 'Downloading package...',//'正在下载安装中',
[13] 'plugin_install_ok'	=> 'Plugin has been installed successfully',//'安装成功，',
[15] 'plugin_download_failed'	=> 'Download failed. It may be network problem. Please, download and install manually.',//'下载失败，可能是服务器网络问题，请手动下载安装，',
[15] 'return_app_center'	=> 'Return to app center',//'返回应用中心',
[17] 'install_failed_zip_nonsupport'	=> 'Installation failed. Server may not support zip module. Please, download and install manually.',//'安装失败，可能是服务器不支持zip模块，请手动下载安装，',
[17]// 'return_app_center'	=> 'Return to app center',//'返回应用中心',
[19] 'install_failed_folder_nonwritable'	=> 'Installation failed. Probably, directory is not wirtable.',//'安装失败，可能是应用目录不可写，',
[19]// 'return_app_center'	=> 'Return to app center',//'返回应用中心',
[21] 'install_failed'		=> 'Installation failed.',//'安装失败，',
[21]// 'return_app_center'	=> 'Return to app center',//'返回应用中心',

//---------------------------
//admin/views/style.php
[4]// 'basic_settings'	=> 'Basic Settings',//'基本设置',
[5]// 'seo_settings'	=> 'SEO Settings',//'SEO设置',
[6]// 'backround_style'	=> 'Background style',//'后台风格',
[7]// 'personal_settings'	=> 'Personal Settings',//'个人设置',
[8]// 'settings_saved_ok'	=> 'Settings have been saved successfully',//'设置保存成功',
[17] 'use_this_style'	=> 'Click to use this style',//'点击使用该风格',
[24]// 'use_this_style'	=> 'Click to use this style',//'点击使用该风格',

//---------------------------
//admin/views/template.php
[3] 'template_current'		=> 'Current template',//'当前模板',
[4] 'template_mount'		=> 'Mounting template',//'安装模板',
[5] 'template_change_ok'	=> 'Template have been replaced successfully',//'模板更换成功',
[8] 'template_current_use'	=> 'Currently used template',//'当前使用的模板',
[8] 'template_damaged'		=> 'This template has been damaged! Please choose another template.',//'已被删除或损坏，请选择其他模板。',
[19] 'template_top_image'	=> 'Custom top image',//'自定义顶部图片',
[26] 'template_library'		=> 'Template library',//'模板库',
[28] 'template_upload_ok'	=> 'Template have been uploaded successfully',//'模板上传成功',
[29] 'template_delete_ok'	=> 'Template have been removed successfully',//'删除模板成功',
[30] 'template_delete_failed'	=> 'Delete failed, check the template file permissions',//'删除失败，请检查模板文件权限',
[41] 'template_use_this'	=> 'Click to use this template',//'点击使用该模板',
[44]// 'delete'			=> 'Delete',//'删除',

//---------------------------
//admin/views/template_crop.php
[2] 'image_crop'		=> 'Crop image',//'裁剪图片',
[2]// 'template_change_ok'	=> 'Template have been replaced successfully',//'模板更换成功',
[13] 'crop_and_save'		=> 'Crop and save',//'剪裁并保存',
[13] 'crop_cancel'		=> 'Cancel crop',//'取消裁剪',
[13] 'crop_load_prompt'		=> '(When page loading is completed, but it is not appear in the select area, then press the left mouse button to drag the selected manually)',//'(页面加载完毕后，未出现选择区域时请按下鼠标左键手动拖曳选取)',

//---------------------------
//admin/views/template_install.php
[3]// 'template_current'	=> 'Current template',//'当前模板',
[4]// 'template_mount'		=> 'Mounting template',//'安装模板',
[5] 'template_zip_support'	=> 'Only supported for .zip files.',//'只支持zip压缩格式的模板包',
[6] 'template_upload_failed_nonwritable'	=> 'Upload failed. Template directory (content/templates) cannot be written.',//'上传失败，模板目录(content/templates)不可写',
[7] 'template_no_zip_install_manually'	=> 'Server does not support zip module, follow the prompts to install the template manually',//'空间不支持zip模块，请按照提示手动安装模板',
[8] 'template_select_zip'	=> 'Please select a zipped template installation package',//'请选择一个zip模板安装包',
[9] 'template_non_standard'	=> 'Installation failed, template installation package does not meet the standards',//'安装失败，模板安装包不符合标准',
[14] 'template_install_manual'	=> 'Template manual installation',//'手动安装模板',
[15] 'template_install_prompt1'	=> '1) After extracting the template files upload the template folder to the content/templates directory.',//'1、把解压后的模板文件夹上传到 content/templates目录下。,
[16] 'template_install_prompt2'	=> '2) Log in to the AdminCP to change a template. If template library already have a template you just added, then click on it to use this template'.,//'2、登录后台换模板，模板库中已经有了你刚才添加的模板，点击使用即可。',
[24]// 'upload_install'		=> 'Upload installation',//'上传安装',
[24] 'template_upload_prompt'	=> '(Upload .zip file that contains installation package)',//'(上传一个zip压缩格式的模板安装包)',
[28] 'template_get_more'	=> 'Get more templates',//'获取更多模板',
[28] 'app_center'		=> 'App center &raquo;',//'应用中心&raquo;',

//---------------------------
//admin/views/template_top.php
[2]// 'template_top_image'	=> 'Custom top image',//'自定义顶部图片',
[3] 'image_replace_ok'		=> 'Image has been replaced successfully.',//'顶部图片更换成功',
[4]// 'deleted_ok'		=> 'Deleted successfully',//'删除成功',
[5] 'image_crop_error'		=> 'Image crop error',//'裁剪图片失败',
[9] 'top_image_unavailable'	=> 'Current top image is unused or deleted',//'当前未使用顶部图片或者使用中的顶部图片被删除',
[14] 'images_optional'		=> 'Optional images',//'可选图片',
[29] 'image_click_to_use'	=> 'Click on image to use it',//'点击使用该图片',
[34]// 'delete'			=> 'Delete',//'删除',
[41] 'top_image_not_use'	=> 'Do not use the top image.',//'不使用顶部图片',
[44]// 'top_image_not_use'	=> 'Do not use the top image.',//'不使用顶部图片',
[48] 'top_image_custom'		=> 'Custom image',//'自定义图片',
[54] 'upload'			=> 'Upload',//'上传',
[54] 'top_image_upload_prompt'	=> '(Upload your favourite picture to top. Supported formats: jpg, png.)',//'(上传一张你喜欢的顶部图片，支持JPG、PNG格式)',

//---------------------------
// REMOVED!!!
//admin/views/trackback.php
//[11] 'trackback_manage'		=> 'TrackBack Management',//'引用通告（TrackBack）管理',
//[12] 'trackback_delete_ok'	=> 'Reference deleted successfully',//'删除引用成功',
//[13] 'trackback_select_to_operate'	=> 'Please select references to perform the operation',//'请选择要执行操作的引用',
//[20]// 'title'			=> 'Title',//'标题',
//[21] 'source'			=> 'Source',//'来源',
//[23]// 'time'			=> 'Date',//'时间',
//[38] 'trackback_no'		=> 'Have not yet received references',//'还没有收到引用',
//[42]// 'select'			=> 'Select',//'全选',
//[42]// 'selected_items'		=> 'Selected items',//'选中项',
//[42]// 'delete'			=> 'Delete',//'删除',
//[43]// 'have'			=> 'Have',//'有',
//[43] '_trackbacks'			=> 'post references',//'条引用',
//[48] 'trackback_select_to_operate'	=> 'Please, select references to operate',//'请选择要操作的引用',
//[51] 'trackback_delete_selected_sure'	=> 'Are you sure you want to delete selected references?',//'你确定要删除所选引用吗？',

//---------------------------
//admin/views/upload.php
[32]// 'attachment_upload'	=> 'Upload attachment',//'上传附件',
[33]// 'bulk_upload'		=> 'Bulk upload',//'批量上传',
[34]// 'attachment_library'	=> 'Attachment Library',//'附件库',
[34]// '('		=> '(',//'（',
[34]// ')'		=> ' )',//' ）',
[38] 'attach_max_size'	=> 'Maximum size of single attachment',//'单个附件最大',
[38]// ','		=> ',',//'，',
[38] 'types_allowed'	=> 'Allowed types',//'允许类型',
[41]// 'upload'		=> 'Upload',//'上传',
[43] 'attachment_add'	=> 'Add attachment',//'增加附件',
[43] 'plus_button'	=> '[ + ]',//'[ + ]',
[44] 'attach_reduce'	=> 'Reduce attachments',//'减少附件',
[44] 'minus_button'	=> '[ - ]',//'[ - ]',

//---------------------------
//admin/views/upload_multi.php
[23]// 'attachment_upload'	=> 'Upload attachment',//'上传附件',
[24]// 'bulk_upload'		=> 'Bulk upload',//'批量上传',
[25]// 'attachment_library'	=> 'Attachment Library',//'附件库',
[25]// ')'		=> ')',//'）',
[29] 'browser_upgrade'	=> 'Your browser is too old to display this feature. You cannot use the bulk upload. Please, upgrade your web browser or switch to another.',//'您正在使用的浏览器版本太低，无法使用批量上传功能。为了更好的使用emlog，建议您升级浏览器或者换用其他浏览器。',
[46] 'file_select'	=> 'Select the file',//'选择文件',

//---------------------------
//admin/views/widgets.php
[4] 'widget_manage'	=> 'Sidebar component management',//'侧边栏组件管理',
[5]// 'settings_saved_ok'	=> 'Settings have been saved successfully',//'设置保存成功',
[12]// 'blogger'		=> 'Personal information',//'个人资料',
[17]// 'title'		=> 'Title',//'标题',
[18] 'change'		=> 'Change',//'更改',
[25] 'calendar'		=> 'Calendar',//'日历',
[30]// 'title'		=> 'Title',//'标题',
[31]// 'change'		=> 'Change',//'更改',
[38] 'twitter_latest'	=> 'Latest twits',//'最新微语',
[43]// 'title'		=> 'Title',//'标题',
[45] 'twitter_latest_num'	=> 'Number of latest twits',//'首页显示最新微语数',
[46]// 'change'		=> 'Change',//'更改',
[53]// 'tags'		=> 'Tags',//'标签',
[58]// 'title'		=> 'Title',//'标题',
[59]// 'change'		=> 'Change',//'更改',
[66]// 'category'	=> 'Category',//'分类',
[71]// 'title'		=> 'Title',//'标题',
[72]// 'change'		=> 'Change',//'更改',
[79]// 'archive'		=> 'Archive',//'存档',
[84]// 'title'		=> 'Title',//'标题',
[85]// 'change'		=> 'Change',//'更改',
[92]// 'new_comments'		=> 'Latest comments',//'最新评论',
[97]// 'title'		=> 'Title',//'标题',
[99] 'new_comments_home'	=> 'Home Latest comments',//'首页最新评论数',
[101] 'new_comments_length'	=> 'Summary length for latest comments',//'新近评论截取字节数',
[102]// 'change'	=> 'Change',//'更改',
[109]// 'new_posts'		=> 'Latest entries',//'最新文章',
[114]// 'title'		=> 'Title',//'标题',
[116] 'new_posts_home'	=> 'Show Latest Posts at Home',//'首页显示最新文章数',
[117]// 'change'	=> 'Change',//'更改',
[124]// 'hot_posts'		=> 'Popular posts',//'热门文章',
[129]// 'title'		=> 'Title',//'标题',
[131] 'hot_posts_home'	=> 'Show popular entries at Home',//'首页显示热门文章数',
[132]// 'change'	=> 'Change',//'更改',
[139]// 'random_posts'	=> 'Random posts',//'随机文章',
[144]// 'title'		=> 'Title',//'标题',
[146] 'random_post_home'	=> 'Show random entries at Home',//'首页显示随机文章数',
[147]// 'change'	=> 'Change',//'更改',
[154]// 'link'		=> 'Link',//'链接',
[159]// 'title'		=> 'Title',//'标题',
[160]// 'change'	=> 'Change',//'更改',
[167]// 'search'		=> 'Search',//'搜索',
[172]// 'title'		=> 'Title',//'标题',
[173]// 'change'	=> 'Change',//'更改',
[177]// 'widget_custom'	=> 'Custom component',//'自定义组件',
[181] 'widget_untitled'	=> 'Untitled component',//'未命名组件',
[196]// 'change'	=> 'Change',//'更改',
[197] 'widget_delete'	=> 'Remove component',//'删除该组件',
[203] 'widget_custom_add'	=> 'Add new custom component+',//'自定义一个新的组件+',
[205] 'widget_name'	=> 'Component name',//'组件名',
[207] 'widget_content'	=> 'Content (html supported)',//'内容 （支持html）',
[209] 'widget_add'	=> 'Add component',//'添加组件',
[221] 'sidebar'		=> 'Sidebar',//'侧边栏',
[223]// 'sidebar'	=> 'Sidebar',//'侧边栏',
[235]// 'widget_untitled'	=> 'Untitled component',//'未命名组件',
[250] 'widget_category'	=> 'Save widget in category',//'保存组件排序',
[251] 'widget_setting_reset'	=> 'Reset component settings to initial values',//'恢复组件设置到初始安装状态',


);