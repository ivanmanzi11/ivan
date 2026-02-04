<html>
    <head>
        <title>Login and Registration Website</title>
        <link rel="stylesheet" href="style(register).css">
    </head>
    <body>
        <div class="banner">
         <form action="dbconnect.php" method="post"> 
                <div class="form">
                    <h1>Register</h1>
                    <input type="text" name="username" placeholder="Username"></input><br>
                    <label>Username</label><br/>


                    <input type="email" name="email" placeholder="Email"><br/>
                    <label>Email</label><br/>

                    <input type="password" name="password" placeholder="Password"><br/>
                    <label>Password</label><br/><br/>

                    <label for="userRole">Who are you?</label>
                    <select id="userRole" name="userRole" required>
                    <option value="" disabled selected>Select your role</option>
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                    <option value="Agent">Agent</option>
                    </select><br/><br/>

                    <label><input type="checkbox" name="option1">I agree to the terms & conditions</label><br/><br/>
                    

                    <button type="submit"name="register" class="btn">Register<br/></button>

                    <div class="Login-register">
                    <p>Already have an account? <a href="Login.php" class="register-link">Login</a></p>
                    </div>
                </div>
            </form>
        </div>
    
        
    </body>
</html>