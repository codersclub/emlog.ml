<?php if (!defined('EMLOG_ROOT')) {
	exit('error!');
} ?>
<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger"><?= lang('store_unavailable') ?></div><?php endif ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= lang('app_store') ?> - <?= $sub_title ?></h1>
</div>
<div class="row mb-4 ml-1 justify-content-between">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="./store.php"><i class="icofont-paint"></i> <?= lang('ext_store_templates') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./store.php?action=plu"><?= lang('ext_store_plugins') ?></a></li>
<!--vot-->        <li class="nav-item"><a class="nav-link" href="./store.php?action=svip"><?=lang('svip')?></a></li>
<!--vot-->        <li class="nav-item"><a class="nav-link" href="./store.php?action=mine"><?=lang('my_apps')?></a></li>
    </ul>
    <form action="./store.php" method="get">
        <div class="form-inline search-inputs-nowrap">
            <input type="text" name="keyword" value="<?= $keyword ?>" class="form-control m-1 small" placeholder="<?= lang('temlate_search') ?>">
            <div class="input-group-append">
                <button class="btn btn-sm btn-success" type="submit">
                    <i class="icofont-search-2"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<div class="row mb-3 ml-1">
    <a href="./store.php" class="badge badge-success m-1 p-2"><?= lang('free_zone') ?></a>
    <a href="./store.php?tag=free" class="badge badge-success m-1 p-2"><?= lang('free_zone') ?></a>
    <a href="./store.php?tag=paid" class="badge badge-warning m-1 ml-2 p-2"><?= lang('paid_zone') ?></a>
</div>
<div class="row">
	<?php if (!empty($templates)): ?>
		<?php foreach ($templates as $k => $v):
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
<!--vot-->                  <?= lang('price') ?>: <?= $v['price'] > 0 ? '<span class="text-danger">' . $v['price'] . '&yen;</span>' : '<span class="text-success">' . lang('free') . '</span>' ?><br>
<!--vot-->		    <?= lang('developer') ?>: <?= $v['author'] ?> <a href="./store.php?author_id=<?= $v['author_id'] ?>"><?=lang('this_author_only')?></a><br>
			    <?= lang('version_number') ?>: <?= $v['ver'] ?><br>
			    <?= lang('update_time') ?>: <?= $v['update_time'] ?><br>
                        </p>
                        <div class="card-text d-flex justify-content-between">
                            <div class="installMsg"></div>
							<?php if ($v['price'] > 0): ?>
<!--vot-->                                <a href="<?= $v['buy_url'] ?>" class="btn btn-sm btn-warning btn-sm" target="_blank"><?= lang('go_buy') ?></a>
							<?php else: ?>
<!--vot-->                                <a href="#" class="btn btn-success btn-sm installBtn" data-url="<?= urlencode($v['download_url']) ?>" data-type="tpl"><?= lang('install_free') ?></a>
							<?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
		<?php endforeach ?>
<!--vot-->        <div class="col-md-12 page my-5"><?= $pageurl ?> (<?=lang('have')?> <?= $count ?><?=lang('_templates')?>)</div>
	<?php else: ?>
        <div class="col-md-12">
            <div class="alert alert-info"><?= lang('store_no_results') ?></div>
        </div>
	<?php endif ?>
</div>
<script>
    $("#menu_store").addClass('active');
    setTimeout(hideActived, 3600);
</script>
