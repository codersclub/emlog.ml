<?php
/**
 * store
 * @package EMLOG
 * @link https://www.emlog.net
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once 'globals.php';

$Store_Model = new Store_Model();

if (empty($action)) {
    $tag = Input::getStrVar('tag');
    $page = Input::getIntVar('page', 1);
    $keyword = Input::getStrVar('keyword');
    $author_id = Input::getStrVar('author_id');
    $sid = Input::getStrVar('sid');

    $categories = [
        0  => '选择模板分类',
        8  => '博客自媒体',
        7  => '资源下载',
        9  => '社区论坛',
        10 => '其他',
    ];

    $r = $Store_Model->getTemplates($tag, $keyword, $page, $author_id, $sid);
    $templates = $r['templates'];
    $count = $r['count'];
    $page_count = $r['page_count'];

/*vot*/    $sub_title = lang('template');
    if ($tag === 'free') {
/*vot*/        $sub_title = lang('free_template');
    } elseif ($tag === 'paid') {
/*vot*/        $sub_title = lang('paid_template');
    }

    $subPage = '';
    foreach ($_GET as $key => $val) {
        $subPage .= $key != 'page' ? "&$key=$val" : '';
    }

    $pageurl = pagination($count, $page_count, $page, "store.php?{$subPage}&page=");

    include View::getAdmView('header');
    require_once(View::getAdmView('store_tpl'));
    include View::getAdmView('footer');
    View::output();
}

if ($action === 'plu') {
    $tag = Input::getStrVar('tag');
    $page = Input::getIntVar('page', 1);
    $keyword = Input::getStrVar('keyword');
    $author_id = Input::getIntVar('author_id');
    $sid = Input::getIntVar('sid');

    $categories = [
        0  => '选择插件分类',
        1  => '资源下载',
        2  => 'SEO优化',
        3  => '多媒体',
        4  => '装饰特效',
        5  => '文件存储',
        11 => '用户互动',
        12 => '内容运营',
        13 => '移动端',
        14 => '编程开发',
        15 => '内容创作',
        6  => '其他'
    ];

    $r = $Store_Model->getPlugins($tag, $keyword, $page, $author_id, $sid);
    $plugins = $r['plugins'];
    $count = $r['count'];
    $page_count = $r['page_count'];

/*vot*/    $sub_title = lang('plugin');
    if ($tag === 'free') {
/*vot*/        $sub_title = lang('free_plugin');
    } elseif ($tag === 'paid') {
/*vot*/        $sub_title = lang('paid_plugin');
    }

    $subPage = '';
    foreach ($_GET as $key => $val) {
        $subPage .= $key != 'page' ? "&$key=$val" : '';
    }
    $pageurl = pagination($count, $page_count, $page, "store.php?{$subPage}&page=");

    include View::getAdmView('header');
    require_once(View::getAdmView('store_plu'));
    include View::getAdmView('footer');
    View::output();
}

if ($action === 'mine') {
    $addons = $Store_Model->getMyAddon();
/*vot*/    $sub_title = lang('my_apps');

    include View::getAdmView('header');
    require_once(View::getAdmView('store_mine'));
    include View::getAdmView('footer');
    View::output();
}

if ($action === 'svip') {
    $addons = $Store_Model->getSvipAddon();
/*vot*/    $sub_title = lang('svip');

    include View::getAdmView('header');
    require_once(View::getAdmView('store_svip'));
    include View::getAdmView('footer');
    View::output();
}

if ($action === 'top') {
    $addons = $Store_Model->getTopAddon();
    output::ok($addons);
}

if ($action === 'error') {
    $keyword = '';
    $sub_title = '';

    include View::getAdmView('header');
    require_once(View::getAdmView('store_tpl'));
    include View::getAdmView('footer');
    View::output();
}

if ($action === 'install') {
    $source = isset($_GET['source']) ? trim($_GET['source']) : '';
    $source_type = isset($_GET['type']) ? trim($_GET['type']) : '';

    if (!Register::isRegLocal()) {
/*vot*/        exit(lang('emlog_unregistered') . ', <a href="auth.php">' . lang('go_to_register') . '</a>');
    }

    if (empty($source)) {
/*vot*/        exit(lang('install_failed'));
    }

    $temp_file = emFetchFile('https://www.emlog.net/' . $source);
    if (!$temp_file) {
/*vot*/        exit(lang('install_failed_download'));
    }

    if ($source_type == 'tpl') {
        $unzip_path = '../content/templates/';
        $store_path = './store.php?';
        $suc_url = 'template.php';
    } else {
        $unzip_path = '../content/plugins/';
        $store_path = './store.php?action=plu&';
        $suc_url = 'plugin.php';
    }

    $ret = emUnZip($temp_file, $unzip_path, $source_type);
    @unlink($temp_file);
    switch ($ret) {
        case 0:
/*vot*/            exit(lang('install_ok') . ' <a href="' . $suc_url . '">' . lang('go_check') . '</a>');
        case 1:
        case 2:
/*vot*/            exit(lang('install_failed_permission'));
        case 3:
/*vot*/            exit(lang('install_failed_zip'));
        default:
/*vot*/            exit(lang('install_invalid_ext'));
    }
}
