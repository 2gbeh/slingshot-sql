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
				//ADMIN
				$TABLE = JSP_TABLE_ADMIN;				
				$row = $swiss[$TABLE];
				$adminArray = array
				(
					'Admin',
					$row['TOTAL'],
					'Last known login',
					ucwords($row['RECENT']['username']).'<br/>'.
					_MKTELLER($row['RECENT']['date']).' at '.
					_MKTELLER($row['RECENT']['time'])
				);
				//PASTOR
				$TABLE = DEX_TABLE_STAFF_PASTOR;
				$row = $swiss[$TABLE];
				$pastorArray = array
				(
					'Pastor',
					$row['TOTAL'],
					'Most recent',
					$row['LAST']['birthname'].'<br/>'.
					$row['LAST']['phone']
				);
				//DEMOGRAPHY
				$total = JSP_FETCH_NUMROWS($TABLE);				
				$male = JSP_FETCH_PRENUM($TABLE,'gender','0');
				$female = JSP_FETCH_PRENUM($TABLE,'gender','1');
				$malePerc = JSP_PERCOF($total,$male);
				$femalePerc = JSP_PERCOF($total,$female);				
				$genderArray = array
				(
					'Statistics',
					'M '.$male.' : '.$female.' F',
					'Gender demography',
					$malePerc.' Male Pastors <br/>'.
					$femalePerc.' Female Pastors'
				);
				//GRADE
				$parseArray = DEX_ENUMS_SWISS('GRADE');
				foreach ($parseArray as $key => $value)
				{
					$count = JSP_FETCH_PRENUM($TABLE,'grade',$key);
					$paramArray = array(ucwords($value),$count,'Total');
					$gradeArray .= JSP_WIDGETS_DISPLAY($paramArray);
				}
				//TOTALED
				$parseArray = _CSV('branch,district,province,bishopric');
				foreach ($parseArray as $field)
				{
					$array = JSP_FETCH_BYCOL($TABLE,$field);
					$unique = JSP_SORT_UNIQUE($array);
					if (_THROW($unique))
						$count = count($unique);
					else
						$count = 0;
					$paramArray = array(ucwords($field),$count,'Total');
					$totaledArray .= JSP_WIDGETS_DISPLAY($paramArray);
					
				}
				echo "<ul class='JSP_WIDGETS_DISPLAY'>";
					echo JSP_WIDGETS_DISPLAY($adminArray);				
					echo JSP_WIDGETS_DISPLAY($pastorArray);
					echo JSP_WIDGETS_DISPLAY($genderArray);
					echo $gradeArray;					
					echo $totaledArray;
				echo "</ul>";
            ?>                
			</div>                
        </div>
    </li>
</ul>
    
</body>
</html>
