<!-- Sidebar Starts -->
<div id="wrapper">
	<div id="layout-static">
		<div class="static-sidebar-wrapper sidebar-default">
			<div class="static-sidebar">
				<div class="sidebar">
					<div class="widget">
						<div class="widget-body">
							<div class="userinfo">
								<div class="avatar">
									<?php
									$user = $this->ion_auth->user()->row();

									if (empty($user->user_img)) {

									?>
										<img src="<?php bs() ?>public/assets/img/default_user.png" class="img-responsive img-circle" width="200" alt="">
									<?php
									} else {
									?>
										<img src="<?php bs() ?>uploads/<?php echo $user->user_img ?>" class="img-responsive img-circle" width="200" alt="">
									<?php
									}


									?>
								</div>
								<div class="info">
									<span class="username">
										<?php
										echo $user->first_name . ' ' . $user->last_name;
										?>
									</span>
									<span class="useremail">
										<?php
										echo $user->email;
										?>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="widget stay-on-collapse" id="widget-sidebar">
						<nav role="navigation" class="widget-body">
							<ul class="acc-menu">
								<li class="nav-separator"><span>Explore</span></li>
								<?php
								$priviliges = group_priviliges();

								foreach ($priviliges as $head_pre) :
									if (empty($head_pre->sub)) :
								?>
										<li>
											<a href="<?= base_url() ?><?= $head_pre->url ?>">
												<?= $head_pre->icon ?>
												<span>
													<?= $head_pre->perm_name ?>
												</span>
											</a>
										</li>

									<?php
									endif;
									if (!empty($head_pre->sub)) :

									?>
										<li>
											<a href="javascript:;">
												<?= $head_pre->icon ?> <span> <?= $head_pre->perm_name ?> </span>
											</a>
											<ul class="acc-menu">

												<?php foreach ($head_pre->sub as $sub) : ?>
													<li>
														<a href="<?= base_url() ?><?= $sub->url ?>">
															<i class="fa fa-angle-right" aria-hidden="true"></i> <?= $sub->perm_name ?>
														</a>
													</li>
												<?php endforeach; ?>

											</ul>
										</li>
								<?php
									endif;
								endforeach;
								?>
								<li class="nav-separator"><span>Extras</span></li>

								<li>
									<a href="<?= base_url('blog/BlogFrontend') ?>" target="_blank">
										<i class="fa fa-address-card-o"></i><span>Visit Blog</span>
									</a>
								</li>


								<li>
									<a href="<?= base_url('blog/BlogFrontend/home') ?>" target="_blank">
										<i class="fa fa-television"></i><span>Front End</span>
									</a>
								</li>

								<li>
									<a href="<?= base_url('extras/dashboard') ?>" target="">
										<i class="ti ti-home"></i><span>Dashboard</span>
									</a>
								</li>
								<li><a href="javascript:;"><i class="ti ti-layout"></i><span>Layout</span></a>
									<ul class="acc-menu">
										<li><a href="<?php bs('extras/layout_grids') ?>">Grid Scaffolding</a></li>
										<li><a href="<?php bs('extras/layout_static_leftbar') ?>">Static Sidebar</a></li>
										<!-- <li><a href="<?php bs('extras/layout_sidebar_scroll') ?>">Scroll Sidebar</a></li> -->
										<!-- <li><a href="<?php bs('extras/layout_horizontal') ?>">Horizontal Nav</a></li> -->
										<li><a href="<?php bs('extras/layout_boxed') ?>">Boxed</a></li>
									</ul>
								</li>
								<li><a href="javascript:;"><i class="ti ti-pencil"></i><span>Forms</span></a>
									<ul class="acc-menu">
										<li><a href="<?php bs('extras/ui_forms') ?>">Form Layout</a></li>
										<li><a href="<?php bs('extras/form_components') ?>">Form Components</a></li>
										<li><a href="<?php bs('extras/form_pickers') ?>">Pickers</a></li>
										<li><a href="<?php bs('extras/form_wizard') ?>">Form Wizard</a></li>
										<li><a href="<?php bs('extras/form_validation') ?>">Form Validation</a></li>
										<li><a href="<?php bs('extras/form_masks') ?>">Form Masks</a></li>
										<li><a href="<?php bs('extras/form_dropzone') ?>">Dropzone Uploader</a></li>
										<li><a href="<?php bs('extras/form_summernote') ?>">Summernote</a></li>
										<li><a href="<?php bs('extras/form_markdown') ?>">Markdown Editor</a></li>
										<li><a href="<?php bs('extras/form_xeditable') ?>">Inline Editor</a></li>
										<li><a href="<?php bs('extras/form_gridforms') ?>">Grid Forms</a></li>
									</ul>
								</li>
								<li>
									<a href="<?php bs('extras/buttons') ?>"><i class="fa fa-plus-circle"></i>
										<span>buttons</span></a>
								</li>
								<li>
									<a href="<?php bs('extras/app_inbox') ?>">
										<i class="ti ti-email"></i>
										<span>Inbox</span>
										<span class="badge badge-danger">3</span>
									</a>
								</li>
								<li>
									<a href="<?php bs('extras/login_and_signup') ?>">
										<i class="ti ti-lock"></i>
										<span>Login & SignUp Form</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>

					<div class="widget" id="widget-progress">
						<div class="widget-heading">
							Progress
						</div>
						<div class="widget-body">

							<div class="mini-progressbar">
								<div class="clearfix mb-sm">
									<div class="pull-left">Bandwidth</div>
									<div class="pull-right">50%</div>
								</div>

								<div class="progress">
									<div class="progress-bar progress-bar-lime" style="width: 50%"></div>
								</div>
							</div>
							<div class="mini-progressbar">
								<div class="clearfix mb-sm">
									<div class="pull-left">Storage</div>
									<div class="pull-right">25%</div>
								</div>

								<div class="progress">
									<div class="progress-bar progress-bar-info" style="width: 25%"></div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Sidebar Ends -->