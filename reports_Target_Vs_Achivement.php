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
              <h6 class="m-0 font-weight-bold text-primary">POS wise Monthly Billing Anlysis</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          <th scope="col">POS ID</th>
                          <th scope="col">POS Name</th>
                          <th scope="col">Target</th>
                          <th scope="col">Achived</th>
                          <th scope="col">Achived %</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th scope="col">POS ID</th>
                          <th scope="col">POS Name</th>
                          <th scope="col">Target</th>
                          <th scope="col">Achived</th>
                          <th scope="col">Achived %</th>
                        </tr>
                      </tfoot>
                  <tbody>
                      <?php
                        
                            
                            $get_pos="select * from pos_master where pos_status='ON' ORDER BY pos_id ASC";
                            $run_pos=mysqli_query($con, $get_pos);
                            while($row_pos=mysqli_fetch_array($run_pos)){
                                
                                $pos_id=$row_pos['pos_id'];
                                $pos_name=$row_pos['pos_name'];
                                $pos_address=$row_pos['pos_address'];
                                $target=$row_pos['target'];
                                
                                $get_appo_u="select * from appointment_dump_u where appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$this_month%'";
                                $run_appo_u=mysqli_query($con, $get_appo_u);
                                $row_appo_u=mysqli_fetch_array($run_appo_u);
                                $count_appo_u=mysqli_num_rows($run_appo_u);
                                
                                
                                    
                            ?>      
                            <tr>
                              <th scope="row"><?php echo $pos_id; ?></th>
                              <td><?php echo $pos_name.'-'.$pos_address; ?></td>
                              <form method="GET" action="update_target.php">
                              <td><input type="number" class="form-control" name="set_target" value="<?php echo $target; ?>"> <input type="hidden" name="pos_id" value="<?php echo $pos_id; ?>"> <input type="submit" class="btn btn-info btn-sm" value="Update"></td>
                              
                              </form>
                              
                              
                                     <?php
                                    
                                    
                                    $get_comp_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$this_month%'";
                                    $run_comp_appoint=mysqli_query($con, $get_comp_appoint);
                                    $count_comp_appoint=mysqli_num_rows($run_comp_appoint);
                                    
                                    $total_billed=0;
                                    while($row_tod_appoint=mysqli_fetch_array($run_comp_appoint)){
                                    
                                    $appoint_total_array = array($row_tod_appoint['total_price']);
                                    $values_total = array_sum($appoint_total_array);
                                    $total_billed +=$values_total;
                                    
                                    }
                                    $achive_percent=round(($total_billed/$target)*100).'%';
                                    
                                    if ($achive_percent=='NAN%'){
                                        $achive_percentX='0%';
                                    }else{
                                        $achive_percentX=$achive_percent;
                                    }
                                    
                                    
                                    ?>
                              <td><?php echo round($total_billed).'.00'; ?></td>
                                        <?php
                                           
                                            
                                            
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$last_month%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $total_billed_yest=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $total_billed_yest +=$values_total_yest;
                                            }
                                        ?>
                                        
                                       
                              
                              <td><?php echo $achive_percentX ; ?></td>
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