<?php 
include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");

$role_id = $_SESSION['role_id'];
   $sql_name="SELECT role_name FROM `roles` WHERE role_id=$role_id";
   $result_name = mysqli_query($conn, $sql_name);
   if ($result_name && mysqli_num_rows($result_name) > 0) {
       $row = mysqli_fetch_assoc($result_name);
       $role_name = $row['role_name'];
   } 

//    principle's detail
   $sql_pri_det="SELECT first_name,last_name,email FROM users where role_id=1";
   $result_pri_det = mysqli_query($conn, $sql_pri_det);
   if ($result_pri_det && mysqli_num_rows($result_pri_det) > 0) {
       $row = mysqli_fetch_assoc($result_pri_det);
       $p_email = $row['email'];
       $p_fname = $row['first_name'];
       $p_lname = $row['last_name'];
   } 
//total no of student in class 
$class_id=$_SESSION['class_id'];
$sql = "SELECT * FROM `users` WHERE class_id =4 && role_id=3;";
    $result = mysqli_query($conn, $sql);
    $total_stu_class=mysqli_num_rows($result);

   //  total no of student 
    $sql = "SELECT * FROM users where role_id=3";
    $result = mysqli_query($conn, $sql);
    $total_stu=mysqli_num_rows($result);

    //  total no of teacher
    $sql = "SELECT * FROM users where role_id=2";
    $result = mysqli_query($conn, $sql);
    $total_tec=mysqli_num_rows($result);


    //student detail;
    $id =$_SESSION['id'] ;
    $sql=" SELECT first_name,last_name,email,phone FROM `users` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
   if ($result && mysqli_num_rows($result) > 0) {
       $row = mysqli_fetch_assoc($result);
       $s_email = $row['email'];
       $s_fname = $row['first_name'];
       $s_lname = $row['last_name'];
       $s_phone=$row['phone'];
   } 

   //total driver
   $sql = "SELECT * FROM `driver`";
   $result = mysqli_query($conn, $sql);
   $total_driver=mysqli_num_rows($result);

   //total vehical
    $sql = "SELECT * FROM `vehical`";
    $result = mysqli_query($conn, $sql);
    $total_veh=mysqli_num_rows($result);
    

    // class teacher detail;
    $class_id =$_SESSION['class_id'] ;
    $sql=" SELECT email,first_name,last_name,phone FROM `users` ";
    if($_SESSION['role_id'] != 1){
        $sql .= "WHERE class_id=$class_id && role_id=2;";
    }
    $tech_result = mysqli_query($conn, $sql);
   if ($result && mysqli_num_rows($tech_result) > 0) {
       $row = mysqli_fetch_assoc($tech_result);
       $email = $row['email'];
       $fname = $row['first_name'];
       $lname = $row['last_name'];
       $phone= $row['phone'];
   } 

?>