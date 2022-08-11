<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>

<div class="be-content">
    <div class="page-head">
        <h4 class="page-head-title">Tambah Halaman Dasar  <span class="page-head-sub-title"></span>
        </h4>
    </div>

    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <?php if (!empty($this->session->flashdata('success'))) : ?>
                <div class="alert alert-contrast alert-success alert-dismissible" role="alert">
                    <div class="icon"><span class="mdi mdi-check"></span></div>
                    <div class="message">
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                class="mdi mdi-close" aria-hidden="true"></span></button>
                        <strong> <?= $this->session->flashdata('success') ?> </strong>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (!empty($this->session->flashdata('failed'))) : ?>
                <div class="alert alert-contrast alert-danger alert-dismissible" role="alert">
                    <div class="icon"><span class="fa fas-times"></span></div>
                    <div class="message">
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                class="mdi mdi-close" aria-hidden="true"></span></button>
                        <strong> <?= $this->session->flashdata('failed') ?> </strong>
                    </div>
                </div>
                <?php endif; ?>

                <div class="card card-table  card-border-color card-border-color-primary">
                    <div class="card-header">
                    <div class="row">
                            <div class="col-sm-12">
                                <ul class="nav">

                                    <li class="nav-item float-right">
                                        Menambahkan Halaman untuk menu publik
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding:1rem">
                        <?php $this->load->view($nmPage."v_page_tambah_content",["nmPage"=>$nmPage,"mode"=>"new"]);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>