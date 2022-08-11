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
					<li class="active"><a href="ui-forms.html">Form Wizard</a></li>

				</ol>
				<div class="container-fluid">


					<div class="alert alert-info">
						<h3>jQuery Stepy <small>Form To Wizard</small></h3>
						<p>Turn any long form into a wizard by breaking it into fieldsets. Wizards allow users to follow a progression and increase engagement by making seemingly longer tasks smaller.</p>
					</div>
					<div data-widget-group="group1">
						<div class="row">
							<div class="col-md-12">

								<div class="panel panel-danger" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Simple Wizard</h2>
										<!-- <div class="options">
						<ul class="nav nav-tabs">
			              <li class="active"><a href="#domwizard" data-toggle="tab"><i class="fa fa-desktop"></i></a></li>
			              <li><a href="#codewizard" data-toggle="tab"><i class="fa fa-code"></i></a></li>
			            </ul>
					</div> -->
									</div>
									<div class="panel-body">
										<p>You can turn any simple form into a wizard with just one line of code! See it in action...</p>
										<div class="tab-content">
											<div class="tab-pane active" id="domwizard">
												<form action="#" id="basicwizard" class="form-horizontal">
													<fieldset title="Step 1">
														<legend>No Validation</legend>
														<div class="form-group">
															<label class="col-md-3 control-label">User Name</label>
															<div class="col-md-6">
																<input type="text" placeholder="username" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-3 control-label">Email Address</label>
															<div class="col-md-6">
																<input type="text" placeholder="example@address.com" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-3 control-label">Website</label>
															<div class="col-md-6">
																<input type="text" placeholder="http://address.com" class="form-control">
															</div>
														</div>
													</fieldset>
													<fieldset title="Step 2">
														<legend>Just Text</legend>
														<div class="row">
															<label class="col-md-3 control-label">Lorem Ipsum</label>
															<div class="col-md-9">
																<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, quis autem deleniti animi eum a eaque sint voluptatibus labore possimus accusantium molestias magnam cum officiis qui neque minima assumenda facere aut repellat delectus. Soluta incidunt pariatur natus voluptatum voluptatibus culpa blanditiis. Inventore, repellendus, at veniam magnam quisquam necessitatibus modi est qui deserunt. Dicta, excepturi, iusto, maiores perferendis rem officiis est voluptas possimus laudantium fugit veritatis!</p>
																<p>By clicking Finish you agree that you accept the Terms &amp; Conditions</p>
															</div>
														</div>
													</fieldset>
													<input type="submit" class="finish btn-success btn" value="Submit" />
												</form>
											</div>


											<div class="tab-pane" id="codewizard">
												<pre class="prettyprint linenums">
	&lt;form id=&quot;basicwizard&quot;&gt;
		&lt;fieldset title=&quot;Step 1&quot;&gt;
			&lt;legend&gt;No Validation&lt;/legend&gt;
			...
		&lt;/fieldset&gt;
		&lt;fieldset title=&quot;Step 2&quot;&gt;
			&lt;legend&gt;Just Text&lt;/legend&gt;
			...
		&lt;/fieldset&gt;
	&lt;/form&gt;
	</pre>
											</div>
										</div>

									</div>
								</div>


								<div class="panel panel-info" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Wizard with Validation</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
									</div>
									<div class="panel-body">
										<p>The wizard has jQuery Validation plugin support built-in. All you need to do is turn on the <code>validate: true</code> option on and you instantly have a wizard with form validation!</p>
										<form action="#" id="wizard" class="form-horizontal">
											<fieldset title="Step 1">
												<legend>Registration</legend>
												<div class="form-group">
													<label for="fieldname" class="col-md-3 control-label">Name</label>
													<div class="col-md-6">
														<input id="fieldname" class="form-control" name="name" minlength="4" type="text" required>
													</div>
												</div>
												<div class="form-group">
													<label for="fieldemail" class="col-md-3 control-label">Email</label>
													<div class="col-md-6"><input id="fieldemail" class="form-control" type="email" name="email" required></div>
												</div>
												<div class="form-group">
													<label for="fieldurl" class="col-md-3 control-label">URL</label>
													<div class="col-md-6"><input id="fieldurl" class="form-control" type="url" name="url"></div>
												</div>
											</fieldset>
											<fieldset title="Step 2">
												<legend>Personal Data</legend>
												<div class="form-group">
													<label for="fieldnick" class="col-md-3 control-label">Nick</label>
													<div class="col-md-6"><input id="fieldnick" class="form-control" name="name" minlength="4" type="text" required></div>
												</div>
												<div class="form-group">
													<label for="fieldabout" class="col-md-3 control-label">About</label>
													<div class="col-md-6"><textarea id="fieldabout" class="form-control autosize" rows="2"></textarea></div>
												</div>
											</fieldset>
											<fieldset title="Step 3">
												<legend>Preview</legend>
												<div class="form-group">
													<label for="" class="col-md-3 control-label">Terms and Conditions</label>
													<div class="col-md-9">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, nemo, atque consequuntur officiis asperiores consectetur porro labore commodi esse error quisquam nihil illum sunt facere inventore possimus autem ab voluptates quibusdam non voluptatum suscipit architecto. Illo, facilis, corporis, veritatis dolores minus quasi iure cupiditate quis autem ducimus nisi obcaecati tenetur sed ea excepturi pariatur consequatur enim labore officia mollitia. Rerum, voluptatem numquam molestiae recusandae iusto ipsum inventore unde accusantium labore delectus? Doloremque, fugit, sunt libero laboriosam cupiditate sed sequi nostrum saepe. Mollitia, alias, expedita accusantium porro error autem dolore veniam commodi nesciunt provident vitae neque. Nostrum, sed, molestias itaque provident inventore natus animi quasi laborum laboriosam facere ratione aperiam iusto. Non ducimus facere sunt doloribus? Asperiores, natus distinctio quis iure!</p>
													</div>
												</div>
											</fieldset>
											<input type="submit" class="finish btn-success btn" value="Submit" />
										</form>
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

	<script type="text/javascript" src="<?php bs('public/assets/js/jquery-1.10.2.min.js ') ?>"></script>
	<!-- Load jQuery -->
	<script type="text/javascript" src="<?php bs('public/assets/js/jqueryui-1.10.3.min.js') ?>"></script>
	<!-- Load jQueryUI -->
	<script type="text/javascript" src="<?php bs('public/assets/js/bootstrap.min.js') ?>"></script>
	<!-- Load Bootstrap -->
	<script type="text/javascript" src="<?php bs('public/assets/js/enquire.min.js') ?>"></script>
	<!-- Load Enquire -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/velocityjs/velocity.min.js') ?>"></script>
	<!-- Load Velocity for Animated Content -->
	<script type="text/javascript" src="<?php bs('public/assets/plugins/velocityjs/velocity.ui.min.js') ?>"></script>

	<script type="text/javascript" src="<?php bs('public/assets/plugins/wijets/wijets.js') ?>"></script>
	<!-- Wijet -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/codeprettifier/prettify.js') ?>"></script>
	<!-- Code Prettifier  -->
	<script type="text/javascript" src="<?php bs('public/assets/plugins/bootstrap-switch/bootstrap-switch.js') ?>"></script>
	<!-- Swith/Toggle Button -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') ?>"></script>
	<!-- Bootstrap Tabdrop -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/iCheck/icheck.min.js') ?>"></script>
	<!-- iCheck -->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js') ?>"></script>
	<!-- nano scroller -->

	<script type="text/javascript" src="<?php bs('public/assets/js/application.js') ?>"></script>
	<script type="text/javascript" src="<?php bs('public/assets/demo/demo.js') ?>"></script>
	<script type="text/javascript" src="<?php bs('public/assets/demo/demo-switcher.js') ?>"></script>

	<!-- End loading site level scripts -->

	<!-- Load page level scripts-->

	<script type="text/javascript" src="<?php bs('public/assets/plugins/form-validation/jquery.validate.min.js') ?>"></script> <!-- Validate Plugin -->
	<script type="text/javascript" src="<?php bs('public/assets/plugins/form-stepy/jquery.stepy.js') ?>"></script> <!-- Stepy Plugin -->

	<script type="text/javascript" src="<?php bs('public/assets/demo/demo-formwizard.js') ?>"></script>

	<!-- End loading page level scripts-->

</body>

</html>