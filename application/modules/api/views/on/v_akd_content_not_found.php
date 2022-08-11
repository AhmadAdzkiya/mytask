<div class="container">
    <div id="aaaa"></div>
    <div class="alert alert-warning" role="alert"><?php echo isset($mssg_not_found) ? 
    $mssg_not_found !=""? $mssg_not_found : " data AKD yang Anda cari tidak ditemukan, coba pilih AKD yang lain" 
    :"AKD yang Anda cari tidak ditemukan, silakan pilih AKD atau halaman yang lain"; ?></div>
    <br>
    <?php 
        foreach ($akd as $k => $v) {
            echo '
                <div>
                        <div>
                        <a href="'.base_url().'akd/on/'.$v->slug.'" style="font-size:1.1rem; color: #ba9f47 "> <i class="fas fa-globe-asia"></i> '.$v->nama.'</a> 
                        <br>
                        <span style="font-size:0.7rem;"> '.$v->keterangan.' </span>
                        </div>
                    </div>
                    <br>
                ';
        }
    ?>
</div>
