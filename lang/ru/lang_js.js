var LNG = {
//---------------------------
//admin/views/article_write.php
    'leave_prompt'	: 'Сообщение при покидании страницы',//'离开页面提示',
    'already_edited'	: '[было изменено] ',//'[已修改] ',
    'use_markdown'	: 'Используйте Markdown при создании статьи...',//'使用 Markdown 开始你的创作吧...',
    'enter_summary'	: 'Если пусто, то в качестве краткого описания будет использован текст статьи.',//'如果留空，则使用正文作为摘要。',
    'save_draft'	: 'Сохранить как черновик',//'放入草稿',
    'del_completely'	: 'Удалить полностью',//'彻底删除',
    'sure_del_draft'	: 'Вы уверены, что хотите удалить помеченные черновики',//'确定要删除所选草稿吗',

// admin/views/article.php
    'select_article'       : 'Пожалуйста, выберите статью',//'请选择文章',
    'sure_delete_articles' : 'Вы уверены, что хотите удалить выбранную статью',//'确定要删除所选文章吗',

// admin/views/comment.php
    'comment_operation_select'     : 'Пожалуйста, выберите комментарий',//'请选择评论',
    'comment_selected_delete_sure' : 'Вы уверены, что хотите удалить выбранные комментарии',//'确定要删除所选评论吗',

// admin/views/media.php
    'resource_select'   : 'Пожалуйста, выберите файл ресурсов',//'请选择资源文件',
    'resource_del_sure' : 'Вы уверены, что хотите удалить выбранные файлы ресурсов',//'确定要删除所选资源文件吗',

// admin/views/page.php
    'select_page_to_operate': 'Пожалуйста, выберите страницу',//'请选择页面',
    'sure_delete_selected_pages': 'Вы уверены, что хотите удалить выбранные страницы',//'确定要删除所选页面吗',

//---------------------------
//admin/views/plugin.php
    'update'				: 'Обновить',//'更新',
    'plugin_update_check_fail'		: 'Сбой при проверке обновления, код ошибкт: ',//'插件更新检查无法正常进行,错误码:',
    'plugin_update_check_exception'	: 'Исключение проверки обновления: ',//'插件更新检查异常： ',

//---------------------------
//admin/views/signup.php
    'send_email_code'	: 'Отправить код верификации на email',//'发送邮件验证码',
    'code_valid_for'	: 'Сообщение успешно отправлено на Email. Код верификации действителен в течение ',//'发送成功，请查收邮件 ',
    '_seconds'		: ' секунд',//'秒',
    'test_mail_failed'	: 'Ошибка отправки email',//'发送失败',

//---------------------------
//admin/views/tag.php
    'tag_select_del'	: 'Пожалуйста, выберите тэги для удаления',//'请选择要删除的标签',
    'tag_delete_sure'	: 'Вы уверены, что хотите удалить выбранные тэги',//'确定要删除所选标签吗',

//---------------------------
//admin/views/template.php
'update_api_error':	'АПИ обновления вернуло ошибку',//'更新接口返回错误',
'update_request_error':	'Ошибка при обращении к АПИ обновления',//'请求更新接口失败',

//---------------------------
//admin/views/js/common.js
 'twitter_del_sure'	: 'Вы уверены, что хотите удалить данный твит?',//'确定要删除该笔记吗？',
 'comment_del_sure'	: 'Вы уверены, что хотите удалить данный комментарий?',//'确定要删除该评论吗？',
 'comment_ip_del_sure'	: 'Вы уверены, что хотите удалить все комментарии с данного IP?',//'确定要删除来自该IP的所有评论吗？',
 'link_del_sure'	: 'Вы уверены, что хотите удалить данную ссылку?',//'确定要删除该链接吗？',
 'navi_del_sure'	: 'Вы уверены, что хотите удалить данный пункт навигации?',//'确定要删除该导航吗？',
 'attach_del_sure'	: 'Вы уверены, что хотите удалить данный файл?',//'确定要删除该媒体文件吗？',
 'avatar_del_sure'	: 'Вы уверены, что хотите удалить данный аватар?',//'确定要删除头像吗？',
 'category_del_sure'	: 'Вы уверены, что хотите удалить данную категорию?',//'确定要删除该分类吗？',
 'user_del_sure'	: 'Вы уверены, что хотите удалить данного пользователя?',//'确定要删除该用户吗？',
 'template_del_sure'	: 'Вы уверены, что хотите удалить шаблон по умолчанию?',//'确定要删除该模板吗？'
 'plugin_reset_sure'	: 'Вы уверены, что хотите восстановить настройки по умолчанию для данного плагина? При этом все ваши предыдущие настройки будут сброшены!',//'确定要恢复组件设置到初始状态吗？这样会丢失你自定义的组件。',
 'plugin_del_sure'	: 'Вы уверены, что хотите удалить данный plugin?',//'确定要删除该插件吗？',
 'alias_link_error'	: 'Ошибочный алиас ссылки',//'链接别名错误',
 'alias_invalid_chars'	: 'Алиас должен содержать только латинсие буквы, цифры, подчёркивание и минус',//'别名错误，应由字母、数字、下划线、短横线组成',
 'alias_digital'	: 'Алиас не должен состоять из одних только цифр',//'别名错误，不能为纯数字',
 'alias_format_must_be'	: 'Недопустимый алиас. Он не должен содержать "post" или "post-digits"',//'别名错误，不能为"post"或"post-数字"',
 'alias_system_conflict'	: 'Недопустимый алиас (системный конфликт)',//'别名错误，与系统链接冲突',
 'alias_link_error_not_saved'	: 'Неверный алиас ссылки. Не может быть сохранено автоматически.',//'链接别名错误，自动保存失败',
// 'saving'		: 'Saving',//'正在保存',
 'saving'		: 'Сохранение...',//'正在保存中...',
 'saved_ok_time'	: 'Сохранено: ',//'保存于：',
 'save_system_error'	: 'Не удалось сохранить, возможно, статья не может быть отредактирована или исчерпан дневной лимит сообщений',//'保存失败，可能文章不可编辑或达到每日发文限额',
 'too_quick'		: 'Вы выполняете действия слишком быстро!',//'请勿频繁操作！',
 'saving_in'		: '[Сохранение] ',//'[保存中] ',
 'saved_ok'		: '[Успешно сохранено]: ',//'[保存成功] ',
 'save_success'		: 'Успешно сохранено',//'保存成功',

 'save_failed'		: '[Ошибка сохранения]: ',//'[保存失败] ',
 'save_failed!'		: 'Ошибка сохранения!',//'保存失败！',
 'save_failed_prompt'	: 'Не удалось сохранить данные. Сделайте резервную копию содержимого, обновите страницу и повторите попытку!',//'保存失败，请备份内容和刷新页面后重试！',
 'paste_upload'		: 'Вставить загруженный файл ',//'粘贴上传 ',
 'uploading'		: 'Загрузка...',//'上传中...',
 'progress'		: 'Прогресс (байт): ',//'进度(bytes): ',
 'upload_ok_get_result'	: 'Загрузка успешно завершена! Получаю результат...',//'上传成功！正在获取结果...',
 'result_ok'		: 'Результат успешно получен!',//'获取结果成功！',
 'unknown_error'	: 'Непредвиденная ошибка',//'未知错误',
 'upload_failed_error'	: 'Ошибка загрузки. Неверный тип файла или сетевая ошибка',//'上传失败,图片类型错误或网络错误',
 'installing'		: 'Установка...',//'安装中…',
 'install_free'		: 'Установить бесплатно',//'免费安装',
 'get_result_fail'	: 'Сбой получения результата запроса!',//'获取结果失败！',

//----
 'backup_import_sure'	: 'Вы уверены, что хотите импортировать файл резервной копии?',//'你确定要导入该备份文件吗？',
 'page_del_sure'	: 'Вы уверены, что хотите удалить данную страницу?',//'你确定要删除该页面吗？',
 'title_empty'		: 'Заголовок не должен быть пустым',//'标题不能为空',
 'wysiwyg_switch'	: 'Пожалуйста, перейдите в WYSIWYG режим',//'请先切换到所见所得模式',
 'click_view_fullsize'	: 'Кликните для просмотра в полный размер',//'点击查看原图',
 'user_disable_sure'	: 'Вы уверены, что хотите забанить данного пользователя?',//'确定要禁用该用户吗？',
 'article_del_sure'	: 'Вы уверены, что хотите удалить данную статью?',//'确定要删除该篇文章吗？',
 'draft_del_sure'	: 'Вы уверены, что хотите удалить данный черновик? ',//'确定要删除该篇草稿吗？',
 'media_category_del_sure' : 'Вы уверены, что хотите удалить данную категорию (сами медиа-файлы при этом не удаляются)?',//'确定要删除该资源分类吗（不会删除资源文件）？',
 'media_select'		: 'Выберите медиа-файл для перемещения',//'请选择要移动的资源',
 'delete_not_recover'	: 'Удалённые объекты невозможно будет восстановить',//'彻底删除将无法恢复',
 'ok'			: 'OK',//'确定',
 'cancel'		: 'Отмена',//'取消',
 'category_not_deleted'	: 'Файлы ресурсов в данной категории не будут удалены',//'不会删除分类下资源文件',
 'emlog_not_registered'	: 'Ваш Emlog не зарегистрирован',//'您的emlog pro尚未注册',
 'register'		: 'Зарегистрировать',//'去注册',
 'is_latest_version'	: 'Это последняя версия',//'已经是最新版本',
 'update_expired'	: 'Срок действия обновления истек',//'更新服务已到期',
 'log_in_renew'		: 'Войдите на официальный сайт для продления',//'登录官网续期',
 'new_ver_available'	: 'Доступна новая версия ',//'有可用的新版本 ',
 'view_changelog'	: 'Посмотреть изменения',//'更新内容',
 'update_now'		: 'Обновить сейчас',//'现在更新',
 'check_failed'		: 'Проверка не удалась, возможно проблема с доступом в сети',//'检查失败，可能是网络问题',
 'updating_now'		: 'Идёт обновление... подождите пожалуйста',//'更新中... 请耐心等待',
 'updated_ok'		: '🎉Поздравляем! Обновление прошло успешно🎉, <a href="./">обновите страницу</a>, чтобы начать работу с новой версией',//'🎉恭喜，更新成功了🎉，<a href="./">刷新页面</a> 开始体验新版本',
 'update_download_fail'	: 'Не удалось загрузить обновление, возможно, проблема в сети',//'下载更新失败，可能是服务器网络问题',
 'unzip_fail'		: 'Не удалось разархивировать обновление, возможно, ваш сервер не поддерживает модуль zip',//'解压更新失败，可能是你的服务器空间不支持zip模块',
 'update_not_writable'	: 'Ошибка обновления, папка недоступна для записи',//'更新失败，目录不可写',
 'update_fail'		: 'Ошибка обновления',//'更新失败',
 'save_first'		: 'Сначала сохраните страницу, пожалуйста!',//'请先保存页面！',
 'content_empty'	: 'Содержимое страницы не должно быть пустым!',//'页面内容不能为空！',
 'plugin'		: 'Плагин: ',//'插件：',
 'template'		: 'Шаблон: ',//'模板：',
 'buy'			: 'Купить',//'购买',
 'go_store_install'	: 'Установить',//'去商店安装',
 'free'			: 'Бесплатно',//'免费',
 'price'		: 'Цена: ',//'应用售价',
 'article_preview'	: 'Предпросмотр',//'预览文章',

//---------------------------
//include/lib/js/common_tpl.js
 'loading'		: 'Загрузка...',//'加载中...',
 'max_140_bytes'	: '(не более 140 символов)',//'(回复长度需在140个字内)',
 'nickname_empty'	: '(Псевдоним не должен быть пустым)',//'(昵称不能为空)',
 'captcha_error'	: '(Ошибка проверочного кода)',//'(验证码错误)',
 'nickname_disabled'	: '(Данный псевдоним запрещён)',//'(不允许使用该昵称)',
 'nickname_exists'	: '(Данный псевдоним уже существует)',//'(已存在该回复)',
 'comments_disabled'	: '(Комментарии запрещены)',//'(禁止回复)',
 'comment_ok_moderation'	: '(Ваш комментарий успешно сохранён и ожидает проверки модератором.)',//'(回复成功，等待管理员审核)',
 'chinese_must_have'	: 'Текст комментария должен содержать китайские иероглифы!',//'评论内容需要包含中文！',
 'email_invalid'	: 'Неверный формат Email!',//'邮箱格式错误！',
 'url_invalid'		: 'Неверный формат URL!',//'网址格式错误！',
 'toc'			: 'Оглавление',//'目录',

//---------------------------
//admin/views/js/dropzone.min.js
 'drag_message'		: 'Перетащите сюда изображение или кликните для выбора файла',//'拖动文件到这里，或者点击后选择上传',

//---------------------------
//admin/views/js/media-lib.js
'insert_to_article'	: 'Вставить в статью',//'插入文章',
'set_cover'		: 'Установить как обложку',//'设为封面',
'file_size'		: 'Размер файла: ',//'文件大小：',
'del_media_sure'	: 'Вы уверены, что хотите удалить этот файл?',//'确定要删除该资源吗？',
'delete'		: 'Удалить',//'删除',

//----------------
// The LAST key. DO NOT EDIT!!!
  '@' : '@'
};
