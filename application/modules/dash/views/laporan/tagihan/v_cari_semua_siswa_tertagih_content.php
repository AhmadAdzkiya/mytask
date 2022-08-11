<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>


<div class="form-group">
    <label for="">Menampilkan daftar semua siswa tertagih</label>
    <input type="text" value="all" class="form-control" id="id_keyword_seluruh_siswa_tertagih" name="keyword" onkeyup="cekSiswa(this.value)"
    placeholder="Ketik siswa dengan NIS atau nama " readonly >
</div>

<script>
    function cekSiswa(keyword){
        var base = '<?php echo base_url(); ?>'
        var cariTipeBeban = 'dash/laporan/tagihan/cariSemuaSiswaTertagih';
        var keyword = $("#id_keyword_seluruh_siswa_tertagih").val();
        var biaya = $('#id_biaya').val();
        var jenisKelamin = $('#id_jenis_kelamin').val();
        
        

        if (keyword.length > 0) {
            var option = {
                    "keyword": keyword,
                    "id_biaya" : biaya,
                    "id_jenis_kelamin" : jenisKelamin
                };

                console.log("option cari =====")
                console.log(option)

                setTimeout(() => {
                    
               
                    $.ajax({
                        type: 'POST',
                        contentType: "application/json; charset=utf-8",
                        url: base + cariTipeBeban,
                        data: JSON.stringify(option),
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

                }, 100);
        } else {
            $("#id_content_list_siswa").html(
                `<div style="font-size:1.5rem; padding:1rem; background:#ebebeb">Silakan ketik lebih dari 3 huruf / angka untuk cari siswa</div>`
            )
        }
    }

    $(()=>{
        var key = $('#id_keyword_seluruh_siswa_tertagih').val()
        cekSiswa(key);
    })

</script>