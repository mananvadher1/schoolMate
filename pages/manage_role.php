<?php include("../controller/role_control.php"); ?>

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
                    <td><button class='edit-button btn btn-sm btn-success' >Edit</button> 
                    <button onClick='deleteClick(". $row_dt['role_id'] .")' class='delete btn btn-sm btn-danger'>Delete</button></td>
                </tr>";
            } ?>
        </tbody>
    </table>
</div>

<script>
function deleteClick(id){
    $(document).ready(function() {
        console.log('hii')
        $.ajax({
            //action
            url : '../controller/role_control.php',
            //method
            type : 'POST',
            // header:{
            //     contentType: "application/json",
            // },
            data : {
                //get value
                id: id,
                action : "delete"
            },
            success:function(response){
                // console.log('response---->',response);
                //response is output of the action file
                if(response){
                    alert("Deleted role_id: " + id + " successfully");
                    // $("#id").hide();
                    document.getElementById(id).style.display = "none";
                }
                else if(response == 0){
                    alert("Data Can't be deleted");
                }
            }
        });
    });
}
</script>

<?php include("../includes/footer.php"); ?>