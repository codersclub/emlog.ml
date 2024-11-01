<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['active_del'])): ?>
    <div class="alert alert-success"><?= lang('comment_delete_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_show'])): ?>
    <div class="alert alert-success"><?= lang('comment_audit_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_hide'])): ?>
    <div class="alert alert-success"><?= lang('comment_hide_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_top'])): ?>
    <div class="alert alert-success"><?= lang('sticked_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_untop'])): ?>
    <div class="alert alert-success"><?= lang('unsticked_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_edit'])): ?>
    <div class="alert alert-success"><?= lang('comment_edit_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_rep'])): ?>
    <div class="alert alert-success"><?= lang('comment_reply_ok') ?></div><?php endif ?>
<?php if (isset($_GET['error_a'])): ?>
    <div class="alert alert-danger"><?= lang('comment_choose_operation') ?></div><?php endif ?>
<?php if (isset($_GET['error_b'])): ?>
    <div class="alert alert-danger"><?= lang('select_action_to_perform') ?></div><?php endif ?>
<?php if (isset($_GET['error_c'])): ?>
    <div class="alert alert-danger"><?= lang('reply_is_empty') ?></div><?php endif ?>
<?php if (isset($_GET['error_d'])): ?>
    <div class="alert alert-danger"><?= lang('comment_too_long') ?></div><?php endif ?>
<?php if (isset($_GET['error_e'])): ?>
    <div class="alert alert-danger"><?= lang('comment_is_empty') ?></div><?php endif ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800"><?= lang('comment_management') ?></h1>
</div>
<?php if ($hideCommNum > 0) : ?>
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?= $hide == '' ? 'active' : '' ?>" href="./comment.php?<?= $addUrl_1 ?>"><?= lang('all') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $hide == 'y' ? 'active' : '' ?>" href="./comment.php?hide=y&<?= $addUrl_1 ?>"><?= lang('pending') ?>
                    <?php
                    $hidecmnum = User::haveEditPermission() ? $sta_cache['hidecomnum'] : $sta_cache[UID]['hidecommentnum'];
                    if ($hidecmnum > 0)
                        echo '(' . $hidecmnum . ')';
                    ?>
                </a>
            </li>
        </ul>
    </div>
<?php endif ?>
<form action="comment.php?action=batch_operation" method="post" name="form_com" id="form_com">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAllItem" /></th>
                            <th><?= lang('content') ?></th>
                            <th><?= lang('comment_author') ?></th>
                            <th><?= lang('from_article') ?></th>
                            <th><?= lang('publish_time') ?></th>
<!--vot-->                  <th><?= lang('operation') ?></th>
                        </tr>
                    </thead>
                    <tbody class="checkboxContainer">
                        <?php foreach ($comment as $key => $value):
                            $ishide = $value['hide'] == 'y' ? '<span class="text-danger">' . lang('pending') . '</span>' : '';
                            $mail = $value['mail'] ? " <br />email: {$value['mail']}" : '';
                            $ip = $value['ip'];
                            $gid = $value['gid'];
                            $cid = $value['cid'];
                            $ip_info = $ip ? "<br />IP: {$ip}" : '';
                            $comment = $value['comment'];
                            $poster = !empty($value['uid']) ? '<a href="./comment.php?uid=' . $value['uid'] . '">' . $value['poster'] . '</a>' : $value['poster'];
                            $title = subString($value['title'], 0, 42);
                            $hide = $value['hide'];
                            $date = $value['date'];
                            $top = $value['top'];
                            doAction('adm_comment_display');
                        ?>
                            <tr>
                                <td style="width: 19px;"><input type="checkbox" value="<?= $cid ?>" name="com[]" class="ids" /></td>
                                <td>
                                    <?= $comment ?>
                                    <?= $ishide ?>
                                    <?php if ($top == 'y'): ?><span class="text-success"><?= lang('top') ?></span><?php endif ?>
                                </td>
                                <td class="small">
                                    <?= $poster ?>
                                    <?php if (User::haveEditPermission()): ?>
                                        <?= $mail ?>
                                        <?= $ip_info ?>
                                        <br><?= $value['os'] ?> - <?= $value['browse'] ?>
                                    <?php endif ?>
                                </td>
                                <td class="small">
                                    <a href="<?= Url::log($gid) ?>" target="_blank"><?= $title ?></a><br>
                                    <a href="comment.php?gid=<?= $gid ?>" class="badge badge-info"><?= lang('article_all_comments') ?></a>
                                </td>
                                <td class="small"><?= $date ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" class="badge badge-success" data-target="#replyModal"
                                        data-cid="<?= $cid ?>"
                                        data-comment="<?= $comment ?>"
                                        data-hide="<?= $value['hide'] ?>"><?= lang ('comment_reply') ?>
                                    </a>
                                    <?php if (User::haveEditPermission()): ?>
                                        <a href="javascript: em_confirm('<?= $ip ?>', 'commentbyip', '<?= LoginAuth::genToken() ?>');"
                                            class="badge badge-pill badge-warning"><?= lang('del_from_ip') ?></a>
                                        <a href="javascript: em_confirm(<?= $cid ?>, 'comment', '<?= LoginAuth::genToken() ?>');" class="badge badge-danger"><?= lang('delete') ?></a>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="list_footer">
                <div class="btn-group">
                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"><?= lang('operation') ?></button>
                    <div class="dropdown-menu">
                        <?php if (User::haveEditPermission()): ?>
                        <a href="javascript:commentact('top');" class="dropdown-item"><?= lang('top') ?></a>
                        <a href="javascript:commentact('untop');" class="dropdown-item"><?= lang('untop') ?></a>
                        <a href="javascript:commentact('hide');" class="dropdown-item text-primary"><?= lang('hide') ?></a>
                        <a href="javascript:commentact('pub');" class="dropdown-item text-primary"><?= lang('approve') ?></a>
                        <?php endif; ?>
                    <a href="javascript:commentact('del');" class="dropdown-item text-danger"><?= lang('delete') ?></a>

                </div>
                <input name="operate" id="operate" value="" type="hidden" />
            </div>
        </div>
    </div>
    <div class="page"><?= $pageurl ?></div>
    <div class="text-center small">(<?= lang('have') ?> <?= $cmnum ?> <?= lang('_comments') ?>)</div>
</form>
<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel"><?= lang('comment_reply') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="comment.php?action=doreply" method="post">
                <div class="modal-body">
                    <p class="comment-replay-content"></p>
                    <div class="form-group">
                        <input type="hidden" value="" name="cid" id="cid" />
                        <input type="hidden" value="" name="hide" id="hide" />
                        <textarea class="form-control" id="reply" name="reply" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?= lang('cancel') ?></button>
                    <button type="submit" class="btn btn-sm btn-success"><?= lang('reply') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function commentact(act) {
        if (getChecked('ids') === false) {
            infoAlert(lang('comment_operation_select'));
            return;
        }

        if (act === 'del') {
            delAlert2('', lang('comment_selected_delete_sure'), function() {
                $("#operate").val(act);
                $("#form_com").submit();
            })
            return
        }
        $("#operate").val(act);
        $("#form_com").submit();
    }

    $(function() {
        $("#menu_cm").addClass('active');
        setTimeout(hideActived, 3600);

        $('#replyModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var comment = button.html()
            var cid = button.data('cid')
            var hide = button.data('hide')
            var modal = $(this)
            modal.find('.modal-body p').html(comment)
            modal.find('.modal-body #cid').val(cid)
            modal.find('.modal-body #hide').val(hide)
        })
    });
</script>