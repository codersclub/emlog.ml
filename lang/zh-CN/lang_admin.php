<?php

$lang = array(

//---------------------------
//admin/account.php
    'registration_disabled' => '系统已关闭注册！',//'The system has closed registration!',
    'auth_error' => '验证错误',//'Authentication Error',
    'wrong_user_password' => '用户或密码错误',//'Incorrect user or password',
    'captcha_error' => '图形验证码错误',//'Captcha verification error',
    'email_wrong' => '错误的邮箱',//'Wrong mailbox',
    'password_length_invalid' => '密码长度不合规',//'Invalid password length',
    'mail_code_invalid' => '邮件验证码错误',//'Mail verification code error',

//---------------------------
//admin/article.php
    'drafts' => '草稿',//'Drafts',
    '_drafts' => '草稿箱',//' drafts',
    'post_manage' => '文章管理',//'Post list',
    'draft_manage' => '草稿管理',//'Draft management',
    'no_permission' => '权限不足！',//'Insufficient permissions!',
    'check' => '审核',//'Check',
    'uncheck' => '驳回',//'Uncheck',
    'view_by_tag' => '按标签查看',//'View by tag',
    'article_add' => '写新文章',//'Write a new article',
    'attachment_delete_error' => '删除失败!',//'Failed to delete the file!',

//---------------------------
//admin/blogger.php
    'avatar_delete' => '删除头像',//'Delete avatar',

//---------------------------
//admin/data.php
    'backup_directory_not_writable' => '备份失败。备份目录(content/backup)不可写',//'The backup failed. The backup directory (content/backup) is not writable',
    'backup_create_file_error' => '创建备份文件失败。备份目录(content/backup)不可写',//'Failed to create backup file. The backup directory (content/backup) is not writable',
    'backup_empty' => '数据表没有任何内容',//'There is nothing in the backup data',
    'file_not_exists' => '文件不存在',//'File does not exist',
    'import_only_emlog' => '只能导入emlog备份的SQL文件',//'You can import only emlog SQL backup file',
    'info_illegal' => '非法提交的信息',//'Submitted information is illegal',
    'attachment_exceed_system_limit' => '文件大小超过系统 ',//'File size exceeds system limit ',
    'upload_failed_code' => '上传文件失败,错误码: ',//'Upload failed. Error code: ',
    'import_only_emlog_no_change' => '只能导入emlog备份的压缩包，且不能修改压缩包文件名！',//'You can only import emlog backup archive, and the archive file name can not be changed!',
    'import_failed_not_read' => '导入失败！读取文件失败',//'Import failed! Can not read the file',
    'import_failed_not_emlog' => '导入失败！该文件不是emlog的数据备份文件!',//'Import failed! The backup file is not the emlog backup file!',
    'import_failed_not_emlog_ver' => '导入失败！该文件不是emlog' . Option::EMLOG_VERSION . '生成的备份!',//'Import failed! The backup file is not the emlog ' . Option::EMLOG_VERSION . ' backup file!',
    'import_failed_bad_prefix' => '导入失败！备份文件中的数据库表前缀与当前系统数据库表前缀不一致',//'Import failed! The database backup file prefix does not match the current system database prefix ',

//---------------------------
//admin/index.php
    'supported' => '支持',//'Supported',
    'not_supported' => '不支持',//'NOT supported',
    'phpinfo_disabled' => 'phpinfo函数被禁用!',//'phpinfo function is disabled!',
    'released' => ' released',

//---------------------------
//admin/media.php
    'upload_restricted' => '抱歉，系统限制用户上传资源',//'Sorry, the system restricts users from uploading resources',

//---------------------------
//admin/plugin.php
    'plugin_upload_error' => '插件上传失败， 错误码：',//'Plugin upload failed, error code: ',
    'update_failed_network' => '请求更新失败，可能是网络问题',//'The update request failed, it may be a network problem',
    'pro_unregistered' => '未注册的pro版本',//'Unregistered pro version',

//---------------------------
//admin/setting.php
    'site_address' => '站点地址：',//'Site address',
    'verification_code_not_supported' => '开启登录验证码失败!服务器空间不支持GD图形库',//'Failed to open the login verification code! The server space does not support the GD graphics library',
    'verification_code_comment_not_supported' => '开启评论验证码失败，服务器空间不支持GD图形库',//'Failed to open comment verification code! Server space does not support GD graphics library',
    'detect_url' => '自动检测站点地址 (如开启后首页样式丢失，请关闭并手动填写站点地址)',//'Automatically detect the site address (if the home page style is lost after opening, please close and fill in the site address manually)',
    'email_enter_please' => '请正确填写邮箱',//'Please enter correct email',
    'test_mail_subj' => '测试邮件',//'Test mail',
    'test_mail_body' => '这是一封测试邮件',//'This is a test email',
    'test_mail_failed' => '发送邮件失败',//'Failed to send mail',

//---------------------------
//admin/setting_mail.php
    'email_sending' => '邮件服务',//'Email sending',
    'sender_email' => '发送人邮箱',//'Sender email',
    'sender_name' => '发送人名称（选填，建议填写站点名称）',//'Sender name (optional, it is recommended to fill in the site name)',
    'smtp_password' => 'SMTP密码',//'SMTP password',
    'smtp_server' => 'SMTP服务器',//'SMTP server',
    'smtp_port' => '端口',//'Port',
    'smtp_port_info' => '(465：ssl协议，如QQ邮箱，网易邮箱等，587：STARTTLS协议 如：Outlook邮箱)',//'(465: ssl protocol, used by QQ mailbox, Netease mailbox, etc.; 587: STARTTLS protocol used by: Outlook mailbox)',
    'send_test' => '发送测试',//'Send test',
    'send_test_prompt' => '<b>以QQ邮箱配置为例</b><br>发送人邮箱：你的QQ邮箱<br>SMTP密码：见QQ邮箱顶部设置-> 账户 -> 开启IMAP/SMTP服务 -> 生成授权码（即为SMTP密码）<br>发送人名称：你的姓名或者站点名称<br>SMTP服务器：smtp.qq.com<br>端口：465 (只支持 SSL 端口)<br>',//'<b>Let take QQ mailbox configuration as an example</b><br>Sender mailbox: your QQ mailbox<br>SMTP password: see the settings at the top of QQ mailbox -&gt; Account -&gt; Enable IMAP/SMTP service -&gt; Generate authorization code (i.e. SMTP password)<br>SMTP server: smtp.qq.com<br>Port: 465 (only SSL port is supported)<br>',
    'recepient_email_enter' => '输入接收邮箱',//'Enter recepient email',
    'send' => '发送',//'Send',

//---------------------------
//admin/setting_user.php
    'registration' => '登录注册',//'Registration',
    'registration_open' => '开启用户注册',//'Open user registration',
    'registration_captcha' => '开启登录注册图形验证码',//'Enable captcha at registration',
    'registration_captcha_info' => '（提高安全性，建议开启）',//'(to improve security, it is recommended to open)',
    'user_rights' => '用户权限',//'User rights',
    'comment_write' => '发布评论',//'Post comments',
    'guest_rights' => '游客权限',//'Visitor permissions',
    'writer_need_approve' => '注册用户发布文章需要审核',//'Articles published by registered users need to be reviewed',
    'sending' => '发送中',//'Sending',
    'send_ok' => '发送成功',//'Sent successfully',

//---------------------------
//admin/store.php
    'template' => '模板',//'Template',
    'templates' => '模板',//'Templates',
    'template_view' => '查看模板',//'View template',
    'plugin' => '插件',//'Plug-in',
    'plugins' => '插件',//'Plug-ins',
    'plugin_view' => '查看插件',//'View Plugin',
    'free_template' => '免费模板',//'Free template',
    'paid_template' => '付费模板',//'Paid template',
    'free_plugin' => '免费插件',//'Free plugin',
    'paid_plugin' => '付费插件',//'Paid plugin',
    'my_apps' => '我的已购',//'My purchases',
    'go_check' => '去查看',//'Go to check',
    'install_failed_permission' => '安装失败，请检查content下目录是否可写',//'Installation failed, please check whether the directory under content is writable',
    'install_failed_zip' => '安装失败，请安装php的Zip扩展',//'Installation failed, please install the Zip extension for php',
    'svip' => '铁杆svip专属',//'Hardcore svip exclusive',
    'tpl_category_8' => '博客自媒体',//'Blog We Media',
    'tpl_category_7' => '资源下载',//'Resource download',
    'tpl_category_9' => '社区论坛',//'Community Forum',
    'tpl_category_10' => '其他',//'Other',
    'tpl_category_17' => '网址导航',//'Site navigation',
    'plu_category_1' => '资源下载',//'Resource download',
    'plu_category_2' => 'SEO优化',//'SEO optimization',
    'plu_category_3' => '多媒体',//'Multimedia',
    'plu_category_4' => '装饰特效',//'Decorative effects',
    'plu_category_5' => '文件存储',//'File Storage',
    'plu_category_11' => '用户互动',//'User Interaction',
    'plu_category_12' => '内容运营',//'Content Operation',
    'plu_category_13' => '移动端',//'Mobile terminal',
    'plu_category_14' => '编程开发',//'Program development',
    'plu_category_15' => '内容创作（编辑器）',//'Content Creation (Editor)',
    'plu_category_6' => '其他',//'Other'
    'free_zone' => '仅看免费',//'Free only',
    'paid_zone' => '仅看付费',//'Paid only',
    'search_by_category' => '按分类查找',//'Search by category',

//---------------------------
//admin/style.php
    'user' => '作者',//'User',
    'users' => '作者',//'Users',
    'author' => '作者',//'Author',

//---------------------------
//admin/template.php
    'ok_for_emlog' => '适用于emlog: ',//'Suitable for Emlog: ',
    'template_upload_failed' => '模板上传失败， 错误码：',//'Template upload failed, error code: ',
    'template_used' => '您不能删除正在使用的模板',//'You can not delete a template being used',

//---------------------------
//admin/views/add_log.php
    'post_write' => '写文章',//'Add post',
    'enter_post_title' => '输入文章标题',//'Enter the post title',
    'upload_insert' => '上传插入图片',//'Upload & Insert image',
    'category_select' => '选择分类...',//'Select Category...',
    'post_time' => '发布于',//'Posted on',
    'more_options' => '更多选项',//'More Options',
    'post_description' => '摘要',//'Description',
    'post_alias' => '文章链接别名',//'Post Link Alias',
    'post_alias_info' => '用于自定义文章链接。需要',//'Used to customize the post link. Required',
    'post_alias_enable' => '启用链接别名',//'Enable post link alias',
    'post_access_password' => '文章访问密码',//'Post Access Password',
    'home_top' => '首页置顶',//'Home Top',
    'category_top' => '分类置顶',//'Category Top',
    'allow_comments' => '允许评论',//'Allow Comments',
    'post_publish' => '立即发布',//'Publish Post',
    'save_draft' => '保存草稿',//'Save Draft',

//---------------------------
//admin/views/add_page.php
    'add_page' => '新建页面',//'Add page',
    'page_title_info' => '输入页面标题',//'Enter the page title',
    'upload_insert' => '上传插入',//'Insert upload',
    'link_alias' => '链接别名',//'Link alias',
    'link_alias_info' => '英文字母、数字组成，用于seo设置',//'composed of English letters and numbers, used for seo settings',
    'link_alias_enable' => '启用链接别名',//'Enable Link Alias',
    'page_template' => '页面模板',//'Page template',
    'page_template_info' => '（用于自定义页面模板，对应模板目录下.php文件）',//'(For custom page template, use the corresponding .php file under the template directory)',
    'page_enable_comments' => '页面接受评论',//'Page accepted comments',
    'page_publish' => '发布页面',//'Publish Page',
    'save' => '保存',//'Save',

//---------------------------
//admin/views/article.php
    'deleted_ok' => '删除成功',//'Deleted successfully',
    'sticked_ok' => '置顶成功',//'Entry has been sticked successfully',
    'unsticked_ok' => '取消置顶成功',//'Entry has been unsticked successfully',
    'select_post_to_operate' => '请选择要处理的文章',//'Please, select the entry to operate',
    'select_action_to_perform' => '请选择要执行的操作',//'Please, select an action to perform',
    'published_ok' => '发布成功',//'Entry has been publised successfully',
    'moved_ok' => '移动成功',//'Moved successfully',
    'user_edit' => '更改作者',//'Change author',
    'user_modified_ok' => '更改作者成功',//'Entry author has been modified successfully',
    'draft_moved_ok' => '转入草稿箱成功',//'Moved to Draft successfully',
    'draft_saved_ok' => '草稿保存成功',//'Draft has been saved successfully',
    'saved_ok' => '保存成功',//'Saved successfully',
    'verified_ok' => '文章审核成功',//'Entry has been verified successfully',
    'rejected_ok' => '文章驳回成功',//'Entry has been rejected successfully',
    'all' => '全部',//'All',
    'category_view' => '按分类查看',//'View by Category',
    'category' => '分类',//'Category',
    'categories' => '分类',//'Categories',
    'uncategorized' => '未分类',//'Uncategorized',
    'view_by_author' => '按作者查看',//'View by author',
    'article_search' => '搜索文章',//'Search Article',
    'title' => '标题',//'Title',
    'view' => '查看',//'View',
    'views' => '查看',//'Views',
    'reads' => '阅读',//'Reads',
    'time' => '时间',//'Time',
    'create_time' => '创建时间',//'Create time',
    'comments' => '评论',//'Comments',
    'attachment_num' => '附件',//'Attachments',
    'pending' => '待审',//'Pending',
    'is_pending' => '待审核',//'pending',
    'reject' => '驳回',//'Reject',
    'open_new_window' => '在新窗口查看',//'Open in a new window',
    'yet_no_posts' => '还没有文章',//'Yet no entries',
    'select_all' => '全选',//'Select all',
    'selected_items' => '选中项',//'Selected items',
    'publish' => '发布',//'Publish',
    'add_draft' => '放入草稿箱',//'Save as draft',
    'top_action' => '置顶操作',//'Top Operation',
    'untop' => '取消置顶',//'Untop',
    'move_to_category' => '移动到分类',//'Move to category',
    'change_author' => '更改作者为',//'Change the author',
    'have' => '有',//'Have ',
    'number_of_items' => '篇',//' ',//LEAVE THIS EMPTY! It is just a number of "Items", "Pieces", etc..
    'draft' => '草稿',//'Draft',
// 'drafts'		=> '草稿',//'Drafts',
    'article' => '文章',//'article',
    'articles' => '文章',//'Articles',
    '_articles' => '文章',//' articles',
    'posts' => '文章',//'Posts',
    'select_article' => '请选择要操作的文章',//'Please select the article to operate',
    'sure_delete_articles' => '确定要删除所选文章吗？',//'Are you sure you want to delete selected articles?',
    'tag' => '标签',//'Tag',
    'tags' => '标签',//'Tags',
    'tags_no' => '还没有标签',//'No tags',
    'tag_by_view' => '按标签查看',//'View by tags',
    'top' => '选择置顶',//'Select Top place',
    'unknown_author' => '未知作者',//'Unknown author',
    'unknown_role' => '未知角色',//'Unknown role',
    'publish_regular' => '定时发布',//'Regular publishing',
    'ok' => '确定',//'OK',
    'delete_not_recover' => '彻底删除将无法恢复',//'Deleted may not be recoverable',
    'daily_posts_exceed' => '超出每日发文数量',//'Number of daily posts exceeded',
    'feedback_review' => '审核反馈：',//'Review feedback: ',
    'article_reject' => '驳回文章',//'Reject article',
    'article_reject_prompt' => '请填写驳回文章的理由，不填请留空。',//'Please fill in the reasons for rejecting the article, please leave blank if not filled.',

//---------------------------
//admin/views/article_write.php
    'publish_time' => '发布时间',//'Publish time',
    'publish_time_tips' => '（当设置未来时间，文章将在该时间点定时发布）',//'(When the future time is set, the article will be published regularly at that point in time)',
    'access_password' => '访问密码',//'Access Password',
    'choose_file' => '选择文件上传...',//'Choose a file for upload...',
    'tags_have' => '已有标签+',//'Have tags+',
    'post_tags_separated' => '多个使用逗号分隔',//'tags, separated by commas',
    'resource_library' => '图文资源',//'Graphic resources',
    'no_resources' => '暂无可用资源',//'No resources available',
    'file_insert' => '插入文件',//'Insert file',
    'img_insert' => '插入图片',//'Insert image',
    'video_insert' => '插入视频',//'Insert video',
    'go_upload' => '去上传',//'Go Upload',
    'article_cover' => '封面',//'Cover',
    'crop_upload' => '裁剪并上传',//'Crop and upload',
    'uploading' => '上传中……',//'Uploading...',
    'cover_placeholder' => '封面图地址URL，手动填写或点击下方图片区域上传',//'Cover image address URL, fill in manually or click the image area below to upload',
    'cover_image' => '封面图片',//'Cover image',
    'recently_used' => '近期使用的+',//'Recently used+',
    'jump_link' => '跳转链接',//'Jump link',
    'jump_link_info' => '（填写后不展示页面内容，直接跳转该地址）',//'(The content of the page will not be displayed after filling in, and the address will be redirected to this link)',
    'tags_tips' => '(也用于页面关键词，英文逗号分隔)',//'(Also used for page keywords, separated by English commas)',
    'select_file_category' => '选择资源分类…',//'Select resource category...',
    'load_more' => '加载更多…',//'Load more...',
    'crop_hold_shift' => '按住 Shift 等比例调整裁剪区域',//'Hold Shift to adjust the cropping area proportionally',
    'advanced_options' => '高级选项',//'Advanced options',
    'article_template' => '文章模板',//'Article template',

//---------------------------
//admin/views/admin_page.php
    'page' => '页面',//'Page',
    'page_management' => '页面',//'Page management',
    'page_deleted_ok' => '删除页面成功',//'Page has been removed successfully',
    'page_published_ok' => '发布页面成功',//'Page has been published successfully',
    'page_drafted_ok' => '转为草稿成功',//'Draft has been saved successfully',
    'page_saved_ok' => '页面保存成功',//'Page has been saved successfully',
    'page_view' => '查看页面',//'View page',
    'attachments' => '附件',//'Attachments',
    'no_pages' => '还没有页面',//'No pages',
    'delete' => '删除',//'Delete',
    'make_draft' => '转为草稿',//'Convert to draft',
    '_pages' => '个页面',//' pages',
    'select_page_to_operate' => '请选择要操作的页面',//'Please, select the page to operate',
    'sure_delete_selected_pages' => '确定要删除所选页面吗？',//'Are you sure you want to delete selected pages?',
    'pages_total' => '已创建了',//'Total pages:',

//---------------------------
//admin/views/attlib.php
    'attachment_upload' => '上传附件',//'Upload attachment',
    'bulk_upload' => '批量上传',//'Bulk upload',//'('
    'attachment_library' => '附件库',//'Attachment Library',
    'no_attachments' => '该文章没有附件',//'The post has no attachment',
    'insert' => '插入 ',//'Insert',
    'insert_full_size' => '插入原图',//'Insert full size image',
    'full_size' => '原图',//'Full size image',
    'insert_thumbnail' => '插入缩略图',//'Insert thumbnail',
    'thumbnail' => '缩略图',//'Thumbnail',

//---------------------------
//admin/views/auth.php
    'ext_store_info' => '扩展商店用于下载模板和插件，仅开放给已完成注册用户',//'The extension store is used to download templates and plug-ins, only open to registered users',
    'too_many_articles' => '文章数量已经超过未注册版本限额',//'The number of articles has exceeded the unregistered version limit',
    'emlog_notregistered' => '抱歉！您的emlog pro尚未完成注册， 完成注册来解锁emlog pro的全部功能',//'Sorry! Your emlog pro has not been registered, complete the registration to unlock all the functions of emlog pro',

//---------------------------
//admin/views/blogger.php
    'basic_settings' => '基础设置',//'Basic Settings',
    'user_settings' => '用户设置',//'User settings',
    'email_notify' => '邮件通知',//'E-mail notification',
    'seo_settings' => 'SEO设置',//'SEO Settings',
    'background_style' => '后台风格',//'Background style',
    'personal_settings' => '个人信息',//'Personal Settings',
    'personal_data_modified_ok' => '资料修改成功',//'Data modified successfully',
    'avatar_deleted_ok' => '头像删除成功',//'Avatar deleted successfully',
    'nickname_is_empty' => '昵称不能为空',//'Nickname can not be empty',
    'email_format_invalid' => '电子邮件格式错误',//'E-mail format invalid',
    'password_length_short' => '密码长度不得小于5位',//'Password length must be not less than 5 characters',
    'password_not_equal' => '两次输入的密码不一致',//'Two passwords are not equal',
    'username_exists' => '该登录名已被占用',//'This login name already exists',
    'nickname_exists' => '该昵称已被占用',//'This nickname already exists',
    'avatar' => '头像',//'Avatar',
    'avatar_format_supported' => '(支持JPG、PNG格式图片)',//'(Supported formats: JPG, PNG)',
    'nickname' => '昵称',//'Nicname',
    'email' => '邮箱',//'E-mail',
    'personal_description' => '个人描述',//'Personal Description',
    'login_name' => '登录用户名（为空则使用邮箱登录）',//'Login username (if it is empty, use email to log in)',
    'new_password_info' => '新密码（不小于5位，不修改请留空）',//'New Password (not less than 5 characters, left blank if do not need to modify)',
    'new_password_repeat' => '再输入一次新密码',//'Repeat new password',
    'save_data' => '保存资料',//'Save Data',
    'api_interface' => 'API',//'API',
    'account_password' => '账号密码',//'Account password',

//---------------------------
//admin/views/comment.php
    'comment_management' => '评论',//'Comments',
    'content' => '内容',//'Content',
    'comment_author' => '评论人',//'Comment author',
    'belongs_to_article' => '所属文章',//'Belongs to article',
    'from_ip' => '来自IP',//'From IP',
    'reply' => '回复',//'Reply',
    'del_from_ip' => '按IP删除',//'Delete from this IP',
    'view_article' => '查看该文章',//'View the article',
    'no_comments_yet' => '还没有收到评论',//'Yet no comments',
    'operation' => '操作',//'Operation',
    'comment_selected_delete_sure' => '确定要删除所选评论吗？',//'Are you sure you want to delete the selected comments?',
    'article_all_comments' => '该文所有评论',//This article comments',

//---------------------------
//admin/views/data.php
    'data_backup' => '数据',//'Data',
    'backup_prompt' => '将站点内容数据库备份到自己电脑上。',//'Back up the site content database to your computer.',
    'backup_delete_ok' => '备份文件删除成功',//'Backup file deleted successfully',
    'backup_create_ok' => '数据备份成功',//'Data backup created successfully',
    'backup_import_ok' => '备份导入成功',//'Backup imported successfully',
    'backup_file_select' => '请选择要删除的备份文件',//'Please select the backup file you want to delete',
    'backup_file_invalid' => '备份文件名错误(应由英文字母、数字、下划线组成)',//'Invalid backup file name (use only letters, digits and underscore)',
    'backup_import_zip_unsupported' => '服务器不支持zip，无法导入zip备份',//'Server does not support zip, can not import zip backup',
    'backup_upload_failed' => '上传备份失败',//'Backup Upload Failed',
    'backup_file_wrong' => '错误的备份文件',//'Wrong backup file',
    'backup_export_zip_unsupported' => '服务器不支持zip，无法导出zip备份',//'Server does not support zip, zip backup can not be exported',
    'cache_update_ok' => '缓存更新成功',//'Cache updated successfully',
    'backup_file' => '备份文件',//'Backup file',
    'backup_time' => '备份时间',//'Backup time',
    'file_size' => '文件大小',//'File size',
    'import' => '导入',//'Import',
    'backup_no' => '还没有备份',//'No backups found',
    'db_backup' => '备份数据库',//'Database Backup',
    'backup_create' => '备份数据',//'备份数据+',//'Create Backup',
    'backup_import_local' => '导入备份',//'Import Backup',
    'cache_update' => '更新缓存',//'Update cache',
    'backup_choose_table' => '选择要备份的数据库表',//'Choose the database table to backup',
    'backup_export_to' => '将站点内容数据库备份到',//'Export database backup to',
    'backup_local' => '本地（自己电脑）',//'Local (your computer)',
    'backup_server' => '服务器空间',//'Server',
    'compress_zip' => '压缩成zip包',//'Compress to zip format',
    'backup_file_name' => '备份文件名',//'Backup file name',
    'backup_start' => '开始备份',//'Start Backup',
    'backup_version_tip' => '仅可导入相同版本emlog的数据库备份文件，且数据库表前缀需保持一致。<br/>当前数据库表前缀：',//'Only the database backup files of the same emlog version can be imported, and the database table prefix must be consistent. <br/>Current database table prefix: ',
    'cache_update_info' => '缓存可以加快站点的加载速度，通常系统会自动更新缓存。特殊情况需要手动更新，如：缓存文件被修改、手动修改过数据库、页面出现异常等。',//'Cache can speed up the loading speed of the site, usually the system will automatically update the cache. Special circumstances need to be updated manually, such as: cache files have been modified, the database has been manually modified, the page is abnormal, etc.',
    'cache_update' => '更新缓存',//'Update the cache',
    'backup_file_select' => '请选择要操作的备份文件',//'Please select the backup file you want to operate',
    'backup_delete_sure' => '你确定要删除所选备份文件吗？',//'Are you sure you want to delete the selected backup files? ',

//---------------------------
//admin/views/edit_log.php
    'draft_edit' => '编辑草稿',//'Edit draft',
    'post_edit' => '编辑文章',//'Edit post',
    'used_to_customize' => '用于自定义该篇文章的链接地址。需要',//'It is used to customize the article link. Needs ',
    'save_and_return' => '保存并返回',//'Save and Return',

//---------------------------
//admin/views/edit_page.php
    'page_edit' => '编辑页面',//'Edit Page',

//---------------------------
//admin/views/footer.php
    'welcome_using' => '欢迎使用',//'Welcome using the',

//---------------------------
//admin/views/footer_user.php
    'all_rights_reserved' => '版权所有',//'All rights reserved',

//---------------------------
//admin/views/header.php
    'admin_center' => '管理中心',//'AdminCP',
    'return_to_admin_center' => '返回管理首页',//'Return to AdminCP',
    'to_site_new_window' => '在新窗口浏站点',//'Visit the site in a new window',
    'to_site' => '查看我的站点',//'View My site',
    'settings' => '设置',//'Settings',
    'logout' => '退出',//'Logout',
// 'post_write'		=> '写文章',//'Write post',
    'draft' => '草稿',//'Draft',
// 'posts'		=> '文章',//'Posts',
    'posts_pending' => '篇文章待审',//' Pending posts',
    'comments_pending' => '条评论待审',//' Pending comments',
    'exterior' => '外观',//'Exterior',
    'sidebar' => '边栏',//'Sidebar',
    'navigation' => '导航',//'Navigation',
    'pages' => '页面',//'Pages',
    'link' => '链接',//'Link',
    'links' => '链接',//'Links',
    'url' => '链接',//'URL',
    'friend_links' => '友链',//'Friend links',
    'store' => '商店',//'Store',
    'users' => '用户',//'Users',
    'data' => '数据',//'Data Backup',
    'applications' => '应用',//'Apps',
    'extensions' => '扩展',//'扩展功能',//'Extensions',
    'search_for' => '搜索标题...',//'Search titles...',
    'search' => 'Search',//'Search',
    'resources' => '资源',//'Resources',
    'twitters' => '笔记',//'Notes',

//---------------------------
//admin/views/header_user.php
    'user_center' => '个人中心',//'User Center',
    'front_end' => '首页',//'Front end',

//---------------------------
//admin/views/index.php
    'welcome' => '欢迎',//'Welcome',
    'admincp' => '管理后台',//'AdminCP',
    'link_manage_info' => '友情链接管理，可以在侧边栏管理中将该处添加的链接展示在首页侧边栏。',//'Friendship link management, you can display the added link in the sidebar of the homepage in the sidebar management.',
    'user_info' => '大伟',//'User info',
    'system_settings' => '系统设置',//'System settings',
    'control_panel' => '控制台首页',//'Control panel',
    'post_number' => '文章数量',//'Number of articles',
    'comment_number' => '评论数量',//'Number of comments',
    'tasks' => 'Tasks',
    'pending_requests' => 'Pending Requests',
    'emlog_official' => '采用emlog系统',//'Emlog official site',
    'logout_sure' => 'Ready to Leave?',
    'close' => '关闭',//'Close',
    'logout_prompt' => 'Select "Logout" below if you are ready to end your current session.',
    'system' => '系统',//'System',
    'cancel' => '取消',//'Cancel',
    'site_info' => '站点信息',//'Site Info',
    '_comments' => '条评论',//' comments',
    'db_prefix' => '数据库表前缀',//'Database table prefix',
    'database' => '数据库',//'Database',
    'web_server' => 'Web服务',//'Web Server',
    'php_version' => 'PHP版本',//'PHP version',
    'emlog_version' => 'EMLOG版本',//'EMLOG version',
    'unregistered' => '未注册',//'Unregistered',
    'emlog_unregistered' => '您的emlog pro尚未注册',//'Your emlog pro is not registered yet',
    'emlog_reg_advantages' => '您安装的emlog尚未注册，完成注册可使用全部功能，包括如下：',//'The emlog you installed has not been registered, and you can use all the functions after registration, including the following:',
    'advantage1' => '1. 解锁在线升级功能，一键升级到最新版本，获得来自官方的安全和功能更新。',//'1. Unlock the online upgrade function, upgrade to the latest version with one click, and get official security and function updates.',
    'advantage2' => '2. 解锁应用商店，获得更多模板和插件，并支持应用在线一键更新。',//'2. Unlock the app store, get more templates and plug-ins, and support online one-click update of apps.',
    'advantage3' => '3. 去除所有未注册提示及功能限制。',//'3. Remove all unregistered prompts and functional restrictions.',
    'advantage4' => '4. 加入专属Q群，获得官方技术指导问题解答。',//'4. Join the exclusive Q group and get answers to official technical guidance questions.',
    'advantage5' => '5. 附赠多款收费应用（限铁杆SVIP）。',//'5. Comes with a variety of paid applications (limited to hardcore SVIP).',
    'advantage6' => '6. "投我以桃，报之以李"，您的支持也将帮助emlog变的更好并持续更新下去。',//'6. "Throw me a peach, give me a favor", your support will also help emlog become better and continue to be updated.',
    'register_now' => '现在去注册',//'Register now',
    'click_to_register' => '点击注册',//'Click to register',
    'emlog_registered_ok' => '恭喜，您的EMLOG已经完成注册。',//'Congratulations, your EMLOG has been registered.',
    'em_reg_ok' => '🎉 恭喜，注册成功 🎉',//'🎉 Congratulations, registered successfully 🎉',
    'register_emlog' => '注册EMLOG PRO',//'Register EMLOG PRO',
    'enter_emkey' => '输入EMKEY',//'Enter EMKEY',
    'reg_failed' => '注册失败了，可能是注册码不正确，或服务器无法访问官网 emlog.net',//'Registration failed. May be the registration code is incorrect, or the server cannot access the official website emlog.net.',
    'reg_code_invalid' => '注册失败，无效的注册码',//'Registration failed, invalid registration code',
    'emkey_info' => 'EMKEY是官方分发给emlog pro付费用户的唯一识别码，请妥善保管',//'EMKEY is the only identification code officially distributed to paying users of emlog pro, please keep it properly',
    'get_emkey' => '获取注册码->',//'Get registration code &rarr;',
    'registered' => '注册',//'registered',
    'registered_already' => '已注册',//'already registered',
    'mysql_version' => 'MySQL版本',//'MySQL version',
    'server_environment' => '服务器软件环境',//'Server software environment',
    'software_info' => '软件信息',//'Software information',
    'gd_library' => 'GD图形处理库',//'GD graphic library',
    'server_max_upload_size' => '服务器空间允许上传最大文件',//'Maximum upload file size allowed by server',
    'more_php_info' => '更多信息&raquo;',//'More Info&raquo;',
    'official_news' => '官方消息',//'Official news',
    'using_emlog' => '您正在使用emlog',//'You are using emlog',
    'view_changelog' => '查看更新内容',//'View changelog',
    'update_check' => '检查更新',//'Check for updates',
    'reading' => '正在读取...',//'Is reading...',
    'checking_wait' => '正在检查，请稍后',//'Is checking, please wait',
    'updates_no' => '已经是最新版本',//'Already the latest version',
    'update_exists' => '有可用的emlog更新版本 ',//'It is available emlog updated version ',
    'backup_before_update' => '，更新之前请您做好数据备份工作，',//' Do not forget to make a backup before updating job, ',
    'update_now' => '现在更新',//'Update now',
    'update_check_failed' => '检查失败，可能是网络问题',//'Check failed, may be a network problem exists',
    'updating' => '正在更新中，请耐心等待',//'Updating, please wait patiently',
    'update_completed' => '恭喜您！更新成功了，请<a href="./">刷新页面</a> 开始体验新版emlog',//'Congratulations! The update is successful, please <a href="./">refresh the page</a> to start experiencing the new version of emlog',
    'update_download_failed' => '下载更新失败，可能是服务器网络问题',//'Download the update failed, may be a network problem exists',
    'update_extract_failed' => '解压更新失败，可能是你的服务器空间不支持zip模块',//'Extract the update failed, may be the server does not support the zip extension',
    'update_failed_nonwritable' => '更新失败，目录不可写',//'Update failed, the directory is not writable',
    'update_failed' => '更新失败',//'Update failed',
    'you_can_enter' => '(你还可以输入',//'(You can enter ',
    '_characters' => '字',//' characters',
    'exceeds' => '已超出',//'has been exceeded ',
    'publish' => '发布',//'Publish',
    'write_article' => '去写文章',//'Write an article',
    'pending_review' => '待审评论',//'Review pendings',
    'user_num' => '用户数量',//'Number of users',
    'go_to_register' => '去注册',//'Go to register',
    'update_expired' => '更新服务已到期，',//'The update service has expired, ',
    'log_in_to_renew' => '登录官网续期',//'Log in to the official website to renew',
    'articles_pending' => '待审文章',//'Pending Articles',
    'help_faq' => '使用帮助 | 常见问题',//'FAQ',
    'contacts' => '联系交流 | 加入社群',//'Contact and exchange | Join Q group',
    'feedback' => '问题反馈 | 官方社区',//'Problem Feedback | Official Community',
    'issues' => 'Issues',//'Issues',
    'comments_received' => '收到评论',//'Received comments',
    'last_articles' => '最近发布的文章',//'Recent articles',
    'last_comments' => '最近收到的评论',//'Recent comments',
    'svip_hard' => '铁杆SVIP',//'Hardcore SVIP',
    'vip_friend' => '友情VIP',//'Friendship VIP',
    'applied_today' => '今日应用',//'Applied today',
    'app_development' => '应用开发 | 开发文档',//'Application Development | Development Documentation',
    'os' => '操作系统',//'Operating system',

//---------------------------
//admin/views/index_user.php
    'article_no_yet' => '还没有发布过文章。',//'No articles have been published yet.',
    'comment_no_yet' => '还没收到评论。',//'No comments received yet.',
    'user_des' => '当风吹过，留下微笑',//'When the wind blows, leave a smile',

//---------------------------
//admin/views/links.php
    'link_add' => '新建链接',//'Add Link',
    'link_management' => '友情链接',//'Friend links',
    'links_created' => '已创建的链接',//'Links created',
    'order' => '排序',//'Order',
    'edit_link' => '编辑链接',//'Edit link',
    'click_to_hide' => '点击隐藏链接',//'Click to hide',
    'visible' => '显示',//'Visible',
    'show' => '显示',//'Show',
    'click_to_show' => '点击显示链接',//'Click to show',
    'view_link' => '查看链接',//'View link',
    'no_links' => '还没有添加链接',//'No link added yet',
    'name' => '名称',//'Name',
    'link_url' => '地址',//'Link URL',
    'site_and_url_empty' => '名称和地址不能为空',//'Site name and address can not be empty',

//---------------------------
//admin/views/login.php
    'login' => '登录',//'Login',
    'user_name' => '用户名',//'User name',
    'password' => '密码',//'Password',
    'remember_me' => '记住我',//'Remember me',
    'log_in' => ' 登 录 ',//' Log in ',
    'back_home' => '返回首页',//'Back to home',
    'password_forget' => '找回密码',//'Retrieve password',
    'account_register' => '注册账号',//'Register an account',
    'validation_error' => '图形验证错误',//'Captcha validation error',
    'password_invalid' => '用户或密码错误，请重新输入',//'User or password incorrect, please re-enter',

//---------------------------
//admin/views/media.php
    'resource_manage' => '多媒体资源',//'Multimedia resources',
    'file' => '文件',//'File',
    'preview' => '预览',//'Preview',
    'date' => '日期',//'Date',
    'size' => '大小',//'Size',
    'img_size' => '尺寸',//'Image size',
    'upload_files' => '上传图片/文件',//'Upload image/file',
    'media_deleted_ok' => '媒体文件删除成功',//'Media file deleted successfully',
    '_resources' => '个资源',//'resources',
    'resource_select' => '请选择要删除的资源',//'Please select the resource to be deleted',
    'resource_del_sure' => '确定要删除所选资源吗？',//'Are you sure you want to delete the selected resource?',
    'founder' => '创建人',//'Author',
    'this_user_files'	=> '仅看TA的',//'All files of this author',
    'image_address_original' => '原图地址',//'Original image address',
    'media_category_add_ok' => '分类添加成功',//'Category added successfully',
    'media_category_add' => '添加资源分类',//'Add media category',
    'category_name' => '分类名称',//'Category Name',
    'modify' => '修改',//'Modify',
    'change_media_category' => '修改资源分类',//'Change media category',
    'modified_ok' => '修改成功',//'Successfully modified',
    'media_all' => '全部资源',//'All media files',
    'move_to' => '移动到',//'Move to',
    'original_file' => '原文件',//'Original file',
    'link_copied' => '链接已复制',//'Link copied',
    'view_from_date' => '查看该日期及之前的资源',//'View resources from this date and earlier',

//---------------------------
//admin/views/media_lib.php
    'upload_time' => '上传时间',//'Upload time',
    'insert_into' => '插入到文章',//'Insert into article',
    'set_cover' => '设为封面',//'Set as cover',
    'article_insert' => '插入文章',//'Insert article',

//---------------------------
//admin/views/navbar.php
    'nav_manage' => '导航',//'Navigation',
    'nav_cat_update_ok' => '排序更新成功',//'Category updated successfully',
    'nav_delete_ok' => '删除导航成功',//'Navigation deleted successfully',
    'nav_edit_ok' => '修改导航成功',//'Navigation modified successfully',
    'nav_add_ok' => '添加导航成',//'Navigation added successfully',
    'nav_name_url_empty' => '导航名称和地址不能为空',//'Navigation name and address can not be empty',
    'nav_no_order' => '没有可排序的导航',//'There is no navigation categories',
    'nav_default_nodelete' => '默认导航不能删除',//'You can not delete the default navigation',
    'nav_select_category' => '请选择要添加的分类',//'Please choose the category to add in',
    'nav_select_page' => '请选择要添加的页面',//'Please select the page you want to add',
    'nav_edit' => '编辑导航',//'Edit navigation',
    'hide' => '隐藏',//'Hide',
    'hidden' => '已隐藏',//'Hidden',
    'nav_hide_click' => '点击隐藏导航',//'Click to hide navigation',
    'nav_show_click' => '点击显示导航',//'Click to show navigation',
    'nav_no' => '还没有添加导航',//'Has not yet added navigation',
    'nav_add_custom' => '添加自定义导航',//'Add custom navigation',
    'nav_name' => '导航名称',//'Navigation Name',
    'nav_url' => '地址(URL)',//'Address (URL)',
    'nav_parent' => '父导航',//'Parent navigation',
    'nav_add_category' => '添加分类到导航',//'Add categories to navigation',
    'nav_page_add' => '添加页面到导航',//'Add pages to navigation',
    'id' => '序号',//'ID',
    'navigation' => '导航',//'Navigation',
    'type' => '类型',//'Type',
    'status' => '状态',//'Status',
    'view' => '查看',//'View',
    'address' => '地址',//'Address',
    'add' => '添加',//'Add',

//---------------------------
//admin/views/page.php
    'page_title' => '页面标题',//'Page title',
    'setting_items' => '设置项',//'Setting items',
    'alias' => '别名',//'Alias',
    'as_home' => '已设为首页，原默认首页请访问',//'- it has been set as the home page, please visit the original default home page',
    'set_as_home' => '设为首页，',//'Set as the homepage, ',
    'original_home' => '原首页：',//'Original homepage: ',

//---------------------------
//admin/views/page_create.php
    'default' => '默认',//'Default',
    'select_tmpl_option' => '(选择当前模板支持的页面模板，可不选)',//'(Select the page template supported by the current template, optional)',
    'custom_tmpl_info' => '(用于自定义页面模板，对应模板目录下xxx.php文件，xxx即为模板名，可不填)',//'(Used to customize the page template, corresponding to the xxx.php file in the template directory, where xxx is the template name and can be left blank)',

//---------------------------
//admin/views/plugin.php
    'plugin_manage' => '插件扩展',//'Plug-ins',
    'plugin_upload_ok' => '插件安装成功，请开启使用',//'The plug-in is installed successfully, please activate it',
    'plugin_active_ok' => '插件开启成功',//'Plug-in activated successfully',
    'plugin_active_failed' => '插件开启失败',//'Plug-in activation failed',
    'plugin_disable_ok' => '插件禁用成功',//'Plug-in disabled successfully',
    'plugin_delete_failed' => '删除失败，请检查插件文件权限',//'Delete failed, check the plug-in file permissions',
    'plugin_name' => '插件名',//'Plug-in name',
    'plugin_status' => '开关',//'Status',
    'version' => '版本',//'Version',
    'description' => '描述',//'Description',
    'plugin_active_click' => '点击开启插件',//'Click to activate the plug-in',
    'plugin_disable_click' => '点击禁用插件',//'Click to disable the plug-in',
    'plugin_settings_click' => '点击设置插件',//'Click to plug-in settings',
    'more_info' => '更多信息&raquo;',//'更多介绍&raquo;',//'More Info&raquo;',
    'plugin_no_installed' => '还没有安装插件',//'No installed plugins',
    'plugin_not_found' => '未找到插件',//'Plugin not found',
    'plugin_install' => '安装插件',//'Install plugin',
    'plugin_new_install' => '安装插件',//'Install plugin',
    'php_size_limit' => '上传安装包大小超出PHP限制',//'The size of the uploaded installation package exceeds the PHP limit',
    'plugin_update_ok' => '插件更新成功',//'Plugin updated successfully',
    'plugin_update_fail' => '更新失败，无法下载更新包，可能是服务器网络问题。',//'The update failed, the update package could not be downloaded, it may be a server network problem.',
    'active' => '已开启',//'Active',
    'inactive' => '未开启',//'Inactive',
    'sys_plugin' => '系统依赖插件，请勿删除和关闭',//'The system depends on this plug-in, please do not delete or close them',

//---------------------------
//admin/views/plugin_install.php
    'plugin_zipped_only' => '只支持zip压缩格式的插件包',//'Supports plug-in package only in zip compression format',
    'plugin_not_writable' => '上传失败，插件目录(content/plugins)不可写',//'Upload failed, plugin directory (content/plugins) is not writable',
    'plugin_zip_nonsupport' => '服务器PHP不支持zip模块',//'Server does not support zip module' ,
    'plugin_zip_select' => '请选择一个zip插件安装包',//'Please select a zipped plug-in installation package',
    'plugin_wrong_format' => '安装失败，插件安装包不符合标准',//'Installation failed, plug-in installation package does not meet the standards',
    'plugin_install_manually' => '手动安装插件',//'Install the plug-in manually',
    'install_promt_1' => '1、把解压后的插件文件夹上传到 content/plugins 目录下。',//'1) Unzip the plugin file and upload it to the content/plugins directory.',
    'install_prompt2' => '2、登录后台进入插件管理,插件管理里已经有了该插件，点击激活即可。',//'2) Log in to AdminCP, go to Plug-in management, and if the plug-in is already listed, you can click on it to activate it.',
    'upload_install' => '上传安装',//'Upload and install',
    'upload_install_info' => '（上传一个zip压缩格式的插件安装包）',//'Upload a plug-in installation package in zip compressed format',
    'plugin_get_more' => '获取更多插件',//'Get More Plugins',
    'app_center' => '应用中心&raquo;',//'App center &raquo;',

//---------------------------
//admin/views/register.php
    'ok_register_now' => '开始注册',//'Start registration',
    'emlog_reg_ok' => '恭喜，您的emlog pro已完成注册！',//'Congratulations, your emlog pro has been registered!',
    'enter_reg_code' => '输入注册码',//'Enter the registration code',
    'register' => '注册',//'Register',
    'email_format_error' => '错误的邮箱格式',//'Email format error',
    'email_in_use' => '该邮箱已被注册',//'Email is already in use'
    'password_short' => '密码不小于5位',//'Password must not be less than 5 character',

//---------------------------
//admin/views/reset.php
    'retrieve_password' => '找回密码',//'Retrieve password',
    'new_password' => '新的密码',//'New password',
    'confirm_password' => '确认新密码',//'Confirm new password',
    'email_enter' => '输入注册邮箱',//'Enter registered email',
    'email_invalid' => '错误的注册邮箱',//'Wrong registered email',
    'email_send_error' => '邮件验证码发送失败，请检查邮件通知设置',//'Failed to send email verification code, please check email notification settings',
    'verification_error' => '图形验证码错误',//'Graphic verification code error',

//---------------------------
//admin/views/reset2.php
    'password_recover' => '找回密码：重置密码',//'Recover Password: Reset Password',
    'enter_code_from_email' => '邮件验证码已发送到你的邮箱，请查收后填写',//'The email verification code has been sent to your email, please check and fill in',
    'email_verification_code' => '邮件验证码',//'Email verification code',

//---------------------------
//admin/views/setting_seo.php
    'htaccess_not_writable' => '保存失败：根目录下的.htaccess不可写',//'Save failed: .htaccess file in the root directory is not writable',
    'post_url_settings' => '文章链接设置',//'Post URL settings',
    'post_url_rewriting' => '如果修改后文章无法访问，可能是服务器空间不支持URL重写（伪静态），请修改回默认格式并关闭文章连接别名。',//'If the article cannot be accessed after modification, it may be that the server space does not support URL rewriting (pseudo-static), please modify it back to the default format and disable the article link alias.',
    'post_url' => '文章链接',//'Article URL',
    'default_format' => '默认格式',//'Default format',
    'file_format' => '文件格式',//'File format',
    'directory_format' => '目录格式',//'Directory format',
    'category_format' => '分类格式',//'Category format',
    'enable_html_suffix' => '启用链接别名html后缀',//'Enable html suffix for link alias',
    'meta_settings' => '页头信息',//'Header Meta settings',
    'meta_title' => '站点浏览器标题(title)',//'Site Browser Title (title)',
    'meta_keywords' => '站点关键字(keywords)，多个用英文逗号分隔',//'Site keywords, separated by commas',
    'meta_description' => '站点浏览器描述(description)',//'Site Browser Description (description)',
    'meta_title_scheme' => '文章浏览器标题方案',//'Post browser title scheme',
    'post_title' => '文章标题',//'Post title',
    'post_title_site_title' => '文章标题 - 站点标题',//'Post title - Site title',
    'post_title_site_meta_title' => '文章标题 - 站点浏览器标题',//'Post title - Site browser title',
    'nginx_rewrite' => 'Nginx服务器请配置如下伪静态规则',//'Please configure the following pseudo-static rules for the Nginx server',
    'other_config' => '其他服务器配置见官网文档：',//'For other server configurations, see the official website documentation: ',
    'common_problems' => '常见问题',//'Common problems',

//---------------------------
//admin/views/setting.php
    'settings_saved_ok' => '设置保存成功',//'Settings have been saved successfully',
    'site_title' => '站点标题',//'Site title',
    'site_subtitle' => '站点副标题',//'Site subtitle',
    'site_address' => '站点地址',//'Site address',
    'per_page' => '每页显示',//'Show per page',
    'posts_per_page' => '每页显示文章数量',//'Number of articles displayed per page',
    '_posts' => '篇文章',//' posts',
    'your_timezone' => '你所在时区',//'Your time zone',
    'local_time' => '本地时间',//'Local Time',
    'export' => '输出',//'Export ',
    'rss_output_num' => '篇文章，且输出',//' posts, and output',
    'full_text' => '全文',//'Full Text',
    'summary' => '摘要',//'Summary',
    'rss_post_num' => '篇文章（0为关闭），且输出',//'articles (0 is closed), and output',
    'function_switch' => '功能开关',//'Function switch',
    'login_verification_code' => '登录验证码',//'Login verification code',
    'gzip_compression' => 'Gzip压缩',//'Gzip compression',
    'offline_writing' => '离线写作（支持用Windows Live Writer等工具写文章）',//'Offline Writing (Support the use of tools such as Windows Live Writer to write articles)',
    'mobile_access_address' => '手机访问版，地址',//'Mobile Access version, address',
    'access_site_by_mobile' => '用手机访问你的站点',//'Access to your site using a mobile phone',
    'auto_summary' => '自动摘要',//'Automatic summary',
    'auto_summary_length' => '自动截取',//'Automatically intercept',
    'characters_as_summary' => '个字作为摘要',//' characters as a summary',
    'reply_verification_code' => '回复验证码，',//'Reply verification code, ',
    'reply_audit' => '回复审核',//'Reply audit',
    'enable_comments' => '开启评论',//'Enable comments',
    'comment_interval' => '发表评论间隔',//'Comment interval',
    'seconds' => '秒',//'seconds',
    'comment_moderation' => '评论审核',//'Comment moderation',
    'comment_verification_code' => '评论验证码',//'Comments Verification Code',
    'comment_avatar' => '评论人头像',//'Comments author avatar',
    'comment_must_contain_chinese' => '评论内容必须包含中文（防御国外垃圾评论）',//'Comments must contain Chinese (Defense against foreign spam comments)',
    'comment_per_page' => '评论分页，',//'Comments per page',
    'comments_per_page' => '每页显示评论条数',//'Display the number of comments per page',
    'standing_in_front' => '排在前面',//'Standing in front',
    'upload_max_size' => '附件上传最大限制',//'Upload attachment maximum size',
    'php_upload_max_size' => '上传文件还受到服务器空间PHP配置最大上传',//'Upload file has been configured by server PHP maximum upload space',
    'allow_attach_type' => '允许上传的附件类型',//'Allow attachment types to upload',
    'separate_by_comma' => '（多个用半角逗号分隔）',//' (Separate multiple values by a comma)',
    'thumbnail_max_size' => '上传图片生成缩略图，最大尺寸：',//'Uploaded pictures generated thumbnail maximum size: ',
    'unit_pixels' => '（单位：像素）',//' (Unit: pixels)',
    'icp_reg_no' => 'ICP备案号',//'ICP Reg.&nbsp;No.',
    'home_footer_info' => '首页底部信息',//'Footer info at the Home',
    'home_footer_info_html' => '(支持html，可用于添加流量统计代码)',//'(HTML supported, can be used to add a traffic statistics code)',
    'save_settings' => '保存设置',//'Save Settings',
    'before_intercept' => '截取文章的前',//'Intercept before article ',
    'comment_sort' => '评论排序方式',//'Sort comments',
    'new_first' => '新的靠前',//'New first',
    'old_first' => '旧的靠前',//'Old first',
    'article_settigs' => '文章设置',//'Article Settings',
    'upload_settings' => '上传设置',//'Upload settings',
    'comment_settings' => '评论设置',//'Comment settings',
    'rss_url' => 'RSS地址(用于RSS阅读器订阅你的站点内容)',//'RSS URL (for RSS readers to subscribe to your site content)',
    'other_settings' => '其他设置',//'Other settings',
    'admin_per_page' => '后台每页展示条目数量',//'The number of items displayed per page in the admin panel',
    'admin_per_page_tips' => '（影响后台文章、评论、用户列表）',//'(Affect background articles, comments, user lists)',
    'today_app_news' => '接收来自官方的应用推荐（后台首页应用推荐展示）',//'Receive official application recommendations (show backend home page with application recommendations)',
    'unit_kb' => '（单位：KB，1MB=1024KB）',//'(unit: KB, 1MB=1024KB)',
    'login_before_comment_on' => '登录后评论，开启后仅登录用户可评论',//'Comment after login. Only logged-in users can comment after this is turned on',
    'app_recommended' => '应用推荐',//'Recommended applications',
    'menu' => '菜单',//'Menu',

//---------------------------
//admin/views/setting_api.php
    'api_key_reset_ok' => '接口秘钥重置成功',//'Interface key was reset successfully',
    'api_enable' => '开启API',//'Enable API',
    'api_key' => 'API秘钥',//'API key',
    'api_key_reset' => '重置API秘钥',//'Reset API key',
    'api_list' => 'API接口列表',//'List of API interfaces',
    'api_1' => '1. 文章发布 (可用于对接内容发布软件，文章发布接口URL：',//'1. Article publishing (can be used to connect with content publishing software, article publishing interface URL: ',
    'api_2' => '2. 分类列表',//'2. Article details',
    'api_3' => '3. 笔记发布',//'3. Category list',
    'api_4' => '4. 笔记列表',//'4. Note list',
    'api_5' => '5. 资源文件上传',//'5. Resource file upload',
    'api_more' => '更多接口',//'More info',
    'api_docs' => '详见接口文档→',//'See the API documentation for details→',

//---------------------------
//admin/views/setting_mail.php
    'comment_new_notify' => '评论通知（评论通知文章作者，回复评论通知评论人）',//'Comment notification (notify the article author about a new comment, notify the commenter about a reply to the comment)',
    'article_new_notify' => '文章投稿通知（仅发送到创始人邮箱）',//'Notification of new articles submitted (sent to founder email only)',
    'email_template' => '邮件模板',//'Email Template',
    'select_email_template' => '选择模板',//'Select template',//+:
    'simple' => '简约',//'Simple',
    'email_template_placeholer' => '邮件模板(支持html)，不使用模板请留空。',//'Email template (supports html). Please leave it blank if you do not use a template.',

//---------------------------
//admin/views/setting_user.php
    'groups_about' => '            <b>用户组</b><br>
            注册用户：可以发文投稿、管理自己的文章、图文资源<br>
            内容编辑：负责全站文章、资源、评论等内容的管理<br>
            管理员：拥有站点全部管理权限，可以管理用户、进行系统设置等<br>',
             //'<b>User Group</b><br>
             //'Registered users: can post articles, contribute articles, and manage their own articles and graphic resources<br>
             //' Content Editor: Responsible for the management of articles, resources, comments and other content on the entire site<br>
             //'Administrator: Has full management rights for the site and can manage users, perform system settings, etc.<br>',
    'groups_alert' => '注册用户：可以发文投稿、管理自己的文章、图文资源<br>
                       内容编辑：负责全站文章、资源、评论等内容的管理<br>
                       管理员：拥有站点全部管理权限，可以管理用户、进行系统设置等<br>',
                       //'Registered users: can post articles, contribute articles, and manage their own articles and graphic resources<br>
                       // Content Editor: Responsible for the management of articles, resources, comments and other content on the entire site<br>
                       // Administrator: Has full management rights for the site and can manage users, perform system settings, etc.<br>',
    'limit_daily_posts' => '注册用户限制24小时发文数量（包括草稿）',//'Registered users limit the number of posts (including drafts) within 24 hours',
    'enable_email_code' => '开启注册邮件验证码（开启需配置邮件通知服务）',//'Enable email verification code on registration (you need to configure the email notification service to open it)',
    'if_0_upload_disabled' => '（为0同时禁止上传图文资源）',//'(0 means prohibit uploading of graphic resources)',
    'article_alias' => '用户中心文章别名：',//'User center article alias:',
    'article_alias_prompt' => '如：帖子、投稿、资源等',//'Such as: posts, contributions, resources, etc.',

//---------------------------
//admin/views/signin.php
// 'em_reg_ok'		=> '注册成功，请登录',//'Registration is successful, please log in',
    'password_reset_ok' => '密码重置成功，请登录',//'Password reset successfully, please log in',

//---------------------------
//admin/views/signup.php
    'send_email_code' => '发送邮件验证码',//'Send email verification code',

//---------------------------
//admin/views/sort.php
    'category_management' => '文章分类',//'Article categories',
    'category_name' => '分类名',//'Category name',
    'alias_prompt' => '英文字母组成，用于seo设置，可不填',//'Composed of English letters, used for SEO settings, optional',
    'category_parent' => '父分类',//'Parent category',
//'submit'                                  => '提交',//'Submit',
    'category_add' => '添加分类',//'添加分类+',//'Add Category',
    'tag_add' => '新建标签',//'Add Tag',
    'template_name' => '模板名',//'Template name',
    'category_id' => '分类ID',//'Category ID',
    'keywords' => '关键词',//'Keywords',
    'keywords_info' => '（英文逗号分割，用于分类页的 keywords）',//' (English characters comma separated. Keywords used for a page classification)',

//---------------------------
//admin/views/sort_edit.php
    'category_description' => '描述（也用于分类页的 description）',//'Description (also used for description on category pages)',
    'category_template' => '分类模板',//'Category template',
    'category_template_intro' => '(选择当前模板支持的分类模板，可不选)',//'(Select the category template supported by the current template, you can not choose)',
    'custom_template_intro' => '(用于自定义分类页面模板，对应模板目录下xxx.php文件，xxx即为模板名，可不填)',//'(Used to customize the category page template, corresponding to the xxx.php file in the template directory, where xxx is the template name and can be left blank)',

//---------------------------
//admin/views/store.php
    'install_ok' => '安装成功',//'Successful installation',
    'install_failed' => '安装失败',//'Installation failed',
    'install_failed_download' => '安装失败，无法下载安装包',//'Installation failed, unable to download the installation package',
    'install_failed_write' => '安装失败，无法写文件，请检查content/下目录是否可写',//'Installation failed, unable to write files, please check whether the content/ directory is writable',
    'install_failed_zip' => '安装失败，无法解压，请安装php的Zip扩展',//'Installation failed, unable to decompress, please install php Zip extension',
    'install_invalid_ext' => '安装失败，不是有效的安装包',//'Installation failed, not a valid installation package',
    'store_unavailable' => '商店暂不可用，可能是网络问题',//'The store is temporarily unavailable, it may be a network problem',
// 'back_home'		=> '返回首页',//'Back to home',
    'ext_store' => '扩展商店',//'Extension Store',
    'ext_store_templates' => '模板主题',//'Template themes',
// 'template'		=> '模板',//'Template',
    'extensions' => '扩展',//'Extensions',
    'ext_store_plugins' => '扩展插件',//'Extensions',

    'developer' => '开发者',//'Developer',
    'update_time' => '更新时间',//'Update time',
    'price' => '价格',//'Price',
    'free' => '免费',//'Free',
    'price_unit' => '元',//'Yuan',
    'go_buy' => '立即购买',//'Buy now',
    'download&install' => '下载安装',//'Download and install',
    'app_store' => '应用商店',//'App store',
    'version_number' => '版本号',//'Version number',

//---------------------------
//admin/views/store_install.php
    'install' => '安装',//'Install',
    'package_downloading' => '正在下载安装中',//'Downloading package...',
    'plugin_install_ok' => '安装成功，',//'Plugin has been installed successfully',
    'plugin_download_failed' => '下载失败，可能是服务器网络问题，请手动下载安装，',//'Download failed. It may be network problem. Please, download and install manually.',
    'return_app_center' => '返回应用中心',//'Return to app center',
    'install_failed_zip_nonsupport' => '安装失败，可能是你的服务器空间不支持zip模块，请手动下载安装，',//'Installation failed. It seems your server does not support zip module. Please, download and install manually.',
    'install_failed_folder_nonwritable' => '安装失败，可能是应用目录不可写，',//'Installation failed. Probably, directory is not wirtable.',
    'install_failed' => '安装失败，',//'Installation failed.',

//---------------------------
//admin/views/store_mine.php
    'contact_to_install' => '请联系作者安装',//'Please contact the author to install',
    'no_my_apps' => '您还没有购买任何应用。',//'You have not purchased any apps.',
    'install_app' => '安装应用',//'Install app',
    'not_paid_user' => '您还不是付费注册用户，无法使用应用商店已购功能，',//'You are not a paid registered user and cannot use the functions purchased in the app store.',
    'paid_support' => '付费支持',//'Paid Support',

//---------------------------
//admin/views/store_plu.php
    'install_free' => '免费安装',//'Install for free',
    'plugin_search' => '搜索插件...',//'Search plugin...',
    'show_free_only' => '仅看免费',//'Show only free',
    'store_no_results' => '暂未找到结果，应用商店进货中，敬请期待：）',//'No results have been found yet, the app store is in stock, so stay tuned :)',
    'plugin_publish' => '发布插件',//'Publish plugin',
    'this_author_only' => '仅看Ta的作品',//'View only this author items',
    '_plugins' => '个插件',//' plugins',// Number of plugins
    'recommend_today' => '今日推荐',//'Recommended today',
    'limited_offer' => '限时优惠',//'Limited Time Offer',

//---------------------------
//admin/views/store_svip.php
    'not_svip' => '您还不是铁杆svip付费支持用户，无法安装专属免费应用',//'You are not a hardcore svip paid support user, so you cannot install exclusive free applications',
    'paid_support' => '付费支持 &rarr;',//'Paid support &rarr;',

//---------------------------
//admin/views/store_tpl.php
    'temlate_search' => 'Search Templates...',//'搜索模板...',
    'template_publish' => '发布模板',//'Publish template',
    '_templates' => '个模板',//' templates',// Number of templates

//---------------------------
//admin/views/style.php
    'use_this_style' => '点击使用该风格',//'Click to use this style',

//---------------------------
//admin/views/tag.php
    'tag_management' => '文章标签',//'Article tags',
    '_save_' => '保 存',//' Save ',
    '_cancel_' => '取 消',//' Cancel ',
    'tag_select' => '请选择标签',//'Please select a tag',
    'tag_delete_sure' => '你确定要删除所选标签吗？',//'Are you sure you want to delete the selected tags?',
    '_tags' => '个标签',//' tags',// Number of tags
    'tags_total' => '总标签数',//'Total tags',
    'tag_search' => '搜索标签名...',//'Search tag name...',

//---------------------------
//admin/views/template.php
    'template_manager' => '模板外观',//'Templates',
    'template_current' => '当前模板',//'Current template',
    'template_change_ok' => '模板更换成功',//'Template have been replaced successfully',
    'template_current_use' => '当前使用的模板',//'Currently used template',
    'template_damaged' => '已被删除或损坏，请选择其他模板。',//'This template has been damaged! Please choose another template.',
    'template_top_image' => '自定义顶部图片',//'Custom top image',
    'template_library' => '模板库',//'Template library',
    'template_upload_ok' => '模板安装成功',//'Template installed successfully',
    'template_delete_ok' => '删除模板成功',//'Template have been removed successfully',
    'template_delete_failed' => '删除失败，请检查模板文件权限',//'Delete failed, check the template file permissions',
    'template_use_this' => '使用该模板',//'Use this template',
    'template_add' => '安装模板',//'Install template',
    'template_install' => '安装模板',//'Install template',
    'template_author' => '模板开发者',//'Template author',
    'template_update_ok' => '模板更新成功',//'Template updated successfully',
    'enable' => '启用',//'Enable',

//---------------------------
//admin/views/template_crop.php
    'image_crop' => '裁剪图片',//'Crop image',
    'crop_and_save' => '剪裁并保存',//'Crop and save',
    'crop_cancel' => '取消裁剪',//'Cancel crop',
    'crop_load_prompt' => '(页面加载完毕后，未出现选择区域时请按下鼠标左键手动拖曳选取)',//'(When page loading is completed, but it is not appear in the select area, then press the left mouse button to drag the selected manually)',

//---------------------------
//admin/views/template_install.php
    'template_zip_support' => '只支持zip压缩格式的模板包',//'Only supported for .zip files.',
    'template_not_writable' => '上传失败，模板目录(content/templates)不可写',//'Upload failed. Template directory (content/templates) cannot be written.',
    'template_no_zip' => '空间不支持zip模块，请手动安装： <br/>',//'Server does not support zip module, please install it manually:<br>',
    'template_select_zip' => '请选择一个zip格式的模板安装包',//'Please select a template installation package in zip format',
    'template_non_standard' => '安装失败，模板安装包不符合标准',//'Installation failed, template installation package does not meet the standards',
    'template_install_manual' => '手动安装模板',//'Template manual installation',
    'template_install_prompt1' => '1、把解压后的模板文件夹上传到 content/templates目录下。 <br/>',//'1. Upload the decompressed template folder to the content/templates directory. <br/>',
    'template_install_prompt2' => '2、登录后台换模板，模板库中已经有了你刚才添加的模板，点击使用即可。 <br/>',//'2. Log in to the admin panel to change the template. The template you just added is already in the template library, just click to use it. <br/> ',
    'template_upload_prompt' => '上传一个zip压缩格式的模板安装包',//'Upload .zip file that contains installation package',
    'template_get_more' => '获取更多模板',//'Get more templates',

//---------------------------
//admin/views/template_top.php
    'image_replace_ok' => '顶部图片更换成功',//'Image has been replaced successfully.',
    'image_crop_error' => '裁剪图片失败',//'Image crop error',
    'top_image_unavailable' => '当前未使用顶部图片或者使用中的顶部图片被删除',//'Current top image is unused or deleted',
    'images_optional' => '可选图片',//'Optional images',
    'image_click_to_use' => '点击使用该图片',//'Click on image to use it',
    'top_image_not_use' => '不使用顶部图片',//'Do not use the top image.',
    'top_image_custom' => '自定义图片',//'Custom image',
    'upload' => '上传',//'Upload',
    'top_image_upload_prompt' => '(上传一张你喜欢的顶部图片，支持JPG、PNG格式)',//'(Upload your favourite picture to top. Supported formats: jpg, png.)',

//---------------------------
//admin/views/twitter.php
    'twitter_del_ok' => '笔记删除成功',//'Note deleted successfully',
    'twitter_empty' => '笔记内容不能为空',//'Note content cannot be empty',
    'twitter_add' => '卡片笔记',//'Add a note',
    'twitter_prompt' => '快速记录想法，帮你方便的捕捉灵感，积累知识的复利',//'Quickly record ideas, help you easily capture inspiration and accumulate knowledge compound interest',
    'twitter_save' => '保存笔记',//'Save the note',
    'twitters' => '笔记',//'Notes',
    '_twitters' => '条笔记',//' note(s)',
    'twitter_edit' => '编辑笔记',//'Edit note',
    'twitter_post_disabled' => '抱歉，系统限制用户发布笔记',//'Sorry, the system restricts users from posting notes',

//---------------------------
//admin/views/upload.php
    'attach_max_size' => '单个附件最大',//'Maximum size of single attachment',
    'types_allowed' => '允许类型',//'Allowed types',
    'attachment_add' => '增加附件',//'Add attachment',
    'attach_reduce' => '减少附件',//'Reduce attachments',

//---------------------------
//admin/views/upload_multi.php
    'browser_upgrade' => '您正在使用的浏览器版本太低，无法使用批量上传功能。为了更好的使用emlog，建议您升级浏览器或者换用其他浏览器。',//'Your browser is too old to display this feature. You cannot use the bulk upload. Please, upgrade your web browser or switch to another.',
    'file_select' => '选择文件',//'Select the file',

//---------------------------
//admin/views/user.php
    'user_management' => '用户',//'Users',
    'user_modify_ok' => '修改用户资料成功',//'User data has been modified successfully',
    'user_add_ok' => '添加用户成功',//'User has been added successfully',
    'user_name_empty' => '用户名不能为空',//'Username cannot be empty',
    'user_name_exists' => '该用户名已存在',//'The username already exists',
    'passwords_not_equal' => '两次输入密码不一致',//'Entered twice passwords are not equal',
    'founder_not_delete' => '不能删除创始人',//'You can not delete Founder',
    'founder_not_edit' => '不能修改创始人信息',//'Information about Founder cannot be modified',
    'founder' => '创始人',//'Founder',
    'admin' => '管理员',//'Administrator',
    'admins' => '管理员',//'Administrators',
    'posts_need_audit' => '(文章需审核)',//'Posts need to be verified',
    'edit' => '编辑',//'Edit',
    'delete' => '删除',//'Delete',
    'no_authors_yet' => '还没有添加作者',//'No authors yet',
    '_users' => '位用户',//' users',
    'user_add' => '添加用户',//'Add user',
    'author_contributor' => '作者（投稿人）',//'Author (Contributor)',
    'password_min_length' => '密码 (不少于6位)',//'Password (not less than 6 characters)',
    'password_repeat' => '再次输入密码',//'Enter the password again',
    'posts_not_need_audit' => '文章不需要审核',//'Posts not need to be verified',
    'posts_need_audit' => '文章需要审核',//'Posts need to be verified',
    'publish_permission' => '发布权限',//'Publishing permissions',
    'users_total' => '已创建的用户',//'Users created',
    'role' => '角色',//'Role',
    'login_ip' => '登录IP',//'Login IP',
    'last_login_time' => '更新/登录时间',//'Last active time',
    'search_by_email' => '输入邮箱或用户昵称搜索...',//'Enter email address or username to search...',
    'email_empty' => '邮箱不能为空',//'E-mail can not be empty',
    'email_is_used' => '该邮箱已被占用',//'This email is used already',
    'user_ban_ok' => '禁用成功，该用户无法再登录',//'Locked successfully, the user can no longer log in',
    'user_unban_ok' => '解禁成功',//'Unlocked successfully',
    'user_id' => '用户ID',//'User ID',
    'ban' => '解禁',//'Ban',
    'banned' => '已禁用',//'Banned',
    'unban' => '解禁',//'Unban',

//---------------------------
//admin/views/user_edit.php
    'user_manage' => '编辑用户信息',//'Edit user information',
    'password_new' => '新密码(不修改请留空)',//'New password (leave blank, if you do not want to modify)',
    'password_new_repeat' => '重复新密码',//'Repeat new password',
    'user_role' => '用户组',//'User role',

//---------------------------
//admin/views/widgets.php
    'widget_manage' => '侧边栏',//'Sidebar',
    'system_widgets' => '系统组件',//'System widgets',
    'blogger' => '个人资料',//'Personal information',
    'change' => '更改',//'Change',
    'calendar' => '日历',//'Calendar',
    'last_comments_num' => '最新评论数',//'Last comments number',
    'new_comments_home' => '首页最新评论数',//'Home Latest comments',
    'new_comments_length' => '新近评论截取字节数',//'Summary length for latest comments',
    'new_posts_show' => '显示最新文章数',//'Show Latest Posts',
    'new_posts_home' => '首页显示最新文章数',//'Show Latest Posts at Home',
    'hot_posts_home' => '显示热门文章数',//'Show popular posts',
    'random_post_home' => '首页显示随机文章数',//'Show random entries at Home',
    'widgets_custom' => '自定义组件',//'Custom widgets',
    'widget_untitled' => '未命名组件',//'Untitled widget',
    'widget_delete' => '删除该组件',//'Remove widget',
    'widget_custom_add' => '自定义一个新的组件+',//'Add new custom widget+',
    'widget_title' => '组件名',//'Widget title',
    'widget_content_info' => '内容 （支持html）',//'Content (html supported)',
    'widget_add' => '添加组件',//'Add widget',
    'sidebar' => '侧边栏',//'Sidebar',
    'widget_use' => '使用中的组件',//'Used widgets',
    'widget_order_save' => '保存组件排序',//'Save widget order',
    'widget_setting_reset' => '恢复出厂设置',//'Reset default widget settings',
);
