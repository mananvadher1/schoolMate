<?php
include ("../includes/db.php");

if (isset ($_POST['action']) && $_POST['action'] == 'delete') {
  delete();
}

//edit button data send thrught api with jason format
if (isset ($_POST['action']) && $_POST['action'] == 'edit') {
  edit();
}

function edit()
{
  global $conn;
  $id = $_POST['id'];
  $role_data = array();


  // fetch data from db 
  $result = mysqli_query($conn, "SELECT * FROM `questions` WHERE id = $id");
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      array_push($role_data, $row);
    }
    // header("content-type : application/json");  this are give us to error we cant remain space between 'type' and ':'
    header("Content-Type: application/json");
    echo json_encode($role_data);
    exit;
  }
}

// update exam 
$update = false;
if (isset ($_POST['edit_id'])) {
  $id = $_POST['edit_id'];
  $question = $_POST['edit_question'];
  $mark = $_POST['edit_mark'];
  $optionA = $_POST['edit_optionA'];
  $optionB = $_POST['edit_optionB'];
  $optionC = $_POST['edit_optionC'];
  $optionD = $_POST['edit_optionD'];
  $right_option = $row['edit_right_option'];
  // $updated_by = $_SESSION['email'];
  // $created_by = $_SESSION['email'];

  $sql = "UPDATE `questions` SET `question`='$question',`mark`='$mark',`optionA`= '$optionA',`optionB`= '$optionB',`optionC`= '$optionC', `optionD` = '$optionD', `right_option` = '$right_option' WHERE `id` = '$id'";

  $result = mysqli_query($conn, $sql);
  // echo var_dump($result);
  if ($result) {
    $update = true;

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}





function delete()
{
  global $conn;
  $id = $_POST['id']; // Corrected $_POST variable name

  $result = mysqli_query($conn, "DELETE FROM `questions` WHERE id = $id");
  if ($result == true) {
    echo 1;
    exit;
  }
  echo 0;
  exit;
}

// insert
$insert = false;
$class_id = isset ($_GET["cid"]) ? $_GET["cid"] : "";
$subject_name = isset ($_GET["sname"]) ? $_GET["sname"] : "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset ($_POST['question'])) {
    $question = $_POST['question'];
    $mark = $_POST['mark'];
    $optionA = $_POST['optionA'];
    $optionB = $_POST['optionB'];
    $optionC = $_POST['optionC'];
    $optionD = $_POST['optionD'];
    $right_option = $_POST['right_option'];
    $created_by = $_SESSION['email'];

    $sql = "INSERT INTO `questions`(`question`, `mark`, `optionA`, `optionB`, `optionC`, `optionD`, `right_option`, `class_id`, `subject_name`, `created_by`) VALUES ('$question','$mark','$optionA','$optionB','$optionC','$optionD','$right_option','" . $_GET["cid"] . "','" . $_GET["sname"] . "','$created_by')";
    // var_dump($sql);
    $result = mysqli_query($conn, $sql);

    if ($result) {
      $insert = true;
      // echo "done";
    } else {
      echo "<script>
        Swal.fire({
            title: 'Error!',
            text: 'Question can't be inserted!',
            icon: 'error',
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6'
        });
        </script>";
    }
  }

}

$sql_fetch = 'SELECT * FROM `questions`
WHERE class_id="' . $class_id . '" and subject_name="' . $subject_name . '"';
$result_fetch = mysqli_query($conn, $sql_fetch);

include ("../includes/header.php");
include ("../includes/sidebar.php");

if ($insert) {
  echo "<script>
  Swal.fire({
      title: 'Success!',
      text: 'Question inserted successfully!',
      icon: 'success',
      confirmButtonText: 'OK',
      confirmButtonColor: '#3085d6'
  });
  </script>";
}

if ($update) {
  echo "<script>
  Swal.fire({
      title: 'Success!',
      text: 'Question updated successfully!',
      icon: 'success',
      confirmButtonText: 'OK',
      confirmButtonColor: '#3085d6'
  });
  </script>";
}
?>