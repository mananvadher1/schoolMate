<?php 
include("../includes/db.php");
include("../includes/header.php"); 
include("../includes/sidebar.php");
?>
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>

<!-- <div class="wrapper"> -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ml-0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b>Gallery</b></h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Academic</h4>
              </div>
                <div>
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
                </div>

              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Events</h4>
              </div>
            
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
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

    <!-- /.content -->
    <?php include("../includes/footer.php"); ?>
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
  <!-- </aside> -->
  <!-- /.control-sidebar -->
<!-- </div> -->
