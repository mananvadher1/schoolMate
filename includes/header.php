
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SchoolMate</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">

    
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/logo.jpeg" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-dark sticky-top">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <div class="text-center">
                <? echo "Welcome <b>".$_SESSION['fname']."</b>!"; ?>
            </div>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <a href="/schoolMate/pages/login.php"><button class='btn btn-primary ml-2 text-decoration-none'
                            data-toggle='modal' data-target='#loginModal'>Login</button></a>
                    </a>
                </li> -->


                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu my-2">
                    <a href="#" class="dropdown-toggle text-light mx-2" data-toggle="dropdown">
                        <i class="fas fa-user"></i>
                        <span><?php echo $_SESSION['fname']." ".$_SESSION['lname'];?> <i class="caret"></i></span>
                    </a>

                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-blue" style="height: 250px;">
                            <!-- <?php echo $_SESSION['img'];?> -->
                            <img src="../dist/img/user.png" class="img-circle" alt="User Image" />
                            <p><b><?php echo $_SESSION['fname']." ".$_SESSION['lname']."<br>";?>
                                    <small><?php echo "Username: ". $_SESSION['email']."<br>";?></small>
                                    <small><?php echo "Phone: ". $_SESSION['phone']."<br>";?></small>
                                    <small><?php echo "Gender: ". $_SESSION['gender']."<br>";?></small>
                                    <small><?php echo "Blood Group: ". $_SESSION['bg']."<br>";?></small>
                                </b>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="float-left">
                                <a href="#" class="btn btn-default btn-flat">Edit Profile</a>
                            </div>
                            <div class="float-right">
                                <a href="../logout.php" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">