<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800"><?= lang('settings') ?></h1>
</div>
<div class="panel-heading">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="./setting.php"><?= lang('basic_settings') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./setting.php?action=user"><?= lang('user_settings') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./setting.php?action=mail"><?= lang('email_notify') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./setting.php?action=seo"><?= lang('seo_settings') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./setting.php?action=api">API</a></li>
        <li class="nav-item"><a class="nav-link active" href="./setting.php?action=ai"><?= lang('ai') ?></a></li>
        <li class="nav-item"><a class="nav-link" href="./blogger.php"><?= lang('personal_settings') ?></a></li>
    </ul>
</div>
<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <div class="row">
            <?php foreach ($aiModels as $k => $val):
                $apiUrl = $val['api_url'];
                $apiUrlDomain = parse_url($apiUrl, PHP_URL_HOST);
                $apiKey = subString($val['api_key'], 0, 8, '******');
                $model = $val['model'];
                if (strpos($model, 'deepseek') !== false) {
                    $model = '&#128051; ' . $model; /// Whale
                }
            ?>
                <div class="col-md-4 mb-3">
                    <div class="card model-card">
                        <div class="card-body align-items-center justify-content-center">
                            <h4 class="card-title model-name">
                                <?php if ($k == $currentModelKey): ?>
                                    <?= $model ?>
                                    <span class="badge badge-success"><?= lang('enabled') ?></span>
                                <?php else: ?>
                                    <a href="./setting.php?action=ai_model&ai_model_key=<?= $k ?>"><?= $model ?></a>
                                <?php endif; ?>
                            </h4>
                            <div class="my-3">
                                <span class="badge badge-gray" style="font-size: 1.2em;"><?= $apiUrlDomain ?></span><br>
                            </div>
                            <a href="#" class="edit-link small text-primary" data-toggle="modal" data-target="#editModelModal" data-model="<?= $val['model'] ?>" data-url="<?= $val['api_url'] ?>" data-api_key="<?= $apiKey ?>" data-model_key="<?= $k ?>" style="position: absolute; bottom: 10px; right: 40px;"><?= lang('edit') ?></a>
                            <a href="javascript: em_confirm('<?= $k ?>', 'ai_model', '<?= LoginAuth::genToken() ?>');" class="delete-link small text-danger" style="position: absolute; bottom: 10px; right: 10px;"><?= lang('delete') ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <a type="button" class="" data-toggle="modal" data-target="#addModelModal">
                            <?= lang('add_model') ?>
                        </a>
                        <p class="text-center small text-muted mt-3">
                            <a href="https://www.emlog.net/docs/ai/ai_emlog" class="text-muted" target="_blank"><?= lang('models_supported') ?></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <a type="button" class="" data-toggle="modal" data-target="#aiChatModal">
                            <?= lang('ai_chat') ?>
                        </a>
                        <p class="text-center small mt-3">
                            <a href="store.php?action=plu&keyword=AI" target="_blank" class="text-muted"><?= lang('more_ai_app') ?></a>
                        </p>
                    </div>
                </div>
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
    });
    $("#setting_ai_form").submit(function(event) {
        event.preventDefault();
        submitForm("#setting_ai_form");
    });

    $(document).ready(function() {
        $('#edit-model-form').submit(function(event) {
            event.preventDefault();
            $('#editModelModal').modal('hide');
        });

        $('.edit-link').click(function() {
            var model = $(this).data('model');
            var url = $(this).data('url');
            var api_key = $(this).data('api_key');
            var model_key = $(this).data('model_key');
            $('#editModelModal #edit_ai_model').val(model);
            $('#editModelModal #edit_ai_api_url').val(url);
            $('#editModelModal #edit_ai_api_key').val(api_key);
            $('#editModelModal #ai_model_key').val(model_key);
        });
    });
</script>
<!-- Modal for adding custom model -->
<div class="modal fade" id="addModelModal" tabindex="-1" role="dialog" aria-labelledby="addModelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="addModelModalLabel"><?= lang('add_ai_model') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="setting.php?action=ai_save" method="post" name="setting_ai_form" id="setting_ai_form">
                <div class="modal-body">
                    <p>API URL:</p>
                    <div class="form-group">
                        <input type="url" class="form-control" name="ai_api_url" id="ai_api_url" value="" />
                    </div>
                    <p>API Key:</p>
                    <div class="form-group">
                        <input type="text" class="form-control" name="ai_api_key" id="ai_api_key" value="" />
                    </div>
                    <p>Model:</p>
                    <div class="form-group">
                        <input type="text" class="form-control" name="ai_model" id="ai_model" value="" />
                        <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-sm btn-success">保存设置</button>
                    <div id="more-config-details" class="alert alert-warning mt-2">
                        <a href="https://www.deepseek.com/" target="_blank">DeepSeek</a><br>
                        API URL: https://api.deepseek.com/v1/chat/completions<br>
                        API Key: <a href="https://platform.deepseek.com/api_keys" target="_blank"><?= lang('generate_api_key') ?></a>, <?= lang('api_key_format') ?><br>
                        Model: deepseek-chat, deepseek-reasoner<br>
                        <hr>
                        <a href="https://bigmodel.cn/" target="_blank"><?= lang('zhipu_ai') ?></a><br>
                        API URL: https://open.bigmodel.cn/api/paas/v4/chat/completions<br>
                        API Key: <a href="https://bigmodel.cn/usercenter/proj-mgmt/apikeys" target="_blank"><?= lang('generate_api_key') ?></a><br>
                        Model: glm-4-plus<br>
                        <hr>
                        <a href="https://www.moonshot.cn/" target="_blank">Kimi - moonshot</a><br>
                        API URL: https://api.moonshot.cn/v1/chat/completions<br>
                        API Key: <a href="https://platform.moonshot.cn/console/api-keys" target="_blank"><?= lang('generate_api_key') ?></a>, <?= lang('api_key_format') ?><br>
                        <?= lang('moon_model') ?><br>
                        <hr>
                        <a href="https://tongyi.aliyun.com/" target="_blank"><?= lang('alibaba_model') ?></a><br>
                        API URL: https://dashscope.aliyuncs.com/compatible-mode/v1/chat/completions
                        <br>
                        API Key: <a href="https://bailian.console.aliyun.com/?apiKey=1#/api-key" target="_blank"><?= lang('generate_api_key') ?></a>, <?= lang('api_key_format') ?><br>
                        <?= lang('qwen_model') ?>
                        <hr>
                        <?= lang('only_big_model') ?> <a href="https://www.emlog.net/docs/ai/ai_emlog" target="_blank"><?= lang('see_more') ?></a><br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for editing custom model -->
<div class="modal fade" id="editModelModal" tabindex="-1" role="dialog" aria-labelledby="editModelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="editModelModalLabel"><?= lang('model_edit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="setting.php?action=ai_update" method="post" name="edit_model_form" id="edit_model_form">
                <div class="modal-body">
                    <p>API URL:</p>
                    <div class="form-group">
                        <input type="url" class="form-control" value="" name="edit_ai_api_url" id="edit_ai_api_url" disabled />
                    </div>
                    <p>API Key:</p>
                    <div class="form-group">
                        <input type="text" class="form-control" value="" name="edit_ai_api_key" id="edit_ai_api_key" disabled />
                    </div>
                    <p>Model:</p>
                    <div class="form-group">
                        <input type="text" class="form-control" name="edit_ai_model" id="edit_ai_model" value="" />
                        <input type="hidden" name="ai_model_key" id="ai_model_key" value="" />
                        <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-sm btn-success">保存设置</button>
                </div>
            </form>
        </div>
    </div>
</div>