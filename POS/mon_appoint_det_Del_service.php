<?php 

    $pos_id='Super_Admin';
    
    $get_cust="select * from pos_master where pos_id='$pos_id'";
    $run_cust=mysqli_query($con,$get_cust);
    $row_cust=mysqli_fetch_array($run_cust);
    
    $cust_name_i=ucwords(strtolower($row_cust['pos_name']));

if(isset($_GET['entry_id'])){
    
    $entry_id=$_GET['entry_id'];
    $appoint_id=$_GET['appoint_id'];
    $appo_id=$_GET['appo_id'];
    
    
    $del_appserv="delete from appointment_dump where entry_id='$entry_id' AND appoint_id='$appoint_id'";
    $run_del_appserv=mysqli_query($con, $del_appserv);
    
    $get_app_u="select * from appointment_dump_u where appoint_id='$appoint_id'";
    $run_app_u=mysqli_query($con, $get_app_u);
    $row_app_u=mysqli_fetch_array($run_app_u);
    
    $serv_count=$row_app_u['serv_count'];
    
    if($serv_count==1){
        $del_appserv_u="delete from appointment_dump_u where appoint_id='$appoint_id'";
        $run_del_appserv_u=mysqli_query($con, $del_appserv_u);
        
        echo "<script>window.open('mon_appoint.php','_self')</script>";
    }
    
    else{
    echo "<script>window.open('mon_appoint_det.php?appoint_id=$appoint_id&appo_id=$appo_id','_self')</script>";
    }
}

?>