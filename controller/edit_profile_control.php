<?php
include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");


$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $bgroup = $_POST['blood_group'];
    $address = $_POST['address'];

    // Handle file upload for profile image
    if (isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] === UPLOAD_ERR_OK) {
        $img_name = uniqid() . '_' . $_FILES['profile_img']['name'];
        $img_tmp_name = $_FILES['profile_img']['tmp_name'];
        $upload_folder = '../dist/img/user_image/';

        // Remove previous image
        $sql_select_image = "SELECT profile_img FROM `users` WHERE `id` = $id";
        $result_select_image = mysqli_query($conn, $sql_select_image);
        if ($result_select_image && mysqli_num_rows($result_select_image) > 0) {
            $row = mysqli_fetch_assoc($result_select_image);
            $prev_image = $row['profile_img'];
            if ($prev_image) {
                unlink($upload_folder . $prev_image);
            }
        }

        // Move uploaded file from temporary destination to permanent destination folder
        if (move_uploaded_file($img_tmp_name, $upload_folder . $img_name)) {
            // Update user record with new profile image
            $sql = "UPDATE `users` SET `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `dob` = '$dob', `gender` = '$gender', `phone` = '$phone', `blood_group` = '$bgroup', `address` = '$address', `profile_img` = '$img_name' WHERE `id` = $id";
        } else {
            // Error handling if file upload fails
            echo "<script>
                  Swal.fire({
                      title: 'Error!',
                      text: 'Failed to upload profile image!',
                      icon: 'error',
                      confirmButtonText: 'OK',
                      confirmButtonColor: '#3085d6'
                  });
                  </script>";
            exit(); // Exit the script to prevent further execution
        }
    } else {
        // Update user record without changing the profile image
        $sql = "UPDATE `users` SET `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `dob` = '$dob', `gender` = '$gender', `phone` = '$phone', `blood_group` = '$bgroup', `address` = '$address' WHERE `id` = $id";
    }

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $update = true;
        // Show success message
        echo "<script>
              Swal.fire({
                  title: 'Success!',
                  text: 'Profile updated successfully!',
                  icon: 'success',
                  confirmButtonText: 'OK',
                  confirmButtonColor: '#3085d6'
              });
              </script>";
    } else {
        // Show error message if the query fails
        echo "<script>
              Swal.fire({
                  title: 'Error!',
                  text: 'Failed to update profile!',
                  icon: 'error',
                  confirmButtonText: 'OK',
                  confirmButtonColor: '#3085d6'
              });
              </script>";
        echo "Error: " . mysqli_error($conn);
    }
}
$id = $_SESSION['id'];
$sql_edit = "SELECT * FROM `users` WHERE  `id`=$id";
$re_edit = mysqli_query($conn, $sql_edit);
$row_edit = mysqli_fetch_assoc($re_edit);
