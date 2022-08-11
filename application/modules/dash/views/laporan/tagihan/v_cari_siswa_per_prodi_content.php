<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>


<div class="form-group">
    <label for="biaya">Pilih Prodi siswa untuk ditagihkan</label>
    <select class="form-control" name="biaya" id="id_biaya_per_prodi" onchange="cekSiswa(this.value)">
        <option value="" selected>Pilih Prodi</option>
        <?php

            foreach($prodi as $k => $v){
                if(isset($barang)){
                    if($barang->kategori == $v->id){
                        echo "<option value='$v->id' selected>$v->nama / $v->jurusan_nama </option>";
                    }else{
                        echo "<option value='$v->id'>$v->nama  / $v->jurusan_nama  </option>";
                    }
                }else{
                    echo "<option value='$v->id'>$v->nama / $v->jurusan_nama </option>";
                }
            }
            
            
        ?>

    </select>
</div>

<script>

    function cekSiswa(keyword){
        var base = '<?php echo base_url(); ?>'
        var cariTipeBeban = 'dash/laporan/tagihan/cariSiswaPerProdi';

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