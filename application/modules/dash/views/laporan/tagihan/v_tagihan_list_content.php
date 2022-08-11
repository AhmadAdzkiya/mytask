<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>
<?php  
//cek mode edit atau new 
$mode = isset($mode) ? $mode : "new"; 
$stockpile = isset($stockpile) ? $stockpile:null; 

?>
<div class="container-fluid">
    <?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
    <?php endif; ?>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">


        <div class="row">

            <div class="col-lg-6 col-sm-12">
                <div class="form-group" style="display:none">
                    <label for="biaya">Pilih Biaya Tagihan</label>
                    <select class="form-control" name="biaya" id="id_biaya" onchange="cekSiswa(this.value)">
                        <option selected value="all">Semua Jenis Biaya</option>
                        <?php

                                foreach($biaya as $k => $v){
                                    if(isset($barang)){
                                        if($barang->kategori == $v->id){
                                            echo "<option value='$v->id' selected>$v->nama = ".number_format($v->nominal,0,",",".")."</option>";
                                        }else{
                                            echo "<option value='$v->id'>$v->nama = ".number_format($v->nominal,0,",",".")."</option>";
                                        }
                                    }else{
                                        echo "<option value='$v->id'>$v->nama = ".number_format($v->nominal,0,",",".")."</option>";
                                    }
                                }
                                
                                
                                ?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="tahun_angkatan">Lihat daftar tagihan berdasarkan</label>
                    <select class="form-control" name="tipe_beban" id="id_tipe_beban"
                        onchange="changeTipeBeban(this.value)">
                        <option value="all">Seluruh siswa</option>
                        <option value="per_siswa">Per siswa</option>
                        <option value="per_prodi">Siswa per Prodi</option>
                        <option value="per_jurusan">Siswa per Jurusan</option>


                    </select>
                </div>



                <div id="id_beban_content">

                </div>

            </div>

            <div class="col-lg-6 col-sm-12">

                <div class="form-group">
                    <label for="tahun_angkatan">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" id="id_jenis_kelamin"
                        onchange="cekSiswa(this.value)">
                        <?php
                            $jk = [
                                "all" => "Semua Jenis Kelamin",
                                "P" => "Perempuan",
                                "L" => "Laki-laki"
                            ];
                            $bulan = (int) date('m');
                            
                                foreach($jk as $k => $v){
                                    echo "<option value='$k'  >$v</option>";

                                    // if(isset($barang)){
                                    //     if($barang->kategori == $v->id){
                                    //         echo "<option value='$v->id' selected>$v->nama = ".number_format($v->nominal,0,",",".")."</option>";
                                    //     }else{
                                    //         echo "<option value='$v->id'>$v->nama = ".number_format($v->nominal,0,",",".")."</option>";
                                    //     }
                                    // }else{
                                    //     $selected = 'ganjil';
                                    //     if($bulan >= 6){
                                    //         $selected = 'genap';
                                    //     }

                                    //     if($selected == $k){
                                    //         echo "<option value='$k' selected >$v</option>";
                                    //     }else{
                                    //         echo "<option value='$k' >$v</option>";
                                    //     }
                                        
                                        
                                        
                                    // }
                                }
                                
                                
                                ?>
                    </select>
                </div>


                <div class="form-group" style="display:none">
                    <label for="tahun_angkatan">Semester</label>
                    <select class="form-control" name="semester" id="id_semester">
                        <option value="all" selected>Seluruh Semester</option>
                        <?php
                            $semester = [
                                "genap" => "Genap",
                                "ganjil" => "Ganjil"
                            ];
                                foreach($semester as $k => $v){
                                    if(isset($barang)){
                                        if($barang->kategori == $v->id){
                                            echo "<option value='$v->id' selected>$v->nama = ".number_format($v->nominal,0,",",".")."</option>";
                                        }else{
                                            echo "<option value='$v->id'>$v->nama = ".number_format($v->nominal,0,",",".")."</option>";
                                        }
                                    }else{
                                        echo "<option value='$k'>$v</option>";
                                    }
                                }
                                
                                
                                ?>
                    </select>
                </div>


            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div id="id_content_list_siswa"></div>

            </div>
        </div>



        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group">
                    <?php $user = $this->ion_auth->user()->row(); ?>
                    <label>Creator</label>
                    <input type="text" style="border:none" value="<?= $user->email?>" name="createdby" id="createdby"
                        readonly>
                    <input type="hidden" value="<?= $user->id?>" name="creatorid" id="creatorid" readonly>
                    <input type="hidden" value="<?= $user->email?>" name="modifiedby" id="modifiedby">
                    <input type="hidden" value="<?= $user->id?>" name="modifierid" id="modifierid">
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div style="text-align:center; padding:2rem; align-items:center; width:100%">
                    <div class="btn btn-primary md-close" onclick="cekConfirm()" style="align-self:center; margin:auto; padding:1rem;">
                        <span style="font-size:1.2rem"><?php echo $mode == "new" ? "Tampilkan": "Perbarui" ?></span>
                    </div>
                </div>
            </div>
        </div> -->



    </div>
</div>



<script>
function changeTipeBeban(data) {
    $("#id_content_list_siswa").html(``)
    var tipeBeban = data;

    var rscrTanbahAnggota = {
        base: '<?php echo bs(); ?>',
        uris: {
            tambah: "dash/transaksi/tagihan/addStockPile",
            remove: "dash/transaksi/tagihan/removeStockPile",
            cariTipeBeban: "dash/laporan/tagihan/cariTipeBebanJson"
        },


        idEl: {
            idNama: "#id_nama"

        },


        get cgetidEl() {
            return this.idEl
        },

    }

    let base = rscrTanbahAnggota.base
    let cariTipeBeban = rscrTanbahAnggota.uris.cariTipeBeban

    if (tipeBeban.length > 2) {
        $.ajax({
            type: 'POST',
            contentType: "application/json; charset=utf-8",
            url: base + cariTipeBeban,
            data: JSON.stringify({
                "tipe_beban": tipeBeban,
                "tipe_view": 'view_list_tertagih'
            }),
            dataType: "json",
            beforeSend: (option) => {
                $('#id_beban_content').html(
                    '<i class="fa fa-refresh fa-spin"></i> mencari data berdasarkan tipe beban...');
            },
            success: (res) => {
                $('#id_beban_content').html(res);
                console.log(res)

            },
            error: (xhr, status, err) => {
                $('#id_beban_content').html(xhr.responseText);
                console.log(xhr.responseText)
            }
        });
    } else {
        $("#id_beban_content").html(
            `<div style="font-size:1.5rem; padding:1rem; background:#ebebeb">Silakan pilih tipe beban</div>`
        )
    }

}


function cekConfirm() {

    let c = confirm("Yakin tambah input tagihan ini ?")

    if (c) {

        $("#id_form_input_tagihan").submit()
    } else {

    }

}

function cekLaporan() {
    $("#id_form_input_tagihan").submit()
}



$(() => {
    $.fn.modal.Constructor.prototype._enforceFocus = function() {};
    $("#id_biaya").select2()

    changeTipeBeban($("#id_tipe_beban").val());
})
</Script>