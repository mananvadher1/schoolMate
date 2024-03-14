<?php include("../controller/notice_control.php"); ?>
<?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) : ?>
<!-- edit notice modal  -->
<div class="modal" id="edit_notice" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="my-4" action="notice.php" method="post" enctype="multipart/form-data">
          <input type="hidden" class="form-control" id="edit_id" name="edit_id">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="edit_title" name="edit_title" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="edit_desc" name="edit_desc" rows="3"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update Notice</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="card card-secondary">
  <div class="card-header">
    <div class="row">
      <div class="col">
        <h3 class="card-title my-2">Notice</h3>
      </div>
      <div class="col-auto">
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
          aria-controls="collapseExample">Add Now</a>
      </div>
    </div>
  </div>
  <div class="card-body px-4 p-0">
    <div class="collapse mt-3" id="collapseExample">

      <!-- <form class="my-4" action="manage_user.php" method="post" enctype="multipart/form-data"> -->
      <form class="my-4" action="notice.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="notice_title" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="notice_desc" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Notice</button>
      </form>
    </div>
  </div>
</div>

<!-- data table -->
<div class="container my-4">

  <!-- arrange data into table format -->
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th scope="col">S_No</th>
        <th scope="col">Title</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- php to fetch data from the databse -->
      <?php
      $sql = "SELECT * FROM `notices`";
      $result = mysqli_query($conn, $sql);
      $sno = 0;
      while ($row = mysqli_fetch_array($result)) {
        $sno = $sno + 1;
        echo "  <tr id='" . $row['notice_id'] . "'>
                <th scope='row'>" . $sno . "</th>
                <td>" . $row["notice_title"] . "</td>
                <td><button onClick='editClick(" . $row['notice_id'] . ")' class='edit btn btn-sm btn-success'>Edit</button>
                <button onClick='deleteClick(" . $row['notice_id'] . ")' class='delete btn btn-sm btn-danger'>Delete</button>
                </td>
              </tr>";
      }
      ?>
    </tbody>
  </table>

</div>

<?php endif; ?>
<h1 class="text-primary text-center my-3"><b>Notice Board</b></h1>
<!-- notice cards -->
<?php
$sno = 0;
echo '<div class="row justify-content-center">';
while ($row = mysqli_fetch_array($cardresult)) {
  $sno = $sno + 1;
  echo '<div class="col-md-4 mx-3 card text-white" style="max-width: 48rem;" id="c' . $row['notice_id'] . '">
  <div class="card-header bg-dark">' . $row["notice_title"] . '</div>
  <div class="card-body bg-primary">
    <p class="card-text">' . $row["notice_desc"] . '</p>
  </div>
</div>';
}
echo '</div>';
?>


<hr>



<script>
  function deleteClick(id) {
    $(document).ready(function () {
      // console.log('hii')
      $.ajax({
        url: '../controller/notice_control.php',
        type: 'POST',
        data: {
          //get value
          id: id,
          action: "delete"
        },
        success: function (response) {
          console.log('response---->', response);
          //response is output of the action file
          if (response == 1) {
            // alert("Deleted role_id: " + id + " successfully");
            confirm("Are you sure you want to delete the record?");
            document.getElementById(id).style.display = "none";
            document.getElementById('c' + id).style.display = "none";
          } else if (response == 0) {
            alert("Data Can't be deleted");
          }
        }
      });
    });
  }

  function editClick(id) {
    $(document).ready(function () {
      // console.log('hii')
      $.ajax({
        url: '../controller/notice_control.php',
        type: 'POST',
        data: {
          id: id,
          action: "edit"
        },
        success: function (response) {
          console.log('response---->', response);
          // console.log(response);

          $.each(response, function (key, value) {
            $('#edit_id').val(value['notice_id']);
            $('#edit_title').val(value['notice_title']);
            $('#edit_desc').val(value['notice_desc']);
          });
          $("#edit_notice").modal('show');
        }
      });
    });
  }
</script>


<?php include("../includes/footer.php"); ?>
<!-- <div class="jumbotron jumbotron-fluid py-2 text-blue">
              <div class="container">
                <h3 class="display-6">' . $row["notice_title"] . '</h3>
                <p class="lead">'. $row["notice_desc"] .'</p>
              </div>
            </div> -->