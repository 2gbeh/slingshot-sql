<?php
include_once('../Kernel.php');
include_once('Action/Shared/Global.php');
include_once('Action/Shared/Local.php');
include_once('Action/Server/Server-Pastor.php');
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
		<?php $pseudo_menu = 2; include_once('Action/Shared/Menu.php');  ?>
    </li>
    
    <li class="right-pane">
	    <div class="STEM_OVERFLOW">
            <?php $pseudo_nav = 2; include_once('Action/Menu/Menu-Pastor.php'); ?>
            <div class="page-content">
                
                <form <?php echo JSP_FORM_POST; ?>>
                    <?php					
						echo _ERROR($err);
						$array = JSP_FETCH_MERGER(DEX_TABLE_CHURCH,'church,province');
						echo _LABEL('Select Church','church_rid');
						echo _SELECT('church_rid',$array);
                        echo _FORMS
                        (
                            "Pastor's name,phone number",
                            'fullname,phone'
                        ); 						
						echo _LABEL('Select Grade','grade');
						echo _SELECT('grade',DEX_ENUMS_SWISS('GRADE'));
                		echo JSP_FORMS_POSTBACK($_POST['id'],'Create','Update');
                    ?>                
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
