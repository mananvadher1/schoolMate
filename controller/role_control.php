<?php
include("../includes/db.php");  

//delete button logic api calling and 
// echo '<pre>'; print_r($_POST); exit;
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    delete();
}

//edit button data send thrught api with jason format
if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    edit();
}

function edit()
{
    global $conn;
    $id = $_POST['id'];
    $role_data = array();
    
    
    // fetch data from db 
    $result = mysqli_query($conn, "SELECT * FROM `roles` WHERE role_id = $id;");
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

function delete()
{
    global $conn;
    $id = $_POST['id']; // Corrected $_POST variable name
    
    $result = mysqli_query($conn, "DELETE FROM roles WHERE role_id = $id");
    // echo var_dump($result);
    echo 1;
    exit;
}

if($_SESSION['role_id'] == 1){
include("../includes/header.php");
include("../includes/sidebar.php");

//form and page related data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //for update the sql
    if (isset($_POST['edit_id'])) {
        $edit_id = $_POST["edit_id"];
        $edit_name = $_POST["edit_name"];
        $email = $_SESSION["email"];

        $updatesql = "UPDATE `roles` SET `role_name`='$edit_name', `updated_by`='$email',`updated_dt`=CURRENT_TIMESTAMP() WHERE role_id = $edit_id";
        $updateResult = mysqli_query($conn, $updatesql);

        if ($updateResult) {
            $update = true;
        } else {
            echo "Error: " . $updatesql . "<br>" . mysqli_error($conn);
        }
    }

    //for the insert
    if (isset($_POST['role_name'])) {
        $role_name = $_POST["role_name"];
        $email = $_SESSION["email"];
        $addsql = "INSERT INTO `roles` ( `role_name`, `created_by`, `created_dt`, `updated_by`, `updated_dt`) VALUES ( '$role_name', '$email', CURRENT_TIMESTAMP(), NULL, NULL);";
        $addResult = mysqli_query($conn, $addsql);


        if ($addResult) {
            //echo "New record created successfully";
            $insert = true;
        } else {
            echo "Error: " . $addsql . "<br>" . mysqli_error($conn);
        }
    }
}
//sql for datatable
$sql_dt = "SELECT * FROM `roles`";
$re_dt = mysqli_query($conn, $sql_dt);



}
?>