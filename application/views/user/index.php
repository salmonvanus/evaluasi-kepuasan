<!DOCTYPE html>
<html lang="en-US">

<head>

	<!-- Meta
	============================================= -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1, max-scale=1">

	<!-- Stylesheets
	============================================= -->
	<link href="<?= base_url('assets_landing/'); ?>css/style.css" rel="stylesheet">
	<!-- <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700|Open+Sans:400,400i,600,600i,700,700i" rel="stylesheet"> -->

	<!-- Favicon
	============================================= -->
	<link rel="shortcut icon" href="<?= base_url('assets_landing/'); ?>images/general-elements/favicon/favicon.png">
	<link rel="apple-touch-icon" href="<?= base_url('assets_landing/'); ?>images/general-elements/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('assets_landing/'); ?>images/general-elements/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('assets_landing/'); ?>images/general-elements/favicon/apple-touch-icon-114x114.png">

	<!-- Title
	============================================= -->
	<title>Evaluasi Kepuasan</title>

</head>

<body>
	<div id="scroll-progress"><span class="scroll-percent"></span></div>

	<!-- Website Loading
	============================================= -->	
	<div id="website-loading">
		<div class="loader">
			<!-- <span class="heart-beam"></span> -->
		</div><!-- .loader end -->
	</div><!-- .website-loading end -->

	<!-- Document Full Container
	============================================= -->
	<div id="full-container">

		<!-- Header
		============================================= -->
		<header id="header" data-scroll-index="0">

			<div id="header-wrap">

				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<a class="logo" href="<?= base_url('beranda'); ?>">
								<img src="<?= base_url('assets_landing/'); ?>images/files/logo3.png" data-logo-alt="<?= base_url('assets_landing/'); ?>images/files/logo-alt3.png" alt="">
								<h5><span class="colored">Evaluasi Kepuasan</span></h5>
								<span>Beranda</span>
							</a><!-- .logo end -->
							<ul class="main-menu">
								<li><a href="<?= base_url('beranda'); ?>">Beranda</a></li>
								<li><a href="<?= base_url('kuesioner'); ?>">Kuesioner</a></li>
							</ul>
							<a href="<?= base_url('login'); ?>" class="header-btn btn small colorful hover-transparent-colorful">Masuk</a>
							
                            <!-- .mobile-menu-btn -->
                            <div class="clearfix"></div>
                            <div id="mobile-menu"></div>
                            <!-- #mobile-menu end -->
						</div><!-- .col-md-12 end -->
					</div><!-- .row end -->
				</div><!-- .container end -->
			</div><!-- #header-wrap end -->

		</header><!-- #header end -->

		<!-- Banner
		============================================= -->
		<section id="banner" data-scroll-index="0">

			<div class="banner-parallax">

				<div class="banner-slider">
					<ul class="owl-carousel slider-img-bg">
						<li>
							<div class="slide">
								<img src="<?= base_url('assets_landing/'); ?>images/files/sliders/banner/bg-4.jpg" alt="">
								<div class="overlay-colored" data-bg-color="#fff" data-bg-color-opacity="0.50"></div><!-- .overlay-colored end -->
								<div class="slide-content">
									<div class="container">
										<div class="row">
											<div class="col-md-10 col-md-offset-1">

												<div class="banner-center-box text-center">
													<h1>
														Kejaksaan Negeri Tomohon
													</h1>
													<div class="description" style="color:black">
														Evaluasi Kepuasan Publik Di Kejaksaan Negeri Tomohon Menggunakan Metode Importance Performance Analysis dan Customer Satisfaction Index.
													</div>
												</div><!-- .banner-center-box end -->

											</div><!-- .col-md-10 end -->
										</div><!-- .row end -->
									</div><!-- .container end -->
								</div><!-- .slide-content end -->
							</div><!-- .slide end -->
						</li>
					</ul>
				</div><!-- .banner-slider end -->

			</div><!-- .banner-parallax end -->

		</section><!-- #banner end -->

		<!-- Footer Mini
		============================================= -->
		<footer id="footer-mini">

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="copyrights-message">2023 © <span class="colorkuning">Evaluasi Kepuasan | Kejaksaan Negeri Tomohon.</span></div>
						<!-- <ul class="social-icons">
							<li><a class="si-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a class="si-behance" href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a class="si-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
						</ul>.social-icons end -->
					</div><!-- .col-md-12 end -->
				</div><!-- .row end -->
			</div><!-- .container end -->

		</footer><!-- #footer-mini end -->

	</div><!-- #full-container end -->

	<a class="scroll-top" href="#"><img src="images/general-elements/scroll-top.png" alt=""></a>

	<!-- External JavaScripts
	============================================= -->
	<script src="<?= base_url('assets_landing/'); ?>js/jquery.js"></script>
	<script src="<?= base_url('assets_landing/'); ?>js/jRespond.min.js"></script>
	<script src="<?= base_url('assets_landing/'); ?>js/jquery.easing.min.js"></script>
	<script src="<?= base_url('assets_landing/'); ?>js/jquery.fitvids.js"></script>
	<script src="<?= base_url('assets_landing/'); ?>js/jquery.waypoints.min.js"></script>
	<script src="<?= base_url('assets_landing/'); ?>js/jquery.stellar.js"></script>
	<script src="<?= base_url('assets_landing/'); ?>js/owl.carousel.min.js"></script>
	<script src="<?= base_url('assets_landing/'); ?>js/jquery.mb.YTPlayer.min.js"></script>
	<script src="<?= base_url('assets_landing/'); ?>js/hoverIntent.js"></script>
	<script src="<?= base_url('assets_landing/'); ?>js/simple-scrollbar.min.js"></script>
	<script src="<?= base_url('assets_landing/'); ?>js/superfish.js"></script>
	<script src="<?= base_url('assets_landing/'); ?>js/scrollIt.min.js"></script>
	<script src='<?= base_url('assets_landing/'); ?>js/jquery.magnific-popup.min.js'></script>
	<script src="<?= base_url('assets_landing/'); ?>js/jssocials.min.js"></script>
	<script src='<?= base_url('assets_landing/'); ?>js/jquery.validate.min.js'></script>
	<script src='<?= base_url('assets_landing/'); ?>js/functions.js'></script>

</body>
</html>
