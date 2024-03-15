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
    $result = mysqli_query($conn, "SELECT * FROM `users` WHERE id = $id");
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
    
    $result = mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    // echo var_dump($result);
    echo 1;
    exit;
}
if($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2){

include("../includes/header.php");
include("../includes/sidebar.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_POST['email'])){
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
                        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                        <strong>Success!</strong> User added successfully!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                        <strong>Error!</strong> Something\'s wrong with inserting data into database!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                        echo mysqli_error($conn);
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                    <strong>Error!</strong> Something\'s wrong with moving uploaded file!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                <strong>Error!</strong> File isn\'t uploaded successfully!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
            }
        }
    }

    // edit user
    if(isset($_POST['edit_email'])){
        $id = $_POST['edit_id'];
        $email = $_POST['edit_email'];
        $fname = $_POST['edit_fname'];
        $lname = $_POST['edit_lname'];
        $password = $_POST['edit_pass'];
        $dob = $_POST['edit_dob'];
        $gender = $_POST['edit_gender'];
        $phone = $_POST['edit_phone'];
        $bgroup = $_POST['edit_bg'];
        $address = $_POST['edit_add'];
        $city = $_POST['edit_city'];
        // Convert checkbox value to 1 or 0
        $status = isset($_POST['edit_status']) ? 1 : 0;
    
        $updated_by = $_SESSION['email'];

        $sql = "UPDATE `users` SET 
            `email`='$email',
            `first_name`='$fname',
            `last_name`='$lname',
            `password`='$password',
            `dob`='$dob',
            `gender`='$gender',
            `phone`='$phone',
            `blood_group`='$bgroup',
            `address`='$address',
            `city`='$city',
            `status`='$status',
            `updated_by`='$updated_by',
            `updated_dt`=CURRENT_TIMESTAMP() 
        WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
            echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> User has been updated successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }
}
}

// sql for form in dropdown
$sql_dropdown = "SELECT * FROM `roles`";
$re_dropdown = mysqli_query($conn, $sql_dropdown);
// sql for data table
$sql_dt = "SELECT * FROM `users`";
$re_dt = mysqli_query($conn, $sql_dt);
$sno = 0;
?>