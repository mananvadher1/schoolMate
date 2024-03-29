<?php include("../controller/manage_exam_control.php"); ?>

<!-- edit notice modal  -->
<div class="modal" id="edit_exam" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Exam Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="my-4" action="manage_exam.php" method="post" enctype="multipart/form-data">
          <input type="hidden" class="form-control" id="edit_id" name="edit_id">
          
          <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="edit_edate">Exam Date</label>
                        <input type="date"  class="form-control" id="edit_edate" name="edit_edate">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="edit_etime">Exam Time</label>
                        <input type="time"  class="form-control" id="edit_etime" name="edit_etime">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="edit_duration">Duration</label>
                        <select class="custom-select mr-sm-2" id="edit_duration" name="edit_duration">
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="60">60</option>
                            <option value="80">80</option>
                            <option value="80">100</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="edit_rdate">Result Date</label>
                        <input type="date" class="form-control" id="edit_rdate" name="edit_rdate">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="edit_status">Status</label>
                        <select class="custom-select mr-sm-2" id="edit_status" name="edit_status">
                            <option selected>Choose...</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update Exam Details</button>
      </div>
      </form>
    </div>
  </div>
</div>


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
                                $class = $row['class_id'];
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
                        <label for="duration">Duration(Minutes)</label>
                        <select class="custom-select mr-sm-2" id="duration" name="duration" required>
                            <option value="20 min">20</option>
                            <option value="30 min">30</option>
                            <option value="60 min">60</option>
                            <option value="80 min">80</option>
                            <option value="80 min">100</option>
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
                <th scope="col">Duration(Minutes)</th>
                <th scope="col">Result date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                <th scope="col">Add Questions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sno = 0; 
            while ($row = mysqli_fetch_assoc($result_exams)) {
                $sno = $sno + 1;
                $class_id = $row['class_id'];
                $subject_name =$row['subject_name'];
                echo "<tr id=" . $row['id'] . ">
                    <td>" . $sno . "</td>
                    <td>" . $row['class_name'] . "</td>
                    <td>" . $row['subject_name'] . "</td>
                    <td>" . $row['exam_date'] . "</td>
                    <td>" . $row['exam_time'] . "</td>
                    <td>" . $row['duration'] . "</td>
                    <td>" . $row['result_date'] . "</td>
                    <td>" . $row['status'] . "</td>
                    <td><button onClick='editClick(" . $row['id'] . ")' class='edit btn btn-sm btn-success'>Edit</button>
                    <button onClick='deleteClick(" . $row['id'] . ")' class='delete btn btn-sm btn-danger'>Delete</button></td>
                    <td><a href='questions.php?cid=".$class_id."&sname=".$subject_name."'><button class='edit btn btn-sm btn-warning'>Add Questions</button></a></td>
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
            url: '../api/manage_exam_api.php',
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
                url: '../controller/manage_exam_control.php',
                type: 'POST',
                data: {
                    id: id,
                    action: "delete"
                },
                success: function(response) {
                    if (response) {
                        Swal.fire({
                            title: "Success!",
                            text: "Exam deleted successfully.",
                            icon: "success",
                            confirmButtonColor: '#3085d6'
                        }).then(() => {
                            // Reload or update the page after deletion
                            // location.reload();
                        });
                        // Optional: Hide the deleted row without refreshing the page
                        $("#" + id).hide();
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
                    $('#edit_edate').val(value['exam_date']);
                    $('#edit_etime').val(value['exam_time']);
                    $('#edit_duration').val(value['duration']);
                    $('#edit_rdate').val(value['result_date']);
                    $('#edit_status').val(value['status']);
                
                    // for active status
                    // $('#edit_status').prop('checked', value['status'] == 1);
                });
                $('#edit_exam').modal('show');
                console.log("clicked");
            }
        });
    });
}
</script>

<?php include("../includes/footer.php"); ?>