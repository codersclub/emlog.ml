<?php
defined('EMLOG_ROOT') || exit('access denied!');
$tplget = $this->getTemplateDefinedOptions($template);
$tplnavi_icons = isset($tplget['TplOptionsNavi']['icons']) ? $tplget['TplOptionsNavi']['icons'] : [];
$tplnavi = isset($tplget['TplOptionsNavi']['values']) ? $tplget['TplOptionsNavi']['values'] : [];
$is_has_menu = array_key_exists('TplOptionsNavi', $tplget);
?>
<div class="vtpl-modern-theme">
    <div class="vtpl-container">
        <div class="vtpl-header vtpl-sticky-header">
            <div class="vtpl-header-inner">
                <div class="vtpl-header-left">
                    <h1><?= $allTemplate[$template]['name'] ?></h1>
                </div>
                <div class="vtpl-header-right">
                    <div class="vtpl-buttons">
                        <input type="submit" class="button vtpl-back-primary tpl-options-close" value="<?= lang('back') ?>">
                        <?php if ($is_has_menu): ?>
                            <input type="submit" class="button vtpl-menu none" value="<?= lang('menu') ?>">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <?php if (!$is_has_menu): ?>
            <style>
                .option {
                    display: block !important
                }
            </style>
        <?php endif; ?>
        <div class="vtpl-wrapper vtpl-option-main">
            <div class="vtpl-nav vtpl-nav-options tpl-nav-options">
                <ul>
                    <li onClick="TplShow('tpl-system')" class="active"><?=lang('settings_help')?></li>
                    <?php
                    foreach ($tplnavi as $key => $v):
                        $icom_html = '';
                        if ($tplnavi_icons) {
                            $icom_html = trim($tplnavi_icons[$key]) ? '<i class="' . $tplnavi_icons[$key] . ' ri-lg"></i>' : '';
                        }
                    ?>
                        <li onClick="TplShow('<?= $key; ?>')"><?= $icom_html . $v; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="fixed-body"></div>
            <div class="vtpl-content">
                <form action="<?= $this->url(array('template' => $template)); ?>" method="post" class="tpl-options-form">
                    <?php if (array_key_exists('TplOptionsNavi', $tplget)): ?>
                        <div class="option tpl-system" style="display:block;">
                            <div class="option-body depend-none"><?= $tplget['TplOptionsNavi']['description']; ?></div>
                        </div>
                    <?php endif; ?>
                    <?php $this->renderOptions(); ?>
                </form>
            </div>
            <div class="vtpl-nav-background"></div>
        </div>
    </div>
</div>