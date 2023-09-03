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
			<div class="page-title">search database records</div>
            <?php $pseudo_nav = 1; include_once('Action/Menu/Menu-Data.php'); ?>            

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
							placeholder="Type the name of the Church and press the Enter key" 
							required" 
						/>';
						echo JSP_SSQL_DATALIST($TABLE,'church,province','sourcelist');
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
						$whereArray = array('church_rid','==',$i);
					
						echo JSP_SPRY_SHOWING($showing); 
						//CHURCH
						$TABLE = DEX_TABLE_CHURCH;
						$th = 'church name,province,created by,date,time';
						$predef = JSP_FETCH_PRELOG($TABLE,'id',0,array('PRIKEY','==',$i));
						$td = JSP_TRANS_RID($predef,JSP_TABLE_ADMIN,'username',2);
						echo '<b>Church</b>';
						echo JSP_DISPLAY_TABLE($td,$th);
						//PASTOR
						$TABLE = DEX_TABLE_PASTOR;
						$th = "pastor's name,phone number,grade,created by,date,time";
						$predef = JSP_FETCH_PRELOG($TABLE,'church_rid,id',0,$whereArray);					
						$td = JSP_PAGI_SET($predef,'JSP_PAGI_PASTOR');
						$td = JSP_TRANS_PREDEF($td,DEX_ENUMS_SWISS('GRADE'),2);					
						$td = JSP_TRANS_RID($td,JSP_TABLE_ADMIN,'username',3);
						echo '<b>Pastors</b>';			
						echo JSP_DISPLAY_TABLE($td,$th,'JSP_PAGI_PASTOR');
						echo JSP_PAGI_NAV($predef,'JSP_PAGI_PASTOR');		
						//TITHE
						$TABLE = DEX_TABLE_TITHE;
						$th = "month,year,amount (N),created by,date,time";
						$predef = JSP_FETCH_PRELOG($TABLE,'church_rid,id',0,$whereArray);
						$td = JSP_PAGI_SET($predef,'JSP_PAGI_TITHE');
						$td = JSP_TRANS_PREDEF($td,JSP_ENUMS_DATE('MONTH'),0);
						$td = JSP_TRANS_PREDEF($td,JSP_ENUMS_DATE('YEAR'),1);						
						$td = JSP_TRANS_DENOM($td,2);
						$td = JSP_TRANS_RID($td,JSP_TABLE_ADMIN,'username',3);					
						echo '<b>Tithes</b> <a class="anchor" href="Data-Chart.php#tithe">View Chart</a>';	
						echo JSP_DISPLAY_TABLE($td,$th,'JSP_PAGI_TITHE');
						echo JSP_PAGI_NAV($predef,'JSP_PAGI_TITHE');
						//FRUIT
						$TABLE = DEX_TABLE_FRUIT;	
						$th = "month,year,amount (N),created by,date,time";
						$predef = JSP_FETCH_PRELOG($TABLE,'church_rid,id',0,$whereArray);
						$td = JSP_PAGI_SET($predef,'JSP_PAGI_FRUIT');
						$td = JSP_TRANS_PREDEF($td,JSP_ENUMS_DATE('MONTH'),0);
						$td = JSP_TRANS_PREDEF($td,JSP_ENUMS_DATE('YEAR'),1);
						$td = JSP_TRANS_DENOM($td,2);
						$td = JSP_TRANS_RID($td,JSP_TABLE_ADMIN,'username',3);					
						echo '<b>First Fruits</b> <a class="anchor" href="Data-Chart.php#fruit">View Chart</a>';	
						echo JSP_DISPLAY_TABLE($td,$th,'JSP_PAGI_FRUIT');
						echo JSP_PAGI_NAV($predef,'JSP_PAGI_FRUIT');	
						//ANNUAL
						$TABLE = DEX_TABLE_ANNUAL;	
						$th = "year,amount (N),created by,date,time";
						$predef = JSP_FETCH_PRELOG($TABLE,'church_rid,id',0,$whereArray);
						$td = JSP_PAGI_SET($predef,'JSP_PAGI_ANNUAL');
						$td = JSP_TRANS_PREDEF($td,JSP_ENUMS_DATE('YEAR'),0);
						$td = JSP_TRANS_DENOM($td,1);
						$td = JSP_TRANS_RID($td,JSP_TABLE_ADMIN,'username',2);
						echo '<b>Annual Thanksgiving</b> <a class="anchor" href="Data-Chart.php#annual">View Chart</a>';	
						echo JSP_DISPLAY_TABLE($td,$th,'JSP_PAGI_ANNUAL');
						echo JSP_PAGI_NAV($predef,'JSP_PAGI_ANNUAL');
						// TELLER
						$TABLE = DEX_TABLE_TELLER;	
						$BASE = 'Media/Uploads/Teller/';
						$th = "bank,amount (N),teller number,date of payment,receipt,created by,date,time";
						$predef = JSP_FETCH_PRELOG($TABLE,'church_rid,summary,id',0,$whereArray);
						$td = JSP_PAGI_SET($predef,'JSP_PAGI_ANNUAL');
						$td = JSP_TRANS_PREDEF($td,JSP_ENUMS_GENERIC('BANK'),0);
						$td = JSP_TRANS_DENOM($td,1);
						$td = JSP_TRANS_IMG($td,$BASE,4);
						$td = JSP_TRANS_RID($td,JSP_TABLE_ADMIN,'username',5);
						echo '<b>Payment Teller</b> <a class="anchor" href="Data-Chart.php#teller">View Chart</a>';	
						echo JSP_DISPLAY_TABLE($td,$th,'JSP_PAGI_TELLER');
						echo JSP_PAGI_NAV($predef,'JSP_PAGI_TELLER');
					}
				?>
			</div>                
        </div>
    </li>
</ul>
    
</body>
</html>
