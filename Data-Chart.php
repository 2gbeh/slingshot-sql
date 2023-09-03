<?php
include_once('../Kernel.php');
include_once('Action/Shared/Global.php');
include_once('Action/Shared/Local.php');
include_once('Action/Server/Server-Data.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<?php 
include_once('Action/Shared/Head.php');	
include_once('../JRAD/Library-Blend.php'); 
include_once('Action/Shared/Media-Query.php');		
?>
</head>
<body onLoad="BLN_ONLOAD(); BLN_DJANGO()" id="top" status="on">
<?php include_once('Action/Shared/Header.php');  ?>

<ul class="main-container">
    <li class="left-pane JSP_SPRY_DRAWER_TARGET">    
		<?php $data_pseudo_menu = 2; include_once('Action/Shared/Menu.php');  ?>
    </li>
    
    <li class="right-pane">
	    <div class="STEM_OVERFLOW">
			<div class="page-title">view chart builder</div>        
            <?php $pseudo_nav = 2; include_once('Action/Menu/Menu-Data.php'); ?>
            
            <div class="page-content">
			<?php
				echo _ERROR(JSP_ERROR_SERVICE);
            ?>                
			</div>                
        </div>
    </li>
</ul>
    
</body>
</html>
