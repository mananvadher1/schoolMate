<?php
include("includes/db.php");
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];
    $password = $_POST['password'];

    
    
    $sql = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        while ($row = mysqli_fetch_assoc($result)) {
         $fname = $row['first_name'];
         $lname = $row['last_name'];
         $bg = $row['blood_group'];
         $img = $row['profile_img'];
         $phone = $row['phone'];
         $gender = $row['gender'];
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['bg'] = $bg;
                $_SESSION['img'] = $img;
                $_SESSION['phone'] = $phone;
                $_SESSION['gender'] = $gender;
                header("Location: http://localhost/schoolMate/pages/dashboard.php");
            }
    }else{
        $showError = "Invalid Credentials!";
    }
}
// echo var_dump($_SESSION);


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Login</title>
    <style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }

    span {
        font-weight: 1000;
        color: #0d6efd;
    }
    </style>




</head>

<body>
    <?php
if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
  }
?>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="dist/img/login.webp" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Login with <em><span>SchoolMate</span></em></p>

                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <!-- `<p class="text-center fw-bold mx-3 mb-0">Or</p>` -->
                        </div>

                        <!-- Role input -->
                        <!-- <div class="dropdown">
                            <label for="">Role</label>
                            <select class="form-control mb-3" id="role" name="role" placeholder="Select a role">
                                <option value="select">Select a role</option>
                                <option value="principal">Principal</option>
                                <option value="teacher">Teacher</option>
                                <option value="student">Student</option>
                            </select>
                        </div>
                        <div id="show_error1" class="mb-2"></div> -->
                       

                        <!-- Email input -->
                        <div class="form-outline mb-0">
                            <label class="form-label" for="email">Username</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg mb-2"
                                placeholder="Example:abc@gmail.com" />
                        </div>
                        <div id="show_error2" class="mb-2"></div>

                        <!-- Password input -->
                        <div class="form-outline mb-0">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control form-control-lg mb-2" placeholder="Enter password" />
                        </div>
                        <div id="show_error3" class="mb-2"></div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div> -->
                            <a href="#!">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" id="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <!-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                                    class="link-danger">Register</a></p> -->
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>

    <!-- jquery link -->
    <script src="dist/js/jq_min.js"></script>

    <!-- script for validation -->
    <script>
    $(document).ready(function() {
        $('#submit').click(function() {
            // alert("success");
            var user = $('#email').val();
            var pass = $('#password').val();
            // var role = $('#role').val();

            // ...
            // if (role === "select") {
            //     $('#show_error1').html('Please select a role first!').css('color', 'red');
            //     return false;
            // } else {
            //     $('#show_error1').empty();
            // }

            // ...
            if (user == "") {
                $('#show_error2').html('Username can not be empty!').css('color', 'red');
                return false;
            } else {
                $('#show_error2').empty();
            }

            // ...
            if (pass == "") {
                $('#show_error3').html('Password can not be empty!').css('color', 'red');
                return false;
            } else {
                $('#show_error3').empty();
            }

            // ...
            if (pass.length < 8) {
                $('#show_error3').html('Password length must be at least 8 characters!').css('color',
                    'red');
                return false;
            } else {
                $('#show_error3').empty();
            }

            // ...
            if (pass.length > 15) {
                $('#show_error3').html('Password length must be at most 15 characters!').css('color',
                    'red');
                return false;
            } else {
                $('#show_error3').empty();
            }


        });
    });
    </script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>