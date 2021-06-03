<?php 
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  // ambil username berdasarkan id
  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($hash === hash('sha256', $row['id_pegawai'], false)) {
    $_SESSION['username'] = $row['username'];
    header("Location: beranda.php");
    exit();
  }
}


// melakukan pengecekan apakah user sudah melakukan login jika sudah redirect ke halaman admin
if (isset($_SESSION['username'])) {
  header("Location: beranda.php");
  exit();
}

// login
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  // mencocokan username dan password
  if (mysqli_num_rows($cek_user) > 0) {
    $row = mysqli_fetch_assoc($cek_user);
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['hash'] = hash('sha256', $row['id_pegawai'], false);

      // jika remember me dicentang
      if (isset($_POST['remember'])) {
        setcookie('username', $row['username'], time() + 60 * 60 * 24);
        $hash = hash('sha256', $row['id_pegawai']);
        setcookie('hash', $hash, time() + 60 * 60 * 24);
      }
    
      if (hash('sha256', $row['id']) == $_SESSION['hash']) {
        header("Location: beranda.php");
        die();
      }
      header("Location: login.php");
      die();
    }
  }
  $error = true;
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
  <title>Login Restaurant</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="dashboard.html">
        <img src="../assets/img/brand/white.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.html">
                <img src="../assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="login.php" class="nav-link">
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="register.php" class="nav-link">
              <span class="nav-link-inner--text">Register</span>
            </a>
          </li>
        </ul> -->
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank" data-toggle="tooltip" data-original-title="Like us on Facebook">
              <i class="fab fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Instagram">
              <i class="fab fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Twitter">
              <i class="fab fa-twitter-square"></i>
              <span class="nav-link-inner--text d-lg-none">Twitter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://github.com/creativetimofficial" target="_blank" data-toggle="tooltip" data-original-title="Star us on Github">
              <i class="fab fa-github"></i>
              <span class="nav-link-inner--text d-lg-none">Github</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-default py-7 py-lg-8 pt-lg-5">
      <div class="container">
        <div class="header-body text-center">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Selamat Datang!</h1>
              <p class="text-lead text-white">Gunakan formulir luar biasa ini untuk masuk atau membuat akun baru di Restaurant secara gratis.</p>
            </div>
            <!-- kotak login -->
            <div class="container pb-5">
      		  <div class="row justify-content-center">
            	<div class="col-lg-5 col-md-7">
		          <div class="card bg-secondary border-0 mb-0">
		            <div class="card-body px-lg-5 py-lg-5">
		              <form action="" method="POST">
                    <?php if (isset($error)) { ?>
                      <div class="alert alert-danger alert-message" role="alert" >
                        Username atau Password salah!
                      </div>
                    <?php } ?>
		                <div class="form-group mb-3">
		                  <div class="input-group input-group-merge input-group-alternative">
		                    <div class="input-group-prepend">
		                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
		                    </div>
		                    <input class="form-control" name="username" placeholder="Username" type="text" autocomplete="off">
		                  </div>
		                </div>
		                <div class="form-group">
		                  <div class="input-group input-group-merge input-group-alternative">
		                    <div class="input-group-prepend">
		                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
		                    </div>
		                    <input class="form-control" name="password" placeholder="Password" type="password" autofocus>
		                  </div>
		                </div>
		                <div class="custom-control custom-control-alternative custom-checkbox">
		                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
		                  <label class="custom-control-label" for=" customCheckLogin">
		                    <span class="text-muted">Remember me</span>
		                  </label>
		                </div>
		                <div class="text-center">
		                  <button type="submit" class="btn btn-primary my-4" name="submit">Sign in</button>
		                </div>
		              </form>
		            </div>
		          </div>
		          <div class="row mt-3">
		            <div class="col-6">
		              <a href="#" class="text-light mr-5"><small>Lupa Password?</small></a>
		            </div>
		            <div class="col-6">
		              <a href="register.php" class="text-light mr--4"><small>Buat Akun Baru</small></a>
		            </div>
		          </div>
		        </div>
		      </div>
    		</div>
            <!-- beres login -->
          </div>
        </div>
      </div>
  	</div>
  </div>
  
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
  <!-- my js -->
  <script>
    $(".alert-message").alert();
    window.setTimeout(function() { $(".alert-message").alert('close'); }, 2000);
  </script>
</body>

</html>