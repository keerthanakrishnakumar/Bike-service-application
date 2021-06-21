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
                            <h4 class="m-t-0 header-title">Service Details </h4>
                            </div>
                           
                            <div class="col-md-2" style="float:right; " >
                              <a  data-toggle="modal" href="#myModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Add Service</a>
                            </div>
                           
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
                                    <th>Service Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                   
                                   
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i = 1;
                                $sql = "SELECT * FROM service";
                                $result = mysqli_query($conn,$sql);
                                while($rows = mysqli_fetch_array($result)){
                                  ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $rows['service_name'];?></td>
                                      <td><a data-toggle="modal" href="#myModalEdit" class="btn btn-info btn-sm viewdetails" data-id="<?php echo $rows['id'];?>"  data-service="<?php echo $rows['service_name'];?>"><i class="fa fa-pencil"></i></a>
                                   <td><a href="delete.php?sId=<?php echo $rows['id'] ?>" class="btn btn-danger del-btn"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                 
                                   
                            </div></td>
                                </tr>
                              <?php
                              $i++;
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
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Add Service Name</h4>
          </div>
            <form action="../controller/service_controller.php" method="post">
          <div class="modal-body">
         
          
          <div class="form-group">
              <label for="service_name" class="control-label">Service Name : </label>
              <div class="">
                  <input type="text" name="service_name" class="form-control" id="service_name">
              </div>
          </div>
          </div>
          <div class="modal-footer">
              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
              <button class="btn btn-success" type="submit" name="save">Save </button>
          </div>
        </form>
      </div>
  </div>
</div>
<!-- modal -->

<!-- Modal -->
<div class="modal fade " id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Edit Service Name</h4>
          </div>
            <form action="../controller/service_controller.php" method="post">
          <div class="modal-body">
         
          
          <div class="form-group">

              <label for="service_name" class="control-label">Service Name : </label>
              <div class="">
                <input type="hidden" name="id" id="eid">
                  <input type="text" name="service_name" class="form-control" id="eservice_name">
              </div>
          </div>
          </div>
          <div class="modal-footer">
              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
              <button class="btn btn-success" type="submit" name="update">Save </button>
          </div>
        </form>
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
    var servicename = $(this).data('service');
 
  
      
  
    $('#eid').val(id);
    $('#eservice_name').val(servicename);
   
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