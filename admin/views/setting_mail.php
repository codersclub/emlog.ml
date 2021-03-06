<?php if (!defined('EMLOG_ROOT')) {
	exit('error!');
} ?>
<?php if (isset($_GET['activated'])): ?>
<!--vot--><div class="alert alert-success"><?=lang('settings_saved_ok')?></div><?php endif ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<!--vot--><h1 class="h3 mb-0 text-gray-800"><?=lang('settings')?></h1>
</div>
<div class="panel-heading">
    <ul class="nav nav-pills">
<!--vot--><li class="nav-item"><a class="nav-link" href="./setting.php"><?=lang('basic_settings')?></a></li>
<!--vot--><li class="nav-item"><a class="nav-link" href="./setting.php?action=user"><?=lang('user_settings')?></a></li>
<!--vot--><li class="nav-item"><a class="nav-link active" href="./setting.php?action=mail"><?=lang('email_notify')?></a></li>
<!--vot--><li class="nav-item"><a class="nav-link" href="./setting.php?action=seo"><?=lang('seo_settings')?></a></li>
<!--vot--><li class="nav-item"><a class="nav-link" href="./setting.php?action=api"><?=lang('api_interface')?></a></li>
<!--vot--><li class="nav-item"><a class="nav-link" href="./blogger.php"><?=lang('personal_settings')?></a></li>
    </ul>
</div>
<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <form action="setting.php?action=mail_save" method="post" name="input" id="mail_config">
<!--vot-->  <h4><?=lang('email_sending')?></h4>
            <div class="form-group">
<!--vot-->      <label><?=lang('sender_email')?></label>
                <input type="email" class="form-control" value="<?= $smtp_mail ?>" name="smtp_mail" required>
            </div>
            <div class="form-group">
<!--vot-->      <label><?=lang('smtp_password')?>:</label>
                <input type="password" name="smtp_pw" cols="" rows="3" class="form-control" value="<?= $smtp_pw ?>" required>
            </div>
            <div class="form-group">
<!--vot-->      <label><?=lang('smtp_server')?>:</label>
                <input class="form-control" value="<?= $smtp_server ?>" name="smtp_server" required>
            </div>
            <div class="form-group">
<!--vot-->      <label><?=lang('smtp_port')?> <?=lang('smtp_port_info')?></label>
                <input class="form-control" value="<?= $smtp_port ?>" name="smtp_port" required>
            </div>
            <div class="form-group">
                <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden"/>
<!--vot-->  <input type="submit" value="<?=lang('save_settings')?>" class="btn btn-sm btn-success"/>
<!--vot-->      <input type="button" value="<?=lang('send_test')?>" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#testMail"/>
            </div>
            <div class="alert alert-warning">
<!--vot-->      <?=lang('send_test_prompt')?>
            </div>
            <!-- Set the modal box for receiving mailboxes -->
            <div class="modal fade" id="testMail">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
<!--vot-->                  <h4 class="modal-title"><?=lang('send_test')?></h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
<!--vot-->                      <input class="form-control" type="email" name="testTo" placeholder="<?=lang('recepient_email_enter')?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div id="testMailMsg"></div>
<!--vot-->                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?=lang('close')?></button>
<!--vot-->                  <button type="button" class="btn btn-success btn-sm" id="testSendBtn"><?=lang('send')?></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $("#menu_category_sys").addClass('active');
    $("#menu_sys").addClass('show');
    $("#menu_setting").addClass('active');
    setTimeout(hideActived, 2600);

    $("#testSendBtn").click(function () {
/*vot*/ $("#testMailMsg").html("<small class='text-secondary'><?=lang('sending')?>...<small>");

        $.post("setting.php?action=mail_test", $("#mail_config").serialize(), function (data) {
            if (data == '') {
/*vot*/         $("#testMailMsg").html("<small class='text-success'><?=lang('send_ok')?></small>");
            } else {
                $("#testMailMsg").html(data);
            }

        });
    })
</script>
