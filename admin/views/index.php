<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['add_shortcut_suc'])): ?>
    <div class="alert alert-success"><?= lang('set_ok') ?></div><?php endif ?>
    <div class="d-flex align-items-center mb-3">
        <div class="flex-shrink-0">
            <a class="mr-2" href="blogger.php">
                <img src="<?= empty($user_cache[UID]['avatar']) ? './views/images/avatar.svg' : '../' . $user_cache[UID]['avatar'] ?>"
                     alt="avatar" class="img-fluid rounded-circle border border-mute border-3"
                     style="width: 56px;">
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
                    <?= lang('quick_entries') ?>:
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
                            <span>
                            <?php if (!Register::isRegLocal()) : ?>
                                <a href="auth.php"><span class="badge badge-secondary">Emlog <?= Option::EMLOG_VERSION ?> <?= lang('unregistered') ?>, <?= lang('click_to_register') ?></span></a>
                            <?php elseif (Register::getRegType() === 2): ?>
                                <span class="badge badge-success">Emlog <?= ucfirst(Option::EMLOG_VERSION) ?></span> <a href="https://www.emlog.net/register" class="badge badge-warning"><?= lang('svip_hard') ?></a>
                            <?php elseif (Register::getRegType() === 1): ?>
                                <span class="badge badge-success">Emlog <?= ucfirst(Option::EMLOG_VERSION) ?></span> <a href="https://www.emlog.net/register" class="badge badge-success"><?= lang('vip_friend') ?></a>
                            <?php else: ?>
                                <span class="badge badge-success">Emlog <?= ucfirst(Option::EMLOG_VERSION) ?></span> <a href="https://www.emlog.net/register" class="badge badge-success"><?= lang('registered') ?></a>
                            <?php endif ?>
                                </span>
                            <span>
                                <a id="ckup" href="javascript:checkUpdate();" class="badge badge-success d-flex align-items-center"><span><?= lang('update_check') ?></span></a>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if (!Register::isRegLocal()) : ?>
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
                    </div>
                    <div class="card-footer text-center">
                        <a href="auth.php" class="btn btn-sm btn-primary shadow-lg"><?= lang('register_now') ?></a>
                        <a href="https://emlog.net/register" target="_blank" class="btn btn-sm btn-success shadow-lg"><?= lang('get_emkey') ?></a>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <?php if (option::get('help_guide') === 'y'): ?>
            <div class="col-lg-6 mb-3">
                <div class="card shadow mb-3">
                    <h6 class="card-header"><?= lang('official_news') ?></h6>
                    <div class="card-body admin_index_list">
                        <ul class="list-group list-group-flush">
<!--vot-->              <li class="msg_type_0 mt-2"><a href="<?= ROOT_URL ?>/docs/faq/" target="_blank"><?= lang('help_faq') ?></a></li>
<!--vot-->              <li class="msg_type_0 mt-2"><a href="<?= ROOT_URL ?>/docs/contact/" target="_blank"><?= lang('contacts') ?></a></li>
<!--vot-->              <li class="msg_type_0 mt-2"><a href="<?= ROOT_URL ?>/docs/develop/" target="_blank"><?= lang('app_development') ?></a></li>
<!--vot-->              <li class="msg_type_0 mt-2"><a href="https://github.com/codersclub/emlog.ml" target="_blank">Emlog.ML at github</a></li>
<!--vot-->              <li class="msg_type_0 mt-2"><a href="https://codersclub.org/discuzx/forum.php?mod=forumdisplay&fid=133" target="_blank"><?= lang('discussion') ?></a></li>
<!--vot-->              <li class="msg_type_0 mt-2"><a href="https://github.com/codersclub/emlog.ml/issues" target="_blank"><?= lang('feedback') ?></a></li>
                    </ul>
                </div>
<!--vot-->      <h6 class="card-header">Chinese emlog <?= lang('official_news') ?></h6>
                <div class="card-body admin_index_list">
                    <ul class="list-group list-group-flush">
                        <li class="msg_type_0 mt-2"><a href="https://www.emlog.net/docs/#/faq" target="_blank"><?= lang('help_faq') ?></a></li>
                        <li class="msg_type_0 mt-2"><a href="https://www.emlog.net/docs/#/contact" target="_blank"><?= lang('contacts') ?></a></li>
                        <li class="msg_type_0 mt-2"><a href="https://emlog.cn/" target="_blank"><?= lang('feedback') ?></a></li>
                        <li class="msg_type_0 mt-2"><a href="https://www.emlog.net/docs/#/develop" target="_blank"><?= lang('app_development') ?></a></li>
<!--vot-->              <li class="msg_type_0 mt-2"><a href="https://github.com/emlog/emlog" target="_blank">Chinese emlog at github</a></li>
<!--vot-->              <li class="msg_type_0 mt-2"><a href="https://github.com/emlog/emlog/discussions" target="_blank"><?= lang('feedback') ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if (Register::isRegLocal() && option::get('accept_app_recs') === 'y'): ?>
            <div class="col-lg-6 mb-3">
                <div class="card mb-3">
                    <h6 class="card-header"><?= lang('app_recommended') ?></h6>
                    <div class="card-body">
                        <ul class="list-group list-group-flush" id="app-list">
                        </ul>
                    </div>
                </div>
            </div>
            <script>loadTopAddons();</script>
        <?php endif; ?>
    </div>
    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="update-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
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
            <div class="modal-content">
                <div class="modal-header">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?= lang('cancel') ?></button>
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
        $.get("./upgrade.php?action=check_update", function (result) {
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