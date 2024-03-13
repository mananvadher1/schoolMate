<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    
    header("location: http://localhost/schoolMate/login.php");
    exit;
}

$conn = mysqli_connect("localhost", "phpmyadmin", "Admin@123", "SchoolMate");
//  if($conn){
//     echo "success";
//  }
if (mysqli_connect_error()) {
    echo "can not connect";
}
