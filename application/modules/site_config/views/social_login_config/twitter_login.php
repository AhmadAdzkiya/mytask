<div class="static-content-wrapper">
    <div class="static-content">
        <div class="page-content">
            <ol class="breadcrumb">
				<li><a href="">Home</a></li>
				<li><a href="#">Social Login</a></li>
				<li><a href="#">Twitter Setup</a></li>

            </ol>
            <div class="container-fluid">
                                
				<div data-widget-group="group1">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h2> <i class="ti ti-settings"></i> Twitter Login Setting</h2>
									<div class="panel-ctrls">
										<a href="#" class="button-icon"><i class="ti ti-file"></i></a>
										<a href="#" class="button-icon"><i class="ti ti-mouse"></i></a>
										<a href="#" class="button-icon"><i class="ti ti-settings"></i></a>
									</div>
								</div>
								<div class="panel-body">
									<div class="row">
								 		<div class="col-md-9">
								 		   <form action="<?= bs('site_config/twitter_config') ?>" method="post" class="form-horizontal row-border" id="social_config">
								 		    <fieldset>
								 		      <legend><i class="fa fa-twitter-square"></i> Twitter</legend>
												<div class="form-group">
													<label class="col-sm-2 control-label">App Id</label>
													<div class="col-sm-6">
														<input type="text" name="app_id" class="form-control" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">App Secret</label>
													<div class="col-sm-6">
														<input type="text" name="app_secret" class="form-control" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Redirect Url</label>
													<div class="col-sm-6">
														<input type="text" name="url" class="form-control" required>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label"></label>
													<div class="col-sm-6">
														<button type="submit" class="btn btn-info">Submit</button>
													</div>
												</div>
										     </fieldset>	
											</form>	
									</div>
								</div>
							</div>
				        </div>
			        </div>
		        </div>
	        </div>
        </div>
    </div>
</div>
