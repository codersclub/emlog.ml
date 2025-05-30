<?php

/**
 * Custom 404 page
 */
defined('EMLOG_ROOT') || exit('access denied!');
?>
<!doctype html>
<html lang="<?= LANG ?>" dir="<?= LANG_DIR ?>" data-theme="light">

<head>
    <meta charset="utf-8">
    <title><?=lang('404_error')?></title>
    <link href="<?= TEMPLATE_URL ?>css/style.css?t=<?= Option::EMLOG_VERSION_TIMESTAMP ?>" rel="stylesheet" type="text/css" />
    <style>
        .main {
            background-color: var(--bodyBground);
            font-size: 12px;
            color: var(--fontColor);
            width: 650px;
            margin: 60px auto 0px;
            padding: 30px 10px;
            box-shadow: 0 2px 8px 0 rgba(0, 0, 0, .02);
            border-radius: 10px;
            transition: box-shadow 0.4s
        }

        .main p {
            text-align: center;
            font-weight: 600;
            font-size: 2rem
        }

        .main p a {
            border: 1px solid #ccc !important;
            padding: 8px;
            border-radius: 10px !important;
            color: #929292;
            font-size: initial;
            text-decoration: none
        }
    </style>
</head>

<body>
    <div class="main">
        <p><?= lang('404_description') ?></p>
        <p><a href="<?= BLOG_URL ?>"><?= lang('click_return') ?></a></p>
    </div>
    <script src="<?= TEMPLATE_URL ?>js/jquery.min.3.5.1.js?v=<?= Option::EMLOG_VERSION_TIMESTAMP ?>"></script>
    <script src="<?= TEMPLATE_URL ?>js/common_tpl.js?t=<?= Option::EMLOG_VERSION_TIMESTAMP ?>"></script>
</body>

</html>
