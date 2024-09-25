<?php

/**
 * notes model
 *
 * @package EMLOG
 * @link https://www.emlog.net
 */

class Twitter_Model
{

    private $db;
    private $parsedown;
    private $table;

    function __construct()
    {
        $this->db = Database::getInstance();
        $this->parsedown = new Parsedown();
        $this->table = DB_PREFIX . 'twitter';
    }

    function addTwitter($tData)
    {
        $kItem = [];
        $dItem = [];
        foreach ($tData as $key => $data) {
            $kItem[] = $key;
            $dItem[] = $data;
        }
        $field = implode(',', $kItem);
        $values = "'" . implode("','", $dItem) . "'";
        $this->db->query("INSERT INTO $this->table ($field) VALUES ($values)");
        return $this->db->insert_id();
    }

    function update($data, $id)
    {
        $Item = [];
        foreach ($data as $key => $value) {
            $Item[] = "$key='$value'";
        }
        $upStr = implode(',', $Item);
        $this->db->query("update $this->table set $upStr where id=$id");
    }

    function getCount($uid = UID)
    {
/*vot*/        $author = $uid ? 'AND author=' . $uid : '';
        $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM $this->table WHERE 1=1 $author");
        return $data['total'];
    }

    /**
     * Get twitters
     * @param int $uid User ID
     * @param int $page Page number
     * @param int $perpage_num Quantity per page
     * @param bool $private Whether to return private twitters
     * @return array
     */
    function getTwitters($uid, $page = 1, $perpage_num = 20, $private = false)
    {
        $start_limit = !empty($page) ? ($page - 1) * $perpage_num : 0;
/*vot*/        $author = $uid ? 'AND author=' . $uid : '';
        $privateCondition = $private ? '' : 'AND private="n"';
        $limit = "LIMIT $start_limit, $perpage_num";
        $sql = "SELECT * FROM $this->table WHERE 1=1 $author $privateCondition ORDER BY id DESC $limit";
        $res = $this->db->query($sql);
        $tws = [];
        while ($row = $this->db->fetch_array($res)) {
            $row['t'] = $this->parsedown->text($row['content']);
            $row['t_raw'] = $row['content'];
            $row['t_img'] = getFirstImage($row['content']);
            $row['date'] = smartDate($row['date']);
            $tws[] = $row;
        }
        return $tws;
    }

    function delTwitter($tid)
    {
        $author = User::haveEditPermission() ? '' : 'and author=' . UID;
/*vot*/ $query = $this->db->query("SELECT img FROM $this->table WHERE id=$tid $author");
        $row = $this->db->fetch_array($query);

        // del tw
/*vot*/ $this->db->query("DELETE FROM $this->table WHERE id=$tid $author");
        if ($this->db->affected_rows() < 1) {
            emMsg(lang('no_permission'), './');
        }
        // del pic
        if (!empty($row['img'])) {
            $fpath = str_replace('thum-', '', $row['img']);
            if ($fpath != $row['img']) {
                @unlink('../' . $fpath);
            }
            @unlink('../' . $row['img']);
        }
    }
}
