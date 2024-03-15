<?php
include("../includes/db.php");

$insert = false;
// $class_id = $_GET["cid"];
// $subject_name = $_GET["sname"];
// var_dump($class_id, $subject_name);
$class_id = isset($_GET["cid"]) ? $_GET["cid"] : "";
$subject_name = isset($_GET["sname"]) ? $_GET["sname"] : "";


// echo "Class ID: " . $class_id . "<br>";
// echo "Subject Name: " . $subject_name;


if($_SERVER["REQUEST_METHOD"]=="POST"){
  $question = $_POST['question'];
  $mark = $_POST['mark'];
  $optionA = $_POST['optionA'];
  $optionB = $_POST['optionB'];
  $optionC = $_POST['optionC'];
  $optionD = $_POST['optionD'];
  $right_option = $_POST['right_option'];
  $created_by = $_SESSION['email'];
    
    $sql = "INSERT INTO `questions`(`question`, `mark`, `optionA`, `optionB`, `optionC`, `optionD`, `right_option`, `class_id`, `subject_name`, `created_by`) VALUES ('$question','$mark','$optionA','$optionB','$optionC','$optionD','$right_option','".$_GET["cid"]."','".$_GET["sname"]."','$created_by')";
    // var_dump($sql);
    $result = mysqli_query($conn, $sql);

    if($result){
      $insert = true;
      // echo "done";
    }
    else{
      echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
      <strong>Error!</strong> Question can\'t be inserted!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }
}

$sql_fetch = 'SELECT * FROM `questions`
WHERE class_id="'.$class_id.'" and subject_name="'.$subject_name.'"';
$result_fetch = mysqli_query($conn, $sql_fetch);

include("../includes/header.php");
include("../includes/sidebar.php");

if ($insert) {
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
  <strong>Success!</strong> Question is inserted successfully!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>';
        }
?>