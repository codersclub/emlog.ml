<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800"><?= lang('settings') ?></h1>
</div>
<div class="panel-heading">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="./setting.php"><?= lang('basic_settings') ?></a></li>
        <li class="nav-item"><a class="nav-link active" href="./setting.php?action=user"><?= lang('user_settings') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./setting.php?action=mail"><?= lang('email_notify') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./setting.php?action=seo"><?= lang('seo_settings') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./setting.php?action=api"><?= lang('api_interface') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./blogger.php"><?= lang('personal_settings') ?></a></li>
    </ul>
</div>
<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <form action="setting.php?action=user_save" method="post" name="user_setting_form" id="user_setting_form">
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" value="y" name="is_signup" id="is_signup" <?= $conf_is_signup ?> />
                <label class="form-check-label" for="is_signup"><?= lang('registration_open') ?></label>
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" value="y" name="login_code" id="login_code" <?= $conf_login_code ?> >
                <label class="form-check-label" for="login_code"><?= lang('registration_captcha') ?></label>
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" value="y" name="email_code" id="email_code" <?= $conf_email_code ?> >
                <label class="form-check-label" for="email_code"><?=lang('enable_email_code')?></label>
            </div>
            <hr>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" value="y" name="ischkarticle" id="ischkarticle" <?= $conf_ischkarticle ?> />
                <label class="form-check-label" for="ischkarticle"><?= lang('writer_need_approve') ?></label>
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" value="y" name="article_uneditable" id="article_uneditable" <?= $conf_article_uneditable ?> />
                <label for="article_uneditable"><?= lang('not_editable') ?></label>
            </div>
            <div class="form-group form-inline">
                <label for="posts_per_day">注册用户限制24小时发文数量（包括草稿）：</label>
                <input class="form-control mx-sm-3" style="width:60px;" value="<?= $posts_per_day ?>" type="number" min="0" name="posts_per_day" id="posts_per_day"/>
            </div>
            <hr>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" value="y" name="forbid_user_upload" id="forbid_user_upload" <?= $conf_forbid_user_upload ?> />
                <label class="form-check-label" for="forbid_user_upload"><?= lang('disable_upload') ?></label>
            </div>
            <div class="form-group form-inline" id="form_att_maxsize">
                注册用户上传最大限制：<input type="number" min="0" style="width:200px;" class="form-control" value="<?= $att_maxsize ?>" name="att_maxsize"/> （单位：KB）
            </div>
            <div class="form-group form-inline" id="form_att_type">
                允许注册用户上传的文件类型：<input maxlength="200" style="width:500px;" class="form-control" value="<?= $att_type ?>" name="att_type"/>（多个用英文逗号分隔）
            </div>
            <hr>
<!--vot NOT COMPATIBLE WITH MULTILINGUAL!
            <div class="form-group form-inline">
                <label for="posts_name"><?= lang('article_alias_prompt') ?></label>
                <input class="form-control mx-sm-3" style="width:80px;" value="<?= $posts_name ?>" name="posts_name" id="posts_name"/> <?= lang('article_alias_prompt') ?>
            </div>
-->
            <div class="form-group">
                <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden"/>
                <input type="submit" value="<?= lang('save_settings') ?>" class="btn btn-sm btn-success"/>
            </div>
        </form>
        <div class="alert alert-warning">
            <?= lang('groups_about') ?>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#menu_category_sys").addClass('active');
        $("#menu_sys").addClass('show');
        $("#menu_setting").addClass('active');
        setTimeout(hideActived, 3600);

        // submit Form
        $("#user_setting_form").submit(function (event) {
            event.preventDefault();
            submitForm("#user_setting_form");
        });
    });
</script>
