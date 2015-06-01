<?php
/**
 * Widgets sidebar Management
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';

//DEBUG
//echo '<pre>';
//echo 'widgets.php:', "\n";
//echo '    LANGUAGE=';
//print_r($LANGUAGE);
//echo '    LANGLIST=';
//print_r($LANGLIST);
//echo '</pre>';

//Display widget management panel
if ($action == '') {
    $wgNum = isset($_GET['wg']) ? intval($_GET['wg']) : 1;
    $widgets = Option::get('widgets'.$wgNum);
    $widgetTitle = Option::get('widget_title');
    $custom_widget = Option::get('custom_widget');
    $widgetTitle = array_map('htmlspecialchars', $widgetTitle);
    $tpl_sidenum = Option::get('tpl_sidenum');

    foreach ($custom_widget as $key => $val) {
        $custom_widget[$key] = array_map('htmlspecialchars', $val);
    }

    $customWgTitle = array();
    foreach ($widgetTitle as $key => $val) {
        if (preg_match("/^.*\s\((.*)\)/", $val, $matchs)) {
            $customWgTitle[$key] = $matchs[1];
        } else {
            $customWgTitle[$key] = $val;
        }
    }

    include View::getView('header');
    require_once View::getView('widgets');
    include View::getView('footer');
    View::output();
}

//Modify the widget settings
if ($action == 'setwg') {
/*vot*/    $widgetTitle = Option::get('widget_title'); //Widget Title
/*vot*/    $widget = isset($_GET['wg']) ? $_GET['wg'] : '';    //Edit widget
/*vot*/    $wgTitle = isset($_POST['title']) ? $_POST['title'] : '';	//New widget name

    preg_match("/^(.*)\s\(.*/", $widgetTitle[$widget], $matchs);
    $realWgTitle = isset($matchs[1]) ? $matchs[1] : $widgetTitle[$widget];

    $widgetTitle[$widget] = $realWgTitle != $wgTitle ? $realWgTitle.' ('.$wgTitle.')' : $realWgTitle;
    $widgetTitle = addslashes(serialize($widgetTitle));

    Option::updateOption('widget_title', $widgetTitle);

    switch ($widget) {
        case 'newcomm':
            $index_comnum = isset($_POST['index_comnum']) ? intval($_POST['index_comnum']) : 10;
            $comment_subnum = isset($_POST['comment_subnum']) ? intval($_POST['comment_subnum']) : 20;
            Option::updateOption('index_comnum', $index_comnum);
            Option::updateOption('comment_subnum', $comment_subnum);
            $CACHE->updateCache('comment');
            break;
        case 'newlog':
            $index_newlog = isset($_POST['index_newlog']) ? intval($_POST['index_newlog']) : 5;
            Option::updateOption('index_newlognum', $index_newlog);
            $CACHE->updateCache('newlog');
            break;
        case 'hotlog':
            $index_hotlognum = isset($_POST['index_hotlognum']) ? intval($_POST['index_hotlognum']) : 5;
            Option::updateOption('index_hotlognum', $index_hotlognum);
            break;
        case 'custom_text':
            $custom_widget = Option::get('custom_widget');
            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $content = isset($_POST['content']) ? $_POST['content'] : '';
/*vot*/     $custom_wg_id = isset($_POST['custom_wg_id']) ? $_POST['custom_wg_id'] : '';//Edit widget id
            $new_title = isset($_POST['new_title']) ? $_POST['new_title'] : '';
            $new_content = isset($_POST['new_content']) ? $_POST['new_content'] : '';
/*vot*/     $rmwg = isset($_GET['rmwg']) ? addslashes($_GET['rmwg']) : '';//Delete widget id
            //Add a new custom widget
            if ($new_content) {
                //Determine the widget index
                $i = 0;
                $maxKey = 0;
                if (is_array($custom_widget)) {
                    foreach ($custom_widget as $key => $val) {
                        preg_match("/^custom_wg_(\d+)/", $key, $matches);
                        $k = $matches[1];
                        if ($k > $i) {
                            $maxKey = $k;
                        }
                        $i = $k;
                    }
                }
                $custom_wg_index = $maxKey + 1;
                $custom_wg_index = 'custom_wg_'.$custom_wg_index;
                $custom_widget[$custom_wg_index] = array('title'=>$new_title,'content'=>$new_content);
                $custom_widget_str = addslashes(serialize($custom_widget));
                Option::updateOption('custom_widget', $custom_widget_str);
            } elseif ($content) {
                $custom_widget[$custom_wg_id] = array('title'=>$title,'content'=>$content);
                $custom_widget_str = addslashes(serialize($custom_widget));
                Option::updateOption('custom_widget', $custom_widget_str);
            } elseif ($rmwg) {
                for ($i=1; $i<5; $i++) {
                    $widgets = Option::get('widgets'.$i);
                    if (is_array($widgets) && !empty($widgets)) {
                        foreach ($widgets as $key => $val) {
                            if ($val == $rmwg) {
                                unset($widgets[$key]);
                            }
                        }
                        $widgets_str = addslashes(serialize($widgets));
                        Option::updateOption("widgets$i", $widgets_str);
                    }
                }
                unset($custom_widget[$rmwg]);
                $custom_widget_str = addslashes(serialize($custom_widget));
                Option::updateOption('custom_widget', $custom_widget_str);
            }
            break;
    }
    $CACHE->updateCache('options');
    emDirect("./widgets.php?activated=1");
}

//Save component to sort
if ($action == 'compages') {
/*vot*/    $wgNum = isset($_POST['wgnum']) ? intval($_POST['wgnum']) : 1;//Sidebar No. 1,2,3 ...
    $widgets = isset($_POST['widgets']) ? serialize($_POST['widgets']) : '';
    Option::updateOption("widgets{$wgNum}", $widgets);
    $CACHE->updateCache('options');
    emDirect("./widgets.php?activated=true&wg=$wgNum");
}

//Reset Widget settings to the initial values
if ($action == 'reset') {
    LoginAuth::checkToken();
    $widget_title = serialize(Option::getWidgetTitle());
    $default_widget = serialize(Option::getDefWidget());

    Option::updateOption("widget_title", $widget_title);
    Option::updateOption("custom_widget", 'a:0:{}');
    Option::updateOption("widgets1", $default_widget);

    $CACHE->updateCache('options');
    emDirect("./widgets.php?activated=1");
}
