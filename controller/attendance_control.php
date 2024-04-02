<?php
include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");
$class_id=$_SESSION['class_id'];
$role_id=$_SESSION['role_id'];
$sql_dt = "SELECT * FROM users where class_id = $class_id AND role_id = 3";
$re_dt = mysqli_query($conn, $sql_dt);
?>