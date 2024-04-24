<?php
include("../includes/db.php");
include("../includes/header.php");
include("../includes/sidebar.php");
?>

<div class="content">
    <div class="container-fluid">
        <div class="heading text-center">
            <h1><b>Settings</b></h1>
        </div>
        <div class="content my-3">
            <a href="change_password.php"><button type="button" class="btn btn-outline-primary btn-lg btn-block my-3">Change Your Account Password</button></a>
            <a href="edit_profile.php"><button type="button" class="btn btn-outline-primary btn-lg btn-block my-3">View Your Profile</button></a>
        </div>
    </div>
</div>
<script>
        $('#settings-link').addClass('active');
</script>
<?php include("../includes/footer.php"); ?>

<!-- http://localhost/schoolMate/dist/img/logo2.jpeg -->