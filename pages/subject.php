<?php include ("../controller/subject_control.php"); ?>

<!-- edit modal -->
<div class="modal fade" id="edit_subject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="my-4" action="subject.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="subject_id" name="subject_id">
                    <input type="hidden" class="form-control" id="cid" name="cid">
                    <div class="form-row">
                        <!-- <div class="form-group col-md-6">
                            </div> -->
                        <div class="form-group">

                            <label for="name">Subject Name:</label>
                            <input type="text" class="form-control" name="edit_name" id="edit_name" required>
                            <label for="code">Subject Code:</label>
                            <input type="text" class="form-control" name="edit_code" id="edit_code" required>
                            <label class="form-label mx-2" for="sub_ref">Enter Reference</label>
                            <input type="text" class="form-control" id="edit_sub_ref" name="edit_sub_ref"
                                placeholder="Enter Reference Link">
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
                <h3 class="card-title my-2">Add Subject Reference</h3>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    Click Here
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="collapse mt-3" id="collapseExample">
            <form class="form-inline" method="post" action="subject.php">
                <input type="hidden" class="form-control" id="sno" name="sno">
                <?php if ($_SESSION['role_id'] == 1): ?>
                    <div class="form-group mx-sm-3 mb-2">
                        <label class="form-label mx-2" for="class_name">Class</label>
                        <select class="custom-select mr-sm-2" id="class_name" name="class_id">
                            <option selected>Choose...</option>
                            <?php
                            while ($row = mysqli_fetch_assoc($result3)) {
                                $id = $row['class_id'];
                                $name = $row['class_name'];
                                echo '<option value="' . $id . '">' . $name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                <?php endif; ?>
                <div class="form-group mx-sm-3 mb-2">
                    <label class="form-label mx-2" for="sub_name">Enter Subject Name</label>
                    <input type="text" class="form-control" id="sub_name" name="sub_name"
                        placeholder="Enter Subject Name">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label class="form-label mx-2" for="sub_code">Enter Subject Code</label>
                    <input type="number" class="form-control" id="sub_code" name="sub_code"
                        placeholder="Enter Subject Code">
                </div><br><br>
                <div class="form-group mx-sm-3 mb-2">
                    <label class="form-label mx-2" for="sub_ref">Enter Reference</label>
                    <input type="text" class="form-control" id="sub_ref" name="sub_ref"
                        placeholder="Enter Reference Link">
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-4">Submit</button>
            </form>
        </div>
    </div>
</div>

<h1 class="text-center my-3"><b>Subject Reference</b></h1>
<!-- data table -->
<div class="content">
    <div class="container-fluid">
        <?php if ($_SESSION['role_id'] != 1) {
            $c_id = $_SESSION['class_id'];
            $sql = "SELECT class_name FROM classes WHERE class_id = " . $id . ";";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            echo '<table class="table table-bordered" width="100%">
        <thead>
        <tr>
        <th colspan="5" class="bg-primary text-dark text-center">' . $row['class_name'] . '</th>
        </tr>
        
        </thead>
        <tbody>
        <tr>
        
        <th class="font-weight-bold col-md-3">Subject Name</th>
        <th class="font-weight-bold col-md-3">Subject Code</th>
        <th class="font-weight-bold col-md-3">Subject Reference</th>';
            if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) {
                echo '<th class="font-weight-bold col-md-3">Action</th>';
            }
            echo '</tr>';

            // query to fetch particular class subjects
            // $sql_subjects = "SELECT * FROM subjects WHERE class_id = '$c_name'";
            // $result_subjects = mysqli_query($conn, $sql_subjects);
            // while ($row_dt = mysqli_fetch_assoc(($result_subjects))) {
            while ($row = mysqli_fetch_assoc($result_classes)) {
                echo "<tr id=" . $row['subject_id'] . ">
                <td>" . $row['subject_name'] . "</td>
                <td>" . $row['subject_code'] . "</td>
                <td><a href='" . $row['subject_ref'] . "'>click here to see the reference</a></td>";
                if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) {
                    echo "<td><button onClick='editClick(" . $row['subject_id'] . ")' class='edit-button btn btn-sm btn-success' >Edit</button> 
                    <button onClick='deleteClick(" . $row['subject_id'] . ")' class='delete btn btn-sm btn-danger'>Delete</button></td>";
                }


                echo "</tr>";
            }
            echo '</tbody></table>';
        } ?>
    </div>
</div>

<div class="row m-3">
    <div class="col-md-4">
        <div class="form-group">
            <label for="class_id">Class:</label>
            <select class="form-control" name="class_id" id="class_id" required>
                <option value="" selected disabled> -- Select Class --</option>
                <?php
                while ($class_dropdowm = mysqli_fetch_assoc($class_dropdown)) {
                    echo '  <option value="' . $class_dropdowm['class_id'] . '">' . $class_dropdowm['class_name'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
</div>

<!-- data table -->
<div class="content">
    <div class="container-fluid">
        <table class="table" id="subjectDataList" width="100%">
            <thead>
                <tr>
                    <th class="font-weight-bold col-md-3">SNO</th>
                    <th class="font-weight-bold col-md-3">Subject Name</th>
                    <th class="font-weight-bold col-md-3">Subject Code</th>
                    <th class="font-weight-bold col-md-3">Subject Reference</th>
                    <th class="font-weight-bold col-md-3">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>


<script>
    function deleteClick(id,cid) {
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
                    url: '../controller/subject_control.php',
                    type: 'POST',
                    data: {
                        id: id,
                        action: "delete"
                    },
                    success: function (response) {
                        if (response) {
                            Swal.fire({
                                title: "Success!",
                                text: "Subject deleted successfully.",
                                icon: "success",
                                confirmButtonColor: '#3085d6'
                            }).then(() => {
                                // Reload or update the page after deletion
                                // location.reload();
                                subjectDataTable(cid);

                            });
                            // Optional: Hide the deleted row without refreshing the page
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
        $(document).ready(function () {
            console.log('hii')
            $.ajax({
                url: '../controller/subject_control.php',
                type: 'POST',
                data: {
                    id: id,
                    action: "edit"
                },
                success: function (response) {
                    // console.log('response---->',response);
                    // console.log(response);
                    // Use setTimeout to delay SweetAlert
                    $.each(response, function (key, value) {
                        $('#subject_id').val(value['subject_id']);
                        $('#cid').val(value['class_id']);
                        $('#edit_name').val(value['subject_name']);
                        $('#edit_code').val(value['subject_code']);
                        $('#edit_sub_ref').val(value['subject_ref']);
                    });
                    $("#edit_subject").modal('show');
                },

            });
        });
    }

    $(document).ready(function () {
        // feeDataTable(0);
        $('#class_id').on('change', function () {
            var class_id = $(this).val();
            subjectDataTable(class_id);
        });
    });

    function subjectDataTable(class_id) {
        $('#subjectDataList').DataTable({
            "processing": true,
            "serverSide": true,
            responsive: true,
            bDestroy: true,
            ajax: {
                url: '../api/get_subject.php',
                type: 'POST',
                data: {
                    class_id: class_id,
                    action: "get_subject"
                },
            }
            // "pageLength": 1
        });
    }
    $('#subject-link').addClass('active');
</script>


<?php include ("../includes/footer.php"); ?>