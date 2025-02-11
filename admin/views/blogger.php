<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (User::isAdmin()): ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><?= lang('settings') ?></h1>
    </div>
<?php endif; ?>
<div class="panel-heading">
    <?php if (User::isAdmin()): ?>
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link" href="./setting.php"><?= lang('basic_settings') ?></a></li>
            <li class="nav-item"><a class="nav-link" href="./setting.php?action=user"><?= lang('user_settings') ?></a></li>
            <li class="nav-item"><a class="nav-link" href="./setting.php?action=mail"><?= lang('email_notify') ?></a></li>
            <li class="nav-item"><a class="nav-link" href="./setting.php?action=seo"><?= lang('seo_settings') ?></a></li>
            <li class="nav-item"><a class="nav-link" href="./setting.php?action=api"><?= lang('api_interface') ?></a></li>
            <li class="nav-item"><a class="nav-link" href="./setting.php?action=ai">&#10024;AI</a></li>
            <li class="nav-item"><a class="nav-link active" href="./blogger.php"><?= lang('personal_settings') ?></a></li>
        </ul>
    <?php endif; ?>
</div>
<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <div class="row m-5">
            <label for="upload_image">
                <img src="<?= $icon ?>" width="120" height="120" id="avatar_image" class="rounded-circle" />
                <input type="file" name="image" class="image" id="upload_image" style="display:none" />
            </label>
        </div>
        <form action="blogger.php?action=update" method="post" name="profile_setting_form" id="profile_setting_form" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-group">
                    <label><?= lang('nickname') ?></label>
                    <input class="form-control" value="<?= $nickname ?>" name="name" maxlength="20" required>
                </div>
                <div class="form-group">
                    <label><?= lang('user_name') ?></label>
                    <input class="form-control" value="<?= $username ?>" name="username" id="username">
                    <small><?= lang('user_name_tips') ?></small>
                </div>
                    <label><?= lang('email') ?></label>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="" value="<?= $email ?>" disabled>
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button" id="button-addon2" data-toggle="modal" data-target="#editEmailModal" data-email="<?= $email ?>"><?= lang('modify') ?></button>
                    </div>
                </div>
                <div class="form-group">
                    <label><?= lang('personal_description') ?></label>
                    <?php if (User::haveEditPermission()): ?>
                        <a href="javascript:void(0);" class="ml-3" id="ai_button">&#10024;</a>
                    <?php endif; ?>
                    <textarea name="description" class="form-control" id="description"><?= $description ?></textarea>
                </div>
                <div class="form-group">
                    <?php doAction('blogger_ext') ?>
                </div>
                <input name="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
                <input type="submit" value="<?= lang('save_data') ?>" name="submit_form" id="submit_form" class="btn btn-sm btn-success" />
                <a href="#" type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#editPasswordModal"><?= lang('change_password') ?></a>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('crop_upload') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-11">
                            <img src="" id="sample_image" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?= lang('cancel') ?></button>
                <button type="button" id="crop" class="btn btn-sm btn-success"><?= lang('save') ?></button>
                <button type="button" id="use_original_image" class="btn btn-sm btn-primary"><?= lang('use_original_image') ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editPasswordModal" tabindex="-1" role="dialog" aria-labelledby="editPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= lang('change_password') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="blogger.php?action=change_password" id="passwd_setting_form" method="post">
                    <div class="form-group">
                        <label><?= lang('new_password_info') ?></label>
<!--vot-->              <input type="password" class="form-control" id="new_passwd" name="new_passwd" minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label><?= lang('new_password_repeat') ?></label>
<!--vot-->              <input type="password" class="form-control" id="new_passwd2" name="new_passwd2" minlength="5" required>
                    </div>
                    <div class="modal-footer">
                        <input name="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?= lang('cancel') ?></button>
                        <button type="submit" class="btn btn-sm btn-success"><?= lang('save') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editEmailModal" tabindex="-1" role="dialog" aria-labelledby="editEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= lang('email_modify') ?></h5>
                <span id="message" class="small ml-5"></span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="blogger.php?action=change_email" id="email_setting_form" method="post">
                    <div class="form-group">
                        <label><?= lang('email') ?></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="<?= lang('email_verification_code') ?>" name="mail_code" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="button" id="button-send-auth-email"><?= lang('captcha_send') ?></button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input name="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><?= lang('cancel') ?></button>
                        <button type="submit" class="btn btn-sm btn-success"><?= lang('save') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#menu_category_sys").addClass('active');
        $("#menu_sys").addClass('show');
        $("#menu_setting").addClass('active');
        setTimeout(hideActived, 3600);

        // submit Form
        $("#profile_setting_form").submit(function(event) {
            event.preventDefault();
            submitForm("#profile_setting_form");
        });

        // Change user password form
        $("#passwd_setting_form").submit(function(event) {
            event.preventDefault();
            submitForm("#passwd_setting_form", lang('password_changed_ok'));
            $("#editPasswordModal").modal('hide');
        });

        // Modify email form submission
        $("#email_setting_form").submit(function(event) {
            event.preventDefault();
/*vot*/     submitForm("#email_setting_form", lang('email_modified_ok'));
            $("#editEmailModal").modal('hide');
        });

        // Modify Email
        $('#editEmailModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var email = button.data('email')
            var modal = $(this)
            modal.find('.modal-body #email').val(email)
        })
        // Email Verification
        $('#button-send-auth-email').click(function() {
            var email = $('#email').val();
            var $btn = $(this);
            var $message = $('#message');
            $btn.prop('disabled', true);
            var count = 60;
            var countdown = setInterval(function() {
/*vot*/         $btn.text(lang('resend') + ' (' + count + ')');
                if (count == 0) {
                    clearInterval(countdown);
/*vot*/             $btn.text(lang('captcha_send'));
                    $btn.prop('disabled', false);
                }
                count--;
            }, 1000);

            $.ajax({
                url: 'account.php?action=send_email_code',
                method: 'POST',
                data: {
                    mail: email
                },
                success: function(response) {
/*vot*/             $message.text(lang('captcha_sent_ok')).css('color', 'green');
                },
                error: function(data) {
                    $message.text(data.responseJSON.msg).css('color', 'red');
                    clearInterval(countdown);
/*vot*/             $btn.text(lang('captcha_send'));
                    $btn.prop('disabled', false);
                }
            });
        });

        // Crop and upload avatar
        var $modal = $('#modal');
        var image = document.getElementById('sample_image');
        var cropper;
        $('#upload_image').change(function(event) {
            var files = event.target.files;
            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };
            if (files && files.length > 0) {
                if (!files[0].type.startsWith('image')) {
                    alert(lang('upload_images_only'));
                    return;
                }
                reader = new FileReader();
                reader.onload = function(event) {
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });
        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $('#crop').click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160
            });

            canvas.toBlob(function(blob) {
                uploadImage(blob, 'avatar.jpg');
            });
        });

        $('#use_original_image').click(function() {
            var blob = $('#upload_image')[0].files[0];
            uploadImage(blob, blob.name)
        });

        // Upload image
        function uploadImage(blob, filename) {
            var formData = new FormData();
            formData.append('image', blob, filename);
            $.ajax('./blogger.php?action=update_avatar', {
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    $modal.modal('hide');
                    if (data.code == 0) {
                        $('#avatar_image').attr('src', data.data);
                    } else {
                        alert(data.msg);
                    }
                },
                error: function(xhr) {
                    var data = xhr.responseJSON;
                    if (data && typeof data === "object") {
                        alert(data.msg);
                    } else {
                        alert(lang('avatar_upload_error'));
                    }
                }
            });
        }

        // AI 生成个人描述
        $('#ai_button').click(function() {
            $.ajax({
                url: 'ai.php?action=genBio',
                method: 'GET',
                success: function(response) {
                    $('#description').val(response.data);
                },
                error: function(xhr) {
                    alert('AI 请求失败，请稍后再试');
                }
            });
        });
    });
</script>