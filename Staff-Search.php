<?php
include_once('../Kernel.php');
include_once('Action/Shared/Global.php');
include_once('Action/Shared/Local.php');
include_once('Action/Server/Server-Staff-Search.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<?php 
include_once('Action/Shared/Head.php');	
include_once('../JRAD/Library-Blend.php'); 
include_once('Action/Shared/Media-Query.php');		
?>
<style type="text/css">
.th,
table.BLN_DISPLAY_TABLE th {
	background-color:#0093dd;
	color:#fff;
	border:solid thin #75C5F0;}
</style>
</head>
<body onLoad="BLN_ONLOAD(); BLN_DJANGO()" id="top" status="on">
<?php include_once('Action/Shared/Header.php');  ?>

<ul class="main-container">
    <li class="left-pane JSP_SPRY_DRAWER_TARGET">    
		<?php $data_pseudo_menu = 2; include_once('Action/Shared/Menu.php');  ?>
    </li>
    
    <li class="right-pane">
	    <div class="STEM_OVERFLOW">
			<div class="page-title">Search Database</div>
            <div class="page-content">
                <form <?php echo JSP_FORM_POST; ?>>
                    <?php
						echo _ERROR($err);					
						echo '<input 
							type="text" 
							class="JSP_FORMS_TEXTBOX" 
							id="k" 
							list="sourcelist" 
							name="k" 
							value="'.$_POST['k'].'" 
							placeholder="Type the name of the Pastor and press the Enter key" 
							required" 
						/>';
						echo JSP_SSQL_DATALIST($TABLE,'birthname','sourcelist');
                		echo _S_BUTTON('Enter key');
                    ?>                
                </form>
                <p></p>
				<?php 
					if (_ISSET(array($_SESSION['keyword'],$_SESSION['keyid'])))
					{
						$k = $_SESSION['keyword'];	
						$i = $_SESSION['keyid'];
						$showing = 'Showing results of: <b>'.strtoupper($k).'</b>';
						$whereArray = array('id','==',$i);
					
						echo JSP_SPRY_SHOWING($showing); 
						$th = "full name,gender,date of birth,age,marital status,email address,
						phone number,grade,date of employment,date of ordination,ID number,
						pension ID,branch,distict,province,bishopric,created by,date,time";
						$predef = JSP_FETCH_PRELOG($TABLE,'id',0,$whereArray);
						$td = JSP_TRANS_ASSOC_AGE($predef,$predef[2],4);
						$td = _TRANS($td,'GENDER',1);
						$td = JSP_TRANS_DATE($td,'PRESET','2,8,9');					
						$td = _TRANS($td,'MAR_STATUS',4);
						$td = JSP_TITLE_CASE(JSP_TRANS_PREDEF($td,DEX_ENUMS_SWISS('GRADE'),7));
						$td = JSP_TRANS_RID($td,JSP_TABLE_ADMIN,'username',16);						
						echo JSP_DISPLAY_TAROT($th,$td);
						echo _Z_BUTTON($i);
					}
				?>
			</div>                
        </div>
    </li>
</ul>
    
</body>
</html>
