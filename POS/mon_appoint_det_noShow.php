<?php 

    $pos_id='Super_Admin';
    
    $get_cust="select * from pos_master where pos_id='$pos_id'";
    $run_cust=mysqli_query($con,$get_cust);
    $row_cust=mysqli_fetch_array($run_cust);
    
    $cust_name_i=ucwords(strtolower($row_cust['pos_name']));

if(isset($_GET['appoint_id'])){
    
    
    $appoint_id=$_GET['appoint_id'];
    $appo_id=$_GET['appo_id'];
    
    $upd_app="UPDATE appointment_dump SET appoint_status='noShow' where appoint_id='$appoint_id'";
    $run_upd_app=mysqli_query($con, $upd_app);
    
    $upd_app_u="UPDATE appointment_dump_u SET appoint_status='noShow' where appo_id='$appo_id'";
    $run_upd_app_u=mysqli_query($con, $upd_app_u);
    
    echo "<script>window.open('mon_appoint.php','_self')</script>";
    
    //echo "<script>window.open('mon_appoint_det.php?appoint_id=$appoint_id&appo_id=$appo_id','_self')</script>";
    
}


?>