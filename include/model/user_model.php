<?php
/**
 * user model
 * @package EMLOG
 * @link https://www.emlog.net
 */

class User_Model {

    private $db;
    private $table;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->table = DB_PREFIX . 'user';
    }

    public function getUsers($email = '', $nickname = '', $admin = '', $page = 1) {
        $condition = $limit = '';
        if ($email) {
/*vot*/            $condition = " AND email LIKE '$email%'";
        }
        if ($nickname) {
            $condition = " and nickname like '%$nickname%'";
        }
        if ($admin) {
            $condition = " and role IN('admin','editor')";
        }
        if ($page) {
            $perpage_num = Option::get('admin_perpage_num');
            $startId = ($page - 1) * $perpage_num;
            $limit = "LIMIT $startId, " . $perpage_num;
        }
/*vot*/ $res = $this->db->query("SELECT * FROM $this->table WHERE 1=1 $condition ORDER BY uid DESC $limit");
        $users = [];
        while ($row = $this->db->fetch_array($res)) {
            $row['name'] = htmlspecialchars($row['nickname']);
            $row['login'] = htmlspecialchars($row['username']);
            $row['email'] = htmlspecialchars($row['email']);
            $row['description'] = htmlspecialchars($row['description']);
            $row['create_time'] = smartDate($row['create_time']);
            $row['update_time'] = smartDate($row['update_time']);
            $row['role'] = User::getRoleName($row['role'], (int)$row['uid']);
            $users[] = $row;
        }
        return $users;
    }

    public function getOneUser($uid) {
        $uid = (int)$uid;
/*vot*/ $row = $this->db->once_fetch_array("SELECT * FROM $this->table WHERE uid=$uid");

        if (empty($row)) {
            return [];
        }

        $row['username'] = htmlspecialchars($row['username']);
        $row['nickname'] = htmlspecialchars(empty($row['nickname']) ? $row['username'] : $row['nickname']);
        $row['name_orig'] = $row['nickname'];
        $row['email'] = htmlspecialchars($row['email']);
        $row['photo'] = htmlspecialchars($row['photo']);
        $row['description'] = htmlspecialchars($row['description']);
        $row['state'] = (int)$row['state'];
        $row['credits'] = (int)$row['credits'];

        return $row;
    }

    public function updateUser($userData, $uid) {
        $utctimestamp = time();
        $Item = ["update_time=$utctimestamp"];
        foreach ($userData as $key => $data) {
            $Item[] = "$key='$data'";
        }
        $upStr = implode(',', $Item);
/*vot*/ $this->db->query("UPDATE $this->table SET $upStr WHERE uid=$uid");
    }

    public function updateUserByMail($userData, $mail) {
        $timestamp = time();
        $Item = ["update_time=$timestamp"];
        foreach ($userData as $key => $data) {
            $Item[] = "$key='$data'";
        }
        $upStr = implode(',', $Item);
/*vot*/ $this->db->query("UPDATE $this->table SET $upStr WHERE email='$mail'");
    }

    public function addUser($username, $mail, $password, $role) {
        $timestamp = time();
        $nickname = getRandStr(8, false);
/*vot*/ $sql = "INSERT INTO $this->table (username,email,password,nickname,role,create_time,update_time) VALUES('$username','$mail','$password','$nickname','$role',$timestamp,$timestamp)";
        $this->db->query($sql);
    }

    public function deleteUser($uid) {
/*vot*/        $this->db->query("UPDATE " . DB_PREFIX . "blog SET author=1, checked='y' WHERE author=$uid");
/*vot*/        $this->db->query("DELETE FROM $this->table WHERE uid=$uid");
    }

    public function forbidUser($uid) {
/*vot*/        $this->db->query("UPDATE $this->table SET state=1 WHERE uid=$uid");
    }

    public function unforbidUser($uid) {
/*vot*/        $this->db->query("UPDATE $this->table SET state=0 WHERE uid=$uid");
    }

    /**
     * check the username exists
     *
     * @param string $user_name
     * @param int $uid Compatible with the case that the user name has not changed when updating the author's information
     * @return boolean
     */
    public function isUserExist($user_name, $uid = '') {
        if (empty($user_name)) {
            return false;
        }
        $subSql = $uid ? 'and uid!=' . $uid : '';
        $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM $this->table WHERE username='$user_name' $subSql");
        return $data['total'] > 0;
    }

    public function isNicknameExist($nickname, $uid = '') {
        if (empty($nickname)) {
            return FALSE;
        }
        $subSql = $uid ? 'and uid!=' . $uid : '';
        $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM $this->table WHERE nickname='$nickname' $subSql");
        return $data['total'] > 0;
    }

    public function isMailExist($mail, $uid = '') {
        if (empty($mail)) {
            return FALSE;
        }
        $subSql = $uid ? 'and uid!=' . $uid : '';
        $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM $this->table WHERE email='$mail' $subSql");
        return $data['total'] > 0;
    }

    public function getUserCount($email = '', $nickname = '', $admin = '') {
        $condition = '';
        if ($email) {
            $condition = " and email like '$email%'";
        }
        if ($nickname) {
            $condition = " and nickname like '%$nickname%'";
        }
        if ($admin) {
            $condition = " and role IN('admin','editor')";
        }
        $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM $this->table where 1=1 $condition");
        return $data['total'];
    }

    /**
     * Add user credits
     */
    public function addCredits($uid, $count) {
        $uid = (int)$uid;
        $count = (int)$count;
        if ($count < 0) {
            $count = 0;
        }
        $this->db->query("UPDATE $this->table SET credits=credits+$count WHERE uid=$uid");
        return true;
    }

    /**
     * Reduce user credits
     */
    public function reduceCredits($uid, $count) {
        $uid = (int)$uid;
        $count = (int)$count;
        if ($count < 0) {
            $count = 0;
        }
        $this->db->query("UPDATE $this->table SET credits = IF(credits >= $count, credits - $count, 0) WHERE uid = $uid");
        return true;
    }

}
