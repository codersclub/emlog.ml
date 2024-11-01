<?php

/**
 * media sort model
 * @package EMLOG
 * @link https://www.emlog.net
 */

class MediaSort_Model
{

    private $db;
    private $table;
    private $table_media;

    function __construct()
    {
        $this->db = Database::getInstance();
        $this->table = DB_PREFIX . 'media_sort';
        $this->table_media = DB_PREFIX . 'attachment';
    }

    function getSorts()
    {
        $res = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
        $sorts = [];
        while ($row = $this->db->fetch_array($res)) {
            $row['sortname'] = htmlspecialchars($row['sortname']);
            $row['id'] = htmlspecialchars($row['id']);
            $sorts[] = $row;
        }
        return $sorts;
    }

    function updateSort($sortData, $id)
    {
        $Item = [];
        foreach ($sortData as $key => $data) {
            $Item[] = "$key='$data'";
        }
        $upStr = implode(',', $Item);
/*vot*/        $this->db->query("UPDATE $this->table SET $upStr WHERE id=$id");
    }

    function addSort($name)
    {
/*vot*/ $sql = "INSERT INTO $this->table (sortname) VALUES('$name')";
        $this->db->query($sql);
    }

    function deleteSort($id)
    {
/*vot*/        $this->db->query("DELETE FROM $this->table WHERE id=$id");
    }
}
