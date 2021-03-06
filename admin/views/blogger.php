<?php if (!defined('EMLOG_ROOT')) {
	exit('error!');
} ?>
<?php if (isset($_GET['active_edit'])): ?>
<!--vot--><div class="alert alert-success"><?=lang('personal_data_modified_ok')?></div><?php endif ?>
<?php if (isset($_GET['active_del'])): ?>
<!--vot--><div class="alert alert-success"><?=lang('avatar_deleted_ok')?></div><?php endif ?>
<?php if (isset($_GET['error_a'])): ?>
<!--vot--><div class="alert alert-danger"><?=lang('nickname_is_empty')?></div><?php endif ?>
<?php if (isset($_GET['error_b'])): ?>
<!--vot--><div class="alert alert-danger"><?=lang('email_format_invalid')?></div><?php endif ?>
<?php if (isset($_GET['error_email'])): ?>
    <div class="alert alert-danger"><?=lang('email_empty')?></div><?php endif ?>
<?php if (isset($_GET['error_c'])): ?>
<!--vot--><div class="alert alert-danger"><?=lang('password_length_short')?></div><?php endif ?>
<?php if (isset($_GET['error_d'])): ?>
<!--vot--><div class="alert alert-danger"><?=lang('password_not_equal')?></div><?php endif ?>
<?php if (isset($_GET['error_e'])): ?>
<!--vot--><div class="alert alert-danger"><?=lang('username_exists')?></div><?php endif ?>
<?php if (isset($_GET['error_f'])): ?>
<!--vot--><div class="alert alert-danger"><?=lang('nickname_exists')?></div><?php endif ?>
<?php if (isset($_GET['error_g'])): ?>
    <div class="alert alert-danger"><?=lang('email_is_used')?></div><?php endif ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?=lang('settings')?></h1>
</div>
<div class="panel-heading">
	<?php if (User::isAdmin()): ?>
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link" href="./setting.php"><?=lang('basic_settings')?></a></li>
            <li class="nav-item"><a class="nav-link" href="./setting.php?action=user"><?=lang('user_settings')?></a></li>
            <li class="nav-item"><a class="nav-link" href="./setting.php?action=mail"><?=lang('email_notify')?></a></li>
            <li class="nav-item"><a class="nav-link" href="./setting.php?action=seo"><?=lang('seo_settings')?></a></li>
            <li class="nav-item"><a class="nav-link" href="./setting.php?action=api"><?=lang('api_interface')?></a></li>
            <li class="nav-item"><a class="nav-link active" href="./blogger.php"><?=lang('personal_settings')?></a></li>
        </ul>
	<?php else: ?>
        <ul class="nav nav-pills">
<!--vot-->  <li class="nav-item"><a class="nav-link active" href="./blogger.php"><?=lang('personal_settings')?></a></li>
        </ul>
	<?php endif ?>
</div>
<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <div class="row m-5">
            <div class="col-md-4">
                <label for="upload_image">
                    <img src="<?= $icon ?>" width="180" id="avatar_image" class="rounded-circle"/>
                    <input type="file" name="image" class="image" id="upload_image" style="display:none"/>
                </label>
            </div>
        </div>

        <form action="blogger.php?action=update" method="post" name="blooger" id="blooger" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-group">
<!--vot-->          <label><?=lang('nickname')?></label>
                    <input class="form-control" value="<?= $nickname ?>" name="name" maxlength="20" required>
                </div>
                <div class="form-group">
<!--vot-->          <label><?=lang('email')?></label>
                    <input type="email" name="email" class="form-control" value="<?= $email ?>" required>
                </div>
                <div class="form-group">
<!--vot-->          <label><?=lang('personal_description')?></label>
                    <textarea name="description" class="form-control"><?= $description ?></textarea>
                </div>
                <div class="form-group">
<!--vot-->          <label><?=lang('login_name')?></label>
                    <input class="form-control" value="<?= $username ?>" name="username">
                </div>
                <div class="form-group">
<!--vot-->          <label><?=lang('new_password_info')?></label>
                    <input type="password" name="hidden-auto-filling" style="width: 0;border: 0;opacity: 0">
                    <input type="password" class="form-control" value="" name="newpass">
                </div>
                <div class="form-group">
<!--vot-->          <label><?=lang('new_password_repeat')?></label>
                    <input type="password" class="form-control" value="" name="repeatpass">
                </div>
                <div class="form-group">
					<?php doAction('blogger_ext') ?>
                </div>
                <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden"/>
<!--vot-->      <input type="submit" value="<?=lang('save_data')?>" class="btn btn-sm btn-success"/>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
<!--vot-->      <h5 class="modal-title"><?=lang('crop_upload')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
<!--vot-->          <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-11">
                            <img src="" id="sample_image"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
<!--vot-->      <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?=lang('cancel')?></button>
<!--vot-->      <button type="button" id="crop" class="btn btn-sm btn-success"><?=lang('save')?></button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#menu_category_sys").addClass('active');
    $("#menu_sys").addClass('show');
    $("#menu_setting").addClass('active');
    setTimeout(hideActived, 2600);

    $(document).ready(function () {
        var $modal = $('#modal');
        var image = document.getElementById('sample_image');
        var cropper;
        $('#upload_image').change(function (event) {
            var files = event.target.files;
            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };
            if (files && files.length > 0) {
                reader = new FileReader();
                reader.onload = function (event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });
        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });
        $('#crop').click(function () {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160
            });

            canvas.toBlob(function (blob) {
                var formData = new FormData();
                formData.append('image', blob, 'avatar.jpg');
                $.ajax('./blogger.php?action=update_avatar', {
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $modal.modal('hide');
                        if (data != "error") {
                            $('#avatar_image').attr('src', data);
                        }
                    }
                });
            });

        });
    });
</script>
