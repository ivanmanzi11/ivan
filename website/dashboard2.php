<!DOCTYPE html>
<html>
<head>
    <title>LOCALVIEW RESERVATIONS</title>
    <style>
        *{
    margin: 0%;
    padding: 0%;
    font-family: 'Poppins', sans-serif;
}
.banner{
    width: 100%;
    height: 120vh;
    background-image: linear-gradient(rgba(16, 16, 16, 0.75),rgba(16, 16, 16, 0.75)),url(background4.png);
    background-size: cover;
    background-position: center;
    top: 50%

}
.navbar{
    width: 85%;
    margin: auto;
    padding: 25px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.logo{
    width: 120px;
    cursor: pointer;
}
.navbar ul li{
    list-style: none;
    display: inline-block;
    margin: 0 20px;
    position: relative;
}
.navbar ul li a{
    text-decoration: none;
    color: #fe942a;
    text-transform: uppercase;
}
.navbar a::after{
    content: '';
    height: 3px;
    width: 100%;
    background: #009688;
    position: absolute;
    left: 0;
    bottom: -6px;
    transition: transform .5s;
    border-radius: 5px;
    transform-origin: right;
    transform: scale(0);
}
.navbar a:hover::after{
    transform-origin: left;
    transform: scale(1);
}
.navbar ul li::hover::after{
    width: 100%;
}
.content{
    width: 100%;
    position: absolute;
    top: 30%;
    transform: translate(0);
    text-align: center;
    color: white;
}
.content p a{
    text-decoration: none;
    color: #110970;
    text-transform: uppercase;
}
.content h1{
    color: #fe942a
}
.navbar .btnLogin-popup{
    width: 130px;
    height: 50px;
    background: transparent;
    border: 2px solid #fe942a;
    outline: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 1.1em;
    color: #fe942a;
    font-weight: 500;
    margin-left: 10px;
    text-transform: uppercase;
    transition: .5s;
}
.navbar .btnLogin-popup:hover{
    background: #009688;
    color: #162938;
    border-radius: 10px;
}
.content p a{
    color: orange;
}
.content h2{
    color: orange;
    text-align: left;
    margin-left: 20px;
   
}

    </style>
    
</head>
<body>
    
    <div class="banner">
        <div class="navbar">  
            <img src="logo4.png" class="logo">
            <ul>
            <li><a href="dashboard3.php">Dashboard</a></li>
            <li><a href="upload.php">Upload business</a></li>
            <li><a href="Contact.php">Contact</a></li>
            <li><a href="Logout.php">LOGOUT</a></li>
            </ul>
        </div>
      
    <hr/>

    

        <div class="content">
        <h2><b>Role: <u>Agent.</u></b></h2>
        <br/><br/>
            <h1>Welcome <u><?php 
                 $email=$_GET['usernames'];
                 include 'connect.php';
                 $query = "SELECT * FROM usertable where email=?";
                 $stmt = mysqli_prepare($conn, $query);
             if ($stmt)
             {
                mysqli_stmt_bind_param($stmt,"s",$email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $row=mysqli_fetch_assoc($result);
                echo $row['username'];
             }
            ?></u>
            <br/> To our<br/>
            LOCALVIEW RESERVATIONS online platform.</h1><br/>

            <p>Your one-stop online platform for booking premium services in hotels and restaurants near to our customers!</p>
            <p>As a leading online booking hub, we bring you unparalleled convenience in securing reservations for <br/> 
            your favorite dining spots and luxurious accommodations. <br/><br/>
            Our platform seamlessly connects you with nearby hotels and restaurants in every district of Rwanda, offering <br/>
            a hassle-free booking process and ensuring a delightful experience for every customer.<br/><br/>
                Learn more:   <a href="Home1.php">about us</a><br/><br/>
                Or seek information through:   <a href="Contact.php">Contact Us</a></p><br/><br/>
            
                
           
        
           
                <p>&copy; 2023 LOCALVIEW RESERVATIONS</p>
        </div>
    
    </div>
    
       
          
       
   
   


   
</body>


</html>
