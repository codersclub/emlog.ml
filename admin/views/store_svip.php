<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger"><?=lang('store_unavailable')?></div><?php endif ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800"><?=lang('app_store')?> - <?= $sub_title ?></h1>
</div>
<div class="row mb-4 ml-1">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="./store.php"><?=lang('all_apps')?></a></li>
        <li class="nav-item"><a class="nav-link" href="./store.php?action=tpl"><?=lang('ext_store_templates')?></a></li>
        <li class="nav-item"><a class="nav-link" href="./store.php?action=plu"><?=lang('ext_store_plugins')?></a></li>
        <li class="nav-item"><a class="nav-link active" href="./store.php?action=svip"><?=lang('svip')?></a></li>
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
            $type = $v['app_type'] === 'template' ? 'tpl' : 'plugin';
            ?>
            <div class="col-md-6 col-lg-3">
                <div class="card mb-4 shadow-sm">
                    <a href="#appModal" class="p-1" data-toggle="modal" data-target="#appModal" data-name="<?= $v['name'] ?>" data-url="<?= $v['app_url'] ?>" data-buy-url="<?= $v['buy_url'] ?>">
                        <img class="bd-placeholder-img card-img-top" alt="cover" width="100%" height="225" src="<?= $icon ?>">
                    </a>
                    <div class="card-body">
                        <p class="card-text font-weight-bold">
                            <a href="#appModal" data-toggle="modal" data-target="#appModal" data-name="<?= $v['name'] ?>" data-url="<?= $v['app_url'] ?>" data-buy-url="<?= $v['buy_url'] ?>"><?= $v['name'] ?></a>
                            <?php if ($type === 'tpl'): ?>
                                <span class="badge badge-success p-1"><?= lang('templates') ?></span>
                            <?php else: ?>
                                <span class="badge badge-primary p-1"><?= lang('plugins') ?></span>
                            <?php endif; ?>
                        </p>
                        <p class="card-text text-muted small">
                            <?=lang('developer')?>: <a href="./store.php?author_id=<?= $v['author_id'] ?>"><?= $v['author'] ?></a><br>
                            <?=lang('version_number')?>: <?= $v['ver'] ?><br>
                            <?= lang('download_count') ?>: <?= $v['downloads'] ?><br>
                            <?=lang('update_time')?>: <?= $v['update_time'] ?><br>
                        </p>
                        <div class="card-text d-flex justify-content-between">
                            <div class="installMsg"></div>
                            <div>
                                <a href="#" class="btn btn-warning installBtn" data-url="<?= urlencode($v['download_url']) ?>" data-cdn-url="<?= urlencode($v['cdn_download_url']) ?>" data-type="<?= $type ?>"><?= lang('install_now') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<div class="modal fade" id="appModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <div>
                    <a href="" class="modal-buy-url text-muted" target="_blank"><?= lang('go_off_site') ?></a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#menu_store").addClass('active');
        setTimeout(hideActived, 3600);
    });
</script>
