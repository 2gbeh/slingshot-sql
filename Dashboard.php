<?php
include_once('../Kernel.php');
include_once('Action/Shared/Global.php');
include_once('Action/Shared/Local.php');
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
		<?php $data_pseudo_menu = 1; include_once('Action/Shared/Menu.php');  ?>
    </li>
    
    <li class="right-pane">
	    <div class="">
			<div class="page-title">dashboard</div>
            
            <div class="page-content">
			<?php
				$swiss = JSP_WIDGETS_SWISS();
				//CHURCH
				$row = $swiss[DEX_TABLE_CHURCH];
				$churchArray = array
				(
					'churches',
					$row['TOTAL'],
					'Last entry :',
					$row['LAST']['church'].'<br/>'.
					$row['LAST']['province']
				);
				//PASTOR
				$row = $swiss[DEX_TABLE_PASTOR];
				$pastorArray = array
				(
					'pastors',$row['TOTAL'],
					'Last entry :',
					$row['LAST']['fullname'].'<br/>'.
					$row['LAST']['phone']
				);
				//TITHE
				$row = $swiss[DEX_TABLE_TITHE];
				$titheArray = array
				(
					'tithes',
					$row['TOTAL'],
					'Gross :',
					_RICHDENOM($row['SUM']['amount'])
				);
				//FRUIT
				$row = $swiss[DEX_TABLE_FRUIT];
				$fruitArray = array
				(
					'first fruits',
					$row['TOTAL'],
					'Gross :',
					_RICHDENOM($row['SUM']['amount'])
				);
				//ANNUAL
				$row = $swiss[DEX_TABLE_ANNUAL];
				$annualArray = array
				(
					'annual thanksgiving',
					$row['TOTAL'],
					'Gross :',
					_RICHDENOM($row['SUM']['amount'])
				);
				//TELLER
				$row = $swiss[DEX_TABLE_TELLER];
				$tellerArray = array
				(
					'payment teller',
					$row['TOTAL'],
					'Gross :',
					_RICHDENOM($row['SUM']['amount'])
				);				
				//ADMIN
				$row = $swiss[JSP_TABLE_ADMIN];
				$adminArray = array
				(
					'admin account',
					$row['TOTAL'],
					'Recent Login :',
					ucwords($row['RECENT']['username']).'<br/>'.
					_MKTELLER($row['RECENT']['date']).' at '.
					_MKTELLER($row['RECENT']['time'])
				);
				echo "<ul class='JSP_WIDGETS_DISPLAY'>";
					echo JSP_WIDGETS_DISPLAY($adminArray);				
					echo JSP_WIDGETS_DISPLAY($churchArray);
					echo JSP_WIDGETS_DISPLAY($pastorArray);
					echo JSP_WIDGETS_DISPLAY($titheArray);
					echo JSP_WIDGETS_DISPLAY($fruitArray);
					echo JSP_WIDGETS_DISPLAY($annualArray);
					echo JSP_WIDGETS_DISPLAY($tellerArray);					
				echo "</ul>";
            ?>                
			</div>                
        </div>
    </li>
</ul>
    
</body>
</html>
