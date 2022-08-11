<div class="be-content">
   <div class="page-head">
      <h2 class="page-head-title">User Profile</h2>
      <nav aria-label="breadcrumb" role="navigation">
         <ol class="breadcrumb page-head-nav">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"> User Profile</li>
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

            <div class="card card-table  card-border-color card-border-color-primary">
               <div class="card-header"> <span class="icon mdi mdi-format-list-bulleted"></span>
                  User Profile
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card mt-5">
                           <div class="tab-container">
                              <ul class="nav nav-tabs" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" href="#home" data-toggle="tab" role="tab">About</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#profile" data-toggle="tab" role="tab">Change Profile Avatar</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#messages" data-toggle="tab" role="tab">Change Password</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#edit" data-toggle="tab" role="tab">Edit Profile</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="row">
                                       <div class="col-md-5">
                                          <h4>Personal Information</h4>
                                          <table class="table about-table">
                                             <tbody>
                                                <tr>
                                                   <th>Full Name</th>
                                                   <td><?php echo $user_profile->first_name . " " . $user_profile->last_name ?></td>
                                                </tr>
                                                <!-- <tr>
                                                   <th>Country</th>
                                                   <td>
                                                      <?php
                                                      //ipinfo grabs the ip of the person requesting

                                                      // $getloc = json_decode(file_get_contents("http://ipinfo.io/"));

                                                      // $country_code = $getloc->country; //to get city

                                                      // echo $country_name = get_country_name($country_code);
                                                      ?>
                                                   </td>
                                                </tr> -->
                                                <tr>
                                                   <th>Email</th>
                                                   <td><?php echo $user_profile->email ?></td>
                                                </tr>
                                                <tr>
                                                   <th>Mobile</th>
                                                   <td><?php echo $user_profile->phone ?></td>
                                                </tr>
                                                <tr>
                                                   <th>Created Date</th>
                                                   <td><?php echo date('d-m-y', strtotime($user_profile->date)) ?></td>
                                                </tr>
                                                <tr>
                                                   <th>Mobile No</th>
                                                   <td><?php echo $user_profile->phone ?></td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                                 <?php $user = $this->ion_auth->user()->row(); ?>
                                 <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php bs() ?>users/update_avatar" role="form">
                                             <div class="form-group">
                                                <div class="col-lg-6">
                                                   <?php
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
                                                   <br><br>
                                                   <input type="file" name="chang_image">
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                   <button type="submit" class="btn btn-success">Change</button>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="messages" role="tabpanel">
                                    <div class="row">
                                       <div class="col-md-5">
                                          <?php echo form_open("users/auth/change_password", array("id" => "change_pass")); ?>
                                          <div class="form-group">
                                             <?php echo lang('change_password_old_password_label', 'old_password'); ?> <br />
                                             <?php echo form_input($old_password); ?>
                                          </div>
                                          <div class="form-group">
                                             <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length); ?></label> <br />
                                             <?php echo form_input($new_password); ?>
                                          </div>
                                          <div class="form-group">
                                             <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm'); ?> <br />
                                             <?php echo form_input($new_password_confirm); ?>
                                          </div>
                                          <?php echo form_input($user_id); ?>
                                          <?php echo form_submit('submit', lang('change_password_submit_btn'), 'class="btn btn-primary"'); ?>
                                          <?php echo form_close(); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="edit" role="tabpanel">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <form method="post" action="<?php bs() ?>users/edit_profile">
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">First Name</label>
                                                <input type="text" class="form-control" name="first_name" value="<?php echo $user_profile->first_name ?>">
                                             </div>
                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Last Name</label>
                                                <input type="text" class="form-control" name="last_name" value="<?php echo $user_profile->last_name ?>">
                                             </div>
                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $user_profile->email ?>">
                                             </div>
                                             <div class="form-group">
                                                <label for="exampleInputPassword1">Mobiel No</label>
                                                <input type="text" class="form-control" name="mobile_no" value="<?php echo $user_profile->phone ?>">
                                             </div>
                                             <button type="submit" class="btn btn-primary">Save</button>
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
         </div>
      </div>
   </div>
