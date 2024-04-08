<?php
include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");
//sql for form in class dropdown for add form
$sql_class_dropdown = "SELECT * FROM `classes`";
$class_dropdown = mysqli_query($conn, $sql_class_dropdown);

$insert= false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class=$_POST['class_id'];
    $fees_type=$_POST['fees_type'];
    $fees=$_POST['fees'];
    $sql = " INSERT INTO `fees`(`class_id`, `fees_type`, `rs`) VALUES ('$class','$fees_type','$fees')";
    $result = mysqli_query($conn, $sql);
    if($result){
        $insert = true;
        if($insert){
            echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'Record inserted successfully!',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6'
            });
            </script>";
        }
    }
}
$sql = "SELECT * FROM `fees`";
$result = mysqli_query($conn, $sql);
?>
