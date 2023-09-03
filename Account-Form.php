<?php
include_once('../Kernel.php');
include_once('Action/Shared/Global.php');
include_once('Action/Shared/Local.php');
include_once('Action/Server/Server-Account.php');
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
            <?php $pseudo_nav = 2; include_once('Action/Menu/Menu-Account.php'); ?>
            <div class="page-content">     
                                   
            <form <?php echo JSP_FORM_POST; ?>>
				<?php echo _ERROR($err); ?>
                <label for="email">email address</label>
                <?PHP echo _TEXTBOX('email'); ?> 

                <label for="username">username</label>
                <?PHP echo _TEXTBOX('username'); ?>

                <label for="password">password <?php echo JSP_SPRY_PASSWORD(); ?></label>
                <?PHP echo _TEXTBOX('password'); ?>

                <label for="control">control module</label>
                <?php echo _SELECT('control'); ?>

                <label for="status">account status</label>
                <?php echo _SELECT('status'); ?>

                <?php echo JSP_FORMS_POSTBACK($_POST['id'],'create','update'); ?>
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
