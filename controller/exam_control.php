<?php
include ("../includes/db.php");
include ("../includes/header.php");
include ("../includes/sidebar.php");

// fetch exam
$sql_exams = "SELECT * FROM `exams`";
$result_exams = mysqli_query($conn, $sql_exams);

?>