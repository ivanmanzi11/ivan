<?php 
include("connect.php");
include('session.php');
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
       
    }
     .col1{
        /*grid-column: 1;*/
        height: auto;
        width: 200px;
       
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
    background-color: #f2f2f2;
}
.home button:hover{
        background-color: #ffdb4d;
      }
      .home1{
        padding:10px;
        margin-bottom:5px;
        width: 120px !important;
        background-color: dodgerblue;
        color: white;
        text-align: center;
        border-radius: 10px;
        font-style: bold;
        font-size: 20px;
        cursor: pointer;
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
    <?php
        include 'connect.php';
            echo "<br><br><h1 align=\"center\">All Users:</h1>";
            echo "<p><a href=\"createuser.php\"><div class=\"home right\"><i class=\"fa-solid fa-user\" style=\"color: #000000;\"></i> Create a Users</div></a></p>";
            $query = "SELECT * FROM usertb";
            $stmt = mysqli_prepare($conn, $query);
        if ($stmt)
        {
            echo "<table class=\"table\" width=\"100\" height=\"100\">";
            echo "<tr>";
                echo "<th>REGNO</th>";
                echo "<th>Full names</th>";
                echo "<th>Email</th>";
                echo "<th>Telephone</th>";
                echo "<th>Department</th>";
                echo "<th>Role</th>";
                echo "<th>Status</th>";
                echo "<th>Approve</th>";
                echo "<th>Edit user</th>";
                echo "<th>Deactivate user</th>";
                echo "</tr>";
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_row($result))
            {
                echo "<tr>";
                echo "<td>",$row[0],"</td>";
                echo "<td>",$row[1],"</td>";
                echo "<td>",$row[2],"</td>";
                echo "<td>",$row[3],"</td>";
                echo "<td>",$row[4],"</td>";
                echo "<td>",$row[5],"</td>";
                echo "<td>";
               echo ($row[7]==1)?"Approved":"not approved";
               echo "</td>";
                echo "<td>"."<a href=\"approveuser.php?userid=$row[0]\"><div class=\"home1\">APPROVE</div></a>"."</td>";
                echo "<td>"."<a href=\"useredit.php?userid=$row[0]\"><div class=\"home1\">EDIT</div></a>"."</td>";
                echo "<td>"."<a href=\"deactivate.php?userid=$row[0]\"><div class=\"home1\">DEACTIVATE</div></a>"."</td>";
                echo "</tr>";
            }
            echo "</table";
        }
        ?>
        <br>
   

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