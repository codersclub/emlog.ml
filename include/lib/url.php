<?php
/**
 * URL
 * @package EMLOG
 * @link https://www.emlog.net
 */

class Url {

    /**
     * Get article links
     */
    static function log($blogId) {
        $urlMode = Option::get('isurlrewrite');
        $logUrl = '';

        //Open the Post alias
        if (Option::get('isalias') == 'y') {
            $Log_Model = new Log_Model();
            $logInfo = $Log_Model->getDetail($blogId);
            $sortName = isset($logInfo['sortname']) ? $logInfo['sortname'] : '';
            $sortAlias = isset($logInfo['sort_alias']) ? $logInfo['sort_alias'] : '';
            $logAlias = isset($logInfo['alias']) ? $logInfo['alias'] : '';
            if (!empty($logAlias)) {
                $sort = '';
                //url in category mode /category/1.html
                if (3 == $urlMode && $sortName) {
                    $sort = !empty($sortAlias) ? $sortAlias : $sortName;
                    $sort .= '/';
                }
                $logUrl = BLOG_URL . $sort . urlencode($logAlias);
                //Enable alias html suffix
                if (Option::get('isalias_html') == 'y') {
                    $logUrl .= '.html';
                }
                return $logUrl;
            }
        }

        switch ($urlMode) {
            case '0'://default: dynamic
                $logUrl = BLOG_URL . '?post=' . $blogId;
                break;
            case '1'://static
                $logUrl = BLOG_URL . 'post-' . $blogId . '.html';
                break;
            case '2'://Table of contents
                $logUrl = BLOG_URL . 'post/' . $blogId;
                break;
            case '3'://category
                $Log_Model = new Log_Model();
                $logInfo = $Log_Model->getDetail($blogId);
                $sortName = isset($logInfo['sortname']) ? $logInfo['sortname'] : '';
                $sortAlias = isset($logInfo['sort_alias']) ? $logInfo['sort_alias'] : '';
                if (!empty($sortAlias)) {
                    $logUrl = BLOG_URL . $sortAlias . '/' . $blogId;
                } elseif (!empty($sortName)) {
                    $logUrl = BLOG_URL . $sortName . '/' . $blogId;
                } else {
                    $logUrl = BLOG_URL . $blogId;
                }
                $logUrl .= '.html';
                break;
        }
        return $logUrl;
    }

    static function record($record, $page = null) {
        switch (Option::get('isurlrewrite')) {
            case '0':
                $recordUrl = BLOG_URL . '?record=' . $record;
                if ($page) {
                    $recordUrl .= '&page=';
                }
                break;
            default:
                $recordUrl = BLOG_URL . 'record/' . $record;
                if ($page) {
                    $recordUrl = BLOG_URL . 'record/' . $record . '/page/';
                }
                break;
        }
        return $recordUrl;
    }

    static function sort($sortId, $page = null) {
        $CACHE = Cache::getInstance();
        $sort_cache = $CACHE->readCache('sort');
        $sortInfo = isset($sort_cache[$sortId]) ? $sort_cache[$sortId] : [];
        $sort_index = !empty($sortInfo['alias']) ? $sortInfo['alias'] : $sortId;

        $pid = $sortInfo && !empty($sortInfo['pid']) ? $sortInfo['pid'] : 0; // Parent category ID
        $pAlias = $pid && !empty($sort_cache[$pid]['alias']) ? $sort_cache[$pid]['alias'] : ''; // Parent category name

        switch (Option::get('isurlrewrite')) {
            case '0':
                $sortUrl = BLOG_URL . '?sort=' . $sortId;
                if ($page) {
                    $sortUrl .= '&page=';
                }
                break;
            default:
                if (is_numeric($sort_index)) {
                    $sortUrl = BLOG_URL . 'sort/' . $sort_index;
                } else {
                    if ($pAlias) {
                        $sortUrl = BLOG_URL . $pAlias . '/' . $sort_index;
                    } else {
                        $sortUrl = BLOG_URL . $sort_index;
                    }
                }

                if ($page) {
                    $sortUrl .= '/page/';
                }
                break;
        }
        return $sortUrl;
    }

    static function author($authorId, $page = null) {
        switch (Option::get('isurlrewrite')) {
            case '0':
                $authorUrl = BLOG_URL . '?author=' . $authorId;
                if ($page) {
                    $authorUrl .= '&page=';
                }
                break;
            default:
                $authorUrl = BLOG_URL . 'author/' . $authorId;
                if ($page) {
                    $authorUrl = BLOG_URL . 'author/' . $authorId . '/page/';
                }
                break;
        }
        return $authorUrl;
    }

    static function tag($tag, $page = null) {
        switch (Option::get('isurlrewrite')) {
            case '0':
                $tagUrl = BLOG_URL . '?tag=' . $tag;
                if ($page) {
                    $tagUrl .= '&page=';
                }
                break;
            default:
                $tagUrl = BLOG_URL . 'tag/' . $tag;
                if ($page) {
                    $tagUrl = BLOG_URL . 'tag/' . $tag . '/page/';
                }
                break;
        }
        return $tagUrl;
    }

    static function logPage() {
        $posts = Option::get('home_page_id') > 0 ? 'posts/' : '';
        switch (Option::get('isurlrewrite')) {
            case '0':
                $logPageUrl = BLOG_URL . $posts . '?page=';
                break;
            default:
                $logPageUrl = BLOG_URL . $posts . 'page/';
                break;
        }
        return $logPageUrl;
    }

    static function comment($blogId, $pageId, $cid) {
        $commentUrl = Url::log($blogId);
        if ($pageId > 1) {
            if (Option::get('isurlrewrite') == 0 && strpos($commentUrl, '=') !== false) {
                $commentUrl .= '&comment-page=';
            } else {
                $commentUrl .= '/comment-page-';
            }
            $commentUrl .= $pageId;
        }
        $commentUrl .= '#' . $cid;
        return $commentUrl;
    }

    /**
     * Get navigation URL
     */
    static function navi($type, $typeId, $url) {
        switch ($type) {
            case Navi_Model::navitype_custom:
            case Navi_Model::navitype_home:
            case Navi_Model::navitype_t:
            case Navi_Model::navitype_admin:
                break;
            case Navi_Model::navitype_sort:
                $url = self::sort($typeId);
                break;
            case Navi_Model::navitype_page:
                $url = self::log($typeId);
                break;
            default:
                $url = (strpos($url, 'http') === 0 ? '' : BLOG_URL) . $url;
                break;
        }
        return $url;
    }

}
