<?php
include("../includes/db.php");

$insert = false;
$class_name = $_GET["cname"];
// echo var_dump($_GET["cname"]);
$subject_name = $_GET["sname"];
// echo var_dump($_GET["sname"]);
$created_by = $_SESSION['email'];

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $question = $_POST['question'];
    $mark = $_POST['mark'];
    $optionA = $_POST['optionA'];
    $optionB = $_POST['optionB'];
    $optionC = $_POST['optionC'];
    $optionD = $_POST['optionD'];
    $right_option = $_POST['right_option'];
    
    $sql = "INSERT INTO `questions`(`question`, `mark`, `optionA`, `optionB`, `optionC`, `optionD`, `right_option`, `class_name`, `subject_name`, `created_by`) VALUES ('$question','$mark','$optionA','$optionB','$optionC','$optionD','$right_option','$subject_name','$created_by')";
    $result = mysqli_query($conn, $sql);

    if($result){
      $insert = true;
      echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
      <strong>Success!</strong> Question is inserted successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
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

$sql_fetch = 'SELECT questions.*, classes.class_name 
FROM questions 
INNER JOIN classes ON questions.class_id = classes.class_id';
// WHERE questions.class_id = '.$_GET["class_id"].'
$result_fetch = mysqli_query($conn, $sql_fetch);

include("../includes/header.php");
include("../includes/sidebar.php");
?>