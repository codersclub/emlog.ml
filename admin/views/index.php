<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div class="mb-0 text-gray-800">
            <span class="h4"><?= lang('welcome') ?>, <a class="small" href="./blogger.php"><?= $user_cache[UID]['name'] ?></a></span>
            <span class="badge badge-primary ml-2"><?= $role_name ?></span>
        </div>
        <a href="./article.php?action=write" class="btn btn-sm btn-success shadow-sm mt-4"><i class="icofont-pencil-alt-5"></i> <?= lang('article_add') ?></a>
    </div>
    <div class="row ml-1 mb-1"><?php doAction('adm_main_top') ?></div>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <h6 class="card-header"><?= lang('site_info') ?></h6>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="row">
                            <div class="col-xl-4 col-md-6 mb-1">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="small font-weight-bold text-primary text-uppercase mb-1"><?= lang('articles_pending') ?></div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="./article.php?checked=n"><?= $sta_cache['checknum'] ?></a></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="icofont-pencil-alt-5 fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 mb-1">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="small font-weight-bold text-warning text-uppercase mb-1">
                                                    <?= lang('pending_review') ?>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="./comment.php?hide=y"><?= $sta_cache['hidecomnum'] ?></a></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="icofont-comment fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-1">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="small font-weight-bold text-success text-uppercase mb-1">
                                                    <?= lang('user_num') ?>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="./user.php"><?= count($user_cache) ?></a></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="icofont-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="./article.php"><?= lang('articles') ?></a>
                            <a href="./article.php"><span class="badge badge-primary badge-pill"><?= $sta_cache['lognum'] ?></span></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="./twitter.php"><?= lang('twitters') ?></a>
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
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
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
                        <li class="list-group-item d-flex justify-content-between align-items-center mt-2">
                            <span>
                            <?php if (!Register::isRegLocal()) : ?>
                                <a href="auth.php"><span class="badge badge-secondary">Emlog <?= Option::EMLOG_VERSION ?> <?= lang('unregistered') ?>, <?= lang('click_to_register') ?></span></a>
                            <?php elseif (Register::getRegType() == 2): ?>
                                <span class="badge badge-warning">Emlog <?= ucfirst(Option::EMLOG_VERSION) ?> <?= lang('svip_hard') ?></span>
                            <?php elseif (Register::getRegType() == 1): ?>
                                <span class="badge badge-success">Emlog <?= ucfirst(Option::EMLOG_VERSION) ?> <?= lang('vip_friend') ?></span>
                            <?php else: ?>
                                <span class="badge badge-success">Emlog <?= ucfirst(Option::EMLOG_VERSION) ?> <?= lang('registered') ?></span>
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
            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white">
                        <h6 class="my-0"><?= lang('emlog_reg_advantages') ?></h6>
                    </div>
                    <div class="card-body">
                        <div><?= lang('advantage1') ?></div>
                        <div><?= lang('advantage2') ?></div>
                        <div><?= lang('advantage3') ?></div>
                        <div><?= lang('advantage4') ?></div>
                        <div><?= lang('advantage5') ?></div>
                        <div><?= lang('advantage6') ?></div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="auth.php" class="btn btn-sm btn-primary shadow-lg"><?= lang('register_now') ?></a>
                        <a href="https://emlog.io/register" target="_blank" class="btn btn-sm btn-success shadow-lg"><?= lang('get_emkey') ?></a>
                    </div>
                </div>
            </div>
        <?php endif ?>
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <h6 class="card-header"><?= lang('official_news') ?></h6>
                <div class="card-body admin_index_list">
                    <ul class="list-group list-group-flush">
                        <li class="msg_type_0"><a href="https://emlog.io/docs/#/faq" target="_blank"><?= lang('help_faq') ?></a></li>
                        <li class="msg_type_0"><a href="https://emlog.io/docs/#/contact" target="_blank"><?= lang('contacts') ?></a></li>
                        <li class="msg_type_0"><a href="https://github.com/emlog/emlog-ml/discussions" target="_blank"><?= lang('feedback') ?></a></li>
                        <li class="msg_type_0"><a href="https://emlog.io/docs/#/develop" target="_blank"><?= lang('app_development') ?></a></li>

                    </ul>
                </div>
            </div>
        </div>
        <?php if (Register::isRegLocal() && option::get('accept_app_recs') === 'y'): ?>
            <div class="col-lg-6 mb-4">
                <div class="card mb-4">
                    <h6 class="card-header"><?= lang('app_recommended') ?></h6>
                    <div class="card-body">
                        <div class="row" id="app-list"></div>
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
    <script>
        setTimeout(hideActived, 3600);
        const menuPanel = $("#menu_panel").addClass('active');

        // Check for updates
        $.get("./upgrade.php?action=check_update", function (result) {
            if (result.code === 200) {
                $("#ckup").append('<span class="badge bg-danger ml-1">!</span>');
            }
        });

        function checkUpdate() {
            const updateModal = $("#update-modal");
            const updateModalLoading = $("#update-modal-loading");
            const updateModalMsg = $("#update-modal-msg");
            const updateModalChanges = $("#update-modal-changes");
            const updateModalBtn = $("#update-modal-btn");

            updateModal.modal('show');
            updateModalLoading.addClass("spinner-border text-primary");

            let rep_msg = "";
            let rep_changes = "";
            let rep_btn = "";

            updateModalMsg.html(rep_msg);
            updateModalChanges.html(rep_changes);
            updateModalBtn.html(rep_btn);

            $.get("./upgrade.php?action=check_update", function (result) {
                if (result.code === 1001) {
                    rep_msg = lang('emlog_not_registered') + ", <a href=\"auth.php\">" + lang('register) + "</a>";
                } else if (result.code === 1002) {
                    rep_msg = lang('is_latest_version');
                } else if (result.code === 200) {
/*vot*/             rep_msg = lang('new_ver_available') + ': <span class="text-danger">' + result.data.version + '</span> <br><br>';
                    rep_changes = "<b>" + lang('view_changelog') + "</b>:<br>" + result.data.changes;
/*vot*/             rep_btn = '<hr><a href="javascript:doUp(\'' + result.data.file + '\',\'' + result.data.sql + '\');" class="btn btn-success btn-sm">' + lang('update_now') + '</a>';
                } else {
                    rep_msg = lang('check_failed');
                }

                updateModalLoading.removeClass();
                updateModalMsg.html(rep_msg);
                updateModalChanges.html(rep_changes);
                updateModalBtn.html(rep_btn);
            });
        }

        function doUp(source, upSQL) {
            const updateModalLoading = $("#update-modal-loading");
            const updateModalMsg = $("#update-modal-msg");
            const updateModalChanges = $("#update-modal-changes");
            const upmsg = $("#upmsg");

            updateModalLoading.addClass("spinner-border text-primary");
            updateModalMsg.html(lang('updating_now'));
            updateModalChanges.html("");

            $.get(`./upgrade.php?action=update&source=${source}&upsql=${upSQL}`, function (data) {
                upmsg.removeClass();

                if (data.includes("succ")) {
                    updateModalMsg.html(lang('updated_ok'));
                } else if (data.includes("error_down")) {
                    updateModalMsg.html(lang('update_download_fail'));
                } else if (data.includes("error_zip")) {
                    updateModalMsg.html(lang('unzip_fail'));
                } else if (data.includes("error_dir")) {
                    updateModalMsg.html(lang('update_not_writable'));
                } else {
                    updateModalMsg.html(lang('update_fail'));
                }

                updateModalLoading.removeClass();
            });
        }
    </script>
<?php endif ?>
<?php if (User::isAdmin()): ?>
    <div class="row">
        <?php doAction('adm_main_content') ?>
    </div>
<?php endif; ?>