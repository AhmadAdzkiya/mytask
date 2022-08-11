<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>



<div class="form-group">
    <label for="biaya">Pilih siswa tertagih dengan jurusan</label>
    <select class="form-control" name="biaya" id="id_biaya_per_prodi" onchange="cekSiswa(this.value)">

    <option value="" selected>Pilih Jurusan</option>


        <?php

            foreach($jurusan as $k => $v){
                if(isset($barang)){
                    if($barang->kategori == $v->id){
                        echo "<option value='$v->id' selected>$v->nama </option>";
                    }else{
                        echo "<option value='$v->id'>$v->nama </option>";
                    }
                }else{
                    echo "<option value='$v->id'>$v->nama </option>";
                }
            }
            
            
        ?>

    </select>
</div>

<script>
    function cekSiswa(keyword){
        var base = '<?php echo base_url(); ?>'
        var cariTipeBeban = 'dash/laporan/tagihan/cariSiswaPerJurusanTertagih';
        keyword = $("#id_biaya_per_prodi").val();
        var biaya = $('#id_biaya').val();
        var jenisKelamin = $('#id_jenis_kelamin').val();
        var option = {
                    "keyword": keyword,
                    "id_biaya" : biaya,
                    "id_jenis_kelamin" : jenisKelamin
                };

        $.ajax({
                type: 'POST',
                contentType: "application/json; charset=utf-8",
                url: base + cariTipeBeban,
                data: JSON.stringify({
                    "keyword": keyword
                }),
                dataType: "json",
                beforeSend: (option) => {
                    $('#id_content_list_siswa').html(
                        '<i class="fa fa-refresh fa-spin"></i> mencari data siswa...');
                },
                success: (res) => {
                    $('#id_content_list_siswa').html(res);
                    console.log(res)

                },
                error: (xhr, status, err) => {
                    $('#id_content_list_siswa').html(xhr.responseText);
                    console.log(xhr.responseText)
                }
            });
    }


    $(()=>{
        $.fn.modal.Constructor.prototype._enforceFocus = function() {};
        $("#id_biaya_per_prodi").select2()
    })
</script>