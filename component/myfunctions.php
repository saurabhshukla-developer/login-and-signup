<?php
require 'db.php';
require('config.php');
$instance = DBConnection::getInstance();
$conn = $instance->getConnection();
if(!isset($_SESSION)) 
{ 
    session_start(); 
}


function getAllUserDetails()
{
    global $conn;
    $sql = "select * from users";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $row;
}