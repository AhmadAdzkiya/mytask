<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/
//cek mode edit atau new 
$mode = isset($mode) ? $mode : "new"; 
?>


<div class="row">
    <div class="col-lg-12 col-sm-12">

        <?php 
        echo '
        <div class="form-group">
            <label>
                <span> Parent halaman</span>
            </label>
            <select name="parent_id" id="parent_id_select" class="form-control" required>';

            $dataPage  = list_page();


            function getChildren2($dataPage,$p) {
                $r = array();
                foreach($dataPage as $row) {
                    if ($row->parent_id ==$p) {
                        $row->child = getChildren2($dataPage,$row->id);
                        $r[$row->id] = $row;
                    }
                }
                return $r;
            }
                

            $nav = getChildren2($dataPage,0);

            

            function get_selectPage($data,$mPage=null,$parent_id_for_sub){
                static $i =0;
                $tab = str_repeat("-",$i);
                $i++;
                foreach($data as $k => $v){
                    if($mPage == null){//variable $parent_id_for_sub bisa diisi langusng dari controller untuk menentukan parent saat membuat sub halaman
                        if($parent_id_for_sub){
                            if($v->id == $parent_id_for_sub){
                                echo "<option value='$v->id' selected >$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
                            }else{
                                echo "<option value='$v->id' >$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
                            }
                        }else{
                            echo "<option value='$v->id' >$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
                        }
                       
                    }else{
                        if($v->id != $mPage->id){
                            if($v->id == $mPage->parent_id){
                                $selected ="selected";
                            }else{
                                $selected ="";
                            }
                            echo "<option value='$v->id' $selected>$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
                        }
                    }
                    
                    if(count($v->child)>0){
                        get_selectPage($v->child,$mPage,$parent_id_for_sub);
                        $i--;
                    }else{
    
                    }
                }
            }

            if($mode=="new"){  
                //tambah page baru
                echo "<option value='0'>Halaman dasar / root </option>";
                if($parent_id_for_sub){
                    echo get_selectPage($nav,null,$parent_id_for_sub);
                }else{
                    echo get_selectPage($nav,null,null);
                }
                
               
            }else{
                //edit page
                if($pageData->parent_id!=0){ 
                //saat bukan root parent
                    echo get_selectPage($nav,$pageData,null);
                } 
                else{
                    echo "<option value='0' selected>Halaman dasar [ level: 0 ]</option>";
                }
            }

            echo '</select>
                    </div>
                    ';
        
        ?>


        
        <div class="form-group">
            <label>Privat</label>
            <select class="form-control" name="is_private" id="id_is_private">
                <?php
                        $op = [ 0=>"Tidak",1=>"Ya"];
                        
                        foreach ($op as $k => $v) {  
                            $selected='';          
                            
                            if($mode=="new"){
                                echo "<option value='$k' $selected>$v</option>";
                            }else{
                                if(isset($pageData)){
                                    if($pageData->is_private == $k)
                                        $selected ='selected';
                                        echo "<option value='$k' $selected>$v</option>";
                                }else{
                                    if($k == 1 )
                                        $selected ='selected';
                                        echo "<option value='$k' $selected>$v</option>";
                                }
                            }
                            

                            
                        } 
                    ?>

            </select>
            <i>catatan: Jika Anda pilih private bernilai "Ya" maka halaman ini tidak dapat dilihat oleh publik</i>
        </div>

        <div class="form-group">
            <label>Statik</label>
            <select class="form-control" name="is_statis" id="id_is_statis">
                <?php
                        $op = [0=>"Tidak",1=>"Ya"];
                     
                        foreach ($op as $k => $v) {  
                            $selected='';                      
                            if(isset($pageData)){
                                if($pageData->is_statis == $k)
                                    $selected ='selected';
                            }else{
                                if($k == '1')
                                    $selected ='selected';
                            }

                            echo "<option value='$k' $selected>$v</option>";
                        } 
                    ?>

            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Url Controller Page</label>
            <input type="text" name="url" class="form-control" id="id_url" placeholder="url misal: page/tentang"
                value="<?= isset($pageData) ? $pageData->url :'page/tentang'; ?>">
            <i style="padding:0.5rem; background:#f7f7f7; ">Catatan: untuk halaman yang bersifat statik sebaiknya menggunakan url controller bawaan yaitu <strong>"page/tentang"</strong> </i>
        
        </div>
        
        <br>

        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" name="nama" class="form-control" id="id_nama" placeholder="Tuliskan nama halaman"
                value="<?= isset($pageData) ? $pageData->nama :''; ?>">
        </div>
        <br>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" id="id_keterangan"
                placeholder="Keterangan page"><?= isset($pageData) ? $pageData->keterangan :''; ?></textarea>
        </div>
        <br>

        <div class="form-group">
            <label>Icon</label>
            <input type="text" class="form-control" name="icon" id="id_icon"
                value="<?= isset($pageData) ? $pageData->icon : ''; ?>" placeholder="isi dengan format tag icon  ">
                <div style="padding:0.5rem">
                preview icon aktif : <?= isset($pageData) ? $pageData->icon : ''; ?> 
                    <i><pre> misalnya : &lt;i class="fas fa-globe" aria-hidden="true"&gt;&lt;/i&gt;</pre></i>
                    <i>icon ini bisa didapatkan di fontawesome versi 5</i>
                </div>
        </div>
        <br>

        <div class="form-group">
            <label for="exampleInputEmail1">Urutan</label>
            <input type="text" name="urutan" class="form-control" id="id_urutan"
                placeholder="tulis nomor urut pakai kelipatan 10 saja"
                value="<?= isset($pageData) ? $pageData->urutan :'10'; ?>">
        </div>
        <br>


        <br>
        <br>
        <br>
        <br>
        <br>


    </div>

</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <?php $user = $this->ion_auth->user()->row(); ?>
            <label>Creator</label>
            <input type="text" style="border:none" value="<?= $user->email?>" name="createdby" id="createdby" readonly>
            <input type="hidden" value="<?= $user->id?>" name="creatorid" id="creatorid" readonly>
            <input type="hidden" value="<?= $user->email?>" name="modifiedby" id="modifiedby">
            <input type="hidden" value="<?= $user->id?>" name="modifierid" id="modifierid">
        </div>
    </div>
</div>

<div style="text-align:center; padding:2rem">
    <button class="btn btn-primary md-close" style="margin:auto; padding:1rem;" onclick="cek(event)">
        <span style="font-size:1.2rem"><?php echo $mode == "new" ? "Tambahkan": "Perbarui" ?></span>
    </button>
</div>

<script src="<?= bs("public/assets/plugins/form-select2/select2.min.js") ?>"></script>


<Script>
var page = <?= isset($pageData)?json_encode($pageData): json_encode(null) ?>

var resourceTambah = {
    base: '<?php echo bs(); ?>',
    uris: {
        tambah: "dash/setupweb/page/save_halaman",
        ubah: "dash/setupweb/page/update_halaman",
    },

    idEl: {
        idParent: "#parent_id_select",
        idIsPrivate: "#id_is_private",
        idIsStatis: "#id_is_statis",
        idUrl: "#id_url",
        idNama: "#id_nama",
        idKeterangan: "#id_keterangan",
        idIcon: "#id_icon",
        idUrutan: "#id_urutan",
    },

    getResourceTambah: (uri, callback, callbackerr) => {
        $.ajax({
            type: 'GET',
            contentType: "application/json; charset=utf-8",
            url: uri,
            dataType: "json",
            beforeSend: () => {
                // $('#keyword-'+item.id).html('<i class="fa fa-refresh fa-spin"></i> memuat keywords...');
            },
            success: (res) => {

                callback(res)

            },
            error: (err) => {
                console.log("error")
                console.log(err)
                if (callbackerr)
                    callbackerr(err)
            }
        });
    },

    get cgetidEl() {
        return this.idEl
    },

}

function uploadNewpage(data, beforeCall, callback, errCall) {
    let base = resourceTambah.base
    let tambah = resourceTambah.uris.tambah
    $.ajax({
        type: 'POST',
        contentType: "application/json; charset=utf-8",
        url: base + tambah,
        data: JSON.stringify(data),
        dataType: "json",
        beforeSend: (opt) => {
            beforeCall(opt)
            // $('#keyword-'+item.id).html('<i class="fa fa-refresh fa-spin"></i> memuat keywords...');
        },
        success: (res) => {

            callback(res)

        },
        error: (err) => {
            
            console.log("error")

            errCall(err)
        }
    });
}

function uploadChangepage(data, beforeCall, callback, errCall) {
    let base = resourceTambah.base
    let ubah = resourceTambah.uris.ubah
    $.ajax({
        type: 'POST',
        contentType: "application/json; charset=utf-8",
        url: base + ubah,
        data: JSON.stringify(data),
        dataType: "json",
        beforeSend: (option) => {
            beforeCall(option)
            // $('#keyword-'+item.id).html('<i class="fa fa-refresh fa-spin"></i> memuat keywords...');
        },
        success: (res) => {

            callback(res)

        },
        error: (err) => {
            errCall(err)
        }
    });
}

function cek() {

    let mode = '<?php echo $mode ?>';

    if (mode == "new") {
        add()
    } else {
        change()
    }
}

function escapeHtml(unsafe) {
    if (unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    } else {
        return unsafe
    }

}

function getResourceTambah() {
    let el = resourceTambah.cgetidEl
    let d = {
        "id" : '<?php  echo isset($pageData)? $pageData->id : ""; ?>',
        "parent_id": $(el.idParent).val(),
        "is_private": $(el.idIsPrivate).val(),
        "is_statis": $(el.idIsStatis).val(),
        "url": $(el.idUrl).val(),
        "keterangan": $(el.idKeterangan).val(),
        "icon": $(el.idIcon).val(),
        "urutan": $(el.idUrutan).val(),
        "nama": $(el.idNama).val(),
    }


    if ('<?php echo $mode; ?>' != "new") {
        d["modifiedby"] = $("#modifiedby").val();
        d["modifierid"] = $("#modifierid").val();
    } else {
        d.createdby = $("#createdby").val()
        d.creatorid = $("#creatorid").val()
        d.modifiedby = $("#modifiedby").val()
        d.modifierid = $("#modifierid").val()
    }

    let arr = Object.keys(d)

    for (let i = 0; i < arr.length; i++) {
        if (!Array.isArray(d[arr[i]])) {
            d[arr[i]] = escapeHtml(d[arr[i]])
        } else {
            let a = d[arr[i]]
            for (let ii = 0; ii < a.length; ii++) {
                a[ii] = escapeHtml(a[ii])
            }

            d[arr[i]] = a;
        }

    }

    return d
}

function change() {
    let c = confirm("Pastikan data Anda sudah terisi dengan benar");

    let el = resourceTambah.cgetidEl
    let d = getResourceTambah()

    if (c) {
        if (d.nama == "" || d.keterangan == "") {
            Swal.fire({
                icon: 'warning',
                title: "Informasi Tindakan",
                html: "<div style='font-size:1.3rem' >Mohon lengkapi dulu form isian ini </div>"
                // footer: '<a href>Why do I have this issue?</a>'
            })
        } else {

            uploadChangepage(d,
                (option) => {
                    Swal.fire({
                        icon: false,
                        title: "Informasi Tindakan",
                        showCancelButton: false,
                        showConfirmButton: false,
                        html: "<div style='font-size:1.3rem' >Sedang memperbarui ... </div>"
                        // footer: '<a href>Why do I have this issue?</a>'
                    })
                },

                (res) => {
                    if (res.success) {

                        setTimeout(() => {
                            if (Swal.isVisible()) {
                                Swal.close()

                                Swal.fire({
                                    icon: 'success',
                                    title: "Informasi Tindakan",
                                    html: `<div style='font-size:1.3rem' >${res.message} </div>`
                                    // footer: '<a href>Why do I have this issue?</a>'
                                })

                            }
                        }, 1000);

                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: "Informasi Tindakan",
                            html: `<div style='font-size:1.3rem' >${res.message}</div>`
                            // footer: '<a href>Why do I have this issue?</a>'
                        })
                    }
                },

                (xhr, status, error) => {
                    Swal.fire({
                        icon: 'warning',
                        title: "Informasi Tindakan",
                        html: `<div style='font-size:1.3rem' >Upps... Terjadi kesalahan</div><br>
                            detail error : <br>
                            ${xhr.responseText}
                        </div>`
                        // footer: '<a href>Why do I have this issue?</a>'
                    })
            })

        }
    }
}


function add() {

    let c = confirm("Pastikan data Anda sudah terisi dengan benar");

    let el = resourceTambah.cgetidEl
    let d = getResourceTambah()
    let uploadDoc = () => {
        uploadNewpage(d, 

        (option) => {
            Swal.fire({
                icon: false,
                title: "Informasi Tindakan",
                showCancelButton: false,
                showConfirmButton: false,
                html: "<div style='font-size:1.3rem' >Sedang Memproses data ... </div>"
                // footer: '<a href>Why do I have this issue?</a>'
            })
        },

        (res) => {
            if (res.success) {
                $(el.idKeterangan).val("")
                $(el.idUrutan).val("")
                $(el.idNama).val("")


                setTimeout(() => {
                    if (Swal.isVisible()) {
                        Swal.close()

                        Swal.fire({
                            icon: 'success',
                            title: "Informasi Tindakan",
                            html: `<div style='font-size:1.3rem' >${res.message} </div>`
                            // footer: '<a href>Why do I have this issue?</a>'
                        })

                    }
                }, 1000);

            } else {
                Swal.fire({
                    icon: 'warning',
                    title: "Informasi Tindakan",
                    html: `<div style='font-size:1.3rem' >${res.message}</div>`
                    // footer: '<a href>Why do I have this issue?</a>'
                })
            }
        },

        (xhr, status, error) => {
            Swal.fire({
                icon: 'warning',
                title: "Informasi Tindakan",
                html: `<div style='font-size:1.3rem' >Upps... Terjadi kesalahan</div><br>
                    detail error : <br>
                    ${xhr.responseText}
                </div>`
                // footer: '<a href>Why do I have this issue?</a>'
            })
        })

    }



    if (c) {
        if (d.keterangan == "") {
            alert("Mohon lengkapi dulu form isian ini")
        } else {
            uploadDoc()
            

        }
    }
}


$(() => {


    // cekPemrakarsa()
    // cekAmandemen()


})
</Script>