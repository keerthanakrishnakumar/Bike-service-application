<?php 
    //session_start();
    if(isset($_SESSION['user_data']['id']))
    {
        $id = $_SESSION['user_data']['id'];
        $name = $_SESSION['user_data']['name'];
        $role = $_SESSION['user_data']['role'];
        $roleName = $_SESSION['user_data']['user_role'];

    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
      
        <!-- Plugins css -->
          <link href="../assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="../assets/plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="../assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <link href="../assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../assets/css/lightbox.css">
      <!--Form Wizard-->
        <link rel="stylesheet" type="text/css" href="../assets/plugins/jquery.steps/css/jquery.steps.css" />
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
        
        <script src="../assets/js/modernizr.min.js"></script>
         
         
         

       

        
        
      
        <link href="../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Multi Item Selection examples -->
        <link href="../assets/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
         
<link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <div class="slimscroll-menu" id="remove-scroll">

                    <!-- LOGO -->
                    <div class="topbar-left">
                       
                          
                    </div><br>

                    <!-- User box -->
                    <div class="user-box" style="margin-top: 7em;">
                        <div class="user-img">
                            <img src="../assets/images/admin.png" alt="user-img" title="Admin" class="rounded-circle img-fluid">
                        </div>
                        <h5><a href="#"><?php echo $roleName;?></a></h5>
                        <p class="text-muted"><?php echo $name;?></p>
                    </div>
                    

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                    
                        <ul class="metismenu" id="side-menu">
                            <!--<li class="menu-title">Navigation</li>-->

                            <?php


                    if($roleName == 'CUSTOMER'){?>
                            <li>
                                <a href="customer_status.php">
                                    <i class="fi-air-play"></i><span>Booking Status</span>
                                </a>
                            </li>
                             <li>
                                <a href="serviceadd_customer.php">
                                    <i class="fi-air-play"></i><span>Book Service</span>
                                </a>
                            </li>
                             
                    <?php
                }
                else{
                    ?>
                      <li>
                    
                                <a href="service.php">
                                    <i class="fi-air-play"></i><span>Add Service</span>
                                </a>
                            </li>
                   <li>

                                <a href="customer_list.php">
                                    <i class="fi-air-play"></i><span>Customer Details</span>
                                </a>
                            </li>
                             <li>
                                <a href="customer_status.php">
                                    <i class="fi-air-play"></i><span>Booking Details</span>
                                </a>
                            </li> 
                            <?php
                }

                    ?>

                        

                          
                           
                          
                        </ul>

                        
                    </div>
                    
                    <!-- Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom nav-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                           

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="../assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1"><?php echo $name;?><i class="mdi mdi-chevron-down"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                <a href="login.php" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title"></h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active"></li>
                                    </ol>
                                </div>
                            </li>

                        </ul>

                    </nav>
                </div>
                <!-- Top Bar End -->