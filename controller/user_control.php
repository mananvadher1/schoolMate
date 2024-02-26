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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role_id'];
    $email = $_POST['email'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $bgroup = $_POST['blood_group'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    // Convert checkbox value to 1 or 0
    $status = isset($_POST['status']) ? 1 : 0;

    $created_by = $_SESSION['email'];

    //check user are already exist or not
    $sql = "SELECT * FROM users WHERE email = '$email' ";
    $result = mysqli_query($conn, $sql);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        echo "<script>alert('User already exists');</script>";
    } else {
        // Handle file upload
        if (isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] === UPLOAD_ERR_OK) {
            $img_name = $_FILES['profile_img']['name'];
            $img_tmp_name = $_FILES['profile_img']['tmp_name'];
            $upload_folder = '../dist/img/user_image/';

            // Move uploaded file from temporery destination to permanent destination folder
            if (move_uploaded_file($img_tmp_name, $upload_folder . $img_name)) {
                // Insert data into database
                $sql = "INSERT INTO `users`(`role_id`, `email`, `password`, `first_name`, `last_name`, `dob`, `gender`, `phone`, `blood_group`, `address`, `city`, `profile_img`, `status`, `created_by`) VALUES ('$role','$email','$password','$fname','$lname','$dob','$gender','$phone','$bgroup','$address','$city','$img_name','$status','$created_by')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('User Added Successfully');</script>";
                } else {
                    echo "<script>alert('Error : inserting data into database');</script>";
                }
            } else {
                echo "<script>alert('Error : moving uploaded file');</script>";
            }
        } else {
            echo "<script>alert('Error : uploading file');</script>";
        }
    }
}
// sql for form in dropdown
$sql_dropdown = "SELECT * FROM `roles`";
$re_dropdown = mysqli_query($conn, $sql_dropdown);
// sql for data table
$sql_dt = "SELECT id,role_id,email,password,first_name,last_name,dob,gender,phone,blood_group,address,city,status,created_by,created_dt,updated_by,updated_dt FROM `users`;";
$re_dt = mysqli_query($conn, $sql_dt);
$sno = 0;
?>