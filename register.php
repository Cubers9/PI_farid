
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/assets/img/apple-icon.png">
  <link rel="shortcut icon" href="images/logobar.png" type="image/x-icon" />
  <title>
    Nawa Lens | Daftar
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

<body class="">
  
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('assets/assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Daftar</h4>
                  <p class="mb-0">Masukkan data Anda untuk mendaftar</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST" action="config/register.php">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nomor Telepon</label>
                      <input type="text" name="nohp" class="form-control" maxlength="14" onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="input-group input-group-outline mb-3" required>
                      <label class="form-label">Alamat</label>
                      <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="register" class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0">Daftar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Sudah punya akun?
                    <a href="login.php" class="text-primary text-gradient font-weight-bold">Masuk</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
  <script>
        function hanyaAngka(event) {
            var angka = (event.which) ? event.which : event.keyCode
            if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                return false;
            return true;
        }
    </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>