<?php
include ("../includes/db.php");
if ($_SESSION['role_id'] == 3){
$cid = $_GET["cid"];
$sname = $_GET["sname"];
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
// echo "done";
// }
if($_SESSION['class_id'] == $cid){
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
}else
{
     header("location: 404.php");
}
?>



<!-- ****************header code************* -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SchoolMate</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- full calender -->
    <link rel="stylesheet" href="../plugins/fullcalendar/main.css" rel="stylesheet">
    <!-- Include Slick Slider CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" />

    <!-- LINK OF SWEETALERT 2 -->
    <script src="../dist/js/sweetalert.min.js"></script>


    <script src="../plugins/jquery/jquery.min.js"></script>

    <style>
        .container {
            overflow: hidden;
        }
    </style>

</head>

<!-- <body class="hold-transition sidebar-mini layout-fixed">. -->

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/logo.jpeg" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
            <img src="../dist/img/logo.jpeg  " alt="Logo" class="brand-image img-circle elevation-3 mr-2 ml-4"
                style="opacity: .8;width:30px;height:30px">
            <a class="navbar-brand" href="#"><b><i>SchoolMate</i></b></a>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="ml-5 text-center">
                    <h5 class="ml-5 mt-2">
                        <?php echo "Welcome <b>" . $_SESSION['fname'] . "</b>!"; ?>
                    </h5>
                </div>
                <div class="ml-5 mt-2">
                    <p style="margin-left:600px;"><strong>SCHOOLMATE wishes you Best of Luck for your exam!</strong></p>
                </div>
            </div>
        </nav>

        <!-- Main Sidebar Container -->
    <?php } 
    else{
        header("location: 404.php");
    }
    