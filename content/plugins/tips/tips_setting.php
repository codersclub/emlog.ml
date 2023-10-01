<?php
if (!defined('EMLOG_ROOT')) {
    die('err');
}
function plugin_setting_view() {
    ?>
    <?php if (isset($_GET['succ'])): ?>
        <div class="alert alert-success"><?= lang('got_it') ?></div>
    <?php endif; ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= lang('tips_plugin') ?></h1>
    </div>
    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <form method="post" action="./plugin.php?plugin=tips&action=setting">
                <div class="form-group">
                    <p><?= lang('tips_plugin_info') ?></p>
                    <?php tips(); ?>
                    <hr>
                    <p><?= lang('tips_plugin_info2') ?></p>
                </div>
                <div class="form-inline">
                    <input name="hello" class="form-control" style="width: 200px;" value="hello world">
                    <input type="submit" class="btn btn-success btn-sm mx-2" value="<?= lang('ok_i_know') ?>">
                </div>
            </form>
        </div>
    </div>
    <script>
        setTimeout(hideActived, 3600);
        $("#menu_category_ext").addClass('active');
        $("#menu_ext").addClass('show');
        $("#menu_plug").addClass('active');
    </script>
<?php }

function plugin_setting() {
    $hello = Input::postStrVar('hello');
    emDirect('./plugin.php?plugin=tips&succ=1');
}
