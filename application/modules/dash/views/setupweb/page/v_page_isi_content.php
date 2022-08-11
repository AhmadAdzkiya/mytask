<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/
//cek mode edit atau new 
$mode = isset($mode) ? $mode : "new"; 
?>




<div class="">
    <div class="">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" />

        <link rel="stylesheet"
            href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css" />

        <link rel="stylesheet" href="//cdn.quilljs.com/1.3.6/quill.snow.css" />

        <script src="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

        <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
        <!-- <script src="<?= base_url().'public/b-asset/lib/quill/modul-image-resize/image-resize.min.js'; ?>"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>

        <!-- https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js -->

        <div id="standalone-container">
            <div id="toolbar-container" style="position:absolute:top:0;">
                <span class="ql-formats">
                    <select class="ql-font"></select>
                    <select class="ql-size">
                    <option value="10px">Small</option>
                    <option value="13px" selected>Normal</option>
                    <option value="18px" >Large</option>
                    <option value="32px">Huge</option>
                    
                    </select>
                </span>
                <span class="ql-formats">
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline"></button>
                    <button class="ql-strike"></button>
                </span>
                <span class="ql-formats">
                    <select class="ql-color"></select>
                    <select class="ql-background"></select>
                </span>
                <span class="ql-formats">
                    <button class="ql-script" value="sub"></button>
                    <button class="ql-script" value="super"></button>
                </span>
                <span class="ql-formats">
                    <button class="ql-header" value="1"></button>
                    <button class="ql-header" value="2"></button>
                    <button class="ql-blockquote"></button>
                    <button class="ql-code-block"></button>
                </span>
                <span class="ql-formats">
                    <button class="ql-list" value="ordered"></button>
                    <button class="ql-list" value="bullet"></button>
                    <button class="ql-indent" value="-1"></button>
                    <button class="ql-indent" value="+1"></button>
                </span>
                <span class="ql-formats">
                    <button class="ql-direction" value="rtl"></button>
                    <select class="ql-align"></select>
                </span>
                <span class="ql-formats">
                    <button class="ql-link"></button>
                    <button class="ql-image"></button>
                    <button class="ql-video"></button>
                    <button class="ql-formula"></button>
                </span>
                <span class="ql-formats">
                    <button class="ql-clean"></button>
                </span>
            </div>
            <div style="min-height:10rem; max-height:50rem; overflow:auto; padding-bottom:10rem" id="editor-container">
                <?= isset($page)? $page->isi:"" ?>
            </div>
        </div>




        <div id="counter"></div>
        <script>
        var counter = function(quill, options) {
            var container = document.querySelector(options.container);
            quill.on('text-change', function() {
                var text = quill.getText();
                if (options.unit === 'word') {
                    container.innerText = text.split(/\s+/).length + ' words';
                } else {
                    container.innerText = text.length + ' characters';
                }
            });
        }
        // console.log(counter)

        // Quill.register('modules/counter',counter);
        var ColorClass = Quill.import('attributors/class/color');
        var SizeStyle = Quill.import('attributors/style/size');
        Quill.register(ColorClass, true);
        Quill.register(SizeStyle, true);


        var quill = new Quill('#editor-container', {
            placeholder: 'Tulis konten berkualitas Anda di sini ...',
            theme: 'snow',
            modules: {
                syntax: true,
                toolbar: '#toolbar-container',
                // counter: {
                // container: '#counter',
                // unit: 'word'
                // },
                imageResize: {}

            },
        });
        </script>

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
        "isi": quill.root.innerHTML
    }

    console.log(d)

    // // $(el.idIsi).val()

    // if ('<?php echo $mode; ?>' != "new") {
    //     d["modifiedby"] = $("#modifiedby").val();
    //     d["modifierid"] = $("#modifierid").val();
    // } else {
    //     d.createdby = $("#createdby").val()
    //     d.creatorid = $("#creatorid").val()
    //     d.modifiedby = $("#modifiedby").val()
    //     d.modifierid = $("#modifierid").val()
    // }

    // let arr = Object.keys(d)

    // for (let i = 0; i < arr.length; i++) {
    //     if (!Array.isArray(d[arr[i]])) {
    //         d[arr[i]] = escapeHtml(d[arr[i]])
    //     } else {
    //         let a = d[arr[i]]
    //         for (let ii = 0; ii < a.length; ii++) {
    //             a[ii] = escapeHtml(a[ii])
    //         }

    //         d[arr[i]] = a;
    //     }

    // }

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