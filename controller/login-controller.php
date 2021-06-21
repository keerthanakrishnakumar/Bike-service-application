<?php 
	session_start();
	include_once '../model/db.php';
	$conn = db_connect();

	if(isset($_POST['login'])){
	$usermail=$_POST['email'];
	$password=$_POST['password'];
  $sql = " SELECT * FROM `admin` where email = '$usermail' AND password = '$password'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_num_rows($query);
	 $result;
	if($result == 1){
		while($row = mysqli_fetch_array($query)){
			if($row['user_role'] == 'CUSTOMER'){
				$_SESSION['user_data'] = $row;
				//$_SESSION['message'] = "Your Successfully Login.!"; 
				header('location: ../view/serviceadd_customer.php');
			}else
		{
				$_SESSION['user_data'] = $row;
				//$_SESSION['message'] = "Your Successfully Login.!"; 
				header('location: ../view/customer_list.php');
			}
			}
		}
	// else{
	// 		$_SESSION['login_fail'] = "In-Valid Login.!"; 
	// 		header('location: ../view/login.php');
	// 	}
	}
 ?>