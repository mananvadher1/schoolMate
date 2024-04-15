<?php
include ("../includes/db.php");
include ("../includes/header.php");
include ("../includes/sidebar.php");


$cid = $_GET['cid'];
$sname = $_GET['sname'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
 // Form has been submitted, set the session variable
 $_SESSION['examSubmitted'] = true;

    // Initialize an array to store the submitted answers
    $submittedAnswers = array();

    // Check if the 'answers' array exists in the POST data
    if (isset($_POST['answers']) && is_array($_POST['answers'])) {
        // Loop through the 'answers' array to retrieve the selected answers
        foreach ($_POST['answers'] as $questionId => $selectedAnswer) {
            // Add the question ID and selected answer to the array
            $submittedAnswers[$questionId] = $selectedAnswer;
        }

        // implode method to convert array to string
        // echo "<h3>Answers</h3>";
        // echo implode("<br>", $submittedAnswers);
        // echo "<br><br>";


    }

}

// query to compare answers and fetch questions from table
$sql = "SELECT * FROM `questions` WHERE `class_id` = '$cid' AND `subject_name` = '$sname'; ";
$result = mysqli_query($conn, $sql);


?>