<?php
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "careercrafthub";
$conn =mysqli_connect($servername, $username, $password, $dbname);
if($_SERVER['REQUEST_METHOD']=="POST"){
if ($conn->connect_error) {
    die("" . $conn->connect_error);
    echo "Connection failed";
} else {
    if (isset($_POST['username'], $_POST['password'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    $query = "SELECT * FROM Users WHERE Username =? AND Password=?";
    $stmt = mysqli_prepare($conn, $query);
    

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        // Check if a row was returned
        if ($row = mysqli_fetch_assoc($result)) {
            $username = $row['username'];
            // Redirect to profile page with username as a parameter
            header("Location: profile.html?username=" . urlencode($username));
            exit();
        } else {
            echo "Invalid credentials";
        }
    } else {
        echo "Username or password not set.";
    }
        mysqli_stmt_close($stmt);
    }
    else {
        echo "Error in preparing the statement: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

}*/
		 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Admin Dashboard</title>
  <style>
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
      background-color: #1a1a1a;
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

  </style>
</head>
<body>
  <header>
    <h1>User Admin Dashboard</h1>
    <div class="heading3">
    <h2><?php echo $_GET['usernames']; ?>&nbsp;&nbsp; </h2>
    </div>

  </header>
  
  <nav>
    <a href="AdminDashboard.php">Admin Dashboard</a>
    <a href="UserManagement.php">User Management</a>
    <a href="Settings.php">Settings</a>
    <a href="Logout.php" onclick="logout()">Logout</a>
  </nav>

  <main>
    <div class="col1">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <div class="home"> <button name="users"><i class="fa-solid fa-user" style="color: #000000;"></i>Users</button></div>
        <div class="home"> <button><i class="fa-solid fa-pen-nib" style="color: #63452c;"></i>Update</button></div>
        <div class="home"> <button><i class="fa-solid fa-people-robbery" style="color: #241f31;"></i>Find People</button></div>
        <div class="home"><button><i class="fa-brands fa-cc-discover"></i></i>Opportunities</button></div>
        <div class="home"><button><i class="fa-solid fa-gift"></i>Events</button></div>
        <div class="home"> <button></i>Mentorships</button></div>
        <div class="down">
            <div class="home"><button><i class="fa-solid fa-right-to-bracket"></i>Login</button></div>
            <div class="home"> <button onclick="logout()">Logout</button></div>
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
        include 'connect.php';
        //echo "<div class=\"post\"><i class=\"fa-solid fa-plus\"></i></div>";
    if($_SERVER['REQUEST_METHOD']=="POST")    
    {
           /* $email =mysqli_real_escape_string($conn,$_POST['username']);  
            $password = mysqli_real_escape_string($conn,$_POST['password']);  */
            $query = "SELECT * FROM usertable";
            $stmt = mysqli_prepare($conn, $query);
        if ($stmt)
        {
            echo "<table border=\"1\" width=\"100\" height=\"100\">";
            echo "<tr>";
                echo "<th>username</th>";
                echo "<th>email</th>";
                echo "<th>password</th>";
                echo "<th>register_time</th>";
                echo "<th>userRole</th>";
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
                echo "<td>",$row[4],"</td>";
                echo "</tr>";
            }
            echo "</table";
        }
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
</body>
</html>
