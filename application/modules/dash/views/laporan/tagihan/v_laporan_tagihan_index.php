<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>

<style>
    .wrp-col{
        padding:2rem;
        background:#fafafa;
        margin:1rem;
        font-size:1.5rem;
        border-radius:10px;
    }
    .wrp-col:hover{
        background:#6f42c1;
        color: #ffffff !important;
        transition:  all .9s;
    }
</style>
<div class="be-content">
    <div class="page-head">
        <h4 class="page-head-title">Halaman Laporan Tagihan Siswa<span class="page-head-sub-title"></span>
        </h4>
        

        
    </div>


    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">



                <div class="card card-table  card-border-color card-border-color-primary">
                    <div class="card-header">


                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                            <a href="<?php echo base_url(); ?>dash/laporan/tagihan/data">
                              <div class="wrp-col">
                                    
                                        <i class="fas fa-cogs"></i> 
                                        <span> Daftar Tagihan</span>
                                    
                              </div>
                              </a>
                            </div>

                            <!-- <div class="col-sm-12 col-lg-6">
                            <a href="./tagihan/input">
                              <div class="wrp-col">
                                  
                                  <i class="fas fa-edit"></i> 
                                  <span>Input  / tambah Data Tagihan</span>
                                  
                              </div>

                              </a>
                            </div> -->
                        </div>


                        <div class='container-fluid' id='info_proses'></div>


                        <div class="row">
                            <div class="col-sm-12">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
