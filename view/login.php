<?php 
    session_start(); 
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en" >
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">  
  <title>Bike Service Application</title>
      <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
  <!doctype html>
<html lang="en">
<head>
    
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login-Page</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link href="../assets/css/login-custom.css" rel="stylesheet">
        <link href="../assets/css/login-custom.css" rel="stylesheet">
      
</head>
<body>
    <div class="section">
        <div class="frame">
            <div class="login">
                <div class="login--bg">
                   
                </div>
                <div class="login__header">
                    <div class="login__header--cont">
                        <span class="back-button">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        <span class="logo">
                            <i class="fa fa-motorcycle"></i>
                        </span>
                        <div class="user">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
                <div class="login__content">
                    <div class="login--profile">

                        <i class="login--icon fas fa-user"></i>
                    </div>
                    <h3 class="login--title">LOGİN</h3>
                    <form action="../controller/login-controller.php" method="POST" class="login--form">

                        <div class="input--item">
                            <div class="js-input__content input__content has-error">
                                <input type="text" class="form__input js-input js-input-error" placeholder="Email" name="email" required>
                            </div>
                        </div>

                        <div class="input--item">
                            <div class="js-input__content input__content has-error">
                                <input type="password" class="form__input js-input js-input-error" placeholder="Password" name="password" required>
                            </div>
                        </div>
                       

                        <!-- <div class="login--remember">
                            <div class="remember--check js-remember--check">
                                <div class="remember--check--box">
                                    <div class="remember--check--box-in js-check-box-in"></div>
                                </div>

                                <span class="remember--check--txt">Remember Me</span>

                            </div>
                        </div> -->

                        <button class="login--button" name="login">LOGİN</button>

                      

                    </form>
                    <?php if (isset($_SESSION['login_fail'])): ?>
                        <div id="error">
                            <?php 
                                echo $_SESSION['login_fail']; 
                                unset($_SESSION['login_fail']);
                            ?>
                        </div>
                    <?php endif ?>
                    <div class="login__pagination">
                          You have'nt Account<a href="customer_register.php" style="color:blue;"> Create an Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(".js-remember--check").click(function (e) {
            e.preventDefault();
            ¤(".js-check-box-in").toggleClass("active");
        });

    </script>



</body>
</html>
  <script src='../assets/js/jquery.min.js'></script>
  <script  src="../assets/js/login.js"></script>
</body>

</html>
