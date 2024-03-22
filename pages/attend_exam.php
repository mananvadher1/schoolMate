<?php include("../controller/attend_exam_control.php"); ?>

<div class="container">
    <h3 class="mt-4"><b>Subject: Maths</b></h3>
    <h5>Total Questions: 4</h5>
    <div class="questions my-4">
        <form class="" method="post" action="attend_exam.php">
            <div class="ques my-3">
                <h6>(1) The Product of 17*17 is...</h6>
                <input type="radio" id="optionA" name="question1" value="286">
                <label for="optionA">286</label><br>
                <input type="radio" id="optionB" name="question1" value="289">
                <label for="optionB">289</label><br>
                <input type="radio" id="optionC" name="question1" value="298">
                <label for="optionC">298</label><br>
                <input type="radio" id="optionD" name="question1" value="288">
                <label for="optionD">288</label><br>
            </div>
            <div class="ques my-3">
                <h6>(2) If we minus 712 from 1500, how much do we get?</h6>
                <input type="radio" id="optionA" name="question2" value="788">
                <label for="optionA">788</label><br>
                <input type="radio" id="optionB" name="question2" value="778">
                <label for="optionB">778</label><br>
                <input type="radio" id="optionC" name="question2" value="768">
                <label for="optionC">768</label><br>
                <input type="radio" id="optionD" name="question2" value="758">
                <label for="optionD">758</label><br>
            </div>
            <div class="ques my-3">
                <h6>(3) What is the value of pi?</h6>
                <input type="radio" id="optionA" name="question3" value="3.11">
                <label for="optionA">3.11</label><br>
                <input type="radio" id="optionB" name="question3" value="3.12">
                <label for="optionB">3.12</label><br>
                <input type="radio" id="optionC" name="question3" value="3.13">
                <label for="optionC">3.13</label><br>
                <input type="radio" id="optionD" name="question3" value="3.14">
                <label for="optionD">3.14</label><br>
            </div>
            <div class="ques my-3">
                <h6>(4) Find the missing terms in multiple of 3: 3, 6, 9, __, 15.</h6>
                <input type="radio" id="optionA" name="question4" value="10">
                <label for="optionA">10</label><br>
                <input type="radio" id="optionB" name="question4" value="11">
                <label for="optionB">11</label><br>
                <input type="radio" id="optionC" name="question4" value="12">
                <label for="optionC">12</label><br>
                <input type="radio" id="optionD" name="question4" value="13">
                <label for="optionD">13</label><br>
            </div>
            <button type="submit" class="btn btn-primary mb-2 float-rigt">Submit</button>

        </form>
    </div>
</div>


<?php include("../includes/footer.php"); ?>