<?php
include("../includes/db.php");

$get_M="Select * from months";
$run_M=mysqli_query($con, $get_M);
while($row_M=mysqli_fetch_array($run_M)){

$Mon_I=$row_M['MonthYear'];

echo $Mon_I.'<br>';
}
?>