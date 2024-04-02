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
        <h1><b>Attendance - Class <?php echo $_SESSION['class_id']?></b></h1>
        <button type="button" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp;Download</button>
    </div>
    <div class="date my-4">
    <div class="date-wrapper">
        <h2>Date:<?php echo date("j-n-y"); ?></h2>
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
                <?php $sno=0;
                while ($row_dt = mysqli_fetch_assoc($re_dt)) {
                    $sno = $sno + 1;
                    echo "<tr id=" . $row_dt['id'] . ">
                    <td>" . $sno . "</td>
                    <td>" . $row_dt['first_name'] ."  ".$row_dt['last_name'] . "</td>
                    <td><button onClick='editClick(" . $row_dt['id'] . ")' class='present btn btn-sm btn-success'>P</button>
                    <button onClick='deleteClick(" . $row_dt['id'] . ")' class='abesent btn btn-sm btn-danger'>A</button></td>
                </tr>";
                } ?>
            </tbody>

</table>

</div>


<?php include("../includes/footer.php"); ?>
<!-- data table -->
