<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('assets/bootstrap/bootstraplib.php') ?>
    <style>
        .signup-page{
            background-image: url('assets/images/signup-background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height:100vh;
            overflow: auto;
            width: 100vw;
        }
    </style>
</head>
<body>
    <div class="row signup-page">
        <div class="col-md-8 d-none d-md-block">
        </div>
        <div class="col-md-4 bg-white py-5 sign-up-form">
            <div class="container mt-3">
                <h1 class="">Register To Panel</h1><br>
                <form action="component/userauth.php" method="post">
                    <div class="row">
                        <div class="col-md-6 form-group pt-1">
                            <label class="font-weight-bold" for="emailid">Name:</label>
                            <input type="text" class="form-control" name="signup-name" placeholder="Enter Your Name" required>
                            <small id="signup-name-error" class="text-danger"><?php if(isset($_SESSION['errors']['signup-name'])){ echo $_SESSION['errors']['signup-name']; unset($_SESSION['errors']['signup-name']);} ?></small>
                        </div>
                        <div class="col-md-6 form-group pt-1">
                            <label class="font-weight-bold" for="emailid">Contact Number:</label>
                            <input type="number" class="form-control" name="signup-contactnumber" placeholder="Enter Your Password" required>
                            <small id="signup-contactnumber-error" class="text-danger"><?php if(isset($_SESSION['errors']['signup-contactnumber'])){ echo $_SESSION['errors']['signup-contactnumber']; unset($_SESSION['errors']['signup-contactnumber']);} ?></small>
                        </div>
                    </div>
                    <div class="form-group pt-1">
                        <label class="font-weight-bold" for="emailid">Email Id:</label>
                        <input type="email" class="form-control" name="signup-email" placeholder="Enter Your Email" required>
                        <small id="signup-email-error" class="text-danger"><?php if(isset($_SESSION['errors']['signup-email'])){ echo $_SESSION['errors']['signup-email']; unset($_SESSION['errors']['signup-email']);} ?></small>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group pt-1">
                            <label class="font-weight-bold" for="password">Password:</label>
                            <input type="password" class="form-control" name="signup-password" placeholder="Enter Your Password" required>
                            <small id="signup-password-error" class="text-danger"><?php if(isset($_SESSION['errors']['signup-password'])){ echo $_SESSION['errors']['signup-password']; unset($_SESSION['errors']['signup-password']);} ?></small>
                        </div>
                        <div class="col-md-6 form-group pt-1">
                            <label class="font-weight-bold" for="password">Confirm Password:</label>
                            <input type="password" class="form-control" name="signup-conf-password" placeholder="Confirm Password" required>
                            <small id="signup-conf-password-error" class="text-danger"><?php if(isset($_SESSION['errors']['signup-conf-password'])){ echo $_SESSION['errors']['signup-conf-password']; unset($_SESSION['errors']['signup-conf-password']);} ?></small>
                        </div>
                    </div>
                    <div class="form-check pl-0 pt-1">
                        <label class="form-check-label font-weight-bold" for="rememberme">
                            User Type:&nbsp;
                        </label>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="employee" name="signup-usertype" checked>Employee
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="admin" name="signup-usertype">Admin
                            </label>
                        </div>
                        <br>
                        <small id="signup-usertype-error" class="text-danger"><?php if(isset($_SESSION['errors']['signup-usertype'])){ echo $_SESSION['errors']['signup-usertype']; unset($_SESSION['errors']['signup-usertype']);} ?></small>
                    </div>
                    <button type="submit" name="signup-submit" class="btn btn-primary mt-4 px-5">Register</button>
                    <hr>
                    <div>
                        Already have an account? <a href="login.php">Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>