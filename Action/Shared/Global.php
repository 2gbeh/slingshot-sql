<?php
$_POST = JSP_FOOBAR_FORMFIL();

define('SLI_APPNAME','SlingshotSQL');
define('SLI_TYPEFACE','Slingshot<b>SQL</b>');
define('SLI_VERSION','VERSION <b>4.0</b> BUILD <b>03130917</b>');
define('SLI_CONTACT','+234(0) 81 6996 0927 (WhatsApp only)');
define('SLI_PACKAGE',STABLE);

define('SLI_PAGE_WEBSITE','../../'.LANDING);
define('SLI_PAGE_LOGIN','Login.php');
define('SLI_PAGE_LANDING','Home.php');


if ($_ADMIN['status'] == 1)
	define('IS_PRI_ADMIN',1);
else
	define('IS_PRI_ADMIN',0);

if ($_ADMIN['status'] == 2)
	define('IS_SEC_ADMIN',1);
else
	define('IS_SEC_ADMIN',0);



?>