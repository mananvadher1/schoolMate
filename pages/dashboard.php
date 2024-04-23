<?php include("../controller/dashbord_control.php"); ?>
 <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
}

.header {
    text-align: center;
    margin-bottom: 20px;
}

.dashboard {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.section {
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}


p {
    margin-bottom: 10px;
}

 </style>
 
    <div class="container">
        <div class="header">
            <h1>School Management System</h1>
            <h4>Welcome, <?php echo $role_name
            ?></h4>
        </div>
        <?php if ($_SESSION['role_id'] == 1) : ?>
        <div class="section bg-success">
                <h2>Student and Teacher Details</h2>
                <p>Total Students: <?php echo $total_stu?></p>
                <p>Total Teachers: <?php echo $total_tec?></p>  
            </div>
            <div class="section bg-maroon mt-3">
                <h2>Transportation Details</h2>
                <p>Total Drivers:<?php echo $total_driver; ?> </p>
                <p>Total Vehicles:<?php echo $total_veh; ?> </p>
            </div>
            <div class="section bg-purple mt-3">
                <h2>Class Details</h2>
                <p>Total Class:12 </p>
               
            </div>
    </div>
            <?php endif; ?>

        <?php if ($_SESSION['role_id'] != 1) : ?>
        <div class="dashboard">
        <?php if ($_SESSION['role_id'] != 1) : ?>
            <div class="section bg-success">
                <h2>Principal's Details</h2>
                <p>Name:<?php  echo $p_fname. " ". $p_lname?></p>
                <p>Email:<?php echo $p_email?></p>
            </div>
            <?php endif; ?>

            <?php if ($_SESSION['role_id'] != 1) : ?>
            <div class="section bg-yellow">
                <h2>Student Details</h2>
                <p>Total Students: <?php echo $total_stu?></p>
                <!-- <p>Total Students: <?php echo $total_stu_class?></p> -->
                <p><?php echo $s_fname. " ". $s_lname?></p>
                <p>Phone: <?php echo $s_phone?></p>
                <p>Email: <?php echo $s_email;?></p>
            </div>
            <?php endif; ?>

            <?php if ($_SESSION['role_id'] == 3) : ?>
            <div class="section bg-purple">
                <h2>Class Teacher Details</h2>
                <p>Total Teachers: <?php echo $total_tec?></p>
                <p>Name: <?php  echo $fname. " ". $lname?></p>
                <p>Phone: <?php echo $phone ?></p>
                <p>Email: <?php echo $email;?></p>
            </div>
            <?php endif; ?>
            
            <div class="section bg-lightblue">
                <h2>Class Details</h2>
                <p>Class: <?php echo $_SESSION['class_id']; ?></p>
                <p>Total Students: <?php echo $total_stu_class?>    </p>
            </div>
            <div class="section bg-maroon">
                <h2>Transportation Details</h2>
                <p>Total Drivers:<?php echo $total_driver; ?> </p>
                <p>Total Vehicles:<?php echo $total_veh; ?> </p>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php include("../includes/footer.php"); ?>