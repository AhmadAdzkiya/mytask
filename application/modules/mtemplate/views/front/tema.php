<?php $tem = '';  ?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- mobile settings -->
<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/plugins/jquery/jquery-2.2.3.min.js"></script>
<!--MAPS HU-->
<link rel="stylesheet" href="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/plugins/leaflet/leaflet.css" />
<script type="text/javascript" src="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/plugins/leaflet/leaflet-src.js"></script>

</head>

<body>
	<!-- wrapper -->
	<div id="wrapper">

		<?php isset($top2) ? $this->load->view($top2) : ''; ?>
		<?php isset($page) ? $this->load->view($page) : ''; ?>
		<?php isset($bottom1) ? $this->load->view($bottom1) : ''; ?>
		<?php isset($bottom2) ? $this->load->view($bottom2) : ''; ?>

		<!-- FOOTER -->

		<!-- /FOOTER -->

	</div>
	<!-- /wrapper -->


	<!-- SCROLL TO TOP -->
	<a href="#" id="toTop"></a>

	<!-- JAVASCRIPT FILES -->
	<script type="text/javascript">
		var plugin_path = '<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/plugins/';
	</script>
	<script type="text/javascript" src="<?php echo base_url() ?>templates/<?php echo $tem; ?>/assets/js/scripts.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>

</body>

</html>