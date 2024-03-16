<?php
date_default_timezone_set("Asia/Kolkata");
$date=date("dmYhis");
$date2=date("d-M-Y h:i:sa");
$appo_date1=date("d-M-Y h:i:sa", strtotime("$date"));
$appo_date=date("dmYhis", strtotime("$date"));

echo $date;

echo ("<br> <b>$date2</b>");
?>

<html>
<head>
  <meta http-equiv="refresh" content="0">
</head>
</html>