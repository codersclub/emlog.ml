<?php
/*
 * Author: Vaimibao-Xiyan XY
 * Description: Template options plug-in AJAX processing.
*/

require_once '../../../../init.php';

if (!User::isAdmin()) {
    echo lang('no_permission');
    exit;
}

//Handle AJAX actions
$action = Input::postStrVar('action', '');
if (!isset($action)) {
    echo lang('failed_refresh');
    exit;
}

//Handle AJAX incoming values
$_s_type = '';
$s_key = Input::postStrVar('kywd', '');
$s_key = htmlspecialchars($s_key) ?: '';
$name = Input::postStrVar('name', '');
$type = Input::postStrVar('type', '');

//Handle exceptions in template options plug-in files
$type_arr = [
/*vot*/ 'post' => lang('article'),
/*vot*/ 'cate' => lang('category'),
/*vot*/ 'page' => lang('page'),
];

/*vot*/ $exit_tip = '<li class="no-results">' . lang('plugin_invalid') . '</li>';
$is_type_exists = array_key_exists(trim($type), $type_arr);

if (!$is_type_exists) {
    echo $exit_tip;
    exit;
}
$_s_type = $type_arr[$type];

//Handle AJAX requests
if ($action === 'tpl_select_search') {
    if (empty(trim($s_key))) {
/*vot*/ echo '<li class="no-results">' . lang('please_enter') . $_s_type . lang('title_keywords') . '</li>';
        exit;
    }
    switch ($type) {
        case 'post':
        case 'page':
        {
            if (strstr($s_key, "'")) {
                $sqlSegment = 'and title like "%{$s_key}%" order by date desc';
            } else {
                $sqlSegment = "and title like '%{$s_key}%' order by date desc";
            }
            $html = '';
            $_this_sql_type = $type == 'post' ? 'blog' : 'page';
            $now = time();
            $DB = Database::getInstance();
            $sql = "SELECT gid,title,date FROM " . DB_PREFIX . "blog WHERE type='$_this_sql_type' and hide='n' and checked='y' and date<= $now $sqlSegment";
            $res = $DB->query($sql);
            if (mysqli_num_rows($res)) {
                while ($row = $DB->fetch_array($res)) {
                    $_title = htmlspecialchars(trim($row['title']));
                    $html .= '<li class="active-result" data-opt="' . $type . '" data-id="' . $row['gid'] . '" data-s-name="' . $name . '">' . $_title . '</li>';
                }
                echo $html;
                exit;
            } else {
/*vot*/         echo '<li class="no-results">' . lang('no_results_of') . $_s_type . '</li>';
                exit;
            }
        }
        case 'cate':
        {
            $sorts = Cache::getInstance()->readCache('sort');
            $html = '';
            foreach ($sorts as $sort) {
                if (strpos($sort['sortname'], $s_key) !== false) {
                    $html .= '<li class="active-result" data-opt="' . $type . '" data-id="' . $sort['sid'] . '" data-s-name="' . $name . '">' . $sort['sortname'] . '</li>';
                }
            }
/*vot*/     echo $html ?: '<li class="no-results">' . lang('no_results_of') . $_s_type . '</li>';
            exit;
        }
    }
}