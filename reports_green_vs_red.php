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
          <h1 class="h3 mb-2 text-gray-800">Reports</h1>
          
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
              <h6 class="m-0 font-weight-bold text-primary">POS wise Green Vs Red</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th scope="col">POS ID</th>
                          <th scope="col">POS Name</th>
                          <th scope="col">Total</th>
                          <th scope="col">Red</th>
                          <th scope="col">Green</th>
                          <th scope="col">Red %</th>
                          <th scope="col">Churn</th>
                          <th scope="col">Churn %</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th scope="col">POS ID</th>
                          <th scope="col">POS Name</th>
                          <th scope="col">Total</th>
                          <th scope="col">Red</th>
                          <th scope="col">Green</th>
                          <th scope="col">Red %</th>
                          <th scope="col">Churn</th>
                          <th scope="col">Churn %</th>
                         </tr>
                      </tfoot>
                  <tbody>
<?php
    date_default_timezone_set("Asia/Kolkata");
    $now=date("Y-m-d");
    $get_pos="select * from pos_master where pos_status='ON' ORDER BY pos_id ASC";
    $run_pos=mysqli_query($con, $get_pos);
    while($row_pos=mysqli_fetch_array($run_pos)){
        
        $pos_id=$row_pos['pos_id'];
        $pos_name=$row_pos['pos_name'];
        $pos_address=$row_pos['pos_address'];
        
        
            
        $get_cust_t="Select * from cust_master where cust_last_apoint_outlet_id='$pos_id'";
        $run_cust_t=mysqli_query($con, $get_cust_t);
        $cust_count_t=mysqli_num_rows($run_cust_t);
        
        $get_cust_off="Select * from cust_master where cust_status='OFF' AND cust_last_apoint_outlet_id='$pos_id'";
        $run_cust_off=mysqli_query($con, $get_cust_off);
        $cust_count_off=mysqli_num_rows($run_cust_off);
        
        
            
    ?>      
    <tr>
      <th scope="row"><?php echo $pos_id; ?></th>
      <td><?php echo $pos_name.'-'.$pos_address; ?></td>
      <td><?php echo $cust_count_t; ?></td>
             <?php
            
            
            $get_comp_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$now%'";
            $run_comp_appoint=mysqli_query($con, $get_comp_appoint);
            $count_comp_appoint=mysqli_num_rows($run_comp_appoint);
            
           
            
            $d2 = date('Y-m-d h:i:s', strtotime('-30 days'));
            
            $get_cust_r="Select * from cust_master where cust_status='ON' AND cust_last_apoint_outlet_id='$pos_id' AND cust_last_apoint_date <= '$d2'";
            $run_cust_r=mysqli_query($con, $get_cust_r);
            $cust_count_r=mysqli_num_rows($run_cust_r);
            
        
            
            ?>
      <td style="color:red;"><?php echo $cust_count_r; ?></td>
                <?php
                    $d2 = date('Y-m-d h:i:s', strtotime('-30 days'));
        
                    $get_cust_g="Select * from cust_master where cust_status='ON' AND cust_last_apoint_outlet_id='$pos_id' AND cust_last_apoint_date > '$d2'";
                    $run_cust_g=mysqli_query($con, $get_cust_g);
                    $cust_count_g=mysqli_num_rows($run_cust_g);
                    
                ?>
      
      <td style="color:green;"><?php echo $cust_count_g; ?></td>
      <td style="color:red;"><?php echo round(($cust_count_r/$cust_count_t)*100); ?>%</td>
      <td style="color:orange;"><?php echo $cust_count_off; ?></td>
      <td style="color:orange;"><?php echo round(($cust_count_off/$cust_count_t)*100); ?>%</td>
    </tr>
    <?php } ?>
  </tbody>
                </table>
              </div>
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

</body>

</html>
<?php } ?>