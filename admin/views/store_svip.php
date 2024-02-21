<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger"><?=lang('store_unavailable')?></div><?php endif ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800"><?=lang('app_store')?> - <?= $sub_title ?></h1>
</div>
<div class="row mb-4 ml-1">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="./store.php"><?=lang('ext_store_templates')?></a></li>
        <li class="nav-item"><a class="nav-link" href="./store.php?action=plu"><?=lang('ext_store_plugins')?></a></li>
        <li class="nav-item"><a class="nav-link active text-danger" href="./store.php?action=svip"><?=lang('svip')?></a></li>
        <li class="nav-item"><a class="nav-link" href="./store.php?action=mine"><?=lang('my_apps')?></a></li>
    </ul>
</div>
<div class="mb-3">
    <div class="col-md-12">
        <p class="alert alert-warning my-3"><a href="https://www.emlog.net/register"><?= lang('svip_hard') ?></a> <?= lang('can_use_free') ?></p>
    </div>
    <div class="d-flex flex-wrap app-list">
        <?php foreach ($addons as $k => $v):
            $icon = $v['icon'] ?: "./views/images/theme.png";
            ?>
            <div class="col-md-6 col-lg-3">
                <div class="card mb-4 shadow-sm">
                    <a class="p-1" href="<?= $v['buy_url'] ?>" target="_blank">
                        <img class="bd-placeholder-img card-img-top" alt="cover" width="100%" height="225" src="<?= $icon ?>">
                    </a>
                    <div class="card-body">
                        <p class="card-text font-weight-bold"><?= $v['name'] ?></p>
                        <p class="card-text text-muted small">
                            <?=lang('developer')?>: <?= $v['author'] ?><br>
                            <?=lang('version_number')?>: <?= $v['ver'] ?><br>
                            <?=lang('update_time')?>: <?= $v['update_time'] ?><br>
                        </p>
                        <div class="card-text d-flex justify-content-between">
                            <div class="installMsg"></div>
                            <div>
                                <a href="#" class="btn btn-success installBtn" data-url="<?= urlencode($v['download_url']) ?>" data-type="plu"><?=lang('install_free')?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<script>
    $(function () {
        $("#menu_store").addClass('active');
        setTimeout(hideActived, 3600);
    });
</script>
