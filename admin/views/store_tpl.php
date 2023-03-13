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
<div class="mb-3">
	<?php if (!empty($templates)): ?>
        <div class="d-flex flex-wrap justify-content-center app-list">
            <?php foreach ($templates as $k => $v):
                $icon = $v['icon'] ?: "./views/images/theme.png";
                ?>
                <div class="card mb-4 mr-4 shadow-sm">
                    <a class="card-img-top-link d-flex border-bottom-light overflow-hidden" href="<?= $v['buy_url'] ?>" target="_blank">
                        <img class="bd-placeholder-img card-img-top" alt="cover" src="<?= $icon ?>">
                    </a>
                    <div class="card-body">
                        <p class="card-text font-weight-bold overflow-hidden text-nowrap name">
                            <?php if ($v['top'] === 1): ?>
<!--vot-->                                <span class="badge badge-success p-1 mr-1"><?=lang('recommend_today')?></span>
                            <?php endif; ?>
                            <a class="text-secondary" href="<?= $v['buy_url'] ?>" target="_blank"><?= $v['name'] ?></a>
                        </p>

                        <div class="card-text d-flex justify-content-between">
                            <div class="price mb-4">
<!--vot-->                      <?= $v['price'] > 0 ? '<span class="text-danger">&yen; ' . $v['price'] . ' ' . lang('price_unit') ?> . '</span>' : '<span class="text-success">' . lang('free') . '</span>' ?><br>
                            </div>
                            <div class="installMsg"></div>
                            <?php if ($v['price'] > 0): ?>
<!--vot-->                                <a href="<?= $v['buy_url'] ?>" class="btn btn-sm btn-warning btn-sm" target="_blank"><?= lang('go_buy') ?></a>
                            <?php else: ?>
<!--vot-->                                <a href="#" class="btn btn-success btn-sm installBtn" data-url="<?= urlencode($v['download_url']) ?>" data-type="tpl"><?= lang('install_free') ?></a>
                            <?php endif ?>
                        </div>
                        <p class="card-text text-muted small">
<!--vot-->                  <?= lang('developer') ?>:&nbsp;&nbsp;&nbsp;&nbsp;<?= $v['author'] ?> <a href="./store.php?author_id=<?= $v['author_id'] ?>"><?=lang('this_author_only')?></a><br>
<!--vot-->                  <?= lang('version_number') ?>:&nbsp;&nbsp;&nbsp;&nbsp;<?= $v['ver'] ?><br>
<!--vot-->                  <?= lang('update_time') ?>:<?= $v['update_time'] ?><br>
                        </p>
                        <div class="small"><?= $v['info'] ?></div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
<!--vot-->        <div class="my-5"><?= $pageurl ?> (<?=lang('have')?> <?= $count ?><?=lang('_templates')?>)</div>
	<?php else: ?>
        <div class="alert alert-info"><?= lang('store_no_results') ?></div>
	<?php endif ?>
</div>
<script>
    $("#menu_store").addClass('active');
    setTimeout(hideActived, 3600);
</script>
