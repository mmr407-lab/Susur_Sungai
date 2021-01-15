<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Cari" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" class="nav-link nav-link-lg nav-link-user">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url('assets/assets_admin/') ?>/assets/img/stisla-fill.svg" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $this->session->userdata('nama_users') ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Menu Setting</div>
              <a href="<?php echo base_url('auth/ganti_password') ?>" class="dropdown-item has-icon">
                <i class="fas fa-lock"></i> Ganti Password
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">App Susur Sungai</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SS</a>
          </div>
          <ul class="sidebar-menu">
             <li class="menu-header">Dashboard</li>
              <li><a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
              <li class="menu-header">Data Aplikasi</li>
              <li><a class="nav-link" href="<?php echo base_url('admin/hak_akses') ?>"><i class="fas fa-lock"></i> <span>Hak Akses</span></a></li>
              <li><a class="nav-link" href="<?php echo base_url('admin/data_users') ?>"><i class="fas fa-users"></i> <span>Data Users</span></a></li>
              <li><a class="nav-link" href="<?php echo base_url('admin/data_perahu') ?>"><i class="fas fa-ship"></i> <span>Data Perahu</span></a></li>
              <li><a class="nav-link" href="<?php echo base_url('admin/Data_wisata') ?>"><i class="fas fa-pencil-ruler"></i> <span>Data Wisata</span></a></li>
              <li class="menu-header">Transaksi</li>
              <li><a class="nav-link" href="<?php echo base_url('admin/transaksi') ?>"><i class="fas fa-random"></i> <span>Transaksi</span></a></li>
              <li><a class="nav-link" href="<?php echo base_url('admin/laporan') ?>"><i class="fas fa-clipboard-list"></i> <span>Laporan</span></a></li>
            </ul>
        </aside>
      </div>