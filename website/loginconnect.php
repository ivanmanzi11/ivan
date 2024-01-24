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
echo "connection failed";
}
else
{
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $q="SELECT * FROM usertable WHERE (username=? OR email=?) AND password=?";
    $s=mysqli_prepare($conn,$q);
    if($s)
    {
         mysqli_stmt_bind_param($s,"sss",$email,$email,$password);
         mysqli_execute($s);
         $r=mysqli_stmt_get_result($s);
         $row=mysqli_fetch_row($r);
         if($row>=1)
         {
            $qe=mysqli_query($conn,"SELECT userRole from usertable where (username='$email' OR email='$email') AND password='$password'");
            $roww=mysqli_fetch_assoc($qe);
            if($roww['userRole']=='customer')
            {
             header("location:AMAZONA WEB2.php?usernames=".urlencode($email));
             $stmt->close();
             exit();
            }
            else if($roww['userRole']=='admin')
            {
                header("location:admin.php?usernames=".urlencode($email));
             $stmt->close();
             exit();
            }
            else{
                header("location:dashboard2.php?usernames=".urlencode($email));
             $stmt->close();
             exit();
            }
        }
         else
         {
            echo "you don't have account";
         }
    }
    else
    {
        echo "login failed";
    }
    mysqli_close($conn);
}