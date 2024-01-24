<?php 
include("connect.php");
include('session.php');
$userid=$_GET['userid'];
$error=$error1="";
if($conn)
    {
        $q = mysqli_query($conn,"SELECT * FROM usertb WHERE REGNO = '$userid'");
        $row = mysqli_fetch_array($q,MYSQLI_ASSOC);
        $name = $row['NAMES'];
        $email1=$row['EMAIL'];
        $department= $row['DEPARTMENT'];
        $regno= $row['REGNO'];
        $role= $row['ROLE'];
        $date=$row['DATES']; 
        $s=$row['STATUS'];
        if(isset($_POST['deactivate']))
        {
            if($login_session==$name)
            { 
                $error="You can not deactivate your self!.";
            }
            else
            {
            $result=mysqli_query($conn,"SELECT STATUS from usertb WHERE REGNO='$userid'");
            $r=$result->fetch_row();
            if($r[0]==1)
            $error="First disapprove this user!";
            else
            {
            $result=mysqli_query($conn,"DELETE FROM usertb WHERE REGNO='$userid'");
            if($result)
            $error="User Diactivated successful!";
            else
            $error="Operation failed";
            }
        }
       }  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UR alumni profile</title>
</head>
<link
    rel="stylesheet"
    type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
     />
<style>
    body,html{
        background-color: rgba(128, 128, 128, 0.334);
        padding: 0;
        margin: 0;
        font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    }
    header{
        background-image: linear-gradient(to left,white,lightblue,gray,lightgreen,lightgray);
        margin: auto;
        background-color: dodgerblue;
        display: grid;
        height: auto;
        border-radius: 30px;
        width: 80%;
        height: 100px;
        cursor: pointer;
    }
    .heading1{
        padding-left: 0px;
        font-size: 20px;
        /*margin: auto;*/
        grid-column: 1;
    }
    .heading2{
        padding-top:6px;
        text-align: center;
        grid-column: 2;
        text-align:left;
    }
    .heading3{
        margin: auto;
        grid-column: 3;
        float: right;
    }
    .heading3 h2 img{
        grid-column: 3;
        border-radius: 50%;
        border: 2px greenyellow double solid;
        width: 40px;
        height: 40px;
        padding-top:12px;
    }
    .heading1 h1 a{
        padding-left: 150px;
        text-decoration: none;
        color: dodgerblue;
    }
    .heading2 h1 b{
        color:white;
    }
    main{
        display: flex;
        padding-top: 0;
        padding-left: 000px;
        padding-right: 100px;
    }
     .col1{
        /*grid-column: 1;*/
        height: auto;
        width: 200px;
        margin-left: 100px;
        padding: 50px;
        border-right: 2px solid white;
    }
    .down{
        margin-top: 400px;
        align-items: last baseline;
    }
    a{
        text-decoration:none;
    }
    .home{
       /* text-decoration:none;*/
        padding:10px;
        margin-bottom:5px;
        width: 200px !important;
        background-color: dodgerblue;
        color: white;
        text-align: center;
        border-radius: 10px;
        font-style: bold;
        font-size: 20px;
        cursor: pointer;
    }
      .col2{
        padding: 10px;
        /*grid-column: 2;*/
        width: 75%;
        height: auto;
        margin-left:0;
        margin-right:200px;
    }
    hr{
        padding: 0;
        margin: 0;
    }
    .footercontent{
        margin: auto;
        width: 80%;
    }
    .footercontent ul{
        list-style: none;
        display: inline-block !important;
        text-align: center;
    }
    .footercontent ul li{
        display: inline;
        padding: 5px;
        margin: 2px;
        font-size: 15px;
        border-right: 2px white solid;
        border-radius: 1px;
        cursor: pointer;
    }
    .footercontent ul li a{
        text-decoration: none;
        text-align: center;
        font-size: 20px;
    }
    .fa-plus{
        font-size: 50px;
    }
    .home:hover{
        background-color: #ffdb4d;
    }
    .user{
        font-family:italic;
        margin-bottom:20px;
    }
    .blue{
        color:green;
        font-size:20px;
    }
    .form {
        max-width: 400px;
        margin-top: 20px;
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding-right:50px;
}
input[type=submit],#message{
    background-color:green;
}
input,
      textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      .table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}
.table tbody tr:nth-child(even) {
    background-image: linear-gradient(to left,white,gray);
}
</style>
<body>
 <header>
    <div class="heading1">
    <h1><a href="profile.php">Admin DASHBOARD</a></h1>
    </div>
   <div class="heading2"><h1><b>UR Alumni Network</b></h1></div>
    <div class="heading3">
    <a href="userdata.php"><h2 class="user"><?php echo $login_session;?>&nbsp;&nbsp;<img src="pic/Untitled.png" alt="images"></h2></a>
    </div>
 </header> 
 <hr>  
 <main>
    <div class="col1">
    <a href="#"><div class="home"></i></i>Overview</div></a>
        <a href="user.php"><div class="home"><i class="fa-solid fa-user" style="color: #000000;"></i>Users</div></a>
        <a href="#"><div class="home"><i class="fa-solid fa-pen-nib" style="color: #63452c;"></i>Groups</div></a>
        <a href="#"><div class="home"><i class="fa-solid fa-people-robbery" style="color: #241f31;"></i>Messages</div></a>
        <a href="#"><div class="home"><i class="fa-brands fa-cc-discover"></i></i>Review posts</div></a>
        <a href="#"><div class="home"><i class="fa-solid fa-gift"></i>Events Plan</div></a>
        <div class="down">
            <!--<div class="home"><a><i class="fa-solid fa-right-to-bracket"></i>Login</a></div>-->
            <a href="logout.php" onclick="logout()"><div class="home">Logout</div></a>
            <script>
                function logout(){
                    var r=confirm("Do you want to logout?");
                    if(r==true)
                    {
                        <?php header("location:logout.php");?>
                    }
                }
            </script>
        </div>
            </div>
    <div class="col2">
        <br><br>
        <h1 class="blue">Account deletion to <?php  echo $name." by ".$login_session;?>:</h1>
        <p id="message"><?php echo $error?></p>
        <details>
        <summary><b>Click here to Deactivate</b> </summary>
        <table class="table">
        <tr>
            <td><b>Registration Number:</b> </td>
            <td><?php  echo $regno;?></td> 
        </tr>
        <tr>
            <td><b>Full Name:</b> </td>
            <td><?php  echo " ".$name;?></td>
        </tr>
            <td>Email:</td>
            <td><?php  echo " ".$email1;?></td>
        </tr>
        <tr>
            <td><b>Department:</b> </td>
            <td><?php  echo " ".$department;?></td>
        </tr>
        </table>
        <br>
        <br>
        <form class="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <p><span class="blue">Account deletion process:</span></p>
            <p>User status: <?php echo ($s==1)?"<b style=\"color:green\">APPROVED</b>":"<b style=\"color:red\">NOT APPROVED</b>";?></p>
            <p>Reason(s):<b id='red'>*</b></p>
            <textarea name="comment" id=""  rows="4"></textarea><br>
            <input type="submit" name="deactivate" value="Delete">
        </form>
    </div>
 </main>
 <hr>
 <footer>
    <div class="footercontent">
        <ul>
            <li><a href="aboutus.php"> About Us</a></li>
            <li><a href="contact us.php">Contact Us</a> </li>
            <li><a href="support.php">Get Support</a> </li>
            <li><a href="feedback.php">Give Feedback</a> </li>
        </ul>
    </div>
  <p align="center">&copy;2024 University of Rwanda Alumni Network all right are reserved.</p>
 </footer>
</body>
</html>