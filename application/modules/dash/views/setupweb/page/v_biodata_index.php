<div class="be-content">
    <div class="page-head">
        <h4 class="page-head-title">Biodata Website</h4>
        <!-- <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Roles & Permissions</a></li>
                <li class="breadcrumb-item active">Permissions</li>
            </ol>
        </nav> -->
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
                <?php if (!empty($this->session->flashdata('error'))) : ?>
                <div class="alert alert-contrast alert-danger alert-dismissible" role="alert">
                    <div class="icon"><span class="mdi mdi-check"></span></div>
                    <div class="message">
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                class="mdi mdi-close" aria-hidden="true"></span></button>
                        <strong> <?= $this->session->flashdata('error') ?> </strong>
                    </div>
                </div>
                <?php endif; ?>
                <div class="card card-table card-border-color card-border-color-primary">
                    <div class="card-header ">
                        Pengaturan Biodata Website
                        <span class="float-right">
                            <!-- <button id="loading-btn" class="btn btn-rounded btn-space btn-primary" data-toggle="modal"
                                data-target="#headModel"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Tambah Halaman
                            </button> -->
                            <!-- <button class="btn btn-rounded btn-space btn-success" data-toggle="modal" href="#myModal">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Sub Halaman
                            </button> -->


                        </span>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>Dalam proses pemgembangan</h3>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<!-- Menambahkan halaman baru Modal -->

<div class="modal fade colored-header colored-header-primary" id="frmTambahModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-colored">
                <h3 class="modal-title"> <span class="icon mdi mdi-plus-circle-o-duplicate"></span> Tambah Halaman
                </h3>
                <button onclick="refreshPageIndex()" class="close md-close" type="button" data-dismiss="modal"
                    aria-hidden="true"><span class="mdi mdi-close"> </span></button>
            </div>
            <div class="modal-body" id="frmTambahAreaModal">

            </div>
            <div class="modal-footer">
                <button type="button" onclick="refreshPageIndex()" class="btn btn-default"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Head Permission Modal -->
<div class="modal fade colored-header colored-header-primary" id="headModel" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-colored">
                <h3 class="modal-title"> <span class="icon mdi mdi-plus-circle-o-duplicate"></span> Tambah Halaman
                </h3>
                <button class="close md-close" type="button" data-dismiss="modal" aria-hidden="true"><span
                        class="mdi mdi-close"> </span></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('users/Permissions/save_head_permission') ?>" method="post" role="form">
                    <div class="form-group">
                        <label>
                            <font color="#8bc34a">Head Permission Name </font>&nbsp;
                        </label>
                        <input type="text" name="nama" id="perm" class="form-control"
                            placeholder="example.. Dashboard,Users etc" required>
                    </div>
                    <div class="form-group">
                        <label>
                            <font color="#8bc34a">Add Icon </font>&nbsp;
                        </label>
                        <input type="text" name="icon" id="icon" class="form-control"
                            placeholder='example.. <i class="fa fa-trash" aria-hidden="true"></i>' required>
                        <p class="help-block">Just copy and paste icons from font Awesome</p>
                    </div>
                    <div class="form-group">
                        <label>
                            <font color="#8bc34a"> Add URL (Optional) </font>&nbsp;
                        </label>
                        <input type="text" name="url" id="url" class="form-control"
                            placeholder="example .. Module/Controller/Function">
                        <p class="help-block">Specify Module Name / Controller Name / function Name</p>
                    </div>

                    <div class="form-group">
                        <label>
                            <font color="#8bc34a">Keterangan </font>&nbsp;
                        </label>
                        <input type="text" name="keterangan" id="url" class="form-control" placeholder="" required>
                        <p class="help-block">Keterangan singkat dari menu ini</p>
                    </div>


                    <div class="form-group">
                        <label>
                            <font color="#8bc34a"> Urutan menu </font>&nbsp;
                        </label>
                        <input type="text" name="urutan" id="url" class="form-control"
                            placeholder="example .. 1, 2 atau 3 dst" required>
                        <p class="help-block">Nomor urut dari atas ke bawah </p>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

            </form>
        </div>
    </div>
</div>

<!-- Sub Permission Modal -->
<div class="modal fade colored-header colored-header-primary" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-colored">
                <h3 class="modal-title"> <span class="icon mdi mdi-plus-circle-o-duplicate"></span> Tambah Sub Halaman
                </h3>
                <button class="close md-close" type="button" data-dismiss="modal" aria-hidden="true"><span
                        class="mdi mdi-close"> </span></button>
            </div>
            <div class="modal-body">
                <form class="" action="<?= base_url('users/Permissions/sub_permission') ?>" method="post" role="form">
                    <div class="form-group">
                        <label>
                            <font color="#8bc34a"> Head Permission </font>&nbsp;
                        </label>
                        <select name="head_perm" id="head_perm" class="form-control" required>
                            <?php 
                                function get_select2($data){
                                    static $i =0;
                                    $tab = str_repeat("-",$i);
                                    $i++;
                                    foreach($data as $k => $v){
                                        echo "<option value='$v->id'>$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
                                        if(count($v->child)>0){
                                            get_select2($v->child);
                                            $i--;
                                        }else{

                                        }
                                    }
                                
                                    
                                }

                                echo get_select2($nav)
                             ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>
                            <font color="#8bc34a">Permission Name </font>&nbsp;
                        </label>
                        <input type="text" name="perm" id="perm" class="form-control" placeholder="Permission Name"
                            required>
                    </div>
                    <div class="form-group">
                        <label>
                            <font color="#8bc34a"> Add URL </font>&nbsp;
                        </label>
                        <input type="text" name="url" id="url" class="form-control"
                            placeholder="example .. Module/Controller/Function" required>
                        <p class="help-block">pastikan Module Name / Controller Name / function Name</p>
                    </div>

                    <div class="form-group">
                        <label>
                            <font color="#8bc34a">Keterangan </font>&nbsp;
                        </label>
                        <input type="text" name="keterangan" id="url" class="form-control" placeholder="" required>
                        <p class="help-block">Keterangan singkat dari menu ini</p>
                    </div>


                    <div class="form-group">
                        <label>
                            <font color="#8bc34a"> Urutan menu </font>&nbsp;
                        </label>
                        <input type="text" name="urutan" id="url" class="form-control"
                            placeholder="example .. 1, 2 atau 3 dst" required>
                        <p class="help-block">Nomor urut dari atas ke bawah </p>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Update Head Permission Modal -->
<div class="modal fade colored-header colored-header-primary" id="updateheadModel" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-colored">
                <h3 class="modal-title"> <span class="icon mdi mdi-edit"></span> Update Head Permission </h3>
                <button class="close md-close" type="button" data-dismiss="modal" aria-hidden="true"><span
                        class="mdi mdi-close"> </span></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('users/Permissions/update_perm') ?>" method="post" role="form">
                    <div class="form-group">
                        <label>
                            <font color="#8bc34a">Head Permission Name </font>&nbsp;
                        </label>
                        <input type="text" name="nama" id="update_perm" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label>
                            <font color="#8bc34a">Add Icon </font>&nbsp;
                        </label>
                        <input type="text" name="icon" id="update_icon" class="form-control" value=''>
                        <p class="help-block">Just copy and paste icons from font Awesome</p>
                    </div>
                    <div class="form-group">
                        <label>
                            <font color="#8bc34a"> Add URL (Optional) </font>&nbsp;
                        </label>
                        <input type="text" name="url" id="update_url" class="form-control" value="">
                        <p class="help-block">Specify Module Name / Controller Name / function Name</p>
                    </div>

                    <div class="form-group">
                        <label>
                            <font color="#8bc34a">Keterangan </font>&nbsp;
                        </label>
                        <input type="text" name="keterangan" id="update_keterangan" class="form-control" placeholder=""
                            required>
                        <p class="help-block">Keterangan singkat dari menu ini</p>
                    </div>

                    <div class="form-group">
                        <label>
                            <font color="#8bc34a">Urutan menu</font>&nbsp;
                        </label>
                        <input type="text" name="urutan" id="update_urutan" class="form-control"
                            placeholder="Isi angka 1 atau 2 atau 3 dan seterusnya" required>
                        <p class="help-block">Urutan dari menu dari atas ke bawah, misalnya 1, 2, 3 dan seterusnya</p>
                    </div>


                    <input type="hidden" name="id" id="head_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-times-circle"
                        aria-hidden="true"></i> Close</button>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Update changes</button>
            </div>
            </form>

        </div>
    </div>
</div>


<!-- Sub Permission Modal -->
<div class="modal fade colored-header colored-header-primary" id="updatesubmyModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-colored">
                <h3 class="modal-title"> <span class="icon mdi mdi-edit"></span> Update Sub Permission </h3>
                <button class="close md-close" type="button" data-dismiss="modal" aria-hidden="true"><span
                        class="mdi mdi-close"> </span></button>
            </div>
            <div class="modal-body">
                <form class="" action="<?= base_url('users/Permissions/update_sub_permission') ?>" method="post"
                    role="form">
                    <div class="form-group">
                        <label>
                            <font color="#8bc34a"> Head Permission </font>&nbsp;
                        </label>
                        <select name="head_perm" value='' class="form-control" id="default_select" required>
                            <?php 
                                function build_select_sub($sub_nav,$p,$level){ ?>
                            <?php $pref = str_repeat("- ",$level); ?>

                            <?php foreach($sub_nav as $k => $v): ?>
                            <?php if(count($v->child) > 0) : ?>

                            <option value="<?= $v->id ?>"> <?= $pref.$v->nama ?> </option>
                            <?php build_select($sub_nav, $v->id,$level); ?>



                            <?php else : ?>
                            <option value="<?= $v->id ?>"> <?= $pref.$v->nama ?> </option>

                            <?php endif; ?>
                            <?php endforeach ?>

                            <?php 
                                }


                                function build_select($nav,$p,$l){?>
                            <?php foreach($nav as $k => $v): ?>
                            <?php if(count($v->child) > 0) : 
                                        
                                        $l+=1;
                                         $pref = str_repeat(" ",$l);
                                        ?>
                            <?php if($v->parent_id == 0 || $v->parent_id == null) : ?>
                            <option value="<?= $v->id ?>"> <?= $v->nama ?> </option>
                            <?php else:?>
                            <option value="<?= $v->id ?>"> <?= $pref.$v->nama ?> </option>
                            <?php endif; ?>

                            <?php 
                                        build_select_sub($v->child,$v->id,$l); 
                                        $l-=1;
                                         ?>



                            <?php elseif($v->parent_id == 0 || $v->parent_id == null) : $l=0;?>
                            <option value="<?= $v->id ?>"> <?= $v->nama ?> </option>
                            <?php endif; ?>
                            <?php endforeach ?>

                            <?php }

                                    // build_select($nav,0)

                             ?>

                            <?php 
                                function get_select($data){
                                    static $i =0;
                                    $tab = str_repeat("_",$i);
                                    $i++;
                                    foreach($data as $k => $v){
                                        echo "<option value='$v->id'>$tab".' '."$v->nama <small>[ level: $i ]</small></option>";
                                        if(count($v->child)>0){
                                            get_select($v->child);
                                            $i--;
                                        }else{

                                        }
                                    }
                                }

                                echo get_select($nav)
                             ?>
                        </select>


                    </div>
                    <div class="form-group">
                        <label>
                            <font color="#8bc34a">Permission Name </font>&nbsp;
                        </label>
                        <input type="text" name="perm" id="sub_perm" class="form-control" placeholder="Permission Name"
                            required>
                    </div>
                    <div class="form-group">
                        <label>
                            <font color="#8bc34a"> Add URL </font>&nbsp;
                        </label>
                        <input type="text" name="url" id="sub_url" class="form-control"
                            placeholder="example .. Module/Controller/Function" required>
                        <p class="help-block">Specify Module Name / Controller Name / function Name</p>
                    </div>

                    <div class="form-group">
                        <label>
                            <font color="#8bc34a">Keterangan </font>&nbsp;
                        </label>
                        <input type="text" name="keterangan" id="sub_keterangan" class="form-control" placeholder=""
                            required>
                        <p class="help-block">Keterangan singkat dari menu ini</p>
                    </div>

                    <div class="form-group">
                        <label>
                            <font color="#8bc34a">Urutan menu </font>&nbsp;
                        </label>
                        <input type="text" name="urutan" id="sub_urutan" class="form-control"
                            placeholder="Isi angka 1 atau 2 atau 3 dan seterusnya" required>
                        <p class="help-block">Urutan dari menu dari atas ke bawah, misalnya 1, 2, 3 dan seterusnya</p>
                    </div>

                    <input type="hidden" name="id" id="sub_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-times-circle"
                        aria-hidden="true"></i> Close</button>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Update changes</button>
            </div>

            </form>

        </div>
    </div>
</div>