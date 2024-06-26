<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['active_del'])): ?>
    <div class="alert alert-success"><?= lang('deleted_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_fb'])): ?>
    <div class="alert alert-success"><?= lang('user_ban_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_unfb'])): ?>
    <div class="alert alert-success"><?= lang('user_unban_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_update'])): ?>
    <div class="alert alert-success"><?= lang('user_modify_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_add'])): ?>
    <div class="alert alert-success"><?= lang('user_add_ok') ?></div><?php endif ?>
<?php if (isset($_GET['error_email'])): ?>
    <div class="alert alert-danger"><?= lang('email_in_use') ?></div><?php endif ?>
<?php if (isset($_GET['error_exist_email'])): ?>
    <div class="alert alert-danger"><?= lang('email_empty') ?></div><?php endif ?>
<?php if (isset($_GET['error_pwd_len'])): ?>
    <div class="alert alert-danger"><?= lang('password_length_short') ?></div><?php endif ?>
<?php if (isset($_GET['error_pwd2'])): ?>
    <div class="alert alert-danger"><?= lang('passwords_not_equal') ?></div><?php endif ?>
<?php if (isset($_GET['error_del_a'])): ?>
    <div class="alert alert-danger"><?= lang('founder_not_delete') ?></div><?php endif ?>
<?php if (isset($_GET['error_del_b'])): ?>
    <div class="alert alert-danger"><?= lang('founder_not_edit') ?></div><?php endif ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800"><?= lang('user_management') ?></h1>
    <a href="#" class="btn btn-sm btn-success shadow-sm mt-4" data-toggle="modal" data-target="#exampleModal"><i class="icofont-plus"></i> <?= lang('user_add') ?></a>
</div>
<div class="panel-heading justify-content-between d-flex">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?= $admin == '' ? 'active' : '' ?>" href="./user.php"><?= lang('all') ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $admin == 'y' ? 'active' : '' ?>" href="./user.php?admin=y"><?= lang('admins') ?></a>
        </li>
    </ul>
    <form action="user.php" method="get">
        <div class="form-inline search-inputs-nowrap">
            <input type="text" name="keyword" value="<?= $keyword ?>" class="form-control m-1 small" placeholder="<?= lang('search_by_email') ?>">
            <div class="input-group-append">
                <button class="btn btn-sm btn-success" type="submit">
                    <i class="icofont-search-2"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover dataTable no-footer" id="adm_comment_list">
                <thead>
                <tr>
                    <th></th>
                    <th><?= lang('user_name') ?></th>
                    <th><?= lang('email') ?></th>
                    <th><?= lang('user_id') ?></th>
                    <th><?= lang('login_ip') ?></th>
                    <th><?= lang('last_login_time') ?></th>
                    <th><?= lang('create_time') ?></th>
                    <th><?= lang('operation') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($users as $key => $val):
                    $avatar = empty($user_cache[$val['uid']]['avatar']) ? './views/images/avatar.svg' : '../' . $user_cache[$val['uid']]['avatar'];
                    $forbid = $val['state'] == 1;
                    $user_log_num = isset($sta_cache[$val['uid']]['lognum']) ? $sta_cache[$val['uid']]['lognum'] : 0;
                    ?>
                    <tr>
                        <td><img src="<?= $avatar ?>" height="35" width="35" class="rounded-circle"/></td>
                        <td>
                            <?php if (UID != $val['uid']): ?>
                                <a href="user.php?action=edit&uid=<?= $val['uid'] ?>"><?= empty($val['name']) ? $val['login'] : $val['name'] ?></a>
                            <?php else: ?>
                                <a href="blogger.php"><?= empty($val['name']) ? $val['login'] : $val['name'] ?></a>
                            <?php endif ?>
                            <span class="small"><?= $val['role'] ?></span>
                            <?php if ($forbid): ?>
                                <span class="badge badge-warning"><?= lang('disabled') ?></span>
                            <?php endif ?>
                            <br/>
                            <?php if ($user_log_num > 0): ?>
                                <span class="small mr-2"><?= lang('articles') ?>: <a href="article.php?uid=<?= $val['uid'] ?>"><?= $user_log_num ?></a></span>
                            <?php endif ?>
                            <?php if ($val['credits'] > 0): ?>
                                <span class="small"><?= lang('credits') ?>: <?= $val['credits'] ?></span>
                            <?php endif ?>
                        </td>
                        <td><?= $val['email'] ?></td>
                        <td><?= $val['uid'] ?></td>
                        <td><?= $val['ip'] ?></td>
                        <td><?= $val['update_time'] ?></td>
                        <td><?= $val['create_time'] ?></td>
                        <td>
                            <?php if (UID != $val['uid']): ?>
                                <a href="javascript: em_confirm(<?= $val['uid'] ?>, 'del_user', '<?= LoginAuth::genToken() ?>');" class="badge badge-danger"><?= lang('delete') ?></a>
                                <?php if ($forbid): ?>
                                    <a href="user.php?action=unforbid&uid=<?= $val['uid'] ?>&token=<?= LoginAuth::genToken() ?>" class="badge badge-success"><?= lang('unban') ?></a>
                                <?php else: ?>
                                    <a href="javascript: em_confirm(<?= $val['uid'] ?>, 'forbid_user', '<?= LoginAuth::genToken() ?>');" class="badge badge-warning"><?= lang('ban') ?></a>
                                <?php endif ?>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="page"><?= $pageurl ?></div>
<div class="text-center small"><?= lang('total') ?> <?= $userCount ?> <?= lang('_users') ?></div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= lang('user_add') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="user.php?action=new" method="post" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sortname"><?= lang('role') ?></label>
                        <select name="role" id="role" class="form-control">
                            <option value="writer"><?= lang('registered_user') ?></option>
                            <option value="editor"><?= lang('editor') ?></option>
                            <option value="admin"><?= lang('admin') ?></option>
                        </select>
                    </div>
                    <div class="alert alert-warning">
                        <?= lang('groups_alert') ?>
                    </div>
                    <div class="form-group">
                        <label for="username"><?= lang('email') ?></label>
                        <input type="email" name="email" class="form-control" value="<?= $email ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password"><?= lang('password_min_length') ?></label>
                        <input class="form-control" id="password" minlength="6" name="password" autocomplete="new-password" type="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password2"><?= lang('password_repeat') ?></label>
                        <input class="form-control" id="password2" minlength="6" name="password2" type="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden"/>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?= lang('cancel') ?></button>
                    <button type="submit" class="btn btn-sm btn-success"><?= lang('save') ?></button>
                    <span id="alias_msg_hook"></span>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function () {
        setTimeout(hideActived, 3600);
        $("#menu_user").addClass('active');
    });
</script>
