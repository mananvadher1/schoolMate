<?php
include("../includes/db.php");

// condition of fetching subjects through ajax
if (isset($_POST['class']) && $_POST['class'] != NULL) {
    $selectedClass = $_POST['class'];
    $subjects = '';
  
    $sql_fetch_subject = "SELECT subjects.*, classes.class_id 
    FROM subjects 
    INNER JOIN classes ON subjects.class_name = classes.class_name WHERE `class_id` = '$selectedClass'";
    $result_fetch_subject = mysqli_query($conn, $sql_fetch_subject);
  
    while ($row = mysqli_fetch_assoc($result_fetch_subject)) {
      $sub = $row['subject_name'];
      $subjects .= '<option value="' . $sub . '">' . $sub . '</option>';
    }
    // for returning result as response
    echo $subjects;
  }

?>