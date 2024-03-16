<?php 

    $pos_id='Super_Admin';
    
    $get_cust="select * from pos_master where pos_id='$pos_id'";
    $run_cust=mysqli_query($con,$get_cust);
    $row_cust=mysqli_fetch_array($run_cust);
    
    $cust_name_i=ucwords(strtolower($row_cust['pos_name']));
?>

<?php
if(isset($_POST['approve'])){
    $appoint_time_pre=$_POST['appoint_time'];
    
    $appoint_id=$_POST['appoint_id'];
    
    $upd_sts1="UPDATE appointment_dump_u SET appoint_time='$appoint_time_pre', appoint_status='Pending' WHERE appoint_id='$appoint_id'";
    $run_sts1=mysqli_query($con,$upd_sts1);
    
    $upd_sts2="UPDATE appointment_dump SET appoint_time='$appoint_time_pre', appoint_status='Pending' WHERE appoint_id='$appoint_id'";
    $run_sts2=mysqli_query($con,$upd_sts2);
    
    echo "<script>window.alert('Updated Successfully')</script>";
    echo "<script>window.open('index.php','_SELF')</script>";
    
}
?>

