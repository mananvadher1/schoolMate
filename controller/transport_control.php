<?php
include("../includes/db.php");
// if ($_SESSION['role_id'] == ) {
    include("../includes/header.php");
    include("../includes/sidebar.php");
    $sql_dt = "SELECT v.vehical_no, d.driver_id,d.fname, d.lname, d.phone_no, a.area_name FROM driver AS d LEFT JOIN vehical AS v ON v.vehical_id = d.vehical_id LEFT JOIN area AS a ON a.vehical_id = v.vehical_id;";
    $re_dt = mysqli_query($conn, $sql_dt);
// } else {
//     header("location: 404.php");
// }
?>
<!-- select v.vehical_no,d.fname,d.lname,d.phone_no from driver as d LEFT JOIN vehical as v ON v.vehical_id=d.vehical_id; -->