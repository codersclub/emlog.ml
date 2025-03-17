<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['active_mov'])): ?>
    <div class="alert alert-success"><?= lang('moved_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_edit'])): ?>
    <div class="alert alert-success"><?= lang('modified_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_add'])): ?>
    <div class="alert alert-success"><?= lang('media_category_add_ok') ?></div><?php endif ?>
<?php if (isset($_GET['error_a'])): ?>
    <div class="alert alert-danger"><?= lang('category_name_empty') ?></div><?php endif ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800"><?= lang('upload_insert') ?></h1>
    <a href="#" class="btn btn-sm btn-success shadow-sm mt-4" data-toggle="modal" data-target=" #exampleModal"><i class="icofont-plus"></i> <?= lang('upload_files') ?></a>
</div>
<?php if (User::isAdmin()): ?>
    <div class="row mb-4 ml-1 justify-content-between">
        <div>
        <a href="media.php" class="btn btn-sm btn-primary mr-2 my-1"><?= lang('media_all') ?></a>
            <?php foreach ($sorts as $key => $val):
                $cur_tab = $val['id'] == $sid ? "btn-info" : "btn-success";
            ?>
                <div class="btn-group mr-2 my-1">
                    <a href="media.php?sid=<?= $val['id'] ?>" class="btn btn-sm <?= $cur_tab ?>"><?= $val['sortname'] ?></a>
                    <button type="button" class="btn <?= $cur_tab ?> btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false"></button>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editModal" data-id="<?= $val['id'] ?>" data-sortname="<?= $val['sortname'] ?>"><?= lang('edit') ?></a>
                        <a class="dropdown-item text-danger" href="javascript: em_confirm(<?= $val['id'] ?>, 'media_sort', '<?= LoginAuth::genToken() ?>');"><?= lang('delete') ?></a>
                    </div>
                </div>
            <?php endforeach ?>
            <a href="#" class="btn btn-success btn-sm my-1" data-toggle="modal" data-target="#mediaSortModal"><i class="icofont-plus"></i> <?= lang('category') ?></a>
        </div>
        <div class="d-flex align-items-center mb-3 mb-sm-0">
            <div class="mr-2">
                <?php if ($show === 'grid'): ?>
                    <a href="media.php?show=list">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M8 6L21 6.00078M8 12L21 12.0008M8 18L21 18.0007M3 6.5H4V5.5H3V6.5ZM3 12.5H4V11.5H3V12.5ZM3 18.5H4V17.5H3V18.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </a>
                <?php else: ?>
                    <a href="media.php?show=grid">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M3.5 3.5H10.5V10.5H3.5V3.5Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M3.5 13.5H10.5V20.5H3.5V13.5Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M13.5 3.5H20.5V10.5H13.5V3.5Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M13.5 13.5H20.5V20.5H13.5V13.5Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </a>
                <?php endif ?>
            </div>
            <div class="flex-fill">
                <input type="text" class="form-control datepicker" value="<?= $dateTime ?>" placeholder="<?= lang('view_from_date') ?>">
            </div>
            <div class="ml-2">
                <form action="./media.php" method="get" class="form-inline w-100">
                    <div class="input-group">
                        <input type="text" name="keyword" value="<?= $keyword ?>" class="form-control small" placeholder="<?= lang('search_file_name') ?>">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-success" type="submit">
                                <i class="icofont-search-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>
<form action="media.php?action=operate_media" method="post" name="form_media" id="form_media">
    <?php if ($show === 'list'): ?>
        <!-- List Mode -->
        <div class="card shadow mb-4">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable no-footer">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAllItem" /></th>
                            <th><?= lang('media_name') ?></th>
                            <th><?= lang('file_size') ?></th>
                            <th><?= lang('founder') ?></th>
                            <th><?= lang('time') ?></th>
                            <th><?= lang('operation') ?></th>
                        </tr>
                    </thead>
                    <tbody class="checkboxContainer">
                        <?php foreach ($medias as $key => $value):
                            $media_url = getFileUrl($value['filepath']);
                            $sort_name = $value['sortname'];
                            $media_name = $value['filename'];
                            $author = $user_cache[$value['author']]['name'];
                            if (isImage($value['mimetype'])) {
                                $media_icon = '&#128444;'; // Framed picture
                                $img_viewer = 'class="highslide" onclick="return hs.expand(this)"';
                            } elseif (isZip($value['filename'])) {
                                $media_icon = '&#128230;'; // Package
                                $img_viewer = '';
                            } elseif (isVideo($value['mimetype'])) {
                                $media_icon = '&#127916;'; // Clapper board
                                $img_viewer = '';
                            } elseif (isAudio($value['filename'])) {
                                $media_icon = '&#127911;'; // headphone
                                $img_viewer = '';
                            } else {
                                $media_icon = "";
                                $img_viewer = '';
                            }
                        ?>
                            <tr>
                                <td style="width: 20px;"><input type="checkbox" name="aids[]" value="<?= $value['aid'] ?>" class="aids" /></td>
                                <td>
                                    <?= $media_icon ?>
                                    <a href="<?= $media_url ?>" <?= $img_viewer ?> target="_blank"><?= $media_name ?></a> <span class="badge badge-success"><?= $sort_name ?></span>
                                    <br><span class="small"><?= lang('source_file') ?>: <a href="#" class="copy-link text-muted" data-toggle="popover" data-url="<?= $media_url ?>"><?= $media_url ?></a></span>
                                    <?php if ($value['width'] && $value['height']): ?>
                                        <br><span class="small"><?= lang('image_size') ?>: <?= $value['width'] ?>x<?= $value['height'] ?></span>
                                    <?php endif ?>
                                </td>
                                <td><?= $value['attsize'] ?></td>
                                <td>
                                    <?php if (User::haveEditPermission()): ?>
                                        <a href="./media.php?uid=<?= $value['author'] ?>"><?= $author ?> </a>
                                    <?php else: ?>
                                        <?= $author ?>
                                    <?php endif; ?>
                                </td>
                                <td><?= $value['addtime'] ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editMediaModal" data-id="<?= $value['aid'] ?>" data-filename="<?= $media_name ?>" class="badge badge-success"><?= lang('change_name') ?></a>
                                    <a href="javascript: em_confirm(<?= $value['aid'] ?>, 'media', '<?= LoginAuth::genToken() ?>');" class="badge badge-danger"><?= lang('delete') ?></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        <div class="row checkboxContainer">
            <!-- Grid Card Mode -->
            <?php foreach ($medias as $key => $value):
                $media_url = getFileUrl($value['filepath']);
                $thumbnail_url = $value['thumbnail_url'];
                $sort_name = $value['sortname'];
                $media_name = $value['filename'];
                $author = $user_cache[$value['author']]['name'];
                if (isImage($value['mimetype'])) {
                    $media_icon = getFileUrl($value['filepath_thum']);
                    $img_viewer = 'class="highslide" onclick="return hs.expand(this)"';
                } elseif (isZip($value['filename'])) {
                    $media_icon = "./views/images/zip.webp";
                    $img_viewer = '';
                } elseif (isVideo($value['mimetype'])) {
                    $media_icon = "./views/images/video.webp";
                    $img_viewer = '';
                } elseif (isAudio($value['filename'])) {
                    $media_icon = "./views/images/audio.webp";
                    $img_viewer = '';
                } else {
                    $media_icon = "./views/images/fnone.webp";
                    $img_viewer = '';
                }
            ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="<?= $media_url ?>" <?= $img_viewer ?> target="_blank"><img class="card-img-top" loading="lazy" src="<?= $media_icon ?>" /></a>
                        <div class="card-body">
                            <p class="card-text text-muted small">
                                <a href="#" data-toggle="modal" data-target="#editMediaModal" data-id="<?= $value['aid'] ?>" data-filename="<?= $media_name ?>"><?= $media_name ?></a> <span class="badge badge-success"><?= $sort_name ?></span><br>
                                <?= lang('create_time') ?>: <?= $value['addtime'] ?><br>
                                <?= lang('founder') ?>:
                                <?php if (User::haveEditPermission()): ?>
                                    <a href="./media.php?uid=<?= $value['author'] ?>"><?= $author ?> </a>
                                <?php else: ?>
                                    <?= $author ?>
                                <?php endif; ?><br>
                                <?= lang('file_size') ?>: <?= $value['attsize'] ?>
                                <?php if ($value['width'] && $value['height']): ?>
                                    <?= lang('img_size') ?>: <?= $value['width'] ?>x<?= $value['height'] ?>
                                <?php endif ?><br>
                                <?= lang('source_file') ?>: <a href="#" class="copy-link text-muted" data-toggle="popover" data-url="<?= $media_url ?>"><?= $media_url ?></a><br>
                                <a href="#" class="copy-link" data-toggle="popover" data-url="<?= $media_url ?>"><?= lang('original_file') ?></a>
                                <?php if ($value['alias'] && isZip($value['filename'])):
                                    $media_down_url = BLOG_URL . '?resource_alias=' . $value['alias'];
                                ?>
<!--vot-->                          | <a href="#" class="copy-link" data-toggle="popover" data-url="<?= $media_down_url ?>"><?= lang('download_url') ?></a> (<?= lang('downloads') ?>: <?= $value['download_count'] ?>)
                                <?php endif ?>
                                <?php if ($thumbnail_url): ?>
                                    | <a href="#" class="copy-link" data-toggle="popover" data-url="<?= $thumbnail_url ?>"><?= lang('thumbnail_url') ?></a>
                                <?php endif ?>
                            </p>
                            <p class="card-text d-flex justify-content-between">
                                <a href="javascript: em_confirm(<?= $value['aid'] ?>, 'media', '<?= LoginAuth::genToken() ?>');" class="text-danger small"><?= lang('delete') ?></a>
                                <input type="checkbox" name="aids[]" value="<?= $value['aid'] ?>" class="aids" />
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if ($count > 0): ?>
        <div class="form-row align-items-center">
            <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
            <input name="operate" id="operate" value="" type="hidden" />
            <div class="col-auto my-1">
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="checkAllItem">
                    <label class="custom-control-label" for="checkAllItem"><?=lang('select_all')?></label>
                </div>
            </div>
            <a href="javascript:mediaact('del');" class="btn btn-sm btn-danger"><?= lang('delete') ?></a>
            <div class="col-auto my-1 form-inline">
                <?php if (User::isAdmin()): ?>
                    <select name="sort" id="sort" onChange="changeSort(this);" class="form-control form-control-sm m-1">
                        <option value="" selected="selected"><?= lang('move_to') ?></option>
                        <?php foreach ($sorts as $key => $value): ?>
                            <option value="<?= $value['id'] ?>"><?= $value['sortname'] ?></option>
                        <?php endforeach; ?>
                        <option value="0"><?= lang('uncategorized') ?></option>
                    </select>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</form>
<div class="page"><?= $page ?> </div>
<div class="text-center small"><?= lang('have') ?> <?= $count ?> <?= lang('_resources') ?></div>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= lang('upload_files') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./media.php?action=upload<?= '&sid=' . $sid ?>" class="dropzone" id="up-form"></form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="mediaSortModal" tabindex="-1" role="dialog" aria-labelledby="mediaSortModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediaSortModalLabel"><?= lang('media_category_add') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="media.php?action=add_media_sort" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sortname"><?= lang('category_name') ?></label>
                        <input class="form-control" id="sortname" maxlength="255" name="sortname" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?= lang('cancel') ?></button>
                    <button type="submit" class="btn btn-sm btn-success"><?= lang('save') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= lang('change_media_category') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="media.php?action=update_media_sort">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="sortname" name="sortname" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="" id="id" name="id" />
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?= lang('cancel') ?></button>
                    <button type="submit" class="btn btn-sm btn-success"><?= lang('save') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editMediaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= lang('edit_media') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="media.php?action=update_media">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="filename"><?= lang('media_name') ?></label>
                        <input type="text" class="form-control" id="filename" name="filename" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="" id="id" name="id" />
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?= lang('cancel') ?></button>
                    <button type="submit" class="btn btn-sm btn-success"><?= lang('save') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./views/js/dropzone.min.js?t=<?= Option::EMLOG_VERSION_TIMESTAMP ?>"></script>
<link rel="stylesheet" type="text/css" href="./views/components/highslide/highslide.css?t=<?= Option::EMLOG_VERSION_TIMESTAMP ?>" />
<script src="./views/components/highslide/highslide.min.js?t=<?= Option::EMLOG_VERSION_TIMESTAMP ?>"></script>
<script>
    Dropzone.options.upForm = {
        paramName: "file",
        maxFilesize: 20480, // 20G
        timeout: 3600000,
        init: function() {
            this.on("error", function(file, response) {
                // alert(response);
            });
        }
    };
    $(function() {
        $("#menu_media").addClass('active');
        setTimeout(hideActived, 3600);
        $('#exampleModal').on('hidden.bs.modal', function(e) {
            window.location.reload();
        });

        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var sortname = button.data('sortname')
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body input').val(sortname)
            modal.find('.modal-footer input').val(id)
        })

        $('#editMediaModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var filename = button.data('filename')
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body input').val(filename)
            modal.find('.modal-footer input').val(id)
        })

        if (window.outerWidth > 767) {
            hs.graphicsDir = './views/components/highslide/graphics/';
            hs.wrapperClassName = 'rounded-white';
        } else {
        $('.highslide').removeAttr('onclick') // If it is a mobile terminal, do not use the highslide function
        }

        // copy url
        $('.copy-link').click(function(e) {
            e.preventDefault();
            var link = $(this).data('url');
            navigator.clipboard.writeText(link);
            $(this).popover({
                content: '<?= lang('link_copied') ?>',
                placement: 'top',
                trigger: 'manual'
            }).popover('show');
            setTimeout(() => $(this).popover('hide'), 1000);
        });
    });

    // The callback function for closing the date picker
    function onDatepickerClose(dateText, inst) {
        if (dateText) {
            var date = new Date(dateText);
            var formattedDate = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
            var url = 'media.php?date=' + formattedDate;
            window.location.href = url;
        }
    }

    function mediaact(act) {
        if (getChecked('aids') === false) {
/*vot*/     infoAlert(lang('resource_select'));
            return;
        }

        if (act === 'del') {
            delAlert2('', lang('resource_del_sure'), function() {
                $("#operate").val(act);
                $("#form_media").submit();
            })
            return;
        }
        $("#operate").val(act);
        $("#form_media").submit();
    }

    // Change category
    function changeSort(obj) {
        if (getChecked('aids') === false) {
/*vot*/     infoAlert(lang('media_select'));
            return;
        }
        if ($('#sort').val() === '') return;
        $("#operate").val('move');
        $("#form_media").submit();
    }
</script>