<?php
include("../includes/db.php");

$re_user = mysqli_query($conn, "SELECT * FROM users where id != ".$_SESSION['id']);

$user_id = $_SESSION['id'];
$me = "SELECT * FROM `users` WHERE id = $user_id";
$re_me = mysqli_query($conn, $me);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user_id = $_SESSION['id'];
    $to_user_id = $_GET['id'];

    $chat_name = "SELECT * FROM `users` WHERE id = $to_user_id";
    $re_chat_name = mysqli_query($conn, $chat_name);

    $chat_sql = "SELECT c.*,u.id,u.first_name,u.last_name,u.profile_img FROM chat c JOIN users u ON(c.user_id = u.id) 
    WHERE (user_id=$user_id AND to_user_id = $to_user_id OR user_id=$to_user_id AND to_user_id = $user_id)  ORDER BY c.id ASC";
    $chat_re = mysqli_query($conn, $chat_sql);
} 
// else {
    // $chat_sql = "SELECT c.*,u.id,u.first_name,u.last_name,u.profile_img FROM chat c JOIN users u ON(c.user_id = u.id) ORDER BY c.id ASC";
// }

include("../includes/header.php");
include("../includes/sidebar.php");
