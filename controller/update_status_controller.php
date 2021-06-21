<?php 
	session_start();
	include_once '../model/db.php';
	$conn = db_connect();
	$variable = $_SESSION['user_data']['id'];
  $role = $_SESSION['user_data']['role'];
  $branch_id = $_SESSION['user_data']['branch'];
  $uname  =  $_SESSION['user_data']['name'];
  $email  =  $_SESSION['user_data']['email'];

	if(isset($_POST["update"]))
	 {
	 	 $id = $_POST['id'];
         $bookingdate = $_POST['booking_date'];
         $serviceName = $_POST['service_name'];
         $customer_id = $_POST['customer_id'];
         $date        = $_POST['service_date'];
         $service_status = $_POST['service_status'];

        $sql = "UPDATE booking_customer SET service_status='$service_status',service_date='$date' WHERE id='$id' AND service_name='$serviceName' AND customer_id='$customer_id'"; 
	 	  $result = mysqli_query($conn,$sql);
	 	  if($result){

         

$to = $email;
$subject = "Customer Booking Mail";
$txt = "Customername :".$uname. "\r\n" ."Bookind Date:".$bookingdate. "\r\n" ."ServiceName:".$serviceName;
$headers = "From: webmaster@example.com" . "\r\n" .

mail($to,$subject,$txt,$headers);




	 	  	 $_SESSION['success'] = "Updated SuccessFully!!";
	 	     header('Location: ../view/customer_status.php');
	 	  }
	 	  else{
	 	  	$_SESSION['Fail'] = "Something Went Wrong!!";
	 	  	header('Location: ../view/customer_status.php');
	 	  }
	
         	
		
		

	 	        
	}


        
	
		

 ?>