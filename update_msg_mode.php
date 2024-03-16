<?php
include("../includes/db.php");
date_default_timezone_set("Asia/Kolkata");
session_start();
if(!isset($_SESSION['admin_mobile'])){
    echo "<script>window.open('login.php','_SELF')</script>";
}

else{
    $admin_mobile=$_SESSION['admin_mobile'];


                
                if(isset($_POST['upd_mode'])){
                 $sms=$_POST['sms'];
                 $whatsapp=$_POST['whatsapp'];
                 
                 if($sms=='on'){
                     $sms_upd='ON';
                 }else{
                     $sms_upd='OFF';
                 }
                 
                 if($whatsapp=='on'){
                     $whatsapp_upd='ON';
                 }else{
                     $whatsapp_upd='OFF';
                 }
                 
                 $upd_msg_mode="UPDATE admins Set SMS='$sms_upd', Whatsapp='$whatsapp_upd'";
                 $run_upd_msg=mysqli_query($con, $upd_msg_mode);
                 
                 echo "<script>window.open('my_settings.php','_SELF')</script>";
                }
                
                


}                              
?>