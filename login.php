<?php session_start(); 
require('component/config.php');
require('component/userauth.php');
if(isset($_SESSION['userDetails'])){
    header('Location: '.$baseUrl.'/dashboard.php');
    exit();
}
if(isset($_COOKIE['user_id']) && isset($_COOKIE['user_cookie_value'])){
    $data['user_id'] = $_COOKIE['user_id'];
    $data['user_cookie_value'] = $_COOKIE['user_cookie_value'];
    loginViaCookie($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('assets/bootstrap/bootstraplib.php') ?>
    <style>
        .login-page{
            background-image: url('assets/images/login-background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height:100vh;
            overflow: hidden;
            width: 100vw;
        }
    </style>
</head>
<body>
    <div class="row login-page">
        <div class="col-md-8 d-none d-md-block">

        </div>
        <div class="col-md-4 bg-white py-5">
            <div class="container mt-5">
                <h1 class="">Login to Dashboard</h1><br><br>
                <form action="component/userauth.php" method="post">
                    <div class="form-group pt-2">
                        <label class="font-weight-bold" for="emailid">Email Id:</label>
                        <input type="email" class="form-control" name="login-email" placeholder="Please Enter Your Email">
                        <small id="login-email-error" class="text-danger"><?php if(isset($_SESSION['errors']['login-email'])){ echo $_SESSION['errors']['login-email']; unset($_SESSION['errors']['login-email']);} ?></small>
                    </div>
                    <div class="form-group pt-2">
                        <label class="font-weight-bold" for="password">Password:</label>
                        <input type="password" class="form-control" name="login-password" placeholder="Enter Your Password">
                        <small id="login-email-error" class="text-danger"><?php if(isset($_SESSION['errors']['login-password'])){ echo $_SESSION['errors']['login-password']; unset($_SESSION['errors']['login-password']); } ?></small>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="rememberme">
                        <label class="form-check-label" for="rememberme">
                            Remember Me
                        </label>
                    </div>
                    <button type="submit" name="login-submit" class="btn btn-primary mt-4 px-5">Login</button>
                    <hr>
                    <div>
                        Do not have an account? <a href="signup.php">Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>