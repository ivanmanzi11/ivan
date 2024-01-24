<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Admin Dashboard</title>
  <style>
     .banner{
    width:100%;
    height: 100vh;
    background-image: linear-gradient(rgba(245, 245, 249, 0.75),rgba(245, 245, 249, 0.75)),url(background4.png);
    background-size: cover;
    background-position: center;
}
    body {
      font-family: "Arial", sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
      color: #333;
      display: grid;
       grid-template-columns: auto 1fr; 
      height: 60vh; 
    }

    header {
      background-color: dark;
      color: #ffcc00;
      padding: 5px;
      text-align: center;
      grid-column: span 2; 
    }

    nav {
      background-color: #1a1a1a;
      display: flex;
      justify-content: space-around;
      position: sticky;
      z-index: 100;
      grid-column: span 2; 
    }

    nav a {
      background-color: #1a1a1a;
      color: #ffcc00;
      text-decoration: none;
      font-size: 1.2em;
      transition: color 0.3s;
      border-radius: 5px;
    }

    nav a:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .col1 {s
    grid-column: 1;
      width: 25%;
      margin-left: 5px; 
      padding: 5px; 
      border-right: 5px solid white;
    }

    .home button {
      padding: 10px;
      width: 200px;
      background-color: #1a1a1a;
      color: #ffcc00;
      text-align: left;
      border: none;
      border-radius: 5px;
      font-style: bold;
      font-size: 16px;
      cursor: pointer;
      display: flex;
      align-items: center;
      margin:5px;
    }

    .home button:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .home button i {
      margin-right: 10px;
    }

    section {
      text-align: center;
      padding: 80px 20px;
    }
    .heading3{
        margin: auto;
        grid-column: 3;
        float: right;
    }
    .col2{
        padding: 10px;
        grid-column: 2;
        width: auto;
        height: auto;
    }
    main{
        display: grid;
        padding-top: 0;
        padding-left: 100px;
        padding-right: 100px;
    }
    table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

  </style>
</head>
<body>
  <header>
    <h1>User Admin Dashboard</h1>
    
    <div class="heading3">
    <h2><?php //echo $_GET['username']; ?>&nbsp;&nbsp; </h2>
    </div>

  </header>
  
  <nav>
    <a href="admin.php">Admin Dashboard</a>
    <a href="bssapplicant.php">Business applications</a>
    <a href="UserManagement.php">User Management</a>
    <a href="Logout.php" onclick="logout()">Logout</a>
  </nav>

  <div class="banner">
  <main>
    <div class="col1">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <div class="home"> <button name="users"><i class="fa-solid fa-user" style="color: #000000;"></i>List of business applicants</button></div>
        
            
        </form>
            <script>
                function logout(){
                    var r=confirm("Do you want to logout?");
                }
            </script>
        </div>
    </div>
    <div class="col2">


    
    <?php
       error_reporting(E_ALL);
       ini_set('display_errors', 1);
       
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "amazona";
       
       $conn = mysqli_connect($servername, $username, $password,$dbname);
       
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
       }
        //echo "<div class=\"post\"><i class=\"fa-solid fa-plus\"></i></div>";
    if(isset($_POST['users']))    
    {
           /* $email =mysqli_real_escape_string($conn,$_POST['username']);  
            $password = mysqli_real_escape_string($conn,$_POST['password']);  */
            $query = "SELECT * FROM upload";
            $stmt = mysqli_prepare($conn, $query);
        if ($stmt)
        {
            echo "<table border=\"1\" width=\"200\" height=\"200\">";
            echo "<tr>";
                echo "<th>firstname</th>";
                echo "<th>secondname</th>";
                echo "<th>businessname</th>";
                echo "<th>description</th>";
                echo "<th colspan=2>Action</th>";
                echo "</tr>";
           // mysqli_stmt_bind_param($stmt, "");
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_row($result))
            {
                echo "<tr>";
                echo "<td>",$row[0],"</td>";
                echo "<td>",$row[1],"</td>";
                echo "<td>",$row[2],"</td>";
                echo "<td>",$row[3],"</td>";
                echo '<td><a href="">approve</a>&nbsp;</td><td><a href="">Deny</a></td>';
                echo "</tr>";
            }
            echo "</table";
        }
        $error="something went wrong";
        echo $error;
    }
        ?>
    </div>
 </main>
  

  <script>
    function logout() {
      const confirmLogout = confirm("Are you sure you want to logout?");
      if (confirmLogout) {
        alert("Logout successful!");
      }
    }
  </script>
  </div>
</body>
</html>















