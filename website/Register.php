<?php
/*
error_reporting(E_ALL);
ini_set('display_errors',1);
$server="localhost";
$user="root";
$pass="";
$db="amazona";
$error='';
$conn=mysqli_connect($server,$user,$pass,$db);
if($_SERVER['REQUEST_METHOD']=="POST")
{
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
        exit();
         }
         $query="INSERT INTO usertable VALUES(?,?,?,now(),?)";
         $stmt=mysqli_prepare($conn,$query);
         if($stmt)
         {
         mysqli_stmt_bind_param($stmt,"ssss",$username,$email,$password,$userRole);
         mysqli_execute($stmt);
         $result=mysqli_stmt_get_result($stmt);
         if(!$result)
         {
            if($userRole=='Customer')
            {
             header("location:admin.php");
             $stmt->close();
             exit();
            }
            else if($userRole=='Admin')
            {
                header("location:AMAZONA WEB2.php");
             $stmt->close();
             exit();
            }
            else{
                header("location:AMAZONA WEB2.php");
             $stmt->close();
             exit();
            }
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
}
mysqli_close($conn);
*/
?>
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
die("error".$conn->connect_error);
$error="connection failed";
}
else if(isset($_POST['register']))
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
         $query="INSERT INTO usertable(username,email,password,register_time,userRole) VALUES(?,?,?,now(),?)";
         $stmt=mysqli_prepare($conn,$query);
         if($stmt)
         {
         mysqli_stmt_bind_param($stmt,"ssss",$username,$email,$password,$userRole);
         mysqli_execute($stmt);
         $result=mysqli_stmt_get_result($stmt);
         if(!$result)
         {
            $qe=mysqli_query($conn,"SELECT userRole from usertable where username='$username'");
            $row=mysqli_fetch_assoc($qe);
            if($row['userRole']=='customer')
            {
             header("location:AMAZONA WEB2.php?usernames=".urlencode($email));
             $stmt->close();
             exit();
            }
            else if($row['userRole']=='admin')
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
             echo "something went wrong".mysqli_error($conn);
         }
        }
         else
         {
             echo "something went wrong".mysqli_error($conn);
        }
}
 
mysqli_close($conn);
?>
<html>
    <head>
        <title>Login and Registration Website</title>
        <style>
            .margin{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppians', sans-serif;
}
.banner{
    width: 100%;
    height: 100%;
    background-image: linear-gradient(rgba(245, 245, 249, 0.75),rgba(245, 245, 249, 0.75)),url(background4.png);
    background-size: cover;
    background-position: center;
}
.wrapper{
    position: relative;
    width: 400px;
    height: 440px;
    background: transparent;
    border: 2px solid orange;
    display: flex;
    justify-content: center;
    align-items: center;
   
}
.wrapper form{
    width: 100%;
    padding: 40px;
}
.form h1{
    font-size: 2em;
    color: orange;
    text-align: center;
}
.input-box{
    position: relative;
    width: 100%;
    height: 50px;
    border-bottom: 2px solid orange;
    margin: 30px 0;
}


.body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
.form{
    width: 250px;
    height: 400px;
    background: linear-gradient(to top,rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
    position: absolute;
    top: 50px;
    left: 500px;
    border-radius: 10px;
    padding: 25px;
}
.form input{
    width: 240px;
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
input[type=submit]{
    width: 120px;
    height: 30px;
    background-color: orange;

}
.form label input{
    width: 20px;
    height: 20px;
}
.form p{
    color: orange;
}
        </style>
    </head>
    <body>
        <div class="banner">
         <form action="#" method="post"> 
                <div class="form">
                    <h1>Register</h1>
                    <p><?php// echo $error;?></p>
                    <input type="text" name="username" placeholder="Username"></input><br>
                    <label>Username</label><br/>


                    <input type="email" name="email" placeholder="Email"><br/>
                    <label>Email</label><br/>

                    <input type="password" name="password" placeholder="Password"><br/>
                    <label>Password</label><br/><br/>

                    <label for="userRole">Who are you?</label>
                    <select id="userRole" name="userRole" required>
                    <option value="" disabled selected>Select your role</option>
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                    <option value="Agent">Agent</option>
                    </select><br/><br/>

                    <label><input type="checkbox" name="option1">I agree to the terms & conditions</label><br/><br/>
                    

                    <input type="submit"name="register" class="btn" value="Register"><br/>

                    <div class="Login-register">
                    <p>Already have an account? <a href="Login.php" class="register-link">Login</a></p>
                    </div>
                </div>
            </form>
        </div>
    
        
    </body>
</html>