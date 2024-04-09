<?php include ("../controller/attend_exam_control.php"); ?>

<style>
    .cd-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .cd {
        border-radius: 50%;
        width: 200px;
        height: 100px;
        background-color: #eee;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px;
        font-weight: bold;
        color: #333;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.5);
    }
</style>

<div class="container">
    <div class="head d-flex mt-4">
        <div class="col-md-8 left">
            <h3 class=""><b>Subject: Maths</b></h3>
            <h5>Total Questions:
                <?php echo $totalQuestions; ?>
            </h5>
        </div>
        <div class="col-md-8 right">
            <!-- <h1>clock</h1> -->
            <div class="cd" id="cd">00:00:00</div>
        </div>
    </div>

    <div class="questions my-4">
        <form id="examForm" method="post" action="result.php?cid=<?php echo $cid; ?>&sname=<?php echo $sname; ?>">
            <?php
            $sno = 0;
            while ($row = mysqli_fetch_array($result_fetch)) {
                $sno = $sno + 1;
                $id = $row["ques_id"];
                $ques = $row["question"];
                $mark = $row['mark'];
                $optionA = $row["optionA"];
                $optionB = $row["optionB"];
                $optionC = $row["optionC"];
                $optionD = $row["optionD"];
                echo '<div class="ques my-3">
                <div class="question d-flex" style="justify-content:space-between">
                    <div class="quest"> <h6>(' . $sno . ') ' . $ques . '</h6></div>
                    <div class="mark">['.$mark.']</div>
                </div>
               
                <input type="radio" id="optionA" name="answers[' . $id . ']" value="' . $optionA . '">
                <label for="optionA">' . $optionA . '</label><br>
                <input type="radio" id="optionB" name="answers[' . $id . ']" value="' . $optionB . '">
                <label for="optionB">' . $optionB . '</label><br>
                <input type="radio" id="optionC" name="answers[' . $id . ']" value="' . $optionC . '">
                <label for="optionC">' . $optionC . '</label><br>
                <input type="radio" id="optionD" name="answers[' . $id . ']" value="' . $optionD . '">
                <label for="optionD">' . $optionD . '</label><br>
            </div>';
            }
            ?>
            <button type="submit" class="btn btn-primary mb-2 float-rigt">Submit</button>

        </form>
    </div>
</div>


<script>
    // Function to start the countdown timer
    function startTimer(duration, display) {
        let timer = duration;

        function formatTime(time) {
            return time < 10 ? "0" + time : time;
        }

        setInterval(function () {
            let hours = formatTime(Math.floor(timer / 3600));
            let minutes = formatTime(Math.floor((timer % 3600) / 60));
            let seconds = formatTime(timer % 60);

            let timeStr = `${hours}:${minutes}:${seconds}`;
            display.textContent = timeStr;

            if (--timer < 0) {
                timer = duration;
                // Automatically submit the form when timer ends
                document.getElementById('examForm').submit();
            }
        }, 1000);
    }


    // Start the timer when the page is loaded
    window.onload = function () {
        let countdownDuration = <?php echo $duration_seconds; ?>;
        let display = document.getElementById('cd');
        startTimer(countdownDuration, display);
    };
</script>


<footer class="bg-body-tertiary text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3 bg-dark" style="background-color: rgba(0, 0, 0, 0.05);">
  <strong>Copyright &copy; 2024-2025 <a href="#">SchoolMate</a>.</strong>
    All rights reserved.
  </div>
  <!-- Copyright -->
</footer>