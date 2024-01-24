<?php
		 
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

    .home {
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
    .logo{
    width: 120px;
    cursor: pointer;
}
.navbar img{
  float: left;
}

  </style>
</head>
<body>
<header>
  <div class="navbar">  
    <img src="logo4.png" class="logo">
    <h1>All hotels in 5 provinces of Rwanda</h1>
  </div>
</header>
  <nav>
    <a href="bsses in provinces.php">Kigali City</a>
    <a href="bsses2.php">Northern province</a>
    <a href="bsses3.php">Southern province</a>
    <a href="bsses4.php">Western province</a>
    <a href="bsses5.php">Eastern province</a>
  </nav>

  <main>
    <div class="col1">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <a href="mariott.php"><div class="home">One&Only Gorilla'sNest</div></a>
        <a href="mariott.php"><div class="home">Virunga Lodge</div></a>
        <a href="mariott.php"><div class="home">Sambora Kinigi</div></a>
        <a href="mariott.php"><div class="home">Wilderness Sabyinyo</div></a>
        <a href="mariott.php"><div class="home">Fravan Eco Resort</div></a>
        
        
    </div>
 </main>

</body>
</html>
