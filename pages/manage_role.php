<?php
include("../includes/db.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: http://localhost/schoolMate/login.php");
    // echo $_SESSION['loggedin'];
    exit;
}

include("../includes/header.php");

include("../includes/sidebar.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role_name = $_POST["role_name"];
    $email = $_SESSION["email"];

    $sql = "INSERT INTO `roles` ( `role_name`, `created_by`, `created_dt`, `updated_by`, `updated_dt`) VALUES ( '$role_name', '$email', CURRENT_TIMESTAMP(), NULL, NULL);";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        //echo "New record created successfully";
        $insert = true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
// echo var_dump($_SESSION);
?>
<div class="card card-secondary">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3 class="card-title my-2">Manage Roles</h3>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Add Role
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="collapse mt-3" id="collapseExample">
            <form class="form-inline" method="post">
                <div class="form-group mx-sm-3 mb-2">
                    <label class="form-label mx-2" for="role_name">Enter Role Name</label>
                    <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Enter Role Name">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- data table -->
<div class="container">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">Role Id</th>
                <th scope="col">Role Name</th>
                <th scope="col">Created By</th>
                <th scope="col">Created Date</th>
                <th scope="col"> Upadated By</th>
                <th scope="col">Updated Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `roles`";
            $result = mysqli_query($conn, $sql);
            $sno = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $sno = $sno + 1;
                echo "<tr>
                    <th scope='row'>" . $sno . "</th>
                    <td>" . $row['role_name'] . "</td>
                    <td>" . $row['created_by'] . "</td>
                    <td>" . $row['created_dt'] . "</td>
                    <td>" . $row['updated_by'] . "</td>
                    <td>" . $row['updated_dt'] . "</td>
                    <td><button class='edit btn btn-sm btn-primary' id=" . $row['role_id'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['role_id'] . ">Delete</button></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>


<?php
include("../includes/footer.php");
?>