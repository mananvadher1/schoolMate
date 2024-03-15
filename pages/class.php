<?php include("../controller/class_control.php"); ?>

<!-- add class -->
<section class="content">
    <div class="container-fluid">
        <div class="card m-4">
            <div class="card-body" id="form-container">
                <form action="" id="student-registration" method="post">
                    <fieldset class="border border-secondary p-3 form-group">
                        <legend class="d-inline w-auto h6">Add Section</legend>
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="addclass">Class</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <?php
                                        foreach ($data as $row) {
                                            $name = $row['class_name'];
                                            echo '<option value="1">' . $name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="addclass">Section</label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result2)) {
                                            $name = $row['sec_name'];
                                            echo '<option value="1">' . $name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            
                        </div>
                        <button name="submit" class="btn btn-primary">
                            Submit
                        </button>

            </div>
            </fieldset>
            </form>
</section>


<div class="container">
    <h2 class="text-center my-4"><b>My Class</b></h2>
    <div class="row mb-4">
        <?php
        // Loop through the fetched data to display small boxes
        foreach ($data as $row) {
            $sno = $row['class_id'];
            $name = $row['class_name'];
            $sec_name = $row['sec_name'];
            if ($sno % 2 == 0) {
                echo '<div class="col-lg-3 col-2">
                        <div class="small-box bg-red">
                        <div class="inner">
                            <h3 class="py-1">' . $name . '</h3>
                            <p class="py-1">' . $sec_name . '</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-university"></i>
                        </div>
                        <a href="subject.php" class="small-box-footer">Subject List <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>';
            } else {
                echo '<div class="col-lg-3 col-2">
                        <div class="small-box bg-primary">
                        <div class="inner">
                        <h3 class="py-1">' . $name . '</h3>
                        <p class="py-1">' . $sec_name . '</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-university"></i>
                        </div>
                        <a href="subject.php" class="small-box-footer">Subject List <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>';
            }
        }
        ?>
    </div>
</div>




<?php include("../includes/footer.php"); ?>