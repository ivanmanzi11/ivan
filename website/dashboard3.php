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
.navbar h1{
    color: orange;
}
.navbar table tr th{
    color: orange;
}
.navbar table tr td{
    color: white;
}
.content{
    width: 85%;
    margin: auto;
    padding: 25px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-left: 70px
}


.logo{
    width: 120px;
    cursor: pointer;
}
.wrap{
    color: orange;
}
.banner h1{
    color: orange;
    align-items: 30px
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
  <div class="banner">
    <div class="content">
        <img src="logo4.png" class="logo">
        <h1>Agent dashboard </h1>
        <br>
        
    </div>

    <hr/><br/>

    
    <div class="navbar">
        <div class="wrap">
          <h1 id="greeting"></h1>
          <h1 id="clock"></h1>
    </div>
          
          <script>
          
              function clock() {
                  var date = new Date();
                  var hours=date.getHours();
                  var minutes = date.getMinutes();
                  var midday;
          
                  hours = updateTime(hours);
                  minutes = updateTime(minutes);
                  var name= "";
          
                  midday = (hours >= 12 ) ?  "PM" : "AM";
          
                      document.getElementById("clock").innerHTML = "<span>" +hours+"</span>" + ":" + "<span>"+minutes+"<span>" + midday;
                      var time = setTimeout(function() {
                          clock();
                          
                      }, 1000);
      
                      //Good mornings, afternoon
                      if(hours < 12 ){
                          var greeting = "Good morning!  " +name+ "   hurry up!"
          
                      }
                      if(hours >= 12 && hours <= 18) {
                          var greeting = "Good afternoon" +name;
                      }
                      if(hours >= 18 && hours <= 24) {
                          var greeting = "Good evening" +name;
                      }
                      document.getElementById("greeting").innerHTML = greeting;
                      }
                      function updateTime(k){
                          if(k < 10 ){
                              return "0" + k
                          }else {
                              return k;
                          }
                      }
                      clock();
          
          </script>
          <right>
          
        </button></right>
        <br/><br/>
          <h1>                       <u>TABLES OF BOOKED ITEMS.</u></h1>
          <br/><br/>
         



          <main>
    <div class="col1">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <div class="home"> <button name="users"><i class="fa-solid fa-user" style="color: #000000;"></i>List of orders</button></div>
        
            
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
            $query = "SELECT * FROM bookings ";
            $stmt = mysqli_prepare($conn, $query);
        if ($stmt)
        {
            echo "<table border=\"1\" width=\"100\" height=\"100\">";
            echo "<tr>";
                echo "<th>username</th>";
                echo "<th>businessname</th>";
                echo "<th>unit</th>";
                echo "<th>productname</th>";
                echo "<th>booking_time</th>";
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
        $error="something went wrong";
        echo $error;
    }
        ?>
    </div>
 </main>
          
          
              

</body>
</html>