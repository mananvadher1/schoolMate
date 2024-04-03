<?php include("../controller/attendance_control.php"); ?>
<style>
    /* Apply vertical borders between table cells */
    #attendence th,
    #attendence td {
        border-right: 1px solid #ddd; /* Adjust color and thickness as needed */
    }
</style>


<div class="container">
    <div class="heading my-4">
        <h1><b>Attendance</b></h1>
    </div>
   
    <table class="table" id="attendence">
   <thead>
        <tr>
            <th>Name</th>
            <?php
            foreach ($currentMonthDates as $date) {
                echo "<th>$date</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php 
        // print_r($attendData);
        $printedNames = array(); // To keep track of printed names
        foreach ($attendData as $row_dt) {
            // Check if the name is already printed
            if (!in_array($row_dt['first_name'] . " " . $row_dt['last_name'], $printedNames)) {
                // Print the name and add it to the printed names array
                echo "<tr>";
                echo "<td>" . $row_dt['first_name'] . " " . $row_dt['last_name'] . "</td>";
                $printedNames[] = $row_dt['first_name'] . " " . $row_dt['last_name'];
                
                // Loop through each date to print attendance status
                foreach ($currentMonthDates as $date) {
                    $found = false;
                    foreach ($attendData as $data) {
                        // Check if the data corresponds to the current user and date
                        if ($data['first_name'] . " " . $data['last_name'] == $row_dt['first_name'] . " " . $row_dt['last_name'] && $data['date'] == $date) {
                            echo "<td>" . $data['status'] . "</td>";
                            $found = true;
                            break;
                        }
                    }
                    if (!$found) {
                        echo "<td></td>"; // Print empty cell if data not found for this user and date
                    }
                }
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
</div>

<?php include("../includes/footer.php"); ?>
