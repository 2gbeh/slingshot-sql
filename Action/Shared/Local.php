<?php
//APPSTATE
CORE_ACCESS_ADMIN();

//MENU
if (IS_PRI_ADMIN || IS_SEC_ADMIN)
{
	$keylog_link = '#';		
	$admin_link = '#';
}
else
{
	$keylog_link = 'Keylog-Table.php';		
	$admin_link = 'Account-Table.php';	
}		

//RESOURCES
define('DEX_TABLE_ANNUAL','annual_tb');
define('DEX_TABLE_CHURCH','church_tb');
define('DEX_TABLE_FRUIT','fruit_tb');
define('DEX_TABLE_PASTOR','pastor_tb');
define('DEX_TABLE_TITHE','tithe_tb');	
define('DEX_TABLE_TELLER','teller_tb');
define('DEX_TABLE_STAFF_PASTOR','staff_pastor_tb');

//SNIPPETS
function DEX_ENUMS_SCANNER ()
{
	return array('CHURCH','GRADE');
}

function DEX_ENUMS_SWISS ($param, $parse)
{
	$parseArray = DEX_ENUMS_SCANNER();
	if ($param == $parseArray[0] && is_numeric($parse)) //CHURCH_RID
		$array = _BYID(DEX_TABLE_CHURCH,$parse);
	if ($param == $parseArray[1]) //GRADE
		$array = array('national presbyter','district presbyter','head pastor','assistant pastor');
	
	if (is_numeric($parse) && $param != $parseArray[0])
		return $array[$parse];
	else
		return $array;	
}

?>