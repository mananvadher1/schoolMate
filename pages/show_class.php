<?php include("../controller/show_class_control.php");
$cid = $_GET['cid'];
?>

<div class="content">
    <div class="container-fluid">
        <h1 class="my-4"><b>Class: <? echo $cid ?></b></h1>
        <table class="table" id="" width="100%">
            <thead>
                <tr style="background-color:#ABB2B9">
                    <th scope="col">Enrollment No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">City</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;
                    echo "<tr id=" . $row['id'] . ">
                    <td>" . $sno . "</td>
                    <td>" . $row['first_name'] . "  " . $row['last_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['dob'] . "</td>
                    <td>" . $row['city'] . "</td>
                </tr>";
                } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("../includes/footer.php"); ?>