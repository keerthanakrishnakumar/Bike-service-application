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
                            <h4 class="m-t-0 header-title">Booking Details </h4>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>MobileNumber</th>
                                   
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i = 1;
                                $sql = "SELECT * FROM admin WHERE user_role='CUSTOMER'";
                                $result = mysqli_query($conn,$sql);
                                while($rows = mysqli_fetch_array($result)){
                                  ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $rows['name'];?></td>
                                    <td><?php echo $rows['email'];?></td>
                                    <td><?php echo $rows['mobile_number'];?></td>
                                   
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
              <h4 class="modal-title">Add Category Name</h4>
          </div>
            <form action="../controller/seeker-category-controller.php" method="post">
          <div class="modal-body">
         
          
          <div class="form-group">
              <label for="history_category_name" class="control-label">Category Name : </label>
              <div class="">
                  <input type="text" name="history_category_name" class="form-control" id="history_category_name">
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
              <h4 class="modal-title">view</h4>
          </div>
          <div class="modal-body">
         
        
          <div class="form-group">
              <b>TeamName:</b><p id="team"></p>
              <b>LeadName:</b><p id="lead"></p>
              <b>MemberName:</b><p id="member"></p>
              
          </div>
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
    var teamname = $(this).data('team');
 
     var leadname = $(this).data('lead');
      var membername = $(this).data('member'); 
      
  
    $('#scid').val(id);
    $('#team').html(teamname);
    $('#lead').html(leadname);
    $('#member').html(membername);
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