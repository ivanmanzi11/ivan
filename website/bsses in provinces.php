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
    .nav2{
    width: 1200px;
    height: 600px;
    background-image: linear-gradient(rgba(245, 245, 249, 0.75),rgba(245, 245, 249, 0.75)),url(background4.png);
    background-size: cover;
    background-position: center;
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

    nav select{
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

    .col1 {
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
  margin-
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
 
                    <select id="district" name="district" required>
                    <option value="" disabled selected>Kigali City</option>
                    <option value="district">Kicukiro</option>
                    <option value="district">Nyarugenge</option>
                    <option value="district">Gasabo</option>
                    </select>
                    <select id="district" name="district" required>
                    <option value="" disabled selected>Northern Province</option>
                    <option value="district">Musanze</option>
                    <option value="district">Rulindo</option>
                    <option value="district">Gicumbi</option>
                    <option value="bsses3.php">Gakenke</option>
                    <option value="bsses3.php">Burera</option>
                    </select>
                    <select id="district" name="district" required>
                    <option value="" disabled selected>Southern Province</option>
                    <option value="district">Kamonyi</option>
                    <option value="district">Ruhango</option>
                    <option value="district">Nyanza</option>
                    <option value="bsses3.php">Muhanga</option>
                    <option value="bsses3.php">Huye</option>
                    </select>
                    <select id="district" name="district" required>
                    <option value="" disabled selected>Western Province</option>
                    <option value="bsses3.php">Rusizi</option>
                    <option value="district">Nyamasheke</option>
                    <option value="district">Rubavu</option>
                    <option value="bsses3.php">Ngororero</option>
                    <option value="bsses3.php">Karongi</option>
                    </select>
                    <select id="district" name="district" required>
                    <option value="" disabled selected>Eastern Province</option>
                    <option value="bsses3.php">Rwamagana</option>
                    <option value="district">Kirehe</option>
                    <option value="district">Ngoma</option>
                    <option value="bsses3.php">Bugesera</option>
                    <option value="bsses3.php">Nyagatare</option>
                    </select>
</ul>
                  </nav>

<div class="nav2">
  <main>
    <div class="col1">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <a href="mariott.php"><div class="home">Mariott</div></a>
        <a href="mariott.php"><div class="home">Serena Hotel</div></a>
        <a href="mariott.php"><div class="home">Radisson Blu Hotel</div></a>
        <a href="mariott.php"><div class="home">Four points Hotel</div></a>
        <a href="mariott.php"><div class="home">Mille Colliens</div></a>
      
        
    </div>
 </main>
</div>
</body>
</html>
