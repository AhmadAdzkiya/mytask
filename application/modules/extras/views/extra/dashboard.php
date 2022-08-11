<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login System</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="">
    <meta name="author" content="">

    <link type='text/css' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet'>

     <link type="text/css" href="<?php bs('public/assets/fonts/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="<?php bs('public/assets/fonts/themify-icons/themify-icons.css')?>" rel="stylesheet">              <!-- Themify Icons -->
    <link type="text/css" href="<?php bs('public/assets/css/styles.css')?>" rel="stylesheet">                                     <!-- Core CSS with all styles -->

    <link type="text/css" href="<?php bs('public/assets/plugins/codeprettifier/prettify.css')?>" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="<?php bs('public/assets/plugins/iCheck/skins/minimal/blue.css')?>" rel="stylesheet">              <!-- iCheck -->
    <link type="text/css" href="<?= base_url('public/assets/css/animate.css')?>" rel="stylesheet">              <!-- Animate css -->

	<link type="text/css" href="<?php bs('public/assets/plugins/switchery/switchery.css')?>" rel="stylesheet">   							<!-- Switchery -->

	<link type="text/css" href="<?php bs('public/assets/css/mystyle.css')?>" rel="stylesheet">   

	<link type="text/css" href="<?php bs('public/assets/plugins/progress-skylo/skylo.css') ?>" rel="stylesheet"> 	<!-- Skylo -->

    <!--[if lt IE 10]>
        <script type="text/javascript" src="assets/js/media.match.min.js"></script>
        <script type="text/javascript" src="assets/js/respond.min.js"></script>
        <script type="text/javascript" src="assets/js/placeholder.min.js"></script>
    <![endif]-->
    <!-- The following CSS are included as plugins and can be removed if unused-->
    
<link type="text/css" href="<?php bs('public/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css')?>" rel="stylesheet"> 			<!-- jVectorMap -->

<script type="text/javascript" src="<?= base_url('public/assets/js/jquery-1.10.2.min.js')?>"></script>                          

<a href="javascript:;" id="demoskylo"></a>

					<!-- Load jQuery -->

	<style>
		.success-noty
		{
			background-color: #8bc34a;
			color: white;
		}
		.error-noty
		{
			background-color: #dd191d;
			color:white;
		}
		.error
		{
			color: red;
		}
	</style>

    </head>

    <body class="animated-content">
        
        <header id="topnav" class="navbar navbar-default navbar-fixed-top" role="banner">

	<div class="logo-area">
		<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
			<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
				<span class="icon-bg">
					<i class="ti ti-menu"></i>
				</span>
			</a>
		</span>
		
		<a class="navbar-brand" href="index.html">Avenxo</a>

		<div class="toolbar-icon-bg hidden-xs" id="toolbar-search">
            <div class="input-group">
            	<span class="input-group-btn"><button class="btn" type="button"><i class="ti ti-search"></i></button></span>
				<input type="text" class="form-control" placeholder="Search...">
				<span class="input-group-btn"><button class="btn" type="button"><i class="ti ti-close"></i></button></span>
			</div>
        </div>

	</div><!-- logo-area -->

	<ul class="nav navbar-nav toolbar pull-right">
		
		<li class="toolbar-icon-bg visible-xs-block" id="trigger-toolbar-search">
			<a href="#"><span class="icon-bg"><i class="ti ti-search"></i></span></a>
		</li>
        
		<li class="toolbar-icon-bg hidden-xs">
            <a href="#"><span class="icon-bg"><i class="ti ti-world"></i></span></i></a>
        </li>

        <li class="toolbar-icon-bg hidden-xs">
            <a href="#"><span class="icon-bg"><i class="ti ti-view-grid"></i></span></i></a>
        </li>

        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
            <a href="#" class="toggle-fullscreen"><span class="icon-bg"><i class="ti ti-fullscreen"></i></span></i></a>
        </li>

        <li class="dropdown toolbar-icon-bg hidden-xs">
			<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="ti ti-email"></i></span><span
			class="badge badge-deeporange">2</span></a>
			<div class="dropdown-menu notifications arrow">
				<div class="topnav-dropdown-header">
					<span>Messages</span>
				</div>
				<div class="scroll-pane">
					<ul class="media-list scroll-content">
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="<?php bs('public/assets/img/profile2.jpg') ?>" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Vincent Keller</strong> <span class="text-gray">‒ Design should be ...</span></h4>
									<span class="notification-time">2 mins ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="<?php bs('public/assets/img/profile3.jpg') ?>" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Frend Pratt</strong> <span class="text-gray">‒ I will start with the ...</span></h4>
									<span class="notification-time">40 mins ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="<?php bs('public/assets/img/profile4.jpg') ?>" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Cynthia Hines</strong> <span class="text-gray">‒ Interior bits are ...</span></h4>
									<span class="notification-time">6 hours ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="<?php bs('public/assets/img/profile3.jpg') ?>" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Robin Horton</strong> <span class="text-gray">‒ Are you even ...</span></h4>
									<span class="notification-time">8 days ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="<?php bs('public/assets/img/profile4.jpg') ?>" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Amanda Torrez</strong> <span class="text-gray">‒ The message is ...</span></h4>
									<span class="notification-time">16 hours ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="<?php bs('public/assets/img/profile2.jpg') ?>" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Khan Farhan</strong> <span class="text-gray">‒ Expected the stuff ...</span></h4>
									<span class="notification-time">2 days ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-message">
							<a href="#">
								<div class="media-left">
									<img class="img-circle avatar" src="<?php bs('public/assets/img/profile3.jpg') ?>" alt="" />
								</div>
								<div class="media-body">
									<h4 class="notification-heading"><strong>Will Whedon</strong> <span class="text-gray">‒ The movie of this ...</span></h4>
									<span class="notification-time">4 days ago</span>
								</div>
							</a>
						</li>
					</ul>
				</div>
				<div class="topnav-dropdown-footer">
					<a href="#">See all messages</a>
				</div>
			</div>
		</li>
		
		<li class="dropdown toolbar-icon-bg">
			<a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="ti ti-bell"></i></span><span class="badge badge-deeporange">2</span></a>
			<div class="dropdown-menu notifications arrow">
				<div class="topnav-dropdown-header">
					<span>Notifications</span>
				</div>
				<div class="scroll-pane">
					<ul class="media-list scroll-content">
						<li class="media notification-success">
							<a href="#">
								<div class="media-left">
									<span class="notification-icon"><i class="ti ti-check"></i></span>
								</div>
								<div class="media-body">
									<h4 class="notification-heading">Update 1.0.4 successfully pushed</h4>
									<span class="notification-time">8 mins ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-info">
							<a href="#">
								<div class="media-left">
									<span class="notification-icon"><i class="ti ti-check"></i></span>
								</div>
								<div class="media-body">
									<h4 class="notification-heading">Update 1.0.3 successfully pushed</h4>
									<span class="notification-time">24 mins ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-teal">
							<a href="#">
								<div class="media-left">
									<span class="notification-icon"><i class="ti ti-check"></i></span>
								</div>
								<div class="media-body">
									<h4 class="notification-heading">Update 1.0.2 successfully pushed</h4>
									<span class="notification-time">16 hours ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-indigo">
							<a href="#">
								<div class="media-left">
									<span class="notification-icon"><i class="ti ti-check"></i></span>
								</div>
								<div class="media-body">
									<h4 class="notification-heading">Update 1.0.1 successfully pushed</h4>
									<span class="notification-time">2 days ago</span>
								</div>
							</a>
						</li>
						<li class="media notification-danger">
							<a href="#">
								<div class="media-left">
									<span class="notification-icon"><i class="ti ti-arrow-up"></i></span>
								</div>
								<div class="media-body">
									<h4 class="notification-heading">Initial Release 1.0</h4>
									<span class="notification-time">4 days ago</span>
								</div>
							</a>
						</li>
					</ul>
				</div>
				<div class="topnav-dropdown-footer">
					<a href="#">See all notifications</a>
				</div>
			</div>
		</li>

		<li class="dropdown toolbar-icon-bg">
			<a href="#" class="dropdown-toggle username" data-toggle="dropdown">
				<img class="img-circle" src="<?= base_url('public/assets/img/img1.jpg') ?>" alt="" />
			</a>
			<ul class="dropdown-menu userinfo arrow">
				<li><a href="#/"><i class="ti ti-user"></i><span>Profile</span><span class="badge badge-info pull-right">80%</span></a></li>
				<li><a href="#/"><i class="ti ti-panel"></i><span>Account</span></a></li>
				<li><a href="#/"><i class="ti ti-settings"></i><span>Settings</span></a></li>
				<li class="divider"></li>
				<li><a href="#/"><i class="ti ti-stats-up"></i><span>Earnings</span></a></li>
				<li><a href="#/"><i class="ti ti-view-list-alt"></i><span>Statement</span></a></li>
				<li><a href="#/"><i class="ti ti-money"></i><span>Withdrawals</span></a></li>
				<li class="divider"></li>
				<li>
					<a href="<?= base_url('users/auth/logout') ?>">
           			 	<i class="ti ti-shift-right"></i><span>Sign Out</span>
          			</a>
          		</li>
			</ul>
		</li>

	</ul>

</header>

<?php $this->load->view('template/sidebar') ?>


<div class="static-content-wrapper">
    <div class="static-content">
        <div class="page-content">
            <ol class="breadcrumb">
                                
				<li class=""><a href="">Home</a></li>
				<li class="active"><a href="">Dashboard</a></li>

            </ol>
        <div class="container-fluid">
                                

			<div class="row">
				<div class="col-md-3">
					<div class="info-tile info-tile-alt tile-warning">
						<div class="tile-icon"><i class="ti ti-eye"></i></div>
						<div class="tile-heading"><span>Page Views</span></div>
						<div class="tile-body"><span>1600</span></div>
						<div class="tile-footer"><span class="text-danger">-7.6%</span></div>
					</div>
					</div>
					<div class="col-md-3">
						<div class="info-tile info-tile-alt tile-success">
							<div class="tile-icon"><i class="ti ti-thumb-up"></i></div>
							<div class="tile-heading"><span>Likes</span></div>
							<div class="tile-body"><span>345</span></div>
							<div class="tile-footer"><span class="text-success">+15.4%</span></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info-tile info-tile-alt tile-danger">
							<div class="tile-icon"><i class="ti ti-check-box"></i></div>
							<div class="tile-heading"><span>Bugs Fixed</span></div>
							<div class="tile-body"><span>21</span></div>
							<div class="tile-footer"><span class="text-success">+10.4%</span></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info-tile info-tile-alt tile-info">
							<div class="tile-icon"><i class="ti ti-user"></i></div>
							<div class="tile-heading"><span>New Members</span></div>
							<div class="tile-body"><span>124</span></div>
							<div class="tile-footer"><span class="text-danger">-25.4%</span></div>
						</div>
					</div>
			</div>	

			<div data-widget-group="group1">
				<div class="row">
				<div class="col-md-3">
				<div class="info-tile tile-orange">
					<div class="tile-icon"><i class="ti ti-shopping-cart-full"></i></div>
					<div class="tile-heading"><span>Orders</span></div>
					<div class="tile-body"><span>2,150</span></div>
					<div class="tile-footer"><span class="text-success">22.5% <i class="fa fa-level-up"></i></span></div>
				</div>
				</div>
				<div class="col-md-3">
					<div class="info-tile tile-success">
						<div class="tile-icon"><i class="ti ti-bar-chart"></i></div>
						<div class="tile-heading"><span>Revenues</span></div>
						<div class="tile-body"><span>$75,100</span></div>
						<div class="tile-footer"><span class="text-danger">12.7% <i class="fa fa-level-down"></i></span></div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="info-tile tile-info">
						<div class="tile-icon"><i class="ti ti-stats-up"></i></div>
						<div class="tile-heading"><span>Earnings</span></div>
						<div class="tile-body"><span>$40,150</span></div>
						<div class="tile-footer"><span class="text-success">5.2% <i class="fa fa-level-up"></i></span></div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="info-tile tile-danger">
						<div class="tile-icon"><i class="ti ti-bar-chart-alt"></i></div>
						<div class="tile-heading"><span>Visitors</span></div>
						<div class="tile-body"><span>12,600</span></div>
						<div class="tile-footer"><span class="text-danger">10.5% <i class="fa fa-level-down"></i></span></div>
					</div>
				</div>
					
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-info" data-widget='{"id" : "wiget9", "draggable": "false"}'>
							<div class="panel-heading">
								<h2>Social Stats</h2>
								<div class="panel-ctrls button-icon-bg" 
									data-actions-container="" 
									data-action-collapse='{"target": ".panel-body"}'
									data-action-colorpicker=''
									data-action-refresh-demo='{"type": "circular"}'
									>
								</div>
							</div>
							<div class="panel-editbox" data-widget-controls=""></div>
							<div class="panel-body">
								<div id="socialstats" style="height: 272px;" class="mt-sm mb-sm"></div>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel panel-bluegray" data-widget='{"draggable": "false"}'>
							<div class="panel-heading">
								<h2>Earnings Stats</h2>
								<div class="panel-ctrls button-icon-bg" 
									data-actions-container="" 
									data-action-collapse='{"target": ".panel-body"}'
									data-action-colorpicker=''
									data-action-refresh-demo='{"type": "circular"}'
									>
								</div>
							</div>
							<div class="panel-body">
								<div id="earnings" style="height: 272px;" class="mt-sm mb-sm"></div>
							</div>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-8">
						<div class="panel panel-default" data-widget='{"draggable": "false"}'>
							<div class="panel-heading">
								<h2>Visitor Stats</h2>
								<div class="panel-ctrls button-icon-bg" 
									data-actions-container="" 
									data-action-collapse='{"target": ".panel-body"}'
									data-action-colorpicker=''
									data-action-refresh-demo='{"type": "circular"}'
									>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<div class="spark-container mb-xl">
											<div class="pull-left">
												<h2 class="title" style="color: #cddc39">Pageviews</h2>
												<h3 class="number">19,600</h3>
											</div>
											<div class="pull-right">
												<h2 class="title" style="color: #ff5722; text-align: right;">Sessions</h2>
												<h3 class="number">1,200</h3>
											</div>

											<div class="spark-pageviews"></div>
										</div>
									</div>
									<div class="col-md-6">
										<div id="newvsreturning" style="height: 144px" class="mt-md mb-md"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="spark-container">
											<h2 class="title">Users</h2>
											<h3 class="number">700</h3>
											<div class="spark-users"></div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="spark-container">
											<h2 class="title">Avg. Duration</h2>
											<h3 class="number">00:04:36</h3>
											<div class="spark-avgduration"></div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="spark-container">
											<h2 class="title">Page/Session</h2>
											<h3 class="number">4.20</h3>
											<div class="spark-pagesession"></div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="spark-container">
											<h2 class="title">Bounce Rate</h2>
											<h3 class="number">52.10%</h3>
											<div class="spark-bouncerate"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<div class="col-md-4">
					<div class="panel panel-teal" data-widget='{"draggable": "false"}'>
						<div class="panel-heading">
							<h2>Browsers</h2>
							<div class="panel-ctrls button-icon-bg" 
								data-actions-container="" 
								data-action-collapse='{"target": ".panel-body"}'
								data-action-colorpicker=''
								data-action-refresh-demo='{"type": "circular"}'
								>
							</div>
						</div>
						<div class="panel-body no-padding">
							<table class="table browsers m-n">
								<tbody>
									<tr>
										<td>Google Chrome</td>
										<td class="text-right">43.7%</td>
										<td class="vam" style="width: 56px;">
											<div class="progress m-n">
			                                  <div class="progress-bar progress-bar-teal" style="width: 100%"></div>
			                                </div>
			                            </td>
									</tr>
									<tr>
										<td>Firefox</td>
										<td class="text-right">20.5%</td>
										<td class="vam">
											<div class="progress m-n">
			                                  <div class="progress-bar progress-bar-teal" style="width: 50%"></div>
			                                </div>
			                            </td>
									</tr>
									<tr>
										<td>Opera</td>
										<td class="text-right">14.6%</td>
										<td class="vam">
											<div class="progress m-n">
			                                  <div class="progress-bar progress-bar-teal" style="width: 40%"></div>
			                                </div>
			                            </td>
									</tr>
									<tr>
										<td>Safari</td>
										<td class="text-right">9.1%</td>
										<td class="vam">
											<div class="progress m-n">
			                                  <div class="progress-bar progress-bar-teal" style="width: 25%"></div>
			                                </div>
			                            </td>
									</tr>
									<tr>
										<td>Internet Explorer</td>
										<td class="text-right">5.3%</td>
										<td class="vam">
											<div class="progress m-n">
			                                  <div class="progress-bar progress-bar-teal" style="width: 12.5%"></div>
			                                </div>
			                            </td>
									</tr>
									<tr>
										<td>Torch</td>
										<td class="text-right">2.9%</td>
										<td class="vam">
											<div class="progress m-n">
			                                  <div class="progress-bar progress-bar-teal" style="width: 9%"></div>
			                                </div>
			                            </td>
									</tr>
									<tr>
										<td>Maxthon</td>
										<td class="text-right">2.3%</td>
										<td class="vam">
											<div class="progress m-n">
			                                  <div class="progress-bar progress-bar-teal" style="width: 6%"></div>
			                                </div>
			                            </td>
									</tr>
									<tr>
										<td>Others</td>
										<td class="text-right">1.6%</td>
										<td class="vam">
											<div class="progress m-n">
			                                  <div class="progress-bar progress-bar-teal" style="width: 3%"></div>
			                                </div>
			                            </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-realtime" data-widget='{"draggable": "false"}'>
		                <div class="panel-heading">
		                    <h2>Real-Time</h2>
		                    <div class="panel-ctrls mr-n">
		                    	<div class="mt-md mb-md">
		                    		<input type="checkbox" class="js-switch-success switchery-xs" checked />
								</div>
		                    </div>
		                </div>
		                <div class="panel-body">
		                	<span class="rightnow">Right Now</span>
							<span class="number">20</span>
							<span class="activeuser">active Users right now</span>
		                    <div id="realtime-updates" style="height: 112px" class="centered"></div>
		                </div>
		            </div>
				</div>
				<div class="col-md-8">
					<div class="panel panel-white" data-widget='{"draggable": "false"}'>
		                <div class="panel-heading">
		                    <h2>World Map</h2>
		                    <div class="panel-ctrls button-icon-bg" 
								data-actions-container="" 
								data-action-collapse='{"target": ".panel-body"}'
								data-action-colorpicker=''
								data-action-refresh-demo='{"type": "circular"}'
								>
							</div>
		                </div>
		                <div class="panel-body">
							<div id="worldmap" style="height: 272px; width: 100%;" class="mt-sm mb-sm"></div>
		                </div>
		            </div>
				</div>
				
			</div>
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
</div>


<script type="text/javascript" src="<?= base_url('public/assets/js/jqueryui-1.10.3.min.js')?>"></script>                            <!-- Load jQueryUI -->
<script type="text/javascript" src="<?= base_url('public/assets/js/bootstrap.min.js')?>"></script>                              <!-- Load Bootstrap -->
<script type="text/javascript" src="<?= base_url('public/assets/js/enquire.min.js')?>"></script>                                    <!-- Load Enquire -->

<script type="text/javascript" src="<?= base_url('public/assets/plugins/velocityjs/velocity.min.js')?>"></script>                   <!-- Load Velocity for Animated Content -->
<script type="text/javascript" src="<?= base_url('public/assets/plugins/velocityjs/velocity.ui.min.js')?>"></script>

<script type="text/javascript" src="<?= base_url('public/assets/plugins/wijets/wijets.js')?>"></script>                             <!-- Wijet -->

<script type="text/javascript" src="<?= base_url('public/assets/plugins/codeprettifier/prettify.js')?>"></script>               <!-- Code Prettifier  -->
<script type="text/javascript" src="<?= base_url('public/assets/plugins/bootstrap-switch/bootstrap-switch.js')?>"></script>         <!-- Swith/Toggle Button -->

<script type="text/javascript" src="<?= base_url('public/assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')?>"></script>  <!-- Bootstrap Tabdrop -->

<script type="text/javascript" src="<?= base_url('public/assets/plugins/iCheck/icheck.min.js')?>"></script>                         <!-- iCheck -->

<script type="text/javascript" src="<?= base_url('public/assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js')?>"></script> <!-- nano scroller -->

<script type="text/javascript" src="<?= base_url('public/assets/js/application.js')?>"></script>
<script type="text/javascript" src="<?= base_url('public/assets/demo/demo.js')?>"></script>
<script type="text/javascript" src="<?= base_url('public/assets/demo/demo-switcher.js')?>"></script>

<!-- End loading site level scripts -->

<!-- Charts -->
<script type="text/javascript" src="<?php bs('public/assets/plugins/charts-flot/jquery.flot.min.js')?>"></script>             
  <!-- Flot Main File -->
<script type="text/javascript" src="<?php bs('public/assets/plugins/charts-flot/jquery.flot.pie.min.js')?>"></script>            
 <!-- Flot Pie Chart Plugin -->
<script type="text/javascript" src="<?php bs('public/assets/plugins/charts-flot/jquery.flot.stack.min.js')?>"></script>        
 <!-- Flot Stacked Charts Plugin -->
<script type="text/javascript" src="<?php bs('public/assets/plugins/charts-flot/jquery.flot.orderBars.min.js')?>"></script>     
<!-- Flot Ordered Bars Plugin-->
<script type="text/javascript" src="<?php bs('public/assets/plugins/charts-flot/jquery.flot.resize.min.js')?>"></script>        
  <!-- Flot Responsive -->
<script type="text/javascript" src="<?php bs('public/assets/plugins/charts-flot/jquery.flot.tooltip.min.js')?>"></script>   
  <!-- Flot Tooltips -->
<script type="text/javascript" src="<?php bs('public/assets/plugins/charts-flot/jquery.flot.spline.js')?>"></script>     
   <!-- Flot Curved Lines -->

<script type="text/javascript" src="<?php bs('public/assets/plugins/sparklines/jquery.sparklines.min.js')?>"></script>      
 <!-- Sparkline -->

<script type="text/javascript" src="<?php bs('public/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')?>"></script>   
    <!-- jVectorMap -->
<script type="text/javascript" src="<?php bs('public/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>   
<!-- jVectorMap -->

<script type="text/javascript" src="<?php bs('public/assets/plugins/switchery/switchery.js')?>"></script>            
   <!-- Switchery -->
<script type="text/javascript" src="<?php bs('public/assets/plugins/easypiechart/jquery.easypiechart.js')?>"></script>
<script type="text/javascript" src="<?php bs('public/assets/plugins/fullcalendar/moment.min.js')?>"></script>         
  <!-- Moment.js Dependency -->
<script type="text/javascript" src="<?php bs('public/assets/plugins/fullcalendar/fullcalendar.min.js')?>"></script>    
     <!-- Calendar Plugin -->

<script type="text/javascript" src="<?php bs('public/assets/demo/demo-index.js')?>"></script>


<!-- End loading site level scripts -->
    
    <!-- Load page level scripts-->
                        <!-- Data Tables -->
<script type="text/javascript" src="<?= base_url('public/assets/plugins/datatables/jquery.dataTables.js')?>"></script>    
<script type="text/javascript" src="<?= base_url('public/assets/demo/demo-datatables.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('public/assets/plugins/datatables/dataTables.bootstrap.js')?>"></script>
                         <!-- Bootstrap Support for Datatables -->

<script type="text/javascript" src="<?= base_url('public/assets/plugins/tables-fixedheader/js/dataTables.fixedHeader.js')?>"></script> 		<!-- Fixed Header -->

<script type="text/javascript" src="<?= base_url('public/assets/demo/demo-fixedheadertables.js')?>"></script>
    <!-- End loading page level scripts-->
<script src="<?= base_url('public/assets/js/bootstrap-notify.js') ?>"></script>
    

