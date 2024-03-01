<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminv/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Adminv/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="Adminv/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="Adminv/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
  <link rel="stylesheet" href="adminv/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-full">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
 
 <!-- Right navbar links -->
 <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <div class="container">
        <a href="" class="brand-link">
         <img src="bk.png" alt="#" class="brand-image img-circel elevation-3" style="opacity: .8"> 
          <span class="brand-text font-weight-light">Perpustakaan Digital</span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Ini Menu -->
      <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

         <li class="nav-item">
    <a href="dashboard.php?page=<?= $_SESSION['data']['Role'];?>" class="nav-link">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
          <a href="dashboard.php?page=databuku" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
            <p>
              Data Buku
            </p>
          </a>
        </li>
        <?php 
          if($_SESSION['data']['Role'] == 'admin' || $_SESSION['data']['Role'] == 'petugas'){ ?>
      <li class="nav-item">
          <a href="dashboard.php?page=kategoribuku" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
            <p>
              Kategori Buku
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="dashboard.php?page=peminjaman" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Peminjaman
            </p>
          </a>
        </li>
        <?php   }
        ?>

           <?php 
          if($_SESSION['data']['Role'] == 'user'){ ?>
              <li class="nav-item">
          <a href="dashboard.php?page=koleksi" class="nav-link">
            <i class="nav-icon fa fa-tag"></i>
            <p>
              History Peminjaman
            </p>
          </a>
        </li>
       <?php   }
        ?>

<li class="nav-item">
          <a href="dashboard.php?page=ulasanbuku" class="nav-link">
              <i class="nav-icon fa fa-share"></i>
            <p>
              Ulasan Buku
            </p>
          </a>
        </li>
        <?php 
         if($_SESSION['data']['Role'] == 'admin'){ ?>
<li class="nav-item">
          <a href="dashboard.php?page=petugas" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
            <p>
              Petugas
            </p>
          </a>
        </li>
        <?php   }
        ?>

        
    <li class="nav-item">
      <a href="index.php?page=logout" class="nav-link">
        <i class="fas fa-sign-out-alt"></i>
        <p>
          Logout
        </p>
      </a>
    </li>
  </ul>
</nav>
      <!-- /.Akhir Menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        