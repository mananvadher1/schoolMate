<?php 
include("../includes/db.php");

include("../includes/header.php");
  
include("../includes/sidebar.php");

if($_SERVER['REQUEST_METHOD']=='POST') {
  $role_name=$_POST["role_name"];
  $email=$_SESSION["email"];

  $sql = "INSERT INTO `roles` ( `role_name`, `created_by`, `created_dt`, `updated_by`, `updated_dt`) VALUES ( '$role_name', '$email', CURRENT_TIMESTAMP(), NULL, NULL);";

$result = mysqli_query($conn, $sql);

if ($result) {
  //echo "New record created successfully";
  $insert=true;
} 
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
// echo var_dump($_SESSION);
?>
<div class="card card-secondary ">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3 class="card-title my-2">Manage Roles</h3>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    Add Role
                </a>
            </div>
        </div>
    </div>
    <div >
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


<?php 
include("../includes/footer.php");
?>