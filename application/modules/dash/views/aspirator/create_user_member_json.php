<link rel="stylesheet" href="<?= bs() ?>public/b-asset/lib/sweetalert/sweetalert2.all.min.css" type="text/css" />
<script src="<?= bs() ?>public/b-asset/lib/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <div style="padding:1rem; background:url('<?= base_url().'public/b-asset/img/beige-paper.png'?>')" >
                <div class="">
                    <div style="text-align:center">
                        <strong><h5>Form Pendaftaran Aspirator</h5></strong> 
                    </div>
                    
                    <?= form_open('users/aspirator/add_user_json', array('id' => 'user_form_validation', 'class' => '')); ?>
                    <div class="form-group">
                        <label for="fieldname" class="control-label">Nama Depan</label>
                        <input type="text" id="first_name" name="first_name" class="form-control"
                            placeholder="Nama Depan" required />
                    </div>
                    <div class="form-group">
                        <label for="fieldname" class="control-label">Nama Belakang</label>
                        <input type="text" id="last_name" name="last_name" class="form-control"
                            placeholder="Nama Belakang" required />
                    </div>
                    <div class="form-group">
                        <label for="fieldname" class="control-label">Nama Pengguna</label>
                        <input type="text" id="username" name="username" class="form-control"
                            placeholder="Nama Pengguna" required />
                        <div id="username_message" style="color: red;font-weight: bold;"> </div>
                    </div>
                    <?php
                        if ($identity_column !== 'email') {
                           echo '<p>';
                           echo lang('create_user_identity_label', 'identity');
                           echo '<br />';
                           echo form_error('identity');
                           echo form_input($identity);
                           echo '</p>';
                        }
                        ?>
                    <div class="form-group">
                        <label for="fieldname" class="control-label">Surel / Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Example@gmail.com"
                            required />
                        <div id="user_mail" style="color: red;font-weight: bold;"></div>
                    </div>
                    <div class="form-group">
                        <label for="fieldname" class="control-label">Nama Perusahaan / Kelompok</label>
                        <input type="text" id="company" name="company" class="form-control"
                            placeholder="Nama Perusahaan / Kelompok" required />
                    </div>
                    <div class="form-group">
                        <label for="fieldname" class="control-label">Nomor telepon</label>
                        <input type="text" id="email" name="phone" class="form-control" placeholder="1111-1111-1111"
                            required />
                    </div>
                    <div class="form-group">
                        <label for="fieldname" class="control-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="***********" required minlength="8" />
                    </div>
                    <div class="form-group">
                        <label for="fieldname" class="control-label">Konfirmasi Password</label>
                        <input type="password" id="password" name="confirm_password" class="form-control"
                            placeholder="***********" required />
                    </div>
                    <div class="form-group" style="display:none"> 
                        <label for="fieldname" class="control-label">Pilih Grup</label>
                        <select class="form-control" name="group" id="" required>
                            <option value="">Pilih Grup</option>
                            <?php foreach ($groups as $key => $value) : ?>
                            
                            <option value="<?php echo $value->id ?>" selected><?php echo $value->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3">
                            <input type="submit" id="submitbtn" class="finish btn-success btn" value="Daftar Sekarang">
                        </div>
                        </fieldset>
                    </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
<script>
function valmail(email) {
    return /\S+@\S+\.\S+/.test(email)
}

function goto(url){
   window.location.href = url
}

$(document).ready(function() {


    var frm = $('#user_form_validation');

    frm.submit(function(e) {

        e.preventDefault();

        var base = '<?php echo base_url()."dash/"?>'

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            beforeSend: function(data) {
                $("#submitbtn").val("Sedang mendaftar...")
                console.log("sedang mendaftarkan diri ")
            },
            success: function(data) {
                data = JSON.parse(data)
                if (data.status) {
                    Swal.fire({
                        icon: 'success',
                        title: "Informasi Tindakan",
                        html: `<div style='font-size:1.3rem' >${data.message} </div> 
                        <ul style=" text-align:left">
                        <li style=" text-align:left">
                        Silakan cek email Anda untuk memverifikasi akun email
                        </li>
                        <li style=" text-align:left">
                        Kemudian lanjutkan ke halaman dashboard member untuk 
                        pengajuan aktivasi menjadi aspirator <a onclick="goto('${base}')" href="${base}">Masuk ke Dashboard</a>
                        </li>
                        </ul>
                        , <br> `
                        // footer: '<a href>Why do I have this issue?</a>'
                    })
                    $("#submitbtn").val("Submit")
                    console.log('Submission was successful.');
                    console.log(data);
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: "Informasi Tindakan",
                        html: `<div style='font-size:1.3rem' >${data.message}</div>`
                        // footer: '<a href>Why do I have this issue?</a>'
                    })
                }



            },
            error: function(data) {
                $("#submitbtn").val("Submit, Again")
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });


    //This script is to check email validity
    $("#email").change(function() {

        var email = $("#email").val();
        if (email == "") {
            $("#user_mail").fadeIn();
            $("#user_mail").text(
                "Email tidak boleh kosong.");
        } else {

            if (valmail(email)) {
                $("#user_mail").text("");
                $.ajax({
                    url: '<?= base_url("users/Register/check_email") ?>',
                    method: 'POST',
                    dataType: 'TEXT',
                    data: {
                        myemail: email
                    },
                    beforeSend: function(data) {
                        $("#user_mail").fadeIn();
                        $("#user_mail").html(
                           "<span class=' text-primary'>cek email...</span>"
                        );
                     },
                    success: function(result) {
                        var msg = result.split("::");

                        if (msg[0] == "ok") {
                            $("#user_mail").fadeIn();
                            $("#user_mail").text(
                                "Email ini sudah terpakai, cobalah cari yang lain.");
                        } else {
                            $("#user_mail").fadeIn();
                            $("#user_mail").html(
                                "<span class='icon mdi mdi-badge-check text-success'> Oke email ini bisa dipakai</span>"
                            );
                            $("#user_mail").delay(3000).fadeOut();
                        }
                    },
                    error: function(result) {
                        // body...
                        console.log(result);
                    }
                })

            } else {
                $("#email").val("");
                $("#user_mail").text("");
                $("#user_mail").fadeIn();
                $("#user_mail").text(
                    "struktur Email << " + email + " >> tidak valid, silakan perbaiki");
            }
        }

    });

    //This script is to check Username validity
    $("#username").change(function() {

        var username = $("#username").val();
        if (username == "") {
            $("#username_message").fadeIn();
            $("#username_message").html(
                'Username ini tidak boleh kosong');
        } else {
            $.ajax({
                url: '<?= base_url("users/Register/check_username") ?>',
                method: 'POST',
                dataType: 'HTML',
                data: {
                    u_name: username
                },
                beforeSend: function(data) {
                    $("#username_message").fadeIn();
                    $("#username_message").html(
                        "<span class=' text-primary'>cek username...</span>"
                    );
                },
                success: function(result) {
                    var msg = result.split("::");

                    if (msg[0] == "ok") {
                        $("#username_message").fadeIn();
                        $("#username_message").html(
                            'Username ini sudah dipakai, cobalah pakai yang lain');
                    } else {
                        $("#username_message").fadeIn();
                        $("#username_message").html(
                            "<span class='icon mdi mdi-badge-check text-success'> Oke username bisa dipakai</span>"
                        );
                        $("#username_message").delay(3000).fadeOut();
                    }
                },
                error: function(result) {
                    // body...
                    console.log(result);
                }
            })
        }

    });
});
</script>