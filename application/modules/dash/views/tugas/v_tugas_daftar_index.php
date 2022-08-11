<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>
<style>
.img_widget_title {
    width: 50px;
    height: 50px;
}

.img_widget_title:hover {
    transform: scale(1.2);
    transition: ease 1s;
}
</style>
<?php $baseurl = base_url();  ?>

<div class="be-content">

    <div class="page-head">
        <h4 class="page-head-title">Daftar Tugas Telah dibuat<span class="page-head-sub-title"></span>
        </h4>

        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard </a></li>
                <li class="breadcrumb-item"> <a href="<?php echo base_url(); ?>/dash/tugas/tugas/index"> Daftar
                        Tugas</a></li>
            </ol>
        </nav>

    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header">


                        <span>Daftar Tugas</span>
                        <div class="text-right"><a href="<?= base_url().'dash/tugas/tugas/buattugas'; ?>" class="btn btn-primary" >Buat Tugas</a></div>


                        <?php if($this->session->flashdata('success')){ ?>
                        <?php echo $this->session->flashdata('success'); ?>
                        <?php } ?>

                        <?php if($this->session->flashdata('warning')){ ?>
                        <?php echo $this->session->flashdata('warning'); ?>
                        <?php } ?>

                        <?php if($this->session->flashdata('danger')){ ?>
                        <?php echo $this->session->flashdata('danger'); ?>
                        <?php }?>

                        <?php if($this->session->flashdata('msg')){ ?>
                        <?php echo $this->session->flashdata('msg'); ?>
                        <?php }?>




                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="container-fluid">


                                    <table class="table table-striped" id="tableXXP">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Id Tugas</th>
                                                <th scope="col">Judul</th>
                                                <th scope="col">Isi tugas</th>
                                                <th scope="col">Petugas</th>
                                                <th scope="col">Target</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Lampiran</th>
                                                <th scope="col">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    </div>



</div>

<script>



$(() => {
    var site = '<?= $baseurl; ?>'
    $('#tableXXP').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url":`${site}/dash/tugas/tugas/list`,
            "type": "POST",
            // "data": 
            // "success" : (src)=>{
            //     console.log(src)
            // }

        },
        
        // `${site}/dash/tugas/tugas/list`,
    });

})
</script>