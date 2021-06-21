<?php 
  session_start();
  $variable = $_SESSION['user_data']['id'];
  $role = $_SESSION['user_data']['role'];
  $branch_id = $_SESSION['user_data']['branch'];
  $uname  =  $_SESSION['user_data']['name'];
  if($variable == null)
  {
    header('Location: login.php');
  }
  include_once '../model/db.php';
  include_once 'header.php';
  $conn = db_connect();
  ?>

<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row"> 
                    <div class="col-md-12">
                      <div class="col-md-10" style="float:left;">
                      <h4 class="m-t-0 header-title">Book Service</h4>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="card-box table-responsive">
                      <form method="POST" action="../controller/customerservice-controller.php" id="form">
                          
                              
                                          <div class="col-md-9">
                                          <div class="form-group">

                                            <label>Date<span class="text-danger">*</span></label>  
                                            <input type="date" name="booking_date" id="booking_date" id="datepicker" class="form-control" required autocomplete="off"/>  
                                          </div>
                                        </div>
                                         <div class="col-md-9">
                                          <div class="form-group">
                                            
                                            <label>Name<span class="text-danger">*</span></label>  
                                            <input type="text" name="username" id="username" id="datepicker" class="form-control" value="<?php echo $uname;?>" readonly>  
                                          </div>
                                        </div>
                                         <div class="col-md-9">
                                          <div class="form-group">
                                            <label>Service Name <span class="text-danger">*</span></label>  
                                        <select class="form-control" name="service_name" id="service_name">
                                              <option value="">--Choose--</option> 
                                              <?php
                                                $sql = "SELECT * FROM service";
                                $result = mysqli_query($conn,$sql);
                                while($rows = mysqli_fetch_array($result)){
                                    ?>
                                     <option value="<?php echo $rows['service_name'];?>"><?php echo $rows['service_name'];?></option>
                                            <?php
                                            }
                                              ?>
                                           
                                        </select> 
                                          </div>
                                        </div>
                                 
                                
                                 <!--  <div class="col-md-12"> -->
                                 <!--    <table id="dynamic_field" style="margin-top: 30px;">
                                    <tr>
                                      <td>
                                        <div class="col-md-9">
                                          <div class="form-group">
                                            <label>MemberName <span class="text-danger">*</span></label>  
                                            <input type="text" name="member_name[]" id="member_name" class="form-control" required >  
                                          </div>
                                        </div>
                                      </td>

                                     
                                      <td>
                                        <button type="button" name="add" id="add" class="btn btn-success btn-sm">+</button></td>
                                      </td>
                                    </tr>
                                  </table> -->
                                    
                                    
                           <!--         
                                  </div> -->
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-10">
                                      <input type="submit" name="submit" class="btn btn-success" value="Submit">
                                      <input type="reset" name="reset" value="Cancel" class="btn btn-default">
                                  </div>
                                </div>
                              </div>
                              </form>
                      </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    <!-- end row -->

</div> <!-- container -->
</div> <!-- content -->

<?php include_once 'footer.php'; ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#form').parsley();
    });
</script>

<script>
    $(document).ready(function(){
            var i = 1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="col-md-9"><div class="form-group"><label>MemberName<span class="text-danger"></span></label><input type="text" name="member_name[]" id="member_name" class="form-control" required autocomplete="off"/></div></td><td><div class="col-md-9"></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
            });

            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });
        });
  </script>
  
  <script>
  function getEmployee(val) {
        $.ajax({
        type: "POST",
        url: "getEmployee.php",
        data:'branch_id='+val,
        success: function(data){
            $("#employee_id").html(data);
        }
        });
    }
      
  </script>