<?php
include("../includes/db.php");

if (isset($_POST['action']) && $_POST['action'] == 'search_user') {
    searchUser();
}

function searchUser(){
    global $conn;
    $search = $_POST["search"];
    $role = $_POST["user_role"];
    $id = $_POST["id"];
    // $class = $_POST["user_class"];
    $class = 4;

    $sql1 = " (u.first_name LIKE '%".$search."%' OR u.last_name LIKE '%".$search."%' OR u.email LIKE '%".$search."%' OR r.role_name LIKE '%".$search."%')";
    if($role == 1){
        $sql = "SELECT u.id, u.first_name, u.last_name, u.email, u.loggedin, r.role_name FROM `users` u
                JOIN `roles` r ON u.role_id = r.role_id
                WHERE u.id != '$id' AND";
    }elseif($role == 2){
        $sql = "SELECT u.id, u.first_name, u.last_name, u.email, u.loggedin, r.role_name FROM `users` u
                JOIN `roles` r ON u.role_id = r.role_id
                WHERE u.id != '$id' AND (u.class_id = '$class' OR u.role_id = 2) AND";
    }elseif($role == 3){
        $sql = "SELECT u.id, u.first_name, u.last_name, u.email, u.loggedin, r.role_name FROM `users` u
                JOIN `roles` r ON u.role_id = r.role_id
                WHERE u.id != '$id' AND u.class_id = '$class' AND";
    }
    $sql .= $sql1;
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row; 
    }
    echo json_encode($data);
}