<?php 
include("connect.php");
include('session.php');
$error=$error1="";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uralumni";
$conn =mysqli_connect($servername, $username, $password, $dbname);
$userid=$_GET['userid'];
$q = mysqli_query($conn,"SELECT * FROM usertb WHERE REGNO = '$userid'");
$row = mysqli_fetch_array($q,MYSQLI_ASSOC);
$name = $row['NAMES'];
$email=$row['EMAIL'];
$role= $row['ROLE'];
$tel= $row['TELEPHONE'];
$department= $row['DEPARTMENT'];
$regno= $row['REGNO'];
$rest=mysqli_query($conn,"SELECT Department_name from department");
if ($conn->connect_error) {
    $error= "Something went wrong".mysqli_error($conn);
}
if(isset($_POST['save']))
{
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $q="SELECT * FROM usertb where email=?";
  $s=mysqli_prepare($conn,$q);
  mysqli_stmt_bind_param($s,'s',$email);
  mysqli_stmt_execute($s);
  $re=mysqli_stmt_get_result($s);
  $row=mysqli_fetch_row($re);
if (count($row)>=1){
    $name=mysqli_real_escape_string($conn,$_POST['names']);
    $tel=mysqli_real_escape_string($conn,$_POST['tel']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $department=mysqli_real_escape_string($conn,$_POST['department']);
    $role=mysqli_real_escape_string($conn,$_POST['role']);    
    $regno=mysqli_real_escape_string($conn,$_POST['regno']);
    if(empty($name)||empty($tel)||empty($email)||empty($department)||empty($regno))
    {
     $error1="All field are required";
    }
    else
    {
    $query="UPDATE usertb SET REGNO=?,NAMES=?,EMAIL=?,TELEPHONE=?,DEPARTMENT=?,ROLE=? WHERE REGNO='$userid'";
    
    $stmt=mysqli_prepare($conn,$query);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt,"ssssss",$regno,$name,$email,$tel,$department,$role);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if(!$result)
        {
            $error="Save changed successful!.";
        }
        else
        {
          $error="Something went wrong";
        }
    }
    else
      {
        $error="Something went wrong";
      }
      }
    }
    else
    {
      $error="You Alread have any account pleese login!.";
    }
}
mysqli_close($conn);
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
    .home:hover{
        background-color: #ffdb4d;
    }
    .user{
        font-family:italic;
        margin-bottom:20px;
    }
    .form2{
        width:600px;
        background-color:lightgrey;
        margin:auto;
        padding:20px;
        font-size:20px;
    }
    .text{
        height:40px;
        width:80%;
        margin-left:20px;
        padding-left:10px;
        margin-top:5px;
        border-radius:10px;
        font-size:20px;
        box-shadow:black;
    }
    #togglePassword{
    position:absolute;
    transform:translatex(-150%);
    cursor:pointer;
    padding-top:10px
    }
    #password1{
    position: relative;
    padding-right:30px;
    }
    .blue{
        color:green;
        font-size:20px;
    }
    input[type=submit]{
    background-color:green;
}
@media (max-width: 600px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .heading1 {
                margin-bottom: 10px;
            }

            .heading2 {
                text-align: center;
                margin-bottom: 10px;
            }

            .heading3 {
                order: -1;
                margin-bottom: 10px;
            }

            .col1, .col2 {
                width: 100%;
            }

            .down {
                margin-top: 10px;
            }
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
    <h1 class="blue">Account Settings for <?php  echo $name;?> Alumna:</h1>
    <p style="color:green;font-size:20px"><?php echo $error;?></p>
    <form action="" class="form2" method="post">
            <label><p>Full Name:<br>
           <input type="text" name="names" value="<?php echo $name;?>"class="text"></p>
           <p>Email:<br><input type="email" name="email"value="<?php echo $email;?>" class="text"></p>
           <p>Telephone:<br><input type="tel" name="tel" value="<?php echo $tel;?>" class="text"></p>
           <p>Department:<br><select name="department" class="text">
           <option value="<?php echo $department;?>"><?php echo $department;?></opion>
           <?php 
           $i=0;
           while($roww=mysqli_fetch_row($rest))
           {
           echo "<option disabled >".$roww[0]."</option>";
           $i++;
           }
           ?>
          </select><br>
          Who are you:<br><select  name="role" class="text">
          <option value="<?php echo $role;?>"><?php echo $role;?></opion>
             <option disabled value="Alumni user">Alumni user</option>
            <option disabled value="Alumni association Leader">Alumni association Leader</option>
            <option disabled value="administrator">administrator</option>
          </select>
          
           </p>
           <p>Registration Number:<br><input readonly type="number"value="<?php echo $regno;?>" name="regno" class="text"></p>
            
        <p><input type="submit"class="text" name="save" value="Save Change"/></p>
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