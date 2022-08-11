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

	<link type="text/css" href="<?= bs('public/assets/fonts/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet"> <!-- Font Awesome -->
	<link type="text/css" href="<?= bs('public/assets/fonts/themify-icons/themify-icons.css') ?>" rel="stylesheet"> <!-- Themify Icons -->
	<link type="text/css" href="<?= bs('public/assets/css/styles.css" rel="stylesheet') ?>"> <!-- Core CSS with all styles -->

	<link type="text/css" href="<?= bs('public/assets/plugins/codeprettifier/prettify.css') ?>" rel="stylesheet"> <!-- Code Prettifier -->
	<link type="text/css" href="<?= bs('public/assets/plugins/iCheck/skins/minimal/blue.css') ?>" rel="stylesheet"> <!-- iCheck -->

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
					<li><a href="#">UI Elements</a></li>
					<li class="active"><a href="ui-forms.html">Forms</a></li>

				</ol>
				<div class="container-fluid">

					<div data-widget-group="group1">
						<div class="row">
							<div class="col-sm-12">
								<div class="alert alert-inverse">
									Use the <strong>same</strong> code as you would in <a class="alert-link" href="http://getbootstrap.com/">Twitter's Bootstrap</a>!
									<button type="button" class="close" data-dismiss="alert">&times;</button>
								</div>
								<div class="panel panel-midnightblue" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Form Layout</h2>
										<!-- <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div> -->
										<div class="options">
											<ul class="nav nav-tabs">
												<li><a href="#vertical-form" data-toggle="tab">Vertical Form</a></li>
												<li class="active"><a href="#horizontal-form" data-toggle="tab">Horizontal Form</a></li>
												<li><a href="#bordered-row" data-toggle="tab">Bordered Row</a></li>
												<li><a href="#tabular-form" data-toggle="tab">Tabular Form</a></li>
											</ul>
										</div>
									</div>
									<div class="panel-body">
										<div class="tab-content">
											<div class="tab-pane active" id="horizontal-form">
												<form class="form-horizontal">
													<div class="form-group">
														<label for="focusedinput" class="col-sm-2 control-label">Focused Input</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="focusedinput" placeholder="Default Input">
														</div>
														<div class="col-sm-2">
															<p class="help-block">Your help text!</p>
														</div>
													</div>
													<div class="form-group">
														<label for="disabledinput" class="col-sm-2 control-label">Disabled Input</label>
														<div class="col-sm-8">
															<input disabled type="text" class="form-control" id="disabledinput" placeholder="Disabled Input">
														</div>
													</div>
													<div class="form-group">
														<label for="inputPassword" class="col-sm-2 control-label">Password</label>
														<div class="col-sm-8">
															<input type="password" class="form-control" id="inputPassword" placeholder="Password">
														</div>
													</div>
													<div class="form-group">
														<label for="checkbox" class="col-sm-2 control-label">Checkbox</label>
														<div class="col-sm-8">
															<div class="checkbox block"><label><input type="checkbox"> Unchecked</label></div>
															<div class="checkbox block"><label><input type="checkbox" checked> Checked</label></div>
															<div class="checkbox block"><label><input type="checkbox" disabled> Disabled Unchecked</label></div>
															<div class="checkbox block"><label><input type="checkbox" disabled checked> Disabled Checked</label></div>
														</div>
													</div>
													<div class="form-group">
														<label for="checkbox" class="col-sm-2 control-label">Checkbox Inline</label>
														<div class="col-sm-8">
															<div class="checkbox-inline"><label><input type="checkbox"> Unchecked</label></div>
															<div class="checkbox-inline"><label><input type="checkbox" checked> Checked</label></div>
															<div class="checkbox-inline"><label><input type="checkbox" disabled> Disabled Unchecked</label></div>
															<div class="checkbox-inline"><label><input type="checkbox" disabled checked> Disabled Checked</label></div>
														</div>
													</div>
													<div class="form-group">
														<label for="selector1" class="col-sm-2 control-label">Dropdown Select</label>
														<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control">
																<option>Lorem ipsum dolor sit amet.</option>
																<option>Dolore, ab unde modi est!</option>
																<option>Illum, fuga minus sit eaque.</option>
																<option>Consequatur ducimus maiores voluptatum minima.</option>
															</select></div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Multiple Select</label>
														<div class="col-sm-8">
															<select multiple="" class="form-control">
																<option>Option 1</option>
																<option>Option 2</option>
																<option>Option 3</option>
																<option>Option 4</option>
																<option>Option 5</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label for="txtarea1" class="col-sm-2 control-label">Textarea</label>
														<div class="col-sm-8"><textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control"></textarea></div>
													</div>
													<div class="form-group">
														<label for="radio" class="col-sm-2 control-label">Radio</label>
														<div class="col-sm-8">
															<div class="radio block"><label><input type="radio"> Unchecked</label></div>
															<div class="radio block"><label><input type="radio" checked> Checked</label></div>
															<div class="radio block"><label><input type="radio" disabled> Disabled Unchecked</label></div>
															<div class="radio block"><label><input type="radio" disabled checked> Disabled Checked</label></div>
														</div>
													</div>
													<div class="form-group">
														<label for="radio" class="col-sm-2 control-label">Radio Inline</label>
														<div class="col-sm-8">
															<div class="radio-inline"><label><input type="radio"> Unchecked</label></div>
															<div class="radio-inline"><label><input type="radio" checked> Checked</label></div>
															<div class="radio-inline"><label><input type="radio" disabled> Disabled Unchecked</label></div>
															<div class="radio-inline"><label><input type="radio" disabled checked> Disabled Checked</label></div>
														</div>
													</div>
													<div class="form-group">
														<label for="smallinput" class="col-sm-2 control-label label-input-sm">Small Input</label>
														<div class="col-sm-8">
															<input type="text" class="form-control input-sm" id="smallinput" placeholder="Small Input">
														</div>
													</div>
													<div class="form-group">
														<label for="mediuminput" class="col-sm-2 control-label">Medium Input</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="mediuminput" placeholder="Medium Input">
														</div>
													</div>
													<div class="form-group mb-n">
														<label for="largeinput" class="col-sm-2 control-label label-input-lg">Large Input</label>
														<div class="col-sm-8">
															<input type="text" class="form-control input-lg" id="largeinput" placeholder="Large Input">
														</div>
													</div>
												</form>
											</div>
											<div class="tab-pane" id="vertical-form">
												<form>
													<div class="form-group">
														<label for="focusedinput" class="control-label">Focused Input</label>
														<input type="text" class="form-control" id="focusedinput" placeholder="Default Input">
													</div>
													<div class="form-group">
														<label for="disabledinput" class="control-label">Disabled Input</label>
														<input disabled type="text" class="form-control" id="disabledinput" placeholder="Disabled Input">
													</div>
													<div class="form-group">
														<label for="inputPassword" class="control-label">Password</label>
														<input type="password" class="form-control" id="inputPassword" placeholder="Password">
													</div>
													<div class="form-group">
														<label for="checkbox" class="control-label">Checkbox</label>
														<div class="checkbox block"><label><input type="checkbox"> Unchecked</label></div>
														<div class="checkbox block"><label><input type="checkbox" checked> Checked</label></div>
														<div class="checkbox block"><label><input type="checkbox" disabled> Disabled Unchecked</label></div>
														<div class="checkbox block"><label><input type="checkbox" disabled checked> Disabled Checked</label></div>
													</div>
													<div class="form-group">
														<label for="selector1" class="control-label">Dropdown Select</label>
														<select name="selector1" id="selector1" class="form-control">
															<option>Lorem ipsum dolor sit amet.</option>
															<option>Dolore, ab unde modi est!</option>
															<option>Illum, fuga minus sit eaque.</option>
															<option>Consequatur ducimus maiores voluptatum minima.</option>
														</select>
													</div>
													<div class="form-group">
														<label class="control-label">Multiple Select</label>
														<select multiple="" class="form-control">
															<option>Option 1</option>
															<option>Option 2</option>
															<option>Option 3</option>
															<option>Option 4</option>
															<option>Option 5</option>
														</select>
													</div>
													<div class="form-group">
														<label for="txtarea1" class="control-label">Textarea</label>
														<textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control"></textarea>
													</div>
													<div class="form-group">
														<label for="radio" class="control-label">Radio</label>
														<div class="radio block"><label><input type="radio"> Unchecked</label></div>
														<div class="radio block"><label><input type="radio" checked> Checked</label></div>
														<div class="radio block"><label><input type="radio" disabled> Disabled Unchecked</label></div>
														<div class="radio block"><label><input type="radio" disabled checked> Disabled Checked</label></div>
													</div>
													<div class="form-group">
														<label for="smallinput" class="control-label label-input-sm">Small Input</label>
														<input type="text" class="form-control input-sm" id="smallinput" placeholder="Small Input">
													</div>
													<div class="form-group">
														<label for="mediuminput" class="control-label">Medium Input</label>
														<input type="text" class="form-control" id="mediuminput" placeholder="Medium Input">
													</div>
													<div class="form-group">
														<label for="largeinput" class="control-label label-input-lg">Large Input</label>
														<input type="text" class="form-control input-lg" id="largeinput" placeholder="Large Input">
													</div>
												</form>
											</div>
											<div class="tab-pane" id="bordered-row">

												<form class="form-horizontal row-border">
													<div class="form-group">
														<label for="focusedinput" class="col-sm-2 control-label">Focused Input</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="focusedinput" placeholder="Default Input">
														</div>
														<div class="col-sm-2">
															<p class="help-block">Your help text!</p>
														</div>
													</div>
													<div class="form-group">
														<label for="disabledinput" class="col-sm-2 control-label">Disabled Input</label>
														<div class="col-sm-8">
															<input disabled type="text" class="form-control" id="disabledinput" placeholder="Disabled Input">
														</div>
													</div>
													<div class="form-group">
														<label for="inputPassword" class="col-sm-2 control-label">Password</label>
														<div class="col-sm-8">
															<input type="password" class="form-control" id="inputPassword" placeholder="Password">
														</div>
													</div>
													<div class="form-group">
														<label for="checkbox" class="col-sm-2 control-label">Checkbox</label>
														<div class="col-sm-8">
															<div class="checkbox block"><label><input type="checkbox"> Unchecked</label></div>
															<div class="checkbox block"><label><input type="checkbox" checked> Checked</label></div>
															<div class="checkbox block"><label><input type="checkbox" disabled> Disabled Unchecked</label></div>
															<div class="checkbox block"><label><input type="checkbox" disabled checked> Disabled Checked</label></div>
														</div>
													</div>
													<div class="form-group">
														<label for="checkbox" class="col-sm-2 control-label">Checkbox Inline</label>
														<div class="col-sm-8">
															<div class="checkbox-inline"><label><input type="checkbox"> Unchecked</label></div>
															<div class="checkbox-inline"><label><input type="checkbox" checked> Checked</label></div>
															<div class="checkbox-inline"><label><input type="checkbox" disabled> Disabled Unchecked</label></div>
															<div class="checkbox-inline"><label><input type="checkbox" disabled checked> Disabled Checked</label></div>
														</div>
													</div>
													<div class="form-group">
														<label for="selector1" class="col-sm-2 control-label">Dropdown Select</label>
														<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control">
																<option>Lorem ipsum dolor sit amet.</option>
																<option>Dolore, ab unde modi est!</option>
																<option>Illum, fuga minus sit eaque.</option>
																<option>Consequatur ducimus maiores voluptatum minima.</option>
															</select></div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Multiple Select</label>
														<div class="col-sm-8">
															<select multiple="" class="form-control">
																<option>Option 1</option>
																<option>Option 2</option>
																<option>Option 3</option>
																<option>Option 4</option>
																<option>Option 5</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label for="txtarea1" class="col-sm-2 control-label">Textarea</label>
														<div class="col-sm-8"><textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control"></textarea></div>
													</div>
													<div class="form-group">
														<label for="radio" class="col-sm-2 control-label">Radio</label>
														<div class="col-sm-8">
															<div class="radio block"><label><input type="radio"> Unchecked</label></div>
															<div class="radio block"><label><input type="radio" checked> Checked</label></div>
															<div class="radio block"><label><input type="radio" disabled> Disabled Unchecked</label></div>
															<div class="radio block"><label><input type="radio" disabled checked> Disabled Checked</label></div>
														</div>
													</div>
													<div class="form-group">
														<label for="radio" class="col-sm-2 control-label">Radio Inline</label>
														<div class="col-sm-8">
															<div class="radio-inline"><label><input type="radio"> Unchecked</label></div>
															<div class="radio-inline"><label><input type="radio" checked> Checked</label></div>
															<div class="radio-inline"><label><input type="radio" disabled> Disabled Unchecked</label></div>
															<div class="radio-inline"><label><input type="radio" disabled checked> Disabled Checked</label></div>
														</div>
													</div>
													<div class="form-group">
														<label for="smallinput" class="col-sm-2 control-label label-input-sm">Small Input</label>
														<div class="col-sm-8">
															<input type="text" class="form-control input-sm" id="smallinput" placeholder="Small Input">
														</div>
													</div>
													<div class="form-group">
														<label for="mediuminput" class="col-sm-2 control-label">Medium Input</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="mediuminput" placeholder="Medium Input">
														</div>
													</div>
													<div class="form-group">
														<label for="largeinput" class="col-sm-2 control-label label-input-lg">Large Input</label>
														<div class="col-sm-8">
															<input type="text" class="form-control input-lg" id="largeinput" placeholder="Large Input">
														</div>
													</div>
												</form>
											</div>
											<div class="tab-pane" id="tabular-form">
												<form class="form-horizontal tabular-form">
													<div class="form-group">
														<label for="focusedinput" class="col-sm-2 control-label">Focused Input</label>
														<div class="col-sm-8 tabular-border">
															<input type="text" class="form-control" id="focusedinput" placeholder="Default Input">
														</div>
														<div class="col-sm-2">
															<p class="help-block">Your help text!</p>
														</div>
													</div>
													<div class="form-group">
														<label for="disabledinput" class="col-sm-2 control-label">Disabled Input</label>
														<div class="col-sm-8 tabular-border">
															<input disabled type="text" class="form-control" id="disabledinput" placeholder="Disabled Input">
														</div>
													</div>
													<div class="form-group">
														<label for="inputPassword" class="col-sm-2 control-label">Password</label>
														<div class="col-sm-8 tabular-border">
															<input type="password" class="form-control" id="inputPassword" placeholder="Password">
														</div>
													</div>
													<div class="form-group">
														<label for="checkbox" class="col-sm-2 control-label">Checkbox</label>
														<div class="col-sm-8 tabular-border">
															<div class="checkbox block"><label><input type="checkbox"> Unchecked</label></div>
															<div class="checkbox block"><label><input type="checkbox" checked> Checked</label></div>
															<div class="checkbox block"><label><input type="checkbox" disabled> Disabled Unchecked</label></div>
															<div class="checkbox block"><label><input type="checkbox" disabled checked> Disabled Checked</label></div>
														</div>
													</div>
													<div class="form-group">
														<label for="checkbox" class="col-sm-2 control-label">Checkbox Inline</label>
														<div class="col-sm-8 tabular-border">
															<div class="checkbox-inline"><label><input type="checkbox"> Unchecked</label></div>
															<div class="checkbox-inline"><label><input type="checkbox" checked> Checked</label></div>
															<div class="checkbox-inline"><label><input type="checkbox" disabled> Disabled Unchecked</label></div>
															<div class="checkbox-inline"><label><input type="checkbox" disabled checked> Disabled Checked</label></div>
														</div>
													</div>
													<div class="form-group">
														<label for="selector1" class="col-sm-2 control-label">Dropdown Select</label>
														<div class="col-sm-8 tabular-border"><select name="selector1" id="selector1" class="form-control">
																<option>Lorem ipsum dolor sit amet.</option>
																<option>Dolore, ab unde modi est!</option>
																<option>Illum, fuga minus sit eaque.</option>
																<option>Consequatur ducimus maiores voluptatum minima.</option>
															</select></div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Multiple Select</label>
														<div class="col-sm-8 tabular-border">
															<select multiple="" class="form-control">
																<option>Option 1</option>
																<option>Option 2</option>
																<option>Option 3</option>
																<option>Option 4</option>
																<option>Option 5</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label for="txtarea1" class="col-sm-2 control-label">Textarea</label>
														<div class="col-sm-8 tabular-border"><textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control"></textarea></div>
													</div>
													<div class="form-group">
														<label for="radio" class="col-sm-2 control-label">Radio</label>
														<div class="col-sm-8 tabular-border">
															<div class="radio block"><label><input type="radio"> Unchecked</label></div>
															<div class="radio block"><label><input type="radio" checked> Checked</label></div>
															<div class="radio block"><label><input type="radio" disabled> Disabled Unchecked</label></div>
															<div class="radio block"><label><input type="radio" disabled checked> Disabled Checked</label></div>
														</div>
													</div>
													<div class="form-group">
														<label for="radio" class="col-sm-2 control-label">Radio Inline</label>
														<div class="col-sm-8 tabular-border">
															<div class="radio-inline"><label><input type="radio"> Unchecked</label></div>
															<div class="radio-inline"><label><input type="radio" checked> Checked</label></div>
															<div class="radio-inline"><label><input type="radio" disabled> Disabled Unchecked</label></div>
															<div class="radio-inline"><label><input type="radio" disabled checked> Disabled Checked</label></div>
														</div>
													</div>
													<div class="form-group">
														<label for="smallinput" class="col-sm-2 control-label label-input-sm">Small Input</label>
														<div class="col-sm-8 tabular-border">
															<input type="text" class="form-control input-sm" id="smallinput" placeholder="Small Input">
														</div>
													</div>
													<div class="form-group">
														<label for="mediuminput" class="col-sm-2 control-label">Medium Input</label>
														<div class="col-sm-8 tabular-border">
															<input type="text" class="form-control" id="mediuminput" placeholder="Medium Input">
														</div>
													</div>
													<div class="form-group">
														<label for="largeinput" class="col-sm-2 control-label label-input-lg">Large Input</label>
														<div class="col-sm-8 tabular-border">
															<input type="text" class="form-control input-lg" id="largeinput" placeholder="Large Input">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col-sm-8 col-sm-offset-2">
												<button class="btn-primary btn">Submit</button>
												<button class="btn-default btn">Cancel</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Form Layout</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
									</div>
									<div class="panel-body">
										<form role="form" class="form-horizontal">
											<div class="form-group">
												<label class="col-md-2 control-label">Email Address</label>
												<div class="col-md-8">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-envelope-o"></i>
														</span>
														<input type="text" class="form-control" placeholder="Email Address">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Password</label>
												<div class="col-md-8">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-key"></i>
														</span>
														<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Email Address</label>
												<div class="col-md-8">
													<div class="input-group input-icon right">
														<span class="input-group-addon">
															<i class="fa fa-envelope-o"></i>
														</span>
														<i class="fa fa-exclamation-circle tooltips" data-original-title="Invalid email!" data-container="body"></i>
														<input id="email" class="form-control" type="text" placeholder="Email Address">
													</div>
												</div>
												<div class="col-sm-2">
													<p class="help-block">With tooltip</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Password</label>
												<div class="col-md-8">
													<div class="input-group input-icon right">
														<span class="input-group-addon">
															<i class="fa fa-key"></i>
														</span>
														<i class="fa fa-exclamation-circle tooltips" data-original-title="Password too long!" data-container="body"></i>
														<input type="password" class="form-control" placeholder="Password">
													</div>
												</div>
												<div class="col-sm-2">
													<p class="help-block">With tooltip</p>
												</div>
											</div>
											<div class="form-group has-success">
												<label class="col-md-2 control-label">Input Addon Success</label>
												<div class="col-md-8">
													<div class="input-group input-icon right">
														<span class="input-group-addon">
															<i class="fa fa-envelope-o"></i>
														</span>
														<i class="fa fa-check-circle tooltips" data-original-title="Email is valid!" data-container="body"></i>
														<input id="email" class="form-control" type="text" placeholder="Email Address">
													</div>
												</div>
												<div class="col-sm-2">
													<p class="help-block">Email is valid!</p>
												</div>
											</div>
											<div class="form-group has-error">
												<label class="col-md-2 control-label">Input Addon Error</label>
												<div class="col-md-8">
													<div class="input-group input-icon right">
														<span class="input-group-addon">
															<i class="fa fa-key"></i>
														</span>
														<i class="fa fa-exclamation-circle tooltips" data-original-title="Password too long!" data-container="body"></i>
														<input type="password" class="form-control" placeholder="Password">
													</div>
												</div>
												<div class="col-sm-2">
													<p class="help-block">Error!</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Checkbox Addon</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon"><input type="checkbox"></div>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Checkbox Addon</label>
												<div class="col-md-8">
													<div class="input-group">
														<input type="text" class="form-control">
														<div class="input-group-addon"><input type="checkbox"></div>

													</div>
												</div>
												<div class="col-sm-2">
													<p class="help-block">Checkbox on right</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Radio Addon</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-addon"><input type="radio"></div>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Radio Addon</label>
												<div class="col-md-8">
													<div class="input-group">
														<input type="text" class="form-control">
														<div class="input-group-addon"><input type="radio"></div>

													</div>
												</div>
												<div class="col-sm-2">
													<p class="help-block">Radio on right</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Input Processing</label>
												<div class="col-md-8">
													<div class="input-icon right spinner">
														<i class="fa fa-fw fa-spin fa-spinner"></i>
														<input id="email" class="form-control" type="text" placeholder="Processing...">
													</div>
												</div>
												<div class="col-sm-2">
													<p class="help-block">Processing right</p>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Static Paragraph</label>
												<div class="col-md-8">
													<p class="form-control m-n">email@example.com</p>
												</div>
											</div>
											<div class="form-group mb-n">
												<label class="col-md-2 control-label">Readonly</label>
												<div class="col-md-8">
													<input type="text" class="form-control" placeholder="Readonly" readonly="">
												</div>
											</div>
										</form>

									</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col-sm-8 col-sm-offset-2">
												<button class="btn-success btn">Submit</button>
												<button class="btn-default btn">Cancel</button>
												<button class="btn-inverse btn">Reset</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Fluid Input Groups</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body, .panel-footer"}'></div>
									</div>
									<div class="panel-body">
										<form role="form" class="form-horizontal">

											<div class="form-group">
												<label class="col-md-2 control-label">Button Left</label>
												<div class="col-md-8">
													<div class="input-group">
														<span class="input-group-btn">
															<button class="btn btn-default" type="button">Action</button>
														</span>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Button Right</label>
												<div class="col-md-8">
													<div class="input-group">
														<input type="text" class="form-control">
														<span class="input-group-btn">
															<button class="btn btn-default" type="button">Action</button>
														</span>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label">Button Left and Right</label>
												<div class="col-md-8">
													<div class="input-group">
														<span class="input-group-btn">
															<button class="btn btn-default" type="button">Action</button>
														</span>
														<input type="text" class="form-control">
														<span class="input-group-btn">
															<button class="btn btn-default" type="button">Action</button>
														</span>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label">Dropdown Left</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-btn">
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Dropdown <i class="fa fa-angle-down"></i></button>
															<ul class="dropdown-menu">
																<li><a href="#">Action </a></li>
																<li><a href="#">Another action </a></li>
																<li><a href="#">Something else here </a></li>
																<li class="divider"></li>
																<li><a href="#">Separated link </a></li>
															</ul>
														</div>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Dropdown Right</label>
												<div class="col-md-8">
													<div class="input-group">
														<input type="text" class="form-control">
														<div class="input-group-btn">
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Dropdown <i class="fa fa-angle-down"></i></button>
															<ul class="dropdown-menu">
																<li><a href="#">Action </a></li>
																<li><a href="#">Another action </a></li>
																<li><a href="#">Something else here </a></li>
																<li class="divider"></li>
																<li><a href="#">Separated link </a></li>
															</ul>
														</div>

													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label">Both Sides</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-btn">
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Dropdown <i class="fa fa-angle-down"></i></button>
															<ul class="dropdown-menu">
																<li><a href="#">Action </a></li>
																<li><a href="#">Another action </a></li>
																<li><a href="#">Something else here </a></li>
																<li class="divider"></li>
																<li><a href="#">Separated link </a></li>
															</ul>
														</div>
														<input type="text" class="form-control">
														<div class="input-group-btn">
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Dropdown <i class="fa fa-angle-down"></i></button>
															<ul class="dropdown-menu pull-right">
																<li><a href="#">Action </a></li>
																<li><a href="#">Another action </a></li>
																<li><a href="#">Something else here </a></li>
																<li class="divider"></li>
																<li><a href="#">Separated link </a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-2 control-label">Dropdown Group Left</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-btn">
															<button type="button" class="btn btn-default" tabindex="-1">Action</button>
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
																<i class="fa fa-angle-down"></i>
															</button>
															<ul class="dropdown-menu" role="menu">
																<li><a href="#">Action </a></li>
																<li><a href="#">Another action </a></li>
																<li><a href="#">Something else here </a></li>
																<li class="divider"></li>
																<li><a href="#">Separated link </a></li>
															</ul>
														</div>
														<input type="text" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">Dropdown Group Right</label>
												<div class="col-md-8">
													<div class="input-group">
														<input type="text" class="form-control">
														<div class="input-group-btn">
															<button type="button" class="btn btn-default" tabindex="-1">Action</button>
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1"><i class="fa fa-angle-down"></i></button>
															<ul class="dropdown-menu pull-right" role="menu">
																<li><a href="#">Action </a></li>
																<li><a href="#">Another action </a>
																</li>
																<li><a href="#">Something else here </a></li>
																<li class="divider"></li>
																<li><a href="#">Separated link </a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group mb-n">
												<label class="col-md-2 control-label">Both Sides</label>
												<div class="col-md-8">
													<div class="input-group">
														<div class="input-group-btn">
															<button type="button" class="btn btn-default" tabindex="-1">Action</button>
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1"><i class="fa fa-angle-down"></i></button>
															<ul class="dropdown-menu pull-right" role="menu">
																<li><a href="#">Action </a></li>
																<li><a href="#">Another action </a>
																</li>
																<li><a href="#">Something else here </a></li>
																<li class="divider"></li>
																<li><a href="#">Separated link </a></li>
															</ul>
														</div>
														<input type="text" class="form-control">
														<div class="input-group-btn">
															<button type="button" class="btn btn-default" tabindex="-1">Action</button>
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1"><i class="fa fa-angle-down"></i></button>
															<ul class="dropdown-menu pull-right" role="menu">
																<li><a href="#">Action </a></li>
																<li><a href="#">Another action </a>
																</li>
																<li><a href="#">Something else here </a></li>
																<li class="divider"></li>
																<li><a href="#">Separated link </a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col-sm-8 col-sm-offset-2">
												<button class="btn-success btn">Submit</button>
												<button class="btn-default btn">Cancel</button>
												<button class="btn-inverse btn">Reset</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="panel panel-default" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Inline Forms</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
									</div>
									<div class="panel-body">
										<form class="form-inline" role="form">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="sr-only" for="exampleInputEmail2">Email address</label>
														<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
													</div>
													<div class="form-group">
														<label class="sr-only" for="exampleInputPassword2">Password</label>
														<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
													</div>
													<label class="checkbox-inline"><input type="checkbox">Remember Me </label>
												</div>

												<div class="col-md-6">
													<button type="submit" class="btn btn-default">Sign in</button>
													<a href="#modal-form" class="btn btn-success" data-toggle="modal">Modal Form</a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>


						<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="myModalLabel">Sign in</h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-xs-6">
												<p>Sign in to meet your friends!</p>
												<form>
													<div class="form-group">
														<label for="">Email</label>
														<input type="email" class="form-control" placeholder="email@address.com">
													</div>
													<div class="form-group">
														<label for="">Password</label>
														<input type="password" class="form-control" placeholder="Enter Password">
													</div>
													<div class="clearfix">
														<div class="checkbox pull-left">
															<label for=""><input type="checkbox"> Remember Me</label>
														</div>
														<a href="#" class="btn btn-success pull-right">Log In</a>
													</div>
												</form>
											</div>
											<div class="col-xs-6">
												<h4>Not a Member?</h4>
												<p>You can create an account <a href="#">here</a>.</p>
												<p>OR</p>
												<a href="#" class="btn btn-primary btn-block"><i class="fa fa-facebook pull-left"></i> Sign in with Facebook</a>
												<a href="#" class="btn btn-info btn-block"><i class="fa fa-twitter pull-left"></i> Sign in with Twitter</a>
												<a href="#" class="btn btn-danger btn-block"><i class="fa fa-google-plus pull-left"></i> Sign in with Google+</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="panel panel-default" data-widget='{"draggable": "false"}'>
									<div class="panel-heading">
										<h2>Grids</h2>
										<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
									</div>
									<div class="panel-body">
										<p class="mb20">Using <a href="scaffolding-grids.php">Grids</a>, any input box can be placed anywhere and be of any size!</p>
										<form>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-12">
														<input type="text" class="form-control" placeholder=".col-xs-12">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-2">
														<input type="text" class="form-control" placeholder=".col-xs-2">
													</div>
													<div class="col-xs-10">
														<input type="text" class="form-control" placeholder=".col-xs-10">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-3">
														<input type="text" class="form-control" placeholder=".col-xs-3">
													</div>
													<div class="col-xs-9">
														<input type="text" class="form-control" placeholder=".col-xs-9">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-4">
														<input type="text" class="form-control" placeholder=".col-xs-4">
													</div>
													<div class="col-xs-8">
														<input type="text" class="form-control" placeholder=".col-xs-8">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-5">
														<input type="text" class="form-control" placeholder=".col-xs-5">
													</div>
													<div class="col-xs-7">
														<input type="text" class="form-control" placeholder=".col-xs-7">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-6">
														<input type="text" class="form-control" placeholder=".col-xs-6">
													</div>
													<div class="col-xs-6">
														<input type="text" class="form-control" placeholder=".col-xs-6">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-4">
														<input type="text" class="form-control" placeholder=".col-xs-4">
													</div>
													<div class="col-xs-4">
														<input type="text" class="form-control" placeholder=".col-xs-4">
													</div>
													<div class="col-xs-4">
														<input type="text" class="form-control" placeholder=".col-xs-4">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-3">
														<input type="text" class="form-control" placeholder=".col-xs-3">
													</div>
													<div class="col-xs-6">
														<input type="text" class="form-control" placeholder=".col-xs-6">
													</div>
													<div class="col-xs-3">
														<input type="text" class="form-control" placeholder=".col-xs-3">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-2">
														<input type="text" class="form-control" placeholder=".col-xs-2">
													</div>
													<div class="col-xs-8">
														<input type="text" class="form-control" placeholder=".col-xs-8">
													</div>
													<div class="col-xs-2">
														<input type="text" class="form-control" placeholder=".col-xs-2">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-3">
														<input type="text" class="form-control" placeholder=".col-xs-3">
													</div>
													<div class="col-xs-3">
														<input type="text" class="form-control" placeholder=".col-xs-3">
													</div>
													<div class="col-xs-3">
														<input type="text" class="form-control" placeholder=".col-xs-3">
													</div>
													<div class="col-xs-3">
														<input type="text" class="form-control" placeholder=".col-xs-3">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<div class="col-xs-5">
														<input type="text" class="form-control" placeholder=".col-xs-5">
													</div>
													<div class="col-xs-2">
														<input type="text" class="form-control" placeholder=".col-xs-2">
													</div>
													<div class="col-xs-5">
														<input type="text" class="form-control" placeholder=".col-xs-5">
													</div>
												</div>
											</div>
											<div class="form-group mb-n">
												<div class="row">
													<div class="col-xs-2">
														<input type="text" class="form-control" placeholder=".col-xs-2">
													</div>
													<div class="col-xs-2">
														<input type="text" class="form-control" placeholder=".col-xs-2">
													</div>
													<div class="col-xs-2">
														<input type="text" class="form-control" placeholder=".col-xs-2">
													</div>
													<div class="col-xs-2">
														<input type="text" class="form-control" placeholder=".col-xs-2">
													</div>
													<div class="col-xs-2">
														<input type="text" class="form-control" placeholder=".col-xs-2">
													</div>
													<div class="col-xs-2">
														<input type="text" class="form-control" placeholder=".col-xs-2">
													</div>
												</div>
											</div>

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

	<script type="text/javascript" src="<?= bs('public/assets/js/jquery-1.10.2.min.js') ?>"></script> <!-- Load jQuery -->
	<script type="text/javascript" src="<?= bs('public/assets/js/jqueryui-1.10.3.min.js') ?>"></script> <!-- Load jQueryUI -->
	<script type="text/javascript" src="<?= bs('public/assets/js/bootstrap.min.js') ?>"></script> <!-- Load Bootstrap -->
	<script type="text/javascript" src="<?= bs('public/assets/js/enquire.min.js') ?>"></script> <!-- Load Enquire -->

	<script type="text/javascript" src="<?= bs('public/assets/plugins/velocityjs/velocity.min.js') ?>"></script> <!-- Load Velocity for Animated Content -->
	<script type="text/javascript" src="<?= bs('public/assets/plugins/velocityjs/velocity.ui.min.js') ?>"></script>

	<script type="text/javascript" src="<?= bs('public/assets/plugins/wijets/wijets.js') ?>"></script> <!-- Wijet -->

	<script type="text/javascript" src="<?= bs('public/assets/plugins/codeprettifier/prettify.js') ?>"></script> <!-- Code Prettifier  -->
	<script type="text/javascript" src="<?= bs('public/assets/plugins/bootstrap-switch/bootstrap-switch.js') ?>"></script> <!-- Swith/Toggle Button -->

	<script type="text/javascript" src="<?= bs('public/assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') ?>"></script> <!-- Bootstrap Tabdrop -->

	<script type="text/javascript" src="<?= bs('public/assets/plugins/iCheck/icheck.min.js') ?>"></script> <!-- iCheck -->

	<script type="text/javascript" src="<?= bs('public/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js') ?>"></script> <!-- nano scroller -->

	<script type="text/javascript" src="<?= bs('public/assets/js/application.js') ?>"></script>
	<script type="text/javascript" src="<?= bs('public/assets/demo/demo.js') ?>"></script>
	<script type="text/javascript" src="<?= bs('public/assets/demo/demo-switcher.js') ?>"></script>

	<!-- End loading site level scripts -->

	<!-- Load page level scripts-->


	<!-- End loading page level scripts-->

</body>

</html>