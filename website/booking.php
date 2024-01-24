<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$server="localhost";
$user="root";
$pass="";
$db="amazona";
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
    <style>
      *{
    margin: 0%;
    padding: 0%;
    font-family: sans-serif;
}
.banner{
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(245, 245, 249, 0.75),rgba(245, 245, 249, 0.75)),url(background4.png);
    background-size: cover;
    background-position: center;

}
.form{
    width: 380px;
    height: 350px;
    background: linear-gradient(to top,rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
    position: absolute;
    top: 50px;
    left: 500px;
    border-radius: 10px;
    padding: 25px;
}
.form h2{
    width: 290px;
    font-family: sans-serif;
    text-align: center;
    color: orange;
    font-size: 22px;
    background-color: #fff;
    border-radius: 10px;
    margin: 2px;
    padding: 8px;
}
.form input{
    width: 360px;
    height: 35px;
    background: transparent;
    border-bottom: 1px solid orange;
    border-top: none;
    border-right: none;
    border-left: none;
    color: #fff;
    font-size: 15px;
    letter-spacing: 1px;
    margin-top: 5px;
    font-family: sans-serif;
}
.form input:focus{
    outline: none;
}
::placeholder{
    color: #fff;
    font-family: Arial;
}
.form label{
    color: orange;
}
.form button{
    width: 120px;
    height: 30px;
    background-color: orange;

}
.navbar h1{
    color: orange;
}
.navbar h1{
    color: orange;
}
.navbar table tr th{
    color: orange;
}
.navbar table tr td{
    color: white;
}
    </style>
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