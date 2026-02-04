<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$server="localhost";
$user="root";
$pass="";
$db="booking";
$conn=mysqli_connect($server,$user,$pass,$db);
$error="";
if($_SERVER['REQUEST_METHOD']=="POST")
{
if($conn->connect_error)
{
die("error".$con->connect_error);
$error="connection failed";
}
else
{
    $businessname=mysqli_real_escape_string($conn,$_POST['businessname']);
    $productname=mysqli_real_escape_string($conn,$_POST['productname']);
    $unit=mysqli_real_escape_string($conn,$_POST['unit']);
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $q="INSERT INTO bookings VALUES(?,?,?,?,NOW())";
    $s=mysqli_prepare($conn,$q);
    mysqli_stmt_bind_param($s,"ssss",$username,$businessname,$productname,$unit);
     mysqli_stmt_execute($s);
    $result=mysqli_stmt_get_result($s);
     if($result){
      $error="Booking failed";
        }
      /*   $query="INSERT INTO usertable(businessname,productname,unit,booking_time,username) VALUES(?,?,?,now(),?)";
         $stmt=mysqli_prepare($conn,$query);
         if($stmt)
         {
         mysqli_stmt_bind_param($stmt,"ssss",$username,$email,$password,$userRole);
         mysqli_execute($stmt);
         $result=mysqli_stmt_get_result($stmt);
         if(!$result)
         {
             header("location:Dashboard.php");
             $stmt->close();
             exit();
         }
         else
         {
             echo "something went wrong";
         }
        }*/
         else
         {
          $error="Booking is done successfull!!";
             
        }
}
} 
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Products&Prices</title>
    <link rel="stylesheet" type="text/css" href="booking.css">
</head>
<body>
    <?php echo $error;?>
<form action="" method="post">
  <div class="banner">
      <div class="navbar">  
<div class="form">
  <h2> BOOKING FORM</h2>
  <br/>
    <input type="text" name="businessname" placeholder="Enter business name"></input><br>
      <label>Enter business name</label><br>
    <input type="text" name="productname" placeholder="Enter product name"></input><br>
      <label>Enter product name</label><br>

    <input type="text" name="unit" placeholder="Describe the unit of products you want to book "></input><br>
      <label>Describe the unit of products you want to book</address></label><br>
      
      <input type="text" name="username" placeholder="Enter your name"></input><br>
      <label>Customer username</label><br/><br/>
    <button type="submit">Book</button></div>
  </div>
    
  </div>
</form>
  </body>
</html>