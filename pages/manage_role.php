<?php include("../controller/role_control.php"); ?>
<?php if ($_SESSION['role_id'] == 1): ?>
 
<!-- edit modal -->
<div class="modal" id="edit_role" tabindex="-1" role="dialog">
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
                        <label class="form-label mx-3" for="edit_name">Role Name</label>
                        <input type="text" class="form-control" id="edit_name" name="edit_name">
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
                <h3 class="card-title my-2">Manage Roles</h3>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Add Role
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="collapse mt-3" id="collapseExample">
            <form class="form-inline" method="post">
                <div class="form-group mx-sm-3 mb-2">
                    <label class="form-label mx-2" for="role_name">Enter Role Name</label>
                    <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Enter Role Name">
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
                <th scope="col">Role Id</th>
                <th scope="col">Role Name</th>
                <th scope="col">Created By</th>
                <th scope="col">Created Date</th>
                <th scope="col"> Upadated By</th>
                <th scope="col">Updated Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row_dt = mysqli_fetch_assoc($re_dt)) {
                echo "<tr id=" . $row_dt['role_id'] . ">
                    <th scope='row'>" . $row_dt['role_id'] . "</th>
                    <td>" . $row_dt['role_name'] . "</td>
                    <td>" . $row_dt['created_by'] . "</td>
                    <td>" . $row_dt['created_dt'] . "</td>
                    <td>" . $row_dt['updated_by'] . "</td>
                    <td>" . $row_dt['updated_dt'] . "</td>
                    <td><button onClick='editClick(" . $row_dt['role_id'] . ")' class='edit-button btn btn-sm btn-success' >Edit</button> 
                </tr>";
            } ?>
        </tbody>
        <!-- <button onClick='deleteClick(" . $row_dt['role_id'] . ")' class='delete btn btn-sm btn-danger'>Delete</button></td> -->
    </table>
</div>

<script>
//    function deleteClick(id) {
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
//                 url: '../controller/role_control.php',
//                 type: 'POST',
//                 data: {
//                     id: id,
//                     action: "delete"
//                 },
//                 success: function(response) {
//                     if (response) {
//                         Swal.fire({
//                             title: "Success!",
//                             text: "Role deleted successfully.",
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
                url: '../controller/role_control.php',
                type: 'POST',
                data: {
                    id: id,
                    action: "edit"
                },
                success: function(response) {
                    // console.log('response---->',response);
                    // console.log(response);

                    $.each(response, function(key, value) {
                        $('#edit_id').val(value['role_id']);
                        $('#edit_name').val(value['role_name']);
                    });
                    $("#edit_role").modal('show');
                }
            });
        });
    }
</script>

<?php include("../includes/footer.php"); ?>
<?php else : ?>
<?php
    header("location: 404.php");
    ?>

<?php endif; ?>
