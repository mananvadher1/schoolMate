<?php include("../controller/user_control.php"); ?>
<?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) : ?>

    <!-- edit modal -->
    <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="my-4" action="manage_user.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="edit_email" id="edit_email" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="edit_pass" id="edit_pass" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" name="edit_fname" id="edit_fname" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" name="edit_lname" id="edit_lname" required>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dob">Date of Birth:</label>
                                <input type="date" class="form-control" name="edit_dob" id="edit_dob" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Gender:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="edit_gender" id="edit_gender-male" value="male" required>
                                    <label class="form-check-label" for="gender-male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="edit_gender" id="edit_gender-female" value="female" required>
                                    <label class="form-check-label" for="gender-female">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">Phone Number:</label>
                                <input type="tel" class="form-control" name="edit_phone" id="edit_phone" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="blood_group">Blood Group:</label>
                                <input type="text" class="form-control" name="edit_bg" id="edit_bg" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="address">Address:</label>
                                <textarea class="form-control" name="edit_add" id="edit_add" required></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">City:</label>
                                <input type="text" class="form-control" name="edit_city" id="edit_city" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="edit_status" id="edit_status" value="1">
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                <form class="my-4" action="manage_user.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="role_id">Role:</label>


                            <select class="form-control" name="role_id" id="role_id" required>
                                <?php
                                while ($row_dropdowm = mysqli_fetch_assoc($re_dropdown)) {

                                    // Skip the record if role_id is 4(Driver)
                                    if ($_SESSION['role_id'] == 2) {
                                        if ($row_dropdowm['role_id'] != 3 ) {
                                            continue;
                                        }
                                    }
                                    if ($_SESSION['role_id'] == 1) {
                                        if ($row_dropdowm['role_id'] == 4 || $row_dropdowm['role_id'] == 1 ) {
                                            continue;
                                        }
                                    }
                                    echo '  <option value="' . $row_dropdowm['role_id'] . '">' . $row_dropdowm['role_name'] . '</option>';
                                }
                                ?>
                            </select>


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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row_dt = mysqli_fetch_assoc($re_dt)) {
                    $sno = $sno + 1;
                    echo "<tr id=" . $row_dt['id'] . ">
                    <td>" . $sno . "</td>
                    <td>" . $row_dt['role_id'] . "</td>
                    <td>" . $row_dt['email'] . "</td>
                    <td>" . $row_dt['password'] . "</td>
                    <td>" . $row_dt['first_name'] . "</td>
                    <td>" . $row_dt['last_name'] . "</td>
                    <td>" . $row_dt['dob'] . "</td>
                    <td>" . $row_dt['gender'] . "</td>
                    <td>" . $row_dt['phone'] . "</td>
                    <td>" . $row_dt['blood_group'] . "</td>
                    <td>" . $row_dt['address'] . "</td>
                    <td>" . $row_dt['city'] . "</td>
                    <td>" . $row_dt['status'] . "</td>
                    <td>" . $row_dt['created_by'] . "</td>
                    <td>" . $row_dt['created_dt'] . "</td>
                    <td>" . $row_dt['updated_by'] . "</td>
                    <td>" . $row_dt['updated_dt'] . "</td>
                    <td><button onClick='editClick(" . $row_dt['id'] . ")' class='edit btn btn-sm btn-success'>Edit</button>
                    <button onClick='deleteClick(" . $row_dt['id'] . ")' class='delete btn btn-sm btn-danger'>Delete</button></td>
                </tr>";
                } ?>
            </tbody>
        </table>
    </div>


    <script>
        function deleteClick(id) {
            $(document).ready(function() {
                // console.log('hii')
                $.ajax({
                    url: '../controller/user_control.php',
                    type: 'POST',
                    data: {
                        //get value
                        id: id,
                        action: "delete"
                    },
                    success: function(response) {
                        console.log('response---->', response);
                        //response is output of the action file
                        if (response) {
                            // alert("Deleted role_id: " + id + " successfully");
                            // $('#id').hide();
                            confirm("Are you sure you want to delete the user?");
                            document.getElementById(id).style.display = "none";
                        } else if (!response) {
                            alert("Data Can't be deleted");
                        }
                    }
                });
            });
        }

        function editClick(id) {
            $(document).ready(function() {
                // console.log('hii')
                $.ajax({
                    url: '../controller/user_control.php',
                    type: 'POST',
                    data: {
                        id: id,
                        action: "edit"
                    },
                    success: function(response) {
                        // console.log(response);

                        $.each(response, function(key, value) {
                            $('#edit_id').val(value['id']);
                            $('#edit_email').val(value['email']);
                            $('#edit_fname').val(value['first_name']);
                            $('#edit_lname').val(value['last_name']);
                            $('#edit_pass').val(value['password']);
                            $('#edit_dob').val(value['dob']);
                            $('#edit_phone').val(value['phone']);
                            $('#edit_bg').val(value['blood_group']);
                            $('#edit_add').val(value['address']);
                            $('#edit_city').val(value['city']);
                            // // image default value
                            // $('#edit_profile_img').attr('src', '../dist/img/user_image/' + value['profile_img']);
                            if (value['gender'] === 'male') {
                                $('#edit_gender-male').prop('checked', true);
                                // document.getElementById('edit_gender-male').checked = true;
                            } else if (value['gender'] === 'female') {
                                document.getElementById('edit_gender-female').checked = true;
                                // $('#edit_gender-female').prop('checked', true);
                            }
                            // for active status
                            $('#edit_status').prop('checked', value['status'] == 1);
                        });
                        $('#edit_user').modal('show');
                    }
                });
            });
        }
    </script>
    <?php include("../includes/footer.php"); ?>
<?php else : ?>
    <?php
    header("location: 404.php");
    ?>

<?php endif; ?>