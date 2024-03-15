<?php
session_start();
$conn = mysqli_connect("localhost", "phpmyadmin", "Admin@123", "SchoolMate");
if (mysqli_connect_error()) {
    echo "can not connect";
}

error_reporting(E_ALL);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $randomPassword = generateRandomPassword();

    $email = $_POST['email'];

    $sql = "SELECT * FROM `users` WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num==1) {

        $row = mysqli_fetch_assoc($result);

        $username = $row['email'];
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        // $token = $userdata['token'];


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
            $mail->Subject = "Your New Password";
            $mail->Body = "Hi " . $fname . ",<br><br>";
            $mail->Body .= "We've generated a new password for you:<br><br>";
            $mail->Body .= "New Password: " . $randomPassword . "<br><br>";
            $mail->Body .= "Please keep this password secure and do not share it with anyone.<br><br>";
            $mail->Body .= "You can login using the following link:<br>";
            $mail->Body .= "<a href='http://localhost/schoolMate/login.php'>https://example.com/login</a><br><br>";
            $mail->Body .= "Thank you,<br>SchoolMate";
            // // Success sent message alert
            if ($mail->send() && mysqli_query($conn, "UPDATE `users` SET `password`='$randomPassword' WHERE `email`='$email'")) {
                // echo "<script> 
                //     document.location.href = '../login.php';
                // </script>";
                $_SESSION['toast_message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong>Check your email to get new generated password. Now you can login.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
                header('Location: ../login.php');
            }else {
                echo "Something is wrong, Mail is not sent!";
            }


        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>No Email Found!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }
}

// Function to generate random password
function generateRandomPassword($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, $max)];
    }
    return $password;
}
?>