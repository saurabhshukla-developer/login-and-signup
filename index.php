<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('assets/bootstrap/bootstraplib.php') ?>
</head>
<body>
    <section class="header-part text-center">
        <h3>Login Form</h3>
        <br>
        <br>
    </section>
    <section class="container">
        <section class="login-form">
            <form action="component/userauth.php" method="post">
                <div class="form-row">
                    <div class="col-md-4">
                        <input type="email" class="form-control" name="login-email" placeholder="Please Enter Your Email">
                    </div>
                    <div class="col-md-4">
                        <input type="password" class="form-control" name="login-password" placeholder="Enter Your Password">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary form-control" type="submit" name="login-submit">Login</button>
                    </div>
                </div>
            </form>
        </section>
        <section class="signup-form mt-5">
            <div class="text-center">
                <h3>Signup Form</h3>
            </div>
            <div class="mt-3">
                <form action="component/userauth.php" method="post">
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="name" class="font-weight-bold">Name</label>
                            <input type="text" class="form-control" name="signup-name" placeholder="Enter Your Name">
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" name="signup-email" placeholder="Enter Your Email">
                        </div>
                        <div class="col-md-4">
                            <label for="contact number" class="font-weight-bold">Contact Number</label>
                            <input type="number" class="form-control" name="signup-contactnumber" placeholder="Enter Your Password">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="password" class="font-weight-bold">Password</label>
                            <input type="password" class="form-control" name="signup-password" placeholder="Enter Your Password">
                        </div>
                        <div class="col-md-4">
                            <label for="confirm password" class="font-weight-bold">Confirm Password</label>
                            <input type="password" class="form-control" name="signup-confpassword" placeholder="Confirm Your Password">
                        </div>
                        <div class="col-md-4">
                            <label for="User Type" class="font-weight-bold ml-5">User Type</label>
                            <div class="mt-2 ml-5">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="employee" name="signup-usertype">Employee
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="admin" name="signup-usertype">Admin
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-5">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <button class="form-control btn btn-primary " type="submit" name="signup-submit">Signup</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </section>
    
</body>
</html>