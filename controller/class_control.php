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

// fetch data from class table
$sql_fetch = "SELECT * FROM `classes`";
$result = mysqli_query($conn, $sql_fetch);
// cen not use result variable 2 times in class page so stored data in array and then
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// fetch from sections
$sql_fetch2 = "SELECT * FROM `sections`";
$result2 = mysqli_query($conn,$sql_fetch2);

// fetch from teachers
$sql_fetch3 = "SELECT * FROM `teachers`";
$result3 = mysqli_query($conn,$sql_fetch3);

?>


<!-- join table of class and sections
SELECT 
    class.class_id, 
    class.class_name, 
    class.teacher_id, 
    class.subject_id, 
    class.sec_name,
    sections.sec_id,
    sections.sec_name
FROM 
    class
JOIN 
    sections 
ON 
    class.class_id = sections.class_id -->