<?php include("../controller/class_control.php"); ?>
<?php if ($_SESSION['role_id'] != 3) : ?>
    <div class="content">
        <div class="container-fluid">
            <h2 class="text-center my-4"><b>Class List</b></h2>
            <div class="row">
                <?php
                // Loop through the fetched data to display small boxes
                foreach ($data as $row) {
                    $id = $row['class_id'];
                    $name = $row['class_name'];
                    if ($id % 2 == 0) {
                        echo '<div class="col-lg-3 col-2">
                        <div class="small-box bg-red">
                        <div class="inner">
                            <h3 class="py-1">' . $name . '</h3>
                            <p class="py-1"></p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-university"></i>
                        </div>
                        <a href="show_class.php?cid=' . $id . '" class="small-box-footer">Click Here<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>';
                    } else {
                        echo '<div class="col-lg-3 col-2">
                        <div class="small-box bg-primary">
                        <div class="inner">
                        <h3 class="py-1">' . $name . '</h3>
                        <p class="py-1"></p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-university"></i>
                        </div>
                        <a href="show_class.php?cid=' . $id . '" class="small-box-footer">Click Here<i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>



<script>
            $('#class-link').addClass('active');
</script>
    <?php include("../includes/footer.php"); ?>
<?php else : ?>
    <?php header("location: 404.php"); ?>
<?php endif; ?>