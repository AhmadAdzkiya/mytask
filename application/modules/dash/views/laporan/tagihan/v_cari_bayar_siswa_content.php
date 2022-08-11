<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>


    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="form-group">
                <!-- <label for="">Cari siswa untuk pembayaran</label> -->
                <input type="text" class="form-control"
                id="id_form_cari_siswa" 
                value="<?php echo isset($siswa_id)? $siswa_id:''; ?>" 
                name="keyword" onkeyup="cekSiswa(this.value)" 
                placeholder="Ketik Nama Siswa /  NIS / Nomor Tagihan " >
                <i>Tekan ENTER untuk mulai mencari tagihan siswa</i>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div id="id_list_tagihan_siswa">

            </div>

        </div>
    </div>


<script>
    function cekSiswa(keyword){
        var base = '<?php echo base_url(); ?>'
        var cariTipeBeban = 'dash/transaksi/tagihan/cariPerSiswaTerbayar';

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
                    $('#id_list_tagihan_siswa').html(
                        '<i class="fa fa-refresh fa-spin"></i> mencari data siswa...');
                },
                success: (res) => {
                    $('#id_list_tagihan_siswa').html(res);
                    // console.log(res)

                },
                error: (xhr, status, err) => {
                    $('#id_list_tagihan_siswa').html(xhr.responseText);
                    console.log(xhr.responseText)
                }
            });
        } else {
            $("#id_list_tagihan_siswa").html(
                `<div style="font-size:1.5rem; padding:1rem; background:#ebebeb">Silakan ketik lebih dari 3 huruf / angka untuk cari siswa</div>`
            )
        }
    }

    $(()=>{
        cekSiswa($("#id_form_cari_siswa").val())
    })

</script>