<?php if (!defined('EMLOG_ROOT')) {
	exit('error!');
} ?>
<?php if (isset($_GET['error'])): ?>
<!--vot-->    <div class="alert alert-danger"><?=lang('store_unavailable')?></div><?php endif ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<!--vot-->    <h1 class="h3 mb-0 text-gray-800"><?=lang('app_store')?> - <?= $sub_title ?></h1>
</div>
<div class="row mb-4 ml-1">
    <ul class="nav nav-pills">
<!--vot-->        <li class="nav-item"><a class="nav-link" href="./store.php"><?=lang('ext_store_templates')?></a></li>
<!--vot-->        <li class="nav-item"><a class="nav-link" href="./store.php?action=plu"><?=lang('ext_store_plugins')?></a></li>
        <li class="nav-item"><a class="nav-link" href="./store.php?action=svip">铁杆SVIP专属</a></li>
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
                        <div class="card-text d-flex justify-content-between">
                            <div class="installMsg"></div>
							<?php if (empty($v['download_url'])): ?>
<!--vot-->                                <a href="<?= $v['buy_url'] ?>" class="btn btn-success btn-sm"><?=lang('contact_to_install')?></a>
							<?php else: ?>
<!--vot-->                                <a href="#" class="btn btn-success btn-sm installBtn" data-url="<?= urlencode($v['download_url']) ?>" data-type="<?= $v['type'] ?>"><?= lang('install_free') ?></a>
							<?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
		<?php endforeach ?>
	<?php else: ?>
        <div class="col-md-12">
<!--vot-->            <p class="alert alert-warning m-3"><?=lang('no_my_apps')?></p>
        </div>
	<?php endif ?>
</div>
<script>
    $("#menu_store").addClass('active');
    setTimeout(hideActived, 3600);
</script>
