<?php

require_once("database.php");

class user{

	protected static $tbl_user = "user";
	protected static $monkey_language = 'eb0a191797624dd3a48fa681d3061212';

	function Authenticate(){
		extract($_POST);
		global $mydb;
		$pass = md5($password);

		$mydb->setQuery("select * from user where uname='".$email."' and password=('".$pass."')");
		$cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows($cur);

		if($row_count == 1){
		
      	$founduser = $mydb->loadSingleResult();

        $_SESSION['user_id']    = $founduser->user_id;
        $_SESSION['account_name']    = $founduser->fname.' '.$founduser->lname; 
    	$_SESSION['type'] = $founduser->type;
		$_SESSION['job'] = $founduser->job;
    	

			return 1;
		}else{
			return 0;
		}
				
	} 

	function getUserData($user_id){
		global $mydb;

		if(!empty($user_id)){
			$mydb->setQuery("select * from user where user_id = {$user_id}");
			$cur = $mydb->executeQuery();
			$numrows = $mydb->num_rows($cur);

			if($numrows > 0){
				$found = $mydb->loadSingleResult();

				return $data = array(
					'account_name'=>$found->fname.' '.$found->lname,
					'job'=>$found->job,
					'type'=>$found->type,
					'avatar'=>$found->avatar,
					'fname'=>$found->fname,
					'lname'=>$found->lname,
					'monkey_name'=>$found->special_code					

				);
			}
		}
		return false;
	}

	function getTheMonkey($monkey_code){
		global $mydb;

		$mydb->setQuery("select * from settings where set_code = '".md5($monkey_code)."';");
		$cur  = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);
		if($numrows > 0 ){
			return 1;
		}else{
			return 200;
		}
	}

	function antidote($monkey_pox,$count){
		global $mydb;
		if(!empty($monkey_pox)){
			$mydb->setQuery("UPDATE settings SET `status`='".$count."' WHERE set_code = '".$monkey_pox."'");
			$cur = $mydb->executeQuery();

			if($cur){
				return 1;
			}else{
				return 200;
			}
		}
	}

	function get_monkey_status(){
		global $mydb;

		$mydb->setQuery("select * from settings");
		$cur = $mydb->executeQuery();
		$numrows = $mydb->num_rows($cur);

		if($numrows > 0){
			$found = $mydb->loadSingleResult();
			return $found->status;
		}else{
			return 200;
		}
	}



}



 ?>