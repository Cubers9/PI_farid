
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/assets/img/apple-icon.png">
  <link rel="shortcut icon" href="assets/images/logobar99.png" type="image/x-icon" />
  <title>
    Nawa lens | Masuuk
  </title>
  <!--     Fonts and icons     -->

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->

  <link href="assets/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />
</head>

<body class="bg-gray-200">
 
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('assets/images/bggas.jpg');">
      
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-secondary shadow-dark border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Masuk</h4>
                </div>
              </div>

              <div class="card-body">
                <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo '<div class="alert alert-warning" role="alert" style="color:white;">
                        Periksa kembali password Anda!
                      </div>';
            }
            else if($_GET['pesan'] == "logout"){
                echo '<div class="alert alert-success" role="alert" style="color:white;">
                        Terimakasih sudah masuk!
                      </div>';
            }
            else if($_GET['pesan'] == "belum_login"){
                echo '<div class="alert alert-danger" role="alert" style="color:white;">
                        Tolong isi username atau password terlebih dahulu!
                      </div>';
            }
        }
    ?>
                <form role="form" class="text-start" method="POST" action="config/cek_login.php">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Ingat saya</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">Masuk</button>
                    <a href="index.php" class="btn bg-gradient-info w-100 my-4 mb-2">Beranda</a>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Belum punya akun?
                    <a href="register.php" class="text-primary text-gradient font-weight-bold">Daftar</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                All Rights Reserved. &copy; 
                  <script>
                    document.write(new Date().getFullYear())
                  </script>
                Nawa lens Designed by parid 
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="assets/assets/js/core/popper.min.js"></script>
  <script src="assets/assets/js/core/bootstrap.min.js"></script>
  <script src="assets/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>