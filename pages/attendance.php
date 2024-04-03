<?php include("../controller/attendance_control.php"); ?>
<style>
    .heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
<div class="container">
    <div class="heading my-4">
        <h1><b>Attendance - Class <?php echo $_SESSION['class_id'] ?></b></h1>
        <button type="button" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;Download</button>
    </div>
    <div class="date my-4">
        <div class="date-wrapper">
            <h2>Date: <?php echo date("d-m-Y"); ?></h2>
        </div>
    </div>
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">Roll No</th>
                <th scope="col">Name</th>
                <!-- <th scope="col">Date</th> -->
                <th scope="col">Attendance</th>
            </tr>
        </thead>
        <tbody>
            <?php $sno = 0;
            // echo var_dump($re_dt);
            while ($row_dt = mysqli_fetch_assoc($re_dt)) {
                $sno = $sno + 1;
                // echo $row_dt['status'];
                echo "<tr>
                    <td>" . $sno . "</td>
                    <td>" . $row_dt['first_name'] . "  " . $row_dt['last_name'] . "</td>
                    <td id='".$row_dt['id']."'>";
                    if($row_dt['status'] == NULL && $row_dt['status'] == NULL){
                        echo "<button onClick='present(" . $row_dt['id'] . ")' id='smallP".$row_dt['id']."' class='present btn btn-sm btn-success'>P</button>
                        <button onClick='absent(" . $row_dt['id'] . ")' id='smallA".$row_dt['id']."' class='abesent btn btn-sm btn-danger'>A</button>";
                    }else if($row_dt['status'] == 'present'){
                        echo "<div class='d-inline-block' style='background-color: green; color: white; padding: 5px 10px; margin-right: 10px; border-radius: 3px;'>Present</div>";
                    }else if($row_dt['status'] == 'absent'){
                        echo "<div class='d-inline-block' style='background-color: red; color: white; padding: 5px 10px; border-radius: 3px;'>Absent</div>";
                    }
                    echo "</td></tr>";
            } ?>
        </tbody>

    </table>

</div>

<script>
    function present(id) {
        // console.log(111)
        $.ajax({
            url: '../controller/attendance_control.php',
            type: 'POST',
            data: {
                id: id,
                action: "present"
            },
            success: function(response) {
                if (response == 1) {
                    $('#smallP'+id+', #smallA'+id).hide();
                    // $('#bigP'+id).addClass('d-inline-block').show();
                    $('#'+id).append('<div class="d-inline-block" style="background-color: green; color: white; padding: 5px 10px; margin-right: 10px; border-radius: 3px;">Present</div>');
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to Present attendence",
                        icon: "error"
                    });
                }
            }
        });

    }

    function absent(id) {
        // console.log(111)
        $.ajax({
            url: '../controller/attendance_control.php',
            type: 'POST',
            data: {
                id: id,
                action: "absent"
            },
            success: function(response) {
                if (response == 1) {
                    $('#smallP'+id+', #smallA'+id).hide();
                    // $('#bigA'+id).addClass('d-inline-block').show();
                    $('#'+id).append('<div class="d-inline-block" style="background-color: red; color: white; padding: 5px 10px; margin-right: 10px; border-radius: 3px;">Absent</div>');
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to Absent attendence",
                        icon: "error"
                    });
                }
            }
        });
    }
</script>
<?php include("../includes/footer.php"); ?>
<!-- data table -->