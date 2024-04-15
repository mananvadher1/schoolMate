<?php
include("../includes/db.php");
if ($_SESSION['role_id'] != 3){
include("../includes/header.php");
include("../includes/sidebar.php");

// fetch data from class table
$sql_fetch = "SELECT * FROM `classes`";
$result = mysqli_query($conn, $sql_fetch);
// can not use result variable 2 times in class page so stored data in array and then
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

}else{
    header("location: 404.php");
}

    ?>