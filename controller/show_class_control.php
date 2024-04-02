<?php
include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");
// to fetch particular user details
$cid = $_GET['cid'];
$sql = "SELECT * FROM `users` WHERE `class_id` = '$cid' AND `role_id` = 3";
$result = mysqli_query($conn, $sql);
?>