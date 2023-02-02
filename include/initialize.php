<?php
session_start();
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'annBakeshop');

defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'include');

// load config file first 
require_once(LIB_PATH.DS."config.php");
//load basic functions next so that everything after can use them
require_once(LIB_PATH.DS."function.php");
require_once(LIB_PATH.DS."member.php");
//load database
require_once(LIB_PATH.DS."database.php");
require_once(LIB_PATH.DS."crud.php");
require_once(LIB_PATH.DS."dashboard.php");
//require_once(LIB_PATH.DS."adminTable.php");









 ?>