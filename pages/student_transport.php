<?php include("../controller/transport_control.php"); ?>
<div class="container">
<h1 class="text-center my-3"><b>Transport Details</b></h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sr No</th>
                <th scope="col">Name</th>
                <th scope="col">Vehical No</th>
                <th scope="col">Area Covered</th>
                <th scope="col">Phone No of Driver</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
            $sno=0;
            while ($row_dt = mysqli_fetch_assoc($re_dt)) 
            {
              $sno = $sno + 1;
                echo "<tr id=" . $row_dt['driver_id'] . ">
                    <th scope='row'>" .$sno . "</th>
                    <td>" . $row_dt['fname'] . " " . $row_dt['lname'] . "</td>
                    <td>" . $row_dt['vehical_no'] . "</td>
                    <td>" . $row_dt['area_name'] . "</td>
                    <td>" . $row_dt['phone_no'] . "</td>
                    
                   
                </tr>";
            } ?>
        </tbody>
        <!-- <button onClick='deleteClick(" . $row_dt['role_id'] . ")' class='delete btn btn-sm btn-danger'>Delete</button></td> -->
    </table>
</div>
<?php include("../includes/footer.php"); ?>