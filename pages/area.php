<?php include("../controller/area_control.php"); ?>

<div class="modal fade" id="edit_area" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="my-4" action="area.php" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="area_name">Area Name:</label>
                            <input type="text" class="form-control" name="edit_area_name" id="edit_area_name" required>
                        </div>
                    <div class="form-group col-md-6">
                        <label for="edit_vehical_id">Vehical Id:</label>
                        <select class="form-control" name="edit_vehical_id" id="edit_vehical_id" required>
                            <?php
                            while ($row_dropdowm = mysqli_fetch_assoc($re_edit_dropdown)) {
                                echo '  <option value="' . $row_dropdowm['vehical_id'] . '">' . $row_dropdowm['vehical_no'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>  
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pincode">Pincode:</label>
                            <input type="text" class="form-control" name="edit_pincode" id="edit_pincode" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" name="edit_city" id="edit_city" required>
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
                <h3 class="card-title my-2">Manage Area</h3>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Add Area</a>
            </div>
        </div>
    </div>
    <div class="card-body px-4 p-0">
        <div class="collapse mt-3" id="collapseExample">
            <form class="my-4" action="area.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="area_name">Area Name:</label>
                        <input type="text" class="form-control" name="area_name" id="area_name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="vehical_id">Vehical Id:</label>
                        <select class="form-control" name="vehical_id" id="vehical_id" required>
                            <?php
                            while ($row_dropdowm = mysqli_fetch_assoc($re_dropdown)) {
                                echo '  <option value="' . $row_dropdowm['vehical_id'] . '">' . $row_dropdowm['vehical_no'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>  
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pincode">Pincode:</label>
                        <input type="text" class="form-control" name="pincode" id="pincode" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" name="city" id="city" required>
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
                <th scope="col">Area Id</th>
                <th scope="col">Area Name</th>
                <th scope="col">Pincode</th>
                <th scope="col">City</th>
                <th scope="col">Vehical No</th>
                <th scope="col">Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php while ($row_dt = mysqli_fetch_assoc($re_dt)) {
                $sno = $sno + 1;
                echo "<tr id=" . $row_dt['area_id'] . ">
                    <td>" . $row_dt['area_id'] . "</td>
                    <td>" . $row_dt['area_name'] . "</td>
                    <td>" . $row_dt['pincode'] . "</td>
                    <td>" . $row_dt['city'] . "</td>
                    <td>" . $row_dt['vehical_no'] . "</td>
                    <td><button onClick='editClick(" . $row_dt['area_id'] . ")' class='edit btn btn-sm btn-success'>Edit</button>
                    <button onClick='deleteClick(" . $row_dt['area_id'] . ")' class='delete btn btn-sm btn-danger'>Delete</button></td>
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
                url: '../controller/area_control.php',
                type: 'POST',
                data: {
                    //get value
                    id: id,
                    action: "delete"
                },
                success: function(response) {
                    console.log('response---->', response);
                    confirm("Are you sure you want to delete the record?");
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
                url: '../controller/area_control.php',
                type: 'POST',
                data: {
                    id: id,
                    action: "edit"
                },
                success: function(response) {
                    // console.log(response);

                    $.each(response, function(key, value) {
                        $('#edit_id').val(value['area_id']);
                        $('#edit_area_name').val(value['area_name']);
                        //$('#edit_vehical_id').val(value['vehical_no']);
                        $('#edit_pincode').val(value['pincode']);
                        $('#edit_city').val(value['city']);
                        
                    });
                    $('#edit_area').modal('show');
                }
            });
        });
    }
</script>
<?php include("../includes/footer.php"); ?>