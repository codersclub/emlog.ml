<?php
/*@support tpl_options*/

/**
 * 模板设置的配置文件
 * 详见官网文档-模板开发：https://www.emlog.net/docs/dev/template
 */

defined('EMLOG_ROOT') || exit('access denied!');

$options = [
    'TplOptionsNavi' => [
        'type'        => 'radio',
        'name'        => '定义设置项标签页名称',
        'values'      => [
            'tpl-head' => '头部设置',
            'tpl-home' => '首页设置',
        ],
        'description' => '<p>你好，这是默认模板的设置界面，请点击上方菜单进入设置项。</p>'
    ],
    'logotype'       => [
        'labels'  => 'tpl-head',
        'type'    => 'radio',
        'name'    => 'LOGO显示模式',
        'new'     => 'NEW',
        'values'  => [
            '1' => '文字',
            '0' => '图片',
        ],
        'default' => '1',
    ],
    'logoimg'        => [
        'labels'      => 'tpl-head',
        'type'        => 'image',
        'name'        => 'LOGO上传',
        'values'      => [
            TEMPLATE_URL . 'images/logo.png',
        ],
        'description' => '上传LOGO图片，推荐尺寸 180x60像素，高度不超60像素'
    ],
    'favicon'        => [
        'labels'      => 'tpl-head',
        'type'        => 'image',
        'name'        => '浏览器图标（favicon）',
        'values'      => [
            TEMPLATE_URL . 'images/favicon.png',
        ],
        'description' => '上传浏览器图标，推荐尺寸48×48的PNG或JPG图片'
    ],
    'slideShow'      => [
        'labels'      => 'tpl-home',
        'type'        => 'text',
        'name'        => '首页轮播图',
        'multi'       => true,
        'description' => '每行一个，图片高度推荐260像素，格式：图片地址 | 图片标题 | 跳转地址',
    ],
];
