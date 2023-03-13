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
<!--vot-->        <li class="nav-item"><a class="nav-link active" href="./store.php?action=svip"><?=lang('svip')?></a></li>
<!--vot-->        <li class="nav-item"><a class="nav-link" href="./store.php?action=mine"><?=lang('my_apps')?></a></li>
    </ul>
</div>
<div class="mb-3">
	<?php if (!empty($addons)): ?>
		<div class="d-flex flex-wrap justify-content-center app-list">
            <?php foreach ($addons as $k => $v):
                $icon = $v['icon'] ?: "./views/images/theme.png";
                ?>
                <div class="card mb-4 mr-4 shadow-sm">
                    <a class="card-img-top-link d-flex border-bottom-light overflow-hidden" href="<?= $v['buy_url'] ?>" target="_blank">
                        <img class="bd-placeholder-img card-img-top" alt="cover" src="<?= $icon ?>">
                    </a>
                    <div class="card-body">
                        <p class="card-text font-weight-bold overflow-hidden text-nowrap name"><?= $v['name'] ?></p>

                        <div class="card-text d-flex justify-content-between">
                            <div class="price mb-4">
<!--vot-->                      <?= $v['price'] > 0 ? '<span class="text-danger">¥ ' . $v['price'] . lang('price_unit') . '</span>' : '<span class="text-success">' . lang('free') . '</span>' ?><br>
                            </div>
                            <div class="installMsg"></div>
<!--vot-->                            <a href="#" class="btn btn-success btn-sm installBtn" data-url="<?= urlencode($v['download_url']) ?>" data-type="plu"><?=lang('install_free')?></a>
                        </div>

                        <p class="card-text text-muted small">
<!--vot-->                  <?=lang('developer')?>:&nbsp;&nbsp;&nbsp;&nbsp;<?= $v['author'] ?><br>
<!--vot-->                  <?=lang('version_number')?>:&nbsp;&nbsp;&nbsp;&nbsp;<?= $v['ver'] ?><br>
<!--vot-->                  <?=lang('update_time')?>:<?= $v['update_time'] ?><br>
                        </p>
                        <div class="small"><?= $v['info'] ?></div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
	<?php else: ?>
        <div class="col-md-12">
<!--vot-->            <p class="alert alert-warning m-3"><?=lang('not_svip')?>, <a href="https://www.emlog.net/register"><?=lang('paid_support')?></a></p>
        </div>
	<?php endif ?>
</div>
<script>
    $("#menu_store").addClass('active');
    setTimeout(hideActived, 3600);
</script>
