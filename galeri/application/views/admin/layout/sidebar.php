<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-10">
          <i class="fas fa-store-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Galeri Ajang Ambe</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- menu produk-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-folder"></i>
          <span>Produk</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('admin/produk') ?>">
              <i class="fa fa-table"></i>     Data Produk</a>
            <a class="collapse-item" href="<?php echo base_url('admin/kategori') ?>">
              <i class="fa fa-tags"></i>      Kategori Produk</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- menu admin -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/user') ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Admin Sistem</span></a>
      </li>

      <!--- Menu konfigurasi-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Konfigurasi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('admin/konfigurasi') ?>">
              <i class="fa fa-home"></i>     Konfigurasi Umum </a>
            <a class="collapse-item" href="<?php echo base_url('admin/konfigurasi/logo') ?>">
              <i class="fa fa-image"></i>      Konfigurasi Logo</a>
            <a class="collapse-item" href="<?php echo base_url('admin/konfigurasi/icon') ?>">
              <i class="fa fa-home"></i>      Konfigurasi Icon</a>
          </div>
        </div>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->