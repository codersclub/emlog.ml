<?php
/*@support tpl_options*/

/**
 * Configuration file for template settings
 * For details, please refer to the official website documentation-template development: https://www.emlog.net/docs/#/template
 */

defined('EMLOG_ROOT') || exit('access denied!');

$options = [
    'TplOptionsNavi' => [
        'type'        => 'radio',
        'name'        => lang('tpl_setting_tab_name'),
        'values'      => [
            'tpl-head' => lang('tpl_setting_header'),
            'tpl-home' => '首页设置',
        ],
        'description' => '<p>' . lang('tpl_setting_descr') .'</p>'
    ],
    'logotype'       => [
        'labels'  => 'tpl-head',
        'type'    => 'radio',
        'name'    => lang('tpl_logo_mode'),
        'new'     => 'NEW',
        'values'  => [
            '1' => lang('tpl_logo_text'),
            '0' => lang('tpl_logo_image'),
        ],
        'default' => '1',
    ],
    'logoimg'        => [
        'labels'      => 'tpl-head',
        'type'        => 'image',
        'name'        => lang('tpl_logo_upload'),
        'values'      => [
            TEMPLATE_URL . 'images/logo.png',
        ],
        'description' => lang('tpl_logo_upload_descr')
    ],
    'favicon'        => [
        'labels'      => 'tpl-head',
        'type'        => 'image',
        'name'        => lang('favicon'),
        'values'      => [
            TEMPLATE_URL . 'images/favicon.png',
        ],
        'description' => lang('favicon_descr'),
    ],
    'slideShow'      => [
        'labels'      => 'tpl-home',
        'type'        => 'text',
        'name'        => '首页轮播图',
        'multi'       => true,
        'description' => '每行一个，图片高度推荐260像素，格式：图片地址 | 图片标题 | 跳转地址',
    ],
];