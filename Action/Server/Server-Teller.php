<?php
//TABLE
$TABLE = DEX_TABLE_TELLER;
$FORM_PAGE = 'Teller-Form.php';
$ROOT = JSP_PAGE_ROOT."Bin/SlingshotSQL/";
$BASE = 'Media/Uploads/Teller/';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	//ARRANGE
	$_FILTER = _FILTER($_POST);
	$_FILE = $_FILES['teller_img'];
	//CHECKS
	$errorTray = _DUPLICATE($TABLE,'church_rid,teller_no',$_FILTER);
	
	if ($errorTray)
		$err = '!'.$errorTray;
	else
	{
		if (!IS_POSTBACK()) //CREATE
		{
			$JSP_CRUD = JSP_FILE_UPLOAD($_FILE,$ROOT.$BASE);
			if ($JSP_CRUD == 1)
			{
				$_FILTER['teller_img'] = $_FILE['name'];
				JSP_CRUD_CREATE($TABLE,$_FILTER);
				JSP_KEYLOG_ADMIN('CREATE');
				$status = 'Record created successfully';
			}
		}
		else //UPDATE
		{
			$JSP_CRUD = _UPDATE_BUT($TABLE,'teller_img',$_FILTER,IS_POSTBACK());
			if ($JSP_CRUD == 1)
			{
				JSP_KEYLOG_ADMIN('UPDATE');				
				$status = 'Record updated successfully';
			}
		}		
		
		if ($JSP_CRUD == 1)
			$err = $status;
		else
			$err = '!'.$JSP_CRUD;					
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
		$row = JSP_FETCH_BYID($TABLE,$_GET['BLN_ACTION_DELETE']);		
		$JSP_CRUD_DELETE = _DELETE($TABLE,$_GET['BLN_ACTION_DELETE']);
		if ($JSP_CRUD_DELETE == 1)
		{
			$filename = $row['teller_img'];
			$target = $ROOT.$BASE.$filename;
			JSP_FILE_DELETE($target);
			JSP_KEYLOG_ADMIN('DELETE');
			$err = 'Record deleted successfully';
		}
		else
			$err = '!'.$JSP_CRUD_DELETE;	
	}
	if (IS_RFID)
	{
		$JSP_FETCH_BYID = JSP_FETCH_BYID($TABLE,IS_RFID);
		if (_THROW($JSP_FETCH_BYID))
			$_POST = $JSP_FETCH_BYID;			
		else
			$err = '!'.$JSP_FETCH_BYID;
	}		
}
?>