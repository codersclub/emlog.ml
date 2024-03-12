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

/*vot*/    $categories = [
        0  => lang('search_by_category'),
        8  => lang('tpl_category_8'),
        7  => lang('tpl_category_7'),
        9  => lang('tpl_category_9'),
        17 => lang('tpl_category_17'),
        19 => lang('tpl_category_19'),
        10 => lang('tpl_category_10'),
    ];

    $r = $Store_Model->getTemplates($tag, $keyword, $page, $author_id, $sid);
    $templates = $r['templates'];
    $count = $r['count'];
    $page_count = $r['page_count'];

/*vot*/ $sub_title = lang('templates');
    if ($tag === 'free') {
/*vot*/ $sub_title = lang('free_template');
    } elseif ($tag === 'paid') {
/*vot*/ $sub_title = lang('paid_template');
    } elseif ($tag === 'promo') {
        $sub_title = lang('limited_offer');
    } elseif ($tag === 'free_top') {
        $sub_title = lang('rank_free');
    } elseif ($tag === 'paid_top') {
        $sub_title = lang('rank_paid');
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

/*vot*/    $categories = [
        0  => lang('search_by_category'),
        1  => lang('plu_category_1'),
        2  => lang('plu_category_2'),
        18 => lang('plu_category_18'),
        3  => lang('plu_category_3'),
        4  => lang('plu_category_4'),
        5  => lang('plu_category_5'),
        11 => lang('plu_category_11'),
        12 => lang('plu_category_12'),
        14 => lang('plu_category_14'),
        13 => lang('plu_category_13'),
        15 => lang('plu_category_15'),
        20 => lang('plu_category_20'),
        6  => lang('plu_category_6')

    ];

    $r = $Store_Model->getPlugins($tag, $keyword, $page, $author_id, $sid);
    $plugins = $r['plugins'];
    $count = $r['count'];
    $page_count = $r['page_count'];

/*vot*/ $sub_title = lang('plugins');
    if ($tag === 'free') {
/*vot*/ $sub_title = lang('free_plugin');
    } elseif ($tag === 'paid') {
/*vot*/ $sub_title = lang('paid_plugin');
    } elseif ($tag === 'promo') {
        $sub_title = lang('limited_offer');
    } elseif ($tag === 'free_top') {
        $sub_title = lang('rank_free');
    } elseif ($tag === 'paid_top') {
        $sub_title = lang('rank_paid');
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
/*vot*/ $sub_title = lang('my_apps');

    include View::getAdmView('header');
    require_once(View::getAdmView('store_mine'));
    include View::getAdmView('footer');
    View::output();
}

if ($action === 'svip') {
    $addons = $Store_Model->getSvipAddon();
/*vot*/ $sub_title = lang('svip');

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
    $source = isset($_GET['source']) ? trim($_GET['source']) : ''; // plugin/down/11
    $source_type = isset($_GET['type']) ? trim($_GET['type']) : '';

    if (empty($source)) {
/*vot*/ exit(lang('install_failed'));
    }

    $temp_file = emFetchFile('https://www.emlog.net/' . $source);
    if (!$temp_file) {
        if (false === Register::verifyDownload($source)) {
            exit(lang('emlog_unregistered') . ', <a href="auth.php">' . lang('go_to_register') . '</a>');
        }
        exit(lang('install_failed_download'));
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
