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
  background-color: lightcyan;
  box-shadow: 10px 10px 5px grey;
  text-decoration:none;
  color:brown;
}

div #b {
  width: 345px;
  height: 60px;
  padding: 15px;
  margin: 5px;
  background-color: lightyellow;
  box-shadow: 10px 10px 5px grey;
  color:brown;
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
    <h7><b><u>Manage Appointment</u></b></h7><br><br>
    
<?php

        if(isset($_GET['appoint_id'])){
            
            $appoint_id=$_GET['appoint_id'];
            $appo_id=$_GET['appo_id'];

        $get_appo="select * from appointment_dump_u where appoint_id='$appoint_id'";
        $run_appo=mysqli_query($con, $get_appo);
        $row_appo=mysqli_fetch_array($run_appo);
        
        $appoint_outlet_id=$row_appo['appoint_outlet_id'];
        
        
        $appoint_time=$row_appo['appoint_time'];
        $appoint_status=$row_appo['appoint_status'];
        
        $appo_date=date("d-M-Y", strtotime("$appoint_time"));
        $appo_time=date("h:ia", strtotime("$appoint_time"));
        
        $appoint_cust_id=$row_appo['appoint_cust_id'];
        
        $get_cust="select * from cust_master where cust_id='$appoint_cust_id'";
        $run_cust=mysqli_query($con, $get_cust);
        $row_cust=mysqli_fetch_array($run_cust);
        
        $cust_name=$row_cust['cust_name'];
        $cust_mobile=$row_cust['cust_mobile'];
        
        
    ?>
    
    
    <div id="a" class="form-group">
    <h6><u><b>Order Details</b></u></h6>
    <table align="left">
        <tr>
            <td><b>Order Id: <?php echo $appoint_id; ?></b></td>
        </tr>
        
        <tr>
            <td><b>Customer:</b> <?php echo substr($cust_name, 0, 22); ?></td>
            
        </tr>
        <tr>
            <td><b>Date: </b><?php echo $appo_date; ?><?php echo ' &nbsp <b>Time: </b>'.$appo_time; ?></td>
            
        </tr>
        <tr>
            <td><b>Mob:</b> <?php echo $cust_mobile; ?></td>
        </tr>
    </table>
    
    </div>
    
    <h6><u><b>Services Booked :-</b></u></h6>
    
    <div class="table-responsive">
        <table align="center" border="1"  class="table">
            <tr align="center">
                <th>Sevice Name</th>
                <th>Discount</th>
                <th>Price <br><font size="1">(After_Discount)</font></th>
                <th><font style="writing-mode: vertical-rl; text-orientation: upright;">Remove</font></th>
            </tr>
            
    <?php 
        $get_appoint="select * from appointment_dump where appoint_id='$appoint_id'";
        $run_appoint=mysqli_query($con, $get_appoint);
        $serv_count=mysqli_num_rows($run_appoint);
        
        $upd_serv_count="UPDATE appointment_dump_u SET serv_count='$serv_count' where appoint_id='$appoint_id'";
        $run_u_serv_count=mysqli_query($con, $upd_serv_count);
        
        $total_disc = 0;
        $total_price = 0;
        
        while($row_appoint=mysqli_fetch_array($run_appoint)){
            $service_id=$row_appoint['appoint_service_id'];
            $entry_id=$row_appoint['entry_id'];
            
            $appoint_disc=$row_appoint['appoint_disc'];
            
            $appoint_disc_array = array($row_appoint['appoint_disc']);
            $values_disc = array_sum($appoint_disc_array);
            $total_disc +=$values_disc;
            
            $appoint_amount_ad=$row_appoint['appoint_amount_ad'];
            
            $appoint_price_array = array($row_appoint['appoint_amount_ad']);
            $values_price = array_sum($appoint_price_array);
            $total_price +=$values_price;
            
        $get_serv="select * from service_master where serv_id='$service_id'";
        $run_serv=mysqli_query($con, $get_serv);
        $row_serv=mysqli_fetch_array($run_serv);
        
        $service_name=$row_serv['serv_name'];
    
    
    ?>

    
        <tr>
        <td>   
            <?php echo $service_name; ?>
        </td>    
        <td align="right">   
            Rs.<?php echo $appoint_disc; ?>
        </td>
        <td align="right">   
            Rs.<?php echo $appoint_amount_ad; ?>
        </td>
        
        <td >
            <a href="mon_appoint_det_Del_service.php?entry_id=<?php echo $entry_id; ?>&appoint_id=<?php echo $appoint_id; ?>&appo_id=<?php echo $appo_id; ?>" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">&#x274C;</a>
        </td>
        </tr>
    
    <?php }?>
    
        <tr>
            <td>
                <b>Total</b>
            </td>
            <td align="right">
                <b>Rs.<?php echo $total_disc;?></b>
            </td>
            <td align="right">
                <b>Rs.<?php echo $total_price;?></b>
            </td>
        </tr>
    
        </table>
    </div>
    
   <div class="container">
       <a href="mon_appoint_det_Add_service.php?appoint_id=<?php echo $appoint_id; ?>&appo_id=<?php echo $appo_id; ?>" class="btn btn-warning btn-sm">&#43; Add Service</a>
       <!--<a href="tel:<?php echo $cust_mobile; ?>" class="btn btn-primary btn-sm">&#9990; Call</a>-->
       <a href="mon_appoint_det_noShow.php?appoint_id=<?php echo $appoint_id; ?>&appo_id=<?php echo $appo_id; ?>" class="btn btn-danger btn-sm">&#63; No Show</a>
       <a href="mon_appoint_det_biLling.php?appoint_id=<?php echo $appoint_id; ?>&appo_id=<?php echo $appo_id; ?>" class="btn btn-success btn-sm">&#8377; Billing</a>
       <a href="mon_appoint_det_nCancel.php?appoint_id=<?php echo $appoint_id; ?>&appo_id=<?php echo $appo_id; ?>" class="btn btn-danger btn-sm">Cancel</a>
               
   </div>
    <br>
    <div>
        &nbsp;
    </div>
    
    
    <?php }?>

<!--Container-->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>
</div>
</body>
</html>

