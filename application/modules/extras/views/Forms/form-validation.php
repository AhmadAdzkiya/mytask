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

	<link type="text/css" href="<?php bs('public/assets/fonts/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
	<!-- Font Awesome -->
	<link type="text/css" href="<?php bs('public/assets/fonts/themify-icons/themify-icons.css') ?>" rel="stylesheet">
	<!-- Themify Icons -->
	<link type="text/css" href="<?php bs('public/assets/css/styles.css') ?>" rel="stylesheet">
	<!-- Core CSS with all styles -->

	<link type="text/css" href="<?php bs('public/assets/plugins/codeprettifier/prettify.css') ?>" rel="stylesheet">
	<!-- Code Prettifier -->
	<link type="text/css" href="<?php bs('public/assets/plugins/iCheck/skins/minimal/blue.css') ?>" rel="stylesheet">
	<!-- iCheck -->

	<!--[if lt IE 10]>
        <script type="text/javascript" src="assets/js/media.match.min.js"></script>
        <script type="text/javascript" src="assets/js/respond.min.js"></script>
        <script type="text/javascript" src="assets/js/placeholder.min.js"></script>
    <![endif]-->
	<!-- The following CSS are included as plugins and can be removed if unused-->


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
					<li class="active"><a href="ui-forms.html">Form Validation</a></li>

				</ol>
				<div class="container-fluid">

					<div data-widget-group="group1">
						<div class="row">
							<div class="col-xs-12">
								<div class="panel panel-midnightblue" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Form Validation States</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
									</div>
									<div class="panel-body">
										<p>Avenxo includes validation styles for error, warning, and success states on form controls. To use, add <code>.has-warning</code>, <code>.has-error</code>, or <code>.has-success</code> to the parent element. Any <code>.control-label</code>, <code>.form-control</code>, and <code>.help-block</code> within that element will receive the validation styles</p>
										<form action="" class="form-horizontal row-border">
											<div class="form-group has-success">
												<label for="" class="col-md-3 control-label">Input with Success</label>
												<div class="col-md-6"><input type="text" class="form-control"></div>
												<div class="col-md-3">
													<p class="help-block"><i class="fa fa-check"></i> Great success!</p>
												</div>
											</div>
											<div class="form-group has-warning">
												<label for="" class="col-md-3 control-label">Input with Warning</label>
												<div class="col-md-6"><input type="text" class="form-control"></div>
												<div class="col-md-3">
													<p class="help-block"><i class="fa fa-exclamation-triangle"></i> Be careful!</p>
												</div>
											</div>
											<div class="form-group has-error">
												<label for="" class="col-md-3 control-label">Input with Error</label>
												<div class="col-md-6"><input type="text" class="form-control"></div>
												<div class="col-md-3">
													<p class="help-block"><i class="fa fa-times-circle"></i> Oops! Not wow.</p>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>


							<div class="col-xs-12">
								<div class="alert alert-info">
									<h3>Parsley <small>Form Validation</small></h3>
									<p>The goal of web form validation is to ensure that the user provided necessary and properly formatted information needed to successfully complete an operation. With Avenxo, you can have front-end, UX-aware form validation without writing a single line of code! Click Submit for the validation to take in effect.</p>
								</div>

								<div class="panel panel-midnightblue" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Form Validation</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
									</div>
									<div class="panel-body">

										<form class="form-horizontal row-border" id="validate-form" data-parsley-validate>
											<div class="form-group">
												<label class="col-sm-3 control-label">Required Field</label>
												<div class="col-sm-6">
													<input type="text" placeholder="Required Field" required class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Min-length</label>
												<div class="col-sm-6">
													<input type="text" data-parsley-minlength="6" placeholder="At least 6 characters" required class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Max-legnth</label>
												<div class="col-sm-6">
													<input type="text" data-parsley-maxlength="6" placeholder="At most 6 characters" required class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Range length</label>
												<div class="col-sm-6">
													<input type="text" data-parsley-range="[5,10]" placeholder="Between 5 and 10 characters" required class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">RegExp</label>
												<div class="col-sm-6">
													<input type="text" data-parsley-pattern="#[A-Fa-f0-9]{6}" placeholder="Hexadecimal Color Code" required class="form-control">
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">Email</label>
												<div class="col-sm-6">
													<input type="text" data-parsley-type="email" placeholder="Email address" required class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">URL</label>
												<div class="col-sm-6">
													<input type="text" data-parsley-type="url" placeholder="URL address" required class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Digits</label>
												<div class="col-sm-6">
													<input type="text" data-parsley-type="digits" placeholder="Digits only" required class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Alphanum</label>
												<div class="col-sm-6">
													<input type="text" data-parsley-type="alphanum" placeholder="Alphanumeric only" required class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Password</label>
												<div class="col-sm-6">
													<input type="text" id="ps1" required class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Repeat Password</label>
												<div class="col-sm-6">
													<input type="text" data-parsley-equalto="#ps1" required class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Checkbox</label>
												<div class="col-sm-6">
													<div class="checkbox">
														<label>
															<input type="checkbox" required name="terms">
															Accept Terms &amp; Conditions
														</label>
													</div>
												</div>
											</div>

										</form>
									</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<div class="btn-toolbar">
													<span class="btn btn-default">Submit</span>
													<button class="btn btn-default">Cancel</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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

	<script>
		// See Docs
		window.ParsleyConfig = {
			successClass: 'has-success',
			errorClass: 'has-error',
			errorElem: '<span></span>',
			errorsWrapper: '<span class="help-block"></span>',
			errorTemplate: "<div></div>",
			classHandler: function(el) {
				return el.$element.closest(".form-group");
			}
		};
	</script>
	<script type="text/javascript" src="<?php bs('public/assets/plugins/form-parsley/parsley.js') ?>"></script>
	<!-- Validate Plugin / Parsley -->
	<script type="text/javascript" src="<?php bs('public/assets/demo/demo-formvalidation.js') ?>"></script>

	<!-- End loading page level scripts-->

</body>

</html>