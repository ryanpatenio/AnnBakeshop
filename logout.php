<?php

require_once('include/initialize.php');
@session_start();

session_destroy();
redirect(WEB_ROOT."login.php");

 ?>