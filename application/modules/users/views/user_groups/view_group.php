<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css" />
<link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/datatables/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" />

<div class="be-content">
   <div class="page-head">
      <h2 class="page-head-title">Users Roles & Permissions</h2>
      <nav aria-label="breadcrumb" role="navigation">
         <ol class="breadcrumb page-head-nav">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Roles & Permissions</a></li>
            <li class="breadcrumb-item active">View Roles & Permissions</li>
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
               <div class="card-header"> <span class="icon mdi mdi-accounts"></span> Users Roles & Permissions

               </div>
               <div class="card-body">
                  <?php
                  //If user is admin
                  if ($this->ion_auth->get_user_group() == 1) {
                  ?>
                     <table class="table table-striped table-hover table-fw-widget" id="table1">
                        <thead>
                           <tr>
                              <th>Role/Group</th>
                              <th>Description</th>
                              <th>Edit</th>
                              <th>Delete</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($groups as $group) : ?>
                              <tr>
                                 <td>
                                    <?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'); ?>
                                 </td>
                                 <td>
                                    <?php echo htmlspecialchars($group->description, ENT_QUOTES, 'UTF-8'); ?>
                                 </td>
                                 <td>
                                    <a href="<?= base_url('users/User_groups/edit_group') ?>/<?= $group->id ?>">
                                       <button class="btn btn-rounded btn-space btn-primary"><span class="icon mdi mdi-edit"></span> Edit</button>
                                    </a>
                                 </td>
                                 <td>
                                    <a onclick="hapus('<?= $group->id ?>')">
                                       <button class="btn btn-rounded btn-space btn-danger" disable>
                                       <span class="icon mdi mdi-delete"></span> Delete
                                       </button>
                                    </a>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  <?php
                  }
                  if ($this->ion_auth->get_user_group() == 2) {
                  ?>
                     <table class="table table-striped table-hover table-fw-widget" id="table1">
                        <thead>
                           <tr>
                              <th>Role/Group</th>
                              <th>Description</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($groups as $group) : ?>
                              <tr>
                                 <td>
                                    <?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'); ?>
                                 </td>
                                 <td>
                                    <?php echo htmlspecialchars($group->description, ENT_QUOTES, 'UTF-8'); ?>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  <?php
                  }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>

   function hapus(id){
      let conf = confirm("Apakah yakin ingin hapus data ini")
      if(conf)
      window.location.href = '<?= site_url("users/User_groups/delete_group/")?>'+id

   }
  
</script>
