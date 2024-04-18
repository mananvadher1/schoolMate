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
if ($_SESSION['role_id'] != 2) {
    include("../includes/header.php");
    include("../includes/sidebar.php");
    $insert = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['class_id']) && isset($_POST['fees_type'])) {
            $class = $_POST['class_id'];
            $fees_type = $_POST['fees_type'];
            $fees = $_POST['fees'];

            // Check if the fees_type already exists for the given class_id
            $sql_check_existence = "SELECT * FROM `fees` WHERE class_id = '$class' AND fees_type = '$fees_type'";
            $result_check_existence = mysqli_query($conn, $sql_check_existence);

            if (mysqli_num_rows($result_check_existence) > 0) {
                // If fees type already exists, display error message and call feeDataTable function
                echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Fees type already exists for the given class.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33'
                    }).then((result) => {
                        feeDataTable('$class');
                        $('#class_id').val('$class');
                    });
                    </script>";
            } else {
                // Proceed with the insert if fees_type doesn't exist
                $sql = "INSERT INTO `fees`(`class_id`, `fees_type`, `rs`) VALUES ('$class','$fees_type','$fees')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    // Assuming there's a column named 'id' with auto-increment in the 'fees' table
                    $id = mysqli_insert_id($conn); // Get the ID of the newly inserted record

                    // Run the JavaScript function after the insert
                    echo "<script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'Record inserted successfully!',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#3085d6'
                        }).then((result) => {
                            // Call the feeDataTable function with the provided class_id
                            feeDataTable('$class');
                            $('#class_id').val('$class');
                        });
                        </script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
        // edit user
        $update = false;
        if (isset($_POST['edit_id'])) {
            $id = $_POST['edit_id'];
            $fees_type = $_POST['edit_fees_type'];
            $fees = $_POST['edit_fees'];

            // Assuming there's a column named 'class_id' in the 'fees' table
            $sql_select_class_id = "SELECT class_id FROM `fees` WHERE id = $id";
            $result_select_class_id = mysqli_query($conn, $sql_select_class_id);

            if ($result_select_class_id && mysqli_num_rows($result_select_class_id) > 0) {
                $row = mysqli_fetch_assoc($result_select_class_id);
                $class_id = $row['class_id'];

                $sql = "UPDATE `fees` SET `fees_type`='$fees_type',`rs`='$fees' WHERE id = $id";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    // Run the JavaScript function after the update
                    echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'User updated successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6'
                }).then((result) => {
                    // Call the feeDataTable function with the updated class_id
                    feeDataTable('$class_id');
                    $('#class_id').val('$class_id');
                });
                </script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Error: Class ID not found for the given fees ID.";
            }
        }
    }

    //sql for form in class dropdown for edit modal
    $modal_class_dropdown = "SELECT * FROM `classes`";
    $m_class_dropdown = mysqli_query($conn, $modal_class_dropdown);
    //sql for form in class dropdown for add form
    $sql_class_dropdown = "SELECT * FROM `classes`";
    $class_dropdown = mysqli_query($conn, $sql_class_dropdown);
    // for data table
    if ($_SESSION['role_id'] == 3) {
        $sql_dt = "SELECT * FROM `fees` WHERE class_id = " . $_SESSION['class_id'];
        $re_dt = mysqli_query($conn, $sql_dt);
    } else {
        $sql_dt = "SELECT * FROM `fees`";
        $re_dt = mysqli_query($conn, $sql_dt);
    }
} else {
    header("location: 404.php");
}
