<?php 

    $pos_id='Super_Admin';
    
    $get_cust="select * from pos_master where pos_id='$pos_id'";
    $run_cust=mysqli_query($con,$get_cust);
    $row_cust=mysqli_fetch_array($run_cust);
    
    $cust_name_i=ucwords(strtolower($row_cust['pos_name']));

if($_POST["add_serv"]){
    
    $appoint_id=$_POST["appoint_id"];
    $appo_id=$_POST["appo_id"];
    
    $get_appo="select * from appointment_dump_u where appo_id='$appo_id'";
    $run_appo=mysqli_query($con, $get_appo);
    $row_appo=mysqli_fetch_array($run_appo);
    
    $outlet_id=$row_appo['appoint_outlet_id'];
    $cust_id=$row_appo['appoint_cust_id'];
    $appoint_time=$row_appo['appoint_time'];
    $appoint_status='Pending';
    
    
    
    $Array=$_POST["sel_serv"];
    
    foreach($Array as $serv_id){
        
    $get_serv="select * from service_master where serv_id='$serv_id'";
    $run_serv=mysqli_query($con, $get_serv);
    $row_serv=mysqli_fetch_array($run_serv);
    
    $serv_charge_bd=$row_serv['serv_charge'];
    $serv_disc=$row_serv['serv_discount'];
    $serv_cust_point=$row_serv['serv_cust_point'];
    $serv_disco=$serv_charge_bd*$serv_disc;
    $serv_charge_ad=$serv_charge_bd-$serv_disco;
    
        
        $insert_appoint="INSERT INTO appointment_dump (appoint_id,appoint_outlet_id,appoint_cust_id,appoint_service_id,appoint_time,appoint_amount_bd,appoint_disc,appoint_amount_ad,appoint_status,points_earned) 
        values ('$appoint_id','$outlet_id','$cust_id','$serv_id','$appoint_time','$serv_charge_bd','$serv_disco','$serv_charge_ad','$appoint_status','$serv_cust_point')";
        $run_appoint=mysqli_query($con, $insert_appoint);
        
     }

    echo "<script>window.open('mon_appoint_det.php?appoint_id=$appoint_id&appo_id=$appo_id','_self')</script>";
    
}




?>