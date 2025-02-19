var LNG = {
//---------------------------
//admin/views/article_write.php
    'leave_prompt': 'Leave page prompt',//'离开页面提示',
    'already_edited' : '[already edited] ',//'[已修改] ',
    'use_markdown' : 'Start your creation using Markdown...',//'使用 Markdown 开始你的创作吧...',
    'enter_summary' : 'If left blank, the content will be used as a summary.',//'如果留空，则使用正文作为摘要。',
    'save_draft' : 'Save as draft',//'放入草稿',
    'del_completely' : 'Remove completely',//'彻底删除',
    'sure_del_draft' : 'Delete selected drafts?',//'删除所选草稿？',
    'upload_images_only' : 'Only pictures can be uploaded',//'只能上传图片',
    'cover_upload_error' : 'Error uploading cover',//'上传封面出错了',
    'avatar_upload_error' : 'Error uploading avatar',//'上传头像出错了',

// admin/views/article.php
    'select_article': 'Please select an article',//'请选择文章',
    'sure_delete_articles': 'Are you sure you want to delete the selected articles',//'确定要删除所选文章吗',

// admin/views/blogger.php
    'password_changed_ok' : 'Password changed successfully, please log out and log in again',//'密码修改成功, 请退出重新登录',
    'email_modified_ok' : 'Email modified successfully',//'邮箱修改成功',
    'resend' : 'Resend',//'重新发送',
    'captcha_send' : 'Send verification code',//'发送验证码',
    'captcha_sent_ok' : 'Verification code has been sent, please check your email',//'验证码已发送，请查收邮件',
    'ai_request_failed' : 'AI request failed, please try again later',//'AI 请求失败，请稍后再试',
    'password_strength' : 'Password strength: '//'密码强度：',
    'weak' : 'weak',//'弱',
    'strong' : 'strong',//'强',
    'medium' : 'medium',//'中等',

// admin/views/comment.php
    'comment_operation_select': 'Please select a comment',//'请选择评论',
    'comment_selected_delete_sure': 'Delete selected comments?',//'删除所选评论？',
    'ai_generating' : 'AI Generating...',//'AI生成中...',
    'ai_gen_failed' : 'AI generation failed',//'AI 生成失败',

// admin/views/components/layer/layer.js
    'rotate' : 'Rotate',//'旋转',
    'scalex' : 'Scale X',//'变换',
    'zoom_in' : 'Zoom In',//'放大',
    'zoom_out' : 'Zoom Out',//'缩小',
    'reset' : 'Reset',//'还原',
    'close' : 'Close',//'关闭',
    'view_original' : 'View original photo',//'查看原图',
    'image_url_invalid' : 'The current image address is invalid.<br>Do you want to continue viewing the next one?',//'&#x5F53;&#x524D;&#x56FE;&#x7247;&#x5730;&#x5740;&#x5F02;&#x5E38;<br>&#x662F;&#x5426;&#x7EE7;&#x7EED;&#x67E5;&#x770B;&#x4E0B;&#x4E00;&#x5F20;&#xFF1F;',
    'next_one' : 'Next one',//'&#x4E0B;&#x4E00;&#x5F20;',
    'stop_watch' : 'Stop watching',//'&#x4E0D;&#x770B;&#x4E86;',

// admin/views/media.php
    'resource_select': 'Please select a resource file',//'请选择资源文件',
    'resource_del_sure': 'Delete the selected resource file?',//'删除所选资源文件？',

// admin/views/page.php
    'select_page_to_operate': 'Please select a page',//'请选择页面',
    'sure_delete_selected_pages': 'Delete selected pages?',//'删除所选页面？',

//---------------------------
//admin/views/plugin.php
    'update': 'Update',//'更新',
    'plugin_update_check_fail': 'Plug-in update check failed, error code: ',//'插件更新检查无法正常进行,错误码:',
    'plugin_update_check_exception': '<b>Plugin update check exception:</b><br>',//'插件更新检查异常： ',

//---------------------------
//admin/views/signup.php
    'send_email_code': 'Send email verification code',//'发送邮件验证码',
    'code_valid_for': 'Sent successfully, please check your email in ',//'发送成功，请查收邮件 ',
    '_seconds': ' seconds',//'秒',
    'test_mail_failed': 'Failed to send',//'发送失败',

//---------------------------
//admin/views/tag.php
    'tag_select_del': 'Please select a tag to delete',//'请选择要删除的标签',
    'tag_delete_sure': 'Delete selected tags?',//'删除所选标签？',

//---------------------------
//admin/views/template.php
    'update_api_error': 'The update interface returned an error',//'更新接口返回错误',
    'update_request_error': 'The request to update the interface failed',//'请求更新接口失败',

//---------------------------
//admin/views/user.php
    'user_select' : 'Please select a user',//'请选择用户',
    'block_users' : 'Block selected users?',//'封禁所选用户？',
    'blocked' : 'Banned',//'封禁',

//---------------------------
//admin/views/js/common.js
    'twitter_del_sure': 'Delete this note?',//'删除这条微语？',
    'comment_del_sure': 'Delete this comment?',//'删除这条评论？',
    'comment_ip_del_sure': 'Delete all comments from that IP?',//'删除来自该IP的所有评论？',
    'link_del_sure': 'Delete this link?',//'删除该链接？',
    'navi_del_sure': 'Delete this navigation?',//'删除该导航？',
    'attach_del_sure': 'Delete this media file?',//'删除该文件？',
    'avatar_del_sure': 'Delete this avatar?',//'删除头像？',
    'category_del_sure': 'Delete this category?',//'删除该分类？',
    'user_del_sure': 'Delete this user?',//'删除该用户？',
    'template_del_sure': 'Delete this template?',//'删除该模板？',
    'plugin_reset_sure': 'Reset the plugin settings?',//'重置组件？',
    'plugin_reset_info': ' Resetting will lose all the plugin customization',//'重置会丢失自定义的组件',
    'reset': 'Reset',//'重置',
    'plugin_del_sure': 'Delete this plugin?',//'删除该插件？',
    'alias_link_error': 'Link Alias error',//'链接别名错误',
    'alias_invalid_chars': 'Alias should contain only latin letters, numbers, underscores and dashes',//'别名错误，应由字母、数字、下划线、短横线组成',
    'alias_digital': 'Alias cannot contain numbers only',//'别名错误，不能为纯数字',
    'alias_format_must_be': 'Invalid alias. It can not contain "post" or "post-digits"',//'别名错误，不能为"post"或"post-数字"',
    'alias_system_conflict': 'Alias error (system conflict)',//'别名错误，与系统链接冲突',
    'alias_link_error_not_saved': 'Invalid Link Alias. Can not be saved automatically.',//'链接别名错误，自动保存失败',
    'saving': 'Saving...',//'正在保存中...',
    'saved_ok_time': 'Saved at ',//'保存于：',
    'save_system_error': 'Failed to save, maybe the article cannot be edited or the daily post limit has been reached',//'保存失败，可能文章不可编辑或达到每日发文限额',
    'too_quick': 'Do not operate frequently!',//'请勿频繁操作！',
    'saving_in': '[Saving] ',//'[保存中] ',
    'saved_ok': '[Saved successfully]: ',//'[保存成功] ',
    'save_success': 'Saved successfully',//'保存成功',

    'save_failed': '[Save failed]: ',//'[保存失败] ',
    'save_failed!': 'Save failed!',//'保存失败！',
    'save_failed_prompt': 'Failed to save, please backup content, refresh the page and try again!',//'保存失败，请备份内容和刷新页面后重试！',
    'paste_upload': 'Paste upload ',//'粘贴上传 ',
    'uploading': 'Uploading...',//'上传中...',
    'progress': 'Progress (bytes): ',//'进度(bytes): ',
    'upload_ok_get_result': 'Upload successful! Getting results...',//'上传成功！正在获取结果...',
    'result_ok': 'Get the result successfully!',//'获取结果成功！',
    'unknown_error': 'Unknown error',//'未知错误',
    'upload_failed_error': 'Upload failed, wrong image type or network error',//'上传失败,图片类型错误或网络错误',
    'installing': 'Installing...',//'安装中…',
    'install_free': 'Install for free',//'免费安装',
    'get_result_fail': 'Failed to get result!',//'获取结果失败！',
    'install': 'Install',//'安装',

//----
    'backup_import_sure': 'Are you sure you want to import the backup files?',//'你确定要导入该备份文件吗？',
    'page_del_sure': 'Are you sure you want to delete this page?',//'你确定要删除该页面吗？',
    'title_empty': 'Title can not be empty',//'标题不能为空',
    'wysiwyg_switch': 'Please, switch to WYSIWYG mode',//'请先切换到所见所得模式',
    'click_view_fullsize': 'Click to view full size',//'点击查看原图',
    'user_disable_sure': 'Disable this user?',//'禁用该用户？',
    'disable': 'Disable',//'禁用',
    'article_del_sure': 'Delete this article?',//'删除这篇文章？',
    'draft_del_sure': 'Are you sure you want to delete this draft?',//'删除这篇草稿？',
    'media_category_del_sure': 'Are you sure you want to delete this resource category (resource files will not be deleted)?',//'确定要删除该资源分类吗（不会删除资源文件）？',
    'media_select': 'Please select a media file to move',//'请选择要移动的资源',
    'delete_not_recover': 'Deleted may not be recoverable',//'彻底删除将无法恢复',
    'ok': 'OK',//'确定',
    'cancel': 'Cancel',//'取消',
    'category_not_deleted': ' Media files under the category will not be deleted',//'不会删除分类下资源文件',
    'emlog_not_registered': 'Your emlog has not been registered',//'您的emlog pro尚未注册',
    'register': 'Register',//'去注册',
    'is_latest_version': 'Already the latest version',//'已经是最新版本',
    'update_expired': 'Update service has expired',//'更新服务已到期',
    'log_in_renew': 'Log in to the official website to renew',//'登录官网续期',
    'new_ver_available': 'There is a new version available',//'有可用的新版本',
    'view_changelog': 'View changelog',//'更新内容',
    'update_now': 'Update now',//'现在更新',
    'check_failed': 'Check failed, may be a network problem',//'检查失败，可能是网络问题',
    'updating_now': 'Updating... please wait patiently',//'更新中... 请耐心等待',
    'updated_ok': '&#x1F389;Congratulations, the update is successful&#x1F389;',//'&#x1F389;恭喜，更新成功了&#x1F389;',
    'update_download_fail': 'Failed to download the update, it may be a server network problem',//'下载更新失败，可能是服务器网络问题',
    'unzip_fail': 'Failed to decompress and update. your server does not support zip',//'解压更新失败，可能是你的服务器空间不支持zip模块',
    'update_not_writable': 'Update failed, the directory is not writable',//'更新失败，目录不可写',
    'update_fail': 'Update failed',//'更新失败',
    'save_first': 'Please save the page first!',//'请先保存页面！',
    'content_empty': 'Page content cannot be empty!',//'页面内容不能为空！',
    'plugin': 'Plugin: ',//'插件：',
    'template': 'Template: ',//'模板：',
    'buy': 'Buy',//'购买',
    'go_store_install': 'Go to the store to install',//'去商店安装',
    'free': 'Free',//'免费',
    'price': 'Price: ',//'应用售价',
    'article_preview': 'Preview article',//'预览文章',
    'price_unit': ' &yen;',//'元',
    'refresh_page': 'Refresh page',//'刷新页面',
    'to_use_new': ' to start experiencing the new version',//'开始体验新版本',
    'prompt': 'Prompt',//'提示',
    'delete_model?' : 'Delete this model?',//'删除该模型？',

//---------------------------
//include/lib/js/common_tpl.js
    'loading': 'Loading...',//'加载中...',
    'max_140_bytes': '(Up to 140 characters)',//'(回复长度需在140个字内)',
    'nickname_empty': '(Nickname cannot be empty)',//'(昵称不能为空)',
    'captcha_error': '(Verification code error)',//'(验证码错误)',
    'nickname_disabled': '(This nickname is not allowed)',//'(不允许使用该昵称)',
    'nickname_exists': '(This nickname already exists)',//'(已存在该回复)',
    'comments_disabled': '(Comments disabled)',//'(禁止回复)',
    'comment_ok_moderation': '(Your comment saved successfully and is awaiting for moderation.)',//'(回复成功，等待管理员审核)',
    'chinese_must_have': 'The comment content must contain Chinese characters!',//'评论内容需要包含中文！',
    'email_invalid': 'The email format is wrong!',//'邮箱格式错误！',
    'url_invalid': 'URL format is wrong!',//'网址格式错误！',
    'toc': 'Table of contents',//'目录',

//---------------------------
//admin/views/js/dropzone.min.js
    'drag_message': 'Drag the file here, or click to upload',//'拖动文件到这里，或者点击后选择上传',

//---------------------------
//admin/views/js/media-lib.js
    'insert_to_article': 'Insert to the article',//'插入文章',
    'set_cover': 'Set as cover',//'设为封面',
    'file_size': 'File size: ',//'文件大小：',
    'del_media_sure': 'Are you sure you want to delete this resource?',//'确定要删除该资源吗？',
    'delete': 'Delete',//'删除',
    'public_download': 'Public Downloads',//'公开下载',
    'user_download': 'User downloads',//'用户下载',

//---------------------------
//admin/views/components/message.min.js
    'is_loading': 'Loading',//'正在加载',

//----------------
// The LAST key. DO NOT EDIT!!!
    '@': '@'
};
