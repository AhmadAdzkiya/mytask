<div class="be-content">
   <div class="page-head">
      <h2 class="page-head-title">Login Page Settings</h2>
      <nav aria-label="breadcrumb" role="navigation">
         <ol class="breadcrumb page-head-nav">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Login Page Settings</a></li>
            <li class="breadcrumb-item active">Update Login Page Settings</li>
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
            <div class="alert alert-contrast alert-success alert-dismissible" role="alert" style="display: none">
               <div class="icon"><span class="mdi mdi-check"></span></div>
               <div class="message">
                  <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
                  <strong class="msg"> </strong>
               </div>
            </div>
            <div class="card card-table card-border-color card-border-color-primary">
               <div class="card-header"> <span class="icon mdi mdi-settings"></span> Login Page Settings
               </div>
               <div class="card-body">
                  <div class="row mt-5">
                     <div class="col-12 col-lg-12">
                        <div class="card">
                           <div class="tab-container">
                              <ul class="nav nav-tabs" role="tablist">
                                 <li class="nav-item"><a class="nav-link active" href="#home" data-toggle="tab" role="tab"> User Registration</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#profile" data-toggle="tab" role="tab"> Forgot Password</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#messages" data-toggle="tab" role="tab"> Social Logins</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#two_factor_auth" data-toggle="tab" role="tab"> Two Factor Authentication </a></li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="row">
                                       <div class="col-md-7">
                                          <fieldset>
                                             <legend>
                                                Enable / Disable User Registration
                                             </legend>
                                             <p>
                                                Click to change the Status of User Registration.
                                             </p>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                   <div class="radio radio-danger">

                                                      <?php if ($reg_status[0]->registration_status == 1) : ?>

                                                         <input type="radio" name="status" value="1" class="status_enable" checked>
                                                         <label for="radio3">
                                                            Enable
                                                         </label>

                                                      <?php else : ?>

                                                         <input type="radio" name="status" value="1" class="status_enable">
                                                         <label for="radio3">
                                                            Enable
                                                         </label>

                                                      <?php endif; ?>
                                                   </div>
                                                   <div class="radio radio-danger">
                                                      <?php if ($reg_status[0]->registration_status == 0) : ?>
                                                         <input type="radio" name="status" value="0" class="status_disable" checked>
                                                         <label for="radio4">
                                                            Disable
                                                         </label>
                                                      <?php else : ?>
                                                         <input type="radio" name="status" value="0" class="status_disable">
                                                         <label for="radio4">
                                                            Disable
                                                         </label>
                                                      <?php endif; ?>
                                                   </div>
                                                </div>
                                             </div>
                                          </fieldset>
                                       </div>
                                       <div class="col-md-5 reg_msg">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="row">
                                       <div class="col-md-7">
                                          <fieldset>
                                             <legend>
                                                Enable / Disable Forgot Password
                                             </legend>
                                             <p>
                                                Click to change the Status of Forgot Password.
                                             </p>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                   <div class="radio radio-danger">
                                                      <?php if ($reg_status[0]->forgot_pass_status == 1) : ?>
                                                         <input type="radio" name="forgot_pass" id="forgot_pass" class="forgot_pass" value="1" checked>
                                                         <label for="radio3">
                                                            Enable
                                                         </label>
                                                      <?php else : ?>
                                                         <input type="radio" name="forgot_pass" id="forgot_pass" class="forgot_pass" value="1">
                                                         <label for="radio3">
                                                            Enable
                                                         </label>
                                                      <?php endif; ?>
                                                   </div>
                                                   <div class="radio radio-danger">
                                                      <?php if ($reg_status[0]->forgot_pass_status == 0) : ?>
                                                         <input type="radio" name="forgot_pass" id="forgot_pass" class="forgot_pass" value="0" checked>
                                                         <label for="radio4">
                                                            Disable
                                                         </label>
                                                      <?php else : ?>
                                                         <input type="radio" name="forgot_pass" id="forgot_pass" class="forgot_pass" value="0">
                                                         <label for="radio4">
                                                            Disable
                                                         </label>
                                                      <?php endif; ?>
                                                   </div>
                                                </div>
                                             </div>
                                          </fieldset>
                                       </div>
                                       <div class="col-md-5 forgot_pass_status">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="messages" role="tabpanel">
                                    <div class="row">
                                       <div class="col-md-7">
                                          <fieldset>
                                             <legend>
                                                Enable / Disable Social Logins
                                             </legend>
                                             <p>
                                                Click to change the Status of Social Logins.
                                             </p>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                   <div class="radio radio-danger">
                                                      <?php if ($reg_status[0]->socail_login_status == 1) : ?>
                                                         <input type="radio" name="social_login" id="social_login" class="social_login" value="1" checked>
                                                         <label for="radio3">
                                                            Enable
                                                         </label>
                                                      <?php else : ?>
                                                         <input type="radio" name="social_login" id="social_login" class="social_login" value="1">
                                                         <label for="radio3">
                                                            Enable
                                                         </label>
                                                      <?php endif; ?>
                                                   </div>
                                                   <div class="radio radio-danger">
                                                      <?php if ($reg_status[0]->socail_login_status == 0) :   ?>
                                                         <input type="radio" name="social_login" id="social_login" class="social_login" value="0" checked>
                                                         <label for="radio4">
                                                            Disable
                                                         </label>
                                                      <?php else :  ?>
                                                         <input type="radio" name="social_login" id="social_login" class="social_login" value="0">
                                                         <label for="radio4">
                                                            Disable
                                                         </label>
                                                      <?php endif; ?>
                                                   </div>
                                                </div>
                                             </div>
                                          </fieldset>
                                       </div>
                                       <div class="col-md-5 social_login">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="two_factor_auth" role="tabpanel">
                                    <div class="row">
                                       <div class="col-md-7">
                                          <fieldset>
                                             <legend>
                                                Enable / Disable Two Factor Authentication
                                             </legend>
                                             <p>
                                                Click to change the Status of Two Fator Authentication.
                                             </p>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                   <div class="radio radio-danger">

                                                      <?php if ($reg_status[0]->two_factor_auth == 1) : ?>

                                                         <input type="radio" name="two_factor_auth" id="two_factor_auth" class="two_factor_auth" value="1" checked>
                                                         <label for="radio3">
                                                            Enable
                                                         </label>

                                                      <?php else : ?>

                                                         <input type="radio" name="two_factor_auth" id="two_factor_auth" class="two_factor_auth" value="1">
                                                         <label for="radio3">
                                                            Enable
                                                         </label>

                                                      <?php endif; ?>

                                                   </div>
                                                   <div class="radio radio-danger">
                                                      <?php if ($reg_status[0]->two_factor_auth == 0) :   ?>

                                                         <input type="radio" name="two_factor_auth" id="two_factor_auth" class="two_factor_auth" value="0" checked>
                                                         <label for="radio4">
                                                            Disable
                                                         </label>

                                                      <?php else :  ?>

                                                         <input type="radio" name="two_factor_auth" id="two_factor_auth" class="two_factor_auth" value="0">
                                                         <label for="radio4">
                                                            Disable
                                                         </label>

                                                      <?php endif; ?>
                                                   </div>
                                                </div>
                                             </div>
                                          </fieldset>
                                       </div>
                                       <div class="col-md-5 two_factor_auth">
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
      </div>
   </div>
</div>
</div>

<script>
   $(document).ready(function() {
      $("body").on('change', '.status_enable', function(event) {
         event.preventDefault();
         /* Act on the event */

         var enable = $('.status_enable').val();

         $.ajax({
            url: "<?php bs('site_config/login_setup/reg_status') ?>",
            method: 'POST',
            data: {
               status: enable
            },
            dataType: 'text',
            success: function(data) {

               $('.msg').text('User Registration Enable Successfully! ')
               $('.alert-success').show();
               set_time()

            }

         });
      });

      $("body").on('change', '.status_disable', function(event) {
         event.preventDefault();
         /* Act on the event */

         var disable = $('.status_disable').val();

         $.ajax({
            url: "<?php bs('site_config/login_setup/reg_status') ?>",
            method: 'POST',
            data: {
               status: disable
            },
            dataType: 'text',
            success: function(data) {
               $('.msg').text('User Registration Disable Successfully! ')
               $('.alert-success').show();
               set_time()
            }
         });
      });
   });
</script>
<script>
   //forgot password enable or disable  
   $("body").on('change', '.forgot_pass', function(event) {
      event.preventDefault();
      /* Act on the event */

      var status = (this.value === '1') ? '1' : '0';

      $.ajax({
         url: '<?php bs('site_config/login_setup/forgot_pass_status') ?>',
         method: 'POST',
         data: {
            status: status
         },
         dataType: 'text',
         success: function(data) {
            if (status == 1) {

               $('.msg').text('Forgot Password Enable Successfully! ')
               $('.alert-success').show();
               set_time()
            } else {

               $('.msg').text('Forgot Password Disable Successfully! ')
               $('.alert-success').show();
               set_time()
            }

         }

      });
   });
</script>
<script>
   //forgot password enable or disable  
   $("body").on('change', '.social_login', function(event) {
      event.preventDefault();
      /* Act on the event */

      var status = (this.value === '1') ? '1' : '0';

      $.ajax({
         url: '<?php bs('site_config/login_setup/social_login_status') ?>',
         method: 'POST',
         data: {
            status: status
         },
         dataType: 'text',
         success: function(data) {
            if (status == 1) {

               $('.msg').text('Social Logins Enable Successfully! ')
               $('.alert-success').show();
               set_time()

            } else {

               $('.msg').text('Social Logins Disable Successfully! ')
               $('.alert-success').show();
               set_time()
            }

         }

      });
   });
</script>
<script>
   //forgot password enable or disable  
   $("body").on('change', '.two_factor_auth', function(event) {
      event.preventDefault();
      /* Act on the event */

      var status = (this.value === '1') ? '1' : '0';

      $.ajax({
         url: '<?php bs('site_config/login_setup/two_factor_auth') ?>',
         method: 'POST',
         data: {
            status: status
         },
         dataType: 'text',
         success: function(data) {
            if (status == 1) {

               $('.msg').text('Two factor Authentication Enable Successfully! ')
               $('.alert-success').show();
               set_time()

            } else {

               $('.msg').text('Two factor Authentication Disable Successfully! ')
               $('.alert-success').show();
               set_time()
            }

         }

      });
   });

   // Set Time for Alert
   function set_time() {
      $(".alert-success").fadeIn('slow').delay(2000).fadeOut('slow');
   }

   function hide_errors() {
      $('.alert-danger').fadeIn('slow').delay(2000).fadeOut('slow');
   }
</script>