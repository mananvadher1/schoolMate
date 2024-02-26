<?php 
include("../includes/db.php");
include("../includes/header.php"); 
include("../includes/sidebar.php");
?>

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
              <!-- <div class="card-body"> -->
                  <!-- <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a> -->
                    <!-- <div class="float-right"> -->
                      <!-- <select class="custom-select" style="width: auto;" data-sortOrder>
                        <option value="index"> Sort by Position </option>
                        <option value="sortData"> Sort by Custom Data </option>
                      </select> -->
                      <!-- <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                      </div> -->
                    <!-- </div> -->
                  <!-- </div> -->
                <!-- </div> -->
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
              <div class="mb-4">
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
      </div><!-- /.container-fluid -->
    </section>
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
