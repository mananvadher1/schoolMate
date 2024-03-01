<?php
include("../includes/db.php");
// checks conditions if the session is not set or(||) the session is not true = both means that you are not logged in so we redirect that page to login.php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: http://localhost/schoolMate/login.php");
    // echo $_SESSION['loggedin'];
    exit;
}

//delete button logic api calling and 
// echo '<pre>'; print_r($_POST); exit;
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    delete();
}

//edit button data send thrught api with jason format
if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    edit();
}

// function edit()
// {
//     global $conn;
//     $id = $_POST['id'];
//     $role_data = array();


//     // fetch data from db 
//     $result = mysqli_query($conn, "SELECT * FROM `users` WHERE id = $id");
//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_array($result)) {
//             array_push($role_data, $row);
//         }
//         // header("content-type : application/json");  this are give us to error we cant remain space between 'type' and ':'
//         header("Content-Type: application/json");
//         echo json_encode($role_data);
//         exit;
//     }
// }

// function delete()
// {
//     global $conn;
//     $id = $_POST['id']; // Corrected $_POST variable name

//     $result = mysqli_query($conn, "DELETE FROM users WHERE id = $id");
//     // echo var_dump($result);
//     echo 1;
//     exit;
// }

include("../includes/header.php");
include("../includes/sidebar.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_POST['email'])){
        $vehical_id = $_POST['vehical_id'];
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email=$_POST['email'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];   
        $created_by = $_SESSION['email'];
    
        //check user are already exist or not
        $sql = "SELECT * FROM `driver` WHERE email = '$email' AND phone_no = '$phone'";
        $result = mysqli_query($conn, $sql);
        $row_count = mysqli_num_rows($result);
        if ($row_count > 0) {
            echo "<script>alert('Driver already exists');</script>";
        } else {
            // Handle file upload
            if (isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] === UPLOAD_ERR_OK) {
                $img_name = $_FILES['profile_img']['name'];
                $img_tmp_name = $_FILES['profile_img']['tmp_name'];
                $upload_folder = '../dist/img/user_image/';
    
                // Move uploaded file from temporery destination to permanent destination folder
                if (move_uploaded_file($img_tmp_name, $upload_folder . $img_name)) {
                    // Insert data into database
                    $sql = "INSERT INTO `driver` ( `role_id`, `vehical_id`, `fname`, `lname`, `phone_no`, `email`, `dob`, `address`, `profile_img`, `created_by`, `created_dt`, `updated_by`, `updated_dt`) VALUES ('4', '$vehical_id', '$fname', '$lname', '$phone', '$email', '$dob', '$address', '$img_name', '$created_by', CURRENT_TIMESTAMP, NULL, NULL);";
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

    // if(isset($_POST['edit_email'])){
    //     $id = $_POST['edit_id'];
    //     $email = $_POST['edit_email'];
    //     $fname = $_POST['edit_fname'];
    //     $lname = $_POST['edit_lname'];
    //     $password = $_POST['edit_pass'];
    //     $dob = $_POST['edit_dob'];
    //     $gender = $_POST['edit_gender'];
    //     $phone = $_POST['edit_phone'];
    //     $bgroup = $_POST['edit_bg'];
    //     $address = $_POST['edit_add'];
    //     $city = $_POST['edit_city'];
    //     // Convert checkbox value to 1 or 0
    //     $status = isset($_POST['edit_status']) ? 1 : 0;
    
    //     $updated_by = $_SESSION['email'];

    //     $sql = "UPDATE `users` SET 
    //         `email`='$email',
    //         `first_name`='$fname',
    //         `last_name`='$lname',
    //         `password`='$password',
    //         `dob`='$dob',
    //         `gender`='$gender',
    //         `phone`='$phone',
    //         `blood_group`='$bgroup',
    //         `address`='$address',
    //         `city`='$city',
    //         `status`='$status',
    //         `updated_by`='$updated_by',
    //         `updated_dt`=CURRENT_TIMESTAMP() 
    //     WHERE id = $id";
    //     $result = mysqli_query($conn, $sql);
    //     if ($result) {
    //         $update = true;
    //     } else {
    //         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    //     }

    // }
}
// sql for form in dropdown
$sql_dropdown = "SELECT * FROM `vehical`";
$re_dropdown = mysqli_query($conn, $sql_dropdown);
// sql for data table
$sql_dt = "SELECT * FROM `driver`";
$re_dt = mysqli_query($conn, $sql_dt);
$sno = 0;
?>