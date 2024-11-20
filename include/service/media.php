<?php

/**
 * Service: Media
 *
 * @package EMLOG
 * @link https://www.emlog.net
 */

class Media
{

    static function checkUpload($attach)
    {
        if (!$attach) {
            return '上传失败，未收到文件信息，可更换浏览器重试';
        }
        $fileName = $attach['name'];
        $errorNum = $attach['error'];
        $fileSize = $attach['size'];
        $extension = getFileSuffix($fileName);

        if ($errorNum == 1) {
            return lang('att_size_php_limit') . ini_get('upload_max_filesize') . lang('_limit');
        }

        if ($errorNum > 1) {
            return lang('upload_failed_error_code') . $errorNum;
        }

        // Check type and size limits
        $attType = User::haveEditPermission() ? Option::getAdminAttType() : Option::getAttType();
        $maxSize = User::haveEditPermission() ? Option::getAdminAttMaxSize() : Option::getAttMaxSize();
        if (!in_array($extension, $attType)) {
            return lang('att_type_disabled');
        }
        if ($fileSize > $maxSize) {
            return lang('att_size_system_limit') . changeFileSize($maxSize);
        }
        return true;
    }

    static function uploadRespond($ret, $isEditor, $isSuccess = false)
    {
        if ($isEditor) {
            exit(json_encode($ret));
        } else {
            if ($isSuccess) {
                header("HTTP/1.0 200 OK");
                exit($ret['message']);
            }
            header("HTTP/1.0 400 Bad Request");
            exit($ret['message']);
        }
    }
}
