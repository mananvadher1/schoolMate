<?php 
include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");


    $sql = "SELECT * FROM users where role_id=3";
    $result = mysqli_query($conn, $sql);
    $display_student=mysqli_num_rows($result);

    $sql = "SELECT * FROM users where role_id=2";
    $result = mysqli_query($conn, $sql);
    $display_teacher=mysqli_num_rows($result);
?>