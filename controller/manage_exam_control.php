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


// if(isset($_POST['class'])) {
//     $selectedClass = $_POST['class'];
//     $subjects = array();
//     $result_subjects = mysqli_query($conn, "SELECT * FROM subjects WHERE class = '$selectedClass'");
//     while($row = mysqli_fetch_assoc($result_subjects)) {
//         $subjects[] = $row['subject_name'];
//     }
// }


$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $class = $_POST['class'];
        $sub = $_POST['subject'];
        $edate = $_POST['edate'];
        $etime = $_POST['etime'];
        $duration = $_POST['duration'];
        $c_ans = $_POST['correct_ans'];
        $w_ans = $_POST['wrong_ans'];
        $rdate = $_POST['rdate'];
        $status = $_POST['status'];
    
        // insert data into exams
        $sql = "INSERT INTO `exams`(`class_name`, `subject_name`, `exam_date`, `exam_time`, `duration`, `c_ans`, `w_ans`, `result_date`, `status`) VALUES ('$class','$sub','$edate','$etime','$duration','$c_ans','$w_ans','$rdate','$status')";
        $result = mysqli_query($conn, $sql);

        if($result){
            $insert = true;
        // echo "done";
        if($insert){
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Success!</strong> Exam is scheduled successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <strong>Error!</strong>  '. mysqli_error($conn).'!
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

?>