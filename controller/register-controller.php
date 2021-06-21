<?php 
	session_start();
	include_once '../model/db.php';
	$conn = db_connect();

	if(isset($_POST['register'])){
	$name     = $_POST['name'];
	$email    = $_POST['email'];
    $mobile   = $_POST['mobile_number'];
    $password = $_POST['password'];

	$role     = "CUSTOMER";

     
   echo  $sql = "INSERT INTO `admin`(name,email,mobile_number,password,user_role) VALUES('$name','$email','$mobile','$password','$role')"; 
    $query = mysqli_query($conn,$sql);

   if($query){
    		

           header('location: ../view/login.php');	
    	}
    }

?>
	