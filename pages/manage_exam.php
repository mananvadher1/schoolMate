<?php include("../controller/manage_exam_control.php"); ?>

<!-- edit modal -->


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
                        <select class="custom-select mr-sm-2" id="class" name="class" onchange="fetchSubjects()" required>

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
                            <option value="80 min">100 min</option>
                        </select>
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
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result_exams)) {
                $sno = $sno + 1;
                $class_name = $row['class_name'];
                $subject_name =$row['subject_name'];
                echo "<tr id=" . $row['id'] . ">
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['class_name'] . "</td>
                    <td>" . $row['subject_name'] . "</td>
                    <td>" . $row['exam_date'] . "</td>
                    <td>" . $row['exam_time'] . "</td>
                    <td>" . $row['duration'] . "</td>
                    <td>" . $row['result_date'] . "</td>
                    <td>" . $row['status'] . "</td>
                    <td><button class='edit btn btn-sm btn-success'>Edit</button>
                    <button class='delete btn btn-sm btn-danger'>Delete</button></td>
                    <td><a href='questions.php?cname=".$class_name."&sname=".$subject_name."'><button class='edit btn btn-sm btn-warning'>Add Questions</button></a></td>
                </tr>";
            } ?>
        </tbody>
    </table>
</div>



<!-- script to fetch class subjects of selected class -->
<script>
    function fetchSubjects(){
    
        var selectedClass = $("#class").val();
        console.log(selectedClass);
        $.ajax({
            url: '../controller/manage_exam_control.php',
            type: 'POST',
            data: { class: selectedClass },
            success:function(response){
                $('#subject').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); 
            }
        });
    }
</script>


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