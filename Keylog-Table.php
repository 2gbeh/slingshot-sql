<?php
include_once('../Kernel.php');
include_once('Action/Shared/Global.php');
include_once('Action/Shared/Local.php');
include_once('Action/Server/Server-Keylog.php');
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
            <?php $pseudo_nav = 1; include_once('Action/Menu/Menu-Keylog.php'); ?>            

            <div class="page-content"> 
            <form <?php echo JSP_FORM_POST; ?> id="myForm">           
				<?php		
                    $th = array('page','type','account','date','time');
                    $predef = JSP_FETCH_IPREDEF($TABLE,'assoc_acct,id',0);
					$td = JSP_PAGI_SET($predef);
                    $td = JSP_KEYLOG_TRANS($td,'PAGE',0);			
                    $td = JSP_KEYLOG_TRANS($td,'TYPE',1);
					$td = JSP_KEYLOG_TRANS($td,'ADMIN',2);
					if (_THROW($predef))
					{
						echo _ERROR($err);						
						echo JSP_SPRY_SHOWING($td[0],$extra);						
		                echo JSP_DISPLAY_ITABLE($th,$td,'SELECT');
						echo JSP_PAGI_NAV($predef);						
					}
					else
						echo JSP_DISPLAY_ITABLE($th,$predef);	
                ?>
                <ul class="buttonWrap">
                    <li><input type='submit' class='' value='delete selected' onClick="BLN_DIALOGUE_SUBMIT('Deleted selected?','myForm')" /></li>
                </ul>                           
            </form>
            </div>
        </div>
    </li>
</ul>
    
</body>
</html>
<script type="text/javascript">
//alert(window.innerWidth);
</script>
