<?php
include("../controller/fees_control.php"); ?>
<?php if ($_SESSION['role_id'] == 3) : ?>
    <div class="container my-4">
        <h1 class="text-center">
            <strong>Fees Details</strong>
        </h1>
        <div class="cards my-3">
            <div class="row">
                <?php
                $counter = 1;
                while ($row = mysqli_fetch_assoc($re_dt)) {
                    $class = $row['class_id'];
                    $type = $row['fees_type'];
                    $rs = $row['rs'];

                    // Determine color based on the counter value
                    $color = $counter % 3 == 0 ? 'bg-success' : ($counter % 2 == 0 ? 'bg-warning' : 'bg-info');

                    echo ' <div class="col-lg-4 col-6">
                        <div class="small-box ' . $color . '">
                        <div class="inner">
                            <h3>' . $type . ' Fees</h3>
                            <p><b>Class ' . $class . '</b></p>
                            <p><b>Amount: ' . $rs . ' /- </b></p>
                            
                        </div>
                        </div>
                    </div>';

                    $counter++;
                }

                ?>
                <!-- small box -->

                <!-- ./col -->

            </div>
        </div>
    </div>
<?php else : ?>

    <!-- edit modal -->
    <div class="modal" id="edit_fee" tabindex="-1" role="dialog">
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
                        <div class="form-group mx-sm-3 my-2">
                            <input type="hidden" class="form-control" id="edit_id" name="edit_id">
                            <label for="edit_fees_type">Fees Type:</label>&nbsp;
                            <select class="form-control" name="edit_fees_type" id="edit_fees_type">
                                <option value="Annual">Annual Fees</option>
                                <option value="Examination">Examination Fees</option>
                                <option value="Application">Application Fees</option>
                                <option value="Material">Material Fees</option>
                                <option value="Transportation">Transportation Fees</option>
                                <option value="Uniform">Uniform Fees</option>
                                <option value="Technology">Technology Fees</option>
                            </select>
                        </div>
                        <div class="form-group mx-sm-3 my-2">
                            <label for="edit_fees">Rs:</label>&nbsp;
                            <input type="text" class="form-control" name="edit_fees" id="edit_fees" required>
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
                    <h3 class="card-title my-2">Fees</h3>
                </div>
                <div class="col-auto">
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Add Fees
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="collapse mt-3" id="collapseExample">
                <form class="form-inline" method="post" enctype="multipart/form-data">
                    <div class="form-row mx-sm-3 mb-2">
                        <div class="form-group mx-sm-3">
                            <label for="class_id">Class:</label>&nbsp;
                            <select class="form-control" name="class_id" id="form_class_id" required>
                                <option value="" selected disabled> -- Select Class --</option>
                                <?php
                                while ($class_dropdowm = mysqli_fetch_assoc($m_class_dropdown)) {
                                    echo '  <option value="' . $class_dropdowm['class_id'] . '">' . $class_dropdowm['class_name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mx-sm-3">
                            <label for="fees_type">Fees Type:</label>&nbsp;
                            <select class="form-control" name="fees_type" id="fees_type">
                                <option value="Annual">Annual Fees</option>
                                <option value="Examination">Examination Fees</option>
                                <option value="Application">Application Fees</option>
                                <option value="Material">Material Fees</option>
                                <option value="Transportation">Transportation Fees</option>
                                <option value="Uniform">Uniform Fees</option>
                                <option value="Technology">Technology Fees</option>
                            </select>
                        </div>
                        <div class="form-group mx-sm-3">
                            <label for="fees">Rs: </label>&nbsp;
                            <input type="text" class="form-control" name="fees" id="fees" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
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
    <div class="container">
        <table class="table" id="feeDataList">
            <thead>
                <tr>
                    <th scope="col">Sno.</th>
                    <!-- <th scope="col">Class Id</th> -->
                    <th scope="col">Fee Type</th>
                    <th scope="col">Rs</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- <td>" . $row_dt['class_id'] . "</td> -->
                <!-- <?php while ($row_dt = mysqli_fetch_assoc($re_dt)) {
                            echo "<tr id=" . $row_dt['id'] . ">
                    <th scope='row'>" . $row_dt['id'] . "</th>
                    <td>" . $row_dt['fees_type'] . "</td>
                    <td>" . $row_dt['rs'] . "</td>
                    <td><button onClick='editClick(" . $row_dt['id'] . ")' class='edit-button btn btn-sm btn-success' >Edit</button> 
                    </tr>";
                        } ?> -->
                <!-- <button onClick='deleteClick(" . $row_dt['id'] . ")' class='delete btn btn-sm btn-danger'>Delete</button></td> -->
            </tbody>
        </table>
    </div>
    <script>
        // function deleteClick(id) {
        //     // Use SweetAlert for confirmation before deleting
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: 'You will not be able to recover this record!',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             // Proceed with deletion
        //             $.ajax({
        //                 url: '../controller/fees_control.php',
        //                 type: 'POST',
        //                 data: {
        //                     id: id,
        //                     action: "delete"
        //                 },
        //                 success: function(response) {
        //                     if (response) {
        //                         Swal.fire({
        //                             title: "Success!",
        //                             text: "Fees deleted successfully.",
        //                             icon: "success",
        //                             confirmButtonColor: '#3085d6'
        //                         }).then(() => {
        //                             // Reload or update the page after deletion
        //                             // location.reload();
        //                         });
        //                         // Optional: Hide the deleted row without refreshing the page
        //                         $("#" + id).hide();
        //                     } else {
        //                         Swal.fire({
        //                             title: "Error!",
        //                             text: "Failed to delete the record.",
        //                             icon: "error"
        //                         });
        //                     }
        //                 }
        //             });
        //         }
        //     });
        // }

        function editClick(id) {
            $(document).ready(function() {
                // console.log('hii')
                $.ajax({
                    url: '../controller/fees_control.php',
                    type: 'POST',
                    data: {
                        id: id,
                        action: "edit"
                    },
                    success: function(response) {
                        // console.log('response---->',response);
                        // console.log(response);
                        $.each(response, function(key, value) {
                            $('#edit_id').val(value['id']);
                            $('#edit_class_id').val(value['class_id']);
                            $('#edit_fees_type').val(value['fees_type']);
                            $('#edit_fees').val(value['rs']);
                        });
                        $("#edit_fee").modal('show');
                    }
                });
            });
        }


        $(document).ready(function() {
            // feeDataTable(0);
            $('#class_id').on('change', function() {
                var class_id = $(this).val();
                feeDataTable(class_id);
            });
        });

        function feeDataTable(class_id) {
            $('#feeDataList').DataTable({
                "processing": true,
                "serverSide": true,
                responsive: true,
                bDestroy: true,
                ajax: {
                    url: '../api/get_class_fee.php',
                    type: 'POST',
                    data: {
                        class_id: class_id,
                        action: "get_fee"
                    },
                }
                // "pageLength": 1
            });
        }
    </script>
<?php endif; ?>
<?php include("../includes/footer.php"); ?>