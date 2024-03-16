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
                 $bdb=$_POST['bdb'];
                 
                 
                 if($bdb=='on'){
                     $bdb_upd='ON';
                 }else{
                     $bdb_upd='OFF';
                 }
                 
                 $upd_bdb_mode="UPDATE admins Set BDB='$bdb_upd'";
                 $run_upd_msg=mysqli_query($con, $upd_bdb_mode);
                 
                 echo "<script>window.open('my_settings.php','_SELF')</script>";
                }
                
                


}                              
?>