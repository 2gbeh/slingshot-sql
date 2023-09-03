<?php
$TABLE = DEX_TABLE_CHURCH;	
$FORM_PAGE = 'Data-Search.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	//ARRANGE
	$_FILTER = _FILTER($_POST);
	$churchArray = JSP_FETCH_MERGER($TABLE,'church,province');
	$neddle = strtolower($_FILTER['k']);
	$haystack = JSP_DROP_CASE($churchArray);
	$church_rid = array_search($neddle,$haystack);
	if (!$church_rid)
	{
		$err = '!Record not found in database.';
		_CLEAR('keyword,keyid');
	}
	else
	{
		_SET('keyword,keyid',array($_FILTER['k'],$church_rid));
		JSP_KEYLOG_ADMIN('RETRIEVE');
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
	if ($_GET['BLN_ACTION_VIEW'])
	{
		JSP_KEYLOG_ADMIN('RETRIEVE');	
		_IREDIR($FORM_PAGE,'RFID',$_GET['BLN_ACTION_VIEW']);	
	}
	if (IS_RFID)
	{
		$JSP_FETCH_BYID = _BYID($TABLE,IS_RFID);
		if (_THROW($JSP_FETCH_BYID))
		{
			$keyword = $JSP_FETCH_BYID['church'].' - '.$JSP_FETCH_BYID['province'];
			$_POST['k'] = $keyword;
			_SET('keyword,keyid',array($keyword,IS_RFID));
		}
		else
			$err = '!'.$JSP_FETCH_BYID;
	}			
}

?>









