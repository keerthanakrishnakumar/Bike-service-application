<?php 
	session_start();
	include_once '../model/db.php';
	$conn = db_connect();
	$variable = $_SESSION['user_data']['id'];
  $role = $_SESSION['user_data']['role'];
  $branch_id = $_SESSION['user_data']['branch'];
  $uname  =  $_SESSION['user_data']['name'];
  $email  =  $_SESSION['user_data']['email'];

	if(isset($_POST["submit"]))
	 {
         $bookingdate = $_POST['booking_date'];
         $serviceName = $_POST['service_name'];
         $status      = "Booked";
         $customer_id    = $variable;

         $query = "INSERT INTO `booking_customer`(booking_date,service_name,status,customer_id)VALUES('$bookingdate','$serviceName','$status','$customer_id');"; 
	 	  $result = mysqli_query($conn,$query);
	 	  if($result){

         

$to = $email;
$subject = "Customer Booking Mail";
$txt = "Customername :".$uname. "\r\n" ."Bookind Date:".$bookingdate. "\r\n" ."ServiceName:".$serviceName;
$headers = "From: webmaster@example.com" . "\r\n" .

mail($to,$subject,$txt,$headers);




	 	  	 $_SESSION['success'] = "Saved SuccessFully!!";
	 	     header('Location: ../view/customer_status.php');
	 	  }
	 	  else{
	 	  	$_SESSION['Fail'] = "Something Went Wrong!!";
	 	  	header('Location: ../view/customer_status.php');
	 	  }
	
         	
		
		

	 	        
	}


        
	
		

 ?>