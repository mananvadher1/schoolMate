<?php include("../controller/gallery_control.php"); ?>
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
                            <label for="profile_img">Profile Image:</label>
                            <input type="file" class="form-control-file" name="profile_img" id="profile_img">
                        </div>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="../dist/img/gallery_image/7.avif" data-toggle="lightbox" data-title="sample 7 - white">
                        <img src="../dist/img/gallery_image/7.avif" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                      <a href="../dist/img/gallery_image/8.avif" data-toggle="lightbox" data-title="sample 8 - black">
                        <img src="../dist/img/gallery_image/8.avif" class="img-fluid mb-2" alt="black sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                      <a href="../dist/img/gallery_image/9.avif" data-toggle="lightbox" data-title="sample 9 - red">
                        <img src="../dist/img/gallery_image/9.avif" class="img-fluid mb-2" alt="red sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="../dist/img/gallery_image/10.avif" data-toggle="lightbox" data-title="sample 10 - white">
                        <img src="../dist/img/gallery_image/10.avif" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="../dist/img/gallery_image/11.avif" data-toggle="lightbox" data-title="sample 11 - white">
                        <img src="../dist/img/gallery_image/11.avif" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                      <a href="../dist/img/gallery_image/12.avif" data-toggle="lightbox" data-title="sample 12 - black">
                        <img src="../dist/img/gallery_image/12.avif" class="img-fluid mb-2" alt="black sample"/>
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Events</h4>
              </div>
              <!-- <div class="mb-4">
                  <div class="filter-container p-0 row">
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="../dist/img/gallery_image/1.avif" data-toggle="lightbox" data-title="sample 1 - white">
                        <img src="../dist/img/gallery_image/1.avif" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                      <a href="../dist/img/gallery_image/2.avif" data-toggle="lightbox" data-title="sample 2 - black">
                        <img src="../dist/img/gallery_image/2.avif" class="img-fluid mb-2" alt="black sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                      <a href="../dist/img/gallery_image/3.avif" data-toggle="lightbox" data-title="sample 3 - red">
                        <img src="../dist/img/gallery_image/3.avif" class="img-fluid mb-2" alt="red sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                      <a href="../dist/img/gallery_image/4.avif" data-toggle="lightbox" data-title="sample 4 - red">
                        <img src="../dist/img/gallery_image/4.avif" class="img-fluid mb-2" alt="red sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                      <a href="../dist/img/gallery_image/5.avif" data-toggle="lightbox" data-title="sample 5 - black">
                        <img src="../dist/img/gallery_image/5.avif" class="img-fluid mb-2" alt="black sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="../dist/img/gallery_image/6.avif" data-toggle="lightbox" data-title="sample 6 - white">
                        <img src="../dist/img/gallery_image/6.avif" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="../dist/img/gallery_image/7.avif" data-toggle="lightbox" data-title="sample 7 - white">
                        <img src="../dist/img/gallery_image/7.avif" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                      <a href="../dist/img/gallery_image/8.avif" data-toggle="lightbox" data-title="sample 8 - black">
                        <img src="../dist/img/gallery_image/8.avif" class="img-fluid mb-2" alt="black sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                      <a href="../dist/img/gallery_image/9.avif" data-toggle="lightbox" data-title="sample 9 - red">
                        <img src="../dist/img/gallery_image/9.avif" class="img-fluid mb-2" alt="red sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="../dist/img/gallery_image/10.avif" data-toggle="lightbox" data-title="sample 10 - white">
                        <img src="../dist/img/gallery_image/10.avif" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                      <a href="../dist/img/gallery_image/11.avif" data-toggle="lightbox" data-title="sample 11 - white">
                        <img src="../dist/img/gallery_image/11.avif" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>
                    <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                      <a href="../dist/img/gallery_image/12.avif" data-toggle="lightbox" data-title="sample 12 - black">
                        <img src="../dist/img/gallery_image/12.avif" class="img-fluid mb-2" alt="black sample"/>
                      </a>
                    </div>
                  </div>
                </div> -->
                <div class="slideshow-container">
                <div class="mySlides fade">
                  <div class="numbertext">1 / 3</div>
                  <img src="../dist/img/gallery_image/12.avif" style="max-width:100%; max-height:100%" alt="sample image">
                  <div class="text">Caption Text</div>
                </div>


<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="../dist/img/gallery_image/8.avif" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="../dist/img/gallery_image/8.avif" style="width:100%">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
  </div>
</div>




<script>
  $(document).ready(function() {
    $('.slider').slick({
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
            slidesToShow: 2
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