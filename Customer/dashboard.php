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

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Nawa lens | Beranda</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../assets/images/logobar99.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../assets/images/logobar99.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
	<script src="assets/js/modernizr.js"></script> <!-- Modernizr -->

</head>
<body id="page-top" class="politics_version">

   <!-- LOADER -->
<div id="preloader">
    <div class="loader-rd"></div>
    <div class="loader-rd"></div>
    <div class="loader-rd"></div>
</div><!-- end loader -->
<!-- END LOADER -->

<header class="header">
	<div class="burger">
		<div class="burger__patty"></div>
		<div class="burger__patty"></div>
		<div class="burger__patty"></div>
	</div>

	<nav class="menu">
    <div class="menu__brand">
        <a href="#">
        <div class="logo" style="background-color: rgb(249, 186, 31 ); padding: 200px; display: inline-block; border-radius: 8px;">
    <img class="img-fluid" src="../assets/images/logobar991.png" alt="" style="width: 500px; height: auto;" />
</div>


        </a>
    </div>
    <ul class="menu__list">
        <li class="menu__item"><a href="dashboard.php?utama" class="menu__link"><strong>Beranda</strong></a></li>
        <li class="menu__item"><a href="dashboard.php?galery" class="menu__link"><strong>Galeri</strong></a></li>
        <li class="menu__item"><a href="dashboard.php?status" class="menu__link"><strong>History Pesanan</strong></a></li>
        <li class="menu__item"><a href="dashboard.php?paket" class="menu__link"><strong>Daftar Paket</strong></a></li>
        <li class="menu__item"><a href="dashboard.php?keranjang" class="menu__link"><strong>Keranjang</strong></a></li>
        <li class="menu__item"><a href="dashboard.php?about" class="menu__link"><strong>Cara Pemesanan</strong></a></li>
        <li class="menu__item"><a href="dashboard.php?testimoni" class="menu__link"><strong>Testimoni</strong></a></li>
        <li class="menu__item"><a href="dashboard.php?profile" class="menu__link"><strong>Profile</strong></a></li>
        <li class="menu__item"><a href="../config/logout.php" class="menu__link"><strong>Keluar</strong></a></li>
    </ul>
</nav>

</header>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container-fluid">
    <a class="navbar-brand js-scroll-trigger" href="">
            <!-- Logo Image with Inline Styles -->
            <img src="../assets/images/logobar991.png" alt="Logo" style="height: 40px; margin-right: 10px; vertical-align: middle;">
            <!-- Text -->
            <h1 style="display: inline; vertical-align: middle;"><strong>Nawa Lens</strong></h1>
        </a>
      <div class="container">
          <a class="navbar-brand js-scroll-triger float-right pr-5">
              <h2><strong>Hallo <?=$_SESSION['nama']?></strong></h2>
          </a>
      </div>
    </div>

</nav>
	
    <?php
        if (isset($_GET['about'])) {
        include 'about.php';
    }
    if (isset($_GET['galery'])) {
        include 'galery.php';    }
    if (isset($_GET['utama'])) {
        include 'utama.php';
    }
    if (isset($_GET['paket'])) {
        include 'paket.php';
    }
        if (isset($_GET['keranjang'])) {
        include 'cart-detail.php';
    }
    if (isset($_GET['testimoni'])) {
        include 'testi.php';
    }
    if (isset($_GET['checkout'])) {
       include 'checkout.php';
    }
    if (isset($_GET['status'])) {
        include 'info.php';
    }
    if (isset($_GET['profile'])) {
        include 'profile.php';
    }
    ?>
	
	<footer class="main-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="mb-3 img-logo">
						<a href="#">
							 <img src="../assets/images/logofsw.png" alt="">
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 container flex-end">
					<h4 class="mb-4 ph-fonts-style foot-title">
						Kontak Kami
					</h4>
					<p class="ph-links-column">
					<a href="mailto:nawalens@gmail.com" target='_blank' class="text-black">Email</a>
					<a href="https://wa.me/6282249178530" target='_blank' class="text-black">Whatsapp</a>
					<a href="https://instagram.com/nawalens.id" target='_blank' class="text-black">Instagram</a>
					</p>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 container flex-end">
					<h4 class="mb-4 ph-fonts-style foot-title">
						Alamat Kami
					</h4>
					<p>
                    Jl. Tebet Timur Dalam 7h. No.6b, RT.7/RW.6,Tebet Timur, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12820
					</p>
				</div>

				</div>
			</div>
		</div>
	</footer>

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">                    
                    <p class="footer-company-name">All Rights Reserved. &copy; 2024 Nawa Lens Designed by: 
					FARID 
                    </p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

    <!-- ALL JS FILES -->
    <script src="../assets/js/all.js"></script>
	<!-- Camera Slider -->
	<script src="../assets/js/jquery.mobile.customized.min.js"></script>
	<script src="../assets/js/jquery.easing.1.3.js"></script> 
	<script src="../assets/js/parallaxie.js"></script>
	<script src="../assets/js/jquery.appear.min.js"></script>
	<script src="../assets/js/skill.bars.jquery.js"></script>
	<script src="../assets/js/responsiveslides.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="../assets/js/jquery.fatNav.min.js"></script>
	<script src="../assets/js/menu-overlay.js"></script>
    <script src="../assets/js/custom.js"></script>
	<script src="../assets/js/zepto.min.js"></script>
	<script src="../assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="../assets/js/slider.js"></script>

</body>
</html>