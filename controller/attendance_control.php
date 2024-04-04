<?php
include("../includes/db.php");

if (isset($_POST['action']) && isset($_POST['id'])) {
    attendence();
}

function attendence()
{
    global $conn;
    $id = $_POST['id'];
    $currentDate = date('Y-m-d');
    if ($_POST['action'] == 'present') {
        $result = mysqli_query($conn, "INSERT INTO `attendance`(`user_id`, `date`, `status`) VALUES ('$id', '$currentDate','present')");
    } else if ($_POST['action'] == 'absent') {
        $result = mysqli_query($conn, "INSERT INTO `attendance`(`user_id`, `date`, `status`) VALUES ('$id', '$currentDate','absent')");
    } else if ($_POST['action'] == 'holiday') {
        $result = mysqli_query($conn, "INSERT INTO `attendance`(`user_id`, `date`, `status`) VALUES ('$id', '$currentDate','holiday')");
    }
    if ($result) {
        echo 1;
        exit;
    } else {
        echo 0;
        exit;
    }
}
include("../includes/header.php");
include("../includes/sidebar.php");
$class_id = $_SESSION['class_id'];
$role_id = $_SESSION['role_id'];
$currentDate = date('Y-m-d');
// $sql_dt = "SELECT * FROM users where class_id = $class_id AND role_id = 3";
$sql_dt = "SELECT u.id, u.first_name, u.last_name, u.class_id, u.role_id, a.id AS a_id, a.date, a.status
            FROM users AS u
            LEFT JOIN attendance AS a
            ON u.id = a.user_id AND a.date = '$currentDate'
            WHERE u.class_id = '$class_id' AND u.role_id = 3";
$re_dt = mysqli_query($conn, $sql_dt);
// $sql_stu_dt = "SELECT a.id, u.first_name, u.last_name, a.date, a.status FROM users AS u RIGHT JOIN attendance AS a ON u.id = a.user_id;";
// $re_stu_dt = mysqli_query($conn, $sql_stu_dt);


// Get the current month and year
$currentMonth = date('m');
$currentYear = date('Y');

// Get the number of days in the current month
$numberOfDays = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

// Array to store dates of the current month
$currentMonthDates = array();
$attendData = array();

// Loop through each day of the current month
for ($day = 1; $day <= $numberOfDays; $day++) {
    // Format the date
    $date = date("d-m-Y", strtotime("$currentYear-$currentMonth-$day"));
    $qDate = date("Y-m-d", strtotime("$currentYear-$currentMonth-$day"));
    $sql_name="SELECT 
                    u.first_name, 
                    u.last_name, 
                    a.date, 
                    a.status 
                FROM 
                    users AS u 
                LEFT JOIN 
                    attendance AS a 
                ON 
                    u.id = a.user_id 
                    AND a.date = '$qDate' 
                WHERE 
                    u.class_id = '{$_SESSION["class_id"]}' AND u.role_id = '3'";
    $re_name = mysqli_query($conn, $sql_name);
    // Add the date to the array
    while ($row_dt = mysqli_fetch_assoc($re_name)) {
        // Add each row to the $attendData array
        $attendData[] = $row_dt;
    }
    $currentMonthDates[] = $qDate;
}


