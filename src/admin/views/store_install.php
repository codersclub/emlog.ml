<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class=containertitle>
<b><? echo $lang['install']; ?> <?php echo $source_typename;?></b>
<div class=line></div>
<div id="addon_ins"><span id="addonload"><?php echo $source_typename;?><? echo $lang['download_install']; ?></span></div>
</div>
<script>
$("#menu_store").addClass('sidebarsubmenu1');
$(document).ready(function(){
    $.get('./store.php', {action:'addon', source:"<?php echo $source;?>", type:"<?php echo $source_type;?>" },
      function(data){
        if (data == 'succ') {
            $("#addon_ins").html('<span id="addonsucc"><?php echo $source_typename;?><? echo $lang['install_ok']; ?>, <?php echo $source_typeurl;?></span>');
        } else if(data == 'error_get'){
            $("#addon_ins").html('<span id="addonerror"><?php echo $source_typename;?><? echo $lang['download_error_manually']; ?> <a href="store.php"><? echo $lang['back_to_appcenter']; ?></a></span>');
        } else if(data == 'error_zip'){
            $("#addon_ins").html('<span id="addonerror"><?php echo $source_typename;?><? echo $lang['decompression_error']; ?><a href="store.php"><? echo $lang['back_to_appcenter']; ?></a></span>');
        } else{
            $("#addon_ins").html('<span id="addonerror"><?php echo $source_typename;?><? echo $lang['install_error']; ?><a href="store.php"><? echo $lang['back_to_appcenter']; ?></a></span>');
        }
      });
})
</script>