<?php
include("../includes/db.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: http://localhost/schoolMate/login.php");
    exit;
}

include("../includes/header.php");
include("../includes/sidebar.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $role = $_POST['role_id'];
    $email = $_POST['email'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $bgroup = $_POST['blood_group'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    // Convert checkbox value to 1 or 0
    $status = isset($_POST['status']) ? 1 : 0;

    $created_by = $_SESSION['email'];

    //check user are already exist or not
    $sql = "SELECT * FROM users WHERE email = '$email' ";
    $result = mysqli_query($conn, $sql);
    $row_count = mysqli_num_rows($result);
    if ($row_count > 0) {
        echo "<script>alert('User already exists');</script>";
    } else {
        // Handle file upload
        if (isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] === UPLOAD_ERR_OK) {
            $img_name = $_FILES['profile_img']['name'];
            $img_tmp_name = $_FILES['profile_img']['tmp_name'];
            $upload_folder = '../dist/img/user_image/';

            // Move uploaded file from temporery destination to permanent destination folder
            if (move_uploaded_file($img_tmp_name, $upload_folder . $img_name)) {
                // Insert data into database
                $sql = "INSERT INTO `users`(`role_id`, `email`, `password`, `first_name`, `last_name`, `dob`, `gender`, `phone`, `blood_group`, `address`, `city`, `profile_img`, `status`, `created_by`) VALUES ('$role','$email','$password','$fname','$lname','$dob','$gender','$phone','$bgroup','$address','$city','$img_name','$status','$created_by')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('User Added Successfully');</script>";
                } else {
                    echo "<script>alert('Error : inserting data into database');</script>";
                }
            } else {
                echo "<script>alert('Error : moving uploaded file');</script>";
            }
        } else {
            echo "<script>alert('Error : uploading file');</script>";
        }
    }
}
?>

<div class="card card-secondary">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3 class="card-title my-2">Manage Users</h3>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Add User</a>
            </div>
        </div>
    </div>
    <div class="card-body px-4 p-0">
        <div class="collapse mt-3" id="collapseExample">
            <form action="manage_user.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="role_id">Role:</label>


                        <?php
                        $sql = "SELECT * FROM `roles`";
                        $result = mysqli_query($conn, $sql);
                        echo '<select class="form-control" name="role_id" id="role_id" required>';
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '  <option value="' . $row['role_id'] . '">' . $row['role_name'] . '</option>';
                        }
                        echo "</select>";
                        ?>


                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" name="dob" id="dob" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender">Gender:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender-male" value="male" required>
                            <label class="form-check-label" for="gender-male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender-female" value="female" required>
                            <label class="form-check-label" for="gender-female">Female</label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" class="form-control" name="phone" id="phone" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="blood_group">Blood Group:</label>
                        <input type="text" class="form-control" name="blood_group" id="blood_group" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Address:</label>
                        <textarea class="form-control" name="address" id="address" required></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" name="city" id="city" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="profile_img">Profile Image:</label>
                        <input type="file" class="form-control-file" name="profile_img" id="profile_img">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1">
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- data table -->
<div class="container">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Role Id</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">DOB</th>
                <th scope="col">Gender</th>
                <th scope="col">Phone</th>
                <th scope="col">Blood Group</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Status</th>
                <th scope="col">Created By</th>
                <th scope="col">Created Date</th>
                <th scope="col"> Upadated By</th>
                <th scope="col">Updated Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "
                SELECT id,role_id,email,password,first_name,last_name,dob,gender,phone,blood_group,address,city,status,created_by,created_dt,updated_by,updated_dt FROM `users`;";
            $result = mysqli_query($conn, $sql);
            $sno = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $sno = $sno + 1;
                echo "<tr>
                    <th scope='row'>" . $sno . "</th>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['role_id'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td>" . $row['first_name'] . "</td>
                    <td>" . $row['last_name'] . "</td>
                    <td>" . $row['dob'] . "</td>
                    <td>" . $row['gender'] . "</td>
                    <td>" . $row['city'] . "</td>
                    <td>" . $row['status'] . "</td>
                    <td>" . $row['address'] . "</td>
                    <td>" . $row['created_by'] . "</td>
                    <td>" . $row['created_dt'] . "</td>
                    <td>" . $row['updated_by'] . "</td>
                    <td>" . $row['updated_dt'] . "</td>
                    <td><button class='edit btn btn-sm btn-primary' id=" . $row['id'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['id'] . ">Delete</button></td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include("../includes/footer.php");
?>