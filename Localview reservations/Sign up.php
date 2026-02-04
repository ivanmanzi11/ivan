<html>
    <head>
        <title>Login and Registration Website</title>
        <link rel="stylesheet" href="style(register).css">
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








             