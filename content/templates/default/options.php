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
];