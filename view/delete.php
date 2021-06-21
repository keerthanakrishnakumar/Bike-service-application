<?php
include('../model/db.php');
 session_start();
 $conn = db_connect();
if($_GET['sId']){
       $id = $_GET['sId'];
       $delete = "DELETE FROM `service` WHERE id = '$id'"; 

      $query = mysqli_query($conn, $delete);

      
      if($query){
          $_SESSION['success'] = "service Deleted Successfully.!";
          header('Location: service.php');
      }
      else{
          $_SESSION['fail'] = "Something went to wrong.!";
          header('Location: service.php');
      }
  }