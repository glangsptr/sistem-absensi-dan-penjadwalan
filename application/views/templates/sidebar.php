<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Dropdown - User Information -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                <span class="ml-2"><?=$username;?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="<?=base_url('login/logout');?>" class="dropdown-item" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>



  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 text">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light" >Admin</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
                <a href="<?= base_url('Dashboard')?>" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="<?= base_url('Siswa')?>" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Siswa</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="<?= base_url('Guru')?>" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Guru</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="<?= base_url('Kelas')?>" class="nav-link">
                  <i class="nav-icon fas fa-house-user"></i>
                  <p>Kelas</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="<?= base_url('Mapel')?>" class="nav-link">
                  <i class="nav-icon fas fa-sticky-note"></i>
                  <p>Mata Pelajaran</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="<?= base_url('Jadwal')?>" class="nav-link">
                  <i class="nav-icon fas fa-calendar-alt"></i>
                  <p>Atur Jadwal</p>
                </a>
          </li>
          <li class="nav-item">
                <a href="<?= base_url('Absensi')?>" class="nav-link">
                  <i class="nav-icon fas fa-folder"></i>
                  <p>Rekap Absensi</p>
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
