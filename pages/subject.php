<?php include("../controller/subject_control.php"); ?>

<!-- edit modal -->
<!-- <div class="modal" id="edit_role" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-inline edit_form" method="post">
                    <div class="form-group mx-sm-3 mb-2 my-2">
                        <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                        <label class="form-label mx-3" for="edit_name">Subject Name</label>
                        <input type="text" class="form-control" id="edit_name" name="edit_name">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mb-2">Update</button>
            </div>
            </form>
        </div>
    </div>
</div> -->

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
                <div class="form-group mx-sm-3 mb-2">
                    <label class="form-label mx-2" for="class_name">Class</label>
                    <select class="custom-select mr-sm-2" id="class_name" name="class_name">
                        <option selected>Choose...</option>
                        <?php
                        while ($row = mysqli_fetch_assoc($result3)) {
                            $id = $row['class_id'];
                            $name = $row['class_name'];
                            echo '<option value="'.$name.'">'.$name.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label class="form-label mx-2" for="sub_name">Enter Subject Name</label>
                    <input type="text" class="form-control" id="sub_name" name="sub_name" placeholder="Enter Role Name">
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
                <button type="submit" class="btn btn-primary mb-2 float-rigt">Submit</button>
            </form>
        </div>
    </div>
</div>


<h1 class="text-center my-3"><b>Subject Reference</b></h1>
<!-- data table -->
<div class="container">
    
    <?php
    while ($row = mysqli_fetch_assoc($result_classes)) {
  
        $c_name = $row['class_name'];

        echo '<table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="4" class="bg-primary text-dark text-center">'.$c_name.'</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="font-weight-bold col-md-3">Subject Name</th>
                <th class="font-weight-bold col-md-3">Subject Code</th>
                <th class="font-weight-bold col-md-3">Subject Reference</th>
                <th class="font-weight-bold col-md-3">Action</th>
            </tr>';

            // query to fetch particular class subjects
            $sql_subjects = "SELECT * FROM subjects WHERE class_name = '$c_name'";
            $result_subjects = mysqli_query($conn, $sql_subjects);
            while($row_subjects = mysqli_fetch_assoc(($result_subjects))){
                $s_name = $row_subjects['subject_name'];
                $s_code = $row_subjects['subject_code'];
                $s_ref = $row_subjects['subject_ref'];
                echo '<tr>
                <td>'.$s_name.'</td>
                <td>'.$s_code.'</td>
                <td><a href="'.$s_ref.'">Click Here to see pdf</a></td>
                <td><button class="edit btn btn-sm btn-success">Edit</button>
                    <button class="delete btn btn-sm btn-danger">Delete</button>
                </td>
                </tr>';
            }
            echo '</tbody></table>';
       
    }
    ?>
</div>


<script>
    // function deleteClick(id) {
    //     $(document).ready(function() {
    //         // console.log('hii')
    //         $.ajax({
    //             //action
    //             url: '../controller/role_control.php',
    //             //method
    //             type: 'POST',
    //             // header:{
    //             //     contentType: "application/json",
    //             // },
    //             data: {
    //                 //get value
    //                 id: id,
    //                 action: "delete"
    //             },
    //             success: function(response) {
    //                 // console.log('response---->',response);
    //                 //response is output of the action file
    //                 if (response) {
    //                     alert("Deleted role_id: " + id + " successfully");
    //                     // $("#id").hide();
    //                     document.getElementById(id).style.display = "none";
    //                 } else if (!response) {
    //                     alert("Data Can't be deleted");
    //                 }
    //             }
    //         });
    //     });
    // }

    function editClick(id) {
        $(document).ready(function () {
            // console.log('hii')
            $.ajax({
                url: '../controller/role_control.php',
                type: 'POST',
                data: {
                    id: id,
                    action: "edit"
                },
                success: function (response) {
                    // console.log('response---->',response);
                    // console.log(response);

                    $.each(response, function (key, value) {
                        $('#sno').val(value['role_id']);
                        $('#edit_name').val(value['role_name']);
                    });
                    $("#edit_role").modal('show');
                }
            });
        });
    }
</script>



<?php include("../includes/footer.php"); ?>