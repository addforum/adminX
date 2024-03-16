<?php
include("../includes/db.php");
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
    
    $sms_i=$row_admin['SMS'];
    $whatsapp_i=$row_admin['Whatsapp'];
    $bdb_i=$row_admin['BDB'];
    
    ?>
    
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SuperAdmin - Dashboard</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">My Area</h1>
          
            <?php
            date_default_timezone_set("Asia/Kolkata");
            $this_month=date("Y-m");
            $this_MM=date("M'Y");
            $now=date("Y-m-d");
            
            $nowG=date_create($now);
            $nowP=date_add($nowG,date_interval_create_from_date_string("-1 month"));
            $last_month=date_format($nowP,"Y-m");
            $last_MM=date_format($nowP,"M'Y");
                                
            
            ?>    
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">My Settings</h6>
              
              
            </div>
            <div class="card-body">
                
                <h6>Mode of sending bills to customer:</h6>
                <form method="post" action="update_msg_mode.php">
                    <?php
                    
                    if($sms_i=='ON'){
                     ?>
                     <div class="form-check form-switch">
                      <input class="form-check-input" name="sms" type="checkbox" id="SMS" checked>
                      <label class="form-check-label" for="SMS">SMS</label>
                    </div>
                    <?php    
                    } else {
                    ?>
                    <div class="form-check form-switch">
                      <input class="form-check-input" name="sms" type="checkbox" id="SMS">
                      <label class="form-check-label" for="SMS">SMS</label>
                    </div>
                    <?php    
                    } if($whatsapp_i=='ON'){
                    ?>
                    <div class="form-check form-switch">
                      <input class="form-check-input" name="whatsapp" type="checkbox" id="Whatsapp" checked>
                      <label class="form-check-label" for="Whatsapp">Whatsapp</label>
                    </div>
                    <?php    
                    } else {
                    ?>
                    <div class="form-check form-switch">
                      <input class="form-check-input" name="whatsapp" type="checkbox" id="Whatsapp" >
                      <label class="form-check-label" for="Whatsapp">Whatsapp</label>
                    </div>
                    <?php } ?>
                    <input type="submit" name="upd_mode" value="Save" class="btn btn-info btn-sm">
                    
                </form>
                
                
                
            </div>
            
                        <div class="card-body">
                
                <h6>Back-Dated Billing:</h6>
                <form method="post" action="update_bdb_mode.php">
                    <?php
                    
                    if($bdb_i=='ON'){
                     ?>
                     <div class="form-check form-switch">
                      <input class="form-check-input" name="bdb" type="checkbox" id="BDB" checked>
                      <label class="form-check-label" for="BDB">Activated</label>
                    </div>
                    <?php    
                    } else {
                    ?>
                    <div class="form-check form-switch">
                      <input class="form-check-input" name="bdb" type="checkbox" id="BDB">
                      <label class="form-check-label" for="BDB">De-Activated</label>
                    </div>
                    <?php } ?>
                    <input type="submit" name="upd_mode" value="Save" class="btn btn-info btn-sm">
                    
                </form>
                
                
                
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

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
          <a class="btn btn-primary" href="logout.php">Logout</a>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
<?php } ?>