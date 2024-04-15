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
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="edit_email" id="edit_email" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="edit_pass" id="edit_pass" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="class_id">Class:</label>
                                <select class="form-control" name="edit_class_id" id="edit_class_id" required>
                                    <?php
                                    while ($class_dropdowm = mysqli_fetch_assoc($m_class_dropdown)) {
                                        echo '  <option value="' . $class_dropdowm['class_id'] . '">' . $class_dropdowm['class_name'] . '</option>';
                                    }
                                    ?>
                                </select>
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

    <!-- add user -->
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
                                    if ($_SESSION['role_id'] == 2 && $row_dropdowm['role_id'] != 3) {
                                            continue;
                                    }
                                    if ($_SESSION['role_id'] == 1 && $row_dropdowm['role_id'] == 4 || $row_dropdowm['role_id'] == 1 ) {
                                            continue;
                                    }
                                    echo '  <option value="' . $row_dropdowm['role_id'] . '">' . $row_dropdowm['role_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="class_id">Class:</label>
                            <select class="form-control" name="class_id" id="class_id" required>
                                <?php
                                while ($class_dropdowm = mysqli_fetch_assoc($class_dropdown)) {
                                    echo '  <option value="' . $class_dropdowm['class_id'] . '">' . $class_dropdowm['class_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
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

    <div class="row m-3">
        <div class="col-md-4">
            <div class="form-group">
                <label for="role_id">Role:</label>                 
                <select class="form-control" name="table_role_id" id="table_role_id" required>
                    <option value="" selected disabled> -- Select Role --</option>
                <?php
                while ($row_dropdowm = mysqli_fetch_assoc($search_role)) {
                    if ($row_dropdowm['role_id'] == 4) {
                        continue;
                    }
                    if($_SESSION['role_id'] == 2 && $row_dropdowm['role_id'] == 1){
                        continue;
                    }
                    echo '  <option value="' . $row_dropdowm['role_id'] . '">' . $row_dropdowm['role_name'] . '</option>';
                }
                ?>
            </select>                     
            </div>
        </div>
    </div>
 
    <!-- datatables -->
    <div class="content">
    <div class="container-fluid">
        <table class="table table-hover " id="userDataList" width="100%">
            <thead>
                <tr>
                    <th scope="col">Sr no</th>
                    <th scope="col">Role</th>
                    <th class="addClass" scope="col">Class</th>
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
            </tbody>
        </table>
    </div>
    </div>


    <script>
        
        function deleteClick(id) {
            // Use SweetAlert for confirmation before deleting
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this record!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with deletion
                    $.ajax({
                        url: '../controller/user_control.php',
                        type: 'POST',
                        data: {
                            id: id,
                            action: "delete"
                        },
                        success: function(response) {
                            if (response) {
                                Swal.fire({
                                    title: "Success!",
                                    text: "User deleted successfully.",
                                    icon: "success",
                                    confirmButtonColor: '#3085d6'
                                }).then(() => {
                                    // Reload or update the page after deletion
                                    // location.reload();
                                });
                                // Optional: Hide the deleted row without refreshing the page
                                $("#" + id).hide();
                                $(".child").hide();

                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: "Failed to delete the record.",
                                    icon: "error"
                                });
                            }
                        }
                    });
                }
            });
        }

        function editClick(id) {
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

                            $('#edit_class_id').val(value['class_id']);
                        });
                        $('#edit_user').modal('show');
                    }
                });
        }
        
        $(document).ready(function() {
            userDataTable(0);
            $('#table_role_id').on('change', function() {
                var role_id = $(this).val();
                userDataTable(role_id);
                // data: {
                //         role_id: role_id,
                //         action: "get_user"
                //     },
                // $('#myTable').DataTable().clear();

                // console.log(111111)
                // var role_id = $(this).val();
                // $.ajax({
                //     url: '../api/get_user.php',
                //     type: 'POST',
                //     data: {
                //         role_id: role_id,
                //         action: "get_user"
                //     },
                //     success: function(response) {
                //         // console.log(response);
                //         $("#myTable tbody").empty();
                //         $("#myTable").show();
                //         // Iterate over the JSON data
                //         $.each(response, function(index, row) {
                //             // Construct HTML for each row
                //             var html = "<tr id='" + row.id + "'>";
                //             html += "<td>" + (index + 1) + "</td>";
                //             html += "<td>" + row.role_name + "</td>";
                //             if (role_id != 1) {
                //                 html += "<td class='addClass'>" + row.class_name + "</td>";
                //             }
                //             html += "<td>" + row.email + "</td>";
                //             html += "<td>" + row.password + "</td>";
                //             html += "<td>" + row.first_name + "</td>";
                //             html += "<td>" + row.last_name + "</td>";
                //             html += "<td>" + row.dob + "</td>";
                //             html += "<td>" + row.gender + "</td>";
                //             html += "<td>" + row.phone + "</td>";
                //             html += "<td>" + row.blood_group + "</td>";
                //             html += "<td>" + row.address + "</td>";
                //             html += "<td>" + row.city + "</td>";
                //             html += "<td>" + row.status + "</td>";
                //             html += "<td>" + row.created_by + "</td>";
                //             html += "<td>" + row.created_dt + "</td>";
                //             html += "<td>" + row.updated_by + "</td>";
                //             html += "<td>" + row.updated_dt + "</td>";
                //             html += "<td><button onClick='editClick(" + row.id + ")' class='edit btn btn-sm btn-success'>Edit</button>&nbsp;";
                //             html += "<button onClick='deleteClick(" + row.id + ")' class='delete btn btn-sm btn-danger'>Delete</button></td>";
                //             html += "</tr>";

                //             // Append HTML to the table body
                //             $("#myTable tbody").append(html);
                //         });
                //         if (role_id == 1) {
                //             $(".addClass").hide();
                //         } else {
                //             $(".addClass").show();
                //         }
                        
                        
                //     }
                // });
            });
        });

        function userDataTable(role_id){
            var hide = [];
            if(role_id == 1){
                var hide = [2];
            }
            $('#userDataList').DataTable({
                    "processing": true,
                    "serverSide": true,
                    responsive: true,
                    bDestroy: true,
                    ajax: {
                        url: '../api/get_user.php',
                        type: 'POST',
                        data: {
                            role_id: role_id,
                            action: "get_user"
                        },
                    },
                    'columnDefs' : [
                                //hide the second column class name in a principal role
                                { 'visible': false, 'targets': hide }
                        ],
                    "aoColumns": [
                        {mData: 'sr_no'},
                        {data: 'role_name'},
                        {data: 'class_name'},
                        {data: 'email'},
                        {data: 'password'},
                        {data: 'first_name'},
                        {data: 'last_name'},
                        {data: 'dob'},
                        {data: 'gender'},
                        {data: 'phone'},
                        {data: 'blood_group'},
                        {data: 'address'},
                        {data: 'city'},
                        {data: 'status'},
                        {data: 'created_by'},
                        {data: 'created_dt'},
                        {data: 'updated_by'},
                        {data: 'updated_dt'},
                        {data: 'action'}, 
                    ],
                    // "pageLength": 1
                });
        }
    </script>
    <?php include("../includes/footer.php"); ?>
<?php else : ?>
    <?php header("location: 404.php"); ?>
<?php endif; ?>