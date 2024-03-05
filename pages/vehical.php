<?php include("../controller/vehical_control.php"); ?>

<!-- edit modal -->
<div class="modal" id="edit_vehical" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Vehical</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-inline edit_form" method="post">
                    <div class="form-group mx-sm-3 mb-2 my-2">
                        <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                        <label class="form-label mx-3" for="edit_vehical_no">Vehical No</label>
                        <input type="text" class="form-control" id="edit_vehical_no" name="edit_vehical_no">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mb-2">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="card card-secondary">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3 class="card-title my-2">Manage Vehical</h3>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Add Vehical
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="collapse mt-3" id="collapseExample">
            <form class="form-inline" method="post">
                <div class="form-group mx-sm-3 mb-2">
                    <label class="form-label mx-2" for="vehical_no">Enter Vehical No:</label>
                    <input type="text" class="form-control" id="vehical_no" name="vehical_no" placeholder="Enter Vehical No">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- data table -->
<div class="container">
    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">Vehical Id</th>
                <th scope="col">Vehical No</th>
                <th scope="col">Created By</th>
                <th scope="col">Created Date</th>
                <th scope="col"> Upadated By</th>
                <th scope="col">Updated Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row_dt = mysqli_fetch_assoc($re_dt)) {
                echo "<tr id=" . $row_dt['vehical_id'] . ">
                    <th scope='row'>" . $row_dt['vehical_id'] . "</th>
                    <td>" . $row_dt['vehical_no'] . "</td>
                    <td>" . $row_dt['created_by'] . "</td>
                    <td>" . $row_dt['created_dt'] . "</td>
                    <td>" . $row_dt['updated_by'] . "</td>
                    <td>" . $row_dt['updated_dt'] . "</td>
                    <td><button onClick='editClick(" . $row_dt['vehical_id'] . ")' class='edit btn btn-sm btn-success'>Edit</button>
                    <button onClick='deleteClick(" . $row_dt['vehical_id'] . ")' class='delete btn btn-sm btn-danger'>Delete</button></td>
                </tr>";
            } ?>
        </tbody>
        <!-- <button onClick='deleteClick(" . $row_dt['role_id'] . ")' class='delete btn btn-sm btn-danger'>Delete</button></td> -->
    </table>
</div>

<script>
    function deleteClick(id) {
        $(document).ready(function() {
            // console.log('hii')
            $.ajax({
                //action
                url: '../controller/vehical_control.php',
                //method
                type: 'POST',
                // header:{
                //     contentType: "application/json",
                // },
                data: {
                    //get value
                    id: id,
                    action: "delete"
                },
                success: function(response) {
                    // console.log('response---->',response);
                    //response is output of the action file
                    if (response) {
                        alert("Deleted role_id: " + id + " successfully");
                        // $("#id").hide();
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
                url: '../controller/vehical_control.php',
                type: 'POST',
                data: {
                    id: id,
                    action: "edit"
                },
                success: function(response) {
                    // console.log('response---->',response);
                    // console.log(response);

                    $.each(response, function(key, value) {
                        $('#edit_id').val(value['vehical_id']);
                        $('#edit_vehical_no').val(value['vehical_no']);
                    });
                    $("#edit_vehical").modal('show');
                }
            });
        });
    }
</script>

<?php include("../includes/footer.php"); ?>