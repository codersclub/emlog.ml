<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
<?php if (isset($_GET['activated'])): ?>
    <div class="alert alert-success"><?= lang('saved_ok') ?></div><?php endif ?>
<h1 class="h4 mb-4 text-gray-800"><?= lang('widget_manage') ?></h1>
<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6" id="adm_widget_list">
                <div class="accordion" id="accordionExample">
                    <div class="card" id="blogger">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link widget-title" type="button" data-toggle="collapse" data-target="#bloggerForm" aria-expanded="true"
                                    aria-controls="blogger">
                                    <?= lang('blogger') ?>
                                </button>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h2>
                        </div>
                        <div id="bloggerForm" class="collapse show" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="widgets.php?action=setwg&wg=blogger" method="post" class="form-inline">
                                    <li>
                                        <input type="text" name="title" class="form-control" value="<?= $customWgTitle['blogger'] ?>" />
                                        <input type="submit" name="" value="<?= lang('save') ?>" class="btn btn-success btn-sm" />
                                    </li>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="calendar">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed widget-title" type="button" data-toggle="collapse" data-target="#calendarForm" aria-expanded="false"
                                    aria-controls="collapseTwo"><?= lang('calendar') ?>
                                </button>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h2>
                        </div>
                        <div id="calendarForm" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="widgets.php?action=setwg&wg=calendar" method="post" class="form-inline">
                                    <li>
                                        <input type="text" name="title" class="form-control" value="<?= $customWgTitle['calendar'] ?>" />
                                        <input type="submit" name="" value="<?= lang('save') ?>" class="btn btn-success btn-sm" />
                                    </li>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card" id="twitter">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed widget-title" type="button" data-toggle="collapse" data-target="#twitterForm" aria-expanded="false"
                                    aria-controls="collapseThree"><?= lang('twitters') ?>
                                </button>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h2>
                        </div>
                        <div id="twitterForm" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="widgets.php?action=setwg&wg=twitter" method="post">
                                    <div class="form-group">
                                        <label><?= lang('title') ?></label>
                                        <input type="text" name="title" class="form-control" value="<?= $customWgTitle['twitter']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label><?= lang('twitter_latest_num') ?></label>
                                        <input maxlength="5" size="10" class="form-control" type="number" min="1" required value="<?= Option::get('index_newtwnum'); ?>" name="index_newtwnum" />
                                    </div>
                                    <input type="submit" name="" value="<?= lang('save') ?>" class="btn btn-success btn-sm" />
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card" id="tag">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed widget-title" type="button" data-toggle="collapse" data-target="#tagForm" aria-expanded="false"
                                    aria-controls="collapseThree"><?= lang('tags') ?>
                                </button>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h2>
                        </div>
                        <div id="tagForm" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="widgets.php?action=setwg&wg=tag" method="post" class="form-inline">
                                    <li>
                                        <input type="text" name="title" class="form-control" value="<?= $customWgTitle['tag'] ?>" />
                                        <input type="submit" name="" value="<?= lang('save') ?>" class="btn btn-success btn-sm" />
                                    </li>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="sort">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed widget-title" type="button" data-toggle="collapse" data-target="#sortForm" aria-expanded="false"
                                    aria-controls="collapseThree"><?= lang('categories') ?>
                                </button>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h2>
                        </div>
                        <div id="sortForm" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="widgets.php?action=setwg&wg=sort" method="post" class="form-inline">
                                    <li>
                                        <input type="text" name="title" class="form-control" value="<?= $customWgTitle['sort'] ?>" />
                                        <input type="submit" name="" value="<?= lang('save') ?>" class="btn btn-success btn-sm" />
                                    </li>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="archive">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed widget-title" type="button" data-toggle="collapse" data-target="#archiveForm" aria-expanded="false"
                                    aria-controls="collapseThree"><?= lang('archive') ?>
                                </button>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h2>
                        </div>
                        <div id="archiveForm" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="widgets.php?action=setwg&wg=archive" method="post" class="form-inline">
                                    <li>
                                        <input type="text" name="title" class="form-control" value="<?= $customWgTitle['archive'] ?>" />
                                        <input type="submit" name="" value="<?= lang('save') ?>" class="btn btn-success btn-sm" />
                                    </li>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="newcomm">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed widget-title" type="button" data-toggle="collapse" data-target="#newcommFrom" aria-expanded="false"
                                    aria-controls="collapseThree"><?= lang('newcomm') ?>
                                </button>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h2>
                        </div>
                        <div id="newcommFrom" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="widgets.php?action=setwg&wg=newcomm" method="post">
                                    <div class="form-group">
                                        <label><?= lang('title') ?></label>
                                        <input type="text" name="title" class="form-control" value="<?= $customWgTitle['newcomm'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label><?= lang('last_comments_num') ?></label>
                                        <input class="form-control" maxlength="5" size="10" value="<?= Option::get('index_comnum') ?>" name="index_comnum" />
                                    </div>
                                    <div class="form-group">
                                        <label><?= lang('new_comments_length') ?></label>
                                        <input class="form-control" maxlength="5" size="10" value="<?= Option::get('comment_subnum') ?>" name="comment_subnum" />
                                    </div>
                                    <input type="submit" name="" value="<?= lang('save') ?>" class="btn btn-success btn-sm" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="newlog">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed widget-title" type="button" data-toggle="collapse" data-target="#newlogForm" aria-expanded="false"
                                    aria-controls="collapseThree"><?= lang('newlog') ?>
                                </button>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h2>
                        </div>
                        <div id="newlogForm" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="widgets.php?action=setwg&wg=newlog" method="post">
                                    <div class="form-group">
                                        <label><?= lang('title') ?></label>
                                        <input type="text" name="title" class="form-control" value="<?= $customWgTitle['newlog'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label><?= lang('new_posts_show') ?></label>
                                        <input class="form-control" maxlength="5" size="10" value="<?= Option::get('index_newlognum') ?>" name="index_newlog" />
                                    </div>
                                    <input type="submit" name="" value="<?= lang('save') ?>" class="btn btn-success btn-sm" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="hotlog">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed widget-title" type="button" data-toggle="collapse" data-target="#hotlogForm" aria-expanded="false"
                                    aria-controls="collapseThree"><?= lang('hotlog') ?>
                                </button>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h2>
                        </div>
                        <div id="hotlogForm" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="widgets.php?action=setwg&wg=hotlog" method="post">
                                    <div class="form-group">
                                        <label><?= lang('title') ?></label>
                                        <input type="text" name="title" class="form-control" value="<?= $customWgTitle['hotlog'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label><?= lang('hot_posts_home') ?></label>
                                        <input class="form-control" maxlength="5" size="10" value="<?= Option::get('index_hotlognum') ?>" name="index_hotlognum" />
                                    </div>
                                    <input type="submit" name="" value="<?= lang('save') ?>" class="btn btn-success btn-sm" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="link">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed widget-title" type="button" data-toggle="collapse" data-target="#linkForm" aria-expanded="false"
                                    aria-controls="collapseThree"><?= lang('link') ?>
                                </button>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h2>
                        </div>
                        <div id="linkForm" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="widgets.php?action=setwg&wg=link" method="post" class="form-inline">
                                    <li>
                                        <input type="text" name="title" class="form-control" value="<?= $customWgTitle['link'] ?>" />
                                        <input type="submit" name="" value="<?= lang('save') ?>" class="btn btn-success btn-sm" />
                                    </li>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card" id="search">
                        <div class="card-header">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed widget-title" type="button" data-toggle="collapse" data-target="#searchForm" aria-expanded="false"
                                    aria-controls="collapseThree"><?= lang('search') ?>
                                </button>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h2>
                        </div>
                        <div id="searchForm" class="collapse" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="widgets.php?action=setwg&wg=search" method="post" class="form-inline">
                                    <li>
                                        <input type="text" name="title" value="<?= $customWgTitle['search'] ?>" class="form-control" />
                                        <input type="submit" name="" value="<?= lang('save') ?>" class="btn btn-success btn-sm" />
                                    </li>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    foreach ($custom_widget as $key => $val):
                        preg_match("/^custom_wg_(\d+)/", $key, $matches);
                        $custom_wg_title = empty($val['title']) ? lang('widget_untitled') . ' (' . $matches[1] . ')' : $val['title'];
                    ?>
                        <div class="card" id="<?= $key ?>">
                            <div class="card-header">
                                <h2 class="mb-0">
                                    <button class="btn btn-link widget-title" type="button" data-toggle="collapse" data-target="#<?= $key ?>Form" aria-expanded="true"
                                        aria-controls="collapseOne"><?= $custom_wg_title ?>
                                    </button>
                                    <li class="widget-act-add"></li>
                                    <li class="widget-act-del"></li>
                                </h2>
                            </div>
                            <div id="<?= $key ?>Form" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form action="widgets.php?action=setwg&wg=custom_text" method="post">
                                        <li>
                                            <input type="hidden" name="custom_wg_id" value="<?= $key ?>" />
                                            <input type="text" name="title" class="form-control" value="<?= $val['title'] ?>" /><br />
                                        </li>
                                        <li><textarea class="form-control" name="content" style="overflow:auto; height:260px;"><?= $val['content'] ?></textarea><br /></li>
                                        <li>
                                            <input type="submit" class="btn btn-sm btn-success" name="" value="<?= lang('save') ?>" />
                                            <a class="btn btn-sm btn-danger" href="widgets.php?action=setwg&wg=custom_text&rmwg=<?= $key ?>"><?= lang('widget_delete') ?></a>
                                        </li>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="my-3">
                    <a href="#" class="btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#addModal"><i class="icofont-plus"></i> <?= lang('widget_add') ?></a>
                </div>

                <!--Add custom widget-->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content border-0 shadow">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="exampleModalLabel"><?= lang('widget_add') ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="widgets.php?action=setwg&wg=custom_text" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="sortname"><?= lang('widget_title') ?></label>
                                        <input class="form-control" id="new_title" name="new_title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_content"><?= lang('widget_content_info') ?></label>
                                        <textarea id="new_content" name="new_content" class="form-control" rows="10" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><?= lang('cancel') ?></button>
                                    <button type="submit" class="btn btn-sm btn-success"><?= lang('save') ?></button>
                                    <span id="alias_msg_hook"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <h1 class="h4 mb-4 text-gray-800"><?= lang('widget_manage') ?></h1>
                <form action="widgets.php?action=compages" method="post">
                    <div id="sortable" class="adm_widget_box">
                        <?php
                        foreach ($widgets as $widget):
                            $flg = strpos($widget, 'custom_wg_') === 0;                                                         //If it is a custom widgets
                            $title = ($flg && isset($custom_widget[$widget]['title'])) ? $custom_widget[$widget]['title'] : ''; //Get custom widget title
                            if ($flg && empty($title)) {
                                preg_match("/^custom_wg_(\d+)/", $widget, $matches);
                                $title = lang('widget_untitled') . ' (' . $matches[1] . ')';
                            }
                        ?>
                            <div class="card m-1 active_widget" style="cursor: move" id="em_<?= $widget ?>">
                                <div class="card-header">
                                    <div class="mb-0">
                                        <h6>
                                            <?php if ($flg) {
                                                echo $title;
                                            } else {
                                                echo $widgetTitle[$widget];
                                            } ?>
                                        </h6>
                                        <input type="hidden" name="widgets[]" value="<?= $widget ?>" />
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="my-3">
                        <input type="submit" value="<?= lang('widget_order_save') ?>" class="btn btn-sm btn-success" />
                        <a href="javascript:em_confirm(0, 'reset_widget', '<?= LoginAuth::genToken() ?>');" class="btn btn-sm btn-warning"><?= lang('widget_setting_reset') ?></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        setTimeout(hideActived, 3600);

        $("#menu_category_view").addClass('active');
        $("#menu_view").addClass('show');
        $("#menu_widget").addClass('active');

        var widgets = $(".active_widget").map(function() {
            return $(this).attr("id");
        });
        $.each(widgets, function(i, widget_id) {
            var widget_id = widget_id.substring(3);
            $("#" + widget_id + " .widget-act-add").hide();
            $("#" + widget_id + " .widget-act-del").show();
        });

        //Add widget
        $("#adm_widget_list .widget-act-add").click(function() {
            var title = $(this).prevAll(".widget-title").html();
            var widget_id = $(this).parent().parent().parent().attr("id");
            var widget_element = "<div class=\"card m-1\" id=\"em_" + widget_id + "\">";
            widget_element += "<div class=\"card-header\"><div class=\"mb-0\">";
            widget_element += "<h6>" + title + "</h6>";
            widget_element += "<input type=\"hidden\" name=\"widgets[]\" value=\"" + widget_id + "\" />";
            widget_element += "</div></div>";
            widget_element += "</div>";
            // console.log("The title %s, id: s%", title, widget_id);
            $(".adm_widget_box").append(widget_element);
            $(this).hide();
            $(this).next(".widget-act-del").show();
        });
        //Remove widget
        $("#adm_widget_list .widget-act-del").click(function() {
            var widget_id = $(this).parent().parent().parent().attr("id");
            $(".adm_widget_box #em_" + widget_id).remove();
            $(this).hide();
            $(this).prev(".widget-act-add").show();
        });

        //Drag
        $("#sortable").sortable();
        $("#sortable").disableSelection();
    });
</script>