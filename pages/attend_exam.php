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
            <h5>Total Questions: <?php echo $totalQuestions; ?></h5>
        </div>
        <div class="col-md-8 right">
            <!-- <h1>clock</h1> -->
            <div class="cd" id="cd">00:00:00</div>
        </div>
    </div>
    <div class="questions my-4">
        <form class="" method="post" action="exam_submitted.php">
        <!-- attend_exam.php?cid=<?php echo $cid; ?>&sname=<?php echo $sname; ?> -->
            <?php
            $sno = 0;
            while ($row = mysqli_fetch_array($result_fetch)) {
                $sno = $sno +1;
                $id = $row["ques_id"];
                $ques = $row["question"];
                $optionA = $row["optionA"];
                $optionB = $row["optionB"];
                $optionC = $row["optionC"];
                $optionD = $row["optionD"];
                echo '<div class="ques my-3">
                <h6>('.$sno.') '.$ques.'</h6>
                <input type="radio" id="optionA" name="'.$id.'" value="'.$optionA.'">
                <label for="optionA">'.$optionA.'</label><br>
                <input type="radio" id="optionB" name="'.$id.'" value="'.$optionB.'">
                <label for="optionB">'.$optionB.'</label><br>
                <input type="radio" id="optionC" name="'.$id.'" value="'.$optionC.'">
                <label for="optionC">'.$optionC.'</label><br>
                <input type="radio" id="optionD" name="'.$id.'" value="'.$optionD.'">
                <label for="optionD">'.$optionD.'</label><br>
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
            }
        }, 1000);
    }


    // Start the timer when the page is loaded
    window.onload = function () {
        let countdownDuration = <?php echo $duration_seconds; ?> ;
        let display = document.getElementById('cd');
        startTimer(countdownDuration, display);
    };
</script>

<?php include ("../includes/footer.php"); ?>