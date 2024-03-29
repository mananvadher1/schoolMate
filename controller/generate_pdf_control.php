<?php
include ("../includes/db.php");
// include ("../pages/result.php");
 
$cid = $_GET['cid'];
$sname = $_GET['sname'];

$sql = "SELECT * FROM `users`";
$result = mysqli_query( $conn, $sql );
$row = mysqli_fetch_assoc($result);
$fname = $row['first_name'];
$lname = $row['last_name'];
$email = $row['email'];

// $mpdf = new\MPDF\Mpdf();
// $mpdf->writeHTML($html);
// $file = "Result.pdf";
// $mdpf->output($file,'D');
?>
<div class="container">
    <div class="head" style="display: flex;">
        <img src="../dist/img/logo.jpeg" alt="" style="width:80px;height:80px">
        <h1><i>SchoolMate</i></h1>
    </div>
    <div class="content">
        <h3>Name: </h3><?php echo $fname .' '. $lname;?>
        <h3>Email: </h3><?php echo $email;?>
        <h3>Class: </h3><?php echo $cid;?>
        <h3>Subject: </h3><?php echo $sname;?>
        <!-- <h3>Total Score: </h3><?php echo $scored .'/'. $totalScore;?> -->
    </div>
</div>