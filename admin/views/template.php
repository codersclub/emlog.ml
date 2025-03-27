<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['activated'])): ?>
    <div class="alert alert-success"><?= lang('template_change_ok') ?></div><?php endif ?>
<?php if (isset($_GET['activate_install'])): ?>
    <div class="alert alert-success"><?= lang('template_upload_ok') ?></div><?php endif ?>
<?php if (isset($_GET['activate_upgrade'])): ?>
    <div class="alert alert-success"><?=lang('template_update_ok')?></div><?php endif ?>
<?php if (isset($_GET['error_f'])): ?>
    <div class="alert alert-danger"><?= lang('template_delete_failed') ?></div><?php endif ?>
<?php if (!$nonce_template_data): ?>
    <div class="alert alert-danger"><?= lang('template_current_use') ?>(<?= $nonce_template ?>) <?= lang('template_damaged') ?></div><?php endif ?>
<?php if (isset($_GET['error_a'])): ?>
    <div class="alert alert-danger"><?= lang('template_zip_support') ?></div><?php endif ?>
<?php if (isset($_GET['error_b'])): ?>
    <div class="alert alert-danger"><?= lang('template_not_writable') ?></div><?php endif ?>
<?php if (isset($_GET['error_d'])): ?>
    <div class="alert alert-danger"><?= lang('template_select_zip') ?></div><?php endif ?>
<?php if (isset($_GET['error_e'])): ?>
    <div class="alert alert-danger"><?= lang('template_non_standard') ?></div><?php endif ?>
<?php if (isset($_GET['error_f'])): ?>
    <div class="alert alert-danger"><?=lang('php_size_limit')?></div><?php endif ?>
<?php if (isset($_GET['error_c'])): ?>
    <div class="alert alert-danger"><?= lang('plugin_zip_nonsupport') ?></div><?php endif ?>
<?php if (isset($_GET['error_i'])): ?>
    <div class="alert alert-danger"><?=lang('emlog_unregistered')?></div><?php endif ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= lang('template_manager') ?></h1>
    <div>
        <a href="store.php" class="btn btn-primary shadow-sm mr-2">
            <i class="icofont-shopping-cart mr-1"></i><?= lang('app_store') ?>
        </a>
        <a href="#" class="btn btn-success shadow-sm" data-toggle="modal" data-target="#addModal">
            <i class="icofont-plus mr-1"></i><?= lang('template_install') ?>
        </a>
    </div>
</div>

<div class="row app-list">
    <?php foreach ($templates as $key => $value): ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm hover-shadow-lg" data-app-alias="<?= $value['tplfile'] ?>" data-app-version="<?= $value['version'] ?>">
                <div class="card-header border-0 py-3 <?php if ($nonce_template == $value['tplfile']) {
                                                            echo "bg-success text-white";
                                                        } ?>">
                    <h5 class="card-title mb-0 font-weight-bold"><?= $value['tplname'] ?></h5>
                </div>
                <div class="card-body p-0">
                    <a href="template.php?action=use&tpl=<?= $value['tplfile'] ?>&token=<?= LoginAuth::genToken() ?>" class="template-preview">
                        <img class="card-img-top" src="<?= $value['preview'] ?>" alt="<?= $value['tplname'] ?>">
                    </a>
                </div>
                <div class="card-footer bg-white border-0 p-4">
                    <div class="mb-3">
                        <?php if ($nonce_template == $value['tplfile']): ?>
                            <span class="badge badge-success mr-2"><?= lang('enabled') ?></span>
                        <?php endif; ?>
                        <?php if ($value['version']): ?>
                            <span class="badge badge-light mr-2"><?=lang('version_number')?>:<?= $value['version'] ?></span>
                        <?php endif ?>
<!--vot-->              <?php if (!empty($value['author_url'])): ?>
                            <span class="badge badge-light"><?= lang('author') ?>: <a href="<?= $value['author_url'] ?>" target="_blank"><?= $value['author'] ?></a></span>
                        <?php elseif ($value['author']): ?>
                            <span class="badge badge-light"><?= lang('author') ?>: <?= $value['author'] ?></span>
                        <?php endif ?>
                    </div>
                    <p class="card-text text-muted small mb-3">
                        <?= $value['tpldes'] ?>
                        <?php if (strpos($value['tplurl'], 'https://www.emlog.net') === 0): ?>
                            | <a href="<?= $value['tplurl'] ?>" target="_blank"><?= lang('more_info') ?></a>
                        <?php endif ?>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <?php if ($nonce_template !== $value['tplfile']): ?>
                                <a class="btn btn-outline-success btn-sm" href="template.php?action=use&tpl=<?= $value['tplfile'] ?>&token=<?= LoginAuth::genToken() ?>">
                                    <i class="icofont-check-circled mr-1"></i><?= lang('enable') ?>
                                </a>
                            <?php else: ?>
                                <span class="setting-btn"></span>
                            <?php endif ?>
                            <span class="update-btn"></span>
                        </div>
                        <div>
                            <a class="btn btn-outline-danger btn-sm" href="javascript: em_confirm('<?= $value['tplfile'] ?>', 'tpl', '<?= LoginAuth::genToken() ?>');">
                                <?= lang('delete') ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title"><?= lang('template_new_install') ?></h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="./template.php?action=upload_zip" method="post" enctype="multipart/form-data">
                <div class="modal-body px-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="tplzip" id="tplzip">
                        <label class="custom-file-label" for="tplzip"><?= lang('template_select') ?></label>
                        <input name="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
                    </div>
                    <small class="form-text text-muted mt-2">
                        <?= lang('template_upload') ?>
                    </small>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-dismiss="modal"><?= lang('cancel') ?></button>
                    <button type="submit" class="btn btn-success">
                        <i class="icofont-upload mr-1"></i><?= lang('upload_install') ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .template-preview {
        display: block;
        overflow: hidden;
    }

    .template-preview img {
        transition: transform 0.3s ease;
    }

    .template-preview:hover img {
        transform: scale(1.05);
    }
</style>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= lang('template_install') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="./template.php?action=upload_zip" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div>
                        <p><?= lang('template_upload_prompt') ?></p>
                        <p>
                            <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
                            <input name="tplzip" type="file" />
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?= lang('cancel') ?></button>
                    <button type="submit" class="btn btn-sm btn-success"><?= lang('upload') ?></button>
                    <span id="alias_msg_hook"></span>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // check for upgrade
    $(function() {
        setTimeout(hideActived, 3600);
        $("#menu_category_view").addClass('active');
        $("#menu_view").addClass('show');
        $("#menu_tpl").addClass('active');

        var templateList = [];
        $('.app-list .card').each(function() {
            var $card = $(this);
            var alias = $card.data('app-alias');
            var version = $card.data('app-version');
            templateList.push({
                name: alias,
                version: version
            });
        });
        $.ajax({
            url: './template.php?action=check_update',
            type: 'POST',
            data: {
                templates: templateList
            },
            success: function(response) {
                if (response.code === 0) {
                    var pluginsToUpdate = response.data;
                    $.each(pluginsToUpdate, function(index, item) {
                        var $tr = $('.app-list .card[data-app-alias="' + item.name + '"]');
                        var $updateBtn = $tr.find('.update-btn');
                        var $updateLink = $('<a>').addClass('btn btn-warning btn-sm').text(jlang('update')).attr("href", "javascript:void(0);");
                        $updateLink.on('click', function() {
                            updateTemplate(item.name, $updateLink);
                        });
                        $updateBtn.append($updateLink);
                    });
                } else {
                    console.log(lang('update_error'));
                }
            },
            error: function() {
                console.log(lang('update_request_error'));
            }
        });
    });

    function updateTemplate(alias, $updateLink) {
        $updateLink.text(jlang('updating')).prop('disabled', true);
        $.ajax({
            url: './template.php?action=upgrade',
            type: 'GET',
            data: {
                alias: alias,
                token: '<?= LoginAuth::genToken() ?>'
            },
            success: function(response) {
                if (response.code === 0) {
                    location.href = 'template.php?activate_upgrade=1';
                } else {
                    $updateLink.text(jlang('update')).prop('disabled', false);
                    cocoMessage.error(response.msg, 4000);
                }
            },
            error: function(xhr) {
                $updateLink.text(jlang('update')).prop('disabled', false);
                cocoMessage.error(jlang('update_failed'), 4000)
            }
        });
    }
</script>