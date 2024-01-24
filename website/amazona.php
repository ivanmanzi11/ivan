<!DOCTYPE html>
<html>
<head>
    <title>LOCALVIEW RESERVATION</title>
    <style>
        *{
    margin: 0%;
    padding: 0%;
    font-family: 'Poppins', sans-serif;
}
.banner{
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(245, 245, 249, 0.75),rgba(245, 245, 249, 0.75)),url(background4.png);
    background-size: cover;
    background-position: center;
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
    color: orange;
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
    width: 110%;
    position: absolute;
    top: 40%;
    transform: translate(0);
    text-align: center;
    color: black;
}
.content p a{
    text-decoration: none;
    color: #110970;
    text-transform: uppercase;
}
.content h1{
    color: orange
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
    </style>
   
    
</head>
<body>
    
    <div class="banner">
        <div class="navbar">  
            <img src="logo4.png" class="logo">
            <ul>
            <li><a href="amazona.php">Home</a></li>
            <li><a href="Advice page.php">Search a business</li>
            <li><a href="Advice page.php">Reserve a spot</a></li>
            <li><a href="Contact.php">Contact</a></li>
            <li><a href="Login.php">LOGIN</a></li>
            </ul>
        </div>
        <b><hr/></b>
        <div class="content">
            <h1>Welcome to LOCALVIEW RESERVATIONS</h1><br/>
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
