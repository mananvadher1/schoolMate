<?php
include("../includes/db.php");

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
  delete();
}

//edit button data send thrught api with jason format
if (isset($_POST['action']) && $_POST['action'] == 'edit') {
  edit();
}

function edit()
{
  global $conn;
  $id = $_POST['id'];
  $role_data = array();


  // fetch data from db 
  $result = mysqli_query($conn, "SELECT * FROM `exams` WHERE id = $id");
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
if (isset($_POST['edit_id'])) {
  $id = $_POST['edit_id'];
  $edate = $_POST["edit_edate"];
  $etime = $_POST["edit_etime"];
  $duration = $_POST['edit_duration'];
  $rdate = $_POST['edit_rdate'];
  $status = $_POST['edit_status'];
  // $updated_by = $_SESSION['email'];
  // $created_by = $_SESSION['email'];

  $sql = "UPDATE `exams` SET `exam_date`='$edate',`exam_time`='$etime',`duration`= '$duration',`result_date`= '$rdate',`status`= '$status' WHERE `id` = '$id'";

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

  $result = mysqli_query($conn, "DELETE FROM `exams` WHERE id = $id");
  if ($result == true) {
    echo 1;
    exit;
  }
  echo 0;
  exit;
}

$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if(isset($_POST['class'])){
  $class = $_POST['class'];
  $sub = $_POST['subject'];
  $edate = $_POST['edate'];
  $etime = $_POST['etime'];
  $duration = $_POST['duration'];
  $rdate = $_POST['rdate'];
  $status = $_POST['status'];
  
  // insert data into exams
  $sql = "INSERT INTO `exams` (`class_id`, `subject_name`, `exam_date`, `exam_time`, `duration`, `result_date`, `status`) VALUES ('$class', '$sub', '$edate', '$etime', '$duration', '$rdate', '$status')";
  $result = mysqli_query($conn, $sql);

  
  if ($result) {
    $insert = true;
    // echo "done";
    
          } else {
            echo "<script>
      Swal.fire({
          title: 'Error!',
          text: 'Exam can't be inserted!',
          icon: 'error',
          confirmButtonText: 'OK',
          confirmButtonColor: '#3085d6'
      });
      </script>";
          }
}
}



// fetch from exams
// join two tables classes and exams to fetch class_name
$sql_exams = "SELECT exams.*, classes.class_name 
FROM exams 
INNER JOIN classes ON exams.class_id = classes.class_id";
$result_exams = mysqli_query($conn, $sql_exams);

$sql_classes = "SELECT * FROM `classes`";
$result_classes = mysqli_query($conn, $sql_classes);

$sql_subjects = "SELECT * FROM `subjects`";
$result_subjects = mysqli_query($conn, $sql_subjects);


include("../includes/header.php");
include("../includes/sidebar.php");

if($insert){
  echo "<script>
  Swal.fire({
      title: 'Success!',
      text: 'Exam inserted successfully!',
      icon: 'success',
      confirmButtonText: 'OK',
      confirmButtonColor: '#3085d6'
  });
  </script>";
}

if($update){
  echo "<script>
  Swal.fire({
      title: 'Success!',
      text: 'Exam updated successfully!',
      icon: 'success',
      confirmButtonText: 'OK',
      confirmButtonColor: '#3085d6'
  });
  </script>";
}

?>


<!-- SELECT exams.*, classes.class_name 
FROM exams 
INNER JOIN classes ON exams.class_id = classes.class_id -->