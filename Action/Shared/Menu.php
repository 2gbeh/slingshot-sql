<div class="badge">
<?php 
	if ($_ADMIN['control'] == 2)
		$image = '../../Media/Icon/Logo-Lbs.png';
	else
		$image = '../../Media/Icon/Logo.png';
	$badgeBase = $_ADMIN['email'];
	$badgeBase .= JSP_SPRY_DOCKET('CAA',SLI_PAGE_LOGIN,JSP_TABLE_ADMIN,'username','../../Media/Image/Profile/','#');
	echo JSP_SPRY_BADGE($image,$_ADMIN['username'],$badgeBase,'#');  	
?>  
</div>        	
<dl class="menu">
    <?php
		if (IS_PRI_ADMIN)
		{	
				echo '<dt>featured</dt>';	
				echo JSP_DISPLAY_IDLIST
				(
					'dashboard,search &amp; chart,all records',
					'Dashboard.php,Data-Search.php,Data-All.php',
					$data_pseudo_menu
				);
				echo '<dt>manage</dt>';
				echo JSP_DISPLAY_IDLIST
				(
					'churches,pastors,tithes,first fruits,thanksgiving,payment teller',
					'Church-Table.php,Pastor-Table.php,Tithe-Table.php,Fruit-Table.php,Annual-Table.php,Teller-Table.php',
					$pseudo_menu
				);
		}
		
		if (IS_SEC_ADMIN)
		{	
				echo '<dt>manage</dt>';
				echo JSP_DISPLAY_IDLIST
				(
					'dashboard,search database,register pastor,view records',
					'Staff-Dashboard.php,Staff-Search.php,Staff-Pastor-Form.php,Staff-Pastor-Table.php',
					$pseudo_menu
				);
		}
		
	?>    
    <dt>settings</dt>
        <dd><a href="<?php echo $keylog_link; ?>">activity log</a></dd>    
        <dd><a href="<?php echo $admin_link; ?>">admin account</a></dd>
        <dd><a href="<?php echo SLI_PAGE_WEBSITE; ?>" target="_blank">visit website</a></dd>                
        <dd><a onclick="<?php echo CORE_LOGOUT_ADMIN(); ?>">logout</a></dd>
</dl>
<div class="package">
	<?php echo JSP_CHART_PACKAGE(SLI_PACKAGE); ?>
</div>
<div class="impressum">
	&copy; 2011 <b>Dexter</b>&trade; HWP Labs.
</div>