<?php include("../controller/question_control.php"); ?>

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
                  while ($row = mysqli_fetch_assoc($result_fetch)) {
                    $id = $row['ques_id'];
                    $question = $row['question'];
                    $mark = $row['mark'];
                    $optionA = $row['optionA'];
                    $optionB = $row['optionB'];
                    $optionC = $row['optionC'];
                    $optionD = $row['optionD'];
                    $right_option = $row['right_option'];
                    echo '<tr>
                    <td>'.$id.'</td>
                    <td>'.$question.'</td>
                    <td>'.$mark.'</td>
                    <td>'.$optionA.'</td>
                    <td>'.$optionB.'</td>
                    <td>'.$optionC.'</td>
                    <td>'.$optionD.'</td>
                    <td>'.$right_option.'</td>
                    <td><button class="edit btn btn-sm btn-success">Edit</button><button class="delete btn btn-sm btn-danger">Delete</button>
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
                <label for="title">Question</label>
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
                <label for="right_option">Right Option</label>
                <select name="right_option" id="right_option" required>
                  <option selected>Choose...</option>
                  <option value="Option A">Option A</option>
                  <option value="Option B">Option B</option>
                  <option value="Option C">Option C</option>
                  <option value="Option D">Option D</option>
                </select>
              </div>

              <button name="submit" class="btn btn-primary float-right">
                Submit
              </button>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->


<?php include("../includes/footer.php"); ?>