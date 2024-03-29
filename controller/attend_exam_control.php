<?php
include ("../includes/db.php");

$cid = $_GET["cid"];
$sname = $_GET["sname"];
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
// echo "done";
// }

// to fetch questions in while loop
$sql_fetch = "SELECT * FROM `questions` WHERE class_id = '$cid' AND subject_name= '$sname';";
$result_fetch = mysqli_query($conn, $sql_fetch);

// to fetch total questions
$sql_tq = "SELECT COUNT(DISTINCT ques_id) AS total_questions FROM questions WHERE class_id = '$cid' AND subject_name = '$sname';";
$result_tq = mysqli_query($conn, $sql_tq);
if ($result_tq) {
    // Fetch the result row as an associative array
    $row = mysqli_fetch_assoc($result_tq);
    $totalQuestions = $row['total_questions'];
}



// to fetch timer
$sql_timer = "SELECT * FROM `questions` INNER JOIN exams ON exams.class_id = questions.class_id WHERE exams.class_id = '$cid' AND exams.subject_name = '$sname';";

$result_timer = mysqli_query($conn, $sql_timer);


if ($result_timer && mysqli_num_rows($result_timer) > 0) {
    $row_timer = mysqli_fetch_assoc($result_timer);
    $duration_minutes = $row_timer['duration']; // Assuming duration is in minutes

    // Convert duration from minutes to seconds
    $duration_seconds = $duration_minutes * 60;
}





include ("../includes/header.php");
include ("../includes/sidebar.php");
?>


