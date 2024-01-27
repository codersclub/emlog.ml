<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['active_taxis'])): ?>
    <div class="alert alert-success"><?= lang('category_update_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_del'])): ?>
    <div class="alert alert-success"><?= lang('category_deleted_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_save'])): ?>
    <div class="alert alert-success"><?= lang('saved_ok') ?></div><?php endif ?>
<?php if (isset($_GET['error_a'])): ?>
    <div class="alert alert-danger"><?= lang('category_name_empty') ?></div><?php endif ?>
<?php if (isset($_GET['error_b'])): ?>
    <div class="alert alert-danger"><?= lang('category_no_order') ?></div><?php endif ?>
<?php if (isset($_GET['error_c'])): ?>
    <div class="alert alert-danger"><?= lang('alias_format_invalid') ?></div><?php endif ?>
<?php if (isset($_GET['error_d'])): ?>
    <div class="alert alert-danger"><?= lang('alias_unique') ?></div><?php endif ?>
<?php if (isset($_GET['error_e'])): ?>
    <div class="alert alert-danger"><?= lang('alias_no_keywords') ?></div><?php endif ?>
<?php if (isset($_GET['error_f'])): ?>
    <div class="alert alert-danger">不能设置自身为父分类</div><?php endif ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= lang('category_management') ?></h1>
    <a href="#" class="btn btn-sm btn-success shadow-sm mt-4" data-toggle="modal" data-target="#sortModal"><i class="icofont-plus"></i> <?= lang('category_add') ?></a>
</div>
<form method="post" action="sort.php?action=taxis">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive" id="adm_sort_list">
                <table class="table table-bordered table-striped table-hover" id="dataTable">
                    <thead>
                    <tr>
                        <th><?= lang('description') ?></th>
                        <th><?= lang('category_id') ?></th>
                        <th><?= lang('alias') ?></th>
                        <th><?= lang('template') ?></th>
                        <th><?= lang('view') ?></th>
                        <th><?= lang('articles') ?></th>
                        <th><?= lang('operation') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($sorts as $key => $value):
                        if ($value['pid'] != 0) {
                            continue;
                        }
                        ?>
                        <tr style="cursor: move">
                            <td class="sortname">
                                <input type="hidden" value="<?= $value['sid'] ?>" class="sort_id"/>
                                <input type="hidden" name="sort[]" value="<?= $value['sid'] ?>"/>
                                <a href="#" data-toggle="modal" data-target="#sortModal"
                                   data-sid="<?= $value['sid'] ?>"
                                   data-sortname="<?= $value['sortname'] ?>"
                                   data-alias="<?= $value['alias'] ?>"
                                   data-description="<?= $value['description'] ?>"
                                   data-kw="<?= $value['kw'] ?>"
                                   data-pid="<?= $value['pid'] ?>"
                                   data-template="<?= $value['template'] ?>"><?= $value['sortname'] ?></a>
                            </td>
                            <td><?= $value['description'] ?></td>
                            <td><?= $value['sid'] ?></td>
                            <td class="alias"><?= $value['alias'] ?></td>
                            <td>
                                <a href="<?= Url::sort($value['sid']) ?>" target="_blank"><img src="./views/images/vlog.gif"/></a>
                            </td>
                            <td><a href="article.php?sid=<?= $value['sid'] ?>"><?= $value['lognum'] ?></a></td>
                            <td>
                                <a href="javascript: em_confirm(<?= $value['sid'] ?>, 'sort', '<?= LoginAuth::genToken() ?>');" class="badge badge-danger"><?= lang('delete') ?></a>
                            </td>
                        </tr>
                        <?php
                        $children = $value['children'];
                        foreach ($children as $key):
                            $value = $sorts[$key];
                            ?>
                            <tr>
                                <td class="sortname">
                                    <input type="hidden" value="<?= $value['sid'] ?>" class="sort_id"/>
                                    <input type="hidden" name="sort[]" value="<?= $value['sid'] ?>"/>
                                    ---- <a href="#" data-toggle="modal" data-target="#sortModal"
                                            data-sid="<?= $value['sid'] ?>"
                                            data-sortname="<?= $value['sortname'] ?>"
                                            data-alias="<?= $value['alias'] ?>"
                                            data-description="<?= $value['description'] ?>"
                                            data-kw="<?= $value['kw'] ?>"
                                            data-pid="<?= $value['pid'] ?>"
                                            data-template="<?= $value['template'] ?>"><?= $value['sortname'] ?></a>
                                </td>
                                <td><?= $value['description'] ?></td>
                                <td><?= $value['sid'] ?></td>
                                <td class="alias"><?= $value['alias'] ?></td>
                                <td>
                                    <a href="<?= Url::sort($value['sid']) ?>" target="_blank"><img src="./views/images/vlog.gif"/></a>
                                </td>
                                <td><a href="article.php?sid=<?= $value['sid'] ?>"><?= $value['lognum'] ?></a></td>
                                <td>
                                    <a href="javascript: em_confirm(<?= $value['sid'] ?>, 'sort', '<?= LoginAuth::genToken() ?>');" class="badge badge-danger"><?= lang('delete') ?></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="list_footer">
        <input type="submit" value="<?= lang('order_change') ?>" class="btn btn-sm btn-success"/>
    </div>
</form>

<div class="modal fade" id="sortModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= lang('category_management') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="sort.php?action=save" method="post" id="sort_new">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sortname"><?= lang('category_name') ?></label>
                        <input class="form-control" id="sortname" name="sortname" required>
                    </div>
                    <div class="form-group">
                        <label for="alias"><?= lang('alias_info') ?></label>
                        <input class="form-control" id="alias" name="alias">
                        <small class="form-text text-muted"><?= lang('alias_prompt') ?></small>
                    </div>
                    <div class="form-group">
                        <label><?= lang('category_parent') ?></label>
                        <select name="pid" id="pid" class="form-control">
                            <option value="0"><?= lang('no') ?></option>
                            <?php
                            foreach ($sorts as $key => $value):
                                if ($value['pid'] != 0) {
                                    continue;
                                }
                                ?>
                                <option value="<?= $key ?>"><?= $value['sortname'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alias"><?=lang('category_description')?></label>
                        <textarea name="description" id="description" type="text" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kw"><?= lang('keywords') ?><?= lang('keywords_info') ?></label>
                        <textarea name="kw" id="kw" type="text" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="template"><?=lang('category_template')?></label>
                        <?php if ($customTemplates):
                            $sortListHtml = '<option value=""><?=lang('default')?></option>';
                            foreach ($customTemplates as $v) {
                                $sortListHtml .= '<option value="' . str_replace('.php', '', $v['filename']) . '">' . ($v['comment']) . '</option>';
                            }
                            ?>
                            <select id="template" name="template" class="form-control"><?= $sortListHtml; ?></select>
                            <small class="form-text text-muted"><?=lang('category_template_intro')?></small>
                        <?php else: ?>
                            <input class="form-control" id="template" name="template">
                            <small class="form-text text-muted"><?=lang('custom_template_intro')?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="" name="sid" id="sid"/>
                    <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden"/>
                    <span id="alias_msg_hook"></span>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?= lang('cancel') ?></button>
                    <button type="submit" id="save_btn" class="btn btn-sm btn-success"><?= lang('save') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function issortalias(a) {
        const validChars = /^[\w-]*$/;
        const validDigits = /^\d+$/;
        const reservedKeywords = ['post', 'record', 'sort', 'tag', 'author', 'page', 'posts'];

        if (!validChars.test(a)) return 1;
        if (validDigits.test(a)) return 2;
        if (reservedKeywords.includes(a)) return 3;

        return 0;
    }

    function checksortalias() {
        const alias = $.trim($("#alias").val());
        const saveButton = $("#save_btn");
        const aliasMsgHook = $("#alias_msg_hook");

        const errorMessages = {
            1: lang('alias_invalid_chars'),
            2: lang('alias_digital'),
            3: lang('alias_system_conflict')
        };

        const result = issortalias(alias);
        if (result !== 0) {
            saveButton.attr("disabled", "disabled");
            aliasMsgHook.html('<span id="input_error">' + errorMessages[result] + '</span>');
        } else {
            aliasMsgHook.html('');
            $("#msg").html('');
            saveButton.attr("disabled", false);
        }
    }


    $(function () {
        setTimeout(hideActived, 3600);
        $("#alias").keyup(function () {
            checksortalias();
        });

        $("#menu_category_content").addClass('active');
        $("#menu_content").addClass('show');
        $("#menu_sort").addClass('active');

        // Initialize drag sorting
        $('#dataTable tbody').sortable().disableSelection();

        // Edit category
        $('#sortModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var sid = button.data('sid')
            var sortname = button.data('sortname')
            var alias = button.data('alias')
            var description = button.data('description')
            var kw = button.data('kw')
            var pid = button.data('pid')
            var template = button.data('template')
            var modal = $(this)
            modal.find('.modal-body #sortname').val(sortname)
            modal.find('.modal-body #alias').val(alias)
            modal.find('.modal-body #description').val(description)
            modal.find('.modal-body #kw').val(kw)
            modal.find('.modal-body #pid').val(pid)
            modal.find('.modal-body #template').val(template)
            modal.find('.modal-footer #sid').val(sid)
        })
    });
</script>
