<?php
/**
 * RSS Output
 * @copyright (c) Emlog All Rights Reserved
 */

require_once './init.php';

/*vot*/ load_language('rss');

header('Content-type: application/xml');

$sort = isset($_GET['sort']) ? intval($_GET['sort']) : '';

$URL = BLOG_URL;
$blog = getBlog($sort);

echo '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
<channel>
<title><![CDATA['.Option::get('blogname').']]></title> 
<description><![CDATA['.Option::get('bloginfo').']]></description>
<link>'.$URL.'</link>
<!--vot--><language>'.EMLOG_LANGUAGE.'</language>
<generator>www.emlog.net</generator>';
if (!empty($blog)) {
$user_cache = $CACHE->readCache('user');
foreach($blog as $value){
	$link = Url::log($value['id']);
	$abstract = str_replace('[break]','',$value['content']);
	$pubdate =  gmdate('r',$value['date']);
	$author = $user_cache[$value['author']]['name'];
	doAction('rss_display');
	echo <<< END

<item>
	<title>{$value['title']}</title>
	<link>$link</link>
	<description><![CDATA[{$abstract}]]></description>
	<pubDate>$pubdate</pubDate>
	<author>$author</author>
	<guid>$link</guid>

</item>
END;
}
}
echo <<< END
</channel>
</rss>
END;

/**
 * Get blog info
 *
 * @return array
 */
function getBlog($sortid = null) {
    $rss_output_num = Option::get('rss_output_num');
    if ($rss_output_num == 0) {
        return array();
    }
	$DB = Database::getInstance();
	$sorts = Cache::getInstance()->readCache('sort');
	if (isset($sorts[$sortid])) {
		$sort = $sorts[$sortid];
		if ($sort['pid'] != 0 || empty($sort['children'])) {
			$subsql = "and sortid=$sortid";
		} else {
			$sortids = array_merge(array($sortid), $sort['children']);
			$subsql = "and sortid in (" . implode(',', $sortids) . ")";
		}
	} else {
		$subsql = $sortid ? "and sortid=$sortid" : '';
	}
	$sql = "SELECT * FROM ".DB_PREFIX."blog  WHERE hide='n' and type='blog' $subsql ORDER BY date DESC limit 0," . $rss_output_num;
	$result = $DB->query($sql);
	$blog = array();
	while ($re = $DB->fetch_array($result))
	{
		$re['id'] 		= $re['gid'];
		$re['title']    = htmlspecialchars($re['title']);
		$re['date']		= $re['date'];
		$re['content']	= $re['content'];
		if(!empty($re['password']))
		{
/*vot*/			$re['content'] = '<p>[' . lang('post_protected_by_password') . ']</p>';
		}
		elseif(Option::get('rss_output_fulltext') == 'n')
		{
			if (!empty($re['excerpt'])) {
				$re['content'] = $re['excerpt'];
			}else {
				$re['content'] = extractHtmlData($re['content'], 330);
			}
/*vot*/			$re['content'] .= ' <a href="'.Url::log($re['id']).'">'.lang('read_more').'</a>';
		}

		$blog[] = $re;
	}
	return $blog;
}
