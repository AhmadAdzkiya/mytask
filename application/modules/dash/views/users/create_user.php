<div class="be-content">
   <div class="page-head">
      <h2 class="page-head-title">Users</h2>
      <nav aria-label="breadcrumb" role="navigation">
         <ol class="breadcrumb page-head-nav">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Users</a></li>
            <li class="breadcrumb-item active">Create Users</li>
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

            <?php if (!empty($this->session->flashdata('error'))) : ?>
               <div class="alert alert-contrast alert-danger alert-dismissible" role="alert">
                  <div class="icon"><span class="mdi mdi-cross"></span></div>
                  <div class="message">
                     <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
                     <strong> <?= $this->session->flashdata('error') ?> </strong>
                  </div>
               </div>
            <?php endif; ?>

            <div class="card card-table card-border-color card-border-color-primary">
               <div class="card-header"> <span class="icon mdi mdi-accounts-outline"></span> Create Users
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-6 offset-sm-2">
                        <?= form_open('users/Users/add_user', array('id' => 'user_form_validation', 'class' => 'form-horizontal')); ?>
                        <div class="form-group">
                           <label for="fieldname" class="control-label">First Name</label>
                              <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Name" required />
                        </div>
                        <div class="form-group">
                           <label for="fieldname" class="control-label">Last Name</label>
                              <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" required />
                        </div>
                        <div class="form-group">
                           <label for="fieldname" class="control-label">User Name</label>
                              <input type="text" id="username" name="username" class="form-control" placeholder="User Name" required />
                              <div id="username_message" style="color: red;font-weight: bold;"> </div>
                        </div>
                        <?php
                        if ($identity_column !== 'email') {
                           echo '<p>';
                           echo lang('create_user_identity_label', 'identity');
                           echo '<br />';
                           echo form_error('identity');
                           echo form_input($identity);
                           echo '</p>';
                        }
                        ?>
                        <div class="form-group">
                           <label for="fieldname" class="control-label">Email Address</label>
                              <input type="email" id="email" name="email" class="form-control" placeholder="Example@gmail.com" required />
                              <div id="user_mail" style="color: red;font-weight: bold;"></div>
                        </div>
                        <div class="form-group">
                           <label for="fieldname" class="control-label">Company Name</label>
                              <input type="text" id="company" name="company" class="form-control" placeholder="Company Name" required />
                        </div>
                        <div class="form-group">
                           <label for="fieldname" class="control-label">Phone No</label>
                              <input type="text" id="email" name="phone" class="form-control" placeholder="1111-1111-1111" required />
                        </div>
                        <div class="form-group">
                           <label for="fieldname" class="control-label">Password</label>
                              <input type="password" id="password" name="password" class="form-control" placeholder="***********" required minlength="8" />
                        </div>
                        <div class="form-group">
                           <label for="fieldname" class="control-label">Confirm Password</label>
                              <input type="password" id="password" name="confirm_password" class="form-control" placeholder="***********" required />
                        </div>
                        <div class="form-group">
                           <label for="fieldname" class="control-label">Select Group</label>
                              <select class="form-control" name="group" id="" required>
                                 <option value="">Select Group</option>
                                 <?php foreach ($groups as $key => $value) : ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                 <?php endforeach ?>
                              </select>
                        </div>
                        <div class="form-group">
                           <div class="col-md-offset-3">
                              <input type="submit" class="finish btn-success btn" value="Submit">
                           </div>
                           </fieldset>
                        </div>
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
<script>
   $(document).ready(function() {

      //This script is to check email validity
      $("#email").change(function() {

         var email = $("#email").val();

         $.ajax({
            url: '<?= base_url("users/Register/check_email") ?>',
            method: 'POST',
            dataType: 'TEXT',
            data: {
               myemail: email
            },
            success: function(result) {
               var msg = result.split("::");

               if (msg[0] == "ok") {
                  $("#user_mail").fadeIn();
                  $("#user_mail").text("This Email Is Already Registered Please Try With Another.");
               } else {
                  $("#user_mail").fadeIn();
                  $("#user_mail").html("<span class='icon mdi mdi-badge-check text-success'> Success</span>");
                  $("#user_mail").delay(3000).fadeOut();
               }
            },
            error: function(result) {
               // body...
               console.log(result);
            }
         })
      });

      //This script is to check Username validity
      $("#username").change(function() {

         var username = $("#username").val();
         $.ajax({
            url: '<?= base_url("users/Register/check_username") ?>',
            method: 'POST',
            dataType: 'HTML',
            data: {
               u_name: username
            },
            success: function(result) {
               var msg = result.split("::");

               if (msg[0] == "ok") {
                  $("#username_message").fadeIn();
                  $("#username_message").html('This User name Is Already Registered Please Try With Another.');
               } else {
                  $("#username_message").fadeIn();
                  $("#username_message").html("<span class='icon mdi mdi-badge-check text-success'> Success</span>");
                  $("#username_message").delay(3000).fadeOut();
               }
            },
            error: function(result) {
               // body...
               console.log(result);
            }
         })
      });
   });
</script>