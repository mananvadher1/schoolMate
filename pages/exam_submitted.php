<?php
include ("../includes/db.php");
include ("../includes/header.php");
include ("../includes/sidebar.php");

echo '<div class="container">
<h1 class="text-center my-4 text-success"><b>Exam Submitted!</b></h1>

<div class="jumbotron">
    
    <p class="lead text-primary">Congratulations!</p> 
    <p></p>You have successfully submitted the test. Your hard work and dedication are evident, and now you can view your results on <a href="result.php"> result page </a>. Feel free to download your result for your records or further review. If you have any questions or need assistance, please don\'t hesitate to reach out. Great job!!</p>
    
</div>
</div>';


include ("../includes/footer.php");
?>