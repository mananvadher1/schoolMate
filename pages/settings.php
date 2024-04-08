<?php 
include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");
?>

<div class="container my-3">
    <div class="heading">
        <h1><b>Settings</b></h1>
    </div>
    <div class="content my-3">
        <a href="change_password.php"><button type="button" class="btn btn-outline-primary btn-lg btn-block my-3">Change Your Account Password</button></a>
        <a href="change_password.php"><button type="button" class="btn btn-outline-primary btn-lg btn-block my-3">Change Your Account Theme</button></a>
        <a href="change_password.php"><button type="button" class="btn btn-outline-primary btn-lg btn-block my-3">Change Your Account Wallpaper</button></a>
    </div>
</div>

<?php include ("../includes/footer.php"); ?>