<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['error_b'])): ?>
    <div class="alert alert-danger"><?= lang('reg_failed') ?></div><?php endif ?>
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= lang('emlog_registration') ?></h1>
</div>
<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <?php if (!Register::isRegLocal()) : ?>
            <form action="auth.php?action=auth" method="post" class="mt-2">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="emkey" name="emkey" placeholder="<?= lang('enter_emkey') ?>" minlength="32" maxlength="32" required>
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit" id="button-addon2"><?= lang('submit_regitration') ?></button>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <a href="https://www.emlog.net/register" target="_blank" class="text-danger"><?= lang('get_emkey') ?></a>
                </div>
            </form>
        <?php else: ?>
            <div class="text-center">
                <p class="lead text-success my-5"><?= lang('em_reg_ok') ?></p>
            </div>
        <?php endif ?>
    </div>
</div>

<script>
    $(function () {
        $("#menu_store").addClass('active');
        setTimeout(hideActived, 10000);
    });
</script>
