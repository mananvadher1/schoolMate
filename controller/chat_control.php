<?php
include("../includes/db.php");

$re_user = mysqli_query($conn, "SELECT * FROM users");

$chat_sql = "SELECT c.*,u.id,u.first_name,u.last_name,u.profile_img FROM chat c JOIN users u ON(c.user_id = u.id) ORDER BY c.id ASC";
$chat_re = mysqli_query($conn, $chat_sql);

include("../includes/header.php");
include("../includes/sidebar.php");