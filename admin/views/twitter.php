<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['active_t'])): ?>
    <div class="alert alert-success"><?= lang('published_ok') ?></div><?php endif ?>
<?php if (isset($_GET['active_set'])): ?>
    <div class="alert alert-success"><?= lang('saved_ok') ?></div><?php endif ?>
<?php if (isset($_GET['error_a'])): ?>
    <div class="alert alert-danger"><?= lang('twitter_empty') ?></div><?php endif ?>
<?php if (isset($_GET['error_forbid'])): ?>
    <div class="alert alert-danger"><?= lang('twitter_post_disabled') ?></div><?php endif ?>
<h1 class="h4 mb-2 text-gray-800"><?= lang('twitter_add') ?></h1>
<p class="mb-4"><?= lang('twitter_prompt') ?></p>
<form method="post" action="twitter.php?action=post">
    <div class="form-group">
        <div id="t"><textarea></textarea></div>
    </div>
    <div class="form-row align-items-center">
        <div class="col-auto">
            <button type="submit" class="btn btn-success btn-sm mb-2"><?= lang('publish') ?></button>
        </div>
        <div class="col-auto">
            <div class="custom-control custom-switch mb-2">
                <input class="custom-control-input" type="checkbox" value="y" name="private" id="private">
                <label class="custom-control-label" for="private"><?= lang('private') ?></label>
            </div>
        </div>
    </div>
</form>
<div class="row mt-5">
    <?php
    foreach ($tws as $val):
        $tid = (int)$val['id'];
        $author = $user_cache[$val['author']]['name'];
        $private = $val['private'] === 'y';
        $t_img = $val['t_img'];
        $t = subString(strip_tags($val['t']), 0, 300) . '...';
    ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card hover-shadow-lg <?= $private ? 'border-danger' : '' ?>">
                <div class="card-body pointer-cursor" data-toggle="modal" data-target="#tModal" data-t="<?= htmlspecialchars($val['t']) ?>">
                    <?php if (!empty($t_img)): ?>
                        <img class="bd-placeholder-img card-img-top" alt="cover" width="100%" height="225" src="<?= $t_img ?>">
                    <?php endif ?>
                    <div class="markdown t mt-2"><?= $t ?></div>
                </div>
                <div class="card-footer bg-white border-0 mt-3 p-3">
                    <p class="text-muted small card-text d-flex justify-content-between">
<!--vot-->              <?= $val['date'] ?> | by <?= $author ?> <?= $private ? '| '.lang('private') : '' ?>
                        <span>
                            <a href="#" class="text-muted" data-toggle="modal" data-target="#editModal" data-id="<?= $val['id'] ?>" data-t="<?= htmlspecialchars($val['t_raw']) ?>"><?= lang('edit') ?></a>
                            <a href="javascript: em_confirm(<?= $tid ?>, 'tw', '<?= LoginAuth::genToken() ?>');" class="care"><?= lang('delete') ?></a>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
<div class="page"><?= $pageurl ?> </div>
<div class="text-center small"><?= lang('have') ?> <?= $twnum ?> <?= lang('_twitters') ?></div>

<!--Edit Microblog-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel"><?= lang('twitter_edit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="twitter.php?action=update" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <textarea name="t" id="t" rows="20" type="text" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <input type="hidden" value="" name="id" id="id" />
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><?= lang('cancel') ?></button>
                    <button type="submit" class="btn btn-sm btn-success"><?= lang('save') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Preview Microblog-->
<div class="modal fade" id="tModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modal_t"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        initPageScripts();
    });

    function closePageScripts() {
        $("#menu_twitter").removeClass('active');
    }

    function initPageScripts() {
        var cssLink = document.createElement('link');
        cssLink.rel = 'stylesheet';
        cssLink.type = 'text/css';
        cssLink.href = './views/css/markdown.css?t=' + '<?= Option::EMLOG_VERSION_TIMESTAMP ?>';
        document.head.appendChild(cssLink);

        $.getScript('./editor.md/editormd.js?t=' + '<?= Option::EMLOG_VERSION_TIMESTAMP ?>', function() {
            Editor = editormd("t", {
                width: "100%",
                height: 260,
                toolbarIcons: function() {
                    return ["bold", "del", "italic", "quote", "|", "h1", "h2", "h3", "|", "list-ul", "list-ol", "|",
                        "link", "image", "|", "preview"
                    ];
                },
                path: "editor.md/lib/",
                tex: false,
                watch: false,
                htmlDecode: true,
                flowChart: false,
                autoFocus: false,
                lineNumbers: false,
                sequenceDiagram: false,
                imageUpload: true,
                imageFormats: ["jpg", "jpeg", "gif", "png"],
                imageUploadURL: "media.php?action=upload&editor=1",
                syncScrolling: "single",
            });
            Editor.setToolbarAutoFixed(false);
        });

        $("#menu_twitter").addClass('active');
        setTimeout(hideActived, 3600);

        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var t = button.data('t');
            var modal = $(this);
            modal.find('.modal-body #t').val(t);
            modal.find('.modal-footer #id').val(id);
        });

        $('#tModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var t = button.data('t');
            var modal = $(this);
            modal.find('.modal-body #modal_t').html(t);
        });
    }
</script>