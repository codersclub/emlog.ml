<?php
/**
 * Install
 * @copyright (c) Emlog All Rights Reserved
 * @version emlog-3.3.0
 * $Id$
 */

require_once('./lib/F_base.php');
require_once('./lib/C_mysql.php');
require_once('./lib/C_cache.php');
require_once('./lib/C_phpass.php');

header('Content-Type: text/html; charset=UTF-8');
doStripslashes();
define('EMLOG_VERSION', '3.3.0');
define('EMLOG_ROOT', dirname(__FILE__));

//blog language //vot
//define('EMLOG_LANGUAGE','zh-CN');
define('EMLOG_LANGUAGE','en-US');
//define('EMLOG_LANGUAGE','ru-RU');
require_once(EMLOG_ROOT.'/lang/'.EMLOG_LANGUAGE.'.php');//vot

$act = isset($_GET['action'])? $_GET['action'] : '';

if(!$act)
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<? echo EMLOG_LANGUAGE;?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>emlog</title>
<style type="text/css">
<!--
body {
	background-color:#F7F7F7;
	font-family: Arial;
	font-size: 12px;
	line-height:150%;
}
.main {
	background-color:#FFFFFF;
	margin-top:20px;
	font-size: 12px;
	color: #666666;
	width:580px;
	margin:10px auto;
	padding:10px;
	list-style:none;
	border:#DFDFDF 1px solid;
}
#top-title{
	background:url(admin/views/default/images/logo.gif) no-repeat right;
	padding:5px 0px;
	margin:20px 0px 60px 0px;
}
.input {
	border: 1px solid #CCCCCC;
	font-family: Arial;
	font-size: 18px;
	height:28px;
	background-color:#F7F7F7;
	color: #666666;
	margin:5px 25px;
}
.submit{
	background-color:#FFFFFF;
	border: 3px double #999;
	border-left-color: #ccc;
	border-top-color: #ccc;
	color: #333;
	padding: 0.25em;
	cursor:hand;
}
.title{
	font-size:24px;
	font-weight:bold;
}
.care{
	color:#0066CC;
}
.title2{
	font-size:14px;
	color:#000000;
	border-bottom: #CCCCCC 1px solid;
}
.foot{
	text-align:center;
}
-->
</style>
</head>
<body>
<form name="form1" method="post" action="install.php?action=install">
<div class="main">
<div id="top-title">
<p><span class="title">emlog <?php echo EMLOG_VERSION ?></span><span> <? echo $lang['install'];?><br></span></p>
</div>
<div class="b">
<p class="title2"><? echo $lang['install_step1'];?></p>
<li>
	<? echo $lang['db_hostname'];?>: <span class="care">(<? echo $lang['db_hostname_info'];?>)</span> <br />
    <input name="hostname" type="text" class="input" value="localhost">
</li>
<li>
    <? echo $lang['db_username'];?>:<br />
    <input name="dbuser" type="text" class="input" value="">
</li>
<li>
    <? echo $lang['db_password'];?>:<br />
  <input name="password" type="password" class="input">
</li>
<li>
    <? echo $lang['db_name'];?>:
	  <span class="care">(<? echo $lang['db_name_info'];?>)</span><br />
      <input name="dbname" type="text" class="input" value="">
</li>
<li>
    <? echo $lang['db_prefix'];?>:
    <span class="care"> (<? echo $lang['db_prefix_info'];?>)</span><br />
  <input name="dbprefix" type="text" class="input" value="emlog_">
</li>
</div>
<div class="c">
<p class="title2"><? echo $lang['install_step2'];?></p>
<li>
<? echo $lang['admin_name'];?>:<br />
    <input name="admin" type="text" class="input">
</li>
<li>
<? echo $lang['admin_password'];?>:<span class="care">(<? echo $lang['password_length'];?>)</span><br />
<input name="adminpw" type="password" class="input">
</li>
<li>
<? echo $lang['admin_password_repeat'];?>:<br />
<input name="adminpw2" type="password" class="input">
</li>
</div>
<div>
<p class="foot">
<input name="Submit" type="submit" class="submit" value="<? echo $lang['submit'];?>">
<input name="Submit2" type="reset" class="submit" value="<? echo $lang['reset'];?>">
</p>
</div>
<div>
<p class="foot">
Powered by <a href="http://www.emlog.net">emlog</a>
</p>
</div>
</div>
</form>
</body>
</html>
<?php
}

if($act == 'install' || $act == 'reinstall')
{
	$db_host = addslashes(trim($_POST['hostname']));
	$db_user = addslashes(trim($_POST['dbuser']));
	$db_pw = addslashes(trim($_POST['password']));
	$db_name = addslashes(trim($_POST['dbname']));
	$db_prefix = addslashes(trim($_POST['dbprefix']));
	$admin = addslashes(trim($_POST['admin']));
	$adminpw = addslashes(trim($_POST['adminpw']));
	$adminpw2 = addslashes(trim($_POST['adminpw2']));
	$result = '';

	if(empty($db_prefix))
	{
		emMsg($lang['db_prefix_empty']);
	}elseif(!preg_match("/^[\w_]+_$/",$db_prefix)){
		emMsg($lang['db_prefix_invalid']);
	}elseif($admin=="" || $adminpw==""){
		emMsg($lang['admin_password_empty']);
	}elseif(strlen($adminpw) < 5){
		emMsg($lang['password_short']);
	}elseif($adminpw!=$adminpw2)	 {
		emMsg($lang['password_not_equal']);
	}
	
	//Initialize the database class
	$DB = new Mysql($db_host, $db_user, $db_pw,$db_name);
	$CACHE = new mkcache($DB, $db_prefix);
	
	if($act != 'reinstall' && $DB->num_rows($DB->query("SHOW TABLES LIKE '{$db_prefix}blog'")) == 1)
	{
		echo <<<EOT
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>emlog system message</title>
<style type="text/css">
<!--
body {background-color:#F7F7F7;font-family: Arial;font-size: 12px;line-height:150%;}
.main {background-color:#FFFFFF;margin-top:20px;font-size: 12px;color: #666666;width:580px;margin:10px 200px;padding:10px;list-style:none;border:#DFDFDF 1px solid;}
.main p {line-height: 18px;margin: 5px 20px;}
-->
</style>
</head><body>
<form name="form1" method="post" action="install.php?action=reinstall">
<div class="main">
	<input name="hostname" type="hidden" class="input" value="$db_host">
	<input name="dbuser" type="hidden" class="input" value="$db_user">
	<input name="password" type="hidden" class="input" value="$db_pw">
	<input name="dbname" type="hidden" class="input" value="$db_name">
	<input name="dbprefix" type="hidden" class="input" value="$db_prefix">
	<input name="admin" type="hidden" class="input" value="$admin">
	<input name="adminpw" type="hidden" class="input" value="$adminpw">
	<input name="adminpw2" type="hidden" class="input" value="$adminpw2">
<p>
{$lang['install_seems_installed']}
<input name="Submit" type="submit" value="{$lang['install_continue']} &raquo;">
</p>
<p><a href="javascript:history.back(-1);">&laquo; {$lang['return_back']}</a></p>
</div>
</form>
</body>
</html>
EOT;
		exit;
	}

	if(!is_writable('config.php'))
	{
		emMsg($lang['config_no_permission']);
	}
	if(!is_writable(EMLOG_ROOT.'/content/cache/options'))
	{
		emMsg($lang['cache_write_error']);
	}
	$config = "<?php\n"
	."//mysql database address\n"
	."define('DB_HOST','$db_host');\n\n"
	."//mysql database user\n"
	."define('DB_USER','$db_user');\n\n"
	."//database password\n"
	."define('DB_PASSWD','$db_pw');\n\n"
	."//database name\n"
	."define('DB_NAME','$db_name');\n\n"
	."//database prefix\n"
	."define('DB_PREFIX','$db_prefix');\n\n"
	."//auth key\n"
	."define('AUTH_KEY','".getRandStr(32).md5($_SERVER['HTTP_USER_AGENT'])."');\n\n"
	."//cookie name\n"
	."define('AUTH_COOKIE_NAME','EM_AUTHCOOKIE_".getRandStr(32,false)."');\n\n"
	."//blog language //vot\n"
	."define('EMLOG_"."LANGUAGE','".EMLOG_LANGUAGE."');\n\n"
	;

	$fp = @fopen('config.php', 'w');
	$fw = @fwrite($fp, $config);
	if (!$fw)
	{
		emMsg($lang['config_no_permission']);
	}else{
		$result.=$lang['config_saved']."<br />";
	}
	fclose($fp);


	//Encrypt the Password
	$PHPASS = new PasswordHash(8, true);
	$adminpw = $PHPASS->HashPassword($adminpw);

	$dbcharset = 'utf8';
	$type = 'MYISAM';
	$add = $DB->getMysqlVersion() > '4.1' ? "ENGINE=".$type." DEFAULT CHARSET=".$dbcharset.";":"TYPE=".$type.";";
	$setchar = $DB->getMysqlVersion() > '4.1'?"ALTER DATABASE `{$db_name}` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;":'';

	$widgets = array(
	'blogger'=>$lang['widget_blogger'],
	'calendar'=>$lang['calendar'],
	'tag'=>$lang['tags'],
	'sort'=>$lang['categories'],
	'archive'=>$lang['archive'],
	'newcomm'=>$lang['latest_comments'],
	'twitter'=>$lang['twitter'],
	'newlog'=>$lang['latest_posts'],
	'random_log'=>$lang['random_posts'],
	'music'=>$lang['music'],
	'link'=>$lang['links'],
	'search'=>$lang['search'],
	'bloginfo'=>$lang['statistics'],
	'custom_text'=>$lang['widget_custom']
	);
	$sider_wg = array(
	'calendar',
	'archive',
	'newcomm',
	'link',
	'search',
	'bloginfo'
	);
	$widget_title = serialize($widgets);
	$widgets = serialize($sider_wg);

	preg_match("/^.*\//", $_SERVER['SCRIPT_NAME'], $matches);
	$subdir = $matches[0];
	$blogUrl = 'http://'.$_SERVER['HTTP_HOST'].$subdir;

	$sql = $setchar."
DROP TABLE IF EXISTS {$db_prefix}blog;
CREATE TABLE {$db_prefix}blog (
  gid mediumint(8) unsigned NOT NULL auto_increment,
  title varchar(255) NOT NULL default '',
  date bigint(20) NOT NULL,
  content longtext NOT NULL,
  excerpt longtext NOT NULL,
  author int(10) NOT NULL default '1',
  sortid tinyint(3) NOT NULL default '-1',
  type varchar(20) NOT NULL default 'blog',
  views mediumint(8) unsigned NOT NULL default '0',
  comnum mediumint(8) unsigned NOT NULL default '0',
  tbcount mediumint(8) unsigned NOT NULL default '0',
  attnum mediumint(8) unsigned NOT NULL default '0',
  top enum('n','y') NOT NULL default 'n',
  hide enum('n','y') NOT NULL default 'n',
  allow_remark enum('n','y') NOT NULL default 'y',
  allow_tb enum('n','y') NOT NULL default 'y',
  password varchar(255) NOT NULL default '',
  PRIMARY KEY  (gid)
)".$add."
INSERT INTO {$db_prefix}blog (gid,title,date,content,excerpt,author,views,comnum,attnum,tbcount,top,hide, allow_remark,allow_tb,password) VALUES 
(1, 'hi blogger', '1230508801', '{$lang['install_post_body']}', '', 1, 0, 0, 0, 0, 'n', 'n', 'y', 'y', '');
DROP TABLE IF EXISTS {$db_prefix}attachment;
CREATE TABLE {$db_prefix}attachment (
  aid smallint(5) unsigned NOT NULL auto_increment,
  blogid mediumint(8) unsigned NOT NULL default '0',
  filename varchar(255) NOT NULL default '',
  filesize int(10) NOT NULL default '0',
  filepath varchar(255) NOT NULL default '',
  addtime bigint(20) NOT NULL,
  PRIMARY KEY  (aid),
  KEY blogid (blogid)
)".$add."
DROP TABLE IF EXISTS {$db_prefix}comment;
CREATE TABLE {$db_prefix}comment (
  cid mediumint(8) unsigned NOT NULL auto_increment,
  gid mediumint(8) unsigned NOT NULL default '0',
  date bigint(20) NOT NULL,
  poster varchar(20) NOT NULL default '',
  comment text NOT NULL,
  reply text NOT NULL,
  mail varchar(60) NOT NULL default '',
  url varchar(75) NOT NULL default '',
  ip varchar(128) NOT NULL default '',
  hide enum('n','y') NOT NULL default 'n',
  PRIMARY KEY  (cid),
  KEY gid (gid)
)".$add."
DROP TABLE IF EXISTS {$db_prefix}options;
CREATE TABLE {$db_prefix}options (
option_id INT( 11 ) UNSIGNED NOT NULL auto_increment,
option_name VARCHAR( 255 ) NOT NULL ,
option_value LONGTEXT NOT NULL ,
PRIMARY KEY (option_id)
)".$add."
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('blogname','Hello World');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('bloginfo','{$lang['install_slogan']}');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('site_key','emlog');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('blogurl','$blogUrl');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('icp','');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('index_lognum','10');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('index_comnum','10');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('index_twnum','10');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('index_newlognum','5');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('index_randlognum','5');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('comment_subnum','20');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('nonce_templet','default');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('tpl_sidenum','1');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('comment_code','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('login_code','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('ischkcomment','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('isurlrewrite','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('isgzipenable','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('istrackback','y');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('timezone','8');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('music','');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('viewcount_day','0');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('viewcount_all','0');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('viewcount_date','');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('active_plugins','a:1:{i:0;s:13:\"tips/tips.php\";}');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('navibar','a:0:{}');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('widget_title','$widget_title');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('custom_widget','a:0:{}');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('widgets1','$widgets');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('widgets2','');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('widgets3','');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('widgets4','');
DROP TABLE IF EXISTS {$db_prefix}link;
CREATE TABLE {$db_prefix}link (
  id smallint(4) unsigned NOT NULL auto_increment,
  sitename varchar(30) NOT NULL default '',
  siteurl varchar(75) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  taxis smallint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (id)
)".$add."
INSERT INTO {$db_prefix}link (id, sitename, siteurl, description, taxis) VALUES 
(1, 'emlog', 'http://www.emlog.net', '{$lang['emlog_homepage']}', 0);
DROP TABLE IF EXISTS {$db_prefix}tag;
CREATE TABLE {$db_prefix}tag (
  tid mediumint(8) unsigned NOT NULL auto_increment,
  tagname varchar(60) NOT NULL default '',
  gid text NOT NULL,
  PRIMARY KEY  (tid),
  KEY tagname (tagname)
)".$add."
DROP TABLE IF EXISTS {$db_prefix}sort;
CREATE TABLE {$db_prefix}sort (
  sid tinyint(3) unsigned NOT NULL auto_increment,
  sortname varchar(255) NOT NULL default '',
  taxis tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (sid)
)".$add."
DROP TABLE IF EXISTS {$db_prefix}trackback;
CREATE TABLE {$db_prefix}trackback (
  tbid mediumint(8) unsigned NOT NULL auto_increment,
  gid mediumint(8) unsigned NOT NULL default '0',
  title varchar(255) NOT NULL default '',
  date bigint(20) NOT NULL,
  excerpt text NOT NULL,
  url varchar(255) NOT NULL default '',
  blog_name varchar(255) NOT NULL default '',
  ip varchar(16) NOT NULL default '',
  PRIMARY KEY  (tbid),
  KEY gid (gid)
)".$add."
DROP TABLE IF EXISTS {$db_prefix}twitter;
CREATE TABLE {$db_prefix}twitter (
id INT NOT NULL AUTO_INCREMENT,
content VARCHAR(255) NOT NULL,
date bigint(20) NOT NULL,
PRIMARY KEY (id)
)".$add."
INSERT INTO {$db_prefix}twitter (id,content, date) VALUES 
(1,'{$lang['install_twitter']}','1230508801');
DROP TABLE IF EXISTS {$db_prefix}user;
CREATE TABLE {$db_prefix}user (
  uid tinyint(3) unsigned NOT NULL auto_increment,
  username varchar(32) NOT NULL default '',
  password varchar(64) NOT NULL default '',
  nickname varchar(20) NOT NULL default '',
  role varchar(60) NOT NULL default '',
  photo varchar(255) NOT NULL default '',
  email varchar(60) NOT NULL default '',
  description varchar(255) NOT NULL default '',
PRIMARY KEY  (uid)
)".$add."
INSERT INTO {$db_prefix}user (uid, username, password, role) VALUES (1,'$admin','".$adminpw."','admin');";

	$mysql_query = explode(";\n", $sql);
	while (list(,$query) = each($mysql_query))
	{
		$query = trim($query);
		if ($query)
		{
			if (strstr($query, 'CREATE TABLE'))
			{
				preg_match('/CREATE TABLE ([^ ]*)/', $query, $matches);
				$ret = $DB->query($query);
				if ($ret)
				{
					$result .= $lang['db_table'].': '.$matches[1].' '.$lang['db_table_created'].'<br />';
				}
			} else {
				$ret = $DB->query($query);
			}
		}
	}
	//Rebuild the cache
	$CACHE->mc_user();
	$CACHE->mc_options();
	$CACHE->mc_record();
	$CACHE->mc_comment();
	$CACHE->mc_logtags();
	$CACHE->mc_logsort();
	$CACHE->mc_logatts();
	$CACHE->mc_sta();
	$CACHE->mc_link();
	$CACHE->mc_tags();
	$CACHE->mc_sort();
	$CACHE->mc_twitter();
	$CACHE->mc_newlog();

	$result .= $lang['admin_name'].": ".$admin." ".$lang['install_ok'];
	emMsg($result);
}
?>