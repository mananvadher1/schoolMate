<?php
include("../includes/db.php");
// checks conditions if the session is not set or(||) the session is not true = both means that you are not logged in so we redirect that page to login.php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: http://localhost/schoolMate/login.php");
    // echo $_SESSION['loggedin'];
    exit;
}

$re_user = mysqli_query($conn, "SELECT * FROM users");

$chat_sql = "SELECT c.*,u.id,u.first_name,u.last_name,u.profile_img FROM chat c JOIN users u ON(c.user_id = u.id) ORDER BY c.id ASC";
$chat_re = mysqli_query($conn, $chat_sql);

include("../includes/header.php");
include("../includes/sidebar.php");