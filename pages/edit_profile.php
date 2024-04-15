<?php include("../controller/edit_profile_control.php"); ?>

<style>
    body {
        background-color: #f9f9fa
    }

    /* .padding {
    padding: 3rem !important
} */

    .user-card-full {
        overflow: hidden;
    }

    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        border: none;
        margin-bottom: 30px;
    }

    .m-r-0 {
        margin-right: 0px;
    }

    .m-l-0 {
        margin-left: 0px;
    }

    .user-card-full .user-profile {
        border-radius: 5px 0 0 5px;
    }


    .user-profile {
        padding: 20px 0;
    }

    .card-block {
        padding: 1.25rem;
    }

    .m-b-25 {
        margin-bottom: 25px;
    }

    h6 {
        font-size: 14px;
    }

    .card .card-block p {
        line-height: 25px;
    }

    @media only screen and (min-width: 1400px) {
        p {
            font-size: 14px;
        }
    }

    .card-block {
        padding: 1.25rem;
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .p-b-5 {
        padding-bottom: 5px !important;
    }

    .card .card-block p {
        line-height: 25px;
    }

    .m-b-10 {
        margin-bottom: 10px;
    }

    .text-muted {
        color: #919aa3 !important;
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0;
    }

    .f-w-600 {
        font-weight: 600;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .m-t-40 {
        margin-top: 20px;
    }

    .p-b-5 {
        padding-bottom: 5px !important;
    }

    .m-b-10 {
        margin-bottom: 10px;
    }

    .m-t-40 {
        margin-top: 20px;
    }

    .user-card-full .social-link li {
        display: inline-block;
    }

    .user-card-full .social-link li a {
        font-size: 20px;
        margin: 0 10px 0 0;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }
</style>

<div class="card card-secondary">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3 class="card-title my-2">Edit Profile</h3>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Edit Now</a>
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

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="profile_img">Profile Image:</label>
                        <input type="file" class="form-control-file" name="profile_img" id="profile_img" accept="image/*">
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

<!-- profile ui -->
<div class="container">
    <h1 class="m-b-20 p-b-5 b-b-default f-w-600 text-center"><b>My Profile</b></h1>
    <div class="main-container d-flex">
        <div class="row">

            <div class="col-md-6" style="margin-left:100px">
                <img class="profile-user-img img-fluid mt-2" style="width:400px" src="../dist/img/user_image/<?php echo $row_edit["profile_img"]; ?>" alt="User profile picture">
                <h4 class="mt-4 ml-4"><b><?php echo $row_edit['first_name']; ?>
                        <?php echo $row_edit['last_name']; ?></b></h4>
            </div>

        </div>

        <div class="row">

            <div class="col-sm-6">
                <p class="m-b-10 f-w-600">Email</p>
                <p class="text-muted f-w-400"><?php echo $row_edit['email']; ?></p>
            </div>
            <div class="col-sm-6">
                <p class="m-b-10 f-w-600">Phone</p>
                <h6 class="text-muted f-w-400"><?php echo $row_edit['phone']; ?></h6>
            </div>
            <div class="col-sm-6">
                <p class="m-b-10 f-w-600">Gender</p>
                <h6 class="text-muted f-w-400"><?php echo $row_edit['gender']; ?></h6>
            </div>
            <div class="col-sm-6">
                <p class="m-b-10 f-w-600">Date Of Birth</p>
                <h6 class="text-muted f-w-400"><?php echo $row_edit['dob']; ?></h6>
            </div>
            <div class="col-sm-6">
                <p class="m-b-10 f-w-600">Address</p>
                <h6 class="text-muted f-w-400"><?php echo $row_edit['address']; ?></h6>
            </div>
            <div class="col-sm-6">
                <p class="m-b-10 f-w-600">Blood Group</p>
                <h6 class="text-muted f-w-400"><?php echo $row_edit['blood_group']; ?></h6>
            </div>

        </div>


    </div>

</div>

<!-- profile ui -->
<!-- <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-primary user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img class="profile-user-img img-fluid mt-5"
                                        src="../dist/img/user_image/<?php echo $row_edit["profile_img"]; ?>"
                                        alt="User profile picture">
                                    <br><br>
                                    <h5><b><?php echo $row_edit['first_name']; ?>
                                            <?php echo $row_edit['last_name']; ?></b></h5>
                                </div>
                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h3 class="m-b-20 p-b-5 b-b-default f-w-600"><b>My Profile</b></h3>


                                <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Email</p>
                                    <p class="text-muted f-w-400"><?php echo $row_edit['email']; ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Phone</p>
                                    <h6 class="text-muted f-w-400"><?php echo $row_edit['phone']; ?></h6>
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Gender</p>
                                    <h6 class="text-muted f-w-400"><?php echo $row_edit['gender']; ?></h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Date Of Birth</p>
                                    <h6 class="text-muted f-w-400"><?php echo $row_edit['dob']; ?></h6>
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Address</p>
                                    <h6 class="text-muted f-w-400"><?php echo $row_edit['address']; ?></h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Blood Group</p>
                                    <h6 class="text-muted f-w-400"><?php echo $row_edit['blood_group']; ?></h6>
                                </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<?php include("../includes/footer.php"); ?>