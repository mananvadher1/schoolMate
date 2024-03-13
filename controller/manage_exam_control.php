<?php
include("../includes/db.php");

// condition of fetching subjects through ajax
if (isset($_POST['class']) && $_POST['class'] != NULL) {
  $selectedClass = $_POST['class'];
  $subjects = '';

  $sql_fetch_subject = "SELECT * FROM subjects WHERE `class_name` = '$selectedClass'";
  $result_fetch_subject = mysqli_query($conn, $sql_fetch_subject);

  while ($row = mysqli_fetch_assoc($result_fetch_subject)) {
    $sub = $row['subject_name'];
    $subjects .= '<option value="' . $sub . '">' . $sub . '</option>';
  }
  // for returning result as response
  echo $subjects;
}


$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $class = $_POST['class'];
  $sub = $_POST['subject'];
  $edate = $_POST['edate'];
  $etime = $_POST['etime'];
  $duration = $_POST['duration'];
  $rdate = $_POST['rdate'];
  $status = $_POST['status'];
  
  // insert data into exams
  $sql = "INSERT INTO `exams`(`class_name`, `subject_name`, `exam_date`, `exam_time`, `duration`, `result_date`, `status`) VALUES ('$class','$sub','$edate','$etime','$duration','$rdate','$status')";
  $result = mysqli_query($conn, $sql);
  
  if ($result) {
    $insert = true;
    // echo "done";
    if ($insert) {
      echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
      <strong>Success!</strong> Exam is scheduled successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>';
            }
          } else {
            echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <strong>Error!</strong>  ' . mysqli_error($conn) . '!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
          }
}


// fetch from exams
$sql_exams = "SELECT * FROM `exams`";
$result_exams = mysqli_query($conn, $sql_exams);

$sql_classes = "SELECT * FROM `classes`";
$result_classes = mysqli_query($conn, $sql_classes);

$sql_subjects = "SELECT * FROM `subjects`";
$result_subjects = mysqli_query($conn, $sql_subjects);


include("../includes/header.php");
include("../includes/sidebar.php");
?>