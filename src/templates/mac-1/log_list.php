﻿<!--<?php 
if(!defined('EMLOG_ROOT')) {exit('error!');}
print <<<EOT
-->
      <div id="nav">
        <ul>
          <li class="page_item current_page_item"><a href="./index.php" title="Home">Home</a></li>
        </ul>
      </div>
  <div id="content">
<!--
EOT;
foreach($logs as $value){
//$value[att_img] = getAttachment($value[att_img],200,120);
$datetime = explode("-",$value['post_time']);
$year = $datetime[0]."/".$datetime[1];
$day = substr($datetime[2],0,2);
print <<<EOT
-->
        <div class="post" id="post-$value[logid]">
		  <div class="date"><span>$year</span>$day</div>
		  <div class="title">
          <h2>$value[toplog]<a href="?action=showlog&gid=$value[logid]">$value[log_title]</a></h2>
          <div class="postdata"><span class="comments"><a href="?action=showlog&gid=$value[com_url]" title="$value[log_title] 的评论">$value[comnum] Comments &#187;</a></span></div>

		  </div>
          <div class="entry">
$value[log_description]
<p>$value[att_img]</p>
<p>$value[attachment]</p>
<p>$value[tag]</p>

<p class="info">
<em class="caty">
  
 <a href="?action=showlog&gid=$value[com_url]">评论($value[comnum])</a>
 <a href="?action=showlog&gid=$value[tb_url]">引用($value[tbcount])</a> 
 <a href="?action=showlog&gid=$value[logid]">浏览($value[views])</a></em>
</p>
          </div><!--/entry -->

	</div><!--/post -->
<!--
EOT;
}print <<<EOT
-->
<p>$page_url</p>

</div><!--/content -->
<div id="footer">&copy; 2007 <a href="http://www.emlog.net" target="_blank">emlog</a></div>
</div>
EOT;
include getViews('side');
?>