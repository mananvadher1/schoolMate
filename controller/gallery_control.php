<?php
// Include your database connection file here
include("../includes/db.php");
// Fetch image names from the database where title is 'Events'
$sql = "SELECT DISTINCT image FROM `gallery` WHERE title='Events'";
$result = mysqli_query($conn, $sql);

$imageNames = array();
while ($row = mysqli_fetch_assoc($result)) {
    $imageNames[] = $row['image'];
}


$sqlAc = "SELECT DISTINCT image FROM `gallery` WHERE title='Academic'";
$resultAc = mysqli_query($conn, $sqlAc);

$Academicimage = array();
while ($row = mysqli_fetch_assoc($resultAc)) {
    $Academicimage[] = $row['image'];
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $title = $_POST['title'];
    $created_by = $_SESSION['email'];
}
$insert = false;
            // Handle file upload
            if (isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] === UPLOAD_ERR_OK) {
                $img_name = $_FILES['profile_img']['name'];
                $img_tmp_name = $_FILES['profile_img']['tmp_name'];
                $upload_folder = '../dist/img/gallery_image/';
    
                // Move uploaded file from temporery destination to permanent destination folder
                if (move_uploaded_file($img_tmp_name, $upload_folder . $img_name)) {
                    // Insert data into database
                    $sql = "INSERT INTO `gallery`(`image`, `title`, `created_by`) VALUES ('$img_name','$title','$created_by')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $insert = true;
                        if ($insert) {
                            echo "<script>
                            Swal.fire({
                                title: 'Success!',
                                text: 'User inserted successfully!',
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
                            text: 'User can't be inserted!',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#3085d6'
                        });
                        </script>";
                        echo mysqli_error($conn);
                    }
                } else {
                    echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something\'s wrong with moving uploaded file!',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3085d6'
                    });
                    </script>";
                }
            } else {
                echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'File isn\'t uploaded successfully!',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6'
                });
                </script>";
            }
        
    
include("../includes/header.php"); 
include("../includes/sidebar.php");
?>