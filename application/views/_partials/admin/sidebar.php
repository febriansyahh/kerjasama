<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-4 pt-3">
    <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <div class="avatar-lg me-4">
          <img src="../../assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white"
            alt="Bonnie Green">
        </div>
        <div class="d-block">
          <h2 class="h5 mb-3">Hi, Jane</h2>
          <a href="../../pages/examples/sign-in.html" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>            
            Sign Out
          </a>
        </div>
      </div>
      <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
            aria-label="Toggle navigation">
            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </a>
      </div>
    </div>
    <ul class="nav flex-column pt-3 pt-md-0">
      <li class="nav-item">
        <a href="<?php echo site_url('admin/overview')?>" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon">
            <img src="<?php echo base_url('assets/img/umk.png');?>" height="20" width="20" alt="Volt Logo">
          </span>
          <span class="mt-1 ms-1 sidebar-text">Sistem Kerjasama</span>
        </a>
      </li>
      <li class="nav-item  active ">
        <a href="../../pages/dashboard/dashboard.html" class="nav-link">
         <!-- <i class="fas fa-home"></i> -->
         <span class="sidebar-icon">
         <i class="fas fa-home"></i>
         </span>
         <span class="sidebar-text"> Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <span
          class="nav-link  collapsed  d-flex justify-content-between align-items-center"
          data-bs-toggle="collapse" data-bs-target="#submenu-app">
          <span>
            <span class="sidebar-icon">
              <i class="fas fa-database"></i>
            </span> 
            <span class="sidebar-text">Master Data</span>
          </span>
          <span class="link-arrow">
            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          </span>
        </span>
        <div class="multi-level collapse "
          role="list" id="submenu-app" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item ">
              <li><a class="nav-link" href="../../pages/tables/bootstrap-tables.html">
                <span class="sidebar-text">Data Unit</span>
              </a></li>
            </li>
            <li class="nav-item ">
              <li><a class="nav-link" href="../../pages/tables/bootstrap-tables.html">
                <span class="sidebar-text">Data MoU</span>
              </a></li>
            </li>
            <li class="nav-item ">
              <li><a class="nav-link" href="../../pages/tables/bootstrap-tables.html">
                <span class="sidebar-text">Data Kerjasama</span>
              </a></li>
            </li>
            <li class="nav-item ">
              <li><a class="nav-link" href="../../pages/tables/bootstrap-tables.html">
                <span class="sidebar-text">Data IA</span>
              </a></li>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item ">
        <a href="../../pages/transactions.html" class="nav-link">
          <span class="sidebar-icon">
             <i class="fas fa-file"></i>
          </span>
          <span class="sidebar-text">Usulan Kerjasama</span>
        </a>
      </li>

      <li class="nav-item ">
        <a href="../../pages/transactions.html" class="nav-link">
          <span class="sidebar-icon">
             <i class="fas fa-file"></i>
          </span>
          <span class="sidebar-text">Ajuan IA</span>
        </a>
      </li>
      
      <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
      
      <li class="nav-item ">
        <a href="<?php echo site_url('admin/tingkatan')?>" class="nav-link">
          <span class="sidebar-icon">
          <i class="fas fa-layer-group"></i>
          </span>
          <span class="sidebar-text">Master Tingkatan</span>
        </a>
      </li>

      <li class="nav-item ">
        <a href="../../pages/transactions.html" class="nav-link">
          <span class="sidebar-icon">
          <i class="fas fa-users"></i>
          </span>
          <span class="sidebar-text">Data User</span>
        </a>
      </li>

      <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
      <li class="nav-item ">
        <a href="<?php echo site_url('home')?>" class="nav-link">
          <span class="sidebar-icon">
            <i class="fas fa-sign-out"></i>
          </span>
          <span class="sidebar-text">Logout</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="../../pages/upgrade-to-pro.html"
          class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro">
          <span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
          </span> 
          <span>Support by <b>UPT - PSI</b></span>
        </a>
      </li>
    </ul>
  </div>
</nav>