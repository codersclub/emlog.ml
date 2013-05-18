<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class=containertitle><b><? echo $lang['nav_manage']; ?></b>
<?php if(isset($_GET['active_taxis'])):?><span class="actived"><? echo $lang['categories_ordered_ok']; ?></span><?php endif;?>
<?php if(isset($_GET['active_del'])):?><span class="actived"><? echo $lang['nav_del_ok']; ?></span><?php endif;?>
<?php if(isset($_GET['active_edit'])):?><span class="actived"><? echo $lang['nav_edit_ok']; ?></span><?php endif;?>
<?php if(isset($_GET['active_add'])):?><span class="actived"><? echo $lang['nav_add_ok']; ?></span><?php endif;?>
<?php if(isset($_GET['error_a'])):?><span class="error"><? echo $lang['nav_empty']; ?></span><?php endif;?>
<?php if(isset($_GET['error_b'])):?><span class="error"><? echo $lang['nav_no_category']; ?></span><?php endif;?>
<?php if(isset($_GET['error_c'])):?><span class="error"><? echo $lang['nav_not_del']; ?></span><?php endif;?>
<?php if(isset($_GET['error_d'])):?><span class="error"><? echo $lang['category_select']; ?></span><?php endif;?>
<?php if(isset($_GET['error_e'])):?><span class="error"><? echo $lang['page_select']; ?></span><?php endif;?>
<?php if(isset($_GET['error_f'])):?><span class="error">导航地址格式错误(需包含http等前缀)</span><?php endif;?>
</div>
<div class=line></div>
<form action="navbar.php?action=taxis" method="post">
  <table width="100%" id="adm_navi_list" class="item_list">
    <thead>
      <tr>
	  	<th width="50"><b><? echo $lang['order']; ?></b></th>
        <th width="230"><b><? echo $lang['navbar']; ?></b></th>
        <th width="80" class="tdcenter"><b><? echo $lang['status']; ?></b></th>
		<th width="80" class="tdcenter"><b><? echo $lang['view']; ?></b></th>
		<th width="400"><b><? echo $lang['url_redirect']; ?></b></th>
        <th width="100"></th>
      </tr>
    </thead>
    <tbody>
	<?php 
	if($navis):
	foreach($navis as $key=>$value):
	doAction('adm_navi_display');
	?>  
      <tr>
		<td><input class="num_input" name="navi[<?php echo $value['id']; ?>]" value="<?php echo $value['taxis']; ?>" maxlength="4" /></td>
		<td><a href="navbar.php?action=mod&amp;navid=<?php echo $value['id']; ?>" title="<? echo $lang['nav_edit']; ?>"><?php echo $value['naviname']; ?></a></td>
		<td class="tdcenter">
		<?php if ($value['hide'] == 'n'): ?>
		<a href="navbar.php?action=hide&amp;id=<?php echo $value['id']; ?>" title="<? echo $lang['nav_hide']; ?>"><? echo $lang['visible']; ?></a>
		<?php else: ?>
		<a href="navbar.php?action=show&amp;id=<?php echo $value['id']; ?>" title="<? echo $lang['nav_show']; ?>" style="color:red;"><? echo $lang['hide']; ?></a>
		<?php endif;?>
		</td>
		<td class="tdcenter">
	  	<a href="<?php echo $value['url']; ?>" target="_blank">
	  	<img src="./views/images/<?php echo $value['newtab'] == 'y' ? 'vlog.gif' : 'vlog2.gif';?>" align="absbottom" border="0" /></a>
	  	</td>
        <td><?php echo $value['url']; ?></td>
        <td>
        <a href="navbar.php?action=mod&amp;navid=<?php echo $value['id']; ?>">编辑</a>
        <?php if($value['isdefault'] == 'n'):?>
        <a href="javascript: em_confirm(<?php echo $value['id']; ?>, 'navi');" class="care"><? echo $lang['remove']; ?></a>
        <?php endif;?>
        </td>
      </tr>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="4"><? echo $lang['nav_no_yet']; ?></td></tr>
	<?php endif;?>
    </tbody>
  </table>
  <div class="list_footer"><input type="submit" value="<? echo $lang['update_sort_order']; ?>" class="button" /></div>
</form>
<div id="navi_add">
<form action="navbar.php?action=add" method="post" name="navi" id="navi">
<div>
	<h1 onclick="displayToggle('navi_add_custom', 2);"><? echo $lang['nav_add_custom']; ?>+</h1>
	<ul id="navi_add_custom">
	<li><input maxlength="4" style="width:30px;" name="taxis" /><? echo $lang['order']; ?></li>
	<li><input maxlength="200" style="width:100px;" name="naviname" /><? echo $lang['nav_name']; ?></li>
	<li>
	<input maxlength="200" style="width:175px;" name="url" id="url" /><? echo $lang['nav_url']; ?></li>
    <li><? echo $lang['open_new_window']; ?> <input type="checkbox" style="vertical-align:middle;" value="y" name="newtab" /></li>
	<li><input type="submit" name="" value="<? echo $lang['add']; ?>"  /></li>
	</ul>
</div>
</form>
<form action="navbar.php?action=add_sort" method="post" name="navi" id="navi">
<div>
	<h1 onclick="displayToggle('navi_add_sort', 2);"><? echo $lang['nav_add_category']; ?>+</h1>
	<ul id="navi_add_sort">
	<?php 
	if($sorts):
	foreach($sorts as $key=>$value): 
	?>
	<li>
        <input type="checkbox" style="vertical-align:middle;" name="sort_ids[]" value="<?php echo $value['sid']; ?>" class="ids" />
		<?php echo $value['sortname']; ?>
	</li>
	<?php endforeach;?>
	<li><input type="submit" name="" value="<? echo $lang['add']; ?>"  /></li>
	<?php else:?>
	<li><? echo $lang['category_no_yet']; ?>, <a href="sort.php">新建分类</a></li>
	<?php endif;?> 
	</ul>
</div>
</form>
<form action="navbar.php?action=add_page" method="post" name="navi" id="navi">
<div>
	<h1 onclick="displayToggle('navi_add_page', 2);"><? echo $lang['nav_page_add']; ?>+</h1>
	<ul id="navi_add_page">
	<?php 
	if($pages):
	foreach($pages as $key=>$value): 
	?>
	<li>
        <input type="checkbox" style="vertical-align:middle;" name="pages[<?php echo $value['gid']; ?>]" value="<?php echo $value['title']; ?>" class="ids" />
		<?php echo $value['title']; ?>
	</li>
	<?php endforeach;?>
	<li><input type="submit" name="" value="<? echo $lang['add']; ?>"  /></li>
	<?php else:?>
	<li><? echo $lang['no_pages_yet']; ?>, <a href="page.php">新建页面</a></li>
	<?php endif;?> 
	</ul>
</div>
</form>
</div>
<script>
$("#navi_add_custom").css('display', $.cookie('em_navi_add_custom') ? $.cookie('em_navi_add_custom') : '');
$("#navi_add_sort").css('display', $.cookie('em_navi_add_sort') ? $.cookie('em_navi_add_sort') : '');
$("#navi_add_page").css('display', $.cookie('em_navi_add_page') ? $.cookie('em_navi_add_page') : '');
$(document).ready(function(){
	$("#adm_navi_list tbody tr:odd").addClass("tralt_b");
	$("#adm_navi_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")})
});
setTimeout(hideActived,2600);
$("#menu_navbar").addClass('sidebarsubmenu1');
</script>