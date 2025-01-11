<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['active_del'])): ?>
    <div class="alert alert-success"><?= lang('backup_delete_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_backup'])): ?>
    <div class="alert alert-success"><?= lang('backup_create_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_import'])): ?>
    <div class="alert alert-success"><?= lang('backup_import_ok') ?></div><?php endif ?>
<?php if (isset($_GET['error_a'])): ?>
    <div class="alert alert-danger"><?= lang('backup_file_select') ?></div><?php endif ?>
<?php if (isset($_GET['error_b'])): ?>
    <div class="alert alert-danger"><?= lang('backup_file_invalid') ?></div><?php endif ?>
<?php if (isset($_GET['error_c'])): ?>
    <div class="alert alert-danger"><?= lang('backup_import_zip_unsupported') ?></div><?php endif ?>
<?php if (isset($_GET['error_d'])): ?>
    <div class="alert alert-danger"><?= lang('backup_upload_failed') ?></div><?php endif ?>
<?php if (isset($_GET['error_e'])): ?>
    <div class="alert alert-danger"><?= lang('backup_file_wrong') ?></div><?php endif ?>
<?php if (isset($_GET['error_f'])): ?>
    <div class="alert alert-danger"><?= lang('backup_export_zip_unsupported') ?></div><?php endif ?>
<?php if (isset($_GET['active_mc'])): ?>
    <div class="alert alert-success"><?= lang('cache_update_ok') ?></div><?php endif ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800"><?= lang('data_backup') ?></h1>
</div>
<div class="card-deck">
    <div class="card">
        <h5 class="card-header"><?= lang('db_backup') ?></h5>
        <div class="card-body">
            <div id="backup">
                <p><?= lang('backup_prompt') ?></p>
            </div>
        </div>
        <div class="card-footer">
            <form action="data.php?action=backup" method="post" class="text-right">
                <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
                    <input type="submit" value="<?= lang('backup_start') ?>" class="btn btn-sm btn-success" />
            </form>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header"><?= lang('backup_import_local') ?></h5>
        <form action="data.php?action=import" enctype="multipart/form-data" method="post">
            <div class="card-body">
                <div id="import">
                    <p class="des"><?= lang('backup_version_tip') ?> <?= DB_PREFIX ?></p>
                </div>
                <div>
                    <input type="file" id="sqlfile" name="sqlfile" required>
                </div>
            </div>
            <div class="card-footer text-right">
                <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
                <input type="submit" value="<?= lang('backup_import_local') ?>" class="btn btn-sm btn-success" />
            </div>
        </form>
    </div>
    <div class="card">
        <h5 class="card-header"><?= lang('cache_update') ?></h5>
        <div class="card-body">
            <div id="cache">
                <p class="des"><?= lang('cache_update_info') ?></p>
            </div>
        </div>
        <div class="card-footer text-right">
            <input type="button" onclick="window.location='data.php?action=Cache';" value="<?= lang('cache_update') ?>" class="btn btn-sm btn-success" />
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#menu_category_sys").addClass('active');
        $("#menu_sys").addClass('show');
        $("#menu_data").addClass('active');
        setTimeout(hideActived, 3600);
    });
</script>