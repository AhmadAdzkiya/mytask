<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Aplikasi</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

    <!--         
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"> -->


    <link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= bs() ?>public/assets/fonts/fontawesome5/css/all.css" />

    <link rel="stylesheet" type="text/css" href="<?= bs() ?>public/assets/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?= bs() ?>public/assets/css/iofrm-theme9.css">
    <link rel="stylesheet" type="text/css" href="<?= bs() ?>public/b-asset/css/mlndev.css">
    <link rel="shortcut icon" href="<?= bs() ?>public/b-asset/img/mulanlogo.png">

</head>

<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img style="height:8rem; width:7rem; margin:auto;"
                        src="<?= bs() ?>public/b-asset/img/mulanlogo.png">
                    <br>
                    <br>
                    <h1>DASHBOARD</h1>
                    <h5>APPS</h5>
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <!-- <img style="position:fixed; right:-5em; bottom:-5em; width:20em;" src="<?= bs() ?>public/b-asset/img/kopi_pecah_op50.png" alt=""> -->
                    <div class="form-items" style="z-index:999; max-width:380px">
                        <!-- <div style="z-index:0; position:fixed; bottom:0px; right:0px; width:320px; height:400px; background-image:url('<?= bs() ?>public/b-asset/img/bwidev_gajah_oling_soft.png'); background-size:cover; background-repeat:no-repeat; background-position:top center;">
                    </div> -->
                        <div class="website-logo-inside">
                            <a href="#">

                                <div class="logo">
                                    <img class="logo-size" src="<?= bs() ?>public/b-asset/img/mulanlogo.png" alt="">
                                </div>

                                <div class="logo">
                                    <!-- <img class="logo-size-2" src="<?= bs() ?>public/b-asset/img/kopi_pecah_op50.png" alt=""> -->
                                </div>
                            </a>
                        </div>
                        <div class="page-links">



                            <?php 
                                $success = $this->session->flashdata('success');
                                $error   = $this->session->flashdata('error');
                                $message   = $this->session->flashdata('message');
 
                                echo isset($success) ? $success : "";
                                echo isset($error) ? $error : "";
                                echo isset($message) ? $message : "";
                            ?>
                            <a href="#" class="active"><i class="fas fa-key"></i> Masuk Dashboard</a>
                            <?php 
                                if ($reg_status[0]->registration_status == 1): 
                            ?>
                            <a href="<?= base_url('users/Register') ?>">Register</a>
                            <?php endif; ?>
                        </div>
                        <form id="login_form" action="<?= base_url('users/auth/login') ?>" method="post">
                            <input class="form-control" type="email" name="identity" id="identity"
                                style="font-weight:bold" placeholder="Alamat email" required>
                            <input class="form-control" type="password" name="password" style="font-weight:bold"
                                placeholder="Password" required>

                            <input type="checkbox" class="form-check-input" name="remember" value="1"
                                id="exampleCheck1">

                            <!-- <label class="form-check-label" for="exampleCheck1"> Remember me</label> -->

                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Masuk</button>

                                <!-- <?php if ($reg_status[0]->forgot_pass_status == 1): ?>
                                    <a href="<?= base_url('users/register/forgot_pass') ?>">
                                        Forget Password?
                                    </a>
                                <?php endif ?>     -->
                            </div>
                        </form>
                        <?php if ($reg_status[0]->socail_login_status == 1): ?>
                        <div class="other-links">
                            <!-- <span>Or login with</span>
                                 <a href="<?= bs() ?>users/register/demo">Facebook</a>
                                <a href="<?= bs() ?>users/register/demo">Google</a>
                                <a href="<?= bs() ?>users/register/demo">Instagram</a>
                                <a href="<?= bs() ?>users/register/demo">Linkedin</a> -->
                            <!-- <a href="<?= $fbUrl ?>">Facebook</a>
                                <a href="<?= $authUrl ?>">Google</a>
                                <a href="https://api.instagram.com/oauth/authorize/?client_id=cc0c6e3ffad5457eb811cf3bd99f0524&redirect_uri=http://localhost/login/users/Social_login/instagram_login&response_type=code&scope=public_content">Instagram</a>
                                <a href="<?php echo "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id={$client_id}&redirect_uri={$redirect_uri}&state={$csrf_token}&scope={$scopes}"; ?>">Linkedin</a> -->
                        </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://brandio.io/envato/iofrm/html/js/jquery.min.js"></script>
    <script src="http://brandio.io/envato/iofrm/html/js/popper.min.js"></script>
    <script src="http://brandio.io/envato/iofrm/html/js/bootstrap.min.js"></script>
    <script src="<?= bs() ?>public/assets/js/main.js"></script>
</body>

</html>


<script src="<?= base_url('public/assets/js/bootstrap-notify.js') ?>"></script>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js">
</script>
<script>
$("#login_form").validate();
</script>
<script>
$(document).ready(function() {
    $("[rel=tooltip]").tooltip({
        placement: 'top'
    });
});
</script>
<!-- Notification Script -->
<script>
<?php
      $success = $this->session->flashdata('success');
      $error   = $this->session->flashdata('error');
      $message   = $this->session->flashdata('message');
      if (!empty($success))
       {
      ?>
$.notify({

    icon: 'glyphicon glyphicon-info-sign',
    title: '<b>Notification</b><br>',
    message: '<?php echo $success ?>',
}, {


    type: "success success-noty col-md-3",
    allow_dismiss: true,
    placement: {
        from: "top",
        align: "right"
    },
    offset: 20,
    spacing: 10,
    z_index: 1431,
    delay: 5000,
    timer: 1000,
    animate: {
        enter: 'animated bounceInDown',
        exit: 'animated bounceOutUp'
    }
});
<?php
      } 
      if (!empty($error))
       {
      ?>
alert('<?php echo $error ?>')
$.notify({

    icon: 'glyphicon glyphicon-info-sign',
    title: '<b>Notification</b><br>',
    message: '<?php echo $error ?>',
}, {


    type: "danger noty-color col-md-3",
    allow_dismiss: true,
    placement: {
        from: "top",
        align: "right"
    },
    offset: 20,
    spacing: 10,
    z_index: 1431,
    delay: 5000,
    timer: 1000,
    animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
    }
});
<?php            
      }
      ?>
</script>
<script>
<?php
      if (!empty($message))
        {
      ?>
$.notify({

    icon: 'glyphicon glyphicon-info-sign',
    title: '<b>Notification</b><br>',
    message: '<?php echo $message;?>',
}, {

    type: "success success-noty col-md-3 col-md-offset-2",
    allow_dismiss: true,
    placement: {
        from: "top",
        align: "right"
    },
    offset: 20,
    spacing: 10,
    z_index: 1431,
    delay: 5000,
    timer: 1000,
    animate: {
        enter: 'animated bounceInDown',
        exit: 'animated bounceOutUp'
    }
});
<?php
      }
      ?>
</script>
<script>
<?php  
      if (!empty($_GET['err_msg']))  
      {
      ?>
$.notify({
    title: '<strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Error!</strong>',
    message: '<?php echo $_GET['err_msg'] ?>'
}, {
    type: 'danger alert-danger-alt col-md-3 col-md-offset-3'
});
<?php 
      } 
       elseif (!empty($_GET['success_msg']))  
      {
       ?>

$.notify({
    title: '<strong> <span class= "glyphicon glyphicon-ok"></span> Success!</strong>',
    message: '<?php echo $_GET['success_msg'] ?>'
}, {
    type: 'success alert-success-alt col-md-3'
});

<?php    
      }    
      ?>
</script>