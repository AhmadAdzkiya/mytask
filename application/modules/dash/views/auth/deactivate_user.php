<div class="be-content">
  <div class="page-head">
    <h2 class="page-head-title">All Users List</h2>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb page-head-nav">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Users</a></li>
        <li class="breadcrumb-item active">Deactivate User</li>
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
        <div class="card card-table">
          <div class="card-header"> <span class="icon mdi mdi-block"></span> <?php echo lang('deactivate_heading'); ?>
          </div>
          <div class="card-body">
            <div class="row ml-5">
              <p><?php echo sprintf(lang('deactivate_subheading'), $user->username); ?></p>

              <?php echo form_open("users/auth/deactivate/" . $user->id); ?>
              <p>
                <?php echo lang('deactivate_confirm_y_label', 'confirm'); ?>
                <input type="radio" name="confirm" value="yes" checked="checked" />
                <br>
                <?php echo lang('deactivate_confirm_n_label', 'confirm'); ?>
                <input type="radio" name="confirm" value="no" />
              </p>

              <?php echo form_hidden($csrf); ?>
              <?php echo form_hidden(array('id' => $user->id)); ?>

              <p><?php echo form_submit('submit', "Deactivate", 'class="btn btn-info"'); ?>
              </p>

              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>