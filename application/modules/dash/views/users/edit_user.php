<div class="be-content">
  <div class="page-head">
    <h2 class="page-head-title">All Users List</h2>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb page-head-nav">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Users</a></li>
        <li class="breadcrumb-item active">Update User</li>
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
          <div class="card-header"> <span class="icon mdi mdi-account-box"></span> Update User

          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-7 offset-sm-2">
                <?php echo validation_errors();  ?>
                <?= form_open(uri_string(), array('id' => 'social_config', 'class' => 'form-horizontal validate justify-content-center')); ?>
                <div class="form-group">
                  <label for="fieldname" class="control-label">First Name</label>
                  <?php
                  $first_name['class'] = 'form-control';
                  echo form_input($first_name);
                  ?>

                </div>
                <div class="form-group">
                  <label for="fieldname" class="control-label">Last Name</label>
                  <?php
                  $last_name['class'] = 'form-control';
                  echo form_input($last_name);
                  ?>
                </div>
                <div class="form-group">
                  <label for="fieldname" class="control-label">User Name</label>
                  <?php
                  echo form_input($username);
                  ?>
                </div>
                <div class="form-group">
                  <label for="fieldname" class="control-label">Email Address</label>
                  <?php
                  echo form_input($email);
                  ?>
                </div>
                <div class="form-group">
                  <label for="fieldname" class="control-label">Company Name</label>
                  <?php
                  echo form_input($company);
                  ?>
                </div>
                <div class="form-group">
                  <label for="fieldname" class="control-label">Phone No</label>
                  <?php
                  echo form_input($phone);
                  ?>
                </div>
                <div class="form-group">
                  <label for="fieldname" class="control-label">Password</label>
                  <?php
                  echo form_input($password);
                  ?>
                </div>
                <div class="form-group">
                  <label for="fieldname" class="control-label">Confirm Password</label>

                  <?php
                  echo form_input($password_confirm);
                  ?>
                </div>
                <div class="form-group">
                  <label for="fieldname" class="control-label"><?php echo lang('edit_user_groups_heading'); ?></label>

                  <?php if ($this->ion_auth->is_admin()) : ?>

                    <?php foreach ($groups as $group) : ?>
                      <label class="btn btn-info">
                        <?php
                        $gID = $group['id'];
                        $checked = null;
                        $item = null;
                        foreach ($currentGroups as $grp) {
                          if ($gID == $grp->id) {
                            $checked = ' checked="checked"';
                            break;
                          }
                        }
                        ?>
                        <input type="checkbox" class="bg" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo $checked; ?>>
                        <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                      </label>
                    <?php endforeach ?>

                  <?php endif ?>

                  <?php echo form_hidden('id', $user->id); ?>
                  <?php echo form_hidden($csrf); ?>
                </div>
                <div class="form-group">
                  <div class="text-center">
                    <input type="submit" name="submit" class="finish btn-primary btn" value="Update">
                  </div>
                  </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>