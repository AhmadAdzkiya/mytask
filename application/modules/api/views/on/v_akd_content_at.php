<div class="container">
    <div style="font-weight:bolder; font-size:1.3rem;"> AKD <?= $profile->nama; ?></div>
    <div><?= $profile->keterangan; ?></div>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <ul class="nav">

                <li class="nav-item float-right">
                    <a>
                        <span for="periode">Periode</span>
                        <select onchange="getViewListPejabatAkd()" id="periode_id">
                            <?php 
                            foreach ($periode as $k => $v) {
                                if($v->aktif == "1"){
                                    echo "<option value='$v->id' selected>$v->tahun_awal - $v->tahun_akhir</option>";
                                }else{
                                    echo "<option value='$v->id'>$v->tahun_awal - $v->tahun_akhir</option>";
                                }
                                
                            }
                            ?>
                        </select>

                    </a>


                </li>

                <li class="nav-item float-right">
                    <a style="margin-left:0.5rem">
                        <span for="periode"> Cari</span>
                        <input type="text" placeholder='Cari Anggota AKD ...' id="cari_anggota_id">

                    </a>


                </li>

            </ul>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div id="list_area">
            </div>
        </div>
    </div>


    <script>
    function getViewListPejabatAkd() {
        $.ajax({
            type: 'GET',
            url:'<?php bs('akd/getViewListPejabatAkd/'); ?>' +$('#periode_id').val()+"/"+'<?php echo $profile->id;?>',
            dataType: "html",
            beforeSend: () => {

                $("#list_area").html(`<div style="padding:1rem; font-size:1rem; background:#ffffff">Sedang memuat data AKD ... </div>`)
                
            },
            success: (res) => {
                $("#list_area").html(res)

            },
            error: (xhr, status, err) => {
                $("#list_area").html(`<div style="padding:1rem; font-size:1rem; background:#ffffff">Maaf terjadi kesalahan saat memuat data .. silakan coba kembali</div>`)

                console.log(xhr.responseText)
                console.log(err)
            }
        });
    }

    $(document).ready(function() {
        getViewListPejabatAkd();
    })
    </script>