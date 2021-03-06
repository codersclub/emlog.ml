<?php if (!defined('EMLOG_ROOT')) {
	exit('error!');
} ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="mb-0 text-gray-800">
<!--vot--><span class="h3"><?=lang('welcome')?>, <a class="small" href="./blogger.php"><?= $user_cache[UID]['name'] ?></a></span>
        <span class="badge badge-primary ml-2"><?= $role_name ?></span>
    </div>
	<?php doAction('adm_main_top') ?>
</div>
<?php if (User::haveEditPermission()): ?>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
<!--vot-->      <h6 class="card-header"><?= lang('site_info') ?></h6>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
<!--vot-->              <li class="list-group-item d-flex justify-content-between align-items-center"><?=lang('posts')?>
                            <a href="./article.php"><span class="badge badge-primary badge-pill"><?= $sta_cache['lognum'] ?></span></a>
                        </li>
<!--vot-->              <li class="list-group-item d-flex justify-content-between align-items-center"><?=lang('drafts')?>
                            <a href="./article.php?draft=1"><span class="badge badge-primary badge-pill"><?= $sta_cache['draftnum'] ?></span></a>
                        </li>
<!--vot-->              <li class="list-group-item d-flex justify-content-between align-items-center"><?=lang('comments')?>
                            <a href="./comment.php"><span class="badge badge-primary badge-pill"><?= $sta_cache['comnum_all'] ?></span></a>
                        </li>
<!--vot-->              <li class="list-group-item d-flex justify-content-between align-items-center"><?=lang('pending_review')?>
                            <a href="./comment.php?hide=y"><span class="badge badge-warning badge-pill"><?= $sta_cache['hidecomnum'] ?></span></a>
                        </li>
<!--vot-->              <li class="list-group-item d-flex justify-content-between align-items-center"><?=lang('user_num')?>
                            <a href="./user.php"><span class="badge badge-primary badge-pill"><?= count($user_cache) ?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
		<?php if (User::isAdmin()): ?>
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
<!--vot-->  <h6 class="card-header"><?=lang('software_info')?></h6>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            PHP
                            <span class="small"><?= $php_ver ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            MySQL
                            <span class="small"><?= $mysql_ver ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Web Server
                            <span class="small"><?= $serverapp ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            EMLOG
							<?php if (!Register::isRegLocal()) : ?>
<!--vot-->                      <a href="auth.php"><span class="badge badge-danger"><?= Option::EMLOG_VERSION ?> <?=lang('unregistered')?></span></a>
							<?php else: ?>
<!--vot-->                      <span class="badge badge-success"><?= Option::EMLOG_VERSION ?> <?=lang('registered')?></span>
							<?php endif ?>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
<!--vot-->                  <a id="ckup" href="javascript:checkupdate();" class="btn btn-success btn-sm"><?=lang('update_check')?></a>
                            <span id="upmsg"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
		<?php if (!Register::isRegLocal()) : ?>
            <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
<!--vot-->          <h4><?=lang('emlog_reg_advantages')?></h4>
<!--vot-->          <div><?=lang('advantage1')?></div>
<!--vot-->          <div><?=lang('advantage2')?></div>
<!--vot-->          <div><?=lang('advantage3')?></div>
<!--vot-->          <div><?=lang('advantage4')?></div>
                    </div>
                    <div class="card-footer text-center">
<!--vot-->              <a href="https://emlog.net/register" target="_blank" class="btn btn-sm btn-primary shadow-lg"><?=lang('get_emkey')?></a>
<!--vot-->              <a href="auth.php" class="btn btn-sm btn-success shadow-lg"><?=lang('register_now')?></a>
                    </div>
                </div>
            </div>
		<?php endif ?>
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
<!--vot-->      <h6 class="card-header"><?= lang('official_news') ?></h6>
                <div class="card-body" id="admindex_msg">
                    <ul class="list-group list-group-flush"></ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(hideActived, 2600);
        $("#menu_home").addClass('active');
        $(document).ready(function () {
            $("#admindex_msg ul").html("").addClass("spinner-border text-primary");
            $.get("./index.php?action=get_news",
                function (data) {
                    $.each(data.items, function (i, item) {
                        var image = '';
                        if (item.image != '') {
                            image = "<a href=\"" + item.url + "\" target=\"_blank\" title=\"" + item.title + "\"><img src=\"" + item.image + "\"></a><br />";
                        }
                        $("#admindex_msg ul").append("<li class=\"msg_type_" + item.type + "\">" + image + "<span>" + item.date + "</span><a href=\"" + item.url + "\" target=\"_blank\">" + item.title + "</a></li>");
                    });
                    $("#admindex_msg ul").removeClass();
                });
        });

        function checkupdate() {
            $("#upmsg").html("").addClass("spinner-border text-primary");
            $.get("./upgrade.php?action=check_update",
                function (result) {
                    if (result.code == 1001) {
/*vot*/                 $("#upmsg").html("<?=lang('emlog_unregistered')?>, <a href=\"auth.php\"><?=lang('go_to_register')?></a>").removeClass();
                    } else if (result.code == 1002) {
/*vot*/                 $("#upmsg").html("<?=lang('updates_no')?> ").removeClass();
                    } else if (result.code == 1003) {
/*vot*/                 $("#upmsg").html("<?=lang('update_expired')?><a href=\"https://www.emlog.net/\" target=\"_blank\"><?=lang('log_in_to_renew')?></a>").removeClass();
                    } else if (result.code == 200) {
/*vot*/                 $("#upmsg").html("<?=lang('update_exists')?> " + result.data.version + ", <a href=\"https://www.emlog.net/docs/#/changelog\" target=\"_blank\"><?=lang('view_changelog')?></a>, <a id=\"doup\" href=\"javascript:doup('" + result.data.file + "','" + result.data.sql + "');\"><?=lang('update_now')?></a>").removeClass();
                    } else {
/*vot*/              $("#upmsg").html("<?=lang('update_check_failed')?>").removeClass();
                    }
                });
        }

        function doup(source, upsql) {
/*vot*/     $("#upmsg").html("<?=lang('updating')?>").addClass("ajaxload");
            $.get('./upgrade.php?action=update&source=' + source + "&upsql=" + upsql,
                function (data) {
                    $("#upmsg").removeClass();
                    if (data.match("succ")) {
/*vot*/                 $("#upmsg").html('<?=lang('update_completed')?>');
                    } else if (data.match("error_down")) {
/*vot*/                 $("#upmsg").html('<?=lang('update_download_failed')?>');
                    } else if (data.match("error_zip")) {
/*vot*/                 $("#upmsg").html('<?=lang('update_extract_failed')?>');
                    } else if (data.match("error_dir")) {
/*vot*/                 $("#upmsg").html('<?=lang('update_failed_nonwritable')?>');
                    } else {
/*vot*/                 $("#upmsg").html('<?=lang('update_failed')?>');
                    }
                });
        }
    </script>
<?php endif ?>
<?php endif ?>

<div class="row">
	<?php doAction('adm_main_content') ?>
</div>
