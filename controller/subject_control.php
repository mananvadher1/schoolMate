<?php
include("../includes/db.php");
// checks conditions if the session is not set or(||) the session is not true = both means that you are not logged in so we redirect that page to login.php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: http://localhost/schoolMate/login.php");
    // echo $_SESSION['loggedin'];
    exit;
}

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
  $result = mysqli_query($conn, "SELECT * FROM `subjects` WHERE subject_id = $id;");
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

function delete()
{
  global $conn;
  $id = $_POST['id']; // Corrected $_POST variable name

  $result = mysqli_query($conn, "DELETE FROM subjects WHERE subject_id = $id");
  // echo var_dump($result);
  echo 1;
  exit;
}
//form and page related data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //for update the sql
  if (isset($_POST['subject_id'])) {
      $edit_id = $_POST["subject_id"];
     
       $edit_code = $_POST["edit_code"];
      $edit_ref = $_POST["edit_sub_ref"];

      $updatesql = "UPDATE `subjects` SET `subject_code` = '$edit_code', `subject_ref` = '$edit_ref' WHERE `subject_id` = $edit_id";
      $updateResult = mysqli_query($conn, $updatesql);


      if ($updateResult) {
          $update = true;
      } else {
          echo "Error: " . $updatesql . "<br>" . mysqli_error($conn);
      }
  }
}
include("../includes/header.php");
include("../includes/sidebar.php");
$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['sub_code'])) {
        $c_name = $_POST['class_name'];
        $s_name = $_POST['sub_name'];
        $s_code = $_POST['sub_code'];
        $s_ref = $_POST['sub_ref'];
    
        // insert data into subjects
        $sql_insert = "INSERT INTO `subjects`(`subject_name`, `subject_code`, `subject_ref`, `class_name`) VALUES ('$s_name','$s_code','$s_ref','$c_name')";
        $result = mysqli_query($conn, $sql_insert);

        if($result){
            $insert = true;
        // echo "done";
        if($insert){
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Success!</strong> Your subject is inserted successfully!
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
    }



// Get unique class names from the subjects table
// query to fetch distinct class to loop through each class and show content of that class  
$sql_classes = "SELECT DISTINCT class_name FROM subjects ORDER BY class_name";
$result_classes = mysqli_query($conn, $sql_classes);

// for fetching classes in select tag
$sql_fetch = "SELECT * FROM `classes`";
$result3 = mysqli_query($conn, $sql_fetch);
  

?>