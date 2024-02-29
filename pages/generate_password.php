<?php 
include("../controller/generate_password_controller.php");
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

    <title>Recover Page</title>
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
            font-size: 1.3rem;
            color: #0d6efd;
        }
    </style>




</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="../dist/img/login.webp" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h1 style="font-weight:1000;color: #0d6efd" class="text-left mt-5 ml-0"><em><b>SchoolMate</b></em>
                    </h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3"><span>Update password</span></p>

                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <!-- `<p class="text-center fw-bold mx-3 mb-0">Or</p>` -->
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-0">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg mb-2"
                                placeholder="Example:abc@gmail.com" />
                        </div>
                        <div id="show_error2" class="mb-2"></div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" id="submit" class="btn btn-primary btn-lg float-left"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Send Mail</button>
                            <!-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                                    class="link-danger">Register</a></p> -->
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>

    <!-- jquery link -->
    <script src="../dist/js/jq_min.js"></script>

    <!-- script for validation -->
    <script>
        $(document).ready(function () {
            $('#submit').click(function () {
                // alert("success");
                var user = $('#email').val();
               
                // ...
                if (user == "") {
                    $('#show_error2').html('Username can not be empty!').css('color', 'red');
                    return false;
                } else {
                    $('#show_error2').empty();
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