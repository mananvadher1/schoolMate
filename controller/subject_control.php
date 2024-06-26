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

include("../includes/header.php");
include("../includes/sidebar.php");
// if ($_SESSION['role_id'] != 1) {
//form and page related data
$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //for update the sql
  if (isset($_POST['subject_id'])) {
    $edit_id = $_POST["subject_id"];
    $class_id = $_POST["cid"];

    $edit_code = $_POST["edit_code"];
    $edit_ref = $_POST["edit_sub_ref"];

    $updatesql = "UPDATE `subjects` SET `subject_code` = '$edit_code', `subject_ref` = '$edit_ref' WHERE `subject_id` = $edit_id";
    $updateResult = mysqli_query($conn, $updatesql);


    if ($updateResult) {
      $update = true;
      if ($update) {
        echo "<script>
        Swal.fire({
            title: 'Success!',
            text: 'Subject updated successfully!',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6'
        }).then((result) => {
          // Call the feeDataTable function with the updated class_id
          subjectDataTable('$class_id');
          $('#class_id').val('$class_id');
      });
        </script>";
      }
    } else {
      echo "Error: " . $updatesql . "<br>" . mysqli_error($conn);
    }
  }
}


$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['sub_code'])) {
    $c_id = ($_SESSION['role_id'] == 2) ? $_SESSION['class_id'] : $_POST['class_id'];
    $s_name = $_POST['sub_name'];
    $s_code = $_POST['sub_code'];
    $s_ref = $_POST['sub_ref'];

    // insert data into subjects
    $sql_insert = "INSERT INTO `subjects`(`subject_name`, `subject_code`, `subject_ref`, `class_id`) VALUES ('$s_name','$s_code','$s_ref','$c_id')";
    $result = mysqli_query($conn, $sql_insert);

    if ($result) {
      $insert = true;
      // echo "done";
      if ($insert) {
        echo "<script>
          Swal.fire({
              title: 'Success!',
              text: 'Subject inserted successfully!',
              icon: 'success',
              confirmButtonText: 'OK',
              confirmButtonColor: '#3085d6'
          }).then((result) => {
            // Call the feeDataTable function with the updated class_id
            subjectDataTable('$c_id');
            $('#class_id').val('$c_id');
        });
          </script>";
      }
    } else {
      echo "<script>
      Swal.fire({
          title: 'Error!',
          text: 'Subject can't be inserted!',
          icon: 'error',
          confirmButtonText: 'OK',
          confirmButtonColor: '#3085d6'
      })
      </script>";
    }
  }
}



// Get unique class names from the subjects table
// query to fetch distinct class to loop through each class and show content of that class  

// $sql_classes = "SELECT DISTINCT class_name FROM subjects ORDER BY class_name";
// $result_classes = mysqli_query($conn, $sql_classes);
$id = $_SESSION['class_id'];
$sql_classes = "SELECT DISTINCT s.* ,c.class_name 
                  FROM subjects as s 
                  LEFT JOIN classes as c
                  ON s.class_id = c.class_id";
if ($id) {
  $sql_classes .= " WHERE s.class_id = " . $id . ";";
}
// echo $sql_classes;
$result_classes = mysqli_query($conn, $sql_classes);

// for fetching classes in select tag
$sql_fetch = "SELECT * FROM `classes`";
$result3 = mysqli_query($conn, $sql_fetch);
// } else {
//   header("location: 404.php");
// }


//sql for class dropdown to show dropdown to admin
$sql_class_dropdown = "SELECT * FROM `classes`";
$class_dropdown = mysqli_query($conn, $sql_class_dropdown);
