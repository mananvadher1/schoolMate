<?php
include("../controller/fees_control.php");
?>
<!-- edit modal -->
<div class="modal" id="edit_fees" tabindex="-1" role="dialog">
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
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="edit_class_id">Class:</label>
                        <select class="form-control" name="edit_class_id" id="edit_class_id" required>
                            <?php
                            while ($class_dropdowm = mysqli_fetch_assoc($class_dropdown)) {
                                echo '  <option value="' . $class_dropdowm['class_id'] . '">' . $class_dropdowm['class_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6  ">
                        <label for="tuition">Fees Type:</label>
                        <select name="edit_fees_type" id="edit_fees_type">
                            <option value="Annual">Annual Fees</option>
                            <option value="Examination">Examination Fees</option>
                            <option value="Application">Application Fees</option>
                            <option value="Material">Material Fees</option>
                            <option value="Transportation">Transportation Fees</option>
                            <option value="Uniform">Uniform Fees</option>
                            <option value="Technology">Technology Fees</option>
                        </select>

                    </div>
                    <div class="form-group col-md-6">
                    <label for="fees">Rs:</label>
                    <input type="text" class="form-control" name="fees" id="fees" required>
                </div>
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
            <form class="m-4" action="fees.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="class_id">Class:</label>
                        <select class="form-control" name="class_id" id="class_id" required>
                            <?php
                            while ($class_dropdowm = mysqli_fetch_assoc($class_dropdown)) {
                                echo '  <option value="' . $class_dropdowm['class_id'] . '">' . $class_dropdowm['class_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6 mt-4 ">
                        <label for="tuition">Fees Type:</label>
                        <select name="fees_type" id="fees_type">
                            <option value="Annual">Annual Fees</option>
                            <option value="Examination">Examination Fees</option>
                            <option value="Application">Application Fees</option>
                            <option value="Material">Material Fees</option>
                            <option value="Transportation">Transportation Fees</option>
                            <option value="Uniform">Uniform Fees</option>
                            <option value="Technology">Technology Fees</option>
                        </select>

                    </div>
                </div>


                <div class="form-group col-md-6">
                    <label for="fees">Rs:</label>
                    <input type="text" class="form-control" name="fees" id="fees" required>
                </div>


                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <h1 class="text-center">
        <strong>Fees Details</strong>
    </h1>
    <div class="cards my-3">
        <div class="row">
            <?php
            $counter = 1;
            while ($row = mysqli_fetch_assoc($result)) {
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
                            <div><button onClick="$(\'#edit_fees\').modal(\'show\')"class="edit-button btn btn-sm btn-light" >Edit</button> 
                            <button  class="delete btn btn-sm btn-danger">Delete</button></div>
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

<?php include("../includes/footer.php"); ?>