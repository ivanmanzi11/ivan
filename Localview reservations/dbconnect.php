<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$server="localhost";
$user="root";
$pass="";
$db="amazona";
$conn=mysqli_connect($server,$user,$pass,$db);
if($conn->connect_error)
{
die("error".$con->connect_error);
$error="connection failed";
}
else
{
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $userRole=mysqli_real_escape_string($conn,$_POST['userRole']);
    $q="SELECT * FROM usertable WHERE (username=? OR email=?) AND password=?";
    $s=mysqli_prepare($conn,$q);
         mysqli_stmt_bind_param($s,"sss",$username,$email,$password);
         mysqli_execute($s);
         $r=mysqli_stmt_get_result($s);
         $row=mysqli_fetch_row($r);
         if($row>=1){
         echo "you already have account";
        exit();}
         $query="INSERT INTO usertable(username,email,password,register_time,role) VALUES(?,?,?,now(),?)";
         $stmt=mysqli_prepare($conn,$query);
         if($stmt)
         {
         mysqli_stmt_bind_param($stmt,"ssss",$username,$email,$password,$userRole);
         mysqli_execute($stmt);
         $result=mysqli_stmt_get_result($stmt);
         if(!$result)
         {
             header("location:AMAZONA WEB2.php");
             $stmt->close();
             exit();
         }
         else
         {
             $error="something went wrong2";
         }
        }
         else
         {
             $error="something went wrong1";
        }
}
 
mysqli_close($conn);
?>