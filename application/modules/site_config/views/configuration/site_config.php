<div class="be-content">
   <div class="page-head">
      <h2 class="page-head-title">Site Configuration</h2>
      <nav aria-label="breadcrumb" role="navigation">
         <ol class="breadcrumb page-head-nav">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Site Configuration</a></li>
            <li class="breadcrumb-item active">Update Site Configuration</li>
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
               <div class="card-header"> <span class="icon mdi mdi-refresh-alt"></span> Update Site Configuration
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-6 ml-5 mt-5">
                        <form action="<?= base_url('site_config/Set_up') ?>" method="post" class="form-horizontal row-border">
                           <div class="form-group">
                              <label class="control-label">Site Name</label>
                              <input type="text" name="site_name" class="form-control" placeholder="Facebook,twitter etc...">
                              <div class="help-block">
                                 The title of your site, used for email.
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label">Admin Email</label>
                              <input type="text" name="admin_email" class="form-control" placeholder="example@gmail.com">
                              <div class="help-block">
                                 Your administrator email address. DEFAULT is 'admin@example.com'.
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label">Login Identity</label>
                              <input type="text" class="form-control" name="login_id" placeholder="uesrname,email etc..">
                              <div class="help-block">
                                 Column to use for uniquely identifying user/logging in/etc. Usual choices are 'email' OR 'user name'. You should add an index in the users table for whatever you set this option to. DEFAULT is 'email'.
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label">Min Password Length</label>
                              <input type="text" class="form-control" name="min_pass" placeholder="3 etc..">
                              <div class="help-block">
                                 Minimum length of passwords. DEFAULT is '8'.
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label">Max Password Length</label>
                              <input type="text" class="form-control" name="max_pass" placeholder="10 etc...">
                              <div class="help-block">
                                 Maximum length of passwords. DEFAULT is '20'.
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label">Max Login Attempts</label>

                              <input type="text" class="form-control" name="login_atmpt" placeholder="6 etc">
                              <div class="help-block">
                                 The maximum number of failed login,Default is 3.
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label">User Expire</label>

                              <input type="text" class="form-control" name="user_expire" placeholder="86500 etc">
                              <div class="help-block">
                                 How long to remember the user (seconds). Set to zero for no expiration, Default is 86500.
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label">Lock time</label>

                              <input type="text" class="form-control" name="lock_time" placeholder="600 etc">
                              <div class="help-block">
                                 The number of seconds to lockout an account due to exceeded attempts, Default is 600.
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="control-label">Email Activation</label>

                              <input type="text" class="form-control" name="email_activation" placeholder="TRUE etc">
                              <div class="help-block">
                                 Email Activation for user registration Default is FALSE, If you want to register new user with email activation then write down TRUE in the above text field and submit the form.
                              </div>
                           </div>
                           <div class="form-group text-center">
                              <button type="submit" class="btn btn-info"> <span class="icon mdi mdi-settings"></span> Set Up</button>
                           </div>
                        </form>
                     </div>
                     <div class="col-sm-5">
                        <div class="alert alert-contrast alert-danger alert-dismissible" role="alert">
                           <div class="icon"><span class="mdi mdi-close-circle-o"></span></div>
                           <div class="message">
                              <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                 <span class="mdi mdi-alert-circle" aria-hidden="true"></span>
                              </button><strong>If You Leave any field in the form the default setting will be apply!</strong> 
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
</div>