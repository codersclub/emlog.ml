<?php

/**
 * setting
 * @package EMLOG
 * @link https://www.emlog.net
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once 'globals.php';

if (empty($action)) {
    $options_cache = $CACHE->readCache('options');
    extract($options_cache);

    $conf_comment_code = $comment_code == 'y' ? 'checked="checked"' : '';
    $conf_iscomment = $iscomment == 'y' ? 'checked="checked"' : '';
    $conf_login_comment = $login_comment == 'y' ? 'checked="checked"' : '';
    $conf_ischkcomment = $ischkcomment == 'y' ? 'checked="checked"' : '';
    $conf_isthumbnail = $isthumbnail == 'y' ? 'checked="checked"' : '';
    $conf_comment_paging = $comment_paging == 'y' ? 'checked="checked"' : '';
    $conf_detect_url = $detect_url == 'y' ? 'checked="checked"' : '';

    $ex1 = $ex2 = $ex3 = $ex4 = '';
    if ($rss_output_fulltext == 'y') {
        $ex1 = 'selected="selected"';
    } else {
        $ex2 = 'selected="selected"';
    }
    if ($comment_order == 'newer') {
        $ex3 = 'selected="selected"';
    } else {
        $ex4 = 'selected="selected"';
    }

    include EMLOG_ROOT . '/lang/' . LANG . '/lang_tz.php'; // Load Time Zone List
    include View::getAdmView('header');
    require_once(View::getAdmView('setting'));
    include View::getAdmView('footer');
    View::output();
}

if ($action == 'save') {
    LoginAuth::checkToken();
    $getData = [
        'blogname'            => Input::postStrVar('blogname'),
        'blogurl'             => Input::postStrVar('blogurl'),
        'bloginfo'            => Input::postStrVar('bloginfo'),
        'icp'                 => Input::postStrVar('icp'),
        'footer_info'         => Input::postStrVar('footer_info'),
        'index_lognum'        => Input::postIntVar('index_lognum'),
        'timezone'            => Input::postStrVar('timezone'),
        'comment_code'        => Input::postStrVar('comment_code', 'n'),
        'comment_interval'    => Input::postIntVar('comment_interval', 15),
        'iscomment'           => Input::postStrVar('iscomment', 'n'),
        'login_comment'       => Input::postStrVar('login_comment', 'n'),
        'ischkcomment'        => Input::postStrVar('ischkcomment', 'n'),
        'isthumbnail'         => Input::postStrVar('isthumbnail', 'n'),
        'rss_output_num'      => Input::postIntVar('rss_output_num', 10),
        'rss_output_fulltext' => Input::postStrVar('rss_output_fulltext', 'y'),
        'comment_paging'      => Input::postStrVar('comment_paging', 'n'),
        'comment_pnum'        => Input::postIntVar('comment_pnum'),
        'comment_order'       => Input::postStrVar('comment_order', 'newer'),
        'att_imgmaxw'         => Input::postIntVar('att_imgmaxw', 420),
        'att_imgmaxh'         => Input::postIntVar('att_imgmaxh', 460),
        'detect_url'          => Input::postStrVar('detect_url', 'n'),
        'panel_menu_title'    => Input::postStrVar('panel_menu_title'),
    ];

    if ($getData['comment_code'] == 'y' && !checkGDSupport()) {
        Output::error(lang('verification_code_comment_not_supported'));
    }

    if ($getData['blogurl'] && substr($getData['blogurl'], -1) != '/') {
        $getData['blogurl'] .= '/';
    }
    if ($getData['blogurl'] && strncasecmp($getData['blogurl'], 'http', 4)) {
        $getData['blogurl'] = 'http://' . $getData['blogurl'];
    }

    foreach ($getData as $key => $val) {
        Option::updateOption($key, $val);
    }
    $CACHE->updateCache(array('tags', 'options', 'comment', 'record'));
    Output::ok();
}

if ($action == 'seo') {
    $options_cache = $CACHE->readCache('options');
    extract($options_cache);

    $ex0 = $ex1 = $ex2 = $ex3 = '';
    $t = 'ex' . $isurlrewrite;
    $$t = 'checked="checked"';

    $opt0 = $opt1 = $opt2 = '';
    $t = 'opt' . $log_title_style;
    $$t = 'selected="selected"';

    $isalias = $isalias == 'y' ? 'checked="checked"' : '';
    $isalias_html = $isalias_html == 'y' ? 'checked="checked"' : '';

    include View::getAdmView('header');
    require_once(View::getAdmView('setting_seo'));
    include View::getAdmView('footer');
    View::output();
}

if ($action == 'seo_save') {
    LoginAuth::checkToken();

    $permalink = Input::postStrVar('permalink', '0');
    $isalias = Input::postStrVar('isalias', 'n');
    $isalias_html = Input::postStrVar('isalias_html', 'n');

    $getData = [
        'site_title'       => Input::postStrVar('site_title', ''),
        'site_description' => Input::postStrVar('site_description', ''),
        'site_key'         => Input::postStrVar('site_key', ''),
        'isurlrewrite'     => Input::postStrVar('permalink', '0'),
        'isalias'          => Input::postStrVar('isalias', 'n'),
        'isalias_html'     => Input::postStrVar('isalias_html', 'n'),
        'log_title_style'  => Input::postStrVar('log_title_style', '0'),
    ];

    if ($permalink != '0' || $isalias == 'y') {
        $t = parse_url(BLOG_URL);
        $rw_rule = '<IfModule mod_rewrite.c>
                       RewriteEngine on
                       RewriteCond %{REQUEST_FILENAME} !-f
                       RewriteCond %{REQUEST_FILENAME} !-d
                       RewriteBase ' . $t['path'] . '
                       RewriteRule . ' . $t['path'] . 'index.php [L]
                    </IfModule>';
        if (!file_put_contents(EMLOG_ROOT . '/.htaccess', $rw_rule)) {
            Output::error(lang('htaccess_not_writable'));
        }
    }

    foreach ($getData as $key => $val) {
        Option::updateOption($key, $val);
    }
    $CACHE->updateCache(array('options', 'navi'));
    Output::ok();
}

if ($action == 'mail') {
    $options_cache = $CACHE->readCache('options');
    $smtp_mail = isset($options_cache['smtp_mail']) ? $options_cache['smtp_mail'] : '';
    $smtp_pw = isset($options_cache['smtp_pw']) ? $options_cache['smtp_pw'] : '';
    $smtp_from_name = isset($options_cache['smtp_from_name']) ? $options_cache['smtp_from_name'] : '';
    $smtp_server = isset($options_cache['smtp_server']) ? $options_cache['smtp_server'] : '';
    $smtp_port = isset($options_cache['smtp_port']) ? $options_cache['smtp_port'] : '';
    $mail_notice_comment = isset($options_cache['mail_notice_comment']) ? $options_cache['mail_notice_comment'] : '';
    $mail_notice_post = isset($options_cache['mail_notice_post']) ? $options_cache['mail_notice_post'] : '';
    $mail_template = isset($options_cache['mail_template']) ? $options_cache['mail_template'] : '';

    $conf_mail_notice_comment = $mail_notice_comment == 'y' ? 'checked="checked"' : '';
    $conf_mail_notice_post = $mail_notice_post == 'y' ? 'checked="checked"' : '';

    include View::getAdmView('header');
    require_once(View::getAdmView('setting_mail'));
    include View::getAdmView('footer');
    View::output();
}

if ($action == 'mail_save') {
    LoginAuth::checkToken();
    $data = [
        'smtp_mail'           => Input::postStrVar('smtp_mail'),
        'smtp_pw'             => Input::postStrVar('smtp_pw'),
        'smtp_from_name'      => Input::postStrVar('smtp_from_name'),
        'smtp_server'         => Input::postStrVar('smtp_server'),
        'smtp_port'           => Input::postStrVar('smtp_port'),
        'mail_notice_comment' => Input::postStrVar('mail_notice_comment', 'n'),
        'mail_notice_post'    => Input::postStrVar('mail_notice_post', 'n'),
        'mail_template'       => Input::postStrVar('mail_template'),
    ];

    foreach ($data as $key => $val) {
        Option::updateOption($key, $val);
    }

    $CACHE->updateCache(array('options'));
    Output::ok();
}

if ($action == 'mail_test') {
    $data = [
        'smtp_mail'      => isset($_POST['smtp_mail']) ? addslashes($_POST['smtp_mail']) : '',
        'smtp_pw'        => isset($_POST['smtp_pw']) ? addslashes($_POST['smtp_pw']) : '',
        'smtp_from_name' => isset($_POST['smtp_from_name']) ? addslashes($_POST['smtp_from_name']) : '',
        'smtp_server'    => isset($_POST['smtp_server']) ? addslashes($_POST['smtp_server']) : '',
        'smtp_port'      => isset($_POST['smtp_port']) ? (int)$_POST['smtp_port'] : '',
        'testTo'         => isset($_POST['testTo']) ? $_POST['testTo'] : '',
    ];

    if (!checkMail($data['testTo'])) {
        exit("<small class='text-info'>" . lang('email_enter_please') . "</small>");
    }

    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = $data['smtp_port'] == '587' ? 'STARTTLS' : 'ssl';
    $mail->Port = $data['smtp_port'];
    $mail->Host = $data['smtp_server'];
    $mail->Username = $data['smtp_mail'];
    $mail->Password = $data['smtp_pw'];
    $mail->From = $data['smtp_mail'];
    $mail->FromName = $data['smtp_from_name'];
    $mail->AddAddress($data['testTo']);
    $mail->Subject = lang('test_mail_subj');
    $mail->isHTML();
    $mail->Body = Notice::getMailTemplate(lang('test_mail_body'));

    try {
        return $mail->Send();
    } catch (Exception $exc) {
        exit("<small class='text-danger'>" . lang('test_mail_failed') . "</small>");
    }
}

if ($action == 'user') {
    $options_cache = $CACHE->readCache('options');
    $is_signup = isset($options_cache['is_signup']) ? $options_cache['is_signup'] : '';
    $login_code = isset($options_cache['login_code']) ? $options_cache['login_code'] : '';
    $ischkarticle = isset($options_cache['ischkarticle']) ? $options_cache['ischkarticle'] : '';
    $article_uneditable = isset($options_cache['article_uneditable']) ? $options_cache['article_uneditable'] : '';
    $forbid_user_upload = isset($options_cache['forbid_user_upload']) ? $options_cache['forbid_user_upload'] : '';
    $posts_per_day = isset($options_cache['posts_per_day']) ? $options_cache['posts_per_day'] : '';
    $posts_name = isset($options_cache['posts_name']) ? $options_cache['posts_name'] : '';
    $email_code = isset($options_cache['email_code']) ? $options_cache['email_code'] : '';
    $att_maxsize = isset($options_cache['att_maxsize']) ? $options_cache['att_maxsize'] : '';
    $att_type = isset($options_cache['att_type']) ? $options_cache['att_type'] : '';

    $conf_is_signup = $is_signup == 'y' ? 'checked="checked"' : '';
    $conf_login_code = $login_code == 'y' ? 'checked="checked"' : '';
    $conf_email_code = $email_code == 'y' ? 'checked="checked"' : '';
    $conf_ischkarticle = $ischkarticle == 'y' ? 'checked="checked"' : '';
    $conf_forbid_user_upload = $forbid_user_upload == 'y' ? 'checked="checked"' : '';
    $conf_article_uneditable = $article_uneditable == 'y' ? 'checked="checked"' : '';

    include View::getAdmView('header');
    require_once(View::getAdmView('setting_user'));
    include View::getAdmView('footer');
    View::output();
}

if ($action == 'user_save') {
    LoginAuth::checkToken();
    $data = [
        'is_signup'          => Input::postStrVar('is_signup', 'n'),
        'login_code'         => Input::postStrVar('login_code', 'n'),
        'email_code'         => Input::postStrVar('email_code', 'n'),
        'ischkarticle'       => Input::postStrVar('ischkarticle', 'n'),
        'article_uneditable' => Input::postStrVar('article_uneditable', 'n'),
        'forbid_user_upload' => Input::postStrVar('forbid_user_upload', 'n'),
        'posts_per_day'      => Input::postIntVar('posts_per_day', 0),
//vot        'posts_name'         => Input::postStrVar('posts_name'),
        'att_maxsize'        => Input::postIntVar('att_maxsize'),
        'att_type'           => str_replace('php', 'x', strtolower(Input::postStrVar('att_type', ''))),
    ];

    if ($data['login_code'] == 'y' && !checkGDSupport()) {
        Output::error(lang('verification_code_not_supported'));
    }

    foreach ($data as $key => $val) {
        Option::updateOption($key, $val);
    }

    $CACHE->updateCache('options');
    Output::ok();
}

if ($action == 'api') {
    $apikey = Option::get('apikey');
    $is_openapi = Option::get('is_openapi');
    $conf_is_openapi = $is_openapi == 'y' ? 'checked="checked"' : '';

    include View::getAdmView('header');
    require_once(View::getAdmView('setting_api'));
    include View::getAdmView('footer');
    View::output();
}

if ($action == 'api_save') {
    LoginAuth::checkToken();

    $isOpenapiEnabled = Input::postStrVar('is_openapi', 'n');
    Option::updateOption('is_openapi', $isOpenapiEnabled);
    $CACHE->updateCache('options');
    Output::ok();
}

if ($action == 'api_reset') {
    LoginAuth::checkToken();

    $apikey = md5(getRandStr(32));

    Option::updateOption('apikey', $apikey);
    $CACHE->updateCache('options');
    header('Location: ./setting.php?action=api&ok_reset=1');
}

if ($action == 'ai') {
    $aiModel = AI::model();
    $aiModels = AI::models();
    $currentModelKey = Option::get('ai_model');

    include View::getAdmView('header');
    require_once(View::getAdmView('setting_ai'));
    include View::getAdmView('footer');
    View::output();
}

if ($action == 'ai_save') {
    LoginAuth::checkToken();

    $aiApiUrl = Input::postStrVar('ai_api_url');
    $aiApiKey = Input::postStrVar('ai_api_key');
    $aiModel = Input::postStrVar('ai_model');

    $aiModels = AI::models();
    $key = md5($aiModel . $aiApiUrl);
    $aiModels[$key] = [
        'api_url' => $aiApiUrl,
        'api_key' => $aiApiKey,
        'model' => $aiModel,
    ];

    Option::updateOption('ai_models', json_encode($aiModels));

    // If there is only one model available, set it as the current model
    if (count($aiModels) == 1) {
        Option::updateOption('ai_model', $key);
    }

    $CACHE->updateCache('options');
    emDirect("./setting.php?action=ai");
}

if ($action == 'ai_model') {
    $aiModelKey = Input::getStrVar('ai_model_key');
    if (empty($aiModelKey)) {
        emDirect("./setting.php?action=ai");
    }

    Option::updateOption('ai_model', $aiModelKey);
    $CACHE->updateCache('options');
    emDirect("./setting.php?action=ai");
}

if ($action == 'delete_model') {
    $aiModelKey = Input::getStrVar('ai_model_key');
    $aiModels = AI::models();
    $currentAiModelKey = AI::model();
    if (is_array($aiModels) && isset($aiModels[$aiModelKey])) {
        unset($aiModels[$aiModelKey]);
        Option::updateOption('ai_models', json_encode($aiModels));
        if ($currentAiModel == $aiModelKey) {
            Option::updateOption('ai_model', '');
        }
        $CACHE->updateCache('options');
        emDirect("./setting.php?action=ai");
    } else {
        emDirect("./setting.php?action=ai");
    }
}

if ($action == 'ai_update') {
    LoginAuth::checkToken();

    $aiModelKey = Input::postStrVar('ai_model_key');
    $aiModel = Input::postStrVar('edit_ai_model');

    $aiModels = AI::models();
    if (!isset($aiModels[$aiModelKey])) {
        emDirect("./setting.php?action=ai");
    }
    $aiModels[$aiModelKey]['model'] = $aiModel;

    Option::updateOption('ai_models', json_encode($aiModels));
    $CACHE->updateCache('options');
    emDirect("./setting.php?action=ai");
}
