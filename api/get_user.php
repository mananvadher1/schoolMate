<?php
include("../includes/db.php");

if (isset($_POST['action']) && $_POST['action'] == 'get_user') {
    getUser();
}

function getUser()
{
    global $conn;
    $role_id = $_POST['role_id'];
    $role_data = array();
    // echo $role_id; exit;
    if ($role_id == 1) {
        $sql = "SELECT users.*, roles.role_name FROM `users` JOIN `roles` ON users.role_id = roles.role_id AND users.role_id = 1";
    } else if ($role_id == 2) {
        $sql = "SELECT users.*,roles.role_name,classes.class_name FROM `users` JOIN `roles` ON users.role_id = roles.role_id AND users.role_id = 2 JOIN `classes` ON users.class_id = classes.class_id";
    } else if ($role_id == 3) {
        $sql = "SELECT users.*, roles.role_name,classes.class_name FROM `users` JOIN `roles` ON users.role_id = roles.role_id AND users.role_id = 3 JOIN `classes` ON users.class_id = classes.class_id";
    }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($role_data, $row);
        }
        // header("content-type : application/json");  this are give us to error we cant remain space between 'type' and ':'
        header("Content-Type: application/json");
        echo json_encode($role_data);
        exit;
    }
}
