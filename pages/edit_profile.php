<?php include("../controller/edit_profile_control.php"); ?>

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
            <form class="my-3" action="edit_profile.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $row_edit['first_name']; ?>" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $row_edit['last_name']; ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $row_edit['email']; ?>" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $row_edit['dob']; ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="gender">Gender:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender-male" value="male" <?php echo ($row_edit['gender'] === 'male') ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="gender-male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender-female" value="female" <?php echo ($row_edit['gender'] === 'female') ? 'checked' : ''; ?> required>
                            <label class="form-check-label" for="gender-female">Female</label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" class="form-control" name="phone" id="phone" value="<?php echo $row_edit['phone']; ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="blood_group">Blood Group:</label>
                        <input type="text" class="form-control" name="blood_group" id="blood_group" value="<?php echo $row_edit['blood_group']; ?>" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="address">Address:</label>
                        <textarea class="form-control" name="address" id="address" required><?php echo $row_edit['address']; ?></textarea>
                    </div>
                </div>

                <!-- 
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" name="city" id="city" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="profile_img">Profile Image:</label>
                        <input type="file" class="form-control-file" name="profile_img" id="profile_img" accept="image/*">
                    </div>
                </div>
                -->

                <!-- 
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1">
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                    </div>
                </div>
                -->

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<div class="card-body box-profile">
    <h1 class="mb-3"><b>My Profile</b></h1>
    <div class="">
        <img class="profile-user-img img-fluid img-circle" src="../dist/img/user_image/<?php echo $row_edit["profile_img"]; ?>" alt="User profile picture">
    </div>

    <h3 class="profile-username"><?php echo $row_edit['first_name']." ". $row_edit["last_name"]; ?><i class="caret"></h3>

    <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
            <b>First Name: </b><?php echo $row_edit['first_name']; ?>
        </li>

        <li class="list-group-item">
            <b>Last Name: </b><?php echo $row_edit["last_name"]; ?>
        </li>

        <li class="list-group-item">
            <b>Email: </b><?php echo $row_edit["email"]; ?>
        </li>

        <li class="list-group-item">
            <b>Phone: </b><?php echo $row_edit["phone"]; ?>
        </li>

        <li class="list-group-item">
            <b>Date Of Birth: </b><?php echo $row_edit["dob"]; ?>
        </li>

        <li class="list-group-item">
            <b>Gender: </b><?php echo $row_edit["gender"]; ?>
        </li>

        <li class="list-group-item">
            <b>Blood Group: </b><?php echo $row_edit["blood_group"]; ?>
        </li>

        <li class="list-group-item">
            <b>Address: </b><?php echo $row_edit["address"]; ?>
        </li>
    </ul>
</div>

<?php include("../includes/footer.php"); ?>
