<div class="be-content">
	<div class="page-head">
		<h2 class="page-head-title">Instagram Login</h2>
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb page-head-nav">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item"><a href="#">Social Login</a></li>
				<li class="breadcrumb-item active">Instagram Login</li>
			</ol>
		</nav>
	</div>
	<div class="main-content container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<?php if (!empty($this->session->flashdata('success'))) : ?>
					<div class="alert alert-contrast alert-success alert-dismissible" role="alert">
						<div class="icon"><span class="mdi mdi-check"></span></div>
						<div class="message">
							<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
							<strong> <?= $this->session->flashdata('success') ?> </strong>
						</div>
					</div>
				<?php endif; ?>
				<div class="card card-table card-border-color card-border-color-primary">
					<div class="card-header"> <span class="icon mdi mdi-instagram"></span> Instagram Login
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-9">
								<form action="<?= bs('site_config/insta_config') ?>" method="post" class="form-horizontal row-border" id="social_config">
									<fieldset>
										<div class="form-group">
											<label class="col-sm-2 control-label">App Id</label>
											<div class="col-sm-6">
												<input type="text" name="app_id" placeholder="App ID" class="form-control" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">App Secret</label>
											<div class="col-sm-6">
												<input type="text" name="app_secret" placeholder="App Secret" class="form-control" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Redirect Url</label>
											<div class="col-sm-6">
												<input type="text" name="url" placeholder="Redirect Url" class="form-control" required>
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