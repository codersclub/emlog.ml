<?php if (!defined('EMLOG_ROOT')) {
	exit('error!');
} ?>
<?php if (isset($_GET['active_del'])): ?>
<!--vot--><div class="alert alert-success"><?=lang('deleted_ok')?></div><?php endif; ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<!--vot--><h1 class="h3 mb-0 text-gray-800"><?=lang('resource_manage')?></h1>
<!--vot--><a href="#" class="btn btn-sm btn-success shadow-sm mt-4" data-toggle="modal" data-target="#exampleModal"><i class="icofont-plus"></i> <?=lang('upload_files')?></a>
</div>

<div class="card-columns">
	<?php foreach ($medias as $key => $value):
		$media_url = BLOG_URL . substr($value['filepath'], 3);
		$media_name = $value['filename'];
		if (isImage($value['filepath'])) {
			$imgpath = $value['thum_filepath'] ?? $value['filepath'];
			$media_icon_imgurl = BLOG_URL . substr($imgpath, 3);
		} else {
			$media_icon_imgurl = "./views/images/fnone.png";
		}
		?>
        <div class="card" style="min-height: 280px;">
            <a href="<?php echo $media_url; ?>" target="_blank"">
                <img class="card-img-top" src="<?php echo $media_icon_imgurl; ?>" />
            </a>
            <div class="card-body">
                <p class="card-text text-muted small">
					<?php echo $media_name; ?><br><br>
<!--vot-->          <?=lang('time')?>: <?php echo $value['addtime']; ?><br>
<!--vot-->          <?=lang('size')?>: <?php echo $value['attsize']; ?>
					<?php if ($value['width'] && $value['height']): ?>
<!--vot-->              <?=lang('img_size')?>: <?php echo $value['width'] ?>x<?php echo $value['height'] ?>
					<?php endif; ?>
                </p>
                <p class="card-text">
<!--vot-->          <a href="javascript: em_confirm(<?php echo $value['aid']; ?>, 'media', '<?php echo LoginAuth::genToken(); ?>');" class="badge badge-danger"><?=lang('delete')?></a>
                </p>
            </div>
        </div>
	<?php endforeach; ?>
</div>
<!--vot--><div class="page my-5"><?php echo $pageurl; ?> (<?= lang('have') ?> <?php echo $count; ?> <?= lang('_resources') ?>)</div>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
<!--vot-->      <h5 class="modal-title" id="exampleModalLabel"><?=lang('upload_files')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./media.php?action=upload" class="dropzone" id="my-awesome-dropzone"></form>
            </div>

        </div>
    </div>
</div>
<script src="./views/js/dropzone.min.js"></script>
<script>
    $("#menu_media").addClass('active');
    setTimeout(hideActived, 3600);
    $('#exampleModal').on('hidden.bs.modal', function (e) {
        window.location.reload();
    })
</script>
