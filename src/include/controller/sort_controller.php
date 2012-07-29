<?php
/**
 * 查看分类日志
 *
 * @copyright (c) Emlog All Rights Reserved
 */

class Sort_Controller {
	function display($params) {
		$Log_Model = new Log_Model();
		$CACHE = Cache::getInstance();
		$options_cache = Option::getAll();
		extract($options_cache);

		$page = isset($params[4]) && $params[4] == 'page' ? abs(intval($params[5])) : 1;

		$sortid = '';
		if (!empty($params[2])) {
			if (is_numeric($params[2])) {
				$sortid = intval($params[2]);
			} else {
				$sort_cache = $CACHE->readCache('sort');
				foreach ($sort_cache as $key => $value) {
					$alias = addslashes(urldecode(trim($params[2])));
					if (array_search($alias, $value, true)){
						$sortid = $key;
						break;
					}
				}
			}
		}

		$start_limit = ($page - 1) * $index_lognum;
		$pageurl = '';

		$sort_cache = $CACHE->readCache('sort');
		if (!isset($sort_cache[$sortid])) {
			emMsg('404', BLOG_URL);
		}
		$sortName = $sort_cache[$sortid]['sortname'];
		//page meta
		$site_title = $sortName . ' - ' . $site_title;

		$sqlSegment = "and sortid=$sortid order by date desc";
		$lognum = $Log_Model->getLogNum('n', $sqlSegment);
		$pageurl .= Url::sort($sortid, 'page');

		$logs = $Log_Model->getLogsForHome($sqlSegment, $page, $index_lognum);
		$page_url = pagination($lognum, $index_lognum, $page, $pageurl);

		include View::getView('header');
		include View::getView('log_list');
	}
}
