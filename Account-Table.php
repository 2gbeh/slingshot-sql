<?php
include_once('../Kernel.php');
include_once('Action/Shared/Global.php');
include_once('Action/Shared/Local.php');
include_once('Action/Server/Server-Account.php');
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
		<?php include_once('Action/Shared/Menu.php');  ?>        	
    </li>
    
    <li class="right-pane">
	    <div class="STEM_OVERFLOW">
            <?php $pseudo_nav = 1; include_once('Action/Menu/Menu-Account.php'); ?>
            <div class="page-content"> 
				<?php		
                    $th = array('email address','username','password','control module','status','date','time','ID');
                    $predef = JSP_FETCH_PREDEF($TABLE,'*',1);
					$td = JSP_PAGI_SET($predef);
                    $td = JSP_TRANS_GLOB($td,'control',3);
                    $td = JSP_TRANS_GLOB($td,'istatus',4);	
					if (_THROW($predef))
					{
						echo _ERROR($err);						
						echo JSP_SPRY_SHOWING($td[0],$extra);						
		                echo JSP_DISPLAY_ITABLE($th,$td);
						echo JSP_PAGI_NAV($predef);						
					}
					else
						echo JSP_DISPLAY_ITABLE($th,$predef);	
                ?>
            </div>
        </div>
    </li>
</ul>
    
</body>
</html>
<script type="text/javascript">
//alert(window.innerWidth);
</script>
