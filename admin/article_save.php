<?php
/**
 * article save and update
 * @package EMLOG
 * @link https://www.emlog.net
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once 'globals.php';

if (empty($_POST)) {
    exit;
}

$Log_Model = new Log_Model();
$Tag_Model = new Tag_Model();

$title = Input::postStrVar('title');
$postDate = isset($_POST['postdate']) ? strtotime(trim($_POST['postdate'])) : time();
$sort = Input::postIntVar('sort', -1);
$tagstring = isset($_POST['tag']) ? strip_tags(addslashes(trim($_POST['tag']))) : '';
$content = Input::postStrVar('logcontent');
$excerpt = Input::postStrVar('logexcerpt');
$alias = Input::postStrVar('alias');
$top = Input::postStrVar('top', 'n');
$sortop = Input::postStrVar('sortop', 'n');
$allow_remark = Input::postStrVar('allow_remark', 'n');
$password = Input::postStrVar('password');
$template = Input::postStrVar('template');
$cover = Input::postStrVar('cover');
$link = Input::postStrVar('link');
$author = isset($_POST['author']) && User::haveEditPermission() ? (int)trim($_POST['author']) : UID;
$ishide = Input::postStrVar('ishide', 'y');
$blogid = Input::postIntVar('as_logid', -1); //Article is automatically saved as draft with id
$pubPost = Input::postStrVar('pubPost'); // Whether to publish the article directly instead of saving a draft
$auto_excerpt = Input::postStrVar('auto_excerpt');

if ($auto_excerpt === 'y') {
    $origContent = trim($_POST['logcontent']);
    $parseDown = new Parsedown();
    $excerpt = $parseDown->text($origContent);
    $excerpt = extractHtmlData($excerpt, 180);
    $excerpt = str_replace(["\r", "\n", "'", '"'], ' ', $excerpt);
}

if ($pubPost) {
    $ishide = 'n';
}

if (!empty($alias)) {
    $logalias_cache = $CACHE->readCache('logalias');
    $alias = $Log_Model->checkAlias($alias, $logalias_cache, $blogid);
}

//The administrator does not review the post, and the registered user is controlled by the switch
$checked = Option::get('ischkarticle') == 'y' && !User::haveEditPermission() ? 'n' : 'y';

$logData = [
    'title'        => $title,
    'alias'        => $alias,
    'content'      => $content,
    'excerpt'      => $excerpt,
    'cover'        => $cover,
    'author'       => $author,
    'sortid'       => $sort,
    'date'         => $postDate,
    'top '         => $top,
    'sortop '      => $sortop,
    'allow_remark' => $allow_remark,
    'hide'         => $ishide,
    'checked'      => $checked,
    'password'     => $password,
    'link'         => $link,
    'template'     => $template,
];

if (User::isWriter()) {
    $count = $Log_Model->getPostCountByUid(UID, time() - 3600 * 24);
    $post_per_day = Option::get('posts_per_day');
    if ($count >= $post_per_day) {
        emDirect("./article.php?error_post_per_day=1");
    }
}

doMultiAction('pre_save_log', $logData, $logData);

if ($blogid > 0) {
    $Log_Model->updateLog($logData, $blogid);
    $Tag_Model->updateTag($tagstring, $blogid);
} else {
    $blogid = $Log_Model->addlog($logData);
    $Tag_Model->addTag($tagstring, $blogid);
}

$CACHE->updateArticleCache();

doAction('save_log', $blogid, $pubPost, $logData);

// Save asynchronously
if ($action === 'autosave') {
    exit('autosave_gid:' . $blogid . '_');
}

// Save draft
if ($ishide === 'y') {
    emDirect("./article.php?draft=1&active_savedraft=1");
}

// Article (draft) saved as public
if ($pubPost) {
    if (!User::haveEditPermission()) {
        notice::sendNewPostMail($title, $blogid);
    }
    emDirect("./article.php?active_post=1");
}

// Edit article (save and return)
$page = $Log_Model->getPageOffset($postDate, Option::get('admin_perpage_num'));
emDirect("./article.php?active_savelog=1&page=" . $page);
