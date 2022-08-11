<?php $tem = '';  ?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<title><?php echo isset($page_title) ? $page_title : ''; ?></title>
	<meta name="keywords" content="<?php echo isset($keywords) ? $keywords : ''; ?>" />
	<meta name="description" content="<?php echo isset($description) ? $description : ''; ?>" />
	<meta name="Author" content="" />

	<!-- mobile settings -->
	<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

	<!-- WEB FONTS : use %7C instead of | (pipe) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

	<!-- CORE CSS -->
	<link href="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- SWIPER SLIDER -->
	<link href="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/plugins/slider.swiper/dist/css/swiper.min.css" rel="stylesheet" type="text/css" />

	<!-- THEME CSS -->
	<link href="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/css/essentials.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/css/layout.css" rel="stylesheet" type="text/css" />

	<!-- PAGE LEVEL SCRIPTS -->
	<link href="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/css/header-1.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/css/color_scheme/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
	<link href="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
	<!--
			<link rel="stylesheet" type="text/css" href="https://.kab.go.id/public/b-asset/lib/perfect-scrollbar/css/perfect-scrollbar.css" />

	    <link rel="stylesheet" type="text/css" href="https://.kab.go.id/public/b-asset/lib/material-design-icons/css/material-design-iconic-font.min.css" />

	    <link rel="stylesheet" href="https://.kab.go.id/public/b-asset/css/app.css" type="text/css" />

			<script src="https://.kab.go.id/public/b-asset/lib/jquery/jquery.min.js" type="text/javascript"></script>
		  -->
	<script type="text/javascript" src="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/plugins/jquery/jquery-2.2.3.min.js"></script>
</head>

<body class="smoothscroll enable-animation" style="background:#fafafa">
	<!-- wrapper -->
	<div id="wrapper">

		<div id="header" class="sticky dark header-md translucent noborder clearfix">

			<!-- TOP NAV -->
			<header id="topNav">
				<div class="container">
					<!-- add .full-container for fullwidth -->

					<!-- Mobile Menu Button -->
					<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>

					<a class="logo pull-left" href="/">
						<img src="h" alt="" />
					</a>

					<div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
						<nav class="nav-main">
							<ul id="topMain" class="nav nav-pills nav-main">
								<li class="dropdown">
									<!-- HOME -->
									<a class="dropdown-toggle" href="<?php echo base_url() ?>">
										HOME
									</a>
								</li>
								<li><a href=""> Data Terkini </a></li>
							</ul>

						</nav>
					</div>

				</div>
			</header>
		</div>


		<?php isset($top1) ? $this->load->view($top1) : ''; ?>
		<?php isset($top2) ? $this->load->view($top2) : ''; ?>
		<?php isset($page) ? $this->load->view($page) : ''; ?>
		<?php isset($bottom1) ? $this->load->view($bottom1) : ''; ?>
		<?php isset($bottom2) ? $this->load->view($bottom2) : ''; ?>


		<!-- FOOTER -->
		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<a href="" target="_blank"><img class="img-responsive" src="<?php echo base_url() ?>public/covid19goid.jpg" alt=""></a>
					</div>
					<div class="col-md-4">
						<a href="" target="_blank"><img class="img-responsive" src="<?php echo base_url() ?>public/kemkes.jpg" alt=""></a>
					</div>
					<div class="col-md-4">
						<a href="" target="_blank"><img style="height: 75px;" class="img-responsive" src="<?php echo base_url() ?>public/bkonek.png" alt=""></a>
					</div>
				</div>

			</div>

			<div class="copyright">
				<div class="container">
					<ul class="pull-right nomargin list-inline mobile-block">
						<li>&bull;</li>
					</ul>
					&copy;
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
	<script type="text/javascript">
		var plugin_path = '<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/plugins/';
	</script>


	<script type="text/javascript" src="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/js/scripts.js"></script>

	<!-- SWIPER SLIDER -->
	<script type="text/javascript" src="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/plugins/slider.swiper/dist/js/swiper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/js/view/demo.swiper_slider.js"></script>
</body>

</html>