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

//delete button logic api calling and 
// echo '<pre>'; print_r($_POST); exit;
if(isset($_POST['action']) && $_POST['action']=='delete'){
    delete();
}

function delete(){
    global $conn;
    $id = $_POST['id']; // Corrected $_POST variable name

    $result = mysqli_query($conn, "DELETE FROM roles WHERE role_id = $id");
    echo var_dump($result);
    echo 1;
    exit;
}

//form and page related data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role_name = $_POST["role_name"];
    $email = $_SESSION["email"];

    $sql = "INSERT INTO `roles` ( `role_name`, `created_by`, `created_dt`, `updated_by`, `updated_dt`) VALUES ( '$role_name', '$email', CURRENT_TIMESTAMP(), NULL, NULL);";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        //echo "New record created successfully";
        $insert = true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
//sql for datatable
$sql_dt = "SELECT * FROM `roles`";
$re_dt = mysqli_query($conn, $sql_dt); ?>