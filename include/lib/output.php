<?php
/**
 * Output class
 * @package EMLOG
 * @link https://www.emlog.net
 */

class Output {
    public static function ok($data = '') {
        header('Content-Type: application/json; charset=UTF-8');
        $result = [
            'code' => 0,
            'msg'  => 'ok',
            'data' => $data
        ];
        die(json_encode($result, JSON_UNESCAPED_UNICODE));
    }

    public static function error($msg, $httpCode = 400) {
        header('Content-Type: application/json; charset=UTF-8');
        if ($httpCode == 200) {
            header("HTTP/1.1 200 OK");
        } else {
            header("HTTP/1.1 400 Bad Request");
        }
        $result = [
            'code' => 1,
            'msg'  => $msg,
            'data' => ''
        ];
        die(json_encode($result, JSON_UNESCAPED_UNICODE));
    }

    public static function authError($msg) {
        header('Content-Type: application/json; charset=UTF-8');
        header("HTTP/1.1 401 Unauthorized");
        $result = [
            'code' => 1,
            'msg'  => $msg,
            'data' => ''
        ];
        die(json_encode($result, JSON_UNESCAPED_UNICODE));
    }
}
