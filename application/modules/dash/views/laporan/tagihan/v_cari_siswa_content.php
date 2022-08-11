<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>


<div class="form-group">
    <label for="">Cari siswa  yang ingin diinput tagihan</label>
    <input type="text" class="form-control" name="keyword" onkeyup="cekSiswa(this.value)"
    placeholder="Ketik siswa dengan NIS atau nama " >
</div>

<script>
    function cekSiswa(keyword){
        var base = '<?php echo base_url(); ?>'
        var cariTipeBeban = 'dash/laporan/tagihan/cariPerSiswa';

        if (keyword.length > 3) {
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
        } else {
            $("#id_content_list_siswa").html(
                `<div style="font-size:1.5rem; padding:1rem; background:#ebebeb">Silakan ketik lebih dari 3 huruf / angka untuk cari siswa</div>`
            )
        }
    }

</script>