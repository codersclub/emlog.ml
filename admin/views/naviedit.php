<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<h1 class="h4 mb-4 text-gray-800"><?= lang('nav_modify') ?></h1>
<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <form action="navbar.php?action=update" method="post" id="sort_new">
            <div class="form-group">
                <label for="sortname"><?= lang('nav_name') ?></label>
                <input class="form-control" id="naviname" value="<?= $naviname ?>" name="naviname">
            </div>
            <div class="form-group">
                <label for="url"><?= lang('nav_address') ?></label>
                <input class="form-control" id="url" value="<?= $url ?>" name="url" <?= $conf_isdefault ?>>
            </div>
            <div class="form-group">
                <input type="checkbox" value="y" name="newtab" id="newtab" <?= $conf_newtab ?> />
                <label for="newtab"><?= lang('open_new_win') ?></label>
            </div>
            <?php if ($type == Navi_Model::navitype_custom && $pid != 0): ?>
                <div class="form-group">
                    <label><?= lang('nav_parent') ?></label>
                    <select name="pid" id="pid" class="form-control">
                        <option value="0"><?= lang('no') ?></option>
                        <?php
                        foreach ($navis as $key => $value):
                            if ($value['type'] != Navi_Model::navitype_custom || $value['pid'] != 0) {
                                continue;
                            }
                            $flg = $value['id'] == $pid ? 'selected' : '';
                            ?>
                            <option value="<?= $value['id'] ?>" <?= $flg ?>><?= $value['naviname'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            <?php endif ?>
            <input type="hidden" value="<?= $naviId ?>" name="navid"/>
            <input type="hidden" value="<?= $isdefault ?>" name="isdefault"/>
            <input type="submit" value="<?= lang('save') ?>" class="btn btn-sm btn-success"/>
            <input type="button" value="<?= lang('cancel') ?>" class="btn btn-sm btn-secondary" onclick="javascript: window.history.back();"/>
        </form>
    </div>
</div>
<script>
    $(function () {
        $("#menu_navbar").addClass('active');
    });
</script>
