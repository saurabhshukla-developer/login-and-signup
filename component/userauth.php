<?php
require 'db.php';
require('config.php');
$instance = DBConnection::getInstance();
$conn = $instance->getConnection();
if(!isset($_SESSION)) 
{ 
    session_start(); 
}


// For Signup
if(isset($_POST['signup-submit'])){
    $name = filter_input_value($_POST["signup-name"]);
    $email = filter_input_value($_POST["signup-email"]);
    $password = filter_input_value($_POST["signup-password"]);
    $contactnumber = filter_input_value($_POST["signup-contactnumber"]);
    $usertype = filter_input_value($_POST["signup-usertype"]);
    check_unique_email($email);
    user_signup($name, $email, $password, $contactnumber, $usertype);
}

// For Login
if(isset($_POST['login-submit'])){
    global $baseUrl;
    $data['email'] = filter_input_value($_POST["login-email"]);
    $data['password'] = filter_input_value($_POST["login-password"]);
    if(isset($_POST["rememberme"])){
        $data['rememberMe'] = filter_input_value($_POST["rememberme"]);
    }
    user_login($data);
}

/**
 * @method loginViaCookie ( For User LogIn through Cookie)
 * @param array $data
 * @param string $baseUrl
 */
function loginViaCookie($data)
{
    global $conn;
    global $baseUrl;
    $userId = $data['user_id'];
    $cookie_value = $data['user_cookie_value'];
    $sql = "select * from users where id=$userId and cookie_value = '$cookie_value' and status = 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(count($row) > 0){
        $_SESSION['userDetails'] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'contact_number' => $row['contact_number'],
            'user_type' => $row['user_type'],
            'status' => $row['status'],
            'created_at' => $row['created_at']
        );
        header('Location: '.$baseUrl.'/dashboard.php');
        exit();
    } else {
        header('Location: '.$baseUrl.'/login.php');
        exit();
    }
}



/**
 * @method filter_input_value ( Filter Form Input Value)
 * @param string $data
 */
function filter_input_value($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * @method user_login ( For User LogIn)
 * @param string $email
 * @param string $password
 * @param object $conn
 */
function user_login($data)
{
    global $baseUrl;
    global $conn;
    $email = $data['email'];
    $password = $data['password'];
    $sql = "select * from users where email='$email' and status = 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(($row !== null) && (count($row) > 0)){
        if (!password_verify($password, $row['password'])){
            header('Location: '.$baseUrl.'/login.php');
            exit();
        } else {
            $_SESSION['userDetails'] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'contact_number' => $row['contact_number'],
                'user_type' => $row['user_type'],
                'status' => $row['status'],
                'created_at' => $row['created_at']
            );
            if(isset($data['rememberMe'])){
                $bytes = random_bytes(20);
                $uniqueId = bin2hex($bytes);
                setcookie('user_id', $row['id'], time() + (86400 * 30), "/");
                setcookie('user_cookie_value', $uniqueId, time() + (86400 * 30), "/");
                $sql = "UPDATE users set cookie_value = '$uniqueId' where id = ".$row['id']."";
                $conn->query($sql);
            }
            header('Location: '.$baseUrl.'/dashboard.php');
            exit();
        }
        // print_r($row[0]['password']);
    } else {
        header('Location: '.$baseUrl.'/login.php');
        exit();
    }
}

/**
 * @method user_signup ( For User SignUp)
 * @param string $name
 * @param string $email
 * @param string $password
 * @param string $contactnumber
 * @param string $usertype
 * @param object $conn
 */
function user_signup($name, $email, $password, $contactnumber, $usertype)
{
    global $baseUrl;
    global $conn;
    $secure_pass = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (`name`, `email`, `password`, `contact_number`, `user_type`)
            VALUES ('$name', '$email', '$secure_pass', '$contactnumber', '$usertype')";
    if ($conn->query($sql) === TRUE) {
        header('Location: '.$baseUrl.'/login.php');
        exit();
    } else {
        header('Location: '.$baseUrl.'/login.php');
        exit();
    }
}

/**
 * @method check_unique_email ( Check if Email is Unique while signup)
 * @param string $email
 * @param object $conn
 */
function check_unique_email($email)
{
    global $baseUrl;
    global $conn;
    $sql = "select * from users where email='$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(count($row) > 0){
        header('Location: '.$baseUrl.'/signup.php');
        exit();
    }
}

?>
