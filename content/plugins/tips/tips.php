<?php
/*
Plugin Name: Tips
Version: 3.0
Plugin URL:
Description: Display a usage tip on the home page of the background, and it can also be used as a demo for plug-in development.
Author: emlog
Author URL: https://www.emlog.net/author/index/577
*/

defined('EMLOG_ROOT') || exit('access denied!');

/*vot: Moved to /lang/XX/lang_plugin_tips.php
$array_tips = [
//...
    '定期备份你的数据，防止意外丢失',
    '请使用复杂的密码保护后台管理账户',
    '保持插件和主题的更新，以获得最新的功能和安全性',
    '合理使用标签和分类，提高文章的可读性和搜索引擎优化',
    '知者不惑，仁者不忧，勇者不惧',
    '千里之行，始于足下',
    '繁华尽处，寻常是妙处',
    '人生如逆旅，我亦是行人',
    '愿你出走半生，归来仍是少年',
    '希望是附丽于存在的，有存在，便有希望',
    '世上只有一种英雄主义，就是在认清生活真相之后依然热爱生活',
];
vot*/

// Load Plugin Language from content/plugins/PLUGIN_NAME/lang/XX/lang.php
load_language('plugins/tips');


function tips_init()
{
/*vot*/    $array_tips = lang('array_tips');
    $i = em_rand(0, count($array_tips) - 1);
    $tip = $array_tips[$i];
    echo "<div id=\"tip\"> $tip</div>";
}

addAction('adm_main_top', 'tips_init');

function tips_css()
{
    echo "<style>
    #tip{
        background:url(../content/plugins/tips/icon_tips.gif) no-repeat left 3px;
        padding:3px 18px;
        margin:5px 0px;
        font-size:12px;
        color:#999999;
    }
    </style>\n";
}

addAction('adm_head', 'tips_css');
