<?php
require_once 'include/initialize.php';

if(!isset($_SESSION['user_id'])){
  redirect(WEB_ROOT."login.php");
}
$collection = new user();
$import_zoo = $collection->get_monkey_status();

include('assets/header.php');
include('assets/sidebar.php');

if($user_data['monkey_name'] != '0' ){
  //detected special code
  //detected the admin user!
}else{
    if($import_zoo == '1'){
      redirect('status.php');
    //detected staff
    }
}
$page = isset($_GET['page']) ? $_GET['page'] : 'assets/index_body';
include $page.'.php';

include('assets/footer.php');

 ?>