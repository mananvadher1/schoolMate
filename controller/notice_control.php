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

$insert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["notice_title"];
    $description = $_POST["notice_desc"];

    if (empty($title) || empty($description)) {
        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error!</strong> You should fill empty fields first!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } else {
        // insert query
        $sql = "INSERT INTO `notices` (`notice_title`, `notice_desc`) VALUES ( '$title', '$description')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            //   echo "The data has been recorded successfully!<br>";
            $insert = true;
            if ($insert) {
            echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> Your notice has been inserted seccessfully!
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




?>



