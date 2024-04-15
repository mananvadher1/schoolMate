<?php
include ("../includes/db.php");
include ("../includes/header.php");
include ("../includes/sidebar.php");

// Check if the user ID and exam submission flag are set in the session
if (isset($_SESSION['id']) && isset($_SESSION['examSubmitted']) && $_SESSION['examSubmitted'] == true) {
    $actionText = "<button class='btn btn-sm btn-success' disabled>Submitted</button>";
} else {
    $actionText = "<button class='btn btn-sm btn-danger'>Attend Exam</button>";
}
// fetch exam
$sql_exams = "SELECT * FROM `exams` WHERE `class_id` = ".$_SESSION['class_id']."";
$result_exams = mysqli_query($conn, $sql_exams);

?>

