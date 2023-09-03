<?php
$TABLE = JSP_TABLE_ADMIN;
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{	
	$_FILTER = _FILTER($_POST);
	$entryArray = array($_FILTER['username'],$_FILTER['password']);
	$JSP_SSQL_SIGNIN = JSP_SSQL_SIGNIN($TABLE,'username,password',$entryArray);	
	if (!JSP_ERROR_CATCH($JSP_SSQL_SIGNIN))
	{
		if (_DISABLED($TABLE,$JSP_SSQL_SIGNIN))
			$err = JSP_ERROR_DISABLED;
		else
		{
			_DATELOG($TABLE,$JSP_SSQL_SIGNIN);
			_IPLOG(JSP_TABLE_TEAM,array('username',$_FILTER['username']));
			_SET('CAA',$JSP_SSQL_SIGNIN);
			_CLEAR(array('CAT',JSPER));
			JSP_KEYLOG_ADMIN('LOGIN');
//			if (IS_HISTORY_ADMIN)
//				_IREDIR(_HISTORY_ADMIN);
//			else
				_IREDIR(SLI_PAGE_LANDING);
		}
	}
	else if ($JSP_SSQL_SIGNIN == JSPON)
		$err = '!User ID not found.';
	else if ($JSP_SSQL_SIGNIN == JSPIL)
		$err = '!Password does not match.';	
	else
		$err = '!'.$JSP_SSQL_SIGNIN;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
	if (IS_TEMP && !$_GET['BLN_FORMS_FOOBAR'])
	{
		$row = _BYID(JSP_TABLE_ADMIN,_TEMP);
		if ($row['control'] == 2)
			$src = '../../Media/Icon/Logo-Lbs.png';		
		else
			$src = '../../Media/Icon/Logo.png';
		$JSP_SPRY_PROFILE = JSP_SPRY_PROFILE($src,'100px','CIRCLE');
		$_POST['username'] = $row['username']; 
	}
}
?>











