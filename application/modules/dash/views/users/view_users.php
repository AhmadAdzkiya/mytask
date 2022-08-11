<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css" />
<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/datatables/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/summernote/summernote-bs4.css"/>

<div class="be-content">
   <div class="page-head">
      <h2 class="page-head-title">All Users List</h2>
      <nav aria-label="breadcrumb" role="navigation">
         <ol class="breadcrumb page-head-nav">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Users</a></li>
            <li class="breadcrumb-item active">View Users</li>
         </ol>
      </nav>
   </div>
   <div class="main-content container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <?php if(!empty($this->session->flashdata('success'))): ?>
            <div class="alert alert-contrast alert-success alert-dismissible" role="alert">
               <div class="icon"><span class="mdi mdi-check"></span></div>
               <div class="message">
                  <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
                  <strong> <?= $this->session->flashdata('success') ?> </strong>
               </div>
            </div>
            <?php endif; ?>
            <div class="card card-table  card-border-color card-border-color-primary">
               <div class="card-header"> <span class="icon mdi mdi-accounts-outline"></span> View Users

               </div>
               <div class="card-body">
                  <table class="table table-striped table-hover table-fw-widget" id="table1">
                     <thead>
                        <tr>
                           <th>User Name</th>
                           <th>First Name</th>
                           <th>Last Name</th>
                           <th>Email</th>
                           <th>Role/Groups</th>
                           <th>Created</th>
                           <?php if ($this->session->userdata("group_id") == 1) : ?>
                              <th>Status</th>
                              <th>Options</th>
                           <?php endif ?>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($users as $user) : ?>
                           <tr>
                              <td>
                                 <?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?>
                              </td>
                              <td>
                                 <?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?>
                              </td>
                              <td>
                                 <?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?>
                              </td>
                              <td>
                                 <?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?>
                              </td>
                              
                              <td>
                                 <?php foreach ($user->groups as $group) : ?>
                                    <?php echo anchor("users/User_groups/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'), 'class="btn btn-rounded btn-space btn-primary"'); ?><br />
                                 <?php endforeach ?>
                              </td>
                              <td>
                                 <?php echo htmlspecialchars(date("Y-m-d H:i:s",$user->created_on), ENT_QUOTES, 'UTF-8'); ?>
                              </td>
                              <?php if ($this->session->userdata("group_id") == 1) : ?>
                                 <td>
                                    <?php echo ($user->active) ? anchor("users/auth/deactivate/" . $user->id, lang('index_active_link'), array('class' => 'btn btn-space btn-outline-primary btn-space')) : anchor("users/activate/" . $user->id, lang('index_inactive_link'), array('class' => 'btn btn-space btn-outline-danger btn-space')); ?>
                                    </a>
                                 </td>
                                 <td>
                                    <div class="btn-group btn-space">
                                       <button class="btn btn-success" type="button">Action</button>
                                       <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
                                          <span class="mdi mdi-chevron-down"></span>
                                          <span class="sr-only">Toggle Dropdown</span>
                                       </button>
                                       <div class="dropdown-menu" role="menu">
                                          <a class="dropdown-item" href="<?= base_url('users/edit_user') ?>/<?= $user->id ?>"><span class="icon mdi mdi-edit"></span> Edit</a>
                                          <a class="dropdown-item" href="<?= base_url('users/delete_user') ?>/<?= $user->id ?>"> <span class="icon mdi mdi-delete"></span> Delete User</a>
                                          <a class="dropdown-item" href="#" id="send_email" data-user-id="<?= $user->id ?>" data-toggle="modal" data-target="#myModal"><span class="icon mdi mdi-mail-send"></span> Send Email</a>
                                          <div class="dropdown-item" style="cursor:pointer" id="resetPassword" onclick="resetPassword(<?= $user->id ?>)"  data-user-id="<?= $user->id ?>" ><span class="icon mdi mdi-vpn-key"></span> Reset password</div>
                                       </div>
                                    </div>
                                 </td>
                              <?php endif ?>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="modal fade colored-header colored-header-primary" id="myModal" tabindex="-1" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header modal-header-colored">
            <h3 class="modal-title"><span class="icon mdi mdi-mail-send"></span> Send Email</h3>
            <button class="close md-close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"> </span></button>
         </div>
         <div class="modal-body">
            <form method="post" action="<?php bs() ?>users/email">
               <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" value="<?php echo $this->config->item('site_title', 'ion_auth') ?>" name="name" placeholder="Name" required>
               </div>
               <div class="form-group">
                  <label>From</label>
                  <input type="email" class="form-control" value="<?php echo $this->config->item('admin_email', 'ion_auth') ?>" name="from_email" placeholder="From" required>
               </div>
               <div class="form-group">
                  <label>To</label>
                  <input type="email" id="to" class="form-control" value="" name="to" placeholder="To" required>
               </div>
               <div class="form-group">
                  <label>Subject</label>
                  <input type="text" class="form-control" name="subject" value="" placeholder="Subject" required>
               </div>
               <div class="form-group">
                  <label>Message</label>
                  <textarea name="msg" class="form-control" rows="10" id="editor1" cols="10" placeholder="Write You Message" required></textarea>
               </div>
         </div>
         <div class="modal-footer">
            <button class="btn btn-secondary md-close" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary md-close" type="submit"><span class="icon mdi mdi-mail-send"></span> Send</button>
         </div>
         </form>
      </div>
   </div>
</div>

<script>

   function doResetPassword(idAkun){
      $.ajax({
         type: 'POST',
         contentType: "application/json; charset=utf-8",
         url : '<?php bs('users/restoreDefaultPassword'); ?>',
         data: JSON.stringify({"id":idAkun}),
         dataType:"json",
         
         success:(res)=>{
            alert(res.message)
         },
         error:(err)=>{
            console.log(err)
         } 
      });
   }

   function resetPassword(id){
      let c = confirm("Yakin reset password akun ini ke deafult?")
      if(c){
         doResetPassword(id)
      }
   }
   $("body").on('click', '#send_email', function(event) {
      event.preventDefault();
      /* Act on the event */

      var id = $(this).attr('data-user-id');
      $.ajax({
            url: '<?php bs() ?>users/email/get_user_email/' + id,
            type: 'POST',
         })
         .done(function(success) {
            var obj = $.parseJSON(success);

            $("#to").val(obj.email);
         })
   });
</script>