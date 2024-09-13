<?php

/**
 * templates
 * @package EMLOG
 * @link https://www.emlog.net
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once 'globals.php';

$Template_Model = new Template_Model();

if ($action === '') {
    $nonce_template = Option::get('nonce_templet');
    $nonce_template_data = @file(TPLS_PATH . $nonce_template . '/header.php');

    $templates = $Template_Model->getTemplates();

    include View::getAdmView('header');
    require_once View::getAdmView('template');
    include View::getAdmView('footer');
    View::output();
}

if ($action === 'use') {
    LoginAuth::checkToken();
    $tplName = isset($_GET['tpl']) ? addslashes($_GET['tpl']) : '';

    Option::updateOption('nonce_templet', $tplName);
    $CACHE->updateCache('options');
    $Template_Model->initCallback($tplName);

    emDirect("./template.php?activated=1");
}

if ($action === 'del') {
    LoginAuth::checkToken();
    $tplName = isset($_GET['tpl']) ? addslashes($_GET['tpl']) : '';

    $nonce_templet = Option::get('nonce_templet');
    if ($tplName === $nonce_templet) {
        emMsg(lang('template_used'));
    }

    $Template_Model->rmCallback($tplName);

    $path = preg_replace("/^([\w-]+)$/i", "$1", $tplName);
    if ($path && true === emDeleteFile(TPLS_PATH . $path)) {
        emDirect("./template.php?activate_del=1#tpllib");
    } else {
        emDirect("./template.php?error_f=1#tpllib");
    }
}

if ($action === 'install') {
    include View::getAdmView('header');
    require_once View::getAdmView('template_install');
    include View::getAdmView('footer');
    View::output();
}

if ($action === 'upload_zip') {
    if (defined('APP_UPLOAD_FORBID') && APP_UPLOAD_FORBID === true) {
        emMsg(lang('apps_forbid'));
    }
    LoginAuth::checkToken();
    $zipfile = isset($_FILES['tplzip']) ? $_FILES['tplzip'] : '';

    if ($zipfile['error'] == 4) {
        emDirect("./template.php?error_d=1");
    }
    if ($zipfile['error'] == 1) {
        emDirect("./template.php?error_f=1");
    }
    if (!$zipfile || $zipfile['error'] > 0 || empty($zipfile['tmp_name'])) {
/*vot*/        emMsg('template_upload_failed') . $zipfile['error'];
    }
    if (getFileSuffix($zipfile['name']) != 'zip') {
        emDirect("./template.php?error_a=1");
    }

    $ret = emUnZip($zipfile['tmp_name'], '../content/templates/', 'tpl');
    switch ($ret) {
        case 0:
            emDirect("./template.php?activate_install=1");
            break;
        case -2:
            emDirect("./template.php?error_e=1");
            break;
        case 1:
        case 2:
            emDirect("./template.php?error_b=1");
            break;
        case 3:
            emDirect("./template.php?error_c=1");
            break;
    }
}

if ($action === 'check_update') {
    $templates = isset($_POST['templates']) ? $_POST['templates'] : [];

    $emcurl = new EmCurl();
    $post_data = [
        'emkey' => Option::get('emkey'),
        'apps'  => json_encode($templates),
    ];
    $emcurl->setPost($post_data);
    $emcurl->request('https://store.emlog.net/template/upgrade');
    $retStatus = $emcurl->getHttpStatus();
    if ($retStatus !== MSGCODE_SUCCESS) {
/*vot*/        Output::error(lang('update_failed_network'));
    }
    $response = $emcurl->getRespone();
    $ret = json_decode($response, JSON_UNESCAPED_UNICODE);
    if (empty($ret)) {
/*vot*/        Output::error(lang('update_failed_network'));
    }
    if ($ret['code'] === MSGCODE_EMKEY_INVALID) {
/*vot*/        Output::error(lang('pro_unregistered'));
    }

    Output::ok($ret['data']);
}

if ($action === 'upgrade') {
    $alias = isset($_GET['alias']) ? trim($_GET['alias']) : '';

    if (!Register::isRegLocal()) {
        emDirect("./template.php?error_i=1");
    }

    $temp_file = emFetchFile('https://www.emlog.net/template/down/' . $alias);
    if (!$temp_file) {
        emDirect("./template.php?error_h=1");
    }
    $unzip_path = '../content/templates/';
    $ret = emUnZip($temp_file, $unzip_path, 'tpl');
    @unlink($temp_file);
    switch ($ret) {
        case 0:
            $Template_Model->upCallback($alias);
            emDirect("./template.php?activate_upgrade=1");
            break;
        case 1:
        case 2:
            emDirect("./template.php?error_b=1");
            break;
        case 3:
            emDirect("./template.php?error_d=1");
            break;
        default:
            emDirect("./template.php?error_e=1");
    }
}
