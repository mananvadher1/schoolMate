<?php include("../controller/driver_control.php"); ?>

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
                <form class="my-4" action="driver.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                    
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
                            <label for="phone">Phone Number:</label>
                            <input type="tel" class="form-control" name="edit_phone" id="edit_phone" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="edit_email" id="edit_email" required>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" name="edit_dob" id="edit_dob" required>
                             </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address:</label>
                            <textarea class="form-control" name="edit_add" id="edit_add" required></textarea>
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
                <h3 class="card-title my-2">Manage Driver</h3>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Add Driver</a>
            </div>
        </div>
    </div>
    <div class="card-body px-4 p-0">
        <div class="collapse mt-3" id="collapseExample">
            <form class="my-4" action="driver.php" method="post" enctype="multipart/form-data">

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
                        <label for="phone">Phone No:</label>
                        <input type="text" class="form-control" name="phone" id="phone" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="role_id">Vehical Id:</label>
                        <select class="form-control" name="vehical_id" id="vehical_id" required>
                            <?php
                            while ($row_dropdowm = mysqli_fetch_assoc($re_dropdown)) {
                                echo '  <option value="' . $row_dropdowm['vehical_id'] . '">' . $row_dropdowm['vehical_no'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" class="form-control" name="dob" id="dob" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="address">Address:</label>
                        <textarea class="form-control" name="address" id="address" required></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="profile_img">Profile Image:</label>
                        <input type="file" class="form-control-file" name="profile_img" id="profile_img">
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
                <th scope="col">Driver Id</th>
                <th scope="col">Vechical Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">DOB</th>
                <th scope="col">Address</th>
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
                echo "<tr id=" . $row_dt['driver_id'] . ">
                    <td>" . $sno . "</td>
                    <td>" . $row_dt['vehical_id'] . "</td>
                    <td>" . $row_dt['fname'] . "</td>
                    <td>" . $row_dt['lname'] . "</td>
                    <td>" . $row_dt['phone_no'] . "</td>
                    <td>" . $row_dt['email'] . "</td>
                    <td>" . $row_dt['dob'] . "</td>
                    <td>" . $row_dt['address'] . "</td>
                    <td>" . $row_dt['created_by'] . "</td>
                    <td>" . $row_dt['created_dt'] . "</td>
                    <td>" . $row_dt['updated_by'] . "</td>
                    <td>" . $row_dt['updated_dt'] . "</td>
                    <td><button onClick='editClick(" . $row_dt['driver_id'] . ")' class='edit btn btn-sm btn-success'>Edit</button>
                    <button onClick='deleteClick(" . $row_dt['driver_id'] . ")' class='delete btn btn-sm btn-danger'>Delete</button></td>
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
                url: '../controller/driver_control.php',
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
                url: '../controller/driver_control.php',
                type: 'POST',
                data: {
                    id: id,
                    action: "edit"
                },
                success: function(response) {
                    // console.log(response);

                    $.each(response, function(key, value) {
                        $('#edit_id').val(value['driver_id']);
                        $('#edit_fname').val(value['fname']);
                        $('#edit_lname').val(value['lname']);
                        $('#edit_phone').val(value['phone_no']);
                        $('#edit_email').val(value['email']);
                        $('#edit_dob').val(value['dob']);
                        $('#edit_add').val(value['address']);
                    });
                    $('#edit_user').modal('show');
                }
            });
        });
    }
</script>
<?php include("../includes/footer.php"); ?>