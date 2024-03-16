<?php
session_start();

unset($_SESSION['admin_mobile']);

echo "<script>window.open('index.php','_self')</script>";

?>