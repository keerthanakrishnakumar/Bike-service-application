<?php 
  session_start();
  include_once '../model/db.php';
  $conn = db_connect();
  $variable = $_SESSION['user_data']['id'];
  $role = $_SESSION['user_data']['role'];
  $branch_id = $_SESSION['user_data']['branch'];
  $uname  =  $_SESSION['user_data']['name'];
  $email  =  $_SESSION['user_data']['email'];

  if(isset($_POST['save'])){

    $serviceName = $_POST['service_name'];

    $sql = "INSERT INTO service (service_name)VALUES('$serviceName')"; 
    $result = mysqli_query($conn,$sql);

    if($result){
         $_SESSION['success'] = "Save SuccessFully!!";
         header('Location: ../view/service.php');
      }
      else{
        $_SESSION['Fail'] = "Something Went Wrong!!";
        header('Location: ../view/service.php');
      }
  }



if(isset($_POST['update'])){

    $id = $_POST['id'];
    $serviceName = $_POST['service_name'];

    $sql = "UPDATE service SET service_name='$serviceName' WHERE id='$id'";
    $result = mysqli_query($conn,$sql);

    if($result){
         $_SESSION['success'] = "Updated SuccessFully!!";
         header('Location: ../view/service.php');
      }
      else{
        $_SESSION['Fail'] = "Something Went Wrong!!";
        header('Location: ../view/service.php');
      }
  }


   

  ?>