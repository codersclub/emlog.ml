<!--<?php 
if(!defined('EMLOG_ROOT')) {exit('error!');}
print <<<EOT
-->
<DIV class=post id=post-1>
<H2><b>$log_title</b></A></H2>
<DIV class=entry>
<P>$log_content</P>
<a name="att"></a>
<p>$att_img</p>
<p>$attachment</p>
<p>$tag</p>
</DIV></DIV>
<p>$post_time $log_author</p>
<h5>引用地址:<a name="tb"></a></h5>
<p>GBk: {$blogurl}trackback.php?id=$logid&amp;charset=gbk</p>  
<p>UTF-8: {$blogurl}trackback.php?id=$logid&amp;charset=utf-8</p>
<!--
EOT;
foreach($tb as $key=>$value){
print <<<EOT
-->
<ul class="trackback">
	<li>来自: <a href="$value[url]" target="_blank">$value[blog_name]</a></li>
    <li>标题: <a href="$value[url]" target="_blank">$value[title]</a> </li>
    <li>摘要: $value[excerpt]</li>
	<li>引用时间: $value[date]</li>
</ul>
<!--
EOT;
}print <<<EOT
-->
<h5>评论<a name="comment" id="comment"></a></h5>
<!--
EOT;
foreach($com as $key=>$value){
print <<<EOT
-->
<p><a name="$value[cid]"></a></p>
<div class="commentlist">
<cite>$value[poster]</cite> Says:<br />
<small class="commentmetadata">$value[addtime]</small>
<p>$value[content]</p>
</div>
<!--
EOT;
}print <<<EOT
-->
<H3 id=respond>参与评论</H3>
<form  method="post"  name="commentform" action="index.php?action=addcom" onsubmit="return checkcomment(this)">
    <p>
        <input type="hidden" name="gid" value="$logid" />
      <br />
      <input name="comname"  type="text" value="$ckname" />
      <font color="red">姓名：</font><br />
      <br />
		  <input name="commail" type="text" size="45" value="$ckmail" maxlength="20" maxlength="100"  />
  电子邮件地址：<br />
  <br />
          <textarea name="comment" cols="45" rows="10" ></textarea>
  </p>
    <p><br />
          $cheackimg
          <input name="Submit" type="submit" value="提交我的评论" onclick="return checkform()" />
          <input type="checkbox" name="remember" value="1" checked="checked" />
          记住我
    </p>
</form>
EOT;
include getViews('footer');
?>