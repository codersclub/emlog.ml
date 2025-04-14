<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['add_shortcut_suc'])): ?>
    <div class="alert alert-success"><?= lang('set_ok') ?></div>
<?php endif ?>
<div class="d-flex align-items-center mb-3">
    <div class="flex-shrink-0">
        <a class="mr-2" href="blogger.php">
            <img src="<?= User::getAvatar($user_cache[UID]['avatar']) ?>"
                alt="avatar" class="img-fluid rounded-circle border border-mute border-3"
                style="width: 56px; height: 56px;">
        </a>
    </div>
    <div class="flex-grow-1 ms-3">
        <div class="align-items-center mb-3">
            <p class="mb-0 m-2"><a class="mr-2" href="blogger.php"><?= $user_cache[UID]['name'] ?></a></p>
            <p class="mb-0 m-2 small"><?= $role_name ?></p>
        </div>
    </div>
</div>
<div class="row ml-1 mb-1"><?php doAction('adm_main_top') ?></div>
<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="card shadow mb-3">
            <div class="card-body">
                <a href="./article.php?action=write" class="mr-2"><?= lang('article_add') ?></a>
                <a href="article.php" class="mr-2"><?= lang('articles') ?></a>
                <a href="article.php?draft=1" class="mr-2"><?= lang('drafts') ?></a>
                <?php foreach ($shortcut as $item): ?>
                    <a href="<?= $item['url'] ?>" class="mr-2"><?= $item['name'] ?></a>
                <?php endforeach; ?>
                <span class="text-gray-300 mr-2">|</span>
                <a href="#" class="my-1" data-toggle="modal" data-target="#shortcutModal"><i class="icofont-plus"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 mb-3">
        <div class="card shadow mb-3">
            <h6 class="card-header"><?= lang('site_info') ?></h6>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="./article.php?checked=n"><?= lang('articles_pending') ?></a>
                        <a href="./article.php?checked=n"><span class="badge badge-danger badge-pill"><?= $sta_cache['checknum'] ?></span></a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="./comment.php?hide=y"><?= lang('pending_review') ?></a>
                        <a href="./comment.php?hide=y"><span class="badge badge-warning badge-pill"><?= $sta_cache['hidecomnum'] ?></span></a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="./user.php"><?= lang('users') ?></a>
                        <a href="./user.php"><span class="badge badge-success badge-pill"><?= count($user_cache) ?></span></a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="./article.php"><?= lang('articles') ?></a>
                        <a href="./article.php"><span class="badge badge-primary badge-pill"><?= $sta_cache['lognum'] ?></span></a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="./twitter.php?all=y"><?= lang('twitters') ?></a>
                        <a href="./twitter.php?all=y"><span class="badge badge-primary badge-pill"><?= $sta_cache['note_num'] ?></span></a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="./comment.php"><?= lang('comments') ?></a>
                        <a href="./comment.php"><span class="badge badge-primary badge-pill"><?= $sta_cache['comnum_all'] ?></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php if (User::isAdmin()): ?>
        <div class="col-lg-6 mb-3">
            <div class="card shadow mb-3">
                <h6 class="card-header"><?= lang('software_info') ?></h6>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            PHP
                            <span class="small"><?= $php_ver ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= lang('database') ?>
                            <span class="small">MySQL <?= $mysql_ver ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= lang('web_server') ?>
                            <span class="small"><?= $server_app ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= lang('os') ?>
                            <span class="small"><?= $os ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= lang('system_timezone') ?>
                            <span class="small"><?= Option::get('timezone') ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <?php if (!Register::isRegLocal()) : ?>
                                    <a href="https://www.emlog.net/register" target="_blank"><span class="badge badge-secondary">Emlog <?= Option::EMLOG_VERSION ?> <?= lang('unregistered') ?></span></a>
                                <?php else: ?>
                                    <a href="https://www.emlog.net" target="_blank"><span class="badge badge-success">Emlog <?= ucfirst(Option::EMLOG_VERSION) ?></span></a>
                                    <?php if (Register::getRegType() === 2): ?>
                                        <a href="https://www.emlog.net/register" target="_blank" class="badge badge-warning"><?= lang('svip_hard') ?></a>
                                    <?php elseif (Register::getRegType() === 1): ?>
                                        <a href="https://www.emlog.net/register" target="_blank" class="badge badge-success"><?= lang('vip_friend') ?></a>
                                    <?php else: ?>
                                        <a href="https://www.emlog.net/register" target="_blank" class="badge badge-success"><?= lang('registered_already') ?></a>
                                    <?php endif ?>
                                <?php endif; ?>
                            </div>
                            <div>
                                <a id="ckup" href="javascript:checkUpdate();" class="badge badge-success d-flex align-items-center"><span><?= lang('update_check') ?></span></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php if (User::isAdmin()): ?>
    <?php if (!Register::isRegLocal()) : ?>
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white">
                        <h6 class="my-0"><?= lang('emlog_reg_advantages') ?></h6>
                    </div>
                    <div class="card-body">
                        <p><?= lang('advantage1') ?></p>
                        <p><?= lang('advantage2') ?></p>
                        <p><?= lang('advantage3') ?></p>
                        <p><?= lang('advantage4') ?></p>
                        <p>
                            <a href="auth.php" class="btn btn-sm btn-primary shadow-lg"><?= lang('register_now') ?></a>
                            <a href="https://emlog.net/register" target="_blank" class="btn btn-sm ml-3 btn-success shadow-lg"><?= lang('get_emkey') ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="update-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="update-modal-label"><?= lang('update_check') ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="update-modal-loading"></div>
                    <div id="update-modal-msg" class="text-center"></div>
                    <div id="update-modal-changes"></div>
                    <div id="update-modal-btn" class="mt-2 text-right"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="shortcutModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="shortcutModalLabel"><?= lang('quick_entries') ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="index.php?action=add_shortcut" method="post">
                    <div class="modal-body">
                        <?php foreach ($shortcutAll as $k => $v):
                            $checked = in_array($v, $shortcut) ? 'checked' : '';
                        ?>
                            <input type="checkbox" name="shortcut[]" id="shortcut-<?= $k ?>" value="<?= $v['name'] ?>||<?= $v['url'] ?>" <?= $checked ?>>
                            <label class="mr-2" for="shortcut-<?= $k ?>"><?= $v['name'] ?></label>
                        <?php endforeach; ?>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><?= lang('cancel') ?></button>
                        <button type="submit" class="btn btn-sm btn-success"><?= lang('save') ?></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        setTimeout(hideActived, 3600);
        const menuPanel = $("#menu_panel").addClass('active');

        // auto check update
        $.get("./upgrade.php?action=check_update", function(result) {
            if (result.code === 200) {
                $("#ckup").append('<span class="badge bg-danger ml-1">!</span>');
            }
        });
    </script>
<?php endif ?>
<?php if (User::isAdmin()): ?>
    <div class="row">
        <?php doAction('adm_main_content') ?>
    </div>
<?php endif; ?>