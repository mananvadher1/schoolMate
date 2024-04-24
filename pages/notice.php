<?php include("../controller/notice_control.php"); ?>
<style>
  .containertb {
    max-width: 100%;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
    color: #333;
  }

  .notice {
    margin-bottom: 20px;
    padding: 20px;
    background-color: #f9f9f9;
    border-left: 4px solid #007bff;
  }

  .notice h2 {
    margin-top: 0;
    color: #007bff;
  }

  .notice p {
    margin-bottom: 0;
  }
</style>

<?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) : ?>

  <!-- edit notice modal  -->
  <div class="modal" id="edit_notice" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Notice</h5>
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

  <!-- add notice -->
  <div class="card card-secondary">
    <div class="card-header">
      <div class="row">
        <div class="col">
          <h3 class="card-title my-2">Notice</h3>
        </div>
        <div class="col-auto">
          <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Add Now</a>
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
  <div class="content">
    <div class="container-fluid">

      <!-- arrange data into table format -->
      <table class="table" id="myTable" width="100%">
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
  </div>

<?php endif; ?>

<?php if ($_SESSION['role_id'] == 3) : ?>
  <div class="containertb">
    <h1><b>Notice Board</b></h1>
    <?php
    while ($row = mysqli_fetch_array($cardresult)) {
      echo ' <div class="notice">
              <h2>' . $row["notice_title"] . '</h2>
              <p>' . $row["notice_desc"] . '</p>
            </div>';
    }
    ?>
  </div>
<?php endif; ?>



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
          url: '../controller/notice_control.php',
          type: 'POST',
          data: {
            id: id,
            action: "delete"
          },
          success: function(response) {
            if (response) {
              Swal.fire({
                title: "Success!",
                text: "Notice deleted successfully.",
                icon: "success",
                confirmButtonColor: '#3085d6'
              }).then(() => {
                // Reload or update the page after deletion
                // location.reload();
                // Optional: Hide the deleted row without refreshing the page
                $("#" + id).hide();
              });
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
        url: '../controller/notice_control.php',
        type: 'POST',
        data: {
          id: id,
          action: "edit"
        },
        success: function(response) {
          console.log('response---->', response);
          // console.log(response);

          $.each(response, function(key, value) {
            $('#edit_id').val(value['notice_id']);
            $('#edit_title').val(value['notice_title']);
            $('#edit_desc').val(value['notice_desc']);
          });
          $("#edit_notice").modal('show');
        }
      });
    });
  }
  $('#notice-link').addClass('active');
</script>
<?php include("../includes/footer.php"); ?>