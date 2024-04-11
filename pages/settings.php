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
        <a href="#"><button type="button" class="btn btn-outline-primary btn-lg btn-block my-3">Change Your Account Theme</button></a>
        <a href="#"><button type="button" class="btn btn-outline-primary btn-lg btn-block my-3">Change Your Account Wallpaper</button></a>
        <a href="../dist/img/logo2.jpeg"><button type="button" class="btn btn-outline-primary btn-lg btn-block my-3">SchoolMate Logo</button></a>
        <a href="edit_profile.php"><button type="button" class="btn btn-outline-primary btn-lg btn-block my-3">View Your Profile</button></a>
    </div>
</div>

<?php include ("../includes/footer.php"); ?>

<!-- http://localhost/schoolMate/dist/img/logo2.jpeg -->