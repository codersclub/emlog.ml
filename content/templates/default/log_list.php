<?php
/**
 * Homepage template
 */
defined('EMLOG_ROOT') || exit('access denied!');
?>
    <main class="container blog-container">
        <div class="row">
            <div class="column-big">
                <?php doAction('index_loglist_top');
                if (!empty($logs)):
                    foreach ($logs as $value):
                        ?>
                        <div class="shadow-theme bottom-5">
                            <?php if (!empty($value['log_cover'])) : ?>
                                <div class="loglist-cover">
                                    <img src="<?= $value['log_cover'] ?>" alt="article cover" class="rea-width" data-action="zoom">
                                </div>
                            <?php endif ?>
                            <div class="card-padding loglist-body">
                                <h3 class="card-title">
                                    <a href="<?= $value['log_url'] ?>" class="loglist-title"><?= $value['log_title'] ?></a>
                                    <?php topflg($value['top'], $value['sortop'], isset($sortid) ? $sortid : '') ?>
                                    <?php bloglist_sort($value['sortid']) ?>
                                </h3>
                                <div class="loglist-content markdown"><?= $value['log_description'] ?></div>
                                <div class="loglist-tag"><?php blog_tag($value['logid']) ?></div>
                            </div>
                            <hr class="list-line"/>
                            <div class="row info-row">
                                <div class="log-info">
                                    <?php blog_author($value['author']) ?>&nbsp;<?=lang('post_time')?>&nbsp;
                                    <?= date('Y-m-d H:i', $value['date']) ?>&nbsp;
                                </div>
                                <div class="log-count">
                                <a href="<?= $value['log_url'] ?>#comment"><?=lang('comments')?> (<?= $value['comnum'] ?>)&nbsp;</a>
                                <a href="<?= $value['log_url'] ?>"><?=lang('views')?>: (<?= $value['views'] ?>)</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                else:
                    ?>
                    <p><?=lang('sorry_no_results')?></p>
                <?php endif ?>
                <div class="pagination bottom-5">
                    <?= $page_url ?>
                </div>
            </div>
            <?php include View::getView('side') ?>
        </div>
    </main>

<?php include View::getView('footer') ?>