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
		<?php $data_pseudo_menu = 3; include_once('Action/Shared/Menu.php');  ?>
    </li>
    
    <li class="right-pane">
	    <div class="STEM_OVERFLOW">
			<div class="page-title">all database records</div>
            <div class="page-content">
				<?php
					$TABLE = DEX_TABLE_CHURCH;
                    $th = 'church name,province,pastors,tithes,first fruits,annual thanksgiving,payment teller,created by,date,time';
                    $predef = JSP_FETCH_PREDEF($TABLE,'id',0);
                    $predef = JSP_TRANS_ASSOC_COUNT($predef,array(DEX_TABLE_PASTOR,'church_rid',array_keys($predef[0])),3);
                    $predef = JSP_TRANS_ASSOC_SUM($predef,array(DEX_TABLE_TITHE,'church_rid',array_keys($predef[0])),'amount',4);
                    $predef = JSP_TRANS_ASSOC_SUM($predef,array(DEX_TABLE_FRUIT,'church_rid',array_keys($predef[0])),'amount',5);
                    $predef = JSP_TRANS_ASSOC_SUM($predef,array(DEX_TABLE_ANNUAL,'church_rid',array_keys($predef[0])),'amount',6);
                    $predef = JSP_TRANS_ASSOC_SUM($predef,array(DEX_TABLE_TELLER,'church_rid',array_keys($predef[0])),'amount',7);
                    $td = JSP_PAGI_SET($predef);
					$td = JSP_TRANS_DENOM($td,'3,4,5,6');
					$td = JSP_TRANS_RID($td,JSP_TABLE_ADMIN,'username',7);					
					if (_THROW($predef))
					{
						echo _ERROR($err);						
						echo JSP_SPRY_SHOWING($td[0],$extra);						
		                echo JSP_DISPLAY_ITABLE($th,$td,'VIEW');
						echo JSP_PAGI_NAV($predef);						
					}
					else
						echo JSP_DISPLAY_TABLE($predef,$th);
    	        ?>    
            </div>            
        </div>
    </li>
</ul>
    
</body>
</html>
