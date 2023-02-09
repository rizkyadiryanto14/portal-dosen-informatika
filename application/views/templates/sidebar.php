   <!-- Page Wrapper -->
   <div id="wrapper">

       <!-- Sidebar -->
       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

           <!-- Sidebar - Brand -->
           <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Admin/Dashboard') ?>">
               <div class="sidebar-brand-icon">
                   <img src="<?= base_url('assets/img/UTS.png') ?>" width="60" alt="uts">
               </div>
               <div class="sidebar-brand-text mx-3">Informatika</div>
           </a>

           <!-- Divider -->
           <hr class="sidebar-divider my-0">

           <!-- Nav Item - Dashboard -->
           <li class="nav-item active">
               <a class="nav-link" href="<?= base_url('Admin/Dashboard') ?>">
                   <i class="fas fa-fw fa-tachometer-alt"></i>
                   <span>Dashboard</span></a>
           </li>

           <!-- Divider -->
           <hr class="sidebar-divider">

           <!-- Heading -->
           <div class="sidebar-heading">
               Admin
           </div>

           <!-- Nav Item - Pages Collapse Menu -->
           <li class="nav-item">
               <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                   <i class="fas fa-fw fa-users"></i>
                   <span>User</span>
               </a>
               <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                   <div class="bg-white py-2 collapse-inner rounded">
                       <h6 class="collapse-header">Users:</h6>
                       <a class="collapse-item" href="<?= base_url('dosen') ?>">Dosen</a>
                       <a class="collapse-item" href="#">Mahasiswa</a>
                   </div>
               </div>
           </li>

           <li class="nav-item">
               <a class="nav-link" href="<?= base_url('admin/bkd') ?>">
                   <i class="fas fa-fw fa-chart-area"></i>
                   <span>BKD</span></a>
           </li>

           <li class="nav-item">
               <a class="nav-link" href="<?= base_url('admin/rps') ?>">
                   <i class="fas fa-fw fa-chart-area"></i>
                   <span>RPS</span></a>
           </li>

           <!-- Divider -->
           <hr class="sidebar-divider d-none d-md-block">

           <!-- Sidebar Toggler (Sidebar) -->
           <div class="text-center d-none d-md-inline">
               <button class="rounded-circle border-0" id="sidebarToggle"></button>
           </div>

       </ul>
       <!-- End of Sidebar -->