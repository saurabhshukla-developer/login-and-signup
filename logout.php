<?php
session_start();
require('component/config.php');
session_destroy();
unset($_COOKIE['user_id']); 
unset($_COOKIE['user_cookie_value']);
header('Location: '.$baseUrl.'/login.php');
exit();