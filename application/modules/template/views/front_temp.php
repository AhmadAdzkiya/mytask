<?php  $tem = 'bwi';  ?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>Situs Informasi dan Pantauan COVID-19 Banyuwangi</title>
		<meta name="keywords" content="banyuwangi" />
		<meta name="description" content="" />
		<meta name="Author" content="" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

		<!-- SWIPER SLIDER -->
		<link href="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/plugins/slider.swiper/dist/css/swiper.min.css" rel="stylesheet" type="text/css" />

		<!-- THEME CSS -->
		<link href="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/css/layout.css" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/css/header-1.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
		<link href="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
	</head>

<body class="smoothscroll enable-animation">
	<!-- wrapper -->
	<div id="wrapper">

		<div id="header" class="sticky dark header-md translucent noborder clearfix">

			<!-- TOP NAV -->
			<header id="topNav">
				<div class="container"><!-- add .full-container for fullwidth -->

					<!-- Mobile Menu Button -->
					<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>

					<a class="logo pull-left" href="/">
						<img src="https://corona.banyuwangikab.go.id/public/bwi.png" alt="" />
					</a>

					<div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
						<nav class="nav-main">
							<ul id="topMain" class="nav nav-pills nav-main">
								<li class="dropdown"><!-- HOME -->
									<a class="dropdown-toggle" href="<?php echo base_url()?>">
										HOME
									</a>
								</li>
							</ul>

						</nav>
					</div>

				</div>
			</header>
		</div>

		<section id="slider" class="fullheight">

			<div class="swiper-container" data-effect="fade" data-autoplay="false">
				<div class="swiper-wrapper">

					<!-- SLIDE 1 -->
					<div class="swiper-slide" style="background-image: url('<?php echo base_url()?>public/assets/slide/bg1.jpeg');">
						<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

						<div class="display-table">
							<div class="display-table-cell vertical-align-middle">
								<div class="container">

									<div class="row">
										<div class="text-center col-md-8 col-xs-12 col-md-offset-2">

											<h1 class="bold font-raleway wow fadeInUp" data-wow-delay="0.4s">CEGAAH COVID-19</h1>
											<p class="lead font-lato weight-300 hidden-xs wow fadeInUp" data-wow-delay="0.6s">Banyuwangi gotong royong cegah covid-19, tingkatkan imunitas tubuh dan jaga kebersihan.</p>
											<span class="wow fadeIn" data-wow-delay="1.5s" href="#"><img src="<?php echo base_url()?>public/assets/cc.png"/></span>

										</div>
									</div>

								</div>
							</div>
						</div>

					</div>
					<!-- /SLIDE 1 -->
				</div>

				<!-- Swiper Pagination -->
				<div class="swiper-pagination"></div>

				<!-- Swiper Arrows -->
				<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
				<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
			</div>

		</section>
		<!-- /SLIDER -->

	<!--
	<section>
		<div class="container">
			<div class="row">


			</div>
		</div>
	</section>
	-->



	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<img class="img-responsive" src="<?php echo base_url()?>public/lapcovidbwi18.JPG" alt="" />
				</div>
			</div>


			<div class="row">
				<div class="col-md-12">
				<BR/>
				<ul>
					<li><a href="<?php echo base_url()?>public/SE_BUPATI_TTG_COVID-19 - RESMI.pdf" target="_blank">
						SURAT EDARAN BUPATI BANYUWANGI TENTANG KEWASPADAAN DAN PENCEGAHAN TERHADAP CORONA VIRUS DISEASE 2019 (Covid-19)
						</a>
					</li>
					<li>
<a href="<?php echo base_url()?>public/se_sekda.pdf" target="_blank">
						SURAT EDARAN SEKRETARIAT DAERAH TENTANG
PENYESUAIAN SISTEM KERJA APARATUR SIPIL NEGARA DALAM UPAYA PENCEGAHAN
PENYEBARAN COVID-19
DI LINGKUNGAN PEMERINTAH KABUPATEN BANYUWANGI
</a>

					</li>
				</ul>
				</div>
			</div>



		</div>
	</section>




	<section class="theme-color">
		<div class="container">

			<div class="row">
			    <h2 class="text-center">INFO PENTING</h2>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
					<img class="img-responsive" src="<?php echo base_url()?>public/media/kes4.jpg" alt="" />
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
					<img class="img-responsive" src="<?php echo base_url()?>public/media/kes1.jpg" alt="" />
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
					<img class="img-responsive" src="<?php echo base_url()?>public/media/kes2.jpg" alt="" />
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail">
					<img class="img-responsive" src="<?php echo base_url()?>public/media/kes1.jpg" alt="" />
					</div>
				</div>
			</div>
		</div>
	</section>



<section>
	<div class="container">



		<div class="text-center">
			<div class="owl-carousel owl-padding-1 nomargin buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items": "4", "autoPlay": 3500, "navigation": true, "pagination": false}'>

				<!-- item -->
				<div class="item-box">
					<figure>
						<span class="item-hover">
							<span class="overlay dark-5"></span>
							<span class="inner">
								<!-- lightbox -->
								<a class="ico-rounded lightbox" href="<?php echo base_url()?>public/media/info/info1.jpeg" data-plugin-options='{"type":"image"}'>
									<span class="fa fa-plus size-20"></span>
								</a>
							</span>
						</span>

						<img  src="<?php echo base_url()?>public/media/info/info1.jpeg" width="auto" height="200" alt="">
					</figure>
				</div>
				<!-- /item -->
				<!-- item -->
				<div class="item-box">
					<figure>
						<span class="item-hover">
							<span class="overlay dark-5"></span>
							<span class="inner">
								<!-- lightbox -->
								<a class="ico-rounded lightbox" href="<?php echo base_url()?>public/media/info/info2.jpeg" data-plugin-options='{"type":"image"}'>
									<span class="fa fa-plus size-20"></span>
								</a>
							</span>
						</span>

						<img src="<?php echo base_url()?>public/media/info/info2.jpeg" width="auto" height="200" alt="">
					</figure>
				</div>
				<!-- /item -->
				<!-- item -->
				<div class="item-box">
					<figure>
						<span class="item-hover">
							<span class="overlay dark-5"></span>
							<span class="inner">
								<!-- lightbox -->
								<a class="ico-rounded lightbox" href="<?php echo base_url()?>public/media/info/info3.jpeg" data-plugin-options='{"type":"image"}'>
									<span class="fa fa-plus size-20"></span>
								</a>
							</span>
						</span>

						<img src="<?php echo base_url()?>public/media/info/info3.jpeg" width="auto" height="200" alt="">
					</figure>
				</div>
				<!-- /item -->
				<!-- item -->
				<div class="item-box">
					<figure>
						<span class="item-hover">
							<span class="overlay dark-5"></span>
							<span class="inner">
								<!-- lightbox -->
								<a class="ico-rounded lightbox" href="<?php echo base_url()?>public/media/info/info4.jpeg" data-plugin-options='{"type":"image"}'>
									<span class="fa fa-plus size-20"></span>
								</a>
							</span>
						</span>

						<img src="<?php echo base_url()?>public/media/info/info4.jpeg" width="auto" height="200" alt="">
					</figure>
				</div>
				<!-- /item -->
			</div>
		</div>
	</div>
</section>


	<section>
		<div class="container">
			<div class="row">
			    <h2 class="text-center">INFORMASI TERKAIT</h2>
				<div class="col-sm-6 col-md-4">
<div class="embed-responsive embed-responsive-16by9">
	<iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/9iZIRBiH710"></iframe>
</div>
				</div>
				<div class="col-sm-6 col-md-4">
<div class="embed-responsive embed-responsive-16by9">
	<iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/kNBNAdI7Vog"></iframe>
</div>


				</div>
				<div class="col-sm-6 col-md-4">
<div class="embed-responsive embed-responsive-16by9">
	<iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/TltRzGNeumQ"></iframe>
</div>

				</div>

			</div>

		</div>
	</section>

		<!-- FOOTER -->
		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<a href="https://www.covid19.go.id" target="_blank"><img class="img-responsive" src="<?php echo base_url()?>public/covid19goid.jpg" alt=""></a>
					</div>
					<div class="col-md-4">
						<a href="https://www.kemkes.go.id/" target="_blank"><img class="img-responsive" src="<?php echo base_url()?>public/kemkes.jpg" alt=""></a>
					</div>
					<div class="col-md-4">
						<a href="https://connect.banyuwangikab.go.id/harga_pasar" target="_blank"><img style="height: 75px;" class="img-responsive" src="<?php echo base_url()?>public/bkonek.png" alt=""></a>
					</div>
				</div>

			</div>

			<div class="copyright">
				<div class="container">
					<ul class="pull-right nomargin list-inline mobile-block">
						<li>&bull;</li>
					</ul>
					&copy; Pemerintah Kabupaten Banyuwangi
				</div>
			</div>
		</footer>
		<!-- /FOOTER -->

	</div>
	<!-- /wrapper -->


		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>


		<!-- PRELOADER -->
		<div id="preloader">
			<div class="inner">
				<span class="loader"></span>
			</div>
		</div><!-- /PRELOADER -->


		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/plugins/';</script>
		<script type="text/javascript" src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/plugins/jquery/jquery-2.2.3.min.js"></script>

		<script type="text/javascript" src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/js/scripts.js"></script>

		<!-- SWIPER SLIDER -->
		<script type="text/javascript" src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/plugins/slider.swiper/dist/js/swiper.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/js/view/demo.swiper_slider.js"></script>
	</body>
</html>
