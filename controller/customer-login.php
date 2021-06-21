<?php 
	session_start();
	include_once '../model/db.php';
	$conn = db_connect();

	if(isset($_POST['login'])){
	$usermail=sanitize($_POST['email'], $conn);
	$password=sanitize($_POST['password'], $conn);

	$sql = " SELECT * FROM `admin` where email = '$usermail' AND password = '$password'";
	$query = mysqli_query($sql, $conn);
	$result = mysqli_num_rows($query);
	if($result == 1){
		while($row = mysqli_fetch_array($query)){
			if($row['role'] == 'CUSTOMER'){

				$_SESSION['user_data'] = $row;
				//$_SESSION['message'] = "Your Successfully Login.!"; 
				header('location: ../view/team_add.php');
			}
			elseif ($row['role'] == 'ADMIN') {
				$_SESSION['user_data'] = $row;
				//$_SESSION['message'] = "Your Successfully Login.!"; 
				header('location: ../view/team_add.php');
			}
			}
		}
	else{
			$_SESSION['login_fail'] = "In-Valid Login.!"; 
			header('location: ../view/login.php');
		}
	}
 ?>