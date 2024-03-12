<?php include("../controller/manage_exam_control.php"); ?>

<!-- edit modal -->
<!-- <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
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
                                <input class="form-check-input" type="radio" name="edit_gender" id="edit_gender-male"
                                    value="male" required>
                                <label class="form-check-label" for="gender-male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="edit_gender" id="edit_gender-female"
                                    value="female" required>
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
                                <input class="form-check-input" type="checkbox" name="edit_status" id="edit_status"
                                    value="1">
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div> -->

<!-- add exam form -->
<div class="card card-secondary">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3 class="card-title my-2">Manage Exam</h3>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">Add Exam</a>
            </div>
        </div>
    </div>
    <div class="card-body px-4 p-0">
        <div class="collapse mt-3" id="collapseExample">
            <form class="my-4" action="manage_exam.php" method="post" enctype="multipart/form-data">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="class">Class</label>
                        <select class="custom-select mr-sm-2" id="class" name="class" required>
                            <option selected>Choose Class...</option>
                            <?php
                                while($row = mysqli_fetch_assoc($result_classes)){
                                $class = $row['class_name'];
                                echo '<option value="'.$class.'">'.$class.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="subject">Subject</label>
                        <select class="custom-select mr-sm-2" id="subject" name="subject" required>
                            <option selected>Choose Subject...</option>
                            <?php
                                while($row = mysqli_fetch_assoc($result_subjects)){
                                $sub = $row['subject_name'];
                                echo '<option value="'.$sub.'">'.$sub.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="edate">Exam Date</label>
                        <input type="date" required class="form-control" id="edate" name="edate" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="etime">Exam Time</label>
                        <input type="time" required class="form-control" id="etime" name="etime" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="duration">Duration</label>
                        <select class="custom-select mr-sm-2" id="duration" name="duration" required>
                            <option value="20 min">20 min</option>
                            <option value="30 min">30 min</option>
                            <option value="60 min">60 min</option>
                            <option value="80 min">80 min</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="correct_ans">Marks for correct answer</label>
                        <input type="text" required class="form-control" id="correct_ans" name="correct_ans" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="wrong_ans">Marks for Wrong answer</label>
                        <input type="text" required class="form-control" id="wrong_ans" name="wrong_ans" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="rdate">Result Date</label>
                        <input type="date" required class="form-control" id="rdate" name="rdate" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select class="custom-select mr-sm-2" id="status" name="status" required>
                            <option selected>Choose...</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending</option>
                        </select>
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
                <th scope="col">Sno</th>
                <th scope="col">Class</th>
                <th scope="col">Subject</th>
                <th scope="col">Exam Date</th>
                <th scope="col">Exam Time</th>
                <th scope="col">Duration</th>
                <th scope="col">Result date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                <th scope="col">Add Questions</th>
                <th scope="col">Marks for correct answer</th>
                <th scope="col">Marks for wrong answer</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result_exams)) {
                $sno = $sno + 1;
                echo "<tr id=" . $row['id'] . ">
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['class_name'] . "</td>
                    <td>" . $row['subject_name'] . "</td>
                    <td>" . $row['exam_date'] . "</td>
                    <td>" . $row['exam_time'] . "</td>
                    <td>" . $row['result_date'] . "</td>
                    <td>" . $row['status'] . "</td>
                    <td>" . $row['duration'] . "</td>
                    <td><button onClick='editClick(" . $row_dt['id'] . ")' class='edit btn btn-sm btn-success'>Edit</button>
                    <button onClick='deleteClick(" . $row_dt['id'] . ")' class='delete btn btn-sm btn-danger'>Delete</button></td>
                    <td><button class='edit btn btn-sm btn-warning'>Add Questions</button></td>
                    <td>" . $row['c_ans'] . "</td>
                    <td>" . $row['w_ans'] . "</td>
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
            url: '../controller/manage_exam_control.php',
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
            url: '../controller/manage_exam_control.php',
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