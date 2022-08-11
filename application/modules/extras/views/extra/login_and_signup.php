<div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                            <ol class="breadcrumb">
                                
<li><a href="">Home</a></li>
<li><a href="#">Login & Sign Up forms</a></li>

                            </ol>
                            <div class="container-fluid">
                                
<div data-widget-group="group1" id="login-form">
   <div class="row">
		<div class="col-md-4" style="margin-left: 3%">
   			<a href="index.html" class="login-logo">
   				<img src="<?php bs('public/assets/img/logo.png ')?>" class="login-logo">
   			</a>	
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Login Form</h2>
				</div>
				<div class="panel-body">
						
					<form action="" class="form-horizontal" id="validate-form">
						<div class="form-group mb-md">
		                    <div class="col-xs-12">
		                    	<div class="input-group">							
									<span class="input-group-addon">
										<i class="ti ti-user"></i>
									</span>
									<input type="text" class="form-control" placeholder="Username" data-parsley-minlength="6" placeholder="At least 6 characters" required>
								</div>
		                    </div>
						</div>

						<div class="form-group mb-md">
		                    <div class="col-xs-12">
		                    	<div class="input-group">
									<span class="input-group-addon">
										<i class="ti ti-key"></i>
									</span>
									<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
								</div>
		                    </div>
						</div>

						<div class="form-group mb-n">
							<div class="col-xs-12">
								<a href="extras-forgotpassword.html" class="pull-left">Forgot password?</a>
								<div class="checkbox-inline icheck pull-right p-n">
									<label for="">
										<input type="checkbox"></input>
										Remember me
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="panel-footer">
					<div class="clearfix">
						<a href="extras-registration.html" class="btn btn-default pull-left">Register</a>
						<a href="extras-login.html" class="btn btn-primary pull-right">Login</a>
					</div>
				</div>
			</div>

			<div class="text-center">
				<a href="#" class="btn btn-label btn-social btn-facebook mb-md"><i class="ti ti-facebook"></i>Connect with Facebook</a>
				<a href="#" class="btn btn-label btn-social btn-twitter mb-md"><i class="ti ti-twitter"></i>Connect with Twitter</a>
			</div>
		</div>

		<div class="col-md-6 col-md-offset-1">
			<a href="index.html" class="login-logo">
   				<img src="<?php bs('public/assets/img/logo.png ')?>" style="padding: 0px 0px 7% 20%">
   			</a>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Registration Form</h2>
				</div>
				<div class="panel-body">
					<form action="" class="form-horizontal">
						<div class="form-group mb-md">
							<label for="FullName" class="col-xs-4 control-label">Full Name</label>
	                        <div class="col-xs-8">
	                        	<input type="text" class="form-control" name="FullName" id="FulltName" placeholder="Full Name" required>
	                        </div>
	                       
						</div>
						<div class="form-group mb-md">
							<label for="Username" class="col-xs-4 control-label">Username</label>
	                        <div class="col-xs-8">
	                        	<input type="text" class="form-control" name="Username" id="Username" placeholder="Username" required>
	                        </div>
						</div>
						<div class="form-group mb-md">
							<label for="Email" class="col-xs-4 control-label">Email</label>
	                        <div class="col-xs-8">
	                        	<input type="text" class="form-control" name="Email" id="Email" placeholder="Email" required>
	                        </div>
						</div>
						<div class="form-group mb-md">
							<label for="Password" class="col-xs-4 control-label">Password</label>
	                        <div class="col-xs-8">
	                        	<input type="password" class="form-control" name="Password" id="Password" placeholder="Password" required>
	                        </div>
						</div>
						<div class="form-group mb-md">
							<label for="ConfirmPassword" class="col-xs-4 control-label">Confirm</label>
	                        <div class="col-xs-8">
	                        	<input type="password" class="form-control" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password" required>
	                        </div>
						</div>
						<div class="form-group mb-n">
							<div class="col-xs-12">
								<div class="checkbox icheck">
									<label for=""><input type="checkbox" /> I accept the <a href="#">user agreement</a></label>
								</div>
							</div>
						</div>
						
					</form>
					
				</div>
				<div class="panel-footer">
					<div class="clearfix">
						<a href="extras-login.html" class="btn btn-default pull-left">Already Registered? Login</a>
						<a href="extras-registration.html" class="btn btn-primary pull-right">Register</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
</div>


