<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>


<div class="be-content">

    <div class="page-head">
        <h2 class="page-head-title">Dashboard <span class="page-head-sub-title"> </span></h2>
    </div>
    <div class="main-content container-fluid">
        <div>
            <h2>Halo, <strong> <?php echo $user->first_name." ".$user->last_name; ?></strong></h2>
            <h4>Ini adalah panel Admin. Anda dapat mengelola dan melihat data aktivitas yang telah dilakukan seperti
                tagihan siswa dan data administrasi lainnya. </h4>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <?php if($user->verification_email !== '0'){  ?>
                <style>
                .w_link:hover {
                    margin-left: 1rem;
                    transition: 0.7s;
                    background: #f4f4f4;
                    cursor: pointer;
                }
                </style>

                <div class="row">

                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="widget widget-tile w_link" id='w_link_aktivasi'>
                            <div class="chart sparkline" id="spark1">
                                <!-- <canvas width="85" height="35"
                                    style="display: inline-block; width: 85px; height: 35px; vertical-align: top;"></canvas> -->
                                <i style="color:#666666; font-size:4rem" class="far fa-user"></i>
                            </div>
                            <div class="data-info">
                                <div class="desc">Status Akun</div>
                                <div class="value">
                                    <span class="number" data-toggle="counter"
                                        data-end="113"></span>

                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="widget widget-tile w_link" id='w_link_aspirasi'>
                            <div class="chart sparkline" id="spark1">
                                <!-- <canvas width="85" height="35"
                                    style="display: inline-block; width: 85px; height: 35px; vertical-align: top;"></canvas> -->
                                <i style="color:#666666; font-size:4rem" class="far fa-comment-dots"></i>
                            </div>
                            <div class="data-info">
                                <div class="desc">Jumlah Aspirasi</div>
                                <div class="value">
                                    <span class="number" data-toggle="counter"
                                        data-end="113"><?php echo count($aspirasi); ?></span>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="widget widget-tile w_link" id='w_link_raperda'>
                            <div class="chart sparkline" id="spark1">
                                <!-- <canvas width="85" height="35"
                                    style="display: inline-block; width: 85px; height: 35px; vertical-align: top;"></canvas> -->
                                <i style="color:#666666; font-size:4rem" class="far fa-file"></i>

                            </div>
                            <div class="data-info">
                                <div class="desc">Raperda Tersedia</div>
                                <div class="value">
                                    <span class="number" data-toggle="counter"
                                        data-end="113"><?php echo count($raperda);?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php }else{ ?>
                <div class="jumbotron">
                    <h1 class="display-4">Halo, <strong>
                            <?php echo $user->first_name." ".$user->last_name; ?></strong></h1>
                    <p class="lead">Silakan konfirmasi Email Anda untuk melanjutkan fitur Aspirasi ini</p>
                    <hr class="my-4">
                    <p>Silakan periksa email Anda dan segera konfirmasi, sehingga Anda bisa melanjutkan aktivasi
                        sebagai aspirator.
                        <br>
                        Jika email kami tidak ditemukan, silakan cek folder spam atau
                        <br>
                        <span onclick='resendEmail()' class='btn btn-secondary'>kirim ulang email
                            Verifikasi</span>
                        <br>
                        Terimakasih
                    </p>
                    <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
                </div>
                <?php } ?>

                    
<?php // print_r(var_dump($this->ion_auth->get_user_groups())); ?>
            </div>
        </div>
    </div>



</div>
