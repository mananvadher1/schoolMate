 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="../dist/img/logo.jpeg  " alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><em><span style="font-weight:bold">SchoolMate</span></em></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           <!-- pages with radio btn -->
           
           <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-users" aria-hidden="true"></i>
              <p>
                Manage
                <i class=" nav-icon right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
            <?php if ($_SESSION['role_id'] == 1): ?>
              <li class="nav-item">
                <a href="../pages/manage_role.php" class="nav-link">
                <i class=" nav-icon fas fa-angle-right"></i>
                  <p>Manage Role</p>
                </a>
              </li>
              <?php endif; ?>
              <?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id']==2) : ?>
              <li class="nav-item">
                <a href="../pages/manage_user.php" class="nav-link">
                <i class=" nav-icon fas fa-angle-right"></i>
                  <p>Manage User</p>
                </a>
              </li>
              <?php endif; ?>
              <li class="nav-item">
                <a href="../pages/manage_exam.php" class="nav-link">
                <i class=" nav-icon fas fa-angle-right"></i>
                  <p>Manage Exam</p>
                </a>
              </li>
            </ul>
          </li>
              
          <!-- / -->
          <li class="nav-item">
            <a href="notice.php" class="nav-link">
            <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Notice
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../pages/gallery.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-clipboard"></i>
              <p>
                Attendence
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../pages/class.php" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
              <p>
                Class
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="../pages/subject.php" class="nav-link">
            <i class="nav-icon fa fa-book"></i>
              <p>
                Subjects
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../pages/exam.php" class="nav-link">
            <i class="nav-icon fa fa-id-badge"></i>
              <p>
                Exam
              </p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-id-badge"></i>
              <p>
                Exam
                <i class=" nav-icon right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="../pages/manage_exam.php" class="nav-link">
                <i class=" nav-icon fas fa-angle-right"></i>
                  <p>Manage Exam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class=" nav-icon fas fa-angle-right"></i>
                  <p>Attend Exam</p>
                </a>
              </li>
            </ul>
          </li> -->

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Library
                <i class=" nav-icon right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="../index.html" class="nav-link">
                <i class=" nav-icon fas fa-angle-right"></i>
                  <p>Books</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-credit-card" aria-hidden="true"></i>
              <p>
                Fees
                <i class=" nav-icon right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="../index.html" class="nav-link">
                <i class=" nav-icon fas fa-angle-right"></i>
                  <p>Education fees</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../index2.html" class="nav-link">
                <i class=" nav-icon fas fa-angle-right"></i>
                  <p>Transportation fees</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-bus" aria-hidden="true"></i>
              <p>
                Transport
                <i class=" nav-icon right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="../pages/vehical.php" class="nav-link">
                <i class=" nav-icon fas fa-angle-right"></i>
                  <p>Vehical</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pages/area.php" class="nav-link">
                <i class=" nav-icon fas fa-angle-right"></i>
                  <p>Area</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pages/driver.php" class="nav-link">
                <i class=" nav-icon fas fa-angle-right"></i>
                  <p>Driver</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-calendar"></i>
              <p>
                Report
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../pages/calendar.php" class="nav-link">
            <i class="nav-icon fa fa-calendar"></i>
              <p>
                Calender
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-globe" aria-hidden="true"></i>
              <p>
                Map
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">           
            <i class="nav-icon  fa fa-cogs" aria-hidden="true"></i>
              <p>
                settings  
              </p>
            </a>
          </li>

          

          

           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">