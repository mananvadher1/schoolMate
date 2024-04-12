<?php include("../controller/gallery_control.php"); ?>

<style>
    .slider-container {
        max-width: 100%;
        overflow: hidden;
        /* Add overflow property */
        position: relative;
    }
</style>


<?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) : ?>
<div class="card card-secondary">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h3 class="card-title my-2">Gallery</h3>
            </div>
            <div class="col-auto">
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Add Image</a>
            </div>
        </div>
    </div>
    <div class="card-body px-4 p-0">
        <div class="collapse mt-3" id="collapseExample">
            <form class="my-4" action="gallery.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="profile_img"> Image:</label>
                        <input type="file" class="form-control-file" name="profile_img" id="profile_img">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="container">
    <div class="heading text-center my-4">
        <h1><b>Gallery</b></h1>
    </div>
<div class="container-fluid">
    <div class="row justify-content-center my-4">
        <div class="col-md-6 px-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Events</h4>
                </div>
                <div class="slider-container mb-3">
                    <div class="eventslider">
                        <?php foreach ($imageNames as $imageName) : ?>
                            <div>
                                <img src="../dist/img/gallery_image/<?php echo $imageName; ?>" alt="<?php echo $imageName; ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 px-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Academic</h4>
                </div>
                <div class="slider-container mb-3">
                    <div class="academicslider">
                        <?php foreach ($Academicimage as $Academicimage) : ?>
                            <div>
                                <img src="../dist/img/gallery_image/<?php echo $Academicimage; ?>" alt="<?php echo $Academicimage; ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function() {
        $('.eventslider').slick({
            // Slick Slider settings
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: true,
            dots: true,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
    
    $(document).ready(function() {
        $('.academicslider').slick({
            // Slick Slider settings
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: true,
            dots: true,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });
</script>


<?php include("../includes/footer.php"); ?>