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
?>

<?php
$update = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_SESSION['id']; 
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $bgroup = $_POST['blood_group'];
    $address = $_POST['address'];
    // update
    $sql = "UPDATE `users` SET `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `dob` = '$dob', `gender` = '$gender', `phone` = '$phone', `blood_group` = '$bgroup', `address` = '$address' WHERE `id` = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $update = true;
        // echo "done";
        if($update){
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Success!</strong> Your records are updated successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
$id= $_SESSION['id'];
$sql_edit = "SELECT * FROM `users` WHERE  `id`=$id";
$re_edit = mysqli_query($conn, $sql_edit);
$row_edit = mysqli_fetch_assoc($re_edit);
?>