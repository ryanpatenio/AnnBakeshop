<?php

require 'include/initialize.php';

if(!isset($_SESSION['user_id'])){
  redirect(WEB_ROOT."login.php");
}


 ?>