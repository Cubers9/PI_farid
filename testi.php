<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Nawa Lens| Testimoni</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logobar.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/logobar.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

</head>
<body id="page-top" class="politics_version">

   <!-- LOADER -->
<div id="preloader">
    <div class="loader-rd"></div>
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
			<a href="index.php"><div class="logo"><img class="img-fluid" src="images/logofs.png" alt="" /></div></a>
		</div>
		<ul class="menu__list">
			<li class="menu__item"><a href="index.php" class="menu__link"><strong>Beranda</strong></a></li>
			<li class="menu__item"><a href="about.html" class="menu__link"><strong>Tentang Kami</strong></a></li>
			<li class="menu__item"><a href="gallery.html" class="menu__link"><strong>Galeri</strong></a></li>
			<li class="menu__item"><a href="pricelist.html" class="menu__link"><strong>Daftar Harga</strong></a></li>
			<li class="menu__item"><a href="testi.php" class="menu__link"><strong>Testimoni</strong></a></li>
            <li class="menu__item"><a href="login.php" class="menu__link"><strong>Masuk</strong></a></li>
		</ul>
	</nav>
</header>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container-fluid">
      <a class="navbar-brand js-scroll-trigger" href="index.php">
          <h1><strong>Nawa Lens</strong></h1>
      </a>
    </div>
</nav>
	
<div class="banner-area banner-bg-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner">
                    <h2>Testimoni</h2>
                    <ul class="page-title-link">
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="testi.html">Testimoni</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="reviews" class="section wb parallaxie" style="background: url('uploads/back72.JPG')">
    <div class="container">
        <div class="section-title text-center">
            <h3>Testimoni Jasa Kami</h3>
            <p>Berikut testimoni dari pelanggan yang telah percaya untuk menggunakan jasa kami :)</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="testi-carousel owl-carousel owl-theme">
                                     <?php 
          include 'config/koneksi.php';
          $data = mysqli_query($koneksi,"SELECT * FROM testimoni");
          while($result=mysqli_fetch_array($data)){
            $user=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM user where kd_user = '$result[1]' "));

          ?>
                    <div class="testimonial clearfix">

                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> <?= $result[2]?></h3>
                            <p><?= $result[3]?></p>
                        </div>
                        <div class="testi-meta">
                            <h4><?= $user[2]?> </h4>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    <!-- end testimonial -->
<?php } ?>

                    </div>
                </div><!-- end carousel -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
	
	<footer class="main-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-12">
					<div class="mb-3 img-logo">
						<a href="#">
							 <img src="images/logofsw.png" alt="">
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
                    <p class="footer-company-name">All Rights Reserved. &copy; 2024 Nawa lens Designed by: 
					FARID 
                    </p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
	<!-- Camera Slider -->
	<script src="js/jquery.mobile.customized.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script> 
	<script src="js/parallaxie.js"></script>
	<script src="js/jquery.appear.min.js"></script>
	<script src="js/skill.bars.jquery.js"></script>
	<script src="js/responsiveslides.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.fatNav.min.js"></script>
	<script src="js/menu-overlay.js"></script>
    <script src="js/custom.js"></script>
	<script src="js/zepto.min.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/slider.js"></script>

</body>
</html>