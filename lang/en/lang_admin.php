<?php

$lang = array(

//---------------------------
//admin/account.php
//'mail_test_header'	=> 'Test mail sending header',//'测试邮件发送标题',
//'mail_test_content'	=> 'Test mail sending content',//'测试邮件发送内容',
//'mail_send_ok'	=> 'Mail sent successfully',//'邮件发送成功',
//'mail_send_error'	=> 'Mail sending failed',//'邮件发送失败',
 'registration_disabled' => 'The system has closed registration!',//'系统已关闭注册！',

//---------------------------
//admin/article.php
 'drafts'		=> 'Drafts',//'草稿箱',
 '_drafts'		=> ' drafts',//'草稿箱',
 'post_manage'		=> 'Article Manage',//'文章管理',
 'draft_manage'		=> 'Draft Manage',//'草稿管理',
 'no_permission'	=> 'Insufficient permissions!',//'权限不足！',
 'check'		=> 'Show',//'审核',
 'uncheck'		=> 'Uncheck',//'驳回',
 'view_by_tag'		=> 'View by tag',//'按标签查看',
 'article_add'		=> 'Write a new article',//'写新文章',
 'enter_summary'	=> 'If left blank, use the content of the article as a summary...',//'如果留空，则使用文章内容作为摘要...',
 'attachment_delete_error'	=> 'Failed to delete the file!',//'删除失败!',

//---------------------------
//admin/blogger.php
 'avatar_delete'	=> 'Delete avatar',//'删除头像',

//---------------------------
//admin/data.php
 'backup_directory_not_writable'	=> 'Backup failed. Backup directory (content/backup) is not writable.',//'备份失败。备份目录(content/backup)不可写',
 'backup_create_file_error'	=> 'Failed to create backup file. Backup directory (content/backup) is not writable.',//'创建备份文件失败。备份目录(content/backup)不可写',
 'backup_empty' 		=> 'There is nothing in the backup data',//'数据表没有任何内容',
 'file_not_exists'		=> 'File does not exist',//'文件不存在',
 'import_only_emlog'		=> 'You can import only emlog SQL backup file',//'只能导入emlog备份的SQL文件',
 'info_illegal'			=> 'Submitted information is illegal',//'非法提交的信息',
 'attachment_exceed_system_limit'	=> 'File size exceeds the system limit ',//'文件大小超过系统 ',
 'upload_failed_code'		=> 'Upload failed. Error code: ',//'上传文件失败,错误码: ',
 'import_only_emlog_no_change'	=> 'You can only import emlog backup archive, and the archive file name can not be changed!',//'只能导入emlog备份的压缩包，且不能修改压缩包文件名！',
 'import_failed_not_read'	=> 'Import failed! Can not read the file',//'导入失败！读取文件失败',
 'import_failed_not_emlog'	=> 'Import failed! The backup file is not the emlog backup file!',//'导入失败！该文件不是emlog的数据备份文件!',
 'import_failed_not_emlog_ver'	=> 'Import failed! The backup file is not the emlog ' . Option::EMLOG_VERSION . ' backup file!',//'导入失败！该文件不是emlog' . Option::EMLOG_VERSION . '生成的备份!',
 'import_failed_bad_prefix'	=> 'Import failed! The database backup file prefix does not match the current system database prefix ',//'导入失败！备份文件中的数据库表前缀与当前系统数据库表前缀不一致',

//---------------------------
//admin/globals.php
// 'no_permission'	=> 'Insufficient permissions!',//'权限不足！',

//---------------------------
//admin/index.php
 'supported'		=> 'Supported',//'支持',
 'not_supported'	=> 'NOT supported',//'不支持',
 'phpinfo_disabled'	=> 'phpinfo function is disabled!',//'phpinfo函数被禁用!',
 'released'		=> ' released',

//---------------------------
//admin/plugin.php
 'plugin_upload_error'	=> 'Plugin upload failed',//'插件上传失败',

//---------------------------
//admin/setting.php
 'site_address'			=> 'Site address',//'站点地址',
 'verification_code_not_supported'	=> 'Failed to open the login verification code! The server space does not support the GD graphics library',//'开启登录验证码失败!服务器空间不支持GD图形库',
 'verification_code_comment_not_supported'	=> 'Failed to open comment verification code! Server space does not support GD graphics library',//'开启评论验证码失败!服务器空间不支持GD图形库',
 'detect_url'			=> 'Automatic detection of site address (may be incompatible with some CDN solutions)',//'自动检测站点地址 (可能和部分CDN解决方案不兼容)',
 'email_enter_please'		=> 'Please enter correct email',//'请填写邮箱',
 'test_mail_subj'		=> 'Test mail',//'测试邮件',
 'test_mail_body'		=> 'This is a test email',//'这是一封测试邮件',
 'test_mail_failed'		=> 'Failed to send',//'发送失败',

//---------------------------
//admin/setting_mail.php
 'email_sending'	=> 'Email sending',//'邮件发送',
 'sender_email'		=> 'Sender email',//'发送人邮箱',
 'smtp_password'	=> 'SMTP password',//'SMTP密码',
 'smtp_server'		=> 'SMTP server',//'SMTP服务器',
 'smtp_port'		=> 'SMTP port',//'端口',
 'smtp_port_info'	=> '(465: ssl protocol, used by QQ mailbox, Netease mailbox, etc.; 587: STARTTLS protocol used by: Outlook mailbox)',//'(465：ssl协议，如QQ邮箱，网易邮箱等，587：STARTTLS协议 如：Outlook邮箱)',
 'send_test'		=> 'Send test',//'发送测试',
 'send_test_prompt'	=> '<b>Let take QQ mailbox configuration as an example</b><br>Sender mailbox: your QQ mailbox<br>SMTP password: see the settings at the top of QQ mailbox -&gt; Account -&gt; Enable IMAP/SMTP service -&gt; Generate authorization code (i.e. SMTP password)<br>SMTP server: smtp.qq.com<br>Port: 465<br>',//'<b>以QQ邮箱配置为例</b><br>发送人邮箱：你的QQ邮箱<br>SMTP密码：见QQ邮箱顶部设置-> 账户 -> 开启IMAP/SMTP服务 -> 生成授权码（即为SMTP密码）<br>SMTP服务器：smtp.qq.com<br>端口：465<br>',
 'recepient_email_enter'	=> 'Enter recepient email',//'输入接收邮箱',
 'send'			=> 'Send',//'发送',

//---------------------------
//admin/setting_user.php
 'registration'		=> 'Registration',//'登录注册',
 'registration_open'	=> 'Open user registration',//'开启用户注册',
 'registration_captcha'	=> 'Enable captcha at registration',//'开启登录注册验证码',
 'registration_captcha_info'	=>  '(to improve security, it is recommended to open)',//'（提高安全性，建议开启）',
 'user_rights'		=> 'User rights',//'用户权限',
 'comment_write'	=> 'Post comments',//'发布评论',
 'guest_rights'		=> 'Visitor permissions',//'游客权限',
 'writer_need_approve'	=> 'Articles published by registered users need to be reviewed',//'注册用户发布文章需要审核',
 'sending'		=> 'Sending',//'发送中',
 'send_ok'		=> 'Sent successfully',//'发送成功',
 
//---------------------------
//admin/store.php
 'template'		=> 'Template',//'模板',
 'templates'		=> 'Templates',//'模板',
 'template_view'	=> 'View template',//'查看模板',
 'plugin'		=> 'Plug-in',//'插件',
 'plugins'		=> 'Plug-ins',//'插件',
 'plugin_view'		=> 'View Plugin',//'查看插件',

//---------------------------
//admin/style.php
 'user'		=> 'User',//'作者',
 'users'	=> 'Users',//'作者',
 'author'	=> 'Author',//'作者',

//---------------------------
//admin/template.php
 'ok_for_emlog'		=> 'Suitable for Emlog: ',//'适用于emlog: ',
 'template_upload_failed'	=> 'Template upload failed',//'模板上传失败',
 'template_used'	=> 'You can not delete a template being used',//'您不能删除正在使用的模板',

//---------------------------
//admin/views/add_log.php
 'post_write'		=> 'Add article',//'写文章',
 'enter_post_title'	=> 'Enter the article title',//'输入文章标题',
 'upload_insert'	=> 'Insert media resources',//'插入图文资源',
 'category_select'	=> 'Select Category...',//'选择分类...',
 'post_time'		=> 'Posted on',//'发布于',
 'more_options'		=> 'More options',//'更多选项',
 'post_description'	=> 'Article Description',//'文章摘要',
 'post_alias'		=> 'Article Link Alias',//'文章链接别名',
 'post_alias_info'	=> 'Used to customize the post link. Required',//'用于自定义文章链接。需要',
 'post_alias_enable'	=> 'Enable link alias',//'启用链接别名',
 'post_access_password'	=> 'Article Access Password',//'文章访问密码',
 'home_top'		=> 'Home Top',//'首页置顶',
 'category_top'		=> 'Category Top',//'分类置顶',
 'allow_comments'	=> 'Allow Comments',//'允许评论',
 'post_publish'		=> 'Publish Article',//'发布文章',
 'save_draft'		=> 'Save Draft',//'保存草稿',

//---------------------------
//admin/views/add_page.php
 'add_page'		=> 'Add page',//'新建页面',
 'page_title_info'	=> 'Enter the page title',//'输入页面标题',
 'upload_insert'	=> 'Insert upload',//'上传插入',
 'link_alias'		=> 'Link alias: (for seo settings <a href="./setting.php?action=seo">&rarr;</a>)',//'链接别名：（用于seo设置 <a href="./setting.php?action=seo">&rarr;</a>）',
 'link_alias_info'	=> 'The page link custom address. Required',//'用于自定义该页面的链接地址。需要',
 'link_alias_enable'	=> 'Enable Link Alias',//'启用链接别名',
 'page_template'	=> 'Page template',//'页面模板',
 'page_template_info'	=> '(For custom page template, use the corresponding .php file under the template directory)',//'（用于自定义页面模板，对应模板目录下.php文件）',
 'page_enable_comments'	=> 'Page accepted comments',//'页面接受评论',
 'page_publish'		=> 'Publish Page',//'发布页面',
 'save'			=> 'Save',//'保存',

//---------------------------
//admin/views/article.php
 'deleted_ok'		=> 'Deleted successfully',//'删除成功',
 'sticked_ok'		=> 'Entry has been sticked successfully',//'置顶成功',
 'unsticked_ok'		=> 'Entry has been unsticked successfully',//'取消置顶成功',
 'select_post_to_operate'	=> 'Please, select the entry to operate',//'请选择要处理的文章',
 'select_action_to_perform'	=> 'Please, select an action to perform',//'请选择要执行的操作',
 'published_ok'		=> 'Entry has been publised successfully',//'发布成功',
 'moved_ok'		=> 'Moved successfully',//'移动成功',
 'user_edit'		=> 'Change author',//'更改作者',
 'user_modified_ok'	=> 'Entry author has been modified successfully',//'更改作者成功',
 'draft_moved_ok'	=> 'Moved to Draft successfully',//'转入草稿箱成功',
 'draft_saved_ok'	=> 'Draft has been saved successfully',//'草稿保存成功',
 'saved_ok'		=> 'Saved successfully',//'保存成功',
 'verified_ok'		=> 'Entry has been verified successfully',//'文章审核成功',
 'rejected_ok'		=> 'Entry has been rejected successfully',//'文章驳回成功',
 'all'			=> 'All',//'全部',
 'category_view'	=> 'View by Category',//'按分类查看',
 'category'		=> 'Category',//'分类',
 'categories'		=> 'Categories',//'分类',
 'uncategorized'	=> 'Uncategorized',//'未分类',
 'view_by_author'	=> 'View by author',//'按作者查看',
 'article_search'	=> 'Search Article',//'搜索文章',
 'title'		=> 'Title',//'标题',
 'view'			=> 'View',//'查看',
 'views'		=> 'Views',//'查看',
 'reads'		=> 'Reads',//'阅读',
 'time'			=> 'Time',//'时间',
 'create_time'		=> 'Create time',//'创建时间',
 'comments'		=> 'Comments',//'评论',
 'attachment_num'	=> 'Attachments',//'附件',
 'pending'		=> 'Pending',//'待审',
 'is_pending'		=> 'pending',//'待审核',
 'reject'		=> 'Reject',//'驳回',
 'open_new_window'	=> 'Open in a new window',//'在新窗口查看',
 'yet_no_posts'		=> 'Yet no entries',//'还没有文章',
 'select_all'		=> 'Select all',//'全选',
 'selected_items'	=> 'Selected items',//'选中项',
 'publish'		=> 'Publish',//'发布',
 'add_draft'		=> 'Save as draft',//'放入草稿箱',
 'top_action'		=> 'Top Operation',//'置顶操作',
 'unstick'		=> 'Unstick',//'取消置顶',
 'move_to_category'	=> 'Move to category',//'移动到分类',
 'change_author'	=> 'Change the author',//'更改作者为',
 'have'			=> 'Have ',//'有',
 'number_of_items'	=> ' ',//'篇',//LEAVE THIS EMPTY! It is just a number of "Items", "Pieces", etc..
 'draft'		=> 'Draft',//'草稿',
// 'drafts'		=> 'drafts',//'草稿',
 'article'		=> 'article',//'文章',
 'articles'		=> 'Articles',//'文章',
 '_articles'		=> ' articles',//'文章',
 'posts'		=> 'Posts',//'文章',
 'select_article'	=> 'Please select the article to operate',//'请选择要操作的文章',
 'sure_delete_articles'	=> 'Are you sure you want to delete selected articles?',//'确定要删除所选文章吗？',
 'tag'			=> 'Tag',//'标签',
 'tags'			=> 'Tags',//'标签',
 'tags_no'		=> 'No tags',//'还没有标签',
 'tag_by_view'		=> 'View by tags',//'按标签查看',
 'top'			=> 'Top',//'置顶',
 'unknown_author'	=> 'Unknown author',//'未知作者',
 'unknown_role'		=> 'Unknown role',//'未知角色',

//---------------------------
//admin/views/article_write.php
 'publish_time'		=> 'Publish time',//'发布时间',
 'access_password'	=> 'Access Password',//'访问密码',
 'choose_file'		=> 'Choose a file for upload...',//'选择文件上传...',
 'tags_have'		=> 'Have tags+',//'已有标签+',
 'post_tags_separated'	=> 'Article tags, separated by commas',//'文章标签，使用逗号分隔',
 'resource_library'	=> 'Media resources',//'图文资源',
 'no_resources'		=> 'No resources available',//'暂无可用资源',
 'file_insert'		=> 'Insert file',//'插入文件',
 'img_insert'		=> 'Insert image',//'插入图片',
 'video_insert'		=> 'Insert video',//'插入视频',
 'go_upload'		=> 'Go Upload',//'去上传',
 'article_cover'	=> 'Article cover',//'文章封面',
 'crop_upload'		=> 'Crop and upload',//'裁剪并上传',
 'uploading'		=> 'Uploading...',//'上传中……',
 'cover_placeholder'	=> 'Cover image URL, fill in manually or click the area below to upload image',//'封面图地址URL，手动填写或点击下方图片区域上传',
 'cover_image'		=> 'Cover image',//'封面图片',
 'recently_used'	=> 'Recently used+',//'近期使用的+',

//---------------------------
//admin/views/admin_page.php
 'page_management'	=> 'Page management',//'页面',
 'page_deleted_ok'	=> 'Page has been removed successfully',//'删除页面成功',
 'page_published_ok'	=> 'Page has been published successfully',//'发布页面成功',
 'page_disabled_ok'	=> 'Page has been disabled successfully',//'禁用页面成功',
 'page_saved_ok'	=> 'Page has been saved successfully',//'页面保存成功',
 'page_view'		=> 'View page',//'查看页面',
 'attachments'		=> 'Attachments',//'附件',
 'no_pages'		=> 'No pages',//'还没有页面',
 'delete'		=> 'Delete',//'删除',
 'make_draft'		=> 'Convert to draft',//'转为草稿',
 '_pages'		=> ' pages',//'个页面',
 'select_page_to_operate'	=> 'Please, select the page to operate',//'请选择要操作的页面',
 'sure_delete_selected_pages'	=> 'Are you sure you want to delete selected pages?',//'确定要删除所选页面吗？',
 'pages_total'		=> 'Total pages:',//'已创建了',

//---------------------------
//admin/views/attlib.php
 'attachment_upload'	=> 'Upload attachment',//'上传附件',
 'bulk_upload'		=> 'Bulk upload',//'('//'批量上传',
 'attachment_library'	=> 'Attachment Library',//'附件库',
// ')',//'）',
 'no_attachments'	=> 'The post has no attachment',//'该文章没有附件',
 'insert'		=> 'Insert',//'插入 ',
 'insert_full_size'	=> 'Insert full size image',//'插入原图',
 'full_size'		=> 'Full size image',//'原图',
 'insert_thumbnail'	=> 'Insert thumbnail',//'插入缩略图',
 'thumbnail'		=> 'Thumbnail',//'缩略图',

//---------------------------
//admin/views/auth.php
// 'em_reg_ok'			=> 'Congratulations, the registration is successful',//'恭喜，注册成功了',
// 'reg_failed'			=> 'Registration failed',//'注册失败',
 'ext_store_info'	=> 'The extension store is used to download templates and plug-ins, only open to registered users',//'扩展商店用于下载模板和插件，仅开放给已完成注册用户',
 'too_many_articles'	=> 'The number of articles has exceeded the unregistered version limit',//'文章数量已经超过未注册版本限额',
 'emlog_notregistered'	=> 'Sorry! Your emlog pro has not been registered, complete the registration to unlock all the functions of emlog pro',//'抱歉！您的emlog pro尚未完成注册， 完成注册来解锁emlog pro的全部功能',
// 'get_emkey'			=> 'Get registration code',//'获取注册码',
// 'ok_register_now'	=> 'Start registration',//'开始注册',
// 'emlog_reg_ok'		=> 'Congratulations, your emlog pro has been registered!',//'恭喜，您的emlog pro已完成注册！',
// 'register_emlog'		=> 'Register EMLOG PRO',//'注册EMLOG PRO',
// 'enter_reg_code'	=> 'Enter the registration code',//'输入注册码',
// 'registered'			=> 'registered',//'注册',
// 'register'		=> 'Register',//'注册',

//---------------------------
//admin/views/blogger.php
 'basic_settings'		=> 'Basic Settings',//'基本设置',
 'user_settings'		=> 'User settings',//'用户设置',
 'email_notify'			=> 'E-mail notification',//'邮件通知',
 'seo_settings'			=> 'SEO Settings',//'SEO设置',
 'background_style'		=> 'Background style',//'后台风格',
 'personal_settings'		=> 'Personal Info',//'个人信息',
 'personal_data_modified_ok'	=> 'Data modified successfully',//'资料修改成功',
 'avatar_deleted_ok'		=> 'Avatar deleted successfully',//'头像删除成功',
 'nickname_is_empty'		=> 'Nickname can not be empty',//'昵称不能为空',
 'email_format_invalid'		=> 'E-mail format invalid',//'电子邮件格式错误',
 'password_length_short'	=> 'Password length must be not less than 5 characters',//'密码长度不得小于5位',
 'password_not_equal'		=> 'Two passwords are not equal',//'两次输入的密码不一致',
 'username_exists'		=> 'This login name already exists',//'该登录名已被占用',
 'nickname_exists'		=> 'This nickname already exists',//'该昵称已被占用',
 'avatar'			=> 'Avatar',//'头像',
 'avatar_format_supported'	=> '(Supported formats: JPG, PNG)',//'(支持JPG、PNG格式图片)',
 'nickname'			=> 'Nicname',//'昵称',
 'email'			=> 'E-mail',//'邮箱',
 'personal_description'		=> 'Personal Description',//'个人描述',
 'login_name'			=> 'Login username (if it is empty, use email to log in)',//'登录用户名（为空则使用邮箱登录）',
 'new_password_info'		=> 'New Password (not less than 5 characters, left blank if do not need to modify)',//'新密码（不小于5位，不修改请留空）',
 'new_password_repeat'		=> 'Repeat new password',//'再输入一次新密码',
 'save_data'			=> 'Save Data',//'保存资料',
 'api_interface'		=> 'API interface',//'API接口',

//---------------------------
//admin/views/comment.php
 'comment_management'	=> 'Comments',//'评论',
 'content'		=> 'Content',//'内容',
 'comment_author'	=> 'Comment author',//'评论人',
 'belongs_to_article'	=> 'Belongs to article',//'所属文章',
 'from_ip'		=> 'From IP',//'来自IP',
 'reply'		=> 'Reply',//'回复',
 'del_from_ip'		=> 'Delete from this IP',//'按IP删除',
 'view_article'		=> 'View the article',//'查看该文章',
 'no_comments_yet'	=> 'Yet no comments',//'还没有收到评论',
 'operation'		=> 'Operation',//'操作',
 'comment_selected_delete_sure'	=> 'Are you sure you want to delete the selected comments?',//'确定要删除所选评论吗？',
 'article_all_comments'	=> 'All comments on this article',//'该文所有评论',

//---------------------------
//admin/views/data.php
 'data_backup'			=> 'Data',//'数据',
 'backup_prompt'		=> 'Back up the site content database to your computer.',//'将站点内容数据库备份到自己电脑上。',
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
 'db_backup'			=> 'Database Backup',//'备份数据库',
 'backup_create'		=> 'Create Backup',//'备份数据',
 'backup_import_local'		=> 'Import Backup',//'导入备份',
 'cache_update'			=> 'Update cache',//'更新缓存',
 'backup_choose_table'		=> 'Choose the database table to backup',//'选择要备份的数据库表',
 'backup_export_to'		=> 'Export database backup to',//'将站点内容数据库备份到',
 'backup_local'			=> 'Local (your computer)',//'本地（自己电脑）',
 'backup_server'		=> 'Server',//'服务器空间',
 'compress_zip'			=> 'Compress to zip format',//'压缩成zip包',
 'backup_file_name'		=> 'Backup file name',//'备份文件名',
 'backup_start'			=> 'Start Backup',//'开始备份',
 'backup_version_tip'		=> 'You can import only the same emlog version database backup files, and the database table prefix must be the same.<br>Current database table prefix: ',//'仅可导入相同版本emlog的数据库备份文件，且数据库表前缀需保持一致。<br/>当前数据库表前缀：',
 'cache_update_info'		=> 'Caching can speed up the site loading speed. Usually the system will automatically update the cache, no manual operation required. But in some special cases, such as the cache file or the database were modified manually, and so the page appears abnormal, it is only need to update the cache manually.',//'缓存可以加快站点的加载速度，通常系统会自动更新缓存。特殊情况需要手动更新，如：缓存文件被修改、手动修改过数据库、页面出现异常等。',
 'cache_update'			=> 'Update the cache',//'更新缓存',
 'backup_file_select'		=> 'Please select the backup file you want to operate',//'请选择要操作的备份文件',
 'backup_delete_sure'		=> 'Are you sure you want to delete the selected backup files? ',//'你确定要删除所选备份文件吗？',

//---------------------------
//admin/views/edit_log.php
 'draft_edit'		=> 'Edit draft',//'编辑草稿',
 'post_edit'		=> 'Edit post',//'编辑文章',
 'used_to_customize'	=> 'It is used to customize the article link. Needs ',//'用于自定义该篇文章的链接地址。需要',
 'save_and_return'	=> 'Save and Return',//'保存并返回',

//---------------------------
//admin/views/edit_page.php
 'page_edit'			=> 'Edit Page',//'编辑页面',

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
// 'post_write'		=> 'Add article',//'写文章',
 'draft'		=> 'Draft',//'草稿',
// 'posts'		=> 'Posts',//'文章',
 'posts_pending'	=> ' Pending posts',//'篇文章待审',
 'comments_pending'	=> ' Pending comments',//'条评论待审',
 'exterior'		=> 'Exterior',//'外观',
 'sidebar'		=> 'Sidebar',//'边栏',
 'navigation'		=> 'Navigation',//'导航',
 'pages'		=> 'Pages',//'页面',
 'link'			=> 'Link',//'链接',
 'links'		=> 'Links',//'链接',
 'url'			=> 'URL',//'链接',
 'friend_links'		=> 'Friend links',//'友链',
 'store'		=> 'Store',//'商店',
 'users'		=> 'Users',//'用户',
 'data'			=> 'Data',//'数据',
 'applications'		=> 'Apps',//'应用',
 'extensions'		=> 'Extensions',//'扩展',//'扩展功能',
 'search_for'		=> 'Search for...',//'查找文章...',
 'search'		=> 'Search',//'Search',
 'resources'		=> 'Resources',//'资源',
 'twitters'		=> 'Notes',//'笔记',
 'user_center'		=> 'User Center',//'用户中心',

//---------------------------
//admin/views/index.php
 'welcome'		=> 'Welcome',//'欢迎',
 'admincp'		=> 'AdminCP',//'管理后台',
 'link_manage_info'	=> 'Friendship link management, you can display the added link in the sidebar of the homepage in the sidebar management.',//'友情链接管理，可以在侧边栏管理中将该处添加的链接展示在首页侧边栏。',
 'user_info'		=> 'User info',//'大伟',
 'system_settings'	=> 'System settings',//'系统设置',
 'control_panel'	=> 'Control panel',//'控制台首页',
 'post_number'		=> 'Number of articles',//'文章数量',
 'comment_number'	=> 'Number of comments',//'评论数量',
 'tasks'		=> 'Tasks',
 'pending_requests'	=> 'Pending Requests',
 'emlog_official'	=> 'Emlog official site',//'采用emlog系统',
 'logout_sure'		=> 'Ready to Leave?',
 'close'		=> 'Close',//'关闭',
 'logout_prompt'	=> 'Select "Logout" below if you are ready to end your current session.',
 'system'		=> 'System',//'系统',
 'cancel'			=> 'Cancel',//'取消',
 'site_info'			=> 'Site Info',//'站点信息',
 '_comments'			=> ' comments',//'条评论',
 'db_prefix'			=> 'Database table prefix',//'数据库表前缀',
 'php_version'			=> 'PHP version',//'PHP版本',
 'emlog_version'		=> 'EMLOG version',//'EMLOG版本',
 'unregistered'			=> 'unregistered',//'未注册',
 'emlog_unregistered'		=> 'Your emlog pro is not registered yet',//'您的emlog pro尚未注册',
 'emlog_reg_advantages'		=> 'Your emlog pro is not registered, please complete the registration first and you will have:',//'您安装的emlog pro尚未注册，注册后将获得：',
 'advantage1'			=> '1. One-click upgrade to get official security and function updates.',//'1、一键升级，获得来自官方的安全和功能更新。',
 'advantage2'			=> '2. Unlock the extended store to get more templates and plugins.',//'2、解锁扩展商店，获得更多模板和插件。',
 'advantage3'			=> '3. Remove the usage restrictions and all unregistered prompts.',//'3、解除使用限制和所有未注册提示',
 'advantage4'			=> '4. Vote me as a peach, give me a reward, and support us to make emlog better.',//'4、投我以桃，报之以李，支持我们把emlog做的更好。',
 'register_now'			=> 'Register now',//'现在去注册',
 'emlog_registered_ok'		=> 'Congratulations, your EMLOG has been registered.',//'恭喜，您的EMLOG已经完成注册。',
 'em_reg_ok'			=> 'Congratulations, the registration is successful',//'恭喜，注册成功了',
 'register_emlog'		=> 'Register EMLOG PRO',//'注册EMLOG PRO',
 'enter_emkey'			=> 'Enter EMKEY',//'输入EMKEY',
 'reg_failed'			=> 'Registration failed',//'注册失败',
 'reg_code_invalid'		=> 'Registration failed, invalid registration code',//'注册失败，无效的注册码',
 'emkey_info'			=> 'EMKEY is the only identification code officially distributed to paying users of emlog pro, please keep it properly',//'EMKEY是官方分发给emlog pro付费用户的唯一识别码，请妥善保管',
 'get_emkey'			=> 'Get registration code',//'获取注册码',
 'registered'			=> 'registered',//'注册',
 'registered_already'		=> 'already registered',//'已注册',
 'mysql_version'		=> 'MySQL version',//'MySQL版本',
 'server_environment'		=> 'Server software environment',//'服务器软件环境',
 'software_info'		=> 'Software information',//'软件信息',
 'gd_library'			=> 'GD graphic library',//'GD图形处理库',
 'server_max_upload_size'	=> 'Maximum upload file size allowed by server',//'服务器空间允许上传最大文件',
 'more_php_info'		=> 'More Info&raquo;',//'更多信息&raquo;',
 'official_news'		=> 'Official news',//'官方消息',
 'using_emlog'			=> 'You are using emlog',//'您正在使用emlog',
 'view_changelog'		=> 'View changelog',//'查看更新内容',
 'update_check'			=> 'Check for updates',//'检查更新',
 'reading'			=> 'Is reading...',//'正在读取...',
 'checking_wait'		=> 'Is checking, please wait',//'正在检查，请稍后',
 'updates_no'			=> 'Already the latest version',//'已经是最新版本',
 'update_exists'		=> 'It is available emlog updated version ',//'有可用的emlog更新版本 ',
 'backup_before_update'		=> ' Do not forget to make a backup before updating job, ',//'，更新之前请您做好数据备份工作，',
 'update_now'			=> 'Update now',//'现在更新',
 'update_check_failed'		=> 'Check failed, may be a network problem exists',//'检查失败，可能是网络问题',
 'updating'			=> 'Updating, please wait patiently',//'正在更新中，请耐心等待',
 'update_completed'		=> 'Congratulations! The update is successful, please <a href="./">refresh the page</a> to start experiencing the new version of emlog',//'恭喜您！更新成功了，请<a href="./">刷新页面</a> 开始体验新版emlog',
 'update_download_failed'	=> 'Download the update failed, may be a network problem exists',//'下载更新失败，可能是服务器网络问题',
 'update_extract_failed'	=> 'Extract the update failed, may be the server does not support the zip extension',//'解压更新失败，可能是你的服务器空间不支持zip模块',
 'update_failed_nonwritable'	=> 'Update failed, the directory is not writable',//'更新失败，目录不可写',
 'update_failed'		=> 'Update failed',//'更新失败',
 'you_can_enter'		=> '(You can enter ',//'(你还可以输入',
 '_characters'			=> ' characters',//'字',
 'exceeds'			=> 'has been exceeded ',//'已超出',
 'publish'			=> 'Publish',//'发布',
 'write_article'		=> 'Write an article',//'去写文章',
 'pending_review'		=> 'Review pendings',//'待审评论',
 'user_num'			=> 'Number of users',//'用户数',
 'go_to_register'		=> 'Go to register',//'去注册',
 'update_expired'		=> 'The update service has expired, ',//'更新服务已到期，',
 'log_in_to_renew'		=> 'Log in to the official website to renew',//'登录官网续期',

//---------------------------
//admin/views/links.php
 'link_add'		=> 'Add Link',//'新建链接',
 'link_management'	=> 'Friend links',//'友情链接',
 'links_created'	=> 'Links created',//'已创建的链接',
 'order'		=> 'Order',//'排序',
 'edit_link'		=> 'Edit link',//'编辑链接',
 'click_to_hide'	=> 'Click to hide',//'点击隐藏链接',
 'visible'		=> 'Visible',//'显示',
 'click_to_show'	=> 'Click to show',//'点击显示链接',
 'view_link'		=> 'View link',//'查看链接',
 'no_links'		=> 'No link added yet',//'还没有添加链接',
 'name'			=> 'Name',//'名称',
 'link_url'		=> 'Link URL',//'地址',
 'site_and_url_empty'	=> 'Site name and address can not be empty',//'名称和地址不能为空',

//---------------------------
//admin/views/login.php
 'login'		=> 'Login',//'登录',
 'user_name'		=> 'User name',//'用户名',
 'password'		=> 'Password',//'密码',
 'remember_me'		=> 'Remember Me',//'记住登录状态',
 'log_in'		=> ' Log in ',//' 登 录 ',
 'back_home'		=> 'Back to home',//'返回首页',
 'password_forget'	=> 'Forgot Password?',//'忘记密码?',
 'account_register'	=> 'Register an account',//'注册账号',
 'validation_error'	=> 'Validation error, please re-enter',//'验证错误，请重新输入',
 'password_invalid'	=> 'User or password incorrect, please re-enter',//'用户或密码错误，请重新输入',

//---------------------------
//admin/views/media.php
 'resource_manage'	=> 'Multimedia resources',//'多媒体资源',
 'file'			=> 'File',//'文件',
 'preview'		=> 'Preview',//'预览',
 'date'			=> 'Date',//'日期',
 'size'			=> 'Size',//'大小',
 'img_size'		=> 'Image size',//'尺寸',
 'upload_files'		=> 'Upload image/file',//'上传图片/文件',
 'media_deleted_ok'	=> 'Media file deleted successfully',//'媒体文件删除成功',
 '_resources'		=> 'resources',//'个资源',
 'resource_del_selected'	=> 'Delete selected resources',//'删除所选资源',
 'resource_select'	=> 'Please select the resource to be deleted',//'请选择要删除的资源',
 'resource_del_sure'	=> 'Are you sure you want to delete the selected resource?',//'确定要删除所选资源吗？',
 'founder'		=> 'Founder',//'创建人',
 'image_address_original'	=> 'Original image address',//'原图地址',

//---------------------------
//admin/views/media_lib.php
 'upload_time'		=> 'Upload time',//'上传时间',
 'insert_into'		=> 'Insert into article',//'插入到文章',
 'set_cover'		=> 'Set as cover',//'设为封面',

//---------------------------
//admin/views/navbar.php
 'nav_manage'		=> 'Navigation',//'导航',
 'nav_cat_update_ok'	=> 'Category updated successfully',//'排序更新成功',
 'nav_delete_ok'	=> 'Navigation deleted successfully',//'删除导航成功',
 'nav_edit_ok'		=> 'Navigation modified successfully',//'修改导航成功',
 'nav_add_ok'		=> 'Navigation added successfully',//'添加导航成',
 'nav_name_url_empty'	=> 'Navigation name and address can not be empty',//'导航名称和地址不能为空',
 'nav_no_order'		=> 'There is no navigation categories',//'没有可排序的导航',
 'nav_default_nodelete'	=> 'You can not delete the default navigation',//'默认导航不能删除',
 'nav_select_category'	=> 'Please choose the category to add in',//'请选择要添加的分类',
 'nav_select_page'	=> 'Please select the page you want to add',//'请选择要添加的页面',
 'nav_url_invalid'	=> 'Navigation address format error (must include the prefix http, etc.)',//'导航地址格式错误(需包含http等前缀)',
 'nav_edit'		=> 'Edit navigation',//'编辑导航',
 'hide'			=> 'Hide',//'隐藏',
 'hidden'		=> 'Hidden',//'隐藏',
 'nav_hide_click'	=> 'Click to hide navigation',//'点击隐藏导航',
 'nav_show_click'	=> 'Click to show navigation',//'点击显示导航',
 'nav_no'		=> 'Has not yet added navigation',//'还没有添加导航',
 'nav_add_custom'	=> 'Add custom navigation',//'添加自定义导航',
 'nav_name'		=> 'Navigation Name',//'导航名称',
 'nav_url'		=> 'Address (URL)',//'地址(URL)',
 'nav_parent'		=> 'Parent navigation',//'父导航',
 'nav_add_category'	=> 'Add categories to navigation',//'添加分类到导航',
 'nav_page_add'		=> 'Add pages to navigation',//'添加页面到导航',
 'id'			=> 'ID',//'序号',
 'navigation'		=> 'Navigation',//'导航',
 'type'			=> 'Type',//'类型',
 'status'		=> 'Status',//'状态',
 'view'			=> 'View',//'查看',
 'address'		=> 'Address',//'地址',
 'add'			=> 'Add',//'添加',

//---------------------------
//admin/views/naviedit.php
// 'nav_name'		=> 'Navigation Name',//'导航名称',

//---------------------------
//admin/views/page.php
 'page_title'		=> 'Page title',//'页面标题',
 'setting_items'	=> 'Setting items',//'设置项',

//---------------------------
//admin/views/plugin.php
 'plugin_manage'		=> 'Plug-ins',//'插件扩展',
 'plugin_upload_ok'		=> 'Plugin uploaded successfully, please activate it to use',//'插件上传成功，请开启使用',
 'plugin_active_ok'		=> 'Plug-in activated successfully',//'插件开启成功',
 'plugin_active_failed'		=> 'Plug-in activation failed',//'插件开启失败',
 'plugin_disable_ok'		=> 'Plug-in disabled successfully',//'插件禁用成功',
 'plugin_delete_failed'		=> 'Delete failed, check the plug-in file permissions',//'删除失败，请检查插件文件权限',
 'plugin_name'			=> 'Plug-in name',//'插件名',
 'plugin_status'		=> 'Status',//'开关',
 'version'			=> 'Version',//'版本',
 'description'			=> 'Description',//'描述',
 'plugin_active_click'		=> 'Click to activate the plug-in',//'点击激活插件',
 'plugin_disable_click'		=> 'Click to disable the plug-in',//'点击禁用插件',
 'plugin_settings_click'	=> 'Click to plug-in settings',//'点击设置插件',
 'more_info'			=> 'More Info&raquo;',//'更多信息&raquo;',
 'plugin_no_installed'		=> 'No installed plugins',//'还没有安装插件',
 'plugin_install'		=> 'Install plugin',//'安装插件',
 'plugin_new_install'		=> 'Install plugin',//'安装插件',

//---------------------------
//admin/views/plugin_install.php
// 'plugin_install'		=> 'Install plugin',//'安装插件',
 'plugin_zipped_only'		=> 'Supports plug-in package only in zip compression format',//'只支持zip压缩格式的插件包',
 'plugin_not_writable'		=> 'Upload failed, plugin directory (content/plugins) is not writable',//'上传失败，插件目录(content/plugins)不可写',
 'plugin_zip_nonsupport'	=> 'Server does not support zip module, follow the prompts to install the plugin manually' ,//'空间不支持zip模块，请按照提示手动安装插件',
 'plugin_zip_select'		=> 'Please select a zipped plug-in installation package',//'请选择一个zip插件安装包',
 'plugin_wrong_format'		=> 'Installation failed, plug-in installation package does not meet the standards',//'安装失败，插件安装包不符合标准',
 'plugin_install_manually'	=> 'Install the plug-in manually',//'手动安装插件',
 'install_promt_1'		=> '1) Unzip the plugin file and upload it to the content/plugins directory.',//'1、把解压后的插件文件夹上传到 content/plugins 目录下。',
 'install_prompt2'		=> '2) Log in to AdminCP, go to Plug-in management, and if the plug-in is already listed, you can click on it to activate it.',//'2、登录后台进入插件管理,插件管理里已经有了该插件，点击激活即可。',
 'upload_install'		=> 'Upload and install',//'上传安装',
 'upload_install_info'		=> 'Upload a plug-in installation package in zip compressed format',//'（上传一个zip压缩格式的插件安装包）',
 'plugin_get_more'		=> 'Get More Plugins',//'获取更多插件',
 'app_center'			=> 'App center &raquo;',//'应用中心&raquo;',

//---------------------------
//admin/views/register.php
// 'ext_store_info'	=> '扩展商店用于下载模板和插件，仅开放给已完成注册用户',//'The extension store is used to download templates and plug-ins, only open to registered users',
// 'too_many_articles'	=> '文章数量已经超过未注册版本限额',//'The number of articles has exceeded the unregistered version limit',
// 'emlog_notregistered'	=> '抱歉！您的emlog pro尚未完成注册， 完成注册来解锁emlog pro的全部功能',//'Sorry! Your emlog pro has not been registered, complete the registration to unlock all the functions of emlog pro',
 'ok_register_now'	=> 'Start registration',//'开始注册',
 'emlog_reg_ok'		=> 'Congratulations, your emlog pro has been registered!',//'恭喜，您的emlog pro已完成注册！',
 'enter_reg_code'	=> 'Enter the registration code',//'输入注册码',
 'register'		=> 'Register',//'注册',
 'email_format_error'	=> 'Email format error',//'错误的邮箱格式',
 'email_in_use'		=> 'Email is already in use',//'该邮箱已被注册',
 'password_short'	=> 'Password must not be less than 5 digits',//'密码不小于5位',

//---------------------------
//admin/views/reset.php
 'retrieve_password'	=> 'Retrieve password',//'找回密码',
// 'email'			=> 'E-mail',//'邮箱',
// 'captcha'			=> 'Captcha',//'验证码',
 'new_password'		=> 'New password',//'新的密码',
 'confirm_password'	=> 'Confirm new password',//'确认新密码',
// 'submit'		=> 'Submit',//'提交',
// 'login'		=> 'Login',//'登录',
// 'back_home'		=> 'Back to home',//'返回首页',
 'email_enter'		=> 'Enter registered email',//'输入注册邮箱',
 'email_invalid'	=> 'Wrong registered email',//'错误的注册邮箱',
 'email_send_error'	=> 'Failed to send email verification code, please check email notification settings',//'邮件验证码发送失败，请检查邮件通知设置',
 'verification_error'	=> 'Email verification code error',//'邮件验证码错误',

//---------------------------
//admin/views/reset2.php
 'password_recover'		=> 'Recover Password: Reset Password',//'找回密码：重置密码',
 'enter_code_from_email'	=> 'The email verification code has been sent to your email, please check and fill in',//'邮件验证码已发送到你的邮箱，请查收后填写',
 'email_verification_code'	=> 'Email verification code',//'邮件验证码',

//---------------------------
//admin/views/seo.php
 'htaccess_not_writable'	=> 'Save failed: .htaccess file in the root directory is not writable',//'保存失败：根目录下的.htaccess不可写',
 'post_url_settings'		=> 'Post URL settings',//'文章链接设置',
 'post_url_rewriting'		=> 'If the article cannot be accessed after the modification, it may be that the server space does not support URL rewriting. Please modify it back to the default form and turn off the article connection alias.',//'如果修改后文章无法访问，可能是服务器空间不支持URL重写，请修改回默认形式、关闭文章连接别名。 启用链接别名后可以自定义文章和页面的链接地址。',
 'post_url'			=> 'Article URL',//'文章链接',
 'default_format'		=> 'Default format',//'默认格式',
 'file_format'			=> 'File format',//'文件格式',
 'directory_format'		=> 'Directory format',//'目录格式',
 'category_format'		=> 'Category format',//'分类格式',
 'enable_html_suffix'		=> 'Enable html suffix for link alias',//'启用链接别名html后缀',
 'meta_settings'		=> 'Header Meta settings',//'meta信息设置',
 'meta_title'			=> 'Site Browser Title (title)',//'站点浏览器标题(title)',
 'meta_keywords'		=> 'Site keywords (keywords)',//'站点关键字(keywords)',
 'meta_description'		=> 'Site Browser Description (description)',//'站点浏览器描述(description)',
 'meta_title_scheme'		=> 'Post browser title scheme',//'文章浏览器标题方案',
 'post_title'			=> 'Article title',//'文章标题',
 'post_title_site_title'	=> 'Article title - Site title',//'文章标题 - 站点标题',
 'post_title_site_meta_title'	=> 'Article title - Site browser title',//'文章标题 - 站点浏览器标题',
 'nginx_rewrite'		=> 'Please configure the following pseudo-static rules for the Nginx server',//'Nginx服务器请配置如下伪静态规则',

//---------------------------
//admin/views/setting.php
 'settings_saved_ok'	=> 'Settings have been saved successfully',//'设置保存成功',
 'site_title'		=> 'Site title',//'站点标题',
 'site_subtitle'	=> 'Site subtitle',//'站点副标题',
 'site_address	'	=> 'Site address',//'站点地址',
 'per_page'		=> 'Show per page',//'每页显示',
 'posts_per_page'	=> 'Number of articles displayed per page',//'每页显示文章数量',
 '_posts'		=> ' posts',//'篇文章',
 'your_timezone'	=> 'Your time zone',//'你所在时区',
 'local_time'		=> 'Local Time',//'本地时间',
 'export'		=> 'Export ',//'输出',
 'rss_output_num'	=> ' posts, and output as',//'篇文章，且输出',
 'full_text'		=> 'Full Text',//'全文',
 'summary'		=> 'Summary',//'摘要',
 'rss_post_num'		=> 'articles (0 is closed), and output',//'篇文章（0为关闭），且输出',
 'function_switch'		=> 'Function switch',//'功能开关',
 'login_verification_code'	=> 'Login verification code',//'登录验证码',
 'gzip_compression'		=> 'Gzip compression',//'Gzip压缩',
 'offline_writing'		=> 'Offline Writing (Support the use of tools such as Windows Live Writer to write articles)',//'离线写作（支持用Windows Live Writer等工具写文章）',
 'mobile_access_address'	=> 'Mobile Access version, address',//'手机访问版，地址',
 'access_site_by_mobile'	=> 'Access to your site using a mobile phone',//'用手机访问你的站点',
 'auto_summary'			=> 'Automatic summary',//'自动摘要',
 'auto_summary_length'		=> 'Automatically intercept',//'自动截取',
 'characters_as_summary'	=> ' characters as a summary',//'个字作为摘要',
 'reply_verification_code'	=> 'Reply verification code, ',//'回复验证码，',
 'reply_audit'			=> 'Reply audit',//'回复审核',
 'enable_comments'		=> 'Enable comments',//'开启评论',
 'comment_interval'		=> 'Comment interval',//'发表评论间隔',
 'seconds'			=> 'seconds',//'秒',
 'comment_moderation'		=> 'Comment moderation',//'评论审核',
 'comment_verification_code'	=> 'Comments Verification Code',//'评论验证码',
 'comment_avatar'		=> 'Comments author avatar',//'评论人头像',
 'comment_must_contain_chinese'	=> 'Comments must contain Chinese',//'评论内容必须包含中文',
 'comment_per_page'		=> 'Comments per page',//'评论分页，',
 'comments_per_page'		=> 'Display the number of comments per page',//'每页显示评论条数',
 'standing_in_front'		=> 'Standing in front',//'排在前面',
 'upload_max_size'		=> 'Upload attachment maximum size',//'附件上传最大限制',
 'php_upload_max_size'		=> 'Upload file has been configured by server PHP maximum upload space',//'上传文件还受到服务器空间PHP配置最大上传',
 'allow_attach_type'		=> 'Allow attachment types to upload',//'允许上传的附件类型',
 'separate_by_comma'		=> ' (Separate multiple values by a comma)',//'（多个用半角逗号分隔）',
 'thumbnail_max_size'		=> 'Uploaded pictures generated thumbnail maximum size: ',//'上传图片生成缩略图，最大尺寸：',
 'unit_pixels'			=> ' (Unit: pixels)',//'（单位：像素）',
 'icp_reg_no'			=> 'ICP Reg.&nbsp;No.',//'ICP备案号',
 'home_footer_info'		=> 'Footer info at the Home',//'首页底部信息',
 'home_footer_info_html'	=> '(HTML supported, can be used to add a traffic statistics code)',//'(支持html，可用于添加流量统计代码)',
 'save_settings'		=> 'Save Settings',//'保存设置',
 'before_intercept'		=> 'Intercept before article ',//'截取文章的前',
 'comment_sort'			=> 'Sort comments',//'评论排序方式',
 'new_first'			=> 'New first',//'新的靠前',
 'old_first'			=> 'Old first',//'旧的靠前',
 'article_settigs'		=> 'Article Settings',//'文章设置',
 'upload_settings'		=> 'Upload settings',//'上传设置',
 'comment_settings'		=> 'Comment settings',//'评论设置',

//---------------------------
//admin/views/setting_api.php
 'api_key_reset_ok'	=> 'Interface key was reset successfully',//'接口秘钥重置成功',
//'basic_settings'	=> 'Basic Settings',//'基本设置',//'基础设置',
//'seo_settings'	=> 'SEO Settings',//'SEO设置',//'SEO优化',
 'api_enable'		=> 'Enable API',//'开启API',
 'api_key'		=> 'API key',//'API秘钥',
 'api_key_reset'	=> 'Reset API key',//'重置API秘钥',
 'api_list'		=> 'List of API interfaces',//'API接口列表',
 'api_1'		=> '1. Article publishing (can be used for docking with content publishing software)',//'文章发布 (可用于对接内容发布软件)',
 'api_2'		=> '2. Article list',//'文章列表',
 'api_3'		=> '3. Article Details',//'3. 文章详情',
 'api_4'		=> '4. Category list',//'4. 分类列表',
 'api_docs'		=> 'See the interface documentation for details→',//'详见接口文档→',

//---------------------------
//admin/views/setting_user.php
 'groups_about'		=> '<b>User Group</b><br>Registered users: generated through registration, can publish articles, notes, upload pictures, etc.<br>Content editor: responsible for the management of articles, resources, comments, etc.<br>Administrator: Has all site management rights, can manage users, perform system settings, etc.<br>',//'<b>用户组</b><br>注册用户：通过注册产生，可以发布文章、笔记、上传图片等<br>内容编辑：负责文章、资源、评论等内容的管理<br>管理员：拥有站点全部管理权限，可以管理用户、进行系统设置等<br>',

//---------------------------
//admin/views/signin.php
// 'em_reg_ok'		=> 'Registration is successful, please log in',//'注册成功，请登录',
 'password_reset_ok'	=> 'Password reset successfully, please log in',//'密码重置成功，请登录',


//---------------------------
//admin/views/sort.php
 'category_management'	=> 'Article categories',//'文章分类',
 'category_name'	=> 'Category name',//'分类名',
 'alias_prompt'		=> 'Used for friendly display of URL, optional',//'用于URL的友好显示，可不填',
 'category_parent'	=> 'Parent category',//'父分类',
 'submit'		=> 'Submit',//'提交',
 'category_add'		=> 'Add Category',//'添加分类',
 'tag_add'		=> 'Add Tag',//'新建标签',
 'template_name'	=> 'Template name',//'模板名',
 'category_id'		=> 'Category ID',//'分类ID',

//---------------------------
//admin/views/store.php
 'install_ok'		=> 'Successful installation',//'安装成功',
 'install_failed'	=> 'Installation failed',//'安装失败',
 'install_failed_download'	=> 'Installation failed, unable to download the installation package',//'安装失败，无法下载安装包',
 'install_failed_write'	=> 'Installation failed, unable to write files, please check whether the content/ directory is writable',//'安装失败，无法写文件，请检查content/下目录是否可写',
 'install_failed_zip'	=> 'Installation failed, unable to decompress, please install php Zip extension',//'安装失败，无法解压，请安装php的Zip扩展',
 'install_invalid_ext'	=> 'Installation failed, not a valid installation package',//'安装失败，不是有效的安装包',
 'store_unavailable'	=> 'The store is temporarily unavailable, it may be a network problem',//'商店暂不可用，可能是网络问题',
// 'back_home'		=> 'Back to home',//'返回首页',
 'ext_store'		=> 'Extension Store',//'扩展商店',
 'ext_store_templates'	=> 'Template themes',//'模板主题',
// 'template'		=> 'Template',//'模板',
 'extensions'		=> 'Extensions',//'扩展插件',
 'ext_store_plugins'	=> 'Extensions',//'扩展插件',

 'developer'		=> 'Developer',//'开发者',
 'update_time'		=> 'Update time',//'更新时间',
 'price'		=> 'Price',//'价格',
 'free'			=> 'Free',//'免费',
 'price_unit'		=> 'Yuan',//'元',
 'go_buy'		=> 'Go to buy',//'去购买',
 'download&install'	=> 'Download and install',//'下载安装',
// 'plugin'		=> 'Plug-in',//'插件',
// 'developer'		=> 'Developer',//'开发者',
// 'update_time'	=> 'Update time',//'更新时间',
// 'price'		=> 'Price',//'价格',
// 'free'		=> 'Free',//'免费',
// 'go_buy'		=> 'Go to buy',//'去购买',
// 'download&install'	=> 'Download and install',//'下载安装',
 'app_store'		=> 'App store',//'应用商店',
 'version_number'	=> 'Version number',//'版本号',

//---------------------------
//admin/views/store_install.php
 'install'			=> 'Install',//'安装',
 'package_downloading'		=> 'Downloading package...',//'正在下载安装中',
 'plugin_install_ok'		=> 'Plugin has been installed successfully',//'安装成功，',
 'plugin_download_failed'	=> 'Download failed. It may be network problem. Please, download and install manually.',//'下载失败，可能是服务器网络问题，请手动下载安装，',
 'return_app_center'		=> 'Return to app center',//'返回应用中心',
 'install_failed_zip_nonsupport'	=> 'Installation failed. It seems your server does not support zip module. Please, download and install manually.',//'安装失败，可能是你的服务器空间不支持zip模块，请手动下载安装，',
 'install_failed_folder_nonwritable'	=> 'Installation failed. Probably, directory is not wirtable.',//'安装失败，可能是应用目录不可写，',
 'install_failed'			=> 'Installation failed.',//'安装失败，',

//---------------------------
//admin/views/store_plu.php
 'install_free'			=> 'Install for free',//'免费安装',
 'plugin_search'		=> 'Search plugin',//'搜索插件',
 'show_free_only'		=> 'Show only free',//'仅看免费',
 'store_no_results'		=> 'No results have been found yet, the app store is in stock, so stay tuned :)',//'暂未找到结果，应用商店进货中，敬请期待：）',

//---------------------------
//admin/views/store_tpl.php
 'temlate_search'	=> 'Search Templates...',//'搜索模板...',

//---------------------------
//admin/views/style.php
 'use_this_style'	=> 'Click to use this style',//'点击使用该风格',

//---------------------------
//admin/views/tag.php
 'tag_management'	=> 'Article tags',//'文章标签',
 '_save_'	=> ' Save ',//'保 存',
 '_cancel_'	=> ' Cancel ',//'取 消',
 'tag_select'	=> 'Please select a tag',//'请选择标签',
 'tag_delete_sure'	=> 'Are you sure you want to delete the selected tags?',//'你确定要删除所选标签吗？',
 '_tags'		=> ' tags',//'个标签', 

//---------------------------
//admin/views/template.php
 'template_manager'		=> 'Templates',//'模板外观',
 'template_current'		=> 'Current template',//'当前模板',
 'template_change_ok'		=> 'Template have been replaced successfully',//'模板更换成功',
 'template_current_use'		=> 'Currently used template',//'当前使用的模板',
 'template_damaged'		=> 'This template has been damaged! Please choose another template.',//'已被删除或损坏，请选择其他模板。',
 'template_top_image'		=> 'Custom top image',//'自定义顶部图片',
 'template_library'		=> 'Template library',//'模板库',
 'template_upload_ok'		=> 'Template have been uploaded successfully',//'模板上传成功',
 'template_delete_ok'		=> 'Template have been removed successfully',//'删除模板成功',
 'template_delete_failed'	=> 'Delete failed, check the template file permissions',//'删除失败，请检查模板文件权限',
 'template_use_this'		=> 'Use this template',//'使用该模板',
 'template_add'			=> 'Install template',//'安装模板',
 'template_install'		=> 'Install template',//'安装模板',
 'template_author'		=> 'Template author',//'模板开发者',

//---------------------------
//admin/views/template_crop.php
 'image_crop'		=> 'Crop image',//'裁剪图片',
 'crop_and_save'	=> 'Crop and save',//'剪裁并保存',
 'crop_cancel'		=> 'Cancel crop',//'取消裁剪',
 'crop_load_prompt'	=> '(When page loading is completed, but it is not appear in the select area, then press the left mouse button to drag the selected manually)',//'(页面加载完毕后，未出现选择区域时请按下鼠标左键手动拖曳选取)',

//---------------------------
//admin/views/template_install.php
 'template_zip_support'		=> 'Only supported for .zip files.',//'只支持zip压缩格式的模板包',
 'template_not_writable'	=> 'Upload failed. Template directory (content/templates) cannot be written.',//'上传失败，模板目录(content/templates)不可写',
 'template_no_zip'		=> 'Server does not support zip module, please install it manually:<br>',//'空间不支持zip模块，请手动安装： <br/>',
 'template_select_zip'		=> 'Please select a zipped template installation package',//'请选择一个zip模板安装包',
 'template_non_standard'	=> 'Installation failed, template installation package does not meet the standards',//'安装失败，模板安装包不符合标准',
 'template_install_manual'	=> 'Template manual installation',//'手动安装模板',
 'template_install_prompt1'	=> '1. Upload the decompressed template folder to the content/templates directory. <br/>',//'1、把解压后的模板文件夹上传到 content/templates目录下。 <br/>',
 'template_install_prompt2'	=> '2. Log in to the admin panel to change the template. The template you just added is already in the template library, just click to use it. <br/> ',//'2、登录后台换模板，模板库中已经有了你刚才添加的模板，点击使用即可。 <br/>',
 'template_upload_prompt'	=> 'Upload .zip file that contains installation package',//'上传一个zip压缩格式的模板安装包',
 'template_get_more'		=> 'Get more templates',//'获取更多模板',

//---------------------------
//admin/views/template_top.php
 'image_replace_ok'		=> 'Image has been replaced successfully.',//'顶部图片更换成功',
 'image_crop_error'		=> 'Image crop error',//'裁剪图片失败',
 'top_image_unavailable'	=> 'Current top image is unused or deleted',//'当前未使用顶部图片或者使用中的顶部图片被删除',
 'images_optional'		=> 'Optional images',//'可选图片',
 'image_click_to_use'		=> 'Click on image to use it',//'点击使用该图片',
 'top_image_not_use'		=> 'Do not use the top image.',//'不使用顶部图片',
 'top_image_custom'		=> 'Custom image',//'自定义图片',
 'upload'			=> 'Upload',//'上传',
 'top_image_upload_prompt'	=> '(Upload your favourite picture to top. Supported formats: jpg, png.)',//'(上传一张你喜欢的顶部图片，支持JPG、PNG格式)',

//---------------------------
//admin/views/twitter.php
// 'published_ok'		=> 'Entry has been publised successfully',//'发布成功',
// 'settings_saved_ok'	=> 'Settings have been saved successfully',//'设置保存成功',
 'twitter_del_ok'	=> 'Note deleted successfully',//'笔记删除成功',
 'twitter_empty'	=> 'Note content cannot be empty',//'笔记内容不能为空',
 'twitter_add'		=> 'Add a note',//'卡片笔记',
 'twitter_prompt'	=> 'Quickly record ideas, help you easily capture inspiration and accumulate knowledge compound interest',//'快速记录想法，帮你方便的捕捉灵感，积累知识的复利',
 'twitter_save'		=> 'Save the note',//'保存笔记',
// 'delete'		=> 'Delete',//'删除',
// 'have'			=> 'Have ',//'有',
 'twitters'			=> 'Notes',//'笔记',
 '_twitters'			=> ' note(s)',//'条笔记',

//---------------------------
//admin/views/upload.php
 'attach_max_size'	=> 'Maximum size of single attachment',//'单个附件最大',
 'types_allowed'	=> 'Allowed types',//'允许类型',
 'attachment_add'	=> 'Add attachment',//'增加附件',
 'attach_reduce'	=> 'Reduce attachments',//'减少附件',

//---------------------------
//admin/views/upload_multi.php
 'browser_upgrade'	=> 'Your browser is too old to display this feature. You cannot use the bulk upload. Please, upgrade your web browser or switch to another.',//'您正在使用的浏览器版本太低，无法使用批量上传功能。为了更好的使用emlog，建议您升级浏览器或者换用其他浏览器。',
 'file_select'		=> 'Select the file',//'选择文件',

//---------------------------
//admin/views/user.php
 'user_management'	=> 'Users',//'用户',
 'user_modify_ok'	=> 'User data has been modified successfully',//'修改用户资料成功',
 'user_add_ok'		=> 'User has been added successfully',//'添加用户成功',
 'user_name_empty'	=> 'Username cannot be empty',//'用户名不能为空',
 'user_name_exists'	=> 'The username already exists',//'该用户名已存在',
 'passwords_not_equal'	=> 'Entered twice passwords are not equal',//'两次输入密码不一致',
 'founder_not_delete'	=> 'You can not delete Founder',//'不能删除创始人',
 'founder_not_edit'	=> 'Information about Founder cannot be modified',//'不能修改创始人信息',
 'founder'		=> 'Founder',//'创始人',
 'admin'		=> 'Administrator',//'管理员',
 'posts_need_audit'	=> 'Posts need to be verified',//'(文章需审核)',
 'edit'			=> 'Edit',//'编辑',
 'delete'		=> 'Delete',//'删除',
 'no_authors_yet'	=> 'No authors yet',//'还没有添加作者',
 '_users'		=> ' users',//'位用户',
 'user_add'		=> 'Add user',//'添加用户',
 'author_contributor'	=> 'Author (Contributor)',//'作者（投稿人）',
 'password_min_length'	=> 'Password (not less than 5 characters)',//'密码 (大于5位)',
 'password_repeat'	=> 'Enter the password again',//'再次输入密码',
 'posts_not_need_audit'	=> 'Posts not need to be verified',//'文章不需要审核',
 'posts_need_audit'	=> 'Posts need to be verified',//'文章需要审核',
 'publish_permission'	=> 'Publishing permissions',//'发布权限',
 'users_total'		=> 'Users created',//'已创建的用户',
 'role'			=> 'Role',//'角色',
 'login_ip'		=> 'Login IP',//'登录IP',
 'last_login_time'	=> 'Last active time',//'更新/登录时间',
 'search_by_email'	=> 'Search users by email',//'按邮箱搜索用户...',
 'email_empty'		=> 'E-mail can not be empty',//'邮箱不能为空',
 'email_is_used'	=> 'This email is used already',//'该邮箱已被占用',
 'user_ban_ok'		=> 'Locked successfully, the user can no longer log in',//'禁用成功，该用户无法再登录',
 'user_unban_ok'	=> 'Unlocked successfully',//'解禁成功',
 'user_id'		=> 'User ID',//'用户ID',
 'ban'			=> 'Ban',//'解禁',
 'banned'		=> 'Banned',//'已禁用',
 'unban'		=> 'Unban',//'解禁',

//---------------------------
//admin/views/user_edit.php
 'user_manage'		=> 'User management',//'修改作者资料',
 'password_new'		=> 'New password (leave blank, if you do not want to modify)',//'新密码(不修改请留空)',
 'password_new_repeat'	=> 'Repeat new password',//'重复新密码',
 'user_role'		=> 'User role',//'用户组',

//---------------------------
//admin/views/widgets.php
 'widget_manage'	=> 'Sidebar',//'侧边栏',
 'system_widgets'	=> 'System widgets',//'系统组件',
 'blogger'		=> 'Personal information',//'个人资料',
 'change'		=> 'Change',//'更改',
 'calendar'		=> 'Calendar',//'日历',
 'last_comments_num'	=> 'Last comments number',//'最新评论数',
 'new_comments_home'	=> 'Home Latest comments',//'首页最新评论数',
 'new_comments_length'	=> 'Summary length for latest comments',//'新近评论截取字节数',
 'new_posts_show'	=> 'Show Latest Posts',//'显示最新文章数',
 'new_posts_home'	=> 'Show Latest Posts at Home',//'首页显示最新文章数',
 'hot_posts_home'	=> 'Show popular posts',//'显示热门文章数',
 'random_post_home'	=> 'Show random entries at Home',//'首页显示随机文章数',
 'widgets_custom'	=> 'Custom widgets',//'自定义组件',
 'widget_untitled'	=> 'Untitled widget',//'未命名组件',
 'widget_delete'	=> 'Remove widget',//'删除该组件',
 'widget_custom_add'	=> 'Add new custom widget+',//'自定义一个新的组件+',
 'widget_title'		=> 'Widget title',//'组件名',
 'widget_content_info'	=> 'Content (html supported)',//'内容 （支持html）',
 'widget_add'		=> 'Add widget',//'添加组件',
 'sidebar'		=> 'Sidebar',//'侧边栏',
 'widget_use'		=> 'Used widgets',//'使用中的组件',
 'widget_order_save'	=> 'Save widget order',//'保存组件排序',
 'widget_setting_reset'	=> 'Reset default widget settings',//'恢复出厂设置',

);
