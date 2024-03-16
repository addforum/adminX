<?php
include("../includes/db.php");
date_default_timezone_set("Asia/Kolkata");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block "><img style="position:fixed; top:80px; left:245px; " src="https://tsparlour.com/img/logo.png" width="32%"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back Admin!</h1>
                  </div>
                  <form class="user" method="POST" action="">
                    <div class="form-group">
                      <input type="tel" name="admin_mobile" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Mobile">
                    </div>
                    <div class="form-group">
                      <input type="password" name="admin_pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <!--<div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>-->
                    <input type="submit" value="Login" name="login_a" class="btn btn-primary btn-user btn-block">
                     
                    <!--<hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>-->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <!--<div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>-->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php
if(isset($_POST['login_a'])){
    $admin_mobile=$_POST['admin_mobile'];
    $admin_pass=$_POST['admin_pass'];
    
    $get_admin="select * from admins where admin_mobile='$admin_mobile' AND admin_pass='$admin_pass'";
    $run_admin=mysqli_query($con, $get_admin);
    $count_admin=mysqli_num_rows($run_admin);
    
    if($count_admin==1){
        $_SESSION['admin_mobile']=$admin_mobile;
                        echo"<div class='alert alert-success' role='alert'> Login Successful !</div>";
                        echo "<script>window.open('index.php','_SELF')</script>";
    } else{
     echo"<div class='alert alert-danger' role='alert'> Login Details Incorrect !</div>";   
    }
}
?>
