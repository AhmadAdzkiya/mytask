<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css" />
<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/datatables/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" />

<div class="be-content">
   <div class="page-head">
      <h2 class="page-head-title">Users Roles & Permissions</h2>
      <nav aria-label="breadcrumb" role="navigation">
         <ol class="breadcrumb page-head-nav">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Roles & Permissions</a></li>
            <li class="breadcrumb-item active">Edit Roles & Permissions</li>
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
               <div class="alert alert-contrast alert-success alert-dismissible" role="alert">
                  <div class="icon"><span class="mdi mdi-check"></span></div>
                  <div class="message">
                     <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
                     <strong> <?= $this->session->flashdata('error') ?> </strong>
                  </div>
               </div>
            <?php endif; ?>
            <div class="card card-table  card-border-color card-border-color-primary">
               <div class="card-header"> <span class="icon mdi mdi-accounts-outline"></span> Update Role

               </div>
               <div class="card-body">
                  <div class="row ml-5">
                     <div class="col-md-6">
                        <p><?php echo lang('edit_group_subheading'); ?></p>
                        <?php echo form_open(current_url()); ?>
                        <p>
                           <?php echo lang('edit_group_name_label', 'group_name'); ?> <br />
                           <?php echo form_input($group_name); ?>
                           <span id="err_msg" style="color:red"></span>
                        </p>
                        <p>
                           <?php echo lang('edit_group_desc_label', 'description'); ?> <br />
                           <?php echo form_input($group_description); ?>
                        </p>
                        <p><?php echo form_submit('submit', lang('edit_group_submit_btn'), 'class="btn btn-primary"'); ?></p>
                     </div>
                     <div class="col-md-3 col-md-offset-1">
                        <h4>Privileges</h4>
                        <?php if ($this->ion_auth->is_admin()) : ?>
                           <?php foreach ($privileges as $privilege) : ?>
                              <?php
                              $pID = $privilege->perm_id;
                              $checked = null;
                              $item = null;
                              foreach ($crtPrivilege as $pri) {
                                 if ($pID == $pri->perm_id) {
                                    $checked = ' checked="checked"';
                                    break;
                                 }
                              }
                              ?>
                              <div class="custom-control custom-checkbox">
                                 <input class="custom-control-input" type="checkbox" name="privlg[]" id="<?php echo $privilege->perm_id; ?>" value="<?php echo $privilege->perm_id; ?>" <?php echo $checked; ?>>

                                 <label class="custom-control-label" for="<?php echo $privilege->perm_id; ?>"> <?php echo htmlspecialchars($privilege->perm_name, ENT_QUOTES, 'UTF-8'); ?></label>
                              </div>
                           <?php endforeach ?>
                        <?php endif ?>
                     </div>
                  </div>
                  <?php echo form_close(); ?>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
   $(document).ready(function() {

      //This script is to check email validity
      $("body").on('change', '#group_name', function() {
         var group_name = $("#group_name").val();

         if (group_name.length === 0) {
            $('#err_msg').text('Group Name is required');
            return false;
         }

         $.ajax({
            url: '<?= base_url("users/User_groups/check_group_name") ?>',
            method: 'POST',
            dataType: 'TEXT',
            data: {
               group_name: group_name
            },
            success: function(result) {
               var msg = result.split("::");

               if (msg[0] == "ok") {
                  $("#err_msg").fadeIn();
                  $("#err_msg").text("Group name already taken.");
               } else {
                  console.log('Success');
                  $("#err_msg").fadeIn();
                  $("#err_msg").html("<span class='icon mdi mdi-badge-check text-success'> Success</span>");
                  $("#err_msg").delay(3000).fadeOut();
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