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

         <li class="nav-item">
           <a id="dashboard-link" href="dashboard.php" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>

         <?php if ($_SESSION['role_id'] == 1) : ?>
           <li class="nav-item">
             <a id="manage-role-link" href="../pages/manage_role.php" class="nav-link">
               <i class="nav-icon fa fa-user" aria-hidden="true"></i>
               <p>
                 Manage Role
               </p>
             </a>
           </li>
         <?php endif; ?>
         <?php if ($_SESSION['role_id'] != 3) : ?>
           <li class="nav-item">
             <a id="manage-users-link" href="../pages/manage_user.php" class="nav-link">
               <i class="nav-icon fa fa-users" aria-hidden="true"></i>
               <p>
                 Manage Users
               </p>
             </a>
           </li>
         <?php endif; ?>
         <?php if ($_SESSION['role_id'] == 2) : ?>
           <li class="nav-item">
             <a id="manage-exam-link" href="../pages/manage_exam.php" class="nav-link">
               <i class="nav-icon fa fa-book" aria-hidden="true"></i>
               <p>
                 Manage Exam
               </p>
             </a>
           </li>
         <?php endif; ?>

         <?php if ($_SESSION['role_id'] == 1) : ?>
           <li class="nav-item">
             <a id="manage-transport-link" class="nav-link">
               <i class="nav-icon fa fa-bus" aria-hidden="true"></i>
               <p>
                 Manage Transport
               </p>
               <i class=" nav-icon right fas fa-angle-left"></i>
             </a>
             <ul class="nav nav-treeview" style="display: none;">
               <li class="nav-item">
                 <a id="vehical-link" href="../pages/vehical.php" class="nav-link">
                   <i class=" nav-icon fas fa-angle-right"></i>
                   <p>Vehical</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a id="area-link" href="../pages/area.php" class="nav-link">
                   <i class=" nav-icon fas fa-angle-right"></i>
                   <p>Area</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a id="driver-link" href="../pages/driver.php" class="nav-link">
                   <i class=" nav-icon fas fa-angle-right"></i>
                   <p>Driver</p>
                 </a>
               </li>
             </ul>
           </li>
         <?php endif; ?>

         <!-- / -->
         <li class="nav-item">
           <a id="notice-link" href="notice.php" class="nav-link">
             <i class="nav-icon fas fa-bullhorn"></i>
             <p>
               Notice
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a id="gallery-link" href="../pages/gallery.php" class="nav-link">
             <i class="nav-icon far fa-image"></i>
             <p>
               Gallery
             </p>
           </a>
         </li>
         <?php if ($_SESSION['role_id'] == 2) : ?>
           <li class="nav-item">
             <a id="attendence-link" href="" class="nav-link">
               <i class="nav-icon fa fa-clipboard"></i>
               <p>
                 Attendence
               </p>
               <i class=" nav-icon right fas fa-angle-left"></i>
             </a>
             <ul class="nav nav-treeview" style="display: none;">
               <li class="nav-item">
                 <a id="take-attendence-link" href="../pages/attendance.php" class="nav-link">
                   <i class=" nav-icon fas fa-angle-right"></i>
                   <p>Take Attendence</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a id="view-attendence-link" href="../pages/teacher_attendence.php" class="nav-link">
                   <i class=" nav-icon fas fa-angle-right"></i>
                   <p>View Attendence</p>
                 </a>
               </li>
             </ul>
           </li>
         <?php elseif ($_SESSION['role_id'] == 1) : ?>
           <li class="nav-item">
             <a id="attendence-link" href="../pages/teacher_attendence.php" class="nav-link">
               <i class="nav-icon fa fa-clipboard"></i>
               <p>
                 Attendence
               </p>
             </a>
           </li>
         <?php endif; ?>

         <li class="nav-item">
           <a id="class-link" href="<?php
                                    if ($_SESSION['role_id'] != 3) {
                                      echo "../pages/class.php";
                                    } else {
                                      echo "../pages/show_class.php?cid=" . $_SESSION['class_id'];
                                    }
                                    ?>" class="nav-link">
             <i class="nav-icon fa fa-users"></i>
             <p>
               Class
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a id="subject-link" href="../pages/subject.php" class="nav-link">
             <i class="nav-icon fa fa-book"></i>
             <p>
               Subjects
             </p>
           </a>
         </li>

         <?php if ($_SESSION['role_id'] == 3) : ?>
           <li class="nav-item">
             <a id="exam-link" href="../pages/exam.php" class="nav-link">
               <i class="nav-icon fa fa-id-badge"></i>
               <p>
                 Exam
               </p>
             </a>
           </li>
         <?php endif; ?>

         <?php if ($_SESSION['role_id'] != 2) : ?>
           <li class="nav-item">
             <a id="fees-link" href="../pages/fees.php" class="nav-link">
               <i class="nav-icon fa fa-credit-card" aria-hidden="true"></i>
               <p>
                 Fees
               </p>
             </a>
           </li>
         <?php endif; ?>

         <li class="nav-item">
           <a id="student-transport-link" href="../pages/student_transport.php" class="nav-link">
             <i class="nav-icon fa fa-bus" aria-hidden="true"></i>
             <p>
               Transport
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a id="calendar-link" href="../pages/calendar.php" class="nav-link">
             <i class="nav-icon fa fa-calendar"></i>
             <p>
               Calendar
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a id="settings-link" href="settings.php" class="nav-link">
             <i class="nav-icon  fa fa-cogs" aria-hidden="true"></i>
             <p>
               Settings
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>
 <script>
   $('.nav-link').removeClass('active');
 </script>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">