<?php $user = $this->ion_auth->user()->row();?>

<div class="tab-container">

    <div class="tabbable boxed parentTabs p-4">
        <ul class="nav nav-tabs">
            <li class="nav-item active" >
                <a href="#set1"  id="tentang" class="nav-link">Tentang</a>
            </li>
            <li class="nav-item active"><a href="#set2" class="nav-link">Kelola</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="set1">
                <div class="row">
                    <div class="col-md-5">
                        <h4>Info dasar</h4>
                        <table class="table about-table">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td><?php  echo $pageData->nama; ?></td>
                                </tr>

                                <tr>
                                    <th>Slug</th>
                                    <td><?php  echo $pageData->slug; ?></td>
                                </tr>

                                <tr>
                                    <th>Bersifat Statik</th>
                                    <td>
                                    
                                        <?php 
                                        if($pageData->is_statis == 1){
                                            echo "Ya";
                                        }else if($pageData->is_statis == 0){
                                            echo "Tidak";
                                        }
                                        else{
                                            echo "Tidak dikenal";
                                        }
                                    
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Bersifat Privat</th>
                                    <td>
                                    <?php 
                                        if($pageData->is_private ==1){
                                            echo "Ya";
                                        }else if($pageData->is_private == 0){
                                            echo "Tidak";
                                        }
                                        else {
                                            echo "Tidak dikenal";
                                        }
                                    
                                        ?>
                                    </td>
                                </tr>
                               

                                <tr>
                                    <th>Wallpaper</th>
                                    <td>
                                    <?php 
                                        if(isset($pageData->urlWallpaper)){
                                            echo '<a target="blank" href="'.$pageData->urlWallpaper.'">'.$pageData->wallpaper.'</a>';
                                        }else{
                                            echo "Tidak ada";
                                        }
                                    ?>
                                        
                                    
                                    </td>
                                </tr>


                                <tr>
                                    <th>Keterangan</th>
                                    <td><?php echo  $pageData->keterangan; ?></td>
                                </tr>


                                <tr>
                                    <th>Url dasar </th>
                                    <td><?php echo  $pageData->url; ?></td>
                                </tr>

                                
                                <tr>
                                    <th>Link Akses </th>
                                    <td><a target="blank" href="<?= base_url().$pageData->url."/".$pageData->slug;  ?>"><?= base_url().$pageData->url."/".$pageData->slug;  ?></a></td>
                                </tr>

                                <tr>
                                    <th>Dibuat</th>
                                    <td><?php echo  $pageData->created; ?></td>
                                </tr>

                                <tr>
                                    <th>Diubah</th>
                                    <td><?php echo  $pageData->modify; ?></td>
                                </tr>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            

            <!-- set 2 -->
            <div class="tab-pane fade" id="set2">
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#infodasar" class="nav-link">Info Dasar</a>
                        </li>
                        <li><a href="#artikel" class="nav-link">Artikel</a>
                        </li>
                        <li><a href="#subDokumen" class="nav-link">Wallpaper</a>
                        </li>
                        <li><a href="#sub22" class="nav-link">Tags</a>
                        </li>

                        <li><a href="#progresTahapan" class="nav-link">Keyword</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="infodasar">
                            <h4>Kelola Info Dasar</h4>
                            
                            <?php $this->load->view($nmPage."v_page_tambah_content", ["page"=>$pageData,"mode"=>"edit"]); ?>
                            
                        </div>
                        <div class="tab-pane fade" id="artikel">
                            <h4>Kelola isi artikel halaman</h4>
                            <i>Mengelola isi halaman untuk ditampilkan ke publik</i>
                           
                            <?php $this->load->view($nmPage."v_page_isi_content", ["page"=>$pageData,"mode"=>"edit"]); ?>
                           
                        </div>

                        <div class="tab-pane fade" id="subDokumen">
                            <h4>Kelola Wallpaper</h4>
                            <i>Mengelola gambar untuk latar belakang halaman di tampilan publik</i>

                            
                            <h2>Akan segera hadir</h2>
                           
                        </div>
                        <div class="tab-pane fade" id="progresTahapan">
                            <h4>Kelola Tags</h4>
                            <i>Mengelola tag berguna untuk pengelompokan berdasarkan kesamaan tertentu </i>
                            <h2>Akan segera hadir</h2>
                            
                        </div>

                        <div class="tab-pane fade" id="sub22">
                            <h4>Kelola Keyword</h4>
                            <i>Mnegelola kata kunci untuk memudahkan pencarian di mesin pencari</i>
                            <h2>Akan segera hadir</h2>
                            
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>

</div>


<script>

    function ambilView(){
        $.ajax({
            type: 'GET',
            contentType: "html",
            url: '<?php echo bs() ?>' + 'dash/legislasi/propemperda/cobaView/'+$("#nik_pasien").text(),
            dataType: false,
            beforeSend: () => {
                $("#percobaan_area").html(`mengambil view coba...`)
                console.log("mengambil view coba...")
                // $('#keyword-'+item.id).html('<i class="fa fa-refresh fa-spin"></i> memuat keywords...');
            },
            success: (res) => {
                setTimeout(() => {
                    $("#percobaan_area").html(res)
                }, 2000);

                

            },
            error: (err) => {
                console.log("error")
                console.log(err)
            }
        });
    }
$(()=>{


    $("ul.nav-tabs a").click(function (e) {
    e.preventDefault();  
        $(this).tab('show');
    });
   
    $( "#tentang" ).trigger( "click" );
    $( "#infodasar" ).trigger( "click" );

})

</script>