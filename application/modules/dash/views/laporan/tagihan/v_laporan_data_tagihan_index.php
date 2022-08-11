<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>

<style>
.wrp-col {
    padding: 1rem;
    background: #fafafa;
    margin: 0.5rem;
    font-size: 1rem;
    border-radius: 10px;
}

.wrp-col:hover~a {
    background: #6f42c1;
    color: #ffffff;
    transition: all .9s;
}
</style>
<div class="be-content">
    <div class="page-head">
        <h4 class="page-head-title">Daftar Laporan Siswa Tertagih<span class="page-head-sub-title"></span>
        </h4>

        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/dash/transaksi/tagihan/data">Daftar Tagihan</a></li>
                <li class="breadcrumb-item"> <a href="<?php echo base_url(); ?>/dash/transaksi/tagihan/input">Input Tagihan</a> </li>
            </ol>
        </nav>
       

    </div>


    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">



                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header">
                    
                        
                    <div>List data tagihan</div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="container-fluid">
                                    <?php $this->load->view("v_tagihan_list_content"); ?>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

