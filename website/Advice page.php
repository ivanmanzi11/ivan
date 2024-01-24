<!DOCTYPE html>
<html>
<head>
    <title>Advice page</title>
    <style>
        *{
    margin: 0%;
    padding: 0%;
    font-family: sans-serif;
}
.banner{
    width: 100%;
    height: 102vh;
    background-image: linear-gradient(rgba(245, 245, 249, 0.75),rgba(245, 245, 249, 0.75)),url(background4.png);
    background-size: cover;
    background-position: center;
}
.navbar h1{
    color: orange;
}
.content{
    width: 100%;
    position: absolute;
    top: 40%;
    transform: translate(0);
    text-align: center;
    color: black;
    font-weight: bolder;
}
.content p a{
    text-decoration: none;
    color: #110970;
    text-transform: uppercase;
}
.content h1{
    color: orange
}
.content h2 a{
    color: orange;
}

    </style>
</head>
<body>
    <div class="banner">
        <div class="content">
            <h2>To continue,<br/> 
                you need to first login to your account <a href="Login.php">Login</a><br/>
                or register your account under<a href="Register.php">Register</a>.<br/>
                For more information, you may visit us on <a href="Contact.php">contact</a> 
            </h2>
            
            
                <p>&copy; 2023 AMAZONA WEB</p>
        </div>
        
    </div>
</body>
</html>

