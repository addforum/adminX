<?php
include("../includes/db.php");
date_default_timezone_set("Asia/Kolkata");
session_start();
?>
<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

     
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
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_status='Billing' AND appoint_time LIKE '$lm1%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby1=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby1 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE  appoint_status='Billing' AND appoint_time LIKE '$lm2%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby2=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby2 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE  appoint_status='Billing' AND appoint_time LIKE '$lm3%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby3=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby3 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE  appoint_status='Billing' AND appoint_time LIKE '$lm4%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby4=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby4 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE  appoint_status='Billing' AND appoint_time LIKE '$lm5%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby5=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby5 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE  appoint_status='Billing' AND appoint_time LIKE '$lm6%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby6=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby6 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE  appoint_status='Billing' AND appoint_time LIKE '$lm7%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby7=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby7 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE  appoint_status='Billing' AND appoint_time LIKE '$lm8%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby8=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby8 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE  appoint_status='Billing' AND appoint_time LIKE '$lm9%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby9=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby9 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE  appoint_status='Billing' AND appoint_time LIKE '$lm10%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby10=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby10 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE  appoint_status='Billing' AND appoint_time LIKE '$lm11%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby11=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby11 +=$values_total_yest;
                                            }
                                        ?>
                                        <?php
                                            $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE  appoint_status='Billing' AND appoint_time LIKE '$lm12%'";
                                            $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
                                            
                                            $tby12=0;
                                            while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
                                            
                                            $appoint_total_array_yest = array($row_yest_appoint['total_price']);
                                            $values_total_yest = array_sum($appoint_total_array_yest);
                                            $tby12 +=$values_total_yest;
                                            }
                                        ?>
     
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['<?php echo $lm1; ?>', 3],
          ['<?php echo $lm2; ?>', 3],
          ['<?php echo $lm3; ?>', 3],
          ['<?php echo $lm4; ?>', 3],
          ['<?php echo $lm5; ?>', 3],
          ['<?php echo $lm6; ?>', 3],
          ['<?php echo $lm7; ?>', 3],
          ['<?php echo $lm8; ?>', 3],
          ['<?php echo $lm9; ?>', 3],
          ['<?php echo $lm10; ?>', 3],
          ['<?php echo $lm11; ?>', 3],
          ['<?php echo $lm12; ?>', 3],
          
        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div_pie'));
        chart.draw(data, options);
      }
    </script>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales'],
          ['<?php echo $lm12; ?>', <?php echo $tby12; ?>],
          ['<?php echo $lm11; ?>', <?php echo $tby11; ?>],
          ['<?php echo $lm10; ?>', <?php echo $tby10; ?>],
          ['<?php echo $lm9; ?>', <?php echo $tby9; ?>],
          ['<?php echo $lm8; ?>', <?php echo $tby8; ?>],
          ['<?php echo $lm7; ?>', <?php echo $tby7; ?>],
          ['<?php echo $lm6; ?>', <?php echo $tby6; ?>],
          ['<?php echo $lm5; ?>', <?php echo $tby5; ?>],
          ['<?php echo $lm4; ?>', <?php echo $tby4; ?>],
          ['<?php echo $lm3; ?>', <?php echo $tby3; ?>],
          ['<?php echo $lm2; ?>', <?php echo $tby2; ?>],
          ['<?php echo $lm1; ?>', <?php echo $tby1; ?>],
          
          
          
          
          
          
          
          
          
          
          

        ]);

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div_area'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div_pie"></div>
    <div id="chart_div_area" style="width: 100%; height: 500px;"></div>
  </body>
</html>