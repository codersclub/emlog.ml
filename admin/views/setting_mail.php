<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800"><?= lang('settings') ?></h1>
</div>
<div class="panel-heading">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="./setting.php"><?= lang('basic_settings') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./setting.php?action=user"><?= lang('user_settings') ?></a></li>
        <li class="nav-item"><a class="nav-link active" href="./setting.php?action=mail"><?= lang('email_notify') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./setting.php?action=seo"><?= lang('seo_settings') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./setting.php?action=api"><?= lang('api_interface') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./setting.php?action=ai">&#10024;AI</a></li>
        <li class="nav-item"><a class="nav-link" href="./blogger.php"><?= lang('personal_settings') ?></a></li>
    </ul>
</div>
<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <form action="setting.php?action=mail_save" method="post" name="mail_setting_form" id="mail_setting_form">
            <h4><?= lang('email_sending') ?></h4>
            <div class="form-group">
                <label><?= lang('sender_email') ?></label>
                <input type="email" class="form-control" value="<?= $smtp_mail ?>" name="smtp_mail">
            </div>
            <div class="form-group">
                <label><?= lang('smtp_password') ?>:</label>
                <input type="password" name="smtp_pw" cols="" rows="3" class="form-control" value="<?= $smtp_pw ?>" autocomplete="new-password">
            </div>
            <div class="form-group">
                <label><?= lang('sender_name') ?></label>
                <input type="from_name" class="form-control" value="<?= $smtp_from_name ?>" name="smtp_from_name">
            </div>
            <div class="form-group">
                <label><?= lang('smtp_server') ?>:</label>
                <input class="form-control" value="<?= $smtp_server ?>" name="smtp_server">
            </div>
            <div class="form-group">
                <label><?= lang('smtp_port') ?> <?= lang('smtp_port_info') ?></label>
                <input class="form-control" value="<?= $smtp_port ?>" name="smtp_port">
            </div>
            <div class="form-group">
<!--vot-->      <input type="button" value="<?= lang('send_test') ?>" class="btn btn-primary" data-toggle="modal" data-target="#testMail" />
            </div>
            <div class="alert alert-warning">
                <?= lang('send_test_prompt') ?>
            </div>
            <!-- Set the modal box for receiving mailboxes -->
            <div class="modal fade" id="testMail">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><?= lang('send_test') ?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control" type="email" name="testTo" placeholder="<?= lang('recepient_email_enter') ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div id="testMailMsg"></div>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('close') ?></button>
                            <button type="button" class="btn btn-success btn-sm" id="testSendBtn"><?= lang('send') ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <h4><?= lang('email_template') ?></h4>
            <div class="my-3">
                <div class="row" id="mail_template_box">
                    <div class="col-md-6">
                        <?= lang('select_email_template') ?>: <a href="javascript:useDefaultTemplate();"><?= lang('simple') ?></a> <span id="mail_template_box_ext"></span>
                    </div>
                    <div class="col-md-6">
                        <?= lang('preview') ?>:
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <textarea id="mail_template" name="mail_template" rows="10" class="form-control" placeholder="<?= lang('email_template_placeholer') ?>"><?= $mail_template ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <iframe id="mail_review_frame"></iframe>
                    </div>
                </div>
                <div class="mb-3 mt-1 small" id="mail_template_box"><?= lang('template_prompt') ?></div>
            </div>
            <h4><?= lang('email_notify') ?></h4>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" value="y" name="mail_notice_comment" id="mail_notice_comment" <?= $conf_mail_notice_comment ?> />
                <label class="form-check-label" for="mail_notice_comment"><?= lang('comment_new_notify') ?></label>
            </div>
            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" value="y" name="mail_notice_post" id="mail_notice_post" <?= $conf_mail_notice_post ?>>
                <label class="form-check-label" for="mail_notice_post"><?= lang('article_new_notify') ?></label>
            </div>
            <div class="form-group">
                <hr>
                <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
<!--vot-->          <input type="submit" value="<?= lang('save_settings') ?>" class="btn btn-success" />
            </div>
        </form>
    </div>
</div>
<script>
    function updatePreview() {
        const htmlCode = htmlInput.value;
        const previewDocument = previewFrame.contentDocument;
        previewDocument.open();
        previewDocument.write(htmlCode);
        previewDocument.close();
    }

    function useDefaultTemplate() {
        const defaultTemplate = `<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f0f0f0;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 5px; padding: 20px;">
        <p>{{mail_content}}</p>
    </div>
    <div style="max-width: 600px; margin: 0 auto; padding-top:10px;">
        <small><?= lang('template_from') ?></small>
    </div>
</body>
</html>`;
        $('#mail_template').val(defaultTemplate);
        updatePreview();
    }

    // mail template preview
    const htmlInput = document.getElementById('mail_template');
    const previewFrame = document.getElementById('mail_review_frame');
    updatePreview();
    htmlInput.addEventListener('input', updatePreview);

    $(function() {
        // menu
        $("#menu_category_sys").addClass('active');
        $("#menu_sys").addClass('show');
        $("#menu_setting").addClass('active');
        setTimeout(hideActived, 3600);

        // submit Form
        $("#mail_setting_form").submit(function(event) {
            event.preventDefault();
            submitForm("#mail_setting_form");
        });

        // test sendmail
        $("#testSendBtn").click(function() {
            $("#testMailMsg").html("<small class='text-secondary'><?=lang('sending')?><small>");
            $.post("setting.php?action=mail_test", $("#mail_setting_form").serialize(), function(data) {
                if (data === '') {
                    $("#testMailMsg").html("<small class='text-success'><?=lang('send_ok')?></small>");
                } else {
                    $("#testMailMsg").html(data);
                }

            });
        })
    });
</script>