<?php include("../controller/attendance_control.php"); ?>

<div class="container">
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
                <?php $sno=0;
                while ($row_dt = mysqli_fetch_assoc($re_dt)) {
                    $sno = $sno + 1;
                    echo "<tr id=" . $row_dt['id'] . ">
                    <td>" . $sno . "</td>
                    <td>" . $row_dt['first_name'] .$row_dt['last_name'] . "</td>
                    
                   
                    <td><button onClick='editClick(" . $row_dt['id'] . ")' class='edit btn btn-sm btn-success'>P</button>
                    <button onClick='deleteClick(" . $row_dt['id'] . ")' class='delete btn btn-sm btn-danger'>A</button></td>
                </tr>";
                } ?>
            </tbody>

</table>

</div>


<?php include("../includes/footer.php"); ?>
<!-- data table -->
