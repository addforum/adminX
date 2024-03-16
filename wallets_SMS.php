<?php
include("../includes/db.php");
include("../includes/db_addforum.php");
date_default_timezone_set("Asia/Kolkata");
session_start();
if(!isset($_SESSION['admin_mobile'])){
    echo "<script>window.open('login.php','_SELF')</script>";
}

else{
    $admin_mobile=$_SESSION['admin_mobile'];
    
    $get_admin="select * from admins where admin_mobile='$admin_mobile'";
    $run_admin=mysqli_query($con,$get_admin);
    $row_admin=mysqli_fetch_array($run_admin);
    
    $admin_name_i=ucwords(strtolower($row_admin['admin_name']));
    $admin_image=$row_admin['image'];
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SuperAdmin - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
    include("n_sidebar.php");
    
    ?>
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

     <?php
        include("n_topbar.php");
    ?>


        <?php
        $get_sms_bal="select * from sms_wallet where type='SMS'";
        $run_sms_bal=mysqli_query($con, $get_sms_bal);
        $row_sms_bal=mysqli_fetch_array($run_sms_bal);
        
        $sms_bal_i=$row_sms_bal['balance'];
        
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">SMS Wallets</h1>
          
          <div class="row">
            
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">SMS (Balance)</div>
                      <div class="h3 mb-0 font-weight-bold text-red-800"><?php echo $sms_bal_i; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class=" fa-2x text-gray-300"><b>₹</b></i>    
                      <!--<i class="fas fa-calendar fa-2x text-gray-300"></i>-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
        <!-- /.container-fluid -->
        
        <div class="container-fluid">
            <div class=container>
                <form class="form" method="post" action="pay_addforum/main.php">
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <h4>Recharge Plans for SMS:-</h4>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                              <?php
                                $get_plans="select * from sms_plan where status='ON'";
                                $run_plans=mysqli_query($con_adf, $get_plans);
                                while($row_plans=mysqli_fetch_array($run_plans)){
                                echo 1;
                                $credits=$row_plans['credits'];
                                $rate=$row_plans['rate'];
                                $price=$row_plans['price'];
                                $gst=$row_plans['gst'];
                                $total_price=$row_plans['total_price'];
                                $sele=$row_plans['sele'];
                                
                              ?>
                              
                              <<?php echo $sele; ?>><?php echo $credits; ?> Credits (<?php echo $rate; ?> Paisa =Rs.<?php echo $price; ?> + <?php echo $gst; ?> GST)</option>
                              <?php } ?>
                            </select>
                            
                        </td>
                    </tr>
                    <tr>
                        <td><img src="img/IN-paymenticons.png" width="40%"> </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" class="btn btn-primary btn-lg" value="Recharge" name="recharge">
                        </td>
                    </tr>
                </table>
                </form>
            </div>
            
        </div>

      </div>
      <!-- End of Main Content -->

    <?php
        include("n_footer.php");
    ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
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
<?php } ?>