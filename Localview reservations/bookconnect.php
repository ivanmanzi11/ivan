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
echo "connection failed";
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
         $error="you already have account";
        exit();}
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
             $error="Booking failed";
        }
}
} 
mysqli_close($conn);
?>