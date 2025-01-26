<?php

/**
 * Common function library
 * @package EMLOG
 * @link https://www.emlog.net
 */

function emAutoload($class)
{
    $class = strtolower($class);

/*vot*/ load_language($class);

    if (file_exists(EMLOG_ROOT . '/include/model/' . $class . '.php')) {
        require_once(EMLOG_ROOT . '/include/model/' . $class . '.php');
    } elseif (file_exists(EMLOG_ROOT . '/include/lib/' . $class . '.php')) {
        require_once(EMLOG_ROOT . '/include/lib/' . $class . '.php');
    } elseif (file_exists(EMLOG_ROOT . '/include/controller/' . $class . '.php')) {
        require_once(EMLOG_ROOT . '/include/controller/' . $class . '.php');
    } elseif (file_exists(EMLOG_ROOT . '/include/service/' . $class . '.php')) {
        require_once(EMLOG_ROOT . '/include/service/' . $class . '.php');
    }
}

/**
 * Convert HTML Code
 */
function htmlClean($content, $nl2br = true)
{
    $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
    if ($nl2br) {
        $content = nl2br($content);
    }
    $content = str_replace('  ', '&nbsp;&nbsp;', $content);
    $content = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;', $content);
    return $content;
}

if (!function_exists('getIp')) {
    function getIp()
    {
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $list = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = $list[0];
        }
        if (!ip2long($ip)) {
            $ip = '';
        }
        return $ip;
    }
}

if (!function_exists('getUA')) {
    function getUA()
    {
        return isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    }
}

/**
 * Get site URL (Only for the root directory script, currently used only for home ajax request)
 */
function getBlogUrl()
{
    $phpself = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '';
    if (preg_match("/^.*\//", $phpself, $matches)) {
        return 'http://' . $_SERVER['HTTP_HOST'] . $matches[0];
    } else {
        return BLOG_URL;
    }
}

/**
 * Get the currently visited base url
 */
function realUrl()
{
    static $real_url = NULL;
    if ($real_url !== NULL) {
        return $real_url;
    }

/*vot*/ $emlog_path = EMLOG_ROOT . '/';
    $script_path = pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_DIRNAME);
    $path_element = explode('/', $script_path);

    $this_match = '';
    $best_match = '';
    $current_deep = 0;
    $max_deep = count($path_element);
    while ($current_deep < $max_deep) {
/*vot*/ $this_match = $this_match . $path_element[$current_deep] . '/';
        if (substr($emlog_path, strlen($this_match) * (-1)) === $this_match) {
            $best_match = $this_match;
        }
        $current_deep++;
    }

    $best_match = str_replace(DIRECTORY_SEPARATOR, '/', $best_match);

    $protocol = 'http://';
    if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') { // Compatible with nginx reverse proxy
        $protocol = 'https://';
    } elseif (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $protocol = 'https://';
    }
    $host = $_SERVER['HTTP_HOST'];
    $real_url = $protocol . $host . $best_match;
    return $real_url;
}


/**
 * Check plugin
 */
function checkPlugin($plugin)
{
    if (is_string($plugin) && preg_match("/^[\w\-\/]+\.php$/", $plugin) && file_exists(EMLOG_ROOT . '/content/plugins/' . $plugin)) {
        return true;
    }

    return false;
}

/**
 * Verify email address format
 */
function checkMail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }

    return false;
}

/**
 * Substring encoded as utf8
 *
 * @param string $strings Preprocessed string
 * @param int $start Start position, eg:0
 * @param int $length Length
 */
function subString($strings, $start, $length, $dot = '...')
{
    if (function_exists('mb_substr') && function_exists('mb_strlen')) {
        $sub_str = mb_substr($strings, $start, $length, 'UTF-8');
        return mb_strlen($sub_str, 'UTF-8') < mb_strlen($strings, 'UTF-8') ? $sub_str . $dot : $sub_str;
    } else {
        $sub_str = substr($strings, $start, $length);
        return strlen($sub_str) < strlen($strings) ? $sub_str . $dot : $sub_str;
    }
}

/**
 * Extract plain text from html content
 */
function extractHtmlData($data, $len)
{
    $data = subString(strip_tags($data), 0, $len + 30);
    $search = array(
        "/([\r\n])[\s]+/", // Remove whitespace characters
        "/&(quot|#34);/i", // Replace HTML entities
        "/&(amp|#38);/i",
        "/&(lt|#60);/i",
        "/&(gt|#62);/i",
        "/&(nbsp|#160);/i",
        "/&(iexcl|#161);/i",
        "/&(cent|#162);/i",
        "/&(pound|#163);/i",
        "/&(copy|#169);/i",
        "/\"/i",
    );
    $replace = array(" ", "\"", "&", " ", " ", "", chr(161), chr(162), chr(163), chr(169), "");
    $data = trim(subString(preg_replace($search, $replace, $data), 0, $len));
    return $data;
}

/**
 * Convert file size unit
 *
 * @param string $fileSize //File Size kb
 */
function changeFileSize($fileSize)
{
    if ($fileSize >= 1073741824) {
        $fileSize = round($fileSize / 1073741824, 2) . 'GB';
    } elseif ($fileSize >= 1048576) {
        $fileSize = round($fileSize / 1048576, 2) . 'MB';
    } elseif ($fileSize >= 1024) {
        $fileSize = round($fileSize / 1024, 2) . 'KB';
    } else {
        $fileSize .= lang('_bytes');
    }
    return $fileSize;
}

/**
 * Get the file name suffix
 */
function getFileSuffix($fileName)
{
    return strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
}

/**
 * Convert relative path to full URL, eg: ../content/uploadfile/xxx.jpeg
 */
function getFileUrl($filePath)
{
    if (stripos($filePath, 'http') === false) {
        return BLOG_URL . substr($filePath, 3);
    }
    return $filePath;
}

/**
 * Remove the url parameter
 */
function rmUrlParams($url)
{
    $urlInfo = explode("?", $url);
    if (empty($urlInfo[0])) {
        return $url;
    }
    return $urlInfo[0];
}

function isImage($mimetype)
{
    if (strpos($mimetype, "image") !== false) {
        return true;
    }
    return false;
}

function isVideo($mimetype)
{
    if (strpos($mimetype, "video") !== false) {
        return true;
    }
    return false;
}

function isAudio($fileName)
{
    $suffix = getFileSuffix($fileName);
    return $suffix === 'mp3';
}

function isZip($fileName)
{
    $suffix = getFileSuffix($fileName);
    if (in_array($suffix, ['zip', 'rar', '7z', 'gz'])) {
        return true;
    }
    return false;
}

/**
 * Pagination Function
 *
 * @param int $count The total number of entries
 * @param int $perlogs The number of articles per page
 * @param int $page The current page number
 * @param string $url Page address
 * @return string
 */
function pagination($count, $perlogs, $page, $url, $anchor = '')
{
    $pnums = @ceil($count / $perlogs);
    $re = '';
    $urlHome = preg_replace("|[\?&/][^\./\?&=]*page[=/\-]|", "", $url);

    $frontContent = '';
    $paginContent = '';
    $endContent = '';
    $circle_a = 1;
    $circle_b = $pnums;
    $neighborNum = 1;
    $minKey = 4;

    if ($pnums == 1)
        return $re;
    if ($page >= 1 && $pnums >= 7) {
        $frontContent .= " <a href=\"$urlHome$anchor\">1</a> ";
        $frontContent .= " <em> ... </em> ";
        $endContent .= " <em> ... </em> ";
        $endContent .= " <a href=\"$url$pnums$anchor\">$pnums</a> ";
        if ($pnums >= 12) {
            $minKey = 7;
            $neighborNum = 3;
        }
        if ($page < $minKey) {
            $circle_b = $minKey;
            $frontContent = '';
        }
        if ($page > ($pnums - $minKey + 1)) {
            $circle_a = $pnums - $minKey + 1;
            $endContent = '';
        }
        if ($page > ($minKey - 1) && $page < ($pnums - $minKey + 2)) {
            $circle_a = $page - $neighborNum;
            $circle_b = $page + $neighborNum;
        }
        if ($page != 1) {
            $frontContent = " <a href=\"$url" . ($page - 1) . "$anchor\" title=\"Previous Page\">&laquo;</a> " . $frontContent;
        }
        if ($page != $pnums) {
            $endContent .= " <a href=\"$url" . ($page + 1) . "$anchor\" title=\"Next Page\">&raquo;</a> ";
        }
    }
    for ($i = $circle_a; $i <= $circle_b; $i++) {
        if ($i == $page) {
            $paginContent .= " <span>$i</span> ";
        } elseif ($i == 1) {
            $paginContent .= " <a href=\"$urlHome$anchor\">$i</a> ";
        } else {
            $paginContent .= " <a href=\"$url$i$anchor\">$i</a> ";
        }
    }
    $re = $frontContent . $paginContent . $endContent;
    return $re;
}

/**
 * This function is called in the plug-in, and the plug-in function is mounted on the reserved hook
 */
function addAction($hook, $actionFunc)
{
    // Store plug-in functions mounted on the mount point through global variables
    global $emHooks;
    if (!isset($emHooks[$hook]) || !in_array($actionFunc, $emHooks[$hook])) {
        $emHooks[$hook][] = $actionFunc;
    }
    return true;
}

/**
 * Mount execution mode 1 (plug-in mount): Execute the function hung on the hook, support multiple parameters eg:doAction('post_comment', $author, $email, $url, $comment);
 * eg: Insert extended content at the mount point
 */
function doAction($hook)
{
    global $emHooks;
    $args = array_slice(func_get_args(), 1);
    if (isset($emHooks[$hook])) {
        foreach ($emHooks[$hook] as $function) {
            call_user_func_array($function, $args);
        }
    }
}

/**
 * Mount execution mode 2 (single takeover mount): Execute the first function hung on the hook, execute the line only once, receive input input, and modify the incoming variable $ret
 * eg: Take over the file upload function and change the upload from local to cloud
 */
function doOnceAction($hook, $input, &$ret)
{
    global $emHooks;
    $args = [$input, &$ret];
    $func = !empty($emHooks[$hook][0]) ? $emHooks[$hook][0] : '';
    if ($func) {
        call_user_func_array($func, $args);
    }
}

/**
 * Mount execution mode 3 (takeover mount in turn): Execute all functions hung on the hook, the previous execution result is used as the next input, and the incoming variable $ret will be modified
 * eg: Different plug-ins make different modifications and replacements to the content of the article.
 */
function doMultiAction($hook, $input, &$ret)
{
    global $emHooks;
    $args = [$input, &$ret];
    if (isset($emHooks[$hook])) {
        foreach ($emHooks[$hook] as $function) {
            call_user_func_array($function, $args);
            $args = [&$ret, &$ret];
        }
    }
}

/**
 * Intercept the first len characters of the article content
 */
function subContent($content, $len, $clean = 0)
{
    if ($clean) {
        $content = strip_tags($content);
    }
    return subString($content, 0, $len);
}

/**
 * Time transformation function
 * @param $timestamp int Timestamp (seconds)
 * @param $format
 * @return false|string
 */
function smartDate($timestamp, $format = 'Y-m-d H:i')
{
    $sec = time() - $timestamp;
    if ($sec < 60) {
        $op = $sec . lang('_sec_ago');
    } elseif ($sec < 3600) {
        $op = floor($sec / 60) . lang('_min_ago');
    } elseif ($sec < 3600 * 24) {
        $op = floor($sec / 3600) . lang('_hour_ago');
    } elseif ($sec < 3600 * 24 * 30) {
        $days = floor($sec / (3600 * 24));
        $op = $days . lang('_days');
    } elseif ($sec < 3600 * 24 * 365) {
        $months = floor($sec / (3600 * 24 * 30));
        $op = $months . lang('_months');
    } elseif ($sec < 3600 * 24 * 365 * 5) {
        $years = floor($sec / (3600 * 24 * 365));
        $op = $years . lang('_years');
    } else {
        $op = date($format, $timestamp);
    }
    return $op;
}

function getRandStr($length = 12, $special_chars = true, $numeric_only = false)
{
    if ($numeric_only) {
        $chars = '0123456789';
    } else {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        if ($special_chars) {
            $chars .= '!@#$%^&*()';
        }
    }
    $randStr = '';
    $chars_length = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $randStr .= substr($chars, mt_rand(0, $chars_length - 1), 1);
    }
    return $randStr;
}

/**
 * Upload files to the current server
 * @param $attach array File information
 * @param $result array Upload result
 */
function upload2local($attach, &$result)
{
    $fileName = $attach['name'];
    $tmpFile = $attach['tmp_name'];
    $fileSize = $attach['size'];

    $fileName = Database::getInstance()->escape_string($fileName);

    $ret = upload($fileName, $tmpFile, $fileSize);
    $success = 0;
    switch ($ret) {
        case '105':
            $message = lang('upload_folder_unwritable');
            break;
        default:
            $message = lang('upload_ok');
            $success = 1;
            break;
    }

    $result = [
        'success'   => $success, // 1 success, 0 failure
        'message'   => $message,
        'url'       => $success ? getFileUrl($ret['file_path']) : '',
        'file_info' => $success ? $ret : [],
    ];
}

/**
 * File Upload
 *
 * returned Array of indexes
 * mime_type File Type
 * size      File Size (in KB)
 * file_path File Path
 * width     Width
 * height    Height
 * Optional values (Only if the is an image and the system have to make a thjumbnail)
 * thum_file   Thumbnail path
 *
 * @param string $fileName File Name
 * @param string $tmpFile Temporary File Uploaded
 * @param string $fileSize File Size KB
 * @return array | string File Data Index
 *
 */
function upload($fileName, $tmpFile, $fileSize)
{
    $extension = getFileSuffix($fileName);
    $file_info = [];
    $file_info['file_name'] = $fileName;
    $file_info['mime_type'] = get_mimetype($extension);
    $file_info['size'] = $fileSize;
    $file_info['width'] = 0;
    $file_info['height'] = 0;

    $fileName = substr(md5($fileName), 0, 4) . time() . '.' . $extension;

    // Absolute path is used to read and write files, compatible with API file uploads
    $uploadFullPath = Option::UPLOADFILE_FULL_PATH . gmdate('Ym') . '/';
    $uploadFullFile = $uploadFullPath . $fileName;
    $thumFullFile = $uploadFullPath . 'thum-' . $fileName;

    // Upload relative path, used for internal operations such as avatar upload
    $uploadPath = Option::UPLOADFILE_PATH . gmdate('Ym') . '/';
    $uploadFile = $uploadPath . $fileName;
    $thumFile = $uploadPath . 'thum-' . $fileName;

    $file_info['file_path'] = $uploadFile;

    if (!createDirectoryIfNeeded($uploadFullPath)) {
        return '105'; // Failed to create upload directory
    }

    doAction('attach_upload', $tmpFile);

    // Generate thumbnail
    $is_thumbnail = Option::get('isthumbnail') === 'y';
    if ($is_thumbnail && resizeImage($tmpFile, $thumFullFile, Option::get('att_imgmaxw'), Option::get('att_imgmaxh'))) {
        $file_info['thum_file'] = $thumFile;
    }

    // Finish uploading
    if (@is_uploaded_file($tmpFile) && @!move_uploaded_file($tmpFile, $uploadFullFile)) {
        @unlink($tmpFile);
        return '105'; //Upload failed. The upload directory is not writable
    }

    // Extract image width and height
    if (in_array($file_info['mime_type'], array('image/jpeg', 'image/png', 'image/gif', 'image/bmp'))) {
        $size = getimagesize($uploadFullFile);
        if ($size) {
            $file_info['width'] = $size[0];
            $file_info['height'] = $size[1];
        }
    }
    return $file_info;
}

function createDirectoryIfNeeded($path)
{
    if (!is_dir($path)) {
        if (!mkdir($path, 0777, true) && !is_dir($path)) {
            return false;
        }
    }
    return true;
}

/**
 * Generate thumbnail image
 *
 * @param string $img Original image
 * @param string $thum_path Generate thumbnail path
 * @param int $max_w Maximum thumbnail width px
 * @param int $max_h Maximum thumbnail height px
 * @return bool
 */
function resizeImage($img, $thum_path, $max_w, $max_h)
{
    if (!in_array(getFileSuffix($thum_path), array('jpg', 'png', 'jpeg', 'gif'))) {
        return false;
    }
    if (!function_exists('ImageCreate')) {
        return false;
    }

    $size = chImageSize($img, $max_w, $max_h);
    $newwidth = $size['w'];
    $newheight = $size['h'];
    $w = $size['rc_w'];
    $h = $size['rc_h'];
    if ($w <= $max_w && $h <= $max_h) {
        return false;
    }
    return imageCropAndResize($img, $thum_path, 0, 0, 0, 0, $newwidth, $newheight, $w, $h);
}

/**
 * Image Crop & Resize
 *
 * @param string $src_image Original image
 * @param string $dst_path Cropped Image save path
 * @param int $dst_x New image coordinates x
 * @param int $dst_y New image coordinates y
 * @param int $src_x Original coordinates x
 * @param int $src_y Original coordinates y
 * @param int $dst_w New image width
 * @param int $dst_h New image height
 * @param int $src_w Original width
 * @param int $src_h Original height
 */
function imageCropAndResize($src_image, $dst_path, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h)
{
    if (!function_exists('imagecreatefromstring')) {
        return false;
    }

    $src_img = imagecreatefromstring(file_get_contents($src_image));
    if (!$src_img) {
        return false;
    }

    if (function_exists('imagecopyresampled')) {
        $new_img = imagecreatetruecolor($dst_w, $dst_h);
        imagecopyresampled($new_img, $src_img, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
    } elseif (function_exists('imagecopyresized')) {
        $new_img = imagecreate($dst_w, $dst_h);
        imagecopyresized($new_img, $src_img, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
    } else {
        return false;
    }

    switch (getFileSuffix($dst_path)) {
        case 'png':
            if (function_exists('imagepng') && imagepng($new_img, $dst_path)) {
                ImageDestroy($new_img);
                return true;
            }
            return false;
        case 'jpg':
        default:
            if (function_exists('imagejpeg') && imagejpeg($new_img, $dst_path)) {
                ImageDestroy($new_img);
                return true;
            }
            return false;
        case 'gif':
            if (function_exists('imagegif') && imagegif($new_img, $dst_path)) {
                ImageDestroy($new_img);
                return true;
            }
            return false;
    }
}

/**
 * Proportional image zoom size
 *
 * @param string $img Image Path
 * @param int $max_w Max zoom Width
 * @param int $max_h Maximum zoom Height
 * @return array
 */
function chImageSize($img, $max_w, $max_h)
{
    $size = @getimagesize($img);
    if (!$size) {
        return [];
    }
    $w = $size[0];
    $h = $size[1];
    //Calculate zoom ratio
    @$w_ratio = $max_w / $w;
    @$h_ratio = $max_h / $h;
    //Verify the Image width and height
    if (($w <= $max_w) && ($h <= $max_h)) {
        $tn['w'] = $w;
        $tn['h'] = $h;
    } else if (($w_ratio * $h) < $max_h) {
        $tn['h'] = ceil($w_ratio * $h);
        $tn['w'] = $max_w;
    } else {
        $tn['w'] = ceil($h_ratio * $w);
        $tn['h'] = $max_h;
    }
    $tn['rc_w'] = $w;
    $tn['rc_h'] = $h;
    return $tn;
}

/**
 * Get Gravatar Avatar
 */
if (!function_exists('getGravatar')) {
    function getGravatar($email, $s = 120)
    {
        $hash = md5($email);
/*vot*/ $gravatar_url = "//www.gravatar.com/avatar/$hash?s=$s";
        doOnceAction('get_Gravatar', $email, $gravatar_url);

        return $gravatar_url;
    }
}

/**
 * Gets a number of days of the specified month
 * @param $month string Month 01-12
 * @param $year string Year 0000
 * @return false|string
 */
function getMonthDayNum($month, $year)
{
    return date("t", strtotime($year . $month . '01'));
}

/**
 * Extract zip
 * @param string $zipfile Original Zip File
 * @param string $path Extract to the directory
 * @param string $type
 * @return int
 */
function emUnZip($zipfile, $path, $type = 'tpl')
{
    if (!class_exists('ZipArchive', FALSE)) {
        return 3; //zip Module problem
    }
    $zip = new ZipArchive();
    if (@$zip->open($zipfile) !== TRUE) {
        return 2; //File permissions problem
    }
    $r = explode('/', $zip->getNameIndex(0), 2);
    $dir = isset($r[0]) ? $r[0] . '/' : '';
    switch ($type) {
        case 'tpl':
            $re = $zip->getFromName($dir . 'header.php');
            if (false === $re) {
                return -2;
            }
            break;
        case 'plugin':
            $plugin_name = substr($dir, 0, -1);
            $re = $zip->getFromName($dir . $plugin_name . '.php');
            if (false === $re) {
                return -1;
            }
            break;
        case 'backup':
            $sql_name = substr($dir, 0, -1);
            if (getFileSuffix($sql_name) != 'sql') {
                return -3;
            }
            break;
        case 'update':
            break;
    }
    if (true === @$zip->extractTo($path)) {
        $zip->close();
        return 0;
    }

    return 1; //File permissions problem
}

/**
 * Zip compression
 */
function emZip($orig_fname, $content)
{
    if (!class_exists('ZipArchive', FALSE)) {
        return false;
    }
    $zip = new ZipArchive();
    $tempzip = EMLOG_ROOT . '/content/cache/emtemp.zip';
    $res = $zip->open($tempzip, ZipArchive::CREATE);
    if ($res === TRUE) {
        $zip->addFromString($orig_fname, $content);
        $zip->close();
        $zip_content = file_get_contents($tempzip);
        unlink($tempzip);
        return $zip_content;
    }

    return false;
}

/**
 * Download remote files
 * @param string $source file url
 * @return string Temporary file path
 */
function emFetchFile($source)
{
    $temp_file = tempnam(EMLOG_ROOT . '/content/cache/', 'tmp_');
    $wh = fopen($temp_file, 'w+b');

    $ctx_opt = set_ctx_option();
    $ctx = stream_context_create($ctx_opt);
    $rh = @fopen($source, 'rb', false, $ctx);

    if (!$rh || !$wh) {
        return FALSE;
    }

    while (!feof($rh)) {
        if (fwrite($wh, fread($rh, 4096)) === FALSE) {
            return FALSE;
        }
    }
    fclose($rh);
    fclose($wh);
    return $temp_file;
}

/**
 * Download remote files
 * @param string $source file url
 * @return string Temporary file path
 */
function emDownFile($source)
{
    $ctx_opt = set_ctx_option();
    $context = stream_context_create($ctx_opt);
    $content = file_get_contents($source, false, $context);
    if ($content === false) {
        return false;
    }

    $temp_file = tempnam(EMLOG_ROOT . '/content/cache/', 'tmp_');
    if ($temp_file === false) {
/*vot*/ emMsg('emDownFile: Failed to create temporary file.');
    }
    $ret = file_put_contents($temp_file, $content);
    if ($ret === false) {
/*vot*/ emMsg('emDownFile: Failed to write temporary file.');
    }

    return $temp_file;
}

function set_ctx_option()
{
    $emkey = Option::get('emkey');
    return [
        'http' => [
            'timeout' => 120,
            'method'  => 'GET',
            'header'  => "Referer: " . BLOG_URL . "\r\n"
                . "Emkey: " . $emkey . "\r\n"
                . "User-Agent: emlog " . Option::EMLOG_VERSION . "\r\n",
        ],
        "ssl"  => [
            "verify_peer"      => false,
            "verify_peer_name" => false,
        ]
    ];
}

/**
 * Deleting a file or directory
 */
function emDeleteFile($file)
{
    if (empty($file)) {
        return false;
    }
    if (@is_file($file)) {
        return @unlink($file);
    }
    $ret = true;
    if ($handle = @opendir($file)) {
        while ($filename = @readdir($handle)) {
            if ($filename == '.' || $filename == '..') {
                continue;
            }
            if (!emDeleteFile($file . '/' . $filename)) {
                $ret = false;
            }
        }
    } else {
        $ret = false;
    }
    @closedir($handle);
    if (file_exists($file) && !rmdir($file)) {
        $ret = false;
    }
    return $ret;
}

/**
 * Page Redirection
 */
function emDirect($directUrl)
{
    header("Location: $directUrl");
    exit;
}

/**
 * Display system info
 *
 * @param string $msg Message
 * @param string $url Return Address
 * @param boolean $isAutoGo Whether or not auto-return true false
 */
function emMsg($msg, $url = 'javascript:history.back(-1);', $isAutoGo = false)
{
    if ($msg == '404') {
        header("HTTP/1.1 404 Not Found");
        $msg = lang('404_description');
    }
/*vot*/ $lang = LANG;
/*vot*/ $dir = LANG_DIR;
/*vot*/ $title = lang('prompt');
    echo <<<EOT
<!doctype html>
<html lang="$lang" dir="$dir">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="applicable-device" content="pc,mobile">
EOT;
    if ($isAutoGo) {
        echo "<meta http-equiv=\"refresh\" content=\"2;url=$url\" />";
    }
    echo <<<EOT
<title>$title</title>
<style>
body {
    background-color:#4e73df;
    font-family: Arial;
    font-size: 12px;
    line-height:150%;
}
.main {
    background-color:#FFFFFF;
    font-size: 12px;
    color: #666666;
    width:650px;
    margin:60px auto 0px;
    border-radius: 10px;
    padding:10px;
    list-style:none;
    border:#DFDFDF 1px solid;
}
.main p {
    line-height: 18px;
    margin: 10px 20px;
}
a {
    color: #333333;
}
@media (max-width: 768px) {
    .main{
        width: unset;   
    }
}
</style>
</head>
<body>
<div class="main">
<p>$msg</p>
EOT;
    if ($url != 'none') {
        echo '<p><a href="' . $url . '">&larr; ' . lang('click_return') . '</a></p>';
    }
    echo <<<EOT
</div>
</body>
</html>
EOT;
    exit;
}

function show_404_page($show_404_only = false)
{
    doAction('page_not_found');
    if ($show_404_only) {
        header("HTTP/1.1 404 Not Found");
        exit;
    }

    if (is_file(TEMPLATE_PATH . '404.php')) {
        header("HTTP/1.1 404 Not Found");
        include View::getView('404');
        exit;
    }

    emMsg('404', BLOG_URL);
}

/**
 * hmac Encryption
 *
 * @param unknown_type $algo hash Algorithm md5
 * @param unknown_type $data User name and expiration date
 * @param unknown_type $key
 * @return unknown
 */
if (!function_exists('hash_hmac')) {
    function hash_hmac($algo, $data, $key)
    {
        $packs = array('md5' => 'H32', 'sha1' => 'H40');

        if (!isset($packs[$algo])) {
            return false;
        }

        $pack = $packs[$algo];

        if (strlen($key) > 64) {
            $key = pack($pack, $algo($key));
        } elseif (strlen($key) < 64) {
            $key = str_pad($key, 64, chr(0));
        }

        $ipad = (substr($key, 0, 64) ^ str_repeat(chr(0x36), 64));
        $opad = (substr($key, 0, 64) ^ str_repeat(chr(0x5C), 64));

        return $algo($opad . pack($pack, $algo($ipad . $data)));
    }
}

/**
 * Get the MIME type based on the file extension
 */
function get_mimetype($extension)
{
    $ct['txt'] = 'text/plain';
    $ct['asc'] = 'text/plain';
    $ct['css'] = 'text/css';
    $ct['htm'] = 'text/html';
    $ct['html'] = 'text/html';
    $ct['js'] = 'application/x-javascript';
    $ct['xhtml'] = 'application/xhtml+xml';
    $ct['xml'] = 'text/xml';
    $ct['xsl'] = 'text/xml';
    $ct['wml'] = 'text/vnd.wap.wml';
    $ct['wmls'] = 'text/vnd.wap.wmlscript';
    $ct['rtf'] = 'text/rtf';
    $ct['bmp'] = 'image/bmp';
    $ct['gif'] = 'image/gif';
    $ct['jpeg'] = 'image/jpeg';
    $ct['jpg'] = 'image/jpeg';
    $ct['jpe'] = 'image/jpeg';
    $ct['png'] = 'image/png';
    $ct['webp'] = 'image/webp';
    $ct['svg'] = 'image/svg+xml';
    $ct['avif'] = 'image/avif';
    $ct['tiff'] = 'image/tiff';
    $ct['tif'] = 'image/tiff';
    $ct['ico'] = 'image/vnd.microsoft.icon';
    $ct['midi'] = 'audio/midi';
    $ct['mid'] = 'audio/midi';
    $ct['mp3'] = 'audio/mpeg';
    $ct['wav'] = 'audio/x-wav';
    $ct['mpg'] = 'video/mpeg';
    $ct['mpeg'] = 'video/mpeg';
    $ct['mpe'] = 'video/mpeg';
    $ct['qt'] = 'video/quicktime';
    $ct['webm'] = 'video/webm';
    $ct['mov'] = 'video/quicktime';
    $ct['avi'] = 'video/x-msvideo';
    $ct['wmv'] = 'video/x-ms-wmv';
    $ct['mp4'] = 'video/mp4';
    $ct['mkv'] = 'video/x-matroska';
    $ct['bin'] = 'application/octet-stream';
    $ct['class'] = 'application/octet-stream';
    $ct['dll'] = 'application/octet-stream';
    $ct['dvi'] = 'application/x-dvi';
    $ct['exe'] = 'application/octet-stream';
    $ct['gtar'] = 'application/x-gtar';
    $ct['gzip'] = 'application/x-gzip';
    $ct['pdf'] = 'application/pdf';
    $ct['doc'] = 'application/msword';
    $ct['ppt'] = 'application/vnd.ms-powerpoint';
    $ct['wbxml'] = 'application/vnd.wap.wbxml';
    $ct['wmlc'] = 'application/vnd.wap.wmlc';
    $ct['wmlsc'] = 'application/vnd.wap.wmlscriptc';
    $ct['xls'] = 'application/vnd.ms-excel';
    $ct['zip'] = 'application/zip';

    return isset($ct[strtolower($extension)]) ? $ct[strtolower($extension)] : 'text/html';
}

/**
 * Convert a string to a time zone independent UNIX timestamp
 */
function emStrtotime($timeStr)
{
    if (!$timeStr) {
        return false;
    }

    $timezone = Option::get('timezone');

    $unixPostDate = strtotime($timeStr);
    if (!$unixPostDate) {
        return false;
    }

    $serverTimeZone = date_default_timezone_get();
    if (empty($serverTimeZone) || $serverTimeZone == 'UTC') {
        $unixPostDate -= (int)$timezone * 3600;
    } elseif ($serverTimeZone) {
        /*
         * If the server is configured with a default time zone, then PHP will recognize the incoming time as the local time in the time zone
         * But the time we pass in is actually the local time of the time zone configured by the blog, not the local time of the server time zone
         * Therefore, we need to remove/add the time difference between the two time zones to the time obtained by strtotime to get the utc time
         */
        $offset = getTimeZoneOffset($serverTimeZone);
        // First subtract/add the time difference configured for the local time zone
        $unixPostDate -= (int)$timezone * 3600;
        // Then subtract/add the time difference between the server time zone and utc to get the utc time
        $unixPostDate -= $offset;
    }
    return $unixPostDate;
}

/**
 * Load jQuery
 */
function emLoadJQuery()
{
    static $isJQueryLoaded = false;
    if (!$isJQueryLoaded) {
        global $emHooks;
        if (!isset($emHooks['index_head'])) {
            $emHooks['index_head'] = array();
        }
        array_unshift($emHooks['index_head'], 'loadJQuery');
        $isJQueryLoaded = true;

        function loadJQuery()
        {
            echo '<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>';
        }
    }
}

/**
 * Calculate time zone difference
 * @param string $remote_tz Remote time zone
 * @param string $origin_tz Original time zone
 *
 * @throws Exception
 */
function getTimeZoneOffset($remote_tz, $origin_tz = 'UTC')
{
    if (($origin_tz === null) && !is_string($origin_tz = date_default_timezone_get())) {
        return false; // A UTC timestamp was returned -- bail out!
    }
    $origin_dtz = new DateTimeZone($origin_tz);
    $remote_dtz = new DateTimeZone($remote_tz);
    $origin_dt = new DateTime('now', $origin_dtz);
    $remote_dt = new DateTime('now', $remote_dtz);
    return $origin_dtz->getOffset($origin_dt) - $remote_dtz->getOffset($remote_dt);
}

/**
 * Upload the cut pictures (cover and avatar)
 */
function uploadCropImg()
{
    $attach = isset($_FILES['image']) ? $_FILES['image'] : '';

    $uploadCheckResult = Media::checkUpload($attach);
    if ($uploadCheckResult !== true) {
        Output::error($uploadCheckResult);
    }

    $ret = '';
    upload2local($attach, $ret);
    if (empty($ret['success'])) {
        Output::error($ret['message']);
    }
    return $ret;
}

if (!function_exists('split')) {
    function split($str, $delimiter)
    {
        return preg_split($str, $delimiter);
    }
}

if (!function_exists('get_os')) {
    function get_os($user_agent)
    {
        if (false !== stripos($user_agent, "win")) {
            $os = 'Windows';
        } else if (false !== stripos($user_agent, "mac")) {
            $os = 'MAC';
        } else if (false !== stripos($user_agent, "linux")) {
            $os = 'Linux';
        } else if (false !== stripos($user_agent, "unix")) {
            $os = 'Unix';
        } else if (false !== stripos($user_agent, "bsd")) {
            $os = 'BSD';
        } else {
            $os = 'unknown';
        }
        return $os;
    }
}

if (!function_exists('get_browse')) {
    function get_browse($user_agent)
    {
        if (false !== stripos($user_agent, "MSIE")) {
            $br = 'MSIE';
        } else if (false !== stripos($user_agent, "Edg")) {
            $br = 'Edge';
        } else if (false !== stripos($user_agent, "Firefox")) {
            $br = 'Firefox';
        } else if (false !== stripos($user_agent, "Chrome")) {
            $br = 'Chrome';
        } else if (false !== stripos($user_agent, "Safari")) {
            $br = 'Safari';
        } else if (false !== stripos($user_agent, "Opera")) {
            $br = 'Opera';
        } else {
            $br = 'unknown';
        }
        return $br;
    }
}

// Get the first image in the content
if (!function_exists('getFirstImage')) {
    function getFirstImage($content)
    {
        // Match images in Markdown
        preg_match('/!\[.*?\]\((.*?)\)/', $content, $matches);

        if (!empty($matches[1])) {
            return $matches[1];
        }

        // Match images in HTML
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($content);
        libxml_clear_errors();

        $xpath = new DOMXPath($dom);
        $imgNode = $xpath->query('//img')->item(0);

        if ($imgNode) {
            return $imgNode->getAttribute('src');
        }

        return null;
    }
}

// Check if PHP supports GD graphics library
function checkGDSupport()
{
    if (function_exists("gd_info") && function_exists('imagepng')) {
        return true;
    } else {
        return false;
    }
}

//------------------------------------------------------------------
// Functions added by Valery Votintsev (vot) at codersclub.org

/**
 * Check for running in Windows
 * @return int
 * @author Valery Votintsev
 */
function is_win() {
    return isset($_SERVER['WINDIR']) ? 1 : 0;
}

/**
 * Load Language File
 *
 * @param string $model //Language File Name
 * @return none
 * @author Valery Votintsev, codersclub.org
 */
function load_language($model = '') {
    global $LANGUAGE;
    global $LANGLIST;

    $model = strtolower($model);
    $model = str_replace(array('_controller', '_model'), '', $model);

    if (!isset($LANGUAGE)) {
        $LANGUAGE = array();
    }
    if (!isset($LANGLIST)) {
        $LANGLIST = array();
    }

    if ($model && !isset($LANGLIST[$model])) {
        if (strpos($model, 'plugins/') === 0) {
            $file = EMLOG_ROOT . '/content/' . $model . '/lang/' . LANG . '/lang.php';
        } elseif (strpos($model, 'templates/') === 0) {
            $file = EMLOG_ROOT . '/content/' . $model . '/lang/' . LANG . '/lang.php';
        } else {
            $file = EMLOG_ROOT . '/lang/' . LANG . '/lang_' . $model . '.php';
        }

        if (is_file($file)) {
            $lang = array();
            $err = @require $file;

            // Language file must contain $lang = array(...);
            $LANGUAGE = array_merge($LANGUAGE, $lang);
            unset($lang);
            $LANGLIST[$model] = 1;
        } else {
        }
    }
}

/**
 * Return Language Variable
 *
 * @param string $key //Language Keyword
 * @return string //Language Value
 * @author Valery Votintsev, codersclub.org
 */
function lang($key = '') {
    global $LANGUAGE;
    return isset($LANGUAGE[$key]) ? $LANGUAGE[$key] : '{' . $key . '}';
}

/**
 * Return the date/time formatted
 *
 * @param integer $date Source date
 * @param boolean $show_time Show time or not
 * @return string Formatted date
 * @author Valery Votintsev, codersclub.org
 */
function emdate($date = 0, $show_time = 0) {
    $format = $show_time ? 'date_time_format' : 'date_format';

    return gmdate(lang($format), $date);
}

/**
 * Show debug info
 * @param $data
 * @param string $name
 */
function dump($data, $name = '') {
    $buf = var_export($data, true);

    $buf = str_replace('\\r', '', $buf);
    $buf = preg_replace('/\=\>\s*\n\s*array/s', '=> array', $buf);

    echo '<pre>';

    if ($name) {
        echo $name, '=';
    }

    echo $buf;
    echo "</pre>\n";
}

/**
 * Unix Style Dir Name
 *
 * @param string $file //original path
 * @param boolean $remove_drive //If need to remove the Windows-like drive, i.e. C:\windows\system32\...
 * @return unix style path
 * @author Valery Votintsev, codersclub.org
 */
function udir($file = '', $remove_drive = false) {
    $file = str_replace('\\', '/', $file);
    if ($remove_drive) {
        $file = preg_replace("/^\w:/", '', $file);
    }
    return $file;
}


function backtrace() {
    $raw = debug_backtrace();

    echo '<div><b>BackTrace:</b>', "\n";
    echo '<table border="1" cellPadding="4">', "\n";
    echo '<tr>', "\n";
    echo '<th>File</th>', "\n";
    echo '<th>Line</th>', "\n";
    echo '<th>Function</th>', "\n";
    echo '<th>Args</th>', "\n";
    echo '</tr>', "\n";

    foreach ($raw as $entry) {
        $args = '';
        if ($entry['function'] != 'backtrace') {
            echo '<tr>', "\n";
            echo '<td>', $entry['file'], '</td>', "\n";
            echo '<td>', $entry['line'], '</td>', "\n";
            echo '<td>', $entry['function'], '</td>', "\n";

            foreach ($entry['args'] as $a) {
                if (!empty($args)) {
                    $args .= ', ';
                }
                switch (gettype($a)) {
                    case 'integer':
                    case 'double':
                        $args .= $a;
                        break;
                    case 'string':
                        $a = htmlspecialchars(substr($a, 0, 64)) . ((strlen($a) > 64) ? '...' : '');
                        $args .= "\"$a\"";
                        break;
                    case 'array':
                        $args .= 'Array(' . count($a) . ')';
                        break;
                    case 'object':
                        $args .= 'Object(' . get_class($a) . ')';
                        break;
                    case 'resource':
                        //            $args .= 'Resource('.strstr($a, '#').')';
                        $args .= $a;
                        break;
                    case 'boolean':
                        $args .= $a ? 'True' : 'False';
                        break;
                    case 'NULL':
                        $args .= 'Null';
                        break;
                    default:
                        $args .= 'Unknown';
                }
            }
            if (!$args)
                $args = '&nbsp;';
            echo '<td>', $args, '</td>', "\n";
            echo '</tr>', "\n";
        }
    }

    echo '</table>', "\n";
}

// Removes parameter '$key' from '$sourceURL' query string (if present)
function removeParam($key, $sourceURL) {
    $url = parse_url($sourceURL);
    if (!isset($url['query']))
        return $sourceURL;
    parse_str($url['query'], $query_data);
    if (!isset($query_data[$key]))
        return $sourceURL;
    unset($query_data[$key]);
    $url['query'] = http_build_query($query_data);
    return build_url($url);
}

function build_url($parsed_url) {
    $scheme = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '';
    $host = isset($parsed_url['host']) ? $parsed_url['host'] : '';
    $port = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '';
    $user = isset($parsed_url['user']) ? $parsed_url['user'] : '';
    $pass = isset($parsed_url['pass']) ? ':' . $parsed_url['pass'] : '';
    $pass = ($user || $pass) ? "$pass@" : '';
    $path = isset($parsed_url['path']) ? $parsed_url['path'] : '';
    $query = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
    $query = ($query == '?') ? '' : $query;
    $fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : '';
    return "$scheme$user$pass$host$port$path$query$fragment";
}
