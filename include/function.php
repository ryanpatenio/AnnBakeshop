<?php 

function redirect($location=Null){
		if($location!=Null){
			echo "<script>
					window.location='{$location}'
				</script>";	
		}else{
			echo 'error location';
		}

}

	// function setQuery($sql='') {
	// 	$this->sql_string=$sql;
	// }
	
	// function executeQuery() {
	// 	$result = mysqli_query($this->conn,$this->sql_string);
	// 	$this->confirm_query($result);
	// 	return $result;
	// }
	function msgBox($msg="",$status=""){
		echo '<script>alert("'.$msg.'")</script>';
		return $msg;
	}

	



	function message($msg="", $msgtype="") {
	  if(!empty($msg)) {
	    // then this is "set message"
	    // make sure you understand why $this->message=$msg wouldn't work
	    $_SESSION['message'] = $msg;
	    $_SESSION['msgtype'] = $msgtype;
	  } else {
	    // then this is "get message"
			return $message;
	  }
	}

	
	function loadSingleResult() {
		$cur = $this->executeQuery();
			
		while ($row = mysqli_fetch_object( $cur )) {
			$data = $row;
		}
		mysqli_free_result( $cur );
		return $data;
	}

	


	function check_message(){
	
		if(isset($_SESSION['message'])){
			if(isset($_SESSION['msgtype'])){
				if ($_SESSION['msgtype']=="info"){
	 				echo  '

	 				swal("'.$_SESSION['message'].'", "Click OK!", "success");

	 				';
	 				 
				}elseif($_SESSION['msgtype']=="error"){
					echo  'swal("'.$_SESSION['message'].'", "Click OK!", "error");';
									
				}elseif($_SESSION['msgtype']=="success"){
					echo  '<div class="alert-success" style="height:30px;text-align:center;padding:5px">' . $_SESSION['message'] . '</div>';
				}	
				unset($_SESSION['message']);
	 			unset($_SESSION['msgtype']);
	   		}
  
		}	

	}



?>