<?php
//import all methods
require_once 'include/initialize.php';
 if(!isset($_SESSION['user_id'])){
 	redirect(WEB_ROOT."login.php");
 }


$crud = new action();
$tryLog = new user();


$action = $_GET['action'];

if($action == 'master'){
	$login = $tryLog->Authenticate();
	if($login)
		echo $login;
}

if($action == 'addcat'){
	$add_cat = $crud->addCategory();
	if($add_cat)
		echo $add_cat;
}
if($action == 'add_p'){
	$addProduct = $crud->add_product();

	if($addProduct)
		echo $addProduct;
}

if($action == 'add_cust'){
	$add_custom = $crud->addCustomer();
	if($add_custom)
		echo $add_custom;
}

if($action == 'search_customer'){
	$search_cust = $crud->searching();
	if($search_cust)
		echo $search_cust;
}
if($action == 'click_cust'){
	$get_customer = $crud->getCustomer();
	if($get_customer)
		echo $get_customer;
}
if($action == 'get_customer_cart'){
	$get_cart = $crud->get_customer_cart();
	if($get_cart)
		echo $get_cart;
}
if($action == 'get_total_cart'){
	$load_total_price = $crud->getCustomer_totalPrice();
	if($load_total_price)
		echo $load_total_price;
}

if($action == 'adding_cart'){
	$add_cart = $crud->adding_cart();
	if($add_cart)
		echo $add_cart;
}
if($action == 'load_total_cart'){
	$total_cart_count = $crud->get_total_count_cart();
	if($total_cart_count)
		echo $total_cart_count;

}
if($action == 'confirm_checkout'){
	$get_confirm = $crud->confirm_checkout();
	if($get_confirm)
		echo $get_confirm;
}

if($action == 'removing_item_from_cart'){
	$del_item_cart = $crud->removing_item_from_cart();
	if($del_item_cart)
		echo $del_item_cart;
}

if($action == 'get_edit_order'){
	$get_dataTo_edit = $crud->get_data_order();
	if($get_dataTo_edit)
		echo $get_dataTo_edit;
}
if($action == 'get_ordered_list'){
	$get_ordered = $crud->get_ordered_list();
	if($get_ordered)
		echo $get_ordered;
}
if($action == 'get_orderd_total'){
	$get_ordered_ttl = $crud->get_ordered_total();
	if($get_ordered_ttl)
		echo $get_ordered_ttl;
}
if($action == 'modify_ordered_status'){
	$get_save = $crud->modify_ordered_status();
	if($get_save)
		echo $get_save;
}

if($action == 'get_prod'){
	$get_data_edit = $crud->get_prod();
	if($get_data_edit)
		echo $get_data_edit;
}

if($action == 'edit_p'){
	$edit_prod = $crud->edit_product();
	if($edit_prod)
		echo $edit_prod;
}
if($action == 'request_data_cat'){
	$received_cat_data = $crud->get_data_cat();
	if($received_cat_data)
		echo $received_cat_data;
}

if($action == 'updateCat'){
	$update_cat = $crud->update_category();
	if($update_cat)
	echo $update_cat;
}

if($action == 'request_data_cust'){
	$received_cust_data = $crud->get_data_cust();
	if($received_cust_data)
	echo $received_cust_data;

}

if($action == 'update_cust'){
	$update_customer1 = $crud->update_customer();
	if($update_customer1)
        echo $update_customer1;

}

if($action == 'request_trans_data'){
	$received_data_request = $crud->get_trans_data();
	if($received_data_request)
	echo $received_data_request;
}

if($action == 'ordered_list'){
	$received_data_ordered_list = $crud->ordered_list();
	if($received_data_ordered_list)
	echo $received_data_ordered_list;
}

if($action == 'total_trans_data'){
	$r_data_total = $crud->total_trans_data();
	if($r_data_total)
	echo $r_data_total;
}

if($action == 'new_user'){
	$add_new_user = $crud->new_user();
	if($add_new_user)
	echo $add_new_user;

}

if($action == 'request_user_data'){
	$received_data_user = $crud->request_user_data();
	if($received_data_user)
	echo $received_data_user;
}

if($action == 'request_edit_user'){
	$get_user_updated = $crud->request_edit_user();
	if($get_user_updated)
	echo $get_user_updated;
}

if($action == 'request_edit_profile'){
	$get_profile_updated = $crud->request_edit_profile();
	if($get_profile_updated)
	echo $get_profile_updated;
}

if($action == 'request_edit_password'){
	$getProfile_edit_pass = $crud->profile_edit_pass();
	if($getProfile_edit_pass)
	echo $getProfile_edit_pass;
}
if($action == 'getGraph'){
	$getData = $crud->getGraph();
	if($getData)
		echo $getData;
}

 ?>