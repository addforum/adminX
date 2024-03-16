<?php 

    $pos_id='Super_Admin';
    
    $get_cust="select * from pos_master where pos_id='$pos_id'";
    $run_cust=mysqli_query($con,$get_cust);
    $row_cust=mysqli_fetch_array($run_cust);
    
    $cust_name_i=ucwords(strtolower($row_cust['pos_name']));
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
  width: 345px;
  height: 150px;
  padding: 15px;
  margin: 5px;
  background-color: lightpink;
  box-shadow: 10px 10px 5px grey;
  text-decoration:none;
  color:green;
}

div #b {
  width: 345px;
  height: 40px;
  padding: 15px;
  margin: 5px;
  background-color: lightcyan;
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
  <a class="navbar-brand" href="#">Royal Trends - POS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Dashboard </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="gen_appoint.php">Generate Appointment <span class="sr-only">(current)</span></a>
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
  



  <div class="row" align="center" class="container">
    <h7><b><u>Manage Past Bills</u></b></h7><br><br>
    
<?php

        $get_appo="select * from appointment_dump_u where appoint_status='Billing' ORDER BY appo_id DESC";
        $run_appo=mysqli_query($con, $get_appo);
        while($row_appo=mysqli_fetch_array($run_appo)){
        
        
        $appo_id=$row_appo['appo_id'];
        $appoint_id=$row_appo['appoint_id'];
        $appoint_outlet_id=$row_appo['appoint_outlet_id'];
        
        $total_price=$row_appo['total_price'];
        $points_earned=$row_appo['points_earned'];
        
        
        $appoint_cust_id=$row_appo['appoint_cust_id'];
        
        $get_cust="select * from cust_master where cust_id='$appoint_cust_id'";
        $run_cust=mysqli_query($con, $get_cust);
        $row_cust=mysqli_fetch_array($run_cust);
        
        $cust_name=$row_cust['cust_name'];
        
        
    ?>
    
    <a href="billing_det.php?appoint_id=<?php echo $appoint_id; ?>&appo_id=<?php echo $appo_id; ?>">
    <div id="a" class="form-group">
    <h6><u><b>Billing Details</b></u></h6>
    <table align="left">
        <tr>
            <td><b>Bill No: <?php echo $appoint_id; ?></b></td>
        </tr>
        
        <tr>
            <td><b>Customer:</b> <?php echo substr($cust_name, 0, 22); ?></td>
            
        </tr>
        <tr>
            <td><b>Points Earned: </b><?php echo 'Rs.'.$points_earned; ?><?php echo ' &nbsp <b>Total Amt: </b>'.$total_price; ?></td>
            
        </tr>
    </table>
    
    </div>
    </a>
    <?php }?>



<!--Container-->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

