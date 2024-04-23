<?php include("../controller/exam_control.php"); ?>
<div class="heading my-3 text-center">
    <h1 class=""><b>Exam</b></h1>
    <h4><b>Class: <?php echo $_SESSION['class_id'] ?></b></h4>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="main-body my-4">
            <table class="table" id="" width="100%">
                <thead>
                    <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Exam Date</th>
                        <th scope="col">Exam Time</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Result date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sno = 0;
                    while ($row = mysqli_fetch_assoc($result_exams)) {
                        if ($row['status'] == "active") {
                            $sno = $sno + 1;
                            $class_id = $row['class_id'];
                            $subject_name = $row['subject_name'];
                            echo "<tr id=" . $row['id'] . ">
                        <td>" . $sno . "</td>
                        <td>" . $row['subject_name'] . "</td>
                        <td>" . $row['exam_date'] . "</td>
                        <td>" . $row['exam_time'] . "</td>
                        <td>" . $row['duration'] . "</td>
                        <td>" . $row['result_date'] . "</td>
                        <td><a href='exam_instructions.php?cid=" . $class_id . "&sname=" . $subject_name . "'>" . $actionText . "</a></td>
                    </tr>";
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("../includes/footer.php"); ?>