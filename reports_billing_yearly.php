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
            
            $nowG1=date_create($now);
            $nowG2=date_create($now);
            $nowG3=date_create($now);
            $nowG4=date_create($now);
            $nowG5=date_create($now);
            $nowG6=date_create($now);
            $nowG7=date_create($now);
            $nowG8=date_create($now);
            $nowG9=date_create($now);
            $nowG10=date_create($now);
            $nowG11=date_create($now);
            $nowG12=date_create($now);
            
            
            $m1=date_add($nowG1,date_interval_create_from_date_string("-1 month"));
            $m2=date_add($nowG2,date_interval_create_from_date_string("-2 month"));
            $m3=date_add($nowG3,date_interval_create_from_date_string("-3 month"));
            $m4=date_add($nowG4,date_interval_create_from_date_string("-4 month"));
            $m5=date_add($nowG5,date_interval_create_from_date_string("-5 month"));
            $m6=date_add($nowG6,date_interval_create_from_date_string("-6 month"));
            $m7=date_add($nowG7,date_interval_create_from_date_string("-7 month"));
            $m8=date_add($nowG8,date_interval_create_from_date_string("-8 month"));
            $m9=date_add($nowG9,date_interval_create_from_date_string("-9 month"));
            $m10=date_add($nowG10,date_interval_create_from_date_string("-10 month"));
            $m11=date_add($nowG11,date_interval_create_from_date_string("-11 month"));
            $m12=date_add($nowG12,date_interval_create_from_date_string("-12 month"));
            
            $lm1=date_format($m1,"Y-m");
            $lm2=date_format($m2,"Y-m");
            $lm3=date_format($m3,"Y-m");
            $lm4=date_format($m4,"Y-m");
            $lm5=date_format($m5,"Y-m");
            $lm6=date_format($m6,"Y-m");
            $lm7=date_format($m7,"Y-m");
            $lm8=date_format($m8,"Y-m");
            $lm9=date_format($m9,"Y-m");
            $lm10=date_format($m10,"Y-m");
            $lm11=date_format($m11,"Y-m");
            $lm12=date_format($m12,"Y-m");
            
            $last_MM=date_format($m1,"M'Y");
            
            $lm01=date_format($m1,"M'Y");
            $lm02=date_format($m2,"M'Y");
            $lm03=date_format($m3,"M'Y");
            $lm04=date_format($m4,"M'Y");
            $lm05=date_format($m5,"M'Y");
            $lm06=date_format($m6,"M'Y");
            $lm07=date_format($m7,"M'Y");
            $lm08=date_format($m8,"M'Y");
            $lm09=date_format($m9,"M'Y");
            $lm010=date_format($m10,"M'Y");
            $lm011=date_format($m11,"M'Y");
            $lm012=date_format($m12,"M'Y");                    
            
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
                          <th scope="col">Billing Count</th>
                          <th scope="col"><?php echo $this_MM; ?></th>
                          <th scope="col"><?php echo $lm01; ?></th>
                          <th scope="col"><?php echo $lm02; ?></th>
                          <th scope="col"><?php echo $lm03; ?></th>
                          <th scope="col"><?php echo $lm04; ?></th>
                          <th scope="col"><?php echo $lm05; ?></th>
                          <th scope="col"><?php echo $lm06; ?></th>
                          <th scope="col"><?php echo $lm07; ?></th>
                          <th scope="col"><?php echo $lm08; ?></th>
                          <th scope="col"><?php echo $lm09; ?></th>
                          <th scope="col"><?php echo $lm010; ?></th>
                          <th scope="col"><?php echo $lm011; ?></th>
                          <th scope="col"><?php echo $lm012; ?></th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th scope="col">POS ID</th>
                          <th scope="col">POS Name</th>
                          <th scope="col">Billing Count</th>
                          <th scope="col"><?php echo $this_MM; ?></th>
                          <th scope="col"><?php echo $lm01; ?></th>
                          <th scope="col"><?php echo $lm02; ?></th>
                          <th scope="col"><?php echo $lm03; ?></th>
                          <th scope="col"><?php echo $lm04; ?></th>
                          <th scope="col"><?php echo $lm05; ?></th>
                          <th scope="col"><?php echo $lm06; ?></th>
                          <th scope="col"><?php echo $lm07; ?></th>
                          <th scope="col"><?php echo $lm08; ?></th>
                          <th scope="col"><?php echo $lm09; ?></th>
                          <th scope="col"><?php echo $lm010; ?></th>
                          <th scope="col"><?php echo $lm011; ?></th>
                          <th scope="col"><?php echo $lm012; ?></th>
                          
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
                                
                                $get_appo_u="select * from appointment_dump_u where appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$this_month%'";
                                $run_appo_u=mysqli_query($con, $get_appo_u);
                                $row_appo_u=mysqli_fetch_array($run_appo_u);
                                $count_appo_u=mysqli_num_rows($run_appo_u);
                                
                                
                                    
                            ?>      
                            <tr>
                              <th scope="row"><?php echo $pos_id; ?></th>
                              <td><?php echo $pos_name.'-'.$pos_address; ?></td>
                              <td><?php echo $count_appo_u; ?></td>
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
                                    ?>
                              <td><?php echo round($total_billed).'.00'; ?></td>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$lm1%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby1=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby1 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$lm2%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby2=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby2 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$lm3%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby3=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby3 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$lm4%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby4=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby4 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$lm5%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby5=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby5 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$lm6%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby6=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby6 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$lm7%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby7=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby7 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$lm8%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby8=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby8 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$lm9%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby9=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby9 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$lm10%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby10=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby10 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$lm11%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby11=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby11 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$lm12%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby12=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby12 +=$values_total_yest;
                                            }
                                        ?>
 
                              
                              <td><?php echo round($tby1).'.00'; ?></td>
                              <td><?php echo round($tby2).'.00'; ?></td>
                              <td><?php echo round($tby3).'.00'; ?></td>
                              <td><?php echo round($tby4).'.00'; ?></td>
                              <td><?php echo round($tby5).'.00'; ?></td>
                              <td><?php echo round($tby6).'.00'; ?></td>
                              <td><?php echo round($tby7).'.00'; ?></td>
                              <td><?php echo round($tby8).'.00'; ?></td>
                              <td><?php echo round($tby9).'.00'; ?></td>
                              <td><?php echo round($tby10).'.00'; ?></td>
                              <td><?php echo round($tby11).'.00'; ?></td>
                              <td><?php echo round($tby12).'.00'; ?></td>
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