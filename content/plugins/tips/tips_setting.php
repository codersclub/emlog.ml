<?php
defined('EMLOG_ROOT') || exit('access denied!');

function plugin_setting_view() {
    $plugin_storage = Storage::getInstance('tips');
    $hello = $plugin_storage->getValue('hello');
    if (empty($hello)) {
        $hello = 'hello world';
    }
    ?>
    <?php if (isset($_GET['succ'])): ?>
        <div class="alert alert-success"><?= lang('got_it') ?></div>
    <?php endif; ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><?= lang('tips_plugin') ?></h1>
    </div>
    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <form method="post" id="tips_form" action="./plugin.php?plugin=tips&action=setting">
                <div class="form-group">
                    <p><?= lang('tips_plugin_info') ?></p>
                    <?php tips_init(); ?>
                    <hr>
                    <p><?= lang('tips_plugin_info2') ?></p>
                </div>
                <div class="form-inline">
                    <input name="hello" class="form-control" style="width: 200px;" value="<?= $hello ?>">
                    <input type="submit" class="btn btn-success btn-sm mx-2" value="<?= lang('ok_i_know') ?>">
                </div>
            </form>
        </div>
    </div>
    <script>
        setTimeout(hideActived, 3600);

        // Highlight the left side plugin menu
        $("#menu_category_ext").addClass('active');

        // Asynchronous form submission
        $("#tips_form").submit(function (event) {
            event.preventDefault();
            submitForm("#tips_form");
        });
    </script>
<?php }

function plugin_setting() {
    $hello = Input::postStrVar('hello');

    $plugin_storage = Storage::getInstance('tips');
    $plugin_storage->setValue('hello', $hello);
    Output::ok();
}
