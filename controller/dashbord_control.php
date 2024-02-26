<?php 
include("../includes/db.php");
// checks conditions if the session is not set or(||) the session is not true = both means that you are not logged in so we redirect that page to login.php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: http://localhost/schoolMate/login.php");
    // echo $_SESSION['loggedin'];
    exit;
}
include("../includes/header.php");
include("../includes/sidebar.php");


    $sql = "SELECT * FROM users ";
    $result = mysqli_query($conn, $sql);
    $display=mysqli_num_rows($result);
?>