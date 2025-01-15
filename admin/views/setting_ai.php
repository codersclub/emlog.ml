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
            <?php foreach ($aiModels as $val): ?>
                <div class="col-md-4 mb-3">
                    <div class="card model-card">
                        <div class="card-body align-items-center justify-content-center">
                            <h5 class="card-title model-name">
                                <?php if ($val['model'] == $aiModel): ?>
                                    <?= $val['model'] ?>
                                    <span class="badge badge-success"><?= lang('enabled') ?></span>
                                <?php else: ?>
                                    <a href="./setting.php?action=ai_model&ai_model=<?= $val['model'] ?>"><?= $val['model'] ?></a>
                                <?php endif; ?>
                            </h5>
                            <div class="small my-3">
                                <?= $val['api_url'] ?><br>
                                <?= subString($val['api_key'], 0, 16, '******') ?><br>
                            </div>
                            <a href="./setting.php?action=delete_model&ai_model=<?= $val['model'] ?>" class="delete-link small text-danger" style="position: absolute; bottom: 10px; right: 10px;"><?= lang('delete') ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <a type="button" class="" data-toggle="modal" data-target="#addModelModal">
                            <?= lang('add_model') ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <a type="button" class="" data-toggle="modal" data-target="#aiChatModal">
                            <?= lang('ai_chat') ?>
                        </a>
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
    });
</script>
<!-- Modal for adding custom model -->
<div class="modal fade" id="addModelModal" tabindex="-1" role="dialog" aria-labelledby="addModelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModelModalLabel"><?= lang('add_ai_model') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="setting.php?action=ai_save" method="post" name="setting_ai_form" id="setting_ai_form">
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
                    </div>
                    <div class="form-group mt-3">
                        <input name="token" id="token" value="<?= LoginAuth::genToken() ?>" type="hidden" />
                        <button type="submit" class="btn btn-success btn-sm"><?= lang('save_settings') ?></button>
                    </div>
                    <div id="more-config-details" class="alert alert-warning small">
                        <a href="https://www.deepseek.com/" target="_blank">DeepSeek</a><br>
                        API URL: https://api.deepseek.com/v1/chat/completions<br>
                        API Key: <a href="https://platform.deepseek.com/api_keys" target="_blank"><?= lang('generate_api_key') ?></a>, <?= lang('api_key_format') ?><br>
                        Model: deepseek-chat<br>
                        <hr>
                        <a href="https://bigmodel.cn/" target="_blank"><?= lang('zhipu_ai') ?></a><br>
                        API URL: https://open.bigmodel.cn/api/paas/v4/chat/completions<br>
                        API Key: <a href="https://bigmodel.cn/usercenter/proj-mgmt/apikeys" target="_blank"><?= lang('generate_api_key') ?></a><br>
                        Model: glm-4-plus<br>
                        <hr>
                        <a href="https://www.moonshot.cn/" target="_blank">Kimi - moonshot</a><br>
                        API URL: https://api.moonshot.cn/v1/chat/completions<br>
                        API Key: <a href="https://platform.moonshot.cn/console/api-keys" target="_blank"><?= lang('generate_api_key') ?></a>, <?= lang('api_key_format') ?><br>
                        <?= lang('moon_models') ?><br>
                        <hr>
                        <a href="https://tongyi.aliyun.com/" target="_blank"><?= lang('tongyi_model') ?></a><br>
                        API URL: https://dashscope.aliyuncs.com/compatible-mode/v1/chat/completions
                        <br>
                        API Key: <a href="https://bailian.console.aliyun.com/?apiKey=1#/api-key" target="_blank"><?= lang('generate_api_key') ?></a>, <?= lang('api_key_format') ?><br>
                        <?= lang('qwen_models') ?>
                        <hr>
                        仅支持配置openai协议的大模型，<a href="https://www.emlog.net/docs/ai/ai_emlog" target="_blank">查看更多</a><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>