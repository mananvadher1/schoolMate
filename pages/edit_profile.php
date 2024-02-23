<?php
include("../includes/db.php");

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: http://localhost/schoolMate/login.php");
    // echo $_SESSION['loggedin'];
}

include("../includes/header.php");

include("../includes/sidebar.php");
?>

<?php

$update = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_SESSION['id']; 
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $bgroup = $_POST['blood_group'];
    $address = $_POST['address'];
    // update
    $sql = "UPDATE `users` SET `first_name` = '$fname', `last_name` = '$lname', `email` = '$email', `dob` = '$dob', `gender` = '$gender', `phone` = '$phone', `blood_group` = '$bgroup', `address` = '$address' WHERE `id` = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $update = true;
        // echo "done";
        if($update){
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Success!</strong> Your records are updated successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}



?>


<div class="card card-secondary">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3 class="card-title my-2">Edit Profile</h3>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">Edit Now</a>
            </div>
        </div>
    </div>
    <div class="card-body px-4 p-0">
        <div class="collapse mt-3" id="collapseExample">
            <form action="edit_profile.php" method="post" enctype="multipart/form-data">


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
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
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
                            <input class="form-check-input" type="radio" name="gender" id="gender-male" value="male"
                                required>
                            <label class="form-check-label" for="gender-male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender-female" value="female"
                                required>
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

                <!-- <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" name="city" id="city" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="profile_img">Profile Image:</label>
                        <input type="file" class="form-control-file" name="profile_img" id="profile_img"
                            accept="image/*">
                    </div>
                </div> -->

                <!-- <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1">
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                    </div>
                </div> -->

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
// fetch
$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
    echo '<div class="card-body box-profile">
    <h1 class="mb-3"><b>My Profile</b></h1>
    <div class="">
        <img class="profile-user-img img-fluid img-circle" src="../dist/img/user_image/'.$row["profile_img"].'"
            alt="User profile picture">
    </div>

    <h3 class="profile-username">'.$row['first_name'].' '.$row["last_name"].'<i class="caret"></h3>

    <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
            <b>First Name: </b>'.$row['first_name'].'
        </li>
        <li class="list-group-item">
            <b>Last Name: </b>'.$row["last_name"].'
        </li>
        <li class="list-group-item">
            <b>Email: </b>'.$row["email"].'
        </li>
        <li class="list-group-item">
            <b>Phone: </b>'.$row["phone"].'
        </li>
        <li class="list-group-item">
            <b>Date Of Birth: </b>'.$row["dob"].'
        </li>
        <li class="list-group-item">
            <b>Gender: </b>'.$row["gender"].'
        </li>
        <li class="list-group-item">
            <b>Blood Group: </b>'.$row["blood_group"].'
        </li>
        <li class="list-group-item">
            <b>Address: </b>'.$row["address"].'
        </li>
    </ul>

</div>';
?>
<!-- show profile details -->
<!-- <div class="card-body box-profile">
    <h1 class="mb-3"><b>My Profile</b></h1>
    <div class="">
        <img class="profile-user-img img-fluid img-circle" src="../dist/img/user_image/<?php echo $_SESSION['img']; ?>"
            alt="User profile picture">
    </div>

    <h3 class="profile-username"><?php echo $fname1.' '.$lname1;?> <i class="caret"></h3>

    <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
            <b>First Name: </b><?php echo $fname;?>
        </li>
        <li class="list-group-item">
            <b>Last Name: </b><?php echo $lname;?>
        </li>
        <li class="list-group-item">
            <b>Email: </b><?php echo $email;?>
        </li>
        <li class="list-group-item">
            <b>Phone: </b><?php echo $phone;?>
        </li>
        <li class="list-group-item">
            <b>Date Of Birth: </b><?php echo $dob;?>
        </li>
        <li class="list-group-item">
            <b>Gender: </b><?php echo $gender;?>
        </li>
        <li class="list-group-item">
            <b>Blood Group: </b><?php echo $bgroup;?>
        </li>
        <li class="list-group-item">
            <b>Address: </b><?php echo $address;?>
        </li>
    </ul>

</div> -->

<?php
include("../includes/footer.php");
?>