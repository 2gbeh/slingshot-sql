<?php
include_once('../Kernel.php');
include_once('Action/Shared/Global.php');
include_once('Action/Shared/Local.php');
include_once('Action/Server/Server-Staff-Pastor.php');
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
		<?php $pseudo_menu = 4; include_once('Action/Shared/Menu.php');  ?>
    </li>
    <li class="right-pane">
	    <div class="STEM_OVERFLOW">
			<div class="page-title">View Records</div>
            <div class="page-content">
				<?php				
                    $th = "full name,gender,date of birth,age,marital status,email address,
					phone number,grade,date of employment,date of ordination,ID number,
					pension ID,branch,distict,province,bishopric,created by,date,time";
                    $predef = JSP_FETCH_IPREDEF($TABLE,'id',0);
					$predef = JSP_TRANS_ASSOC_AGE($predef,$predef[2],4);
//					var_dump($predef);
//					return 1;
                    $td = JSP_PAGI_SET($predef);
					$td = _TRANS($td,'GENDER',1);
					$td = JSP_TRANS_DATE($td,'PRESET','2,8,9');					
					$td = _TRANS($td,'MAR_STATUS',4);
					$td = JSP_TRANS_PREDEF($td,DEX_ENUMS_SWISS('GRADE'),7);
					$td = JSP_TRANS_RID($td,JSP_TABLE_ADMIN,'username',16);
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
<script type="text/javascript">
//alert(window.innerWidth);
</script>    
</body>
</html>

