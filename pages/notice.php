<?php include("../controller/notice_control.php"); ?>

<div class="card card-secondary">
  <div class="card-header">
    <div class="row">
      <div class="col">
        <h3 class="card-title my-2">Add Notice</h3>
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
        <th scope="col">Description</th>
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
        echo "  <tr>
                <th scope='row'>" . $sno . "</th>
                <td>" . $row["notice_title"] . "</td>
                <td>" . $row["notice_desc"] . "</td>
                <td><button class='edit btn btn-sm btn-success' id=" . $row['notice_id'] . ">Edit</button> <button class='delete btn btn-sm btn-danger' id=d" . $row['notice_id'] . ">Delete</button>
              </tr>";
      }
      ?>
    </tbody>
  </table>

</div>

<h1 class="text-primary text-center my-3"><b>Notice Board</b></h1>
<!-- notice cards -->
<?php
$sql = "SELECT * FROM `notices`";
$result = mysqli_query($conn, $sql);
$sno = 0;
echo '<div class="row">';
while ($row = mysqli_fetch_array($result)) {
  $sno = $sno + 1;
  echo '<div class="col-md-4 mx-3 card text-white" style="max-width: 18rem;">
  <div class="card-header bg-dark">' . $row["notice_title"] . '</div>
  <div class="card-body bg-primary">
    <p class="card-text">'. $row["notice_desc"] .'</p>
  </div>
</div>';
}
echo '</div>';
?>


<hr>

<?php include("../includes/footer.php"); ?>
<!-- <div class="jumbotron jumbotron-fluid py-2 text-blue">
              <div class="container">
                <h3 class="display-6">' . $row["notice_title"] . '</h3>
                <p class="lead">'. $row["notice_desc"] .'</p>
              </div>
            </div> -->