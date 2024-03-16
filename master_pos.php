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
    
    ?>

<!DOCTYPE html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Addforum Admin - Customer</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
          <h1 class="h3 mb-2 text-gray-800">Masters</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">POS Details</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>POS Name</th>
                      <th>POS Address</th>
                      <th>Contact</th>
                      <th>POS ID</th>
                      <th>Password</th>
                      <th>Status</th>
                      <th>Update</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>POS Name</th>
                      <th>POS Address</th>
                      <th>Contact</th>
                      <th>POS ID</th>
                      <th>Password</th>
                      <th>Status</th>
                      <th>Update</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php
                      $get_pos="select * from pos_master";
                      $run_pos=mysqli_query($con, $get_pos);
                      while($row_pos=mysqli_fetch_array($run_pos)){
                      
                        $pos_id=$row_pos['pos_id'];
                        $pos_name=$row_pos['pos_name'];
                        $pos_addr=$row_pos['pos_addr'];
                        $pos_address=$row_pos['pos_address'];
                        $pos_contact=$row_pos['pos_contact'];
                        $pos_status=$row_pos['pos_status'];
                        $pos_pass=$row_pos['pos_pass'];
                      
                        
                        $pos_detail=$pos_name.' ('.$pos_addr.')';
                      
                      
                      ?>
                      
                    <tr>
                      <td><?php echo $pos_detail; ?></td>    
                      <td><?php echo $pos_address; ?></td>
                      <td><?php echo $pos_contact; ?></td>
                      <td><?php echo $pos_id; ?></td>
                      <form method="POST" action="">
                      <input type="hidden" name="pos_id" value="<?php echo $pos_id; ?>">
                      <td><input type="text" name="pos_pass" value="<?php echo $pos_pass; ?>" required=""></td>
                      <td><?php echo $pos_status; ?></td>
                      <td><input type="submit" name="upd_outlet" class="btn btn-primary btn-small" value="Update"></td>
                    </tr>
                    </form>
                    
                    <?}?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
<?php
if(isset($_POST['upd_outlet'])){
    $pos_pass=$_POST['pos_pass'];
    $pos_id=$_POST['pos_id'];
    
    $upd_outlet="UPDATE pos_master SET pos_pass='$pos_pass' WHERE pos_id='$pos_id'";
    $run_outlet=mysqli_query($con, $upd_outlet);
}
?>
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

</body>

</html>
<?php } ?>