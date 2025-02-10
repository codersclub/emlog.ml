<?php

/**
 * Cache
 *
 * @package EMLOG
 * @link https://www.emlog.net
 */

class Cache
{

    private $db;
    private static $instance;

    private $options_cache;
    private $user_cache;
    private $sta_cache;
    private $comment_cache;
    private $tags_cache;
    private $sort_cache;
    private $link_cache;
    private $navi_cache;
    private $newlog_cache;
    private $record_cache;
    private $logtags_cache;
    private $logsort_cache;
    private $logalias_cache;

    protected function __construct()
    {
        $this->db = Database::getInstance();
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Cache();
        }
        return self::$instance;
    }

    /**
     * update cache
     *
     * @param mixed $cacheMethodName cache name：'options', multi use array：['options', 'user'], Leave blank for update all
     */
    public function updateCache($cacheMethodName = null)
    {
        // update single cache
        if (is_string($cacheMethodName)) {
            $method = 'mc_' . $cacheMethodName;
            if (method_exists($this, $method)) {
                $this->$method();
            }
            return;
        }
        // Update multiple caches
        if (is_array($cacheMethodName)) {
            foreach ($cacheMethodName as $name) {
                $method = 'mc_' . $name;
                if (method_exists($this, $method)) {
                    $this->$method();
                }
            }
            return;
        }
        // Update all caches
        if (!$cacheMethodName) {
            $cacheMethodNames = get_class_methods($this);
            foreach ($cacheMethodNames as $method) {
                if (0 === strpos($method, 'mc_')) {
                    $this->$method();
                }
            }
        }
    }

    public function updateArticleCache()
    {
        $this->updateCache(['sta', 'tags', 'sort', 'newlog', 'record', 'logsort', 'logalias']);
    }

    public function cacheWrite($cacheData, $cacheName)
    {
        $cacheFile = EMLOG_ROOT . '/content/cache/' . $cacheName . '.php';
        $cacheData = "<?php exit;//" . $cacheData;

        if (!file_put_contents($cacheFile, $cacheData)) {
            emMsg('写入缓存失败，缓存目录(content/cache)不可写');
        }

        $this->{$cacheName . '_cache'} = null;
    }

    public function readCache($cacheName)
    {
        $cacheProperty = $cacheName . '_cache';

        if (!is_null($this->{$cacheProperty})) {
            return $this->{$cacheProperty};
        }

        $cacheFile = EMLOG_ROOT . '/content/cache/' . $cacheName . '.php';

        if (!is_file($cacheFile) || filesize($cacheFile) <= 0) {
            if (method_exists($this, 'mc_' . $cacheName)) {
                $this->{'mc_' . $cacheName}();
            }
        }

        if ($cacheData = file_get_contents($cacheFile)) {
            clearstatcache();
            $this->{$cacheProperty} = unserialize(str_replace("<?php exit;//", '', $cacheData));
            return $this->{$cacheProperty};
        }
    }

    private function mc_options()
    {
        $options_cache = [];
        $res = $this->db->query("SELECT * FROM " . DB_PREFIX . "options");
        while ($row = $this->db->fetch_array($res)) {
            if (in_array($row['option_name'], array('site_key', 'blogname', 'bloginfo', 'blogurl', 'icp'))) {
                $row['option_value'] = htmlspecialchars($row['option_value']);
            }
            $options_cache[$row['option_name']] = $row['option_value'];
        }
        $cacheData = serialize($options_cache);
        $this->cacheWrite($cacheData, 'options');
    }

    private function mc_user()
    {
        $user_cache = [];
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "user ORDER BY uid ASC");
        while ($row = $this->db->fetch_array($query)) {
            $photo = [];
            $photoSrc = '';
            if (!empty($row['photo'])) {
                $photoSrc = str_replace("../", '', $row['photo']);
                $photo['src'] = htmlspecialchars($photoSrc);
                $photo['width'] = 500;
                $photo['height'] = 300;
            }
            $row['nickname'] = empty($row['nickname']) ? $row['username'] : $row['nickname'];
            $user_cache[$row['uid']] = [
                'uid'       => $row['uid'],
                'photo'     => $photo,
                'avatar'    => $photoSrc,
                'name_orig' => $row['nickname'],
                'name'      => htmlspecialchars($row['nickname']),
                'mail'      => htmlspecialchars($row['email']),
                'des'       => htmlClean($row['description']),
                'ischeck'   => htmlspecialchars($row['ischeck']),
                'role'      => $row['role'],
            ];
        }
        $cacheData = serialize($user_cache);
        $this->cacheWrite($cacheData, 'user');
    }

    private function mc_sta()
    {
        $now = time();
        $sql = "SELECT 
        SUM(CASE WHEN type = 'blog' AND hide = 'n' AND checked = 'y' AND date <= $now THEN 1 ELSE 0 END) AS log_num,
        SUM(CASE WHEN type = 'blog' AND hide = 'n' AND checked = 'n' THEN 1 ELSE 0 END) AS check_num 
        FROM `" . DB_PREFIX . "blog`";
        $data = $this->db->once_fetch_array($sql);
        $log_num = $data['log_num'];
        $check_num = $data['check_num'];

        $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "twitter");
        $note_num = $data['total'];

        $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "like");
        $like_num = $data['total'];

        $sql = "SELECT 
        SUM(CASE WHEN hide = 'n' THEN 1 ELSE 0 END) AS com_num,
        SUM(CASE WHEN hide = 'y' THEN 1 ELSE 0 END) AS hide_com_num 
        FROM " . DB_PREFIX . "comment";
        $data = $this->db->once_fetch_array($sql);
        $com_num = $data['com_num'] ? $data['com_num'] : 0;
        $hide_com_num = $data['hide_com_num'] ? $data['hide_com_num'] : 0;

        $sta_cache = [
            'lognum'     => $log_num,
            'draftnum'   => 0, // todo: del this after some versions
            'comnum'     => $com_num,
            'comnum_all' => $com_num + $hide_com_num,
            'hidecomnum' => $hide_com_num,
            'checknum'   => $check_num,
            'note_num'   => $note_num,
            'like_num'   => $like_num,
        ];

        // Performance issues only cache the information of the last 1000 users
        $query = $this->db->query("SELECT uid FROM " . DB_PREFIX . "user order by uid desc limit 1000");
        while ($row = $this->db->fetch_array($query)) {
            $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog WHERE author={$row['uid']} AND hide='n' and type='blog'");
            $logNum = $data['total'];

            $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "comment AS a, " . DB_PREFIX . "blog AS b WHERE a.gid = b.gid AND b.author={$row['uid']}");
            $commentNum = $data['total'];

            $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "comment AS a, " . DB_PREFIX . "blog AS b WHERE a.gid=b.gid and a.hide='y' AND b.author={$row['uid']}");
            $hidecommentNum = $data['total'];

            $sta_cache[$row['uid']] = [
                'lognum'         => $logNum,
                'draftnum'       => 0, // todo: del this after some versions
                'commentnum'     => $commentNum,
                'hidecommentnum' => $hidecommentNum,
            ];
        }

        $cacheData = serialize($sta_cache);
        $this->cacheWrite($cacheData, 'sta');
    }

    private function mc_comment()
    {
        $query = $this->db->query("SELECT option_value,option_name FROM " . DB_PREFIX . "options WHERE option_name IN('index_comnum','comment_subnum','comment_paging','comment_pnum','comment_order')");
        while ($row = $this->db->fetch_array($query)) {
            ${$row['option_name']} = $row['option_value'];
        }
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "comment WHERE hide='n' ORDER BY date DESC LIMIT 0, $index_comnum");
        $com_cache = [];
        $com_cids = [];
        while ($show_com = $this->db->fetch_array($query)) {
            $com_page = '';
            if ($comment_paging == 'y') {
                $pid = $show_com['pid'];
                $cid = $show_com['cid'];
                $order = $comment_order == 'newer' ? 'DESC' : '';
                while ($pid != 0) {
                    $show_pid = $this->db->once_fetch_array("SELECT cid,pid FROM " . DB_PREFIX . "comment WHERE cid=$pid");
                    $pid = $show_pid['pid'];
                    $cid = $show_pid['cid'];
                }
                if (!isset($com_cids[$show_com['gid']])) {
                    $com_cids[$show_com['gid']] = [];
                    $query2 = $this->db->query("SELECT cid FROM " . DB_PREFIX . "comment WHERE gid=" . $show_com['gid'] . " AND pid=0 AND hide='n' ORDER BY date $order");
                    while ($show_cid = $this->db->fetch_array($query2)) {
                        $com_cids[$show_com['gid']][] = $show_cid['cid'];
                    }
                }
                $com_page = (int)floor(array_search($cid, $com_cids[$show_com['gid']]) / $comment_pnum) + 1;
            }
            $com_cache[] = array(
                'cid'     => $show_com['cid'],
                'gid'     => $show_com['gid'],
                'name'    => htmlspecialchars($show_com['poster']),
                'date'    => $show_com['date'],
                'page'    => $com_page,
                'mail'    => $show_com['mail'],
                'uid'     => $show_com['uid'],
                'content' => htmlClean(subString($show_com['comment'], 0, $comment_subnum), false),
            );
        }
        $cacheData = serialize($com_cache);
        $this->cacheWrite($cacheData, 'comment');
    }

    private function mc_tags()
    {
        $tag_cache = [];
        $tagnum = 50;
        $maxuse = 20;
        $minuse = 0;
        $spread = (min($tagnum, 12));
        $rank = $maxuse - $minuse;
        $rank = ($rank == 0 ? 1 : $rank);
        $rank = $spread / $rank;
        $query = $this->db->query("SELECT tagname,gid FROM " . DB_PREFIX . "tag order by tid desc limit $tagnum");
        while ($row = $this->db->fetch_array($query)) {
            if ($row['gid'] == ',') {
                continue;
            }
            $usenum = empty($row['gid']) ? 0 : substr_count($row['gid'], ',') + 1;
            $fontsize = 10 + round(($usenum - $minuse) * $rank); //min fontsize:10pt
            $tag_cache[] = [
                'tagurl'   => urlencode($row['tagname']),
                'tagname'  => htmlspecialchars($row['tagname']),
                'fontsize' => min($fontsize, 22), //max fontsize:22pt,
                'usenum'   => $usenum
            ];
        }
        $cacheData = serialize($tag_cache);
        $this->cacheWrite($cacheData, 'tags');
    }

    private function mc_sort()
    {
        $Sort_Model = new Sort_Model();
        $sort_cache = $Sort_Model->getSorts();
        $cacheData = serialize($sort_cache);
        $this->cacheWrite($cacheData, 'sort');
    }

    private function mc_link()
    {
        $link_cache = [];
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "link WHERE hide='n' ORDER BY taxis ASC");
        while ($show_link = $this->db->fetch_array($query)) {
            $link_cache[] = array(
                'link' => htmlspecialchars($show_link['sitename']),
                'url'  => htmlspecialchars($show_link['siteurl']),
                'icon' => htmlspecialchars($show_link['icon']),
                'des'  => htmlspecialchars($show_link['description'])
            );
        }
        $cacheData = serialize($link_cache);
        $this->cacheWrite($cacheData, 'link');
    }

    private function mc_navi()
    {
        $navi_cache = [];
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "navi WHERE hide='n' ORDER BY pid ASC, taxis ASC");
        $sorts = $this->readCache('sort');
        while ($row = $this->db->fetch_array($query)) {
            $children = [];
            $url = Url::navi($row['type'], $row['type_id'], $row['url']);

            if ($row['type'] == Navi_Model::navitype_sort && !empty($sorts[$row['type_id']]['children'])) {
                foreach ($sorts[$row['type_id']]['children'] as $sortid) {
                    $children[] = $sorts[$sortid];
                }
            }
            $naviData = array(
                'id'        => (int)$row['id'],
                'naviname'  => htmlspecialchars(trim($row['naviname'])),
                'url'       => htmlspecialchars(trim($url)),
                'newtab'    => $row['newtab'],
                'isdefault' => $row['isdefault'],
                'type'      => (int)$row['type'],
                'typeId'    => (int)$row['type_id'],
                'taxis'     => (int)$row['taxis'],
                'hide'      => $row['hide'],
                'pid'       => (int)$row['pid'],
                'children'  => $children,
            );
            if ($row['type'] == Navi_Model::navitype_custom) {
                if ($naviData['pid'] == 0) {
                    $naviData['childnavi'] = [];
                } elseif (isset($navi_cache[$row['pid']])) {
                    $navi_cache[$row['pid']]['childnavi'][] = $naviData;
                }
            }
            $navi_cache[$row['id']] = $naviData;
        }
        $cacheData = serialize($navi_cache);
        $this->cacheWrite($cacheData, 'navi');
    }

    private function mc_newlog()
    {
        $index_newlognum = Option::get('index_newlognum');
        if ($index_newlognum <= 0) {
            $index_newlognum = 10;
        }
        $now = time();
        $date_state = "and date<=$now";
        $sql = "SELECT gid,title,cover,views,comnum,date FROM " . DB_PREFIX . "blog WHERE hide='n' and checked='y' and type='blog' $date_state ORDER BY date DESC LIMIT 0, $index_newlognum";
        $res = $this->db->query($sql);
        $logs = [];
        while ($row = $this->db->fetch_array($res)) {
            $row['gid'] = (int)$row['gid'];
            $row['title'] = htmlspecialchars($row['title']);
            $row['cover'] = $row['cover'] ? getFileUrl($row['cover']) : '';
            $logs[] = $row;
        }
        $cacheData = serialize($logs);
        $this->cacheWrite($cacheData, 'newlog');
    }

    private function mc_record()
    {
        $query = $this->db->query('select date from ' . DB_PREFIX . "blog WHERE hide='n' and checked='y' and type='blog' ORDER BY date DESC");
        $record = 'xxxx_x';
        $p = 0;
        $lognum = 1;
        $record_cache = [];
        while ($show_record = $this->db->fetch_array($query)) {
            $f_record = gmdate('Y_n', $show_record['date']);
            if ($record != $f_record) {
                $h = $p - 1;
                if ($h != -1) {
                    $record_cache[$h]['lognum'] = $lognum;
                }
                $record_cache[$p] = array(
                    'record' => gmdate('Y年n月', $show_record['date']),
                    'date'   => gmdate('Ym', $show_record['date'])
                );
                $p++;
                $lognum = 1;
            } else {
                $lognum++;
                continue;
            }
            $record = $f_record;
        }
        $j = $p - 1;
        if ($j >= 0) {
            $record_cache[$j]['lognum'] = $lognum;
        }

        $cacheData = serialize($record_cache);
        $this->cacheWrite($cacheData, 'record');
    }

    private function mc_logalias()
    {
        $sql = "SELECT gid,alias FROM " . DB_PREFIX . "blog where alias!=''";
        $query = $this->db->query($sql);
        $log_cache_alias = [];
        while ($row = $this->db->fetch_array($query)) {
            $log_cache_alias[$row['gid']] = $row['alias'];
        }
        $cacheData = serialize($log_cache_alias);
        $this->cacheWrite($cacheData, 'logalias');
    }

    /**
     * Post Tag Cache [Deprecated]
     */
    private function mc_logtags()
    {
        $cacheData = serialize([]);
        $this->cacheWrite($cacheData, 'logtags');
    }

    /**
     * Consider performance issues and only cache the classification information of the first 200 articles
     */
    private function mc_logsort()
    {
        $sql = "SELECT gid,sortid FROM " . DB_PREFIX . "blog where type='blog' order by top DESC, sortop DESC, date DESC LIMIT 200";
        $query = $this->db->query($sql);
        $log_cache_sort = [];
        $logs = [];
        $sorts = [];
        while ($row = $this->db->fetch_array($query)) {
            if ($row['sortid'] > 0) {
                $logs[$row['gid']] = $row['sortid'];
            }
        }

        if ($logs) {
            $query = $this->db->query("SELECT sid,sortname,alias FROM " . DB_PREFIX . "sort");
            while ($srow = $this->db->fetch_array($query)) {
                $sorts[$srow['sid']] = [
                    'name'  => htmlspecialchars($srow['sortname']),
                    'id'    => htmlspecialchars($srow['sid']),
                    'alias' => htmlspecialchars($srow['alias']),
                ];
            }
            foreach ($logs as $gid => $sortid) {
                $log_cache_sort[$gid] = isset($sorts[$sortid]) ? $sorts[$sortid] : [];
            }
        }
        $cacheData = serialize($log_cache_sort);
        $this->cacheWrite($cacheData, 'logsort');
    }
}
