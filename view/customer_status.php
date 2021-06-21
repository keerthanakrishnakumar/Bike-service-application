<?php 
  session_start();
 $variable = $_SESSION['user_data']['id'];
  $role = $_SESSION['user_data']['role'];
  $branch_id = $_SESSION['user_data']['branch'];
  $uname  =  $_SESSION['user_data']['name'];
  $user_role = $_SESSION['user_data']['user_role'];
  if($variable == null)
  {
    header('Location: login.php');
  }
  include_once '../model/db.php';
  include_once 'header.php';
  $conn = db_connect();
 ?>
 
 
<!-- Start Page content -->
<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                          <div class="col-md-12" style="margin:0 0 5em 0;">
                            <div class="col-md-10" style="float:left;">
                            <h4 class="m-t-0 header-title">Customer Status </h4>
                            </div>
                            <?php if($user_role == "CUSTOMER"){?>
                            <div class="col-md-2" style="float:right; " >
                              <a  href="serviceadd_customer.php" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Book Service</a>
                            </div>
                            <?php
                          }
                          ?>
                          </div>
                            <?php
                      if(isset($_SESSION['success'])) {
                       echo '<div class="alert alert-success alert-dismissable" id="success-alert">';
                                echo '<strong>'.$_SESSION['success'].'</strong>';
                               echo '</div>';
                       unset($_SESSION['success']);
                      }
                      ?>
                            <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="key-table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Booking Date</th>
                                    <th>Service Name</th>
                                    <th>Status</th>
                                    <th>Service Date</th>
                                    <th>Service_status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  if($user_role == "CUSTOMER"){
                                
                                $i = 1;
                                $sql = "SELECT * FROM booking_customer WHERE customer_id='$variable'";
                                $result = mysqli_query($conn,$sql);
                                while($rows = mysqli_fetch_array($result)){
                                  ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $rows['booking_date'];?></td>
                                    <td><?php echo $rows['service_name'];?></td>
                                    <td><?php echo $rows['status'];?></td>
                                    <td><?php echo $rows['service_date'];?></td>
                                    <td><?php echo $rows['service_status'];?></td>
                                    <td><?php echo $rows['created_at'];?></td>
                                    
                            </div></td>
                                </tr>
                              <?php
                              $i++;
                            }
                          }
                          else{
                            $i = 1;
                                $sql = "SELECT * FROM booking_customer";
                                $result = mysqli_query($conn,$sql);
                                while($rows = mysqli_fetch_array($result)){
                                  ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $rows['booking_date'];?></td>
                                    <td><?php echo $rows['service_name'];?></td>
                                    <td><?php echo $rows['status'];?></td>
                                    <td><?php echo $rows['service_date'];?></td>
                                    <td><?php echo $rows['service_status'];?></td>
                                      
                                    <td><a data-toggle="modal" href="#myModalEdit" class="btn btn-info btn-sm viewdetails" data-id="<?php echo $rows['id'];?>" data-date="<?php echo $rows['booking_date'];?>"  data-cuid="<?php echo $rows['customer_id'];?>" data-service="<?php echo $rows['service_name'];?>"><i class="fa fa-eye"></i></a>
                            </div></td>
                                </tr>
                              <?php
                              $i++;
                            }
                          }
                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

</div> <!-- container -->
</div> <!-- content -->



<!-- Modal -->
<div class="modal fade " id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Update Status</h4>
          </div>
          <div class="modal-body">
         
           <form action="../controller/update_status_controller.php" method="post">
            <input type="hidden" name="id" id="id">
               <div class="form-group">
            <input type="hidden" name="customer_id" class="form-control" id="customer_id" >
          </div>
             <div class="form-group">
            <input type="text" name="booking_date" class="form-control" id="booking_date" readonly>
          </div>
             <div class="form-group">
            <input type="text" name="service_name" class="form-control" id="service_name" readonly>
          </div>
            <div class="form-group">
                  <label>Date<span class="text-danger">*</span></label>  
                   <input type="date" name="service_date" id="service_date" id="datepicker" class="form-control" required autocomplete="off"/>  
                    
                </div>
             <div class="form-group">
                  <label>Status <span class="text-danger">*</span></label>  
              <select class="form-control" name="service_status" id="service_status">
                    <option value="">--Choose--</option> 
                   <option value="Pending">Pending</option>
                   <option value="Ready for delivery">Ready for delivery</option>
                   <option value="Completed">Completed</option>
              </select> 
                </div>
                  <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <input type="submit" name="update" class="btn btn-success" value="Update">
            <input type="reset" name="reset" value="Cancel" class="btn btn-default">
        </div>
      </div>
        </form>
          </div>
         
       
      </div>
  </div>
</div>
<!-- modal -->

<?php 
	include_once 'footer.php';
 ?>
<script  src="../assets/js/jobs.js"></script>
<script>
    $(document).on('click','.viewdetails',function(){
    var id = $(this).data('id');
    var date = $(this).data('date');
 
     var customerId = $(this).data('cuid');
      var servicename = $(this).data('service'); 
      // alert(id);
      // alert(date);
      // alert(customerId);
      // alert(service_name);
    $("#id").val(id);
    $('#customer_id').val(customerId);
    $('#service_name').val(servicename);
    $('#booking_date').val(date);
   



  });
</script>
<script>
function myFunction(){
    confirm("Are you sure want to Delete.?");
  }
  </script>
<script>
    $(".alert-dismissable").fadeTo(2000, 500).slideUp(500, function(){
 $(".alert-dismissable").alert('close');
});

</script>