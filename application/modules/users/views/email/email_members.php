<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css" />
<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/datatables/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/summernote/summernote-bs4.css"/>


<div class="be-content">
   <div class="page-head">
      <h2 class="page-head-title">Email Members</h2>
      <nav aria-label="breadcrumb" role="navigation">
         <ol class="breadcrumb page-head-nav">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Email Members</li>
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
                  <div class="icon"><span class="mdi mdi-check"></span></div>
                  <div class="message">
                     <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
                     <strong> <?= $this->session->flashdata('error') ?> </strong>
                  </div>
               </div>
            <?php endif; ?>
            <div class="row">
               <form action="<?php bs() ?>users/email/send_email" method="post" accept-charset="utf-8">

                  <div class="col-md-12">
                     <div class="alert alert-info alert-icon alert-icon-colored alert-dismissible" role="alert">
                        <div class="icon"><span class="mdi mdi-info-outline"></span></div>
                        <div class="message">
                           <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
                           <p class="text-bold">
                              You can use this part of the Admin Panel to send out emails to members of your site.Choose option to send Emails.
                           </p>
                           <br>
                           <div class="form-group row pt-1 pb-1">
                              <div class="col-12 col-sm-8 col-lg-6 form-check mt-1">
                                 <label class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="check" id="radio7" value="members" checked><span class="custom-control-label"> Send Email to Members </span>
                                 </label>
                                 <label class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" name="check" id="radio9" value="group"><span class="custom-control-label">Send Email to Group</span>
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
            <div class="card card-table  card-border-color card-border-color-primary email_members">
               <div class="card-header"> <span class="icon mdi mdi-accounts"></span> Email Members

               </div>
               <div class="card-body">
                  <table class="table table-striped table-hover table-fw-widget" id="table1">
                     <thead>
                        <tr>
                           <th>First Name</th>
                           <th>Last Name</th>
                           <th>User Name</th>
                           <th>Email</th>
                           <th>
                              Select Users
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($users as $user) : ?>
                           <tr>
                              <td>
                                 <?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?>
                              </td>
                              <td>
                                 <?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?>
                              </td>
                              <td>
                                 <?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?>
                              </td>
                              <td>
                                 <?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?>
                              </td>
                              <td>
                                 <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="foo[]" value="<?php echo $user->email ?>" id="<?= $user->id ?>">
                                    <label class="custom-control-label" for="<?= $user->id ?>"></label>
                                 </div>

                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="card card-table  card-border-color card-border-color-primary email_group" style="display: none;">
               <div class="card-header"> <span class="mdi mdi-mail-send"></span> Send Email to Group
               </div>
               <div class="card-body">
                  <div class="row ">
                     <div class="col-md-12">
                        <div class="form-group col-md-5">
                           <label for="exampleInputEmail1">Select user Group</label>
                           <select name="group_name" class="form-control">
                              <?php
                              $groups = $this->ion_auth->groups()->result();
                              ?>

                              <?php foreach ($groups as $key => $value) : ?>
                                 <option value="<?php echo $value->id ?>"><?php echo $value->name; ?></option>
                              <?php endforeach ?>

                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card card-table  card-border-color card-border-color-primary">
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="form-group row">
                           <label class="col-12 col-sm-1 col-form-label text-sm-right" for="inputText3">Title</label>
                           <div class="col-12 col-sm-8 col-lg-6">
                              <input class="form-control" type="text" name="title" placeholder="Enter Title" required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-12 col-sm-1 col-form-label text-sm-right" for="inputTextarea3">Message</label>
                           <div class="col-12 col-sm-8 col-lg-6">
                              <textarea class="form-control" id="editor1"></textarea>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label class="col-12 col-sm-1 col-form-label text-sm-right" for="inputTextarea3"></label>
                           <div class="col-12 col-sm-8 col-lg-6">
                              <button type="submit" class="btn btn-success">
                                 <i class="fa fa-paper-plane" aria-hidden="true"></i><span class="mdi mdi-mail-send"></span> Send</button>
                           </div>
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

<script>
   $('body').on('change', '#radio9', function(event) {
      event.preventDefault();
      /* Act on the event */
      $('.email_members').hide('1000');
      $('.email_group').show('1000');
   });

   $('body').on('change', '#radio7', function(event) {
      event.preventDefault();
      /* Act on the event */
      $('.email_members').show('1000');
      $('.email_group').hide('1000');
   });
</script>