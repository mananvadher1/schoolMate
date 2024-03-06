<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SchoolMate</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../css/ionicons.min.css">
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
    <!-- DataTables Responsive CSS -->
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- full calender -->
    <link rel="stylesheet" href="../plugins/fullcalendar/main.css" rel="stylesheet">
    <script src="../plugins/fullcalendar/main.js"></script>
    <style>
        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            border-collapse: collapse;
            border-spacing: 0;
            font-family: 'Source Sans Pro', sans-serif;
            border-collapse: collapse;
            background-color: lightcyan;
            border-radius: 5px;
            overflow: hidden;
        }

        .dataTables_wrapper {
            overflow-x: auto;
        }

        table.dataTable thead th,
        table.dataTable tbody td {
            white-space: nowrap;
            padding: 10px;
        }

        @media screen and (max-width: 767px) {

            table.dataTable thead th,
            table.dataTable tbody td {
                padding: 8px;
            }
        }

        table.dataTable thead th {
            background-color: #67b3ff;
            color: white;
            font-weight: bolder;
        }

        table.dataTable tbody tr:hover {
            background-color: lightblue;
        }

        .dataTables_paginate .paginate_button {
            border: none;
            /* Remove border */
            border-radius: 3px;
            padding: 2px 2px 2px 3px;
            margin: 0 5px;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .dataTables_paginate .paginate_button:hover {
            background-color: #0056b3;
        }


        .dataTables_filter input[type="search"],
        .dataTables_length select {
            border: 1px solid #007bff;
            border-radius: 3px;
            padding: 5px;
            background-color: #fff;
        }
        

        /* for chat room */
        body {
            background-color: #f4f4f4;
            /* Light grey background */
        }

        /* css for chat-app */
        * {
            font-family: "Roboto", sans-serif;
        }

        .chat-app .container {
            margin: 20px;
            padding: 10px;
        }

        .chat-app .card {
            border: 1.5px solid #67b3ff;
            background-color: lightcyan;
        }

        .chat-app .card-header {
            background-color: #007bff;
            color: white;
        }

        .chat-app input,
        img,
        #user-list {
            border: 0.5px solid lightsteelblue;
        }

        .chat-app #user-list li {
            border-bottom: 0.5px solid lightsteelblue;
        }

        .chat-app #user-list>li:last-child {
            border-bottom: none;
        }

        .chat-app .input-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .chat-app .btn {
            color: white;
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .chat-app .btn:hover {
            background-color: #0069d9;
        }

        .chat-app .card-body .text-end {
            text-align: left;
        }

        .chat-app .card-body .text-start {
            text-align: right;
        }
    </style>
    <script src="../plugins/jquery/jquery.min.js"></script>
</head>

<!-- <body class="hold-transition sidebar-mini layout-fixed">. -->

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/logo.jpeg" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <div class="text-center">
                <?php echo "Welcome <b>" . $_SESSION['fname'] . "</b>!"; ?>
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
                    <!-- chat -->
                    <a href="../pages/chat.php" class="">
                        <i class="fa fa-envelope"></i>
                        <span class="label label-danger">4</span>
                    </a>

                    <a href="#" class="dropdown-toggle text-light mx-2" data-toggle="dropdown">
                        <i class="fas fa-user"></i>
                        <span><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?> <i class="caret"></i></span>
                    </a>

                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-blue" style="height: 210px;">
                            <img src="../dist/img/user_image/<?php echo $_SESSION['img']; ?>" class="img-circle" alt="User Image" />
                            <p><b><?php echo $_SESSION['fname'] . " " . $_SESSION['lname'] . "<br>"; ?>
                                    <small><?php echo "Email: " . $_SESSION['email'] . "<br>"; ?></small>
                                    <small><?php echo "Phone: " . $_SESSION['phone'] . "<br>"; ?></small>
                                </b>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="float-left">
                                <a href="../pages/edit_profile.php" class="btn btn-default btn-flat">Edit Profile</a>
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