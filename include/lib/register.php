<?php

/**
 * register check
 * @package EMLOG
 * @link https://www.emlog.net
 */

class Register
{

    const EMKEY_LEN = 32;

    public static function isRegLocal()
    {
        $CACHE = Cache::getInstance();
        $options_cache = $CACHE->readCache('options');
        $emkey = isset($options_cache['emkey']) ? $options_cache['emkey'] : '';

        if (strlen($emkey) !== self::EMKEY_LEN) {
            return false;
        }
        return true;
    }

    public static function getRegType()
    {
        $CACHE = Cache::getInstance();
        $options_cache = $CACHE->readCache('options');
        return isset($options_cache['emkey_type']) ? (int)$options_cache['emkey_type'] : 0;
    }

    public static function isRegServer()
    {
        $CACHE = Cache::getInstance();
        $options_cache = $CACHE->readCache('options');
        $emkey = isset($options_cache['emkey']) ? $options_cache['emkey'] : '';
        return self::verifyEmKey($emkey);
    }

    public static function doReg($emkey)
    {
        if (strlen($emkey) !== self::EMKEY_LEN) {
            return false;
        }

        $emcurl = new EmCurl();
        $emcurl->setPost(['emkey' => $emkey]);
        $emcurl->request('https://store.emlog.net/proauth/register');
        if ($emcurl->getHttpStatus() !== 200) {
            return false;
        }
        $response = $emcurl->getRespone();
        $response = json_decode($response, 1);
        if ($response['code'] !== 200) {
            $CACHE = Cache::getInstance();
            Option::updateOption('emkey', '');
            $CACHE->updateCache('options');
            return false;
        }

        return $response;
    }

    public static function verifyEmKey($emkey)
    {
        if (strlen($emkey) !== self::EMKEY_LEN) {
            return false;
        }

        $emcurl = new EmCurl();
        $emcurl->setPost(['emkey' => $emkey]);
        $emcurl->request('https://store.emlog.net/proauth/verify');
        if ($emcurl->getHttpStatus() !== 200) {
            return false;
        }
        $response = $emcurl->getRespone();
        $response = json_decode($response, 1);
        if ($response['code'] !== 200) {
            self::clean();
            return false;
        }

        return $response;
    }

    public static function verifyDownload($source)
    {
        $emkey = Option::get('emkey');
        $emcurl = new EmCurl();
        $emcurl->setPost(['emkey' => $emkey]);
        $emcurl->request('https://store.emlog.net/' . $source . '/1');
        if ($emcurl->getHttpStatus() === 403) {
            self::clean();
            return false;
        } elseif ($emcurl->getHttpStatus() !== 200) {
            return false;
        }
        return true;
    }

    public static function clean()
    {
        $CACHE = Cache::getInstance();
        Option::updateOption('emkey', '');
        Option::updateOption('emkey_type', '');
        $CACHE->updateCache('options');
    }
}
