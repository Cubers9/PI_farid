<?php 
session_start();
include "../config/koneksi.php";
         function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}
 if($_SESSION['rank']==""){
      header("location:../login.php?pesan=belum_login");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../images/logobar99.png">
  <title>
  Nawa Lens | Dashboard Admin
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-secondary" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0">
        <img src="../assets/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white"><?= $_SESSION['nama'];?></span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="w-auto  max-height-vh-200" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="dashboard.php?status-order-report">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="dashboard.php?product">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Produk</span>
          </a>
        </li>
       <li class="nav-item">
          <a class="nav-link text-white " href="dashboard.php?ship">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Pesanan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="dashboard.php?metode">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Metode Pembayaran</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Halaman Akun</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="dashboard.php?profile">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profil</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="dashboard.php?data-user">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Data Pelanggan</span>
          </a>
        </li>
      </ul>
    </div>

  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        </nav>

          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="../config/logout.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Keluar</span>
              </a>
            </li>
              </ul>
            </div>
          </nav>
       <main>
    <?php
                                    if (isset($_GET['product'])) {
                                        include "produk.php";
                                      }
                                      if (isset($_GET['detail-produk'])) {
                                        include "detail-produk.php";
                                      }
                                     if (isset($_GET['data-user'])) {
                                        include "user.php";
                                      }
                                      if (isset($_GET['detail-user'])) {
                                        include "detail-user.php";
                                      }
                                      if (isset($_GET['profile'])) {
                                        include "profile.php";
                                      }
                                        if (isset($_GET['status-order-report'])) {
                                        include "laporan.php";
                                      }
                                      if (isset($_GET['ship'])) {
                                        include "pesanan.php";
                                      }
                                        if (isset($_GET['metode'])) {
                                        include "account-bank.php";
                                      }
                                          if (isset($_GET['details'])) {
                                        include "detail-order.php";
                                      }
                                      if (isset($_GET['bank'])) {
                                        include "account-bank.php";
                                      }
                                        if (isset($_GET['input-accountbank'])) {
                                        include "detail-account.php";
                                      }
                                          
                                    ?>



       </main>



  <br>
  <br>
  <br>
  <br>

      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                All Rights Reserved. &copy; 
                  <script>
                    document.write(new Date().getFullYear())
                  </script>
                Nawa Lens Designed by FARID
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="../assets/assets/js/core/popper.min.js"></script>
  <script src="../assets/assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/assets/js/plugins/chartjs.min.js"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>