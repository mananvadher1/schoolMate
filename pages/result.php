<?php
include ("../controller/result_control.php");

echo '<div class="jumbotron jumbotron-fluid">
<div class="container">
  <h1 class="display-4 text-primary">Well Done!!</h1>
  <p class="lead">You have successfully submitted the test. Now, let\'s delve deeper into your performance.</p>
  <p>Take this opportunity to review your answers meticulously. Identify correct responses and areas where you can enhance your understanding.</p>
</div>
</div>';




echo '<div class="container">
<div class="heading my-5">
    <h2><b><u>Test Result</u></b></h2>
</div>
<div class="result my-4">';
$sno = 0;
$scored = 0;
$totalScore = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $sno = $sno + 1;
    $quesId = $row['ques_id'];
    $ques = $row["question"];
    $mark = $row['mark'];
    $right_option = $row['right_option'];

    $totalScore += $mark;
    // first we need to convert this array into single variable 
    // $submittedAnswer = $submittedAnswers[$quesId];

    // for checking if the answer is selected or not
    $submittedAnswer = isset($submittedAnswers[$quesId]) ? $submittedAnswers[$quesId] : null;

    if ($submittedAnswer == $right_option) {
        $scored += $mark;
            echo '<div class="ques my-3">
                <div class="question d-flex text-success my-3">
                    <div class="quest"> <h6>(' . $sno . ') ' . $ques . '</h6></div>
                    <img src="../dist/img/right.png" class="mx-5" alt="right_answer" style="width:20px;height:20px;border:0px">
                    <div class="mark">[' . $mark . ']</div>
                </div>
                <div class="">Keep Going!!</div>
            </div>';
    } else {
            echo '<div class="ques my-3">
                <div class="question d-flex text-danger my-3">
                    <div class="quest"> <h6>(' . $sno . ') ' . $ques . '</h6></div>
                    <img src="../dist/img/wrong.png" class="mx-5" alt="wrong_answer" style="width:20px;height:20px;border:0px">
                    <div class="mark">[' . $mark . ']</div>
                </div>
                <div class="">Right Answer is <b>'.$right_option.'</b>! Try to remember the answer/method next time:)</div>
            </div>';
    }
}
echo  '</div>
</div>';

// query to insert result data
$user_id = $_SESSION['id'];
// $class_id = $_SESSION['class_id'];
$sql = "INSERT INTO `results`(`user_id`, `class_id`, `score`, `totalscore`, `subject_name`) VALUES ('$user_id','$cid','$scored','$totalScore','$sname')";
$result = mysqli_query($conn, $sql);
if($result){
  // echo "done";
}

if ($scored == $totalScore) {
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h3 class="display-4"><i>Total Score: '.$scored.'/'.$totalScore.'</i></h3>
      <p class="lead text-success">Excellent!! You passed the test with full marks.</p>
      <h5><b>Your Grade: A</b></h5>
      <a class="btn btn-primary btn-lg my-3" href="../controller/generate_pdf_control.php?cid='.$cid.'&sname='.$sname.'&score='.$scored.'&tscore='.$totalScore.'" role="button">Download Result</a>
    </div>
  </div>';
}elseif($scored >= ($totalScore * 0.5)) {
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h3 class="display-4"><i>Total Score: '.$scored.'/'.$totalScore.'</i></h3>
      <p class="lead text-info">Well Done!! You passed the test with good marks.</p>
      <h5><b>Your Grade: B</b></h5>
      <a class="btn btn-primary btn-lg my-3" href="../controller/generate_pdf_control.php?cid='.$cid.'&sname='.$sname.'&score='.$scored.'&tscore='.$totalScore.'" role="button">Download Result</a>
    </div>
  </div>';
}else {
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h3 class="display-4"><i>Total Score: '.$scored.'/'.$totalScore.'</i></h3>
      <p class="lead text-danger">You should study more! You failed the test.</p>
      <h5><b>Your Grade: C</b></h5>
      <a class="btn btn-primary btn-lg my-3" href="../controller/generate_pdf_control.php?cid='.$cid.'&sname='.$sname.'&score='.$scored.'&tscore='.$totalScore.'" role="button">Download Result</a>
    </div>
  </div>';
}



include ("../includes/footer.php");
?>

<!-- <a class="btn btn-primary btn-lg my-3" href="../controller/generate_pdf_control.php?cid='.$cid.'&sname='.$sname.'&score='.$scored.'&tscore='.$totalScore.'" role="button">Download Result</a> -->




