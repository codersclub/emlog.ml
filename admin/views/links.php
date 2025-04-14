<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['active_save'])): ?>
    <div class="alert alert-success"><?= lang('edit_ok') ?></div><?php endif ?>
<?php if (isset($_GET['error_a'])): ?>
    <div class="alert alert-danger"><?= lang('site_and_url_empty') ?></div><?php endif ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800"><?= lang('link_management') ?></h1>
    <a href="#" class="btn btn-sm btn-success shadow-sm mt-4" data-toggle="modal" data-target="#linkModel"><i class="icofont-plus"></i> <?= lang('link_add') ?></a>
</div>
<form action="link.php?action=link_taxis" id="link_form" method="post">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th><?= lang('name') ?></th>
                            <th><?= lang('thelink') ?></th>
                            <th><?= lang('operation') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($links as $key => $value):
                            doAction('adm_link_display');
                        ?>
                            <tr style="cursor: move">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <?php if ($value['icon']): ?>
                                                <img src="<?= $value['icon'] ?>" height="35" width="35" class="rounded" />
                                            <?php else: ?>
                                                <img src="<?= './views/images/null.png' ?>" height="35" width="35" class="rounded" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="align-items-center mb-3">
                                                <p class="mb-0 m-2">
                                                    <input name="link[]" value="<?= $value['id'] ?>" type="hidden" />
                                                    <a href="#" data-toggle="modal" data-target="#linkModel"
                                                        data-linkid="<?= $value['id'] ?>"
                                                        data-sitename="<?= $value['sitename'] ?>"
                                                        data-siteurl="<?= $value['siteurl'] ?>"
                                                        data-icon="<?= $value['icon'] ?>"
                                                        data-description="<?= $value['description'] ?>"><?= $value['sitename'] ?></a>
                                                    <?php if ($value['hide'] === 'y'): ?>
<!--vot-->                                              <span class="badge badge-warning"><?= lang('hidden') ?></span>
                                                    <?php endif ?>
                                                </p>
                                                <p class="mb-0 m-2 small"><?= $value['description'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <a href="<?= $value['siteurl'] ?>" target="_blank"><?= subString($value['siteurl'], 0, 39) ?></a>
                                </td>
                                <td>
                                    <?php if ($value['hide'] == 'n'): ?>
<!--vot-->                              <a href="link.php?action=hide&amp;linkid=<?= $value['id'] ?>" class="badge badge-primary"><?= lang('hide') ?></a>
                                    <?php else: ?>
<!--vot-->                              <a href="link.php?action=show&amp;linkid=<?= $value['id'] ?>" class="badge badge-warning"><?= lang('show') ?></a>
                                    <?php endif ?>
                                    <a href="javascript: em_confirm(<?= $value['id'] ?>, 'link', '<?= LoginAuth::genToken() ?>');" class="badge badge-danger"><?= lang('delete') ?></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="list_footer">
        <input type="submit" value="<?= lang('order_change') ?>" class="btn btn-sm btn-success shadow-sm" />
    </div>
</form>

<!--Edit Link popup-->
<div class="modal fade" id="linkModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel"><?= lang('link') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="link.php?action=save" method="post" name="link" id="link">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sitename"><?= lang('name') ?></label>
                        <input class="form-control" id="sitename" maxlength="255" name="sitename" required>
                    </div>
                    <div class="form-group">
                        <label for="siteurl"><?= lang('address') ?></label>
                        <input class="form-control" id="siteurl" maxlength="255" name="siteurl" type="url" required>
                    </div>
                    <div class="form-group">
                        <label for="icon"><?= lang('icon_url') ?></label>
                        <input class="form-control" id="icon" name="icon" type="url">
                    </div>
                    <div class="form-group">
                        <label for="description"><?= lang('description') ?></label>
                        <textarea name="description" id="description" maxlength="512" type="text" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <input type="hidden" value="" name="linkid" id="linkid" />
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><?= lang('cancel') ?></button>
                    <button type="submit" class="btn btn-sm btn-success"><?= lang('link_save') ?></button>
                    <span id="alias_msg_hook"></span>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#menu_category_view").addClass('active');
        $("#menu_view").addClass('show');
        $("#menu_link").addClass('active');
        setTimeout(hideActived, 3600);

        // Edit link
        $('#linkModel').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var linkid = button.data('linkid')
            var sitename = button.data('sitename')
            var siteurl = button.data('siteurl')
            var icon = button.data('icon')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #sitename').val(sitename)
            modal.find('.modal-body #siteurl').val(siteurl)
            modal.find('.modal-body #icon').val(icon)
            modal.find('.modal-body #description').val(description)
            modal.find('.modal-footer #linkid').val(linkid)
        })

        // Submit Form
        $("#link_form").submit(function(event) {
            event.preventDefault();
            submitForm("#link_form");
        });

        // Initialize drag sorting
        $('#dataTable tbody').sortable().disableSelection();
    });
</script>