<?php
include("../includes/db.php");
// checks conditions if the session is not set or(||) the session is not true = both means that you are not logged in so we redirect that page to login.php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: http://localhost/schoolMate/login.php");
    // echo $_SESSION['loggedin'];
    exit;
}

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
    $result = mysqli_query($conn, "SELECT * FROM `vehical` WHERE vehical_id = $id;");
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

    $result = mysqli_query($conn, "DELETE FROM vehical WHERE vehical_id = $id");
    // echo var_dump($result);
    echo 1;
    exit;
}

include("../includes/header.php");
include("../includes/sidebar.php");

//form and page related data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //for update the sql
    if (isset($_POST['edit_id'])) {
        $vehical_id = $_POST["edit_id"];
        $vehical_no = $_POST["edit_vehical_no"];

        $email = $_SESSION["email"];

        $updatesql = "UPDATE `vehical` SET `vehical_no`='$vehical_no', `updated_by`='$email',`updated_dt`=CURRENT_TIMESTAMP() WHERE vehical_id = $vehical_id";
        $updateResult = mysqli_query($conn, $updatesql);

        if ($updateResult) {
            $update = true;
        } else {
            echo "Error: " . $updatesql . "<br>" . mysqli_error($conn);
        }
    }

    //for the insert
    if (isset($_POST['vehical_no'])) {
        $vehical_no = $_POST["vehical_no"];
        $email = $_SESSION["email"];
        $addsql = "INSERT INTO `vehical` ( `vehical_no`, `created_by`, `created_dt`, `updated_by`, `updated_dt`) VALUES ( '$vehical_no', '$email', CURRENT_TIMESTAMP(), NULL, NULL);";
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
$sql_dt = "SELECT * FROM `vehical`";
$re_dt = mysqli_query($conn, $sql_dt);


