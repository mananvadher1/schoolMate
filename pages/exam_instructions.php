<?php
include ("../includes/db.php");
include ("../includes/header.php");
include ("../includes/sidebar.php");

echo '<div class="container">
<h1 class="text-center my-4"><b>Exam Instructions</b></h1>

<div class="jumbotron">
    
    <p class="lead">Read these instructions carefully before starting the exam.</p>
    
    <ul>
        <li>Keep track of the time during attending the exam.</li>
        <li>Ensure that you have a stable and reliable internet connection throughout the exam.</li>
        <li>Do not navigate away from the exam page during the test.</li>
        <li>If you encounter any technical issues during the exam, immediately inform your class teacher for assistance.</li>
        <li>Before submitting your exam, double-check and review all your answers.</li>
    </ul>
    
    <hr class="my-4">
    
    <p style="color:green">Please ensure that you understand all the instructions mentioned above.</p> 
    <p style="color:green">Once you click the "Start Exam" button, the timer will begin automatically.</p>
    
    <a class="btn btn-primary btn-lg" href="attend_exam.php" role="button">Start Exam</a>
</div>
</div>';
include("../includes/footer.php");
?>