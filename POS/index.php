<?php

    $pos_id='Super_Admin';
    
    $get_cust="select * from pos_master where pos_id='$pos_id'";
    $run_cust=mysqli_query($con,$get_cust);
    $row_cust=mysqli_fetch_array($run_cust);
    
    $cust_name_i=ucwords(strtolower($row_cust['pos_name']));
    $pos_addr=$row_cust['pos_addr'];
    $posname=$cust_name_i.'<br>'.$pos_addr;
    ?>
    
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  background-color: lightyellow;
}

@media only screen and (max-width: 600px) {
  body {
    background-color: lightblue;
  }
}


div #a {
  color:black;    
  width: 165px;
  height: 95px;
  padding: 15px;
  margin: 5px;
  background-color: lightpink;
  box-shadow: 10px 10px 5px grey;
}

div #b {
  width: 165px;
  height: 95px;
  padding: 15px;
  margin: 5px;
  background-color: lightgreen;
  box-shadow: 10px 10px 5px grey;
}

div #b1 {
  width: 165px;
  height: 95px;
  padding: 15px;
  margin: 5px;
  background-color: lightyellow;
  box-shadow: 10px 10px 5px grey;
}

div #b2 {
  width: 165px;
  height: 95px;
  padding: 15px;
  margin: 5px;
  background-color: red;
  box-shadow: 10px 10px 5px grey;
}

div #c {
  width: 165px;
  height: 95px;
  padding: 15px;
  margin: 5px;
  background-color: pink;
  box-shadow: 10px 10px 5px grey;
}

div #d {
  width: 165px;
  height: 95px;
  padding: 15px;
  margin: 5px;
  background-color: orange;
  box-shadow: 10px 10px 5px grey;
}



</style>
<title>Royal Trends - POS</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
<!--Nav Bar-->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><font size="3" color="green"><b><?php echo $posname; ?></b></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gen_appoint.php">Generate Appointment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mon_appoint.php">Monitor Appointment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="billing.php">Billing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customer_monitor.php">Monitor Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="call_tagging.php">Call Tagging</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="offer_booster.php">Offer Booster</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="point_redeem.php">Point Redeemtion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>-->
      
    </ul>
  </div>
</nav>

<!--Nav Bar-->

<!--Container-->
<div class="container-fluid">
  


<h7><b><u>DashBoard</u></b></h7>
<h7 style="float:right;"><a href="index.php">&#8635; Refresh</a></h7>
<br><br>

  <div class="row" align="center" class="container">
    
    <?php 
    $get_new_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='C_Pending'";
    $run_new_appoint=mysqli_query($con, $get_new_appoint);
    $count_new_appoint=mysqli_num_rows($run_new_appoint);
    
    
    ?>
    <a href="mon_appoint_pending.php">
    <div id="a">
    <h5>Pending</h5>    
    <h1><?php echo $count_new_appoint; ?></h1>
    </div>
    </a>
    
    <?php if($count_new_appoint!=0){?>
    <audio src="digital_telephone_ring.mp3" autoplay="autoplay" loop="loop"></audio>
    
    
    <?php } ?>
    <?php
    $now=date("Y-m-d");
    
    $get_tod_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Pending' AND appoint_time LIKE '$now%'";
    $run_tod_appoint=mysqli_query($con, $get_tod_appoint);
    $count_tod_appoint=mysqli_num_rows($run_tod_appoint);
    
    ?>
    
    <div id="b1">
    <h5>Waiting</h5>    
    <h1><?php echo $count_tod_appoint; ?></h1>
    </div>
    
    <?php
    
    
    $get_comp_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$now%'";
    $run_comp_appoint=mysqli_query($con, $get_comp_appoint);
    $count_comp_appoint=mysqli_num_rows($run_comp_appoint);
    
    $total_billed=0;
    while($row_tod_appoint=mysqli_fetch_array($run_comp_appoint)){
    
    $appoint_total_array = array($row_tod_appoint['total_price']);
    $values_total = array_sum($appoint_total_array);
    $total_billed +=$values_total;
    }
    ?>
    
    <div id="b">
    <h5>Completed</h5>    
    <h1><?php echo $count_comp_appoint; ?></h1>
    </div>
    
    <?php
    
    
    $get_tod_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status LIKE '%Cancel%' AND appoint_time LIKE '$now%'";
    $run_tod_appoint=mysqli_query($con, $get_tod_appoint);
    $count_tod_appoint=mysqli_num_rows($run_tod_appoint);
    ?>
    
    <div id="b2">
    <h5>Cancelled</h5>    
    <h1><?php echo $count_tod_appoint; ?></h1>
    </div>
    
    <div id="c">
    <h5>Billed Today</h5>    
    <h2>&#8377; <?php echo $total_billed; ?></h2>
    </div>
    
    <?php
    $nowG=date_create($now);
    $nowP=date_add($nowG,date_interval_create_from_date_string("-1 days"));
    $yesterday=date_format($nowP,"Y-m-d");
    
    $get_yest_appoint="SELECT * FROM appointment_dump_u WHERE appoint_outlet_id='$pos_id' AND appoint_status='Billing' AND appoint_time LIKE '$yesterday%'";
    $run_yest_appoint=mysqli_query($con, $get_yest_appoint);
    
    $total_billed_yest=0;
    while($row_yest_appoint=mysqli_fetch_array($run_yest_appoint)){
    
    $appoint_total_array_yest = array($row_yest_appoint['total_price']);
    $values_total_yest = array_sum($appoint_total_array_yest);
    $total_billed_yest +=$values_total_yest;
    }
    ?>
    
    <div id="d">
    <h5>Yesterday</h5>    
    <h2>&#8377; <?php echo $total_billed_yest; ?></h2>
    </div>
    

  </div>
<br>
<br>
  <div>
      <!-- The text field -->
    <input type="text" value="https://royaltrends.in/notify.php?i=<?php echo $pos_id; ?>" id="myInput" disabled>

    <!-- The button used to copy the text -->
    <button onclick="myFunction1()">Copy Link</button>
  </div>
  
    <script>
        function myFunction1() {
      /* Get the text field */
      var copyText = document.getElementById("myInput");
    
      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/
    
      /* Copy the text inside the text field */
      document.execCommand("copy");
    
      /* Alert the copied text */
      alert("Copied the text: " + copyText.value);
    }
    </script>
</div>
<!--Container-->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

