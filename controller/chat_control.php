<?php
include("../includes/db.php");

if($_SESSION['role_id'] == 1){
    $re_user = mysqli_query($conn, "SELECT * FROM users where id != " . $_SESSION['id']);
}
elseif($_SESSION['role_id'] == 2){
    $re_user = mysqli_query($conn, "SELECT * FROM users where id != '" . $_SESSION['id'] . "' AND ( class_id = '" . $_SESSION['class_id'] . "' OR role_id = '2' OR role_id = '1' )");
}
else{
    $re_user = mysqli_query($conn, "SELECT * FROM users where id != '" . $_SESSION['id'] . "' AND class_id = '" . $_SESSION['class_id'] . "'");
}


$user_id = $_SESSION['id'];
$me = "SELECT * FROM `users` WHERE id = $user_id";
$re_me = mysqli_query($conn, $me);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user_id = $_SESSION['id'];
    $to_user_id = $_GET['id'];

    // Check if the to_user_id belongs to the same class as the current user
    $check_class_sql = "SELECT class_id, role_id FROM users WHERE id = '$to_user_id'";
    $check_class_result = mysqli_query($conn, $check_class_sql);
    $check_class_row = mysqli_fetch_assoc($check_class_result);
    $to_user_class_id = $check_class_row['class_id'];
    $to_user_role_id = $check_class_row['role_id'];

    if (($to_user_class_id == $_SESSION['class_id'] && $_SESSION['role_id'] == 3) || (($to_user_role_id == 1 || $to_user_role_id == 2 || $to_user_class_id == $_SESSION['class_id']) && $_SESSION['role_id'] == 2) || $_SESSION['role_id'] == 1) {
        // Both users are in the same class, proceed with chat retrieval

        $chat_name = "SELECT * FROM `users` WHERE id = '$to_user_id'";
        $re_chat_name = mysqli_query($conn, $chat_name);

        $chat_sql = "SELECT c.*, u.id, u.first_name, u.last_name, u.profile_img FROM chat c 
                     JOIN users u ON (c.user_id = u.id) 
                     WHERE (user_id = '$user_id' AND to_user_id = '$to_user_id') 
                     OR (user_id = '$to_user_id' AND to_user_id = '$user_id') 
                     ORDER BY c.id ASC";
        $chat_re = mysqli_query($conn, $chat_sql);

        // Proceed with displaying chat messages
    } else {
        header("location: ../pages/404.php");
    }
}
// else {
// $chat_sql = "SELECT c.*,u.id,u.first_name,u.last_name,u.profile_img FROM chat c JOIN users u ON(c.user_id = u.id) ORDER BY c.id ASC";
// }

include("../includes/header.php");
include("../includes/sidebar.php");
