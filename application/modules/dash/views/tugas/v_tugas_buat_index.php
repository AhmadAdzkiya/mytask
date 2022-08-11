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

<?php
$uriFunction = 'simpaninput';
if($mode == 'edit'){
    $uriFunction = 'simpanubah';
}
?>

<?php $user = $this->ion_auth->user()->row(); ?>

<?php $isPetugas =  isset($tugas)? $user->email != $tugas->createdby? true : false : false; ?>



<div class="be-content">


    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header">


                        <div><?= $mode == 'new' ? 'Membuat':'Mengubah' ?> Tugas</div>

                       
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

                               
                                
                                    <form id="id_form_input_tugas"
                                        action="<?php echo base_url().'dash/tugas/tugas/'.$uriFunction;?>" method="POST"
                                        enctype="multipart/form-data">

                                        <input type="hidden" name="id" id="id_id"
                                            value="<?= isset($tugas) ? $tugas->id:null; ?>">

                                        <div style="display:<?= $isPetugas?'none':'bloack'; ?> ">

                                            <div class="form-group">
                                                <label for="id_input_judul_23">Judul</label>

                                                <input type="text" id="id_input_judul_23" name="judul"
                                                    placeholder="Masukan judul tugas"
                                                    value="<?= isset($tugas) ? $tugas->judul:null; ?>"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="id_isi">Isi tugas</label>
                                                <textarea class="form-control" name="isi" id="id_isi"
                                                    placeholder="Isi detail tugas  "><?= isset($tugas) ? $tugas->isi:null; ?></textarea>


                                            </div>

                                            <div class="form-group">
                                                <label for="id_target">Target Waktu
                                                    <?= isset($tugas) ? $tugas->target:null; ?></label>
                                                <input type="date" id="id_target" name="target" format="yyyy-mm-dd"
                                                    placeholder="Pilih Tanggal Target Pengerjaan"
                                                    value="<?= isset($tugas) ? $tugas->target:null; ?>"
                                                    class="form-control">


                                            </div>


                                            <div class="form-group">
                                                <label for="id_file">Lampiran (opsional)</label>

                                                <input type="file" id="id_file" name="file" 
                                                accept="application/pdf"
                                                    placeholder="Masukan file"
                                                    class="form-control">


                                                    <?php if($mode == 'edit'){ 
                                                        
                                                        if(strlen($tugas->file)>0){
                                                            echo  "<div>Lampiran aktif saat ini :  ";
                                                            echo '<a target="blank" href="'. base_url(). ltrim($uploadPaths['lampiran_tugas'],"./") . $tugas->file.'" class="text-primary" > <i class="fa fa-file" aria-hidden="true"></i> '.$tugas->file.'</a> ';
                                                            echo '</div>';
                                                        }
                                                       

                                                    } ?>


                                            </div>



                                            <div class="form-group">
                                                <label for="tahun_angkatan">Pilih Petugas </label>
                                                <select class="form-control" name="petugas" id="id_petugas">
                                                    <?php
                                                
                                                    foreach($pegawai as $k => $v){
                                                        if($tugas->petugas == $v->id){
                                                            echo "<option value='$v->id' selected>$v->first_name $v->last_name</option>";
                                                        }else{
                                                            echo "<option value='$v->id'>$v->first_name $v->last_name</option>";
                                                        }
                                                    }
                                                
                                                
                                                ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div style="display:<?= $isPetugas ? 'block':'none'; ?>; font-size:1.2rem; background:#fafafa; border-radius:10px; padding:10px; ">
                                           

                                            <div style="border-bottom:0.5px solid #a8a8a8; padding:10px 5px;"> <strong>Penugasan oleh </strong> <?= isset($owner) ? $owner->first_name.' '.$owner->last_name.' :: '.$owner->email : '';   ?> 
                                            </div>

                                            <div style="margin-top:10px;"> <strong>Judul</strong> <br> <?= isset($tugas) ? $tugas->judul:null; ?>
                                            </div>
                                            <div style="margin-top:10px;"> <strong>Isi</strong> <br> <?= isset($tugas) ? $tugas->isi:null; ?>
                                            </div>
                                            <div style="margin-top:10px;"> <strong>Target</strong> <br>
                                                <?= isset($tugas) ? $tugas->target:null; ?></div>

                                        </div>
                                        <br>
                                        <br>

                                        

                                        <?php if($mode == 'edit'){ 
                                            $status = [
                                                "0" => "Belum Selesai",
                                                "1" => "Selesai"
                                            ];
                                            ?>

                                        <div class="form-group">
                                            <label for="tahun_angkatan">Pilih Status Progres Tugas</label>
                                            <select class="form-control" name="status" id="id_status">
                                                <?php
                                               
                                                foreach($status as $k => $v){
                                                    if($k == $tugas->status){
                                                        echo "<option value='$k' selected>$v</option>";
                                                    }else{
                                                        echo "<option value='$k'>$v</option>";
                                                    }
                                                }
                                            
                                            
                                            ?>
                                            </select>
                                        </div>
                                        <?php } ?>










                                        <div style="text-align:center; padding:2rem; align-items:center; width:100%">
                                            <div class="btn btn-primary md-close" onclick="cekConfirm()"
                                                style="align-self:center; margin:auto; padding:1rem;">
                                                <span
                                                    style="font-size:1.2rem"><?php echo $mode == "new" ? "Tambahkan": "Perbarui" ?></span>
                                            </div>
                                        </div>



                                        <div class="form-group">

                                            <label>Creator</label>
                                            <input type="text" style="border:none" value="<?= $user->email?>"
                                                name="createdby" id="createdby" readonly>
                                            <input type="hidden" value="<?= $user->id?>" name="creatorid" id="creatorid"
                                                readonly>
                                            <input type="hidden" value="<?= $user->email?>" name="modifiedby"
                                                id="modifiedby">
                                            <input type="hidden" value="<?= $user->id?>" name="modifierid"
                                                id="modifierid">
                                        </div>


                                    </form>

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
function cekConfirm() {
    $('#id_form_input_tugas').submit()
}


$(() => {

})
</script>