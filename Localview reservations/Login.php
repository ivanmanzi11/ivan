<html>
    <head>
        <title>Login and Registration Website</title>
        <link rel="stylesheet" href="style(login).css">
    </head>
    <body>
        <div class="banner">
          <form action="loginconnect.php" method="post">
                <div class="form">
                    <h1>Login</h1>
                    
                        
                            
                            <input type="text" name="email" placeholder="Email or Username"><br/>
                            <label>Email</label><br/><br/>
                        
                        
                            
                            <input type="password" name="password" placeholder="Password"><br/>
                            <label>Password</label><br/><br/>
                        
                        
                            <label><input type="checkbox">Remember me</label>
                            <a href="#">Forgot Password?</a><br/><br/>
                            <button type="submit" name="submit" class="btn">Login<br/></button>
                            <div class="Login-register">
                                <p>Don't have an account? <a href="Register.php" class="register-link">Register</a></p>
                            </div>
                       
                    
                </div>
          </form>
        </div>
    
        
    </body>
</html>