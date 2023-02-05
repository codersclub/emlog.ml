<?php if (!defined('EMLOG_ROOT')) {
	exit('error!');
} ?>
<?php if (isset($_GET['active'])): ?>
<!--vot-->    <div class="alert alert-success"><?=lang('install_ok')?></div><?php endif ?>
<?php if (isset($_GET['error_param'])): ?>
<!--vot-->    <div class="alert alert-danger"><?=lang('install_failed')?></div><?php endif ?>
<?php if (isset($_GET['error_down'])): ?>
<!--vot-->    <div class="alert alert-danger"><?=lang('install_failed_download')?></div><?php endif ?>
<?php if (isset($_GET['error_dir'])): ?>
<!--vot-->    <div class="alert alert-danger"><?=lang('install_failed_write')?></div><?php endif ?>
<?php if (isset($_GET['error_zip'])): ?>
<!--vot-->    <div class="alert alert-danger"><?=lang('install_failed_zip')?></div><?php endif ?>
<?php if (isset($_GET['error_source'])): ?>
<!--vot-->    <div class="alert alert-danger"><?=lang('install_invalid_ext')?></div><?php endif ?>

<?php if (isset($_GET['error'])): ?>
    <div class="container-fluid">
        <div class="text-center">
<!--vot-->            <p class="lead text-gray-800 mb-5"><?=lang('store_unavailable')?></p>
<!--vot-->            <a href="./">&larr; <?=lang('back_home')?></a>
        </div>
    </div>
<?php endif ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<!--vot-->    <h1 class="h3 mb-0 text-gray-800"><?=lang('app_store')?> - <?= $sub_title ?></h1>
</div>
<div class="row mb-4 ml-1">
    <ul class="nav nav-pills">
<!--vot-->        <li class="nav-item"><a class="nav-link" href="./store.php"><?=lang('ext_store_templates')?></a></li>
<!--vot-->        <li class="nav-item"><a class="nav-link" href="./store.php?action=plu"><?=lang('ext_store_plugins')?></a></li>
<!--vot-->        <li class="nav-item"><a class="nav-link active" href="./store.php?action=mine"><?=lang('my_apps')?></a></li>
    </ul>
</div>
<div class="row">
	<?php if (!empty($addons)): ?>
		<?php foreach ($addons as $k => $v):
			$icon = $v['icon'] ?: "./views/images/theme.png";
			?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <a class="p-1" href="<?= $v['buy_url'] ?>" target="_blank">
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="<?= $icon ?>">
                    </a>
                    <div class="card-body">
                        <p class="card-text"><?= $v['name'] ?></p>
                        <p class="card-text text-muted small">
                            <span class="small"><?= $v['info'] ?></span><br><br>
<!--vot-->                            <?=lang('developer')?>: <?= $v['author'] ?><br>
<!--vot-->                            <?=lang('version_number')?>: <?= $v['ver'] ?><br>
<!--vot-->                            <?=lang('update_time')?>: <?= $v['update_time'] ?><br>
                        </p>
                        <p class="card-text text-right">
							<?php if (!empty($v['download_url'])): ?>
<!--vot-->                                <a href="./store.php?action=install&source=<?= urlencode($v['download_url']) ?>&type=<?= $v['type'] ?>" class="btn btn-success btn-sm"><?=lang('install')?></a>
							<?php else: ?>
<!--vot-->                                <a href="<?= $v['buy_url'] ?>" class="btn btn-success btn-sm"><?=lang('contact_to_install')?></a>
							<?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
		<?php endforeach ?>
	<?php else: ?>
        <div class="col-md-12">
<!--vot-->            <div class="alert alert-info"><?=lang('no_my_apps')?></div>
        </div>
	<?php endif ?>
</div>
<script>
    $("#menu_store").addClass('active');
    setTimeout(hideActived, 3600);
</script>
