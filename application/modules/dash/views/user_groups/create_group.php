<div class="be-content">
   <div class="page-head">
      <h2 class="page-head-title">Users Roles & Permissions</h2>
      <nav aria-label="breadcrumb" role="navigation">
         <ol class="breadcrumb page-head-nav">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Roles & Permissions</a></li>
            <li class="breadcrumb-item active">Create Roles & Permissions</li>
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
            <div class="card card-table card-border-color card-border-color-primary">
               <div class="card-header"> <span class="icon mdi mdi-accounts-outline"></span> Create Roles

               </div>
               <div class="card-body">
                  <div class="row ml-5 mt-4">
                     <div class="col-md-6">
                        <?php
                        echo form_open("users/User_groups/create_group", array('id' => 'wizard', 'class' => 'form-horizontal'));
                        ?>
                        <div class="form-group">
                           <label for="fieldname" class="control-label">Group Name</label>
                           <?php echo form_input($group_name); ?>
                           <span id="err_msg" style="color:red"></span>
                        </div>
                        <div class="form-group">
                           <label for="fieldemail" class="control-label">Desc</label>
                           <?php echo form_input($description); ?>
                        </div>
                        <input type="submit" class="finish btn-success btn" value="Submit" />

                     </div>
                     <div class="col-md-3 col-md-offset-1">
                        <h2 class="text-bold">Privileges</h2>
                        <?php foreach ($perm as $key => $value) : ?>
                           <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" name="privilege[]" type="checkbox" value="<?php echo $value->perm_id ?>" id="<?php echo $value->perm_id ?>">
                              <label class="custom-control-label" for="<?php echo $value->perm_id ?>"><?php echo $value->perm_name ?></label>
                           </div>
                        <?php endforeach ?>
                     </div>
                  </div>
               </div>
               <?php echo form_close(); ?>

            </div>
         </div>
      </div>
   </div>
</div>
</div>

<!-- #page-content -->
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