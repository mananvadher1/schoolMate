<?php
include ("../includes/db.php");
include ("../includes/header.php");
include ("../includes/sidebar.php");



$update = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $current = $_POST['current'];
    $new = $_POST['new'];
    $confirm = $_POST['confirm'];

    $sql_fetch = "SELECT * FROM `users`";
    $result_fetch = mysqli_query($conn, $sql_fetch);
    $row = mysqli_fetch_assoc($result_fetch);
    $password = $row["password"];

    if($current == $password){
        // echo "right current password";

        if ($new == $confirm) {
            $sql = "UPDATE `users` SET `password` = '" . $new . "' WHERE `id` = '" . $_SESSION['id'] . "'";
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                $update = true;
                echo "<script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'Password updated successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#3085d6'
                        });
                    </script>";
                }
        } else {
            // echo  "error";
            echo "<script>
                        Swal.fire({
                            title: 'Error!',
                            text: 'New and Confirm password should be the same!',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#3085d6'
                        });
                    </script>";
        }
    }else{
        // echo "wrong current password";
        echo "<script>
                        Swal.fire({
                            title: 'Error!',
                            text: 'You should enter correct current password!',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#3085d6'
                        });
                    </script>";
    }



}

?>