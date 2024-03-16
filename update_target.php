<?php
include("../includes/db.php");
date_default_timezone_set("Asia/Kolkata");
session_start();
if(!isset($_SESSION['admin_mobile'])){
    echo "<script>window.open('login.php','_SELF')</script>";
}

else{
    $admin_mobile=$_SESSION['admin_mobile'];


                              if(isset($_GET['set_target'])){
                                  $set_target=$_GET['set_target'];
                                  $pos_id=$_GET['pos_id'];
                                  
                                  if($set_target==0){
                                        $targetx=1;
                                    }else{
                                        $targetx=$set_target;
                                    }

                                  $update_target="Update pos_master set target='$targetx' where pos_id='$pos_id'";
                                  $run_update_target=mysqli_query($con, $update_target);
                                  
                                  echo 'Success';
                                  echo "<script>window.open('reports_Target_Vs_Achivement.php','_SELF')</script>";
                              }
                              


}                              
?>