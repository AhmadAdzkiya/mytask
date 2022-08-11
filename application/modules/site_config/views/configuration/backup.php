<div class="be-content">
   <div class="page-head">
      <h2 class="page-head-title">Database Backup & Export</h2>
      <nav aria-label="breadcrumb" role="navigation">
         <ol class="breadcrumb page-head-nav">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Back Up</a></li>
            <li class="breadcrumb-item active">Database Backup & Export Users</li>
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
               <div class="card-header"> <span class="icon mdi mdi-time-restore-setting"></span> Database Backup & Export Users
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-12 text-center">
                        <h3>
                        <span class="icon mdi mdi-accounts"></span>  Export Users
                           <h3>
                              <div>
                                 <a class="btn btn-lg btn-primary" href="<?= base_url('site_config/export_users') ?>">
                                 <span class="icon mdi mdi-cloud-download"></span> Download </a>
                              </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12 text-center">
                        <h3>
                        <span class="icon mdi mdi-time-restore-setting"></span> Take Backup Your Database
                           <h3>
                              <div>
                                 <a class="btn btn-lg btn-primary" href="<?= base_url('site_config/backup_db') ?>">
                                 <span class="icon mdi mdi-cloud-download"></span> Download </a>
                              </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>