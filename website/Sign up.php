<html>
    <head>
        <title>Login and Registration Website</title>
        <style>
            .margin{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppians', sans-serif;
}
.banner{
    width: 100%;
    height: 100%;
    background-image: linear-gradient(rgba(245, 245, 249, 0.75),rgba(65, 13, 108, 0.75)),url(background4.png);
    background-size: cover;
    background-position: center;
}
.wrapper{
    position: relative;
    width: 400px;
    height: 440px;
    background: transparent;
    border: 2px solid orange;
    display: flex;
    justify-content: center;
    align-items: center;
   
}
.wrapper form{
    width: 100%;
    padding: 40px;
}
.form h1{
    font-size: 2em;
    color: orange;
    text-align: center;
}
.input-box{
    position: relative;
    width: 100%;
    height: 50px;
    border-bottom: 2px solid orange;
    margin: 30px 0;
}


.body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}
.form{
    width: 250px;
    height: 400px;
    background: linear-gradient(to top,rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
    position: absolute;
    top: 50px;
    left: 500px;
    border-radius: 10px;
    padding: 25px;
}
.form input{
    width: 240px;
    height: 35px;
    background: transparent;
    border-bottom: 1px solid orange;
    border-top: none;
    border-right: none;
    border-left: none;
    color: #fff;
    font-size: 15px;
    letter-spacing: 1px;
    margin-top: 5px;
    font-family: sans-serif;
}
.form input:focus{
    outline: none;
}
::placeholder{
    color: #fff;
    font-family: Arial;
}
.form label{
    color: orange;
}
.form button{
    width: 120px;
    height: 30px;
    background-color: orange;

}
.form label input{
    width: 20px;
    height: 20px;
}
.form p{
    color: orange;
}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h1>Registration Form</h1>
                </div>
                <div class="panel-body">
                    <form action="connect.php" method="post">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName"/>
                        </div>
                        <div class="form-group">
                            <label for="LastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName"/>
                        </div>
                        <div class="form-group">
                            <label for="email">Gender</label>
                            <div>
                                <label for="male" class="radio-inline"><input type="radio" name="gender" value="m"
                                id="male">Male</label>
                                <label for="female" class="radio-inline"><input type="radio" name="gender" value="f"
                                id="female">Female</label>
                                <label for="others" class="radio-inline"><input type="radio" name="gender" value="o"
                                id="others">Others</label>
                            </div>
                        </div>
                       <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email"/>
                       </div>
                       <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password"/>
                       </div>
                       <input type="submit" class="btn btn-primary">
                    </form>








             