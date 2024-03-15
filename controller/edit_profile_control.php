<?php
include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");


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
          echo "<script>
          Swal.fire({
              title: 'Success!',
              text: 'Profile updated successfully!',
              icon: 'success',
              confirmButtonText: 'OK',
              confirmButtonColor: '#3085d6'
          });
          </script>";
        }
    } else {
      echo "<script>
      Swal.fire({
          title: 'Error!',
          text: 'Record can't be inserted!',
          icon: 'error',
          confirmButtonText: 'OK',
          confirmButtonColor: '#3085d6'
      });
      </script>";
        echo "Error: " . mysqli_error($conn);
    }
}
$id= $_SESSION['id'];
$sql_edit = "SELECT * FROM `users` WHERE  `id`=$id";
$re_edit = mysqli_query($conn, $sql_edit);
$row_edit = mysqli_fetch_assoc($re_edit);

?>