<?php
include_once('../Kernel.php');
include_once('Action/Shared/Global.php');
include_once('Action/Shared/Local.php');
include_once('Action/Server/Server-Staff-Pastor.php');
var_dump
(

);
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
		<?php $pseudo_menu = 3; include_once('Action/Shared/Menu.php');  ?>
    </li>
    <li class="right-pane">
	    <div class="STEM_OVERFLOW">
			<div class="page-title">Register Pastor</div>
            <div class="page-content">    
                <form <?php echo JSP_FORM_POST; ?>>
                    <?php					
						echo _ERROR($err);
						echo _FORMS
						(
							"full name,select gender,date of birth,marital status,email address,phone number",
							"birthname,gender,date_birth,mar_status,email,phone"
						); 						
						echo _LABEL('Select Grade','grade');
						echo _SELECT('grade',DEX_ENUMS_SWISS('GRADE'));
						echo _FORMS
						(
							"date of employment,date of ordination,ID number,pension ID",
							"date_hired,date_ordained,id_number,id_pension"
						);
						echo _LABEL('branch','branch');
						echo _DATALIST(array($TABLE,'branch','branch'));
						echo _LABEL('district','district');
						echo _DATALIST(array($TABLE,'district','district'));	   
						echo _LABEL('province','province');
						echo _DATALIST(array($TABLE,'province','province'));
						echo _LABEL('bishopric','bishopric');
						echo _DATALIST(array($TABLE,'bishopric','bishopric'));
						echo JSP_FORMS_POSTBACK($_POST['id'],'Create','Update');
                    ?>                
                </form>
            </div>
        </div>
    </li>
</ul>
<script type="text/javascript">
//alert(window.innerWidth);
</script>    
</body>
</html>

