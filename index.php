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

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);
      
      </script>
      
      

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
            date_default_timezone_set("Asia/Kolkata");
            $this_month=date("Y-m");
            $this_year=date("Y");
            $this_MM=date("M-Y");
            $now=date("Y-m-d");
            

            $get_months_x="select * from months where MonthYear='$this_month'";
            $run_months_x=mysqli_query($con, $get_months_x);
            $count_months_x=mysqli_num_rows($run_months_x);
            
            if($count_months_x==0){
            
            $ins_this_M="INSERT INTO months (MonthYear,MonthYear2) values('$this_month','$this_MM')";
            $run_this_M=mysqli_query($con,$ins_this_M);
            
            }
            

            ?>
                                    <?php
                                    
                                    
                                    $get_comp_appoint="SELECT * FROM appointment_dump_u WHERE appoint_status='Billing' AND appoint_time LIKE '$this_year%'";
                                    $run_comp_appoint=mysqli_query($con, $get_comp_appoint);
                                    $count_comp_appoint=mysqli_num_rows($run_comp_appoint);
                                    
                                    $tyy=0;
                                    while($row_tod_appoint=mysqli_fetch_array($run_comp_appoint)){
                                    
                                    $appoint_total_array = array($row_tod_appoint['total_price']);
                                    $values_total = array_sum($appoint_total_array);
                                    $tyy +=$values_total;
                                    }
                                    ?>
                                    
                                    <?php
                                    
                                    
                                    $get_comp_appoint="SELECT * FROM appointment_dump_u WHERE appoint_status='Billing' AND appoint_time LIKE '$this_month%'";
                                    $run_comp_appoint=mysqli_query($con, $get_comp_appoint);
                                    $count_comp_appoint=mysqli_num_rows($run_comp_appoint);
                                    
                                    $tmy=0;
                                    while($row_tod_appoint=mysqli_fetch_array($run_comp_appoint)){
                                    
                                    $appoint_total_array = array($row_tod_appoint['total_price']);
                                    $values_total = array_sum($appoint_total_array);
                                    $tmy +=$values_total;
                                    }
                                    ?>
                                    
                                    

                                        
                                    <?php
                                    $get_cust="SELECT * FROM cust_master WHERE cust_status='ON' AND cust_last_apoint_date LIKE '$this_year%'";
                                    $run_cust=mysqli_query($con, $get_cust);
                                    $count_cust=mysqli_num_rows($run_cust);
                                    
                                    
                                    $get_cust_total="SELECT * FROM cust_master WHERE cust_status='ON'";
                                    $run_cust_total=mysqli_query($con, $get_cust_total);
                                    $count_cust_total=mysqli_num_rows($run_cust_total);
                                    
                                    $billed_cust_percent=($count_cust/$count_cust_total)*100;
                                    
                                    
                                    $get_pending_req="SELECT * FROM appointment_dump_u WHERE appoint_status='Pending' AND appoint_time LIKE '$this_year%'";
                                    $run_pending_req=mysqli_query($con, $get_pending_req);
                                    $count_pending_req=mysqli_num_rows($run_pending_req);
                                    ?>
                                    



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download in PDF</a>-->
          </div>

          <!-- Content Row -->
          <div class="row">
            
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs.<?php echo  round($tmy); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class=" fa-2x text-gray-300"><b>₹</b></i>    
                      <!--<i class="fas fa-calendar fa-2x text-gray-300"></i>-->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rs.<?php echo  round($tyy); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class=" fa-2x text-gray-300"><b>₹</b></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Billed Customer(TY)</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo  round($count_cust); ?></div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo round($billed_cust_percent); ?>%" aria-valuenow="<?php echo round($billed_cust_percent); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-1x text-gray-400"><?php echo round($billed_cust_percent); ?>%</i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Bills</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_pending_req; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa-2x text-gray-300">!!!</i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          
          
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Monthly Overview - Sales</h6>
                  <div class="dropdown no-arrow">


                  </div>
                  
                  
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                        <script type="text/javascript">
                          google.charts.load('current', {'packages':['corechart']});
                          google.charts.setOnLoadCallback(drawChart);
                    
                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                              ['Month', 'Sales'],
                              
                              <?php
                                
                                
                                $get_M="SELECT * FROM (Select * from months ORDER BY id DESC LIMIT 12) Var1 ORDER BY id ASC";
                                $run_M=mysqli_query($con, $get_M);
                                while($row_M=mysqli_fetch_array($run_M)){
                                
                                $Mon_I=$row_M['MonthYear'];
                                
                                
                                    $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_status='Billing' AND appoint_time LIKE '$Mon_I%'";
                                    $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                    
                                    $tby=0;
                                    while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                    
                                    $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                    $values_total_yest = array_sum($appoint_total_array_yest);
                                    $tby +=$values_total_yest;
                                    }
                                 
                                echo "['".$Mon_I."',".$tby."],";
                                }
                                ?>
                              
                              
                              
                              
                    
                            ]);
                    
                            var options = {
                              title: '',
                              hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
                              vAxis: {minValue: 0}
                            };
                    
                            var chart = new google.visualization.AreaChart(document.getElementById('chart_div_area'));
                            chart.draw(data, options);
                          }
                        </script>
                    
                        
                        
                        <div id="chart_div_area" style="width: 100%; height: 340px;"></div>
                    
                  </div>
                </div>
              </div>
            </div>

            
            
            <!-- Pie Chart -->
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Target Vs Achievement</h6>
                </div>
                <div class="card-body">
                
                <?php
                    
                    $get_POS="SELECT * FROM pos_master WHERE pos_status='ON' ORDER BY target DESC";
                    $run_POS=mysqli_query($con, $get_POS);
                    while($row_POS=mysqli_fetch_array($run_POS)){
                        
                        $pos_idi=$row_POS['pos_id'];
                        $pos_name=$row_POS['pos_name'];
                        $pos_addr=$row_POS['pos_addr'];
                        $target=$row_POS['target'];
                        
                        if($target==0){
                            $targetx=1;
                        }else{
                            $targetx=$target;
                        }
                    
                        $get_tm_billed_pos="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_idi' AND appoint_status='Billing' AND appoint_time LIKE '$this_month%'";
                        $run_tm_billed_pos=mysqli_query($con, $get_tm_billed_pos);
                        
                        $tm_billed_pos=0;
                        while($row_tm_billed_pos=mysqli_fetch_array($run_tm_billed_pos)){
                        
                        $appoint_total_tm_billed_pos = array($row_tm_billed_pos['total_price']);
                        $values_total_tm_billed_pos = array_sum($appoint_total_tm_billed_pos);
                        $tm_billed_pos +=$values_total_tm_billed_pos;
                        
                        
                        }
                        $achive_cent=round(($tm_billed_pos/$targetx)*100);
                    
                        if ($achive_cent=='NAN'){
                                        $achive_centX='0%';
                                    }else{
                                        $achive_centX=$achive_cent;
                                    }
                    
                    ?>
                    
                        
                  <h4 class="small font-weight-bold"><?php echo $pos_name.'- '.$pos_addr.' ('.$pos_idi.')';?> <span class="float-right"><?php echo round($achive_cent); ?>%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $achive_centX; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="<?php echo $target; ?>"></div>
                  </div>
                  <?php
                    
                        
                    }
                  ?>
                  
                  
                </div>
              </div>

              <!-- Color System --
              <div class="row">
                <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                      Primary
                      <div class="text-white-50 small">#4e73df</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      Success
                      <div class="text-white-50 small">#1cc88a</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                      Info
                      <div class="text-white-50 small">#36b9cc</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                      Warning
                      <div class="text-white-50 small">#f6c23e</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                      Danger
                      <div class="text-white-50 small">#e74a3b</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                      Secondary
                      <div class="text-white-50 small">#858796</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div class="card bg-light text-black shadow">
                    <div class="card-body">
                      Light
                      <div class="text-black-50 small">#f8f9fc</div>
                    </div>
                  </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="card bg-dark text-white shadow">
                  <div class="card-body">
                      Dark
                      <div class="text-white-50 small">#5a5c69</div>
                  </div>
                </div>
              </div>
            </div>
                -->
            </div>
            
            <script type="text/javascript">
              google.charts.load("current", {packages:["corechart"]});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Task', 'Hours per Day'],
                    <?php
                    
                    $get_POS="SELECT * FROM pos_master WHERE pos_status='ON' ORDER BY pos_id ASC";
                    $run_POS=mysqli_query($con, $get_POS);
                    while($row_POS=mysqli_fetch_array($run_POS)){
                        
                        $pos_idi=$row_POS['pos_id'];
                        $pos_name=$row_POS['pos_name'];
                        $pos_addr=$row_POS['pos_addr'];
                    
                        $get_tm_billed_pos="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_idi' AND appoint_status='Billing' AND appoint_time LIKE '$this_month%'";
                        $run_tm_billed_pos=mysqli_query($con, $get_tm_billed_pos);
                        
                        $tm_billed_pos=0;
                        while($row_tm_billed_pos=mysqli_fetch_array($run_tm_billed_pos)){
                        
                        $appoint_total_tm_billed_pos = array($row_tm_billed_pos['total_price']);
                        $values_total_tm_billed_pos = array_sum($appoint_total_tm_billed_pos);
                        $tm_billed_pos +=$values_total_tm_billed_pos;
                        }
                    
                    ?>
                  
                  ['<?php echo $pos_idi; ?>',     <?php echo round($tm_billed_pos); ?>],
                 
                  
                  <?php } ?>
                ]);
        
                var options = {
                  title: '',
                  is3D: true,
                };
        
                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
              }
            </script>
            
                        

            <div class="col-lg-6 mb-3">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Monthly Revenue Share (POS Wise)</h6>
                </div>
                <div class="card-body">
                  <div id="piechart_3d" style="width: 100%; height: 300px;"></div>
                </div>
              </div>


              <!-- Approach --
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
                  <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
                </div>
              </div>
                -->
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
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php } ?>