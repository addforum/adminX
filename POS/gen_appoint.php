<?php 

    $pos_id='Super_Admin';
    
    
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  background-color: lightyellow;
}

@media only screen and (max-width: 600px) {
  body {
    background-color: lightblue;
  }
}


div #a {
  width: 345px;
  height: 140px;
  padding: 15px;
  margin: 5px;
  background-color: lightcyan;
  box-shadow: 10px 10px 5px grey;
}




</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>


<!--Container-->
<div class="container-fluid">
  



  <div class="row" align="center" class="container">
   
    
    
    
    
    <div id="a">
    <form method="GET" action="gen_appoint2.php">
    <table>
        <tr>
            <td align="Left"><input type="tel" name="cust_mobile" placeholder="Enter Customer Mobile No." size="28" required/></td>
            
        </tr>
        <tr>
            <td align="Left"><input type="text" name="cust_name" placeholder="Enter Customer Name (Optional)" size="28" ></td>
            
        </tr>
        <tr>
            <td align="Right"><input class="btn btn-warning" type="submit" value="Search"></td>
        </tr>
    </table>
    </form>
    </div>
    
    
    
    
    
   
    
  </div>


</div>
<!--Container-->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

