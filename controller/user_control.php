<?php
include ("../includes/db.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

//delete button logic api calling and 
// echo '<pre>'; print_r($_POST); exit;
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
if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) {

    include ("../includes/header.php");
    include ("../includes/sidebar.php");

    $insert = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // insert user
        if (isset($_POST['email'])) {
            $role = $_POST['role_id'];
            $class = $_POST['class_id'];
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
                        $sql = "INSERT INTO `users`(`role_id`, `class_id`, `email`, `password`, `first_name`, `last_name`, `dob`, `gender`, `phone`, `blood_group`, `address`, `city`, `profile_img`, `status`, `created_by`) VALUES ('$role', '$class','$email','$password','$fname','$lname','$dob','$gender','$phone','$bgroup','$address','$city','$img_name','$status','$created_by')";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $insert = true;

                            // when user created send mail
                            $mail = new PHPMailer(true);

                            try {
                                //Server settings
                                $mail->isSMTP();                                  //Send using SMTP
                                $mail->Host = 'smtp.gmail.com';                   //Set the SMTP server to send through
                                $mail->SMTPAuth = true;                           //Enable SMTP authentication
                                $mail->Username = 'schoolmate202425@gmail.com';   //SMTP write your email
                                $mail->Password = 'dopsgqibjkmcxpjw';             //SMTP password
                                $mail->SMTPSecure = 'ssl';                        //Enable implicit SSL encryption
                                $mail->Port = 465;

                                //Recipients
                                $mail->setFrom('schoolmate202425@gmail.com', 'SchoolMate');  // Sender Email and name
                                $mail->addAddress($email, $fname);                            //Add a recipient email  

                                //Content
                                $mail->isHTML(true);                                         //Set email format to HTML
                                $mail->Subject = "New User Created!";
                                $mail->Body = "Hi " . $fname . " " . $lname . ",<br><br>";
                                $mail->Body .= "Your account is created:<br><br>";
                                $mail->Body .= "Username: " . $email . "<br><br>";
                                $mail->Body .= "Password: " . $password . "<br><br>";
                                $mail->Body .= "Please keep this password secure and do not share it with anyone.<br><br>";
                                $mail->Body .= "You can login using the following link:<br>";
                                $mail->Body .= "<a href='http://localhost/schoolMate/login.php'>click here to login</a><br><br>";
                                $mail->Body .= "Thank you,<br>SchoolMate";
                                // // Success sent message alert
                                if ($mail->send()) {

                                    $_SESSION['toast_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <strong>Success!</strong> New User is Created!
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>';

                                } else {
                                    echo "Something is wrong, Mail is not sent!";
                                }


                            } catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }

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
            }
        }


        // $created_email = $_POST['email'];
        // $first_name = $_POST['first_name'];
        // $last_name = $_POST['last_name'];
        // $password = $_POST['password'];
        // if (isset($create_email)) {

        // }


        // edit user
        if (isset($_POST['edit_email'])) {
            $id = $_POST['edit_id'];
            $class = $_POST['edit_class_id'];
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
            `class_id`='$class',
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
                if ($update) {
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
    }
}

// sql for form in role dropdown
$sql_dropdown = "SELECT * FROM `roles`";
$re_dropdown = mysqli_query($conn, $sql_dropdown);
// sql for form in role dropdown
$role_table = "SELECT * FROM `roles`";
$search_role = mysqli_query($conn, $role_table);
//sql for form in class dropdown for edit modal
$modal_class_dropdown = "SELECT * FROM `classes`";
$m_class_dropdown = mysqli_query($conn, $modal_class_dropdown);
//sql for form in class dropdown for add form
$sql_class_dropdown = "SELECT * FROM `classes`";
$class_dropdown = mysqli_query($conn, $sql_class_dropdown);
// sql for data table
$sql_dt = "SELECT users.*,roles.role_name,classes.class_name FROM `users` JOIN `roles` ON users.role_id = roles.role_id JOIN `classes` ON users.class_id = classes.class_id";
$re_dt = mysqli_query($conn, $sql_dt);
$sno = 0;
?>
<?php
include("../includes/db.php");
 if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) {
//delete button logic api calling and 
// echo '<pre>'; print_r($_POST); exit;
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

$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_POST['email'])){
        $role = $_POST['role_id'];
        $class = $_POST['class_id'];
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
                $img_name = uniqid() . '_' . $_FILES['profile_img']['name'];
                $img_tmp_name = $_FILES['profile_img']['tmp_name'];
                $upload_folder = '../dist/img/user_image/';
    
                // Move uploaded file from temporery destination to permanent destination folder
                if (move_uploaded_file($img_tmp_name, $upload_folder . $img_name)) {
                    // Insert data into database
                    $sql = "INSERT INTO `users`(`role_id`, `class_id`, `email`, `password`, `first_name`, `last_name`, `dob`, `gender`, `phone`, `blood_group`, `address`, `city`, `profile_img`, `status`, `created_by`) VALUES ('$role', '$class','$email','$password','$fname','$lname','$dob','$gender','$phone','$bgroup','$address','$city','$img_name','$status','$created_by')";
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
        }
    }

    // edit user
    if(isset($_POST['edit_email'])){
        $id = $_POST['edit_id'];
        $class = $_POST['edit_class_id'];
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
            `class_id`='$class',
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
}
}

// sql for form in role dropdown
$sql_dropdown = "SELECT * FROM `roles`";
$re_dropdown = mysqli_query($conn, $sql_dropdown);
// sql for form in role dropdown
$role_table = "SELECT * FROM `roles`";
$search_role = mysqli_query($conn, $role_table);
//sql for form in class dropdown for edit modal
$modal_class_dropdown = "SELECT * FROM `classes`";
$m_class_dropdown = mysqli_query($conn, $modal_class_dropdown);
//sql for form in class dropdown for add form
$sql_class_dropdown = "SELECT * FROM `classes`";
$class_dropdown = mysqli_query($conn, $sql_class_dropdown);
// sql for data table
$sql_dt = "SELECT users.*,roles.role_name,classes.class_name FROM `users` JOIN `roles` ON users.role_id = roles.role_id JOIN `classes` ON users.class_id = classes.class_id";
$re_dt = mysqli_query($conn, $sql_dt);
$sno = 0;
 }
 else{
    header("location: 404.php");
 }
?>