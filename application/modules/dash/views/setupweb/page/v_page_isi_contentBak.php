<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/
//cek mode edit atau new 
$mode = isset($mode) ? $mode : "new"; 
?>


<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="form-group">
            <label class="control-label">Isi konten halaman</label>
            <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
            <div id="id_isi" name="isi">
                <?= $page->isi !="" ? $page->isi : "" ?>
                <p>This is some sample content.</p>
            </div>
            <!-- 
            <textarea name="isi" id="id_isi" class="form-control" rows="5">
                <?= $page->isi !="" ? $page->isi : "" ?>
            </textarea> -->
        </div>
        <br>
        <br>
    </div>
    <!--<script src="<?php echo base_url().'public/b-asset/lib/ckfinder/ckfinder.js';?>"></script>-->
    <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>
    <script>
    var simpleurl = '<?php echo base_url()."dash/setupweb/page/synceditor";?>';
    console.log(simpleurl)

    ClassicEditor.builtinPlugins.map(plugin => console.log(plugin.pluginName));

    ClassicEditor
        .create(document.querySelector('#id_isi'), {

                simpleUpload: {
                    uploadUrl: simpleurl,

                }


            }

        })
    .then(ress => {})
        .catch(error => {
            console.error(error);
        });
    </script>

    


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
    <button class="btn btn-primary md-close" style="margin:auto; padding:1rem;" onclick="cekIsi(event)">
        <span style="font-size:1.2rem"><?php echo $mode == "new" ? "Tambahkan": "Perbarui" ?></span>
    </button>
</div>


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
        idIsi: '#id_isi'
    },

    getRIsiCOntent: (uri, callback, callbackerr) => {
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

function uploadIsiContent(data, beforeCall, callback, errCall) {
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

function uploadChangeIsiCOntent(data, beforeCall, callback, errCall) {
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

function cekIsi() {

    let mode = '<?php echo $mode ?>';

    if (mode == "new") {
        addIsi()
    } else {
        changeIsi()
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

function getRIsiCOntent() {
    let el = resourceTambah.cgetidEl
    let d = {
        "id": '<?php  echo isset($pageData)? $pageData->id : ""; ?>',
        "isi": ""
    }


    // $(el.idIsi).val()

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

function changeIsi() {
    let c = confirm("Pastikan data Anda sudah terisi dengan benar");

    let el = resourceTambah.cgetidEl
    let d = getRIsiCOntent()

    if (c) {
        if (d.nama == "" || d.keterangan == "") {
            Swal.fire({
                icon: 'warning',
                title: "Informasi Tindakan",
                html: "<div style='font-size:1.3rem' >Mohon lengkapi dulu form isian ini </div>"
                // footer: '<a href>Why do I have this issue?</a>'
            })
        } else {
            console.log(d)
            uploadChangeIsiCOntent(d,
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


function addIsi() {
    $("#page-form").click();

    let c = confirm("Pastikan data Anda sudah terisi dengan benar");

    let el = resourceTambah.cgetidEl
    let d = getRIsiCOntent()
    console.log(d)
    let uploadDataIsi = () => {
        uploadIsiContent(d,

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
            uploadDataIsi()


        }
    }
}


$(() => {


    // $('#xid_isi').summernote({

    //   height: 300,
    //   maximumImageFileSize: 500*1024, // 500 KB
    // callbacks:{
    //     onImageUploadError: function(msg){
    //        console.log(msg + ' (1 MB)');
    //     }
    // }
    // });
    // cekPemrakarsa()
    // cekAmandemen()


})
</Script>