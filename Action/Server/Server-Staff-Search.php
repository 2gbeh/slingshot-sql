<?php
$TABLE = DEX_TABLE_STAFF_PASTOR;	
$FORM_PAGE = 'Staff-Pastor-Form.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	//ARRANGE
	$_FILTER = _FILTER($_POST);
	$pastorArray = JSP_FETCH_BYCOL($TABLE,'birthname');
	$neddle = strtolower($_FILTER['k']);
	$haystack = JSP_DROP_CASE($pastorArray);
	$pastor_rid = array_search($neddle,$haystack);
	if (!$pastor_rid)
	{
		$err = '!Record not found in database.';
		_CLEAR('keyword,keyid');
	}
	else
	{
		_SET('keyword,keyid',array($_FILTER['k'],$pastor_rid));
		JSP_KEYLOG_ADMIN('RETRIEVE');
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
	if ($_GET['BLN_ACTION_EDIT'])
	{
		JSP_KEYLOG_ADMIN('RETRIEVE');	
		_IREDIR($FORM_PAGE,'RFID',$_GET['BLN_ACTION_EDIT']);
	}
	if ($_GET['BLN_ACTION_DELETE'])
	{
		$JSP_CRUD_DELETE = _DELETE($TABLE,$_GET['BLN_ACTION_DELETE']);
		if ($JSP_CRUD_DELETE == 1)
		{
			JSP_KEYLOG_ADMIN('DELETE');
			$err = 'Record deleted successfully';
		}
		else
			$err = '!'.$JSP_CRUD_DELETE;	
	}			
}

?>









