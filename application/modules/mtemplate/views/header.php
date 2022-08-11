<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="<?= bs() ?>public/b-asset/img/mulanlogo.png">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/perfect-scrollbar/css/perfect-scrollbar.css" />
	<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/material-design-icons/css/material-design-iconic-font.min.css" />

	<link rel="stylesheet" href="<?= bs() ?>public/b-asset/css/app.css" type="text/css" />
	<link rel="stylesheet" href="<?= bs() ?>public/b-asset/css/style-admin.css" type="text/css" />
	<link rel="stylesheet" href="<?= bs() ?>public/b-asset/css/fontawesome.min.css" type="text/css" />
	<link rel="stylesheet" href="<?= bs() ?>public/b-asset/css/solid.min.css" type="text/css" />
	<link rel="stylesheet" href="<?= bs() ?>public/b-asset/css/all.min.css" type="text/css" />
	
	<link rel="stylesheet" href="<?= bs() ?>public/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" type="text/css" />
	<link rel="stylesheet" href="<?= bs() ?>public/assets/plugins/form-select2/select2.css" type="text/css" />
	<link rel="stylesheet" href="<?= bs() ?>public/b-asset/lib/smartwizard/css/smart_wizard.min.css" type="text/css" />
	<link rel="stylesheet" href="<?= bs() ?>public/b-asset/lib/smartwizard/css/smart_wizard_theme_arrows.min.css" type="text/css" />







	<script src="<?= bs() ?>public/b-asset/lib/jquery/jquery.min.js" type="text/javascript"></script>

</head>
<?php
$user = $this->ion_auth->user()->row();
?>

<body>
	<div class="be-wrapper">
		<nav class="navbar navbar-expand fixed-top be-top-header">
			<div class="container-fluid">
				<div class="be-navbar-header">
					<a class="" href="#">
						<h2> &nbsp;&nbsp; <img style="height:2rem; width:2rem; margin:auto;" src="<?= bs() ?>public/b-asset/img/.png"> ADM</h2>
					</a>
				</div>
				<div class="be-right-navbar">
					<ul class="nav navbar-nav float-right be-user-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
								<?php
								if (empty($user->user_img)) {

								?>
									<img src="<?= bs() ?>public/b-asset/img/avatar.png" alt="Avatar">
								<?php
								} else {
								?>
									<img  src="<?php bs() ?>uploads/<?php echo $user->user_img ?>" class="img-responsive img-circle" width="200" height="200" alt="">
								<?php
								}
								?>

								<span class="user-name"> <?= $user->username; ?> </span>
							</a>
							<div class="dropdown-menu" role="menu">
								<div class="user-info">
									<div class="user-name"><?= $user->username; ?></div>
									<div class="user-position online">Available</div>
								</div>
								<a class="dropdown-item" href="pages-profile.html">
									<a class="dropdown-item" href="<?php bs('users/profile') ?>">
										<span class="icon mdi mdi-settings"></span>Settings
									</a>
									<a class="dropdown-item" href="<?php bs('users/change_password/'.urlencode(base64_encode($this->ion_auth->user()->row()->id))); ?>">
										<span class="icon mdi mdi-settings"></span>Ubah password
									</a>
									<a class="dropdown-item" href="<?= base_url('users/auth/logout') ?>">
										<span class="icon mdi mdi-power"></span>Logout
									</a>
							</div>
						</li>
					</ul>
					<ul class="nav navbar-nav float-right be-icons-nav">
						<li class="nav-item dropdown"><a class="nav-link be-toggle-right-sidebar" href="#" role="button" aria-expanded="false"><span class="icon mdi mdi-settings"></span></a></li>
						<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
							<ul class="dropdown-menu be-notifications">
								<li>
									<div class="title">Notifications<span class="badge badge-pill">3</span></div>
									<div class="list">
										<div class="be-scroller-notifications">
											<div class="content">
												<ul>
													<li class="notification notification-unread"><a href="#">
															<div class="image"><img src="<?= bs() ?>public/b-asset/img/avatar2.png" alt="Avatar"></div>
															<div class="notification-info">
																<div class="text"><span class="user-name">aa</span> bb.</div><span class="date">2 min ago</span>
															</div>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="footer"> <a href="#">View all notifications</a></div>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon mdi mdi-apps"></span></a>
							<ul class="dropdown-menu be-connections">
								<li>
									<div class="list">
										<div class="content">
											<div class="row">
												<div class="col"><a class="connection-item" href="#"><img src="<?= bs() ?>public/b-asset/img/github.png" alt="Github"><span>GitHub</span></a></div>
												<div class="col"><a class="connection-item" href="#"><img src="<?= bs() ?>public/b-asset/img/bitbucket.png" alt="Bitbucket"><span>Bitbucket</span></a></div>
												<div class="col"><a class="connection-item" href="#"><img src="<?= bs() ?>public/b-asset/img/slack.png" alt="Slack"><span>Slack</span></a></div>
											</div>
											<div class="row">
												<div class="col"><a class="connection-item" href="#"><img src="<?= bs() ?>public/b-asset/img/dribbble.png" alt="Dribbble"><span>Dribbble</span></a></div>
												<div class="col"><a class="connection-item" href="#"><img src="<?= bs() ?>public/b-asset/img/mail_chimp.png" alt="Mail Chimp"><span>Mail Chimp</span></a></div>
												<div class="col"><a class="connection-item" href="#"><img src="<?= bs() ?>public/b-asset/img/dropbox.png" alt="Dropbox"><span>Dropbox</span></a></div>
											</div>
										</div>
									</div>
									<div class="footer"> <a href="#">More</a></div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
