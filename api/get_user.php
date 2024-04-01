<?php
include("../includes/db.php");

if (isset($_POST['action']) && $_POST['action'] == 'get_user') {
    getUser();
}

function getUser()
{
    global $conn;
    $role_id = $_POST['role_id'];
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sr = $_POST['search']['value']; // Search value
  
    if ($role_id == 2 || $role_id == 3) {
        $sql = "SELECT u.*, roles.role_name,classes.class_name FROM `users`  as u
        JOIN `roles` ON u.role_id = roles.role_id
        JOIN `classes` ON u.class_id = classes.class_id WHERE u.role_id = ".$role_id."";
    } else {
        $sql = "SELECT users.*, roles.role_name FROM `users` 
        JOIN `roles` ON users.role_id = roles.role_id AND users.role_id = ".$role_id;
    }
    ## Search 
    $searchQuery = " ";
    if($sr != ''){
        $searchQuery = " AND (roles.role_name LIKE '%".$sr."%' or u.email LIKE '%".$sr."%' OR u.first_name LIKE '%".$sr."%' 
        OR u.last_name LIKE '%".$sr."%') ";
    }
    $sql .= $searchQuery;
    $query = $sql;
    $sql .= " LIMIT ".$start.", ".$length;
    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    $data = array();
    $i = 1;
    while( $rows = mysqli_fetch_assoc($resultset) ) {
        $action = "<button onClick='editClick(".$rows['id'].")' class='edit btn btn-sm btn-success'>Edit</button>&nbsp;";
        $action .= "<button onClick='deleteClick(".$rows['id'].")' class='delete btn btn-sm btn-danger'>Delete</button>&nbsp;";
        $rows['action'] = $action;
        $rows['sr_no'] = $i;
        if(!isset($rows['class_name'])){
            $rows['class_name'] = 'N/A';
        }
        $data[] = $rows;
        $i++;
    }

    $result_count = mysqli_query($conn, $query) or die("database error:". mysqli_error($conn));
    $recordsTotal = mysqli_num_rows($result_count);
    
    
    $results = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => count($data),
                "recordsFiltered" => $recordsTotal,
                "data"=>$data
     );
    echo json_encode($results);
    exit;



    // $role_data = array();
    // // echo $role_id; exit;
    // if ($role_id == 1) {
    //     $sql = "SELECT users.*, roles.role_name FROM `users` JOIN `roles` ON users.role_id = roles.role_id AND users.role_id = 1";
    // } else if ($role_id == 2) {
    //     $sql = "SELECT users.*,roles.role_name,classes.class_name FROM `users` JOIN `roles` ON users.role_id = roles.role_id AND users.role_id = 2 JOIN `classes` ON users.class_id = classes.class_id";
    // } else if ($role_id == 3) {
    //     $sql = "SELECT users.*, roles.role_name,classes.class_name FROM `users` JOIN `roles` ON users.role_id = roles.role_id AND users.role_id = 3 JOIN `classes` ON users.class_id = classes.class_id";
    // }
    // $result = mysqli_query($conn, $sql);
    // if (mysqli_num_rows($result) > 0) {
    //     while ($row = mysqli_fetch_array($result)) {
    //         array_push($role_data, $row);
    //     }
    //     // header("content-type : application/json");  this are give us to error we cant remain space between 'type' and ':'
    //     header("Content-Type: application/json");
    //     echo json_encode($role_data);
    //     exit;
   // }
}
