<?php
CORE_CONTROL_ADMIN(SLI_PAGE_LANDING); 

//ACTIVE TABLE
$TABLE = JSP_TABLE_KEYLOG;

if ($_POST['ITABLE_SELECT_VALUE'])	
{
	foreach ($_POST['ITABLE_SELECT_VALUE'] as $id)
		_DELETE($TABLE,$id);
	JSP_KEYLOG_ADMIN('DELETE');
	$err = 'Records deleted successfully.';
}


?>