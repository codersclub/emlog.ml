<?php

/**
 * sort
 *
 * @package EMLOG
 * @link https://www.emlog.net
 */

class Sort_Controller
{
    function display($params)
    {
        $Log_Model = new Log_Model();
        $CACHE = Cache::getInstance();
        $options_cache = Option::getAll();
        extract($options_cache);

        $page = isset($params[4]) && $params[4] == 'page' ? abs((int)$params[5]) : 1;

        $sortid = '';
        if (!empty($params[2])) {
            if (is_numeric($params[2])) {
                $sortid = (int)$params[2];
            } else {
                $sort_cache = $CACHE->readCache('sort');
                foreach ($sort_cache as $key => $value) {
                    $alias = addslashes(urldecode(trim($params[2])));
                    if (array_search($alias, $value, true)) {
                        $sortid = $key;
                        break;
                    }
                }
            }
        }

        $pageurl = '';

        $sort_cache = $CACHE->readCache('sort');
        if (!isset($sort_cache[$sortid])) {
            show_404_page();
        }
        $sort = $sort_cache[$sortid];
        $sortPid = isset($sort['pid']) ? $sort['pid'] : 0;
        $sortChildren = isset($sort['children']) ? $sort['children'] : [];
        $sortName = isset($sort['sortname']) ? $sort['sortname'] : '';
        $sortTitle = isset($sort['title']) ? $sort['title'] : '';
        $sortKw = isset($sort['kw']) ? $sort['kw'] : '';
        $sortDesc = isset($sort['description']) ? $sort['description'] : '';
        $sortPageCount = isset($sort['page_count']) ? $sort['page_count'] : 0;
        if ($sortPageCount > 0) {
            $index_lognum = $sortPageCount;
        }
        //page meta
        if ($sortTitle) {
            $site_title = $sortTitle;
        } else {
            $site_title = $sortName . ' - ' . $site_title;
        }
        if ($sortDesc) {
            $site_description = $sortDesc;
        }
        if ($sortKw) {
            $site_key = $sortKw;
        }
        if ($sortPid || empty($sortChildren)) {
            $sqlSegment = "and sortid=$sortid";
        } else {
            $sortids = array_merge(array($sortid), $sortChildren);
            $sqlSegment = "and sortid in (" . implode(',', $sortids) . ")";
        }
        $orderBy = " order by sortop desc, date desc";
        $lognum = $Log_Model->getLogNum('n', $sqlSegment);
        $total_pages = ceil($lognum / $index_lognum);
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        $pageurl .= Url::sort($sortid, 'page');

        $logs = $Log_Model->getLogsForHome($sqlSegment . $orderBy, $page, $index_lognum);
        $page_url = pagination($lognum, $index_lognum, $page, $pageurl);

        $template = !empty($sort['template']) && file_exists(TEMPLATE_PATH . $sort['template'] . '.php') ? $sort['template'] : 'log_list';

        include View::getView('header');
        include View::getView($template);
    }
}
