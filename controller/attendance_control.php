<?php
include("../includes/db.php");

if (isset($_POST['action']) && isset($_POST['id'])){
    attendence();
}

function attendence()
{
    global $conn;
    $id = $_POST['id'];
    $currentDate = date('Y-m-d');
    if($_POST['action'] == 'present'){
        $result = mysqli_query($conn, "INSERT INTO `attendance`(`user_id`, `date`, `status`) VALUES ('$id', '$currentDate','present')");
    }else if($_POST['action'] == 'absent'){
        $result = mysqli_query($conn, "INSERT INTO `attendance`(`user_id`, `date`, `status`) VALUES ('$id', '$currentDate','absent')");
    }else if($_POST['action'] == 'holiday'){
        $result = mysqli_query($conn, "INSERT INTO `attendance`(`user_id`, `date`, `status`) VALUES ('$id', '$currentDate','holiday')");
    }
    if($result){
        echo 1;
        exit;
    }else {
        echo 0;
        exit;
    }
}



include("../includes/header.php");
include("../includes/sidebar.php");
$class_id=$_SESSION['class_id'];
$role_id=$_SESSION['role_id'];
$sql_dt = "SELECT * FROM users where class_id = $class_id AND role_id = 3";
$re_dt = mysqli_query($conn, $sql_dt);
?>