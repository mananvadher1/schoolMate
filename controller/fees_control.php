<?php
include("../includes/db.php");
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    delete();
}

//edit button data send thrught api with jason format
else if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    edit();
}

function edit()
{
    global $conn;
    $id = $_POST['id'];
    $role_data = array();
    
    // fetch data from db 
    $result = mysqli_query($conn, "SELECT * FROM `fees` WHERE id = $id");
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
    
    $result = mysqli_query($conn, "DELETE FROM fees WHERE id = $id");
    // echo var_dump($result);
    echo 1;
    exit;
}
include("../includes/header.php");
include("../includes/sidebar.php");
$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['class_id'])){
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
 }
    // edit user
    $update=false;
    if(isset($_POST['edit_id'])){
        $id = $_POST['edit_id'];
        $class=$_POST['edit_class_id'];
        $fees_type=$_POST['edit_fees_type'];
        $fees=$_POST['edit_fees'];

        $sql = "UPDATE `fees` SET `class_id`='$class',`fees_type`='$fees_type',`rs`='$fees' WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
            if($update){
                echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'User updated successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6'
                });
                </script>";
              }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    }

//sql for form in class dropdown for edit modal
$modal_class_dropdown = "SELECT * FROM `classes`";
$m_class_dropdown = mysqli_query($conn, $modal_class_dropdown);
//sql for form in class dropdown for add form
$sql_class_dropdown = "SELECT * FROM `classes`";
$class_dropdown = mysqli_query($conn, $sql_class_dropdown);
// for data table
if($_SESSION['role_id']==3)
{
    $sql_dt = "SELECT * FROM `fees` WHERE class_id = " . $_SESSION['class_id'];
$re_dt = mysqli_query($conn, $sql_dt);
}
else
{
$sql_dt = "SELECT * FROM `fees`";
$re_dt = mysqli_query($conn, $sql_dt);

}
?>
