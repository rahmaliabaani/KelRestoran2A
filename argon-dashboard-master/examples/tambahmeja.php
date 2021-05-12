<?php 
require 'functions.php';

if (isset($_POST['tambahmeja'])) {
  if (tambahmeja($_POST) > 0) {
    echo "<script> document.location.href = 'meja.php';
    </script>";
  } else {
    echo "<script> document.location.href = 'beranda.php';
    </script>";
  }
  
}
?>
<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Tambah Meja</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- my css -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="beranda.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="menu.php">
                <i class="ni ni-collection text-primary"></i>
                <span class="nav-link-text">Menu Restaurant</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="meja.php">
                <i class="fas fa-chair text-primary"></i>
                <span class="nav-link-text">Meja</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="stok.php">
                <i class="ni ni-box-2 text-primary"></i>
                <span class="nav-link-text">Stok Bahan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="supplier.php">
                <i class="ni ni-delivery-fast text-primary"></i>
                <span class="nav-link-text">Supplier</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pegawai.php">
                <i class="ni ni-single-02 text-primary"></i>
                <span class="nav-link-text">Pegawai</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transaksi.php">
                <i class="ni ni-cart text-primary"></i>
                <span class="nav-link-text">Transaksi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pemasukan_pengeluaran.php">
                <i class="ni ni-bullet-list-67 text-primary"></i>
                <span class="nav-link-text">Pemasukan dan Pengeluaran</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#tables">
                <i class="ni ni-folder-17 text-primary"></i>
                <span class="nav-link-text">Laporan</span>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav nav-collapse">
                  <li class="nav-item">
                    <a href="laporanmenu.php" class="nav-link">
                      <span class="nav-link-text">Data Menu</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="laporanpegawai.php" class="nav-link">
                      <span class="nav-link-text">Data Pegawai</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="laporanstok.php" class="nav-link">
                      <span class="nav-link-text">Data Stok Bahan</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="laporansupplier.php" class="nav-link">
                      <span class="nav-link-text">Data Supplier</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="laporanpemasukan.php" class="nav-link">
                      <span class="nav-link-text">Data Pemasukan</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="laporanpengeluaran.php" class="nav-link">
                      <span class="nav-link-text">Data Pengeluaran</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="laporantransaksi.php" class="nav-link">
                      <span class="nav-link-text">Data Transaksi</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="laporanomset.php" class="nav-link">
                      <span class="nav-link-text">Data Omset</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-dark d-inline-block mb-0">Meja</h6>
            </div>
          </div>
          <!-- transaksi -->
            <div class="col-xl-10 order-xl-1 ml--3">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-10">
                      <h3 class="mb-0">Data Meja </h3>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="pl-lg-2">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="id_meja">ID Meja</label>
                            <input type="text" id="id_meja" name="id_meja" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label" for="status">Status</label>
                            <input type="text" id="status" name="status" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tambahmeja">Simpan</button>
                  </form>
                    <a href="meja.php" class="batal">
                      <button type="batal" class="btn btn-default">Batal</button>
                    </a>
                </div>
              </div>
            </div>
            <!-- akhir -->
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
    <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <!-- <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div> -->
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>