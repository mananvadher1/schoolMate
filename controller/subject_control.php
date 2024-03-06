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

$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $c_name = $_POST['class_name'];
        $s_name = $_POST['sub_name'];
        $s_code = $_POST['sub_code'];
        $s_ref = $_POST['sub_ref'];
    
        // insert data into subjects
        $sql_insert = "INSERT INTO `subjects`(`subject_name`, `subject_code`, `subject_ref`, `class_name`) VALUES ('$s_name','$s_code','$s_ref','$c_name')";
        $result = mysqli_query($conn, $sql_insert);

        if($result){
            $update = true;
        // echo "done";
        if($update){
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Success!</strong> Your records are inserted successfully!
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



// Get unique class names from the subjects table
// query to fetch distinct class to loop through each class and show content of that class  
$sql_classes = "SELECT DISTINCT class_name FROM subjects";
$result_classes = mysqli_query($conn, $sql_classes);

// for fetching classes in select tag
$sql_fetch = "SELECT * FROM `classes`";
$result3 = mysqli_query($conn, $sql_fetch);


?>