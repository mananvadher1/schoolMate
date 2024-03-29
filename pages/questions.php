<?php include("../controller/question_control.php"); ?>

<!-- edit modal -->
<div class="modal fade" id="edit_question" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="questions.php?cid=<? echo $class_id?>&sname=<? echo $subject_name?>" method="post">
            <input type="hidden" class="form-control" id="edit_id" name="edit_id">

              <div class="form-group">
                <label for="edit_question">Question</label>
                <input type="text" id="edit_question" name="edit_question" placeholder="Write your question here..." required
                  class="form-control">
              </div>
              <div class="form-group">
                <label for="edit_mark">Mark</label>
                <input type="number" id="edit_mark" name="edit_mark" placeholder="Write mark of the question here..." required
                  class="form-control">
              </div>
              <div class="form-group">
                <label for="edit_optionA">Option A</label>
                <input type="text" id="edit_optionA" name="edit_optionA" placeholder="Option A" required class="form-control">
              </div>
              <div class="form-group">
                <label for="edit_optionB">Option B</label>
                <input type="text" id="edit_optionB" name="edit_optionB" placeholder="Option B" required class="form-control">
              </div>
              <div class="form-group">
                <label for="edit_optionC">Option C</label>
                <input type="text" id="edit_optionC" name="edit_optionC" placeholder="Option C" required class="form-control">
              </div>
              <div class="form-group">
                <label for="edit_optionD">Option D</label>
                <input type="text" id="edit_optionD" name="edit_optionD" placeholder="Option D" required class="form-control">
              </div>
              <div class="form-group">
                <label for="right_option">Right Answer</label>
                <input type="text" id="right_option" name="right_option" placeholder="right_option" required class="form-control">
              </div>

              <button name="submit" class="btn btn-primary float-right">
                Update Question
              </button>

            </form>
            </div>
        </div>
    </div>
</div>


<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">

      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><b>Manage Questions - Class <?echo $_GET["cid"]?> </b></h1>
        <h4 class="mt-2 text-dark">Subject: <?echo $_GET["sname"]?></h4>
      </div><!-- /.col -->

    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class='col-lg-8'>

        <!-- Info boxes -->
        <div class="card">
          <div class="card-header py-2">
            <h3 class="card-title">
              Questions
            </h3>
            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive bg-white">
              <table class="table" id="myTable">
                <thead>
                  <tr>
                    <th>Sno</th>
                    <th>Question</th>
                    <th>Mark</th>
                    <th>Option A</th>
                    <th>Option B</th>
                    <th>Option C</th>
                    <th>Option D</th>
                    <th>Right Answer</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody> 
                  <?php
                  $sno = 0;
                  while ($row = mysqli_fetch_assoc($result_fetch)) {
                    $sno = $sno + 1;
                    $question = $row['question'];
                    $mark = $row['mark'];
                    $optionA = $row['optionA'];
                    $optionB = $row['optionB'];
                    $optionC = $row['optionC'];
                    $optionD = $row['optionD'];
                    $right_option = $row['right_option'];
                    echo '<tr id=' . $row['ques_id'] . '>
                    <td>'.$sno.'</td>
                    <td>'.$question.'</td>
                    <td>'.$mark.'</td>
                    <td>'.$optionA.'</td>
                    <td>'.$optionB.'</td>
                    <td>'.$optionC.'</td>
                    <td>'.$optionD.'</td>
                    <td>'.$right_option.'</td>
                    <td><button onclick="editClick(' . $row['ques_id'] . ')" class="edit btn btn-sm btn-success">Edit</button><button onclick="deleteClick(' . $row['ques_id'] . ')" class="delete btn btn-sm btn-danger">Delete</button>
                    </td>
                  </tr>';
                  }
                  ?>
                  </toby>


              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <!-- Info boxes -->
        <div class="card">
          <div class="card-header py-2">
            <h3 class="card-title">
              Add New Question
            </h3>
          </div>
          <div class="card-body">
            <form action="questions.php?cid=<? echo $class_id?>&sname=<? echo $subject_name?>" method="post">
              <div class="form-group">
                <label for="question">Question</label>
                <input type="text" id="question" name="question" placeholder="Write your question here..." required
                  class="form-control">
              </div>
              <div class="form-group">
                <label for="mark">Mark</label>
                <input type="number" id="mark" name="mark" placeholder="Write mark of the question here..." required
                  class="form-control">
              </div>
              <div class="form-group">
                <label for="optionA">Option A</label>
                <input type="text" id="optionA" name="optionA" placeholder="Option A" required class="form-control">
              </div>
              <div class="form-group">
                <label for="optionB">Option B</label>
                <input type="text" id="optionB" name="optionB" placeholder="Option B" required class="form-control">
              </div>
              <div class="form-group">
                <label for="optionC">Option C</label>
                <input type="text" id="optionC" name="optionC" placeholder="Option C" required class="form-control">
              </div>
              <div class="form-group">
                <label for="optionD">Option D</label>
                <input type="text" id="optionD" name="optionD" placeholder="Option D" required class="form-control">
              </div>
              <div class="form-group">
                <label for="right_option">Right Answer</label>
                <input type="text" id="right_option" name="right_option" placeholder="Write Right Answer here..." required class="form-control">
              </div>

              <button name="submit" class="btn btn-primary float-right">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->

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
                url: '../controller/question_control.php',
                type: 'POST',
                data: {
                    id: id,
                    action: "delete"
                },
                success: function(response) {
                    if (response) {
                        Swal.fire({
                            title: "Success!",
                            text: "Question deleted successfully.",
                            icon: "success",
                            confirmButtonColor: '#3085d6'
                        }).then(() => {
                            // Reload or update the page after deletion
                            location.reload();
                        });
                        // Optional: Hide the deleted row without refreshing the page
                        $("#" + id).hide();
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
        console.log('hii')
        $.ajax({
            url: '../controller/question_control.php',
            type: 'POST',
            data: {
                id: id,
                action: "edit"
            },
            success: function(response) {
                // console.log('response---->',response);
                // console.log(response);
                // Use setTimeout to delay SweetAlert
                $.each(response, function(key, value) {
                    $('#edit_id').val(value['ques_id']);
                    //$('#edit_name').val(value['subject_name']);
                    $('#edit_question').val(value['question']);
                    $('#edit_mark').val(value['mark']);
                    $('#edit_optionA').val(value['optionA']);
                    $('#edit_optionB').val(value['optionB']);
                    $('#edit_optionC').val(value['optionC']);
                    $('#edit_optionD').val(value['optionD']);
                    $('#edit_right_option').val(value['right_option']);
                });
                $("#edit_question").modal('show');
            },

        });
    });
}
</script>



<?php include("../includes/footer.php"); ?>