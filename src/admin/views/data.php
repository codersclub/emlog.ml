<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class=containertitle><b><? echo $lang['backup_database'];?></b>
<?php if(isset($_GET['active_del'])):?><span class="actived"><? echo $lang['backup_deleted_ok'];?></span><?php endif;?>
<?php if(isset($_GET['active_backup'])):?><span class="actived"><? echo $lang['backup_saved_ok'];?></span><?php endif;?>
<?php if(isset($_GET['active_import'])):?><span class="actived"><? echo $lang['backup_imported_ok'];?></span><?php endif;?>
<?php if(isset($_GET['error_a'])):?><span class="error"><? echo $lang['backup_select_file'];?></span><?php endif;?>
<?php if(isset($_GET['error_b'])):?><span class="error"><? echo $lang['backup_filename_invalid'];?></span><?php endif;?>
<?php if(isset($_GET['error_c'])):?><span class="error">服务器不支持zip，无法导入zip备份</span><?php endif;?>
<?php if(isset($_GET['error_d'])):?><span class="error">上传备份失败</span><?php endif;?>
<?php if(isset($_GET['error_e'])):?><span class="error">错误的备份文件</span><?php endif;?>
<?php if(isset($_GET['error_f'])):?><span class="error">服务器不支持zip，无法导出zip备份</span><?php endif;?>
</div>
<div class=line></div>
<form  method="post" action="data.php?action=dell_all_bak" name="form_bak" id="form_bak">
<table width="100%" id="adm_bakdata_list" class="item_list">
  <thead>
    <tr>
      <th width="683" colspan="2"><b><? echo $lang['backup_file']; ?></b></th>
      <th width="226"><b><? echo $lang['backup_time'];?></b></th>
      <th width="149"><b><? echo $lang['backup_size'];?></b></th>
      <th width="87"></th>
    </tr>
  </head>
  <tbody>
	<?php
		if($bakfiles):
		foreach($bakfiles  as $value):
		$modtime = smartDate(filemtime($value),'Y-m-d H:i:s');
		$size =  changeFileSize(filesize($value));
		$bakname = substr(strrchr($value,'/'),1);
	?>
    <tr>
      <td width="22"><input type="checkbox" value="<?php echo $value; ?>" name="bak[]" class="ids" /></td>
      <td width="661"><a href="../content/backup/<?php echo $bakname; ?>"><?php echo $bakname; ?></a></td>
      <td><?php echo $modtime; ?></td>
      <td><?php echo $size; ?></td>
      <td><a href="javascript: em_confirm('<?php echo $value; ?>', 'backup');"><? echo $lang['backup_import'];?></a></td>
    </tr>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="5"><? echo $lang['no_backups_yet']; ?></td></tr>
	<?php endif;?>
	</tbody>
</table>
<div class="list_footer">
<a href="javascript:void(0);" id="select_all"><? echo $lang['select all']; ?></a> <? echo $lang['with_selected_do']; ?>: <a href="javascript:bakact('del');" class="care"><? echo $lang['remove']; ?></a></div>
</form>
<div style="margin:20px 0px 20px 0px;"><a href="javascript:$('#import').hide();displayToggle('backup', 0);"><? echo $lang['backup_info'];?>+</a> <a href="javascript:$('#backup').hide();displayToggle('import', 0);"><? echo $lang['backup_local_file']; ?>+</a></div>
<form action="data.php?action=bakstart" method="post">
<div id="backup">
	<p><? echo $lang['backup_choose_database'];?>:<br /><select multiple="multiple" size="12" name="table_box[]">
		<?php foreach($tables  as $value): ?>
		<option value="<?php echo DB_PREFIX; ?><?php echo $value; ?>" selected="selected"><?php echo DB_PREFIX; ?><?php echo $value; ?></option>
		<?php endforeach; ?>
      	</select></p>
	<p>导出备份文件到：
	<select name="bakplace" id="bakplace">
		<option value="local" selected="selected">本地</option>
		<option value="server">服务器</option>
	</select>
	</p>
	<p id="local_bakzip">压缩(zip格式)：<input type="checkbox" style="vertical-align:middle;" value="y" name="zipbak" id="zipbak"></p>
	<p id="server_bakfname" style="display:none;">备份文件名：<input maxlength="200" size="35" value="<?php echo $defname; ?>" name="bakfname" /><b>.sql</b></p>
	<p><input type="submit" value="开始备份" class="button" /></p>
</div>
</form>
<form action="data.php?action=import" enctype="multipart/form-data" method="post">
<div id="import">
	<p><input type="file" name="sqlfile" /> <input type="submit" value="<? echo $lang['backup_import']; ?>" class="submit" /> (支持emlog导出的sql及zip格式备份)</p>
</div>
</form>
<div class=containertitle><b><? echo $lang['cache'];?></b>
<?php if(isset($_GET['active_mc'])):?><span class="actived"><? echo $lang['cache_updated_ok'];?></span><?php endif;?>
</div>
<div class=line></div>
<div style="margin:0px 0px 20px 0px;">
	<p class="des"><? echo $lang['cache_info'];?></p>
	<p><input type="button" onclick="window.location='data.php?action=Cache';" value="<? echo $lang['cache_rebuild'];?>" class="button" /></p>
</div>
<script>
setTimeout(hideActived,2600);
$(document).ready(function(){
	$("#select_all").toggle(function () {$(".ids").attr("checked", "checked");},function () {$(".ids").removeAttr("checked");});
	$("#adm_bakdata_list tbody tr:odd").addClass("tralt_b");
	$("#adm_bakdata_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")});
	$("#bakplace").change(function(){$("#server_bakfname").toggle();$("#local_bakzip").toggle();});
});
function bakact(act){
	if (getChecked('ids') == false) {
		alert('<? echo $lang['backup_select_file'];?>');
		return;
	}
	if(act == 'del' && !confirm('<? echo $lang['backup_delete_sure'];?>')){return;}
	$("#operate").val(act);
	$("#form_bak").submit();
}
$("#menu_data").addClass('sidebarsubmenu1');
</script>