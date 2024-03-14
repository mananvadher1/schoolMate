<?php
include("../includes/db.php");


//delete button logic api calling and 
// echo '<pre>'; print_r($_POST); exit;
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
  $result = mysqli_query($conn, "SELECT * FROM `notices` WHERE notice_id = $id");
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

  $result = mysqli_query($conn, "DELETE FROM `notices` WHERE notice_id = $id");
  if ($result == true) {
    echo 1;
    exit;
  }
  echo 0;
  exit;
}
include("../includes/header.php");
include("../includes/sidebar.php");

$insert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['notice_title'])) {
    $title = $_POST["notice_title"];
    $description = $_POST["notice_desc"];
    $created_by = $_SESSION['email'];

    if (empty($title) || empty($description)) {
      echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error!</strong> You should fill empty fields first!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          </div>';
    } else {
      // insert query
      $sql = "INSERT INTO `notices` (`notice_title`, `notice_desc`, `created_by`, `created_dt`) VALUES ( '$title', '$description', '$created_by', CURRENT_TIMESTAMP())";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        //   echo "The data has been recorded successfully!<br>";
        $insert = true;
        if ($insert) {
          echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
              <strong>Success!</strong> Your notice has been inserted successfully!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>';
        }
      } else {
        echo "Error:<br>" . mysqli_error($conn);
      }
    }
  }

  // edit notice
  if (isset($_POST['edit_title'])) {
    $id = $_POST['edit_id'];
    $title = $_POST["edit_title"];
    $description = $_POST["edit_desc"];
    $updated_by = $_SESSION['email'];

    $sql = "UPDATE `notices` SET 
            `notice_title`='$title',
            `notice_desc`='$description',
            `updated_by`='$updated_by',
            `updated_dt`=CURRENT_TIMESTAMP() 
        WHERE `notice_id`='$id'";

    $result = mysqli_query($conn, $sql);
    // echo var_dump($result);
    if ($result) {
      $update = true;
      echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
      <strong>Success!</strong> Your notice has been updated successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}

//notice cards
$cardsql = "SELECT * FROM `notices`";
$cardresult = mysqli_query($conn, $cardsql);


