<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<div class="d-flex align-items-center justify-content-between mb-4">
    <div class="d-flex align-items-center mb-4">
        <div class="flex-shrink-0">
            <a class="mr-2" href="blogger.php">
                <img src="<?= User::getAvatar($user_cache[UID]['avatar']) ?>"
                    alt="avatar" class="img-fluid rounded-circle border border-secondary border-3"
                    style="width: 60px;">
            </a>
        </div>
        <div class="flex-grow-1 ms-3">
            <div class="align-items-center mb-2">
                <p class="mb-0 m-2"><a class="mr-2" href="blogger.php"><?= $user_cache[UID]['name'] ?></a></p>
                <p class="mb-0 m-2 small">注册用户</p>
            </div>
        </div>
    </div>

    <a class="btn btn-success px-4 py-3" href="./article.php?action=write">
        <div class="d-inline-block bi bi-download me-2"></div>
        <i class="icofont-plus"></i>发新<?= Option::get("posts_name") ?>
    </a>
</div>
<!-- Experience Card 1-->
<div class="row">
    <div class="mb-3 col-lg-6">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col">
                        <div class="small font-weight-bold text-primary text-uppercase mb-1"><?= Option::get("posts_name") ?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="./article.php"><?= $article_amount ?></a></div>
                    </div>
                    <div class="col-auto">
                        <i class="icofont-pencil-alt-5 fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3 col-lg-6">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col">
                        <div class="small font-weight-bold text-info text-uppercase mb-1">收到评论</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="./comment.php"><?= $comment_amount ?></a></div>
                    </div>
                    <div class="col-auto">
                        <i class="icofont-comment fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <h6 class="card-header">最近发布的<?= Option::get("posts_name") ?></h6>
            <div class="card-body admin_index_list">
                <ul class="list-group list-group-flush">
                    <?php
                    if ($logs):
                        foreach ($logs as $v) :
                    ?>
                            <li class="msg_type_0 d-flex justify-content-between align-items-center">
                                <a href="<?= Url::log($v['gid']) ?>" target="_blank"><?= $v['title'] ?></a>
                                <span class="badge badge-primary rounded-pill"><?= $v['views'] ?></span>
                            </li>
                        <?php
                        endforeach;
                    else:
                        ?>
                        <p class="m-2">这里是空的。</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <h6 class="card-header">最近收到的评论</h6>
            <div class="card-body admin_index_list">
                <ul class="list-group list-group-flush">
                    <?php
                    if ($comments):
                        foreach ($comments as $v) : ?>
                            <li class="msg_type_0"><a href="<?= Url::log($v['gid']) ?>" target="_blank"><?= subString($v['comment'], 0, 25) ?></a></li>
                        <?php endforeach;
                    else:
                        ?>
                        <p class="m-2">这里是空的。</p>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php doAction('user_main_content') ?>
</div>