<?php
include("../includes/db.php");
$cid = $_GET['cid'];
if(($_SESSION['role_id'] == 3 && $_SESSION['class_id'] == $cid ) || $_SESSION['role_id'] != 3){
include("../includes/header.php");
include("../includes/sidebar.php");
// to fetch particular user details
    $sql = "SELECT * FROM `users` WHERE `class_id` = '$cid' AND `role_id` = 3";
    $result = mysqli_query($conn, $sql);
}
else{
    header("location: 404.php");
}

?>