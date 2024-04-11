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
        $result = mysqli_query($conn, "INSERT INTO `attendance`(`user_id`, `date`, `status`) VALUES ('$id', '$currentDate','P')");
    } else if ($_POST['action'] == 'absent') {
        $result = mysqli_query($conn, "INSERT INTO `attendance`(`user_id`, `date`, `status`) VALUES ('$id', '$currentDate','A')");
    } else if ($_POST['action'] == 'holiday') {
        $result = mysqli_query($conn, "INSERT INTO `attendance`(`user_id`, `date`, `status`) VALUES ('$id', '$currentDate','H')");
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


// $currentMonth = date('m');
// $currentYear = date('Y');

// $numberOfDays = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

// $monthDates = array();
// // Loop through each day of the current month
// for ($day = 1; $day <= $numberOfDays; $day++) {
//     $date = date("j M", strtotime("$currentYear-$currentMonth-$day"));
//     $monthDates[] = $date;
// }

//to print the data



