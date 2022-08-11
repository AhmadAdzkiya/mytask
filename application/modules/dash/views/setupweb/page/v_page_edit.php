<div class="be-content">
   <div class="page-head">
      <h2 class="page-head-title">Profil Halaman</h2>
      <nav aria-label="breadcrumb" role="navigation">
         <ol class="breadcrumb page-head-nav">
            <li class="breadcrumb-item"><a href="<?= bs()."dash/" ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= bs()."dash/setupweb/page/daftar" ?>">Daftar Data Halaman</a></li>
            <li class="breadcrumb-item active"> Profil</li>
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
            <?php endif;  ?>
            

            <div class="card card-table  card-border-color card-border-color-primary">
               <div class="card-header"> <span class="icon mdi mdi-format-list-bulleted"></span>
                  Kelola profil halaman  <strong><?= '"'.$data->nama.'"'; ?></strong>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card mt-5">
                           <?php $this->load->view($nmPage."v_page_edit_content",["pageData" => $data, 'nmPage'=>$nmPage]); ?>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
