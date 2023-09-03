<?php
include_once('../Kernel.php');
include_once('Action/Shared/Global.php');
include_once('Action/Shared/Local.php');
include_once('Action/Server/Server-Teller.php');
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
		<?php $pseudo_menu = 6; include_once('Action/Shared/Menu.php');  ?>
    </li>
    
    <li class="right-pane">
	    <div class="STEM_OVERFLOW">
            <?php $pseudo_nav = 2; include_once('Action/Menu/Menu-Teller.php'); ?>
            <div class="page-content">
                
                <form <?php echo JSP_FORM_FILE; ?>>
                    <?php					
						echo _ERROR($err);
						$array = JSP_FETCH_MERGER(DEX_TABLE_CHURCH,'church,province');
						echo _LABEL('Select Church','church_rid');
						echo _SELECT('church_rid',$array);
                        echo _FORMS
                        (
                            "select bank,amount (Example: 150000),description of payment,teller number,date of payment",
                            'bank,amount,summary,teller_no,date_payment'
                        );
						if (!IS_POSTBACK())
						{
							echo _LABEL('Upload Teller','teller_img');
							echo JSP_FORMS_FILE('teller_img');
						}
						echo '<p></p>';
                		echo JSP_FORMS_POSTBACK($_POST['id'],'Save','Update');
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
