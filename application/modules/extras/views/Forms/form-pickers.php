<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login System</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="description" content="Login System">
	<meta name="author" content="KaijuThemes">

	<link type='text/css' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet'>

	<link type="text/css" href="<?php bs('public/assets/fonts/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet"> <!-- Font Awesome -->
	<link type="text/css" href="<?php bs('public/assets/fonts/themify-icons/themify-icons.css') ?>" rel="stylesheet"> <!-- Themify Icons -->
	<link type="text/css" href="<?php bs('public/assets/css/styles.css') ?>" rel="stylesheet"> <!-- Core CSS with all styles -->

	<link type="text/css" href="<?php bs('public/assets/plugins/codeprettifier/prettify.css') ?>" rel="stylesheet"> <!-- Code Prettifier -->
	<link type="text/css" href="<?php bs('public/assets/plugins/iCheck/skins/minimal/blue.css') ?>" rel="stylesheet"> <!-- iCheck -->

	<!--[if lt IE 10]>
        <script type="text/javascript" src="assets/js/media.match.min.js')?>"></script>
        <script type="text/javascript" src="assets/js/respond.min.js')?>"></script>
        <script type="text/javascript" src="assets/js/placeholder.min.js')?>"></script>
    <![endif]-->
	<!-- The following CSS are included as plugins and can be removed if unused-->

	<link type="text/css" href="<?php bs('public/assets/plugins/form-daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet"> <!-- DateRangePicker -->
	<link type="text/css" href="<?php bs('public/assets/plugins/iCheck/skins/minimal/blue.css') ?>" rel="stylesheet"> <!-- Custom Checkboxes / iCheck -->
	<link type="text/css" href="<?php bs('public/assets/plugins/clockface/css/clockface.css') ?>" rel="stylesheet"> <!-- Clockface -->

</head>

<body class="animated-content">

	<?php $this->load->view('template/header') ?>

	<?php $this->load->view('template/sidebar') ?>


	<div class="static-content-wrapper">
		<div class="static-content">
			<div class="page-content">
				<ol class="breadcrumb">

					<li><a href="index.html">Home</a></li>
					<li><a href="#">Advanced Forms</a></li>
					<li class="active"><a href="ui-forms.html">Form Pickers</a></li>

				</ol>
				<div class="container-fluid">

					<div data-widget-group="group1">
						<div class="row">
							<div class="col-xs-12">

								<div class="panel panel-default" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Date Picker</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
									</div>
									<div class="panel-body">
										<form action="" class="form-horizontal row-border">
											<div class="form-group">
												<label class="col-sm-2 control-label">Default</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="datepicker">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Disable Past Dates</label>
												<div class="col-sm-8">
													<div class="input-group date" id="datepicker-pastdisabled">
														<span class="input-group-addon"><i class="ti ti-calendar"></i></span>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Start with Year View</label>
												<div class="col-sm-8">
													<div class="input-group date" id="datepicker-startview">
														<span class="input-group-addon"><i class="ti ti-calendar"></i></span>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Inline Dates</label>
												<div class="col-sm-8">
													<div id="datepicker-inline"></div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Date Range</label>
												<div class="col-sm-8">
													<div class="input-daterange input-group" id="datepicker-range">
														<input type="text" class="input-small form-control" name="start" />
														<span class="input-group-addon">to</span>
														<input type="text" class="input-small form-control" name="end" />
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>

								<div class="panel panel-default" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Date Range Picker</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
									</div>
									<div class="panel-body">
										<form action="" class="form-horizontal row-border">
											<div class="form-group">
												<label class="col-sm-2 control-label">Select Date Range</label>
												<div class="col-sm-8">
													<div class="input-group">
														<span class="input-group-addon"><i class="ti ti-calendar"></i></span>
														<input type="text" class="form-control" id="daterangepicker1">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Advanced Range Selector</label>
												<div class="col-sm-8">
													<button class="btn btn-default" id="daterangepicker2">
														<i class="ti ti-calendar"></i>
														<span><?php echo date("F j, Y", strtotime('-30 day')); ?> - <?php echo date("F j, Y"); ?></span> <b class="caret"></b>
													</button>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Select Both Date and Time</label>
												<div class="col-sm-8">
													<div class="input-group">
														<span name="daterangepicker3" class="input-group-addon"><i class="ti ti-calendar"></i></span>
														<input for="daterangepicker3" type="text" class="form-control" id="daterangepicker3">
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>


								<div class="panel panel-default" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Time Picker</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
									</div>
									<div class="panel-body">
										<form action="" class="form-horizontal row-border">
											<div class="form-group">
												<label class="col-sm-2 control-label">Without Component Markup</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" id="timepicker2">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Input Group (Default, click icon)</label>
												<div class="col-sm-8">
													<div class="input-group bootstrap-timepicker">
														<div class="input-group-addon"><i class="ti ti-time"></i></div>
														<input id="timepicker1" type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Only Mask (without Dropdown)</label>
												<div class="col-sm-8">
													<div class="input-group bootstrap-timepicker">
														<div class="input-group-addon"><i class="ti ti-time"></i></div>
														<input id="timepicker3" type="text" class="form-control">
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>

								<div class="panel panel-default" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Clockface Time Picker</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
									</div>
									<div class="panel-body">
										<div class="form-horizontal row-border">
											<div class="form-group">
												<label for="t1" class="col-sm-2 control-label">Default</label>
												<div class="col-sm-8">
													<input type="text" id="t1" value="2:30 PM" data-format="hh:mm A" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label for="t2" class="col-sm-2 control-label">Input Group</label>
												<div class="col-sm-8">
													<div class="input-group">
														<input type="text" id="t2" value="14:30" class="form-control" readonly="">
														<span class="input-group-addon" id="toggle-btn"><i class="ti ti-time"></i></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="t3" class="col-sm-2 control-label">Inline</label>
												<div class="col-sm-8">
													<div id="t3" class="well pull-left p0"></div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Date/Time Picker</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
									</div>
									<div class="panel-body">
										<div class="form-horizontal row-border">
											<div class="form-group">
												<label for="dtp-1" class="col-sm-2 control-label">Default Date/Time Picker</label>
												<div class="col-sm-8">
													<input class="form-control" type="text" id="dtp-1">
												</div>
											</div>

											<div class="form-group">
												<label for="dtp-2" class="col-sm-2 control-label">Input Group</label>
												<div class="col-sm-8">
													<div class="input-group date" id="dtp-2">
														<input type="text" class="form-control">
														<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
														<span class="input-group-addon"><i class="fa fa-close"></i></span>
													</div>
												</div>
											</div>

											<div class="form-group ">
												<label for="dtp-3" class="col-sm-2 control-label">Meridian Format</label>
												<div class="col-sm-8">
													<div class="input-group date" id="dtp-3">
														<input type="text" class="form-control">
														<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
														<span class="input-group-addon"><i class="fa fa-close"></i></span>
													</div>
												</div>
											</div>

											<div class="form-group ">
												<label for="dtp-3" class="col-sm-2 control-label">Only Date</label>
												<div class="col-sm-8">
													<div class="input-group date" id="dtp-5">
														<input type="text" class="form-control">
														<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
														<span class="input-group-addon"><i class="fa fa-close"></i></span>
													</div>
												</div>
											</div>

											<div class="form-group ">
												<label for="dtp-3" class="col-sm-2 control-label">Only Time</label>
												<div class="col-sm-8">
													<div class="input-group date" id="dtp-6">
														<input type="text" class="form-control">
														<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
														<span class="input-group-addon"><i class="fa fa-close"></i></span>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label for="dtp-4" class="col-sm-2 control-label">Inline</label>
												<div class="col-sm-8">
													<div id="dtp-4"></div>
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="panel panel-default" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Color Pickers</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
									</div>
									<div class="panel-body">
										<form action="" class="form-horizontal row-border">
											<div class="form-group">
												<label class="col-sm-2 control-label">Default</label>
												<div class="col-sm-8">
													<input type="text" class="form-control cpicker" data-color-format="hex" value="#fff">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">RGBA</label>
												<div class="col-sm-8">
													<input type="text" class="form-control cpicker" data-color-format="rgba" value="rgba(255, 146, 180,0.9)">
													<p class="help-block">RGBA format specified via data-tag</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Input Group</label>
												<div class="col-sm-8">
													<div class="input-group cpicker color" data-color="rgb(255, 146, 180)" data-color-format="rgb">
														<input type="text" readonly class="form-control" value="">
														<span class="input-group-addon"><i style="background-color: rgb(255, 146, 180); margin-left: 8px;"></i></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2"><a data-toggle="modal" href="#cpicker_modal" class="btn btn-primary">Launch Color Pickers in Modal Dialog Box</a></div>
											</div>
										</form>
									</div>
								</div>


							</div>
						</div>




						<!-- Colorpicker Modal -->
						<div class="modal fade modals" id="cpicker_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h2 class="modal-title">Colorpickers</h2>
									</div>
									<div class="modal-body">
										<form action="" class="form-horizontal">
											<div class="form-group">
												<label class="col-sm-2 control-label">Default</label>
												<div class="col-sm-8">
													<input type="text" class="form-control cpicker" data-color-format="hex" value="#fff">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">RGBA</label>
												<div class="col-sm-8">
													<input type="text" class="form-control cpicker" data-color-format="rgba" value="rgba(255, 146, 180,0.9)">
													<p class="help-block">RGBA format specified via data-tag</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Input Group</label>
												<div class="col-sm-8">
													<div class="input-group color cpicker" data-color="rgb(255, 146, 180)" data-color-format="rgb">
														<input type="text" readonly class="form-control" value="">
														<span class="input-group-addon"><i style="background-color: rgb(255, 146, 180); margin-left: 8px;"></i></span>
													</div>
												</div>
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Save changes</button>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					</div>

				</div> <!-- .container-fluid -->
			</div> <!-- #page-content -->
		</div>
		<footer role="contentinfo">
			<div class="clearfix">
				<ul class="list-unstyled list-inline pull-left">
					<li>
						<h6 style="margin: 0;">&copy; 2015 Avenxo</h6>
					</li>
				</ul>
				<button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
			</div>
		</footer>

	</div>
	</div>
	</div>


	<!-- Switcher -->
	<div class="demo-options">
		<div class="demo-options-icon"><i class="ti ti-paint-bucket"></i></div>
		<div class="demo-heading">Demo Settings</div>

		<div class="demo-body">
			<div class="tabular">
				<div class="tabular-row">
					<div class="tabular-cell">Fixed Header</div>
					<div class="tabular-cell demo-switches"><input class="bootstrap-switch" type="checkbox" checked data-size="mini" data-on-color="success" data-off-color="default" name="demo-fixedheader" data-on-text="&nbsp;" data-off-text="&nbsp;"></div>
				</div>
				<div class="tabular-row">
					<div class="tabular-cell">Boxed Layout</div>
					<div class="tabular-cell demo-switches"><input class="bootstrap-switch" type="checkbox" data-size="mini" data-on-color="success" data-off-color="default" name="demo-boxedlayout" data-on-text="&nbsp;" data-off-text="&nbsp;"></div>
				</div>
				<div class="tabular-row">
					<div class="tabular-cell">Collapse Leftbar</div>
					<div class="tabular-cell demo-switches"><input class="bootstrap-switch" type="checkbox" data-size="mini" data-on-color="success" data-off-color="default" name="demo-collapseleftbar" data-on-text="&nbsp;" data-off-text="&nbsp;"></div>
				</div>
			</div>
		</div>

		<div class="demo-body">
			<div class="option-title">Topnav</div>
			<ul id="demo-header-color" class="demo-color-list">
				<li><span class="demo-cyan"></span></li>
				<li><span class="demo-light-blue"></span></li>
				<li><span class="demo-blue"></span></li>
				<li><span class="demo-indigo"></span></li>
				<li><span class="demo-deep-purple"></span></li>
				<li><span class="demo-purple"></span></li>
				<li><span class="demo-pink"></span></li>
				<li><span class="demo-red"></span></li>
				<li><span class="demo-teal"></span></li>
				<li><span class="demo-green"></span></li>
				<li><span class="demo-light-green"></span></li>
				<li><span class="demo-lime"></span></li>
				<li><span class="demo-yellow"></span></li>
				<li><span class="demo-amber"></span></li>
				<li><span class="demo-orange"></span></li>
				<li><span class="demo-deep-orange"></span></li>
				<li><span class="demo-midnightblue"></span></li>
				<li><span class="demo-bluegray"></span></li>
				<li><span class="demo-bluegraylight"></span></li>
				<li><span class="demo-black"></span></li>
				<li><span class="demo-gray"></span></li>
				<li><span class="demo-graylight"></span></li>
				<li><span class="demo-default"></span></li>
				<li><span class="demo-brown"></span></li>
			</ul>
		</div>

		<div class="demo-body">
			<div class="option-title">Sidebar</div>
			<ul id="demo-sidebar-color" class="demo-color-list">
				<li><span class="demo-cyan"></span></li>
				<li><span class="demo-light-blue"></span></li>
				<li><span class="demo-blue"></span></li>
				<li><span class="demo-indigo"></span></li>
				<li><span class="demo-deep-purple"></span></li>
				<li><span class="demo-purple"></span></li>
				<li><span class="demo-pink"></span></li>
				<li><span class="demo-red"></span></li>
				<li><span class="demo-teal"></span></li>
				<li><span class="demo-green"></span></li>
				<li><span class="demo-light-green"></span></li>
				<li><span class="demo-lime"></span></li>
				<li><span class="demo-yellow"></span></li>
				<li><span class="demo-amber"></span></li>
				<li><span class="demo-orange"></span></li>
				<li><span class="demo-deep-orange"></span></li>
				<li><span class="demo-midnightblue"></span></li>
				<li><span class="demo-bluegray"></span></li>
				<li><span class="demo-bluegraylight"></span></li>
				<li><span class="demo-black"></span></li>
				<li><span class="demo-gray"></span></li>
				<li><span class="demo-graylight"></span></li>
				<li><span class="demo-default"></span></li>
				<li><span class="demo-brown"></span></li>
			</ul>
		</div>



	</div>
	<!-- /Switcher -->
	<!-- Load site level scripts -->

	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

	<script type="text/javascript" src="<?php bs('public/assets/js/jquery-1.10.2.min.js') ?>"></script> <!-- Load jQuery -->
	<script type="text/javascript" src="<?php bs('public/assets/js/jqueryui-1.10.3.min.js') ?>"></script> <!-- Load jQueryUI -->
	<script type="text/javascript" src="<?php bs('public/assets/js/bootstrap.min.js') ?>"></script> <!-- Load Bootstrap -->
	<script type="text/javascript" src="<?php bs('public/assets/js/enquire.min.js') ?>"></script> <!-- Load Enquire -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/velocityjs/velocity.min.js') ?>"></script> <!-- Load Velocity for Animated Content -->
	<script type="text/javascript" src="<?php bs('public/assets/plugins/velocityjs/velocity.ui.min.js') ?>"></script>

	<script type="text/javascript" src="<?php bs('public/assets/plugins/wijets/wijets.js') ?>"></script> <!-- Wijet -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/codeprettifier/prettify.js') ?>"></script> <!-- Code Prettifier  -->
	<script type="text/javascript" src="<?php bs('public/assets/plugins/bootstrap-switch/bootstrap-switch.js') ?>"></script> <!-- Swith/Toggle Button -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') ?>"></script> <!-- Bootstrap Tabdrop -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/iCheck/icheck.min.js') ?>"></script> <!-- iCheck -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js') ?>"></script> <!-- nano scroller -->

	<script type="text/javascript" src="<?php bs('public/assets/js/application.js') ?>"></script>
	<script type="text/javascript" src="<?php bs('public/assets/demo/demo.js') ?>"></script>
	<script type="text/javascript" src="<?php bs('public/assets/demo/demo-switcher.js') ?>"></script>

	<!-- End loading site level scripts -->

	<!-- Load page level scripts-->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/form-daterangepicker/moment.min.js') ?>"></script> <!-- Moment.js for Date Range Picker -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/form-colorpicker/js/bootstrap-colorpicker.min.js') ?>"></script> <!-- Color Picker -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/form-daterangepicker/daterangepicker.js') ?>"></script> <!-- Date Range Picker -->
	<script type="text/javascript" src="<?php bs('public/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') ?>"></script> <!-- Datepicker -->
	<script type="text/javascript" src="<?php bs('public/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.js') ?>"></script> <!-- Timepicker -->
	<script type="text/javascript" src="<?php bs('public/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') ?>"></script> <!-- DateTime Picker -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/clockface/js/clockface.js') ?>"></script> <!-- Clockface -->


	<script type="text/javascript" src="<?php bs('public/assets/demo/demo-pickers.js') ?>"></script>

	<!-- End loading page level scripts-->

</body>

</html>