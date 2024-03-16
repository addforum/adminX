<?php 
    $pos_id='Super_Admin';
    include("../../includes/db.php");
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
  width: 395px;
  height: 150px;
  padding: 15px;
  position: relative;
  left:300px;
  top: 1px;
  border: 1px solid #73AD21;
  margin: 5px;
  background-color: lightcyan;
  box-shadow: 10px 10px 5px grey;
}

div #b {
  width: 345px;
  height: 95px;
  padding: 15px;
  position: relative;
  left:300px;
  top: 15px;
  border: 2px solid #73AD21;
  margin: 5px;
  background-color: lightyellow;
  
}



</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>


<!--Container-->
<div class="container-fluid">
  



  <div class="container">
    
    
<?php

    if(isset($_GET['cust_mobile'])){
        $cust_mobile=$_GET['cust_mobile'];
        
        
        $get_cust="select * from cust_master where cust_mobile='$cust_mobile'";
        $run_cust=mysqli_query($con, $get_cust);
        $count_cust=mysqli_num_rows($run_cust);
        
        
        if($count_cust!=0){
            $cust_type="Existing_customer";
            
        $row_cust=mysqli_fetch_array($run_cust);
        
        $cust_name_old=ucwords(strtolower($row_cust['cust_name']));
        $cust_id=$row_cust['cust_id'];
    ?>
    
    <div id="a" class="form-group">
    <form method="POST" action="">
    <table>
        <tr>
            <td>Cust Mobile: </td>
            <td align="Right"><input type="text" name="cust_mobile" value="<?php echo $cust_mobile; ?>" class="form-control" disabled/></td>
            
        </tr>
        <tr>
            <td>Cust Name: </td>
            <td align="Right"><input type="text" name="cust_name" value="<?php echo $cust_name_old; ?>" class="form-control" required/></td>
            
        </tr>
        <tr>
            <td>Appointment: </td>
            <td align="Right"><input type="datetime-local" name="appoint_time" class="form-control" required/></td>
            
        </tr>
        
    </table>
    
    </div>
    
    
    
        
        <?php
        $get_service="SELECT * FROM service_master where serv_status='ON'";
        $run_service=mysqli_query($con, $get_service);
        $count_service=mysqli_num_rows($run_service);
        
        while($row_service=mysqli_fetch_array($run_service)){
            $serv_id=$row_service['serv_id'];
            $serv_name=$row_service['serv_name'];
            $pos_id=$row_service['pos_id'];
            $serv_charge=$row_service['serv_charge'];
            $serv_discount=$row_service['serv_discount'];
            $serv_disc=($serv_discount*100).'%';
            $serv_cust_point=$row_service['serv_cust_point'];
        
        
        ?>
    <div id="b">
    <table>
        
        <tr>
            <td align="left" colspan="2"><input type="checkbox" name="service[]" value="<?php echo $serv_id; ?>"><?php echo $serv_name.'['.$pos_id.']'; ?></td>
        </tr>
        <tr>
            <td>(Rs. <?php echo $serv_charge; ?>)</td> 
            <td>(Discount: <?php echo $serv_disc; ?>)</td>
        </tr>
        
        
        
    </table>
    
    </div>
    <?php } ?>
    <div id="b">
    <table>
        
            <td>
                <input class="btn btn-success" type="submit" name="conf_app" value="Confirm Appointment" />
            </td>
        </tr>
        </form>
    </table>
    </div>
   
    <?php
    
    if(isset($_POST['conf_app'])){
        $cust_name=$_POST['cust_name'];
        $appoint_time=$_POST['appoint_time'];
        
        
        $unique_id=date("dmYhis");
        
        $appoint_id=(rand(1000,99000)).$unique_id;
        
        $outlet_id=1;
        
        
        //capturing selected services
        $Array=$_POST["service"];
    
        foreach($Array as $serv_id){
         
         $get_serv="SELECT * FROM service_master where serv_id='$serv_id'";
            $run_serv=mysqli_query($con, $get_serv);
            $row_serv=mysqli_fetch_array($run_serv);
            
            $serv_name1=$row_serv['serv_name'];
            $serv_charge1=$row_serv['serv_charge'];
            $serv_discount1=$row_serv['serv_discount'];
            $serv_disco=$serv_charge1*$serv_discount1;
            $appoint_amount_ad=$serv_charge1-$serv_disco;
            $serv_cust_point=$row_serv['serv_cust_point'];
            $appoint_status="Pending";
            
        $insert_appoint="INSERT INTO appointment_dump (appoint_id,appoint_outlet_id,appoint_cust_id,appoint_service_id,appoint_time,appoint_amount_bd,appoint_disc,appoint_amount_ad,appoint_status,points_earned) 
        values ('$appoint_id','$outlet_id','$cust_id','$serv_id','$appoint_time','$serv_charge1','$serv_disco','$appoint_amount_ad','$appoint_status','$serv_cust_point')";
        $run_appoint=mysqli_query($con, $insert_appoint);
            
        }
        
        
        
        
        $insert_appo="INSERT INTO appointment_dump_u (appoint_id,appoint_outlet_id,appoint_cust_id,appoint_time,appoint_status) 
        values ('$appoint_id','$pos_id','$cust_id','$appoint_time','$appoint_status')";
        $run_appoint=mysqli_query($con, $insert_appo);
        
        $upd_cust_master = "Update cust_master Set cust_name='$cust_name', cust_last_invoice='$appoint_id', cust_last_apoint_date='$appoint_time'  where cust_id='$cust_id'";
        $run_upd_CM=mysqli_query($con, $upd_cust_master);
        
        echo "<script>window.open('gen_appoint.php','_SELF')</script>";
    }
    
    ?>
    
    <?php        
        }
        else{
            $cust_type="New Customer";
            
            $insert_cust="INSERT INTO cust_master (cust_mobile,cust_name,cust_status,cust_pass) VALUES('$cust_mobile','$cust_name','ON','1')";
            $run_insert_cust=mysqli_query($con, $insert_cust);
            
            echo "<script>window.open('gen_appoint2.php?cust_mobile=$cust_mobile','_SELF')</script>";
        }
    }
    ?>
    
    
    
    
    
   
    
  </div>


</div>
<!--Container-->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

