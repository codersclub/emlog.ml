<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger"><?= lang('store_unavailable') ?></div><?php endif ?>

<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h4 mb-0 text-gray-800"><?= lang('app_store') ?> - <?= $sub_title ?></h1>
</div>
<div class="row mb-4 ml-1">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="./store.php"><?= lang('all_apps') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./store.php?action=tpl"><?= lang('ext_store_templates') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./store.php?action=plu"><?= lang('ext_store_plugins') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./store.php?action=svip"><?= lang('hard') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./store.php?action=mine"><?= lang('my_apps') ?></a></li>
    </ul>
</div>

<div class="d-flex flex-column flex-sm-row justify-content-between mb-4 ml-1">
    <div class="mb-3 mb-sm-0">
        <a href="./store.php" class="badge badge-success m-1 p-2"><?= lang('all') ?></a>
        <a href="./store.php?tag=free" class="badge badge-success m-1 p-2"><?= lang('free_zone') ?></a>
        <a href="./store.php?tag=paid" class="badge badge-warning m-1 p-2"><?= lang('paid_zone') ?></a>
        <a href="./store.php?tag=promo" class="badge badge-danger m-1 p-2"><?= lang('limited_offer') ?></a>
        <a href="./store.php?tag=download_top" class="badge badge-light text-primary m-1 p-2 small">&#x1F525;<?= lang('top_down') ?></a>
        <a href="./store.php?sid=2" class="badge badge-light text-primary m-1 p-2 small">SEO</a>
        <a href="./store.php?sid=1" class="badge badge-light text-primary m-1 p-2 small">资源下载</a>
        <a href="./store.php?sid=12" class="badge badge-light text-primary m-1 p-2 small">内容运营</a>
        <a href="./store.php?sid=11" class="badge badge-light text-primary m-1 p-2 small">用户互动</a>
    </div>
    <div class="d-flex mb-3 mb-sm-0">
        <form action="#" method="get" class="mr-sm-2">
            <select name="action" class="form-control category">
                <?php foreach ($template_categories as $k => $v) { ?>
                    <option value="<?= $k; ?>" <?= $sid == $k ? 'selected' : '' ?>><?= $v; ?></option>
                <?php } ?>
            </select>
        </form>
        <form action="#" method="get" class="mr-sm-2">
            <select name="action" class="form-control category">
                <?php foreach ($plugin_categories as $k => $v) { ?>
                    <option value="<?= $k; ?>" <?= $sid == $k ? 'selected' : '' ?>><?= $v; ?></option>
                <?php } ?>
            </select>
        </form>
        <form action="./store.php" method="get" class="form-inline ml-2 mr-3">
            <div class="input-group">
                <input type="text" name="keyword" value="<?= $keyword ?>" class="form-control small" placeholder="<?= lang('app_search') ?>...">
                <div class="input-group-append">
                    <button class="btn btn-sm btn-success" type="submit">
                        <i class="icofont-search-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="mb-3">
    <?php if (!empty($apps)): ?>
        <div class="d-flex flex-wrap app-list">
            <?php foreach ($apps as $k => $v):
                $icon = $v['icon'] ?: "./views/images/theme.png";
                $type = $v['app_type'] === 'template' ? 'tpl' : 'plugin';
                $order_url = 'https://www.emlog.net/order/submit/' . $type . '/' . $v['id']
                ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card mb-4 shadow-sm">
                        <a href="#appModal" class="p-1" data-toggle="modal" data-target="#appModal" data-name="<?= $v['name'] ?>" data-url="<?= $v['app_url'] ?>" data-buy-url="<?= $v['buy_url'] ?>">
                            <img class="bd-placeholder-img card-img-top" alt="cover" width="100%" height="225" src="<?= $icon ?>">
                        </a>
                        <div class="card-body">
                            <p class="card-text font-weight-bold">
                                <?php if ($v['top'] === 1): ?>
                                    <span class="badge badge-success p-1"><?= lang('recommend_today') ?></span>
                                <?php endif; ?>
                                <a href="#appModal" data-toggle="modal" data-target="#appModal" data-name="<?= $v['name'] ?>" data-url="<?= $v['app_url'] ?>" data-buy-url="<?= $v['buy_url'] ?>"><?= subString($v['name'], 0, 15) ?></a>
                                <?php if ($type === 'tpl'): ?>
                                    <span class="badge badge-success p-1"><?= lang('templates') ?></span>
                                <?php else: ?>
                                    <span class="badge badge-primary p-1"><?= lang('plugins') ?></span>
                                <?php endif; ?>
                                <?php if ($v['svip']): ?>
                                    <a href="https://www.emlog.net/register" class="badge badge-warning p-1" target="_blank"><?= lang('hard') ?></a>
                                <?php endif; ?>
                            </p>
                            <p class="card-text text-muted">
                                <?= lang('sell_price') ?>:
                                <?php if ($v['price'] > 0): ?>
                                    <?php if ($v['promo_price'] > 0): ?>
                                        <span style="text-decoration:line-through"><?= $v['price'] ?><small><?= lang('price_unit') ?></small></span>
                                        <span class="text-danger"><?= $v['promo_price'] ?><small><?= lang('price_unit') ?></small></span>
                                    <?php else: ?>
                                        <span class="text-danger"><?= $v['price'] ?><small><?= lang('price_unit') ?></small></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="text-success"><?= lang('free') ?></span>
                                <?php endif; ?>
                                <br>
                                <small>
                                    <?= lang('developer') ?>: <a href="./store.php?author_id=<?= $v['author_id'] ?>"><?= $v['author'] ?></a><br>
                                    <?= lang('version_number') ?>: <?= $v['ver'] ?><br>
                                    <?= lang('download_count') ?>: <?= $v['downloads'] ?><br>
                                    <?= lang('update_time') ?>: <?= $v['update_time'] ?><br>
                                </small>
                            </p>
                            <div class="card-text d-flex justify-content-between">
                                <div class="installMsg"></div>
                                <div>
                                    <?php if ($v['price'] > 0): ?>
                                        <?php if ($v['purchased'] === true): ?>
                                            <a href="store.php?action=mine" class="btn btn-light"><?= lang('bought') ?></a>
                                            <a href="#" class="btn btn-success installBtn" data-url="<?= urlencode($v['download_url']) ?>" data-cdn-url="<?= urlencode($v['cdn_download_url']) ?>" data-type="<?= $type ?>"><?= lang('install_now') ?></a>
                                        <?php elseif ($v['svip'] && Register::getRegType() === 2): ?>
                                            <a href="#" class="btn btn-warning installBtn" data-url="<?= urlencode($v['download_url']) ?>" data-cdn-url="<?= urlencode($v['cdn_download_url']) ?>" data-type="<?= $type ?>"><?= lang('install_now') ?></a>
                                        <?php else: ?>
                                            <a href="<?= $order_url ?>" class="btn btn-danger" target="_blank"><?= lang('go_buy') ?></a>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <a href="#" class="btn btn-success installBtn" data-url="<?= urlencode($v['download_url']) ?>" data-cdn-url="<?= urlencode($v['cdn_download_url']) ?>" data-type="<?= $type ?>"><?= lang('install_free') ?></a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="col-md-12 page my-5"><?= $pageurl ?></div>
    <?php else: ?>
        <div class="col-md-12">
            <div class="alert alert-info"><?= lang('store_no_results') ?></div>
        </div>
    <?php endif ?>
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

        $('.category').on('change', function () {
            var selectedCategory = $(this).val();
            if (selectedCategory) {
                window.location.href = './store.php?sid=' + selectedCategory;
            }
        });
    });
</script>
