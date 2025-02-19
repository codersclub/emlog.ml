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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row justify-content-between">
            <div class="form-inline">
                <div id="f_t_order" class="mx-1">
                    <select name="order" id="order" onChange="selectOrder(this);" class="form-control">
                        <option value="date" <?= (empty($order)) ? 'selected' : '' ?>><?= lang('last_registered') ?></option>
                        <option value="update" <?= ($order === 'update') ? 'selected' : '' ?>><?= lang('last_active') ?></option>
                        <option value="admin" <?= ($order === 'admin') ? 'selected' : '' ?>><?= lang('admin_priority') ?></option>
                    </select>
                </div>
            </div>
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
    </div>
    <div class="card-body">
        <form action="user.php?action=operate_user" method="post" name="form_user" id="form_user">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable no-footer" id="adm_comment_list">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAllItem" /></th>
                        <th><?= lang('user_name') ?></th>
                        <th><?= lang('email') ?></th>
                        <th><?= lang('login_ip') ?></th>
                        <th><?= lang('last_login_time') ?></th>
                        <th><?= lang('create_time') ?></th>
                        <th><?= lang('operation') ?></th>
                        </tr>
                    </thead>
                    <tbody class="checkboxContainer">
                        <?php
                        foreach ($users as $key => $val):
                            $avatar = User::getAvatar($user_cache[$val['uid']]['avatar']);
                            $forbid = $val['state'] == 1;
                            $user_log_num = isset($sta_cache[$val['uid']]['lognum']) ? $sta_cache[$val['uid']]['lognum'] : 0;
                        ?>
                            <tr>
                                <td style="width: 19px;">
                                    <input type="checkbox" name="user_ids[]" value="<?= $val['uid'] ?>" class="ids" />
                                </td>
                                <td style="width: 25px;"><img src="<?= $avatar ?>" height="35" width="35" class="rounded-circle" /></td>
                                <td>
                                    <a href="user.php?action=edit&uid=<?= $val['uid'] ?>"><?= empty($val['name']) ? $val['login'] : $val['name'] ?></a>
                                    <span class="small"><?= $val['role'] ?></span>
                                    <?php if ($forbid): ?>
                                        <span class="badge badge-warning"><?= lang('disabled') ?></span>
                                    <?php endif ?>
                                    <br />
                                    <span class="small mr-2"> ID:<?= $val['uid'] ?></span>
                                    <span class="small mr-2"><?= lang('articles') ?>: <a href="article.php?uid=<?= $val['uid'] ?>"><?= $user_log_num ?></a></span>
                                    <span class="small"><?= lang('credits') ?>: <?= $val['credits'] ?></span>
                                </td>
                                <td><?= $val['email'] ?></td>
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
            <input name="operate" id="operate" value="" type="hidden" />
        </form>
        <div class="form-inline">
            <div class="btn-group">
                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"><?= lang('operation') ?></button>
                <div class="dropdown-menu">
                    <a href="javascript:useract('forbid');" class="dropdown-item text-warning"><?= lang('disable') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page"><?= $pageurl ?></div>
<div class="d-flex justify-content-center mb-4 small">
    <form action="user.php" method="get" class="form-inline">
        <label for="perpage_num" class="mr-2"><?= lang('have') ?> <?= $userCount ?> <?= lang('users_perpage') ?></label>
        <select name="perpage_num" id="perpage_num" class="form-control form-control-sm" onChange="this.form.submit();">
            <option value="10" <?= ($perPage == 10) ? 'selected' : '' ?>>10</option>
            <option value="20" <?= ($perPage == 20) ? 'selected' : '' ?>>20</option>
            <option value="50" <?= ($perPage == 50) ? 'selected' : '' ?>>50</option>
            <option value="100" <?= ($perPage == 100) ? 'selected' : '' ?>>100</option>
            <option value="500" <?= ($perPage == 500) ? 'selected' : '' ?>>500</option>
        </select>
    </form>
</div>

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
                        <label for="role"><?= lang('role') ?></label>
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
                        <label for="email"><?= lang('email') ?></label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $email ?>" required>
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
                    <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?= lang('cancel') ?></button>
                    <button type="submit" class="btn btn-sm btn-success"><?= lang('save') ?></button>
                    <span id="alias_msg_hook"></span>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function() {
        setTimeout(hideActived, 3600);
        $("#menu_user").addClass('active');
    });

    function selectOrder(obj) {
        window.open("./user.php?order=" + obj.value, "_self");
    }

    function useract(act) {
        if (getChecked('ids') === false) {
            infoAlert(jlang('user_select'));
            return;
        }

        if (act === 'forbid') {
            delAlert2('', jlang('block_users'), function() {
                    $("#operate").val("forbid");
                    $("#form_user").submit();
                },
                jlang('blocked'))
            return;
        }

        $("#operate").val(act);
        $("#form_user").submit();
    }
</script>