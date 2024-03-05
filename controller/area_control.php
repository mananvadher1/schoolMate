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
    $result = mysqli_query($conn, "SELECT * FROM `area` WHERE area_id = $id");
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

    $result = mysqli_query($conn, "DELETE FROM area WHERE area_id = $id");
    // echo var_dump($result);
    echo 1;
    exit;
}

include("../includes/header.php");
include("../includes/sidebar.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //for update the sql
    if (isset($_POST['edit_id'])) {
        $edit_id = $_POST["edit_id"];
        $area_name = $_POST["edit_area_name"];
        $edit_vehical_no = $_POST["edit_vehical_id"];
        $pincode = $_POST["edit_pincode"];
        $city = $_POST["edit_city"];
        $updatesql = "UPDATE `area` SET `area_name` = '$area_name', `vehical_id` = '$edit_vehical_no', `pincode` = '$pincode', `city` = 'city' WHERE `area`.`area_id` = $edit_id";
        $updateResult = mysqli_query($conn, $updatesql);

        if ($updateResult) {
            $update = true;
        } else {
            echo "Error: " . $updatesql . "<br>" . mysqli_error($conn);
        }
    }

    //for the insert
    if (isset($_POST['area_name'])) {
       
        $vehical_id = $_POST["vehical_id"];
        $area = $_POST["area_name"];
        $pincode = $_POST["pincode"];                
        $city = $_POST["city"];                
        $addsql = "INSERT INTO `area` (`area_name`, `vehical_id`, `pincode`, `city`) VALUES ( '$area', '$vehical_id', '$pincode', '$city');";
        $addResult = mysqli_query($conn, $addsql);
        if ($addResult) {
            //echo "New record created successfully";
            $insert = true;
        } else {
            echo "Error: " . $addsql . "<br>" . mysqli_error($conn);
        }
    }
   
}
// sql for form in dropdown
$sql_dropdown = "SELECT * FROM `vehical`";
$re_dropdown = mysqli_query($conn, $sql_dropdown);

$sql_edit_dropdown = "SELECT * FROM `vehical`";
$re_edit_dropdown = mysqli_query($conn, $sql_edit_dropdown);
// sql for data table
$sql_dt = "SELECT area.area_id, area.area_name, area.pincode, area.city, vehical.vehical_no
FROM area
LEFT JOIN vehical ON area.vehical_id = vehical.vehical_id
UNION
SELECT area.area_id, area.area_name, area.pincode, area.city, vehical.vehical_no
FROM area
RIGHT JOIN vehical ON area.vehical_id = vehical.vehical_id
WHERE area.area_id IS NOT NULL;
";
$re_dt = mysqli_query($conn, $sql_dt);
$sno = 0;
?>