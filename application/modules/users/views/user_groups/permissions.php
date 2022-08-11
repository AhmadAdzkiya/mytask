<div class="be-content">
    <div class="page-head">
        <h4 class="page-head-title">Users Roles & Permissions</h4>
        <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Roles & Permissions</a></li>
                <li class="breadcrumb-item active">Permissions</li>
            </ol>
        </nav>
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
                        <span class="icon mdi mdi-account-o"></span> All Permissions
                        <span class="float-right">
                            <button id="loading-btn" class="btn btn-rounded btn-space btn-primary" data-toggle="modal"
                                data-target="#headModel"> <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Add Head Permission
                            </button>
                            <button class="btn btn-rounded btn-space btn-success" data-toggle="modal" href="#myModal">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Sub Permission
                            </button>
                        </span>
                    </div>
                    <div class="card-body">
                        
                                <?php $dataPermission  = group_permission("all"); 

                                    function getChildren2($dataPermission,$p) {
                                        $r = array();
                                        foreach($dataPermission as $row) {
                                           if ($row->parent_id ==$p) {
                                              $row->child = getChildren2($dataPermission,$row->perm_id);
                                              $r[$row->perm_id] = $row;
                                           }
                                        }
                                        return $r;
                                     }
                                     
                                     $nav = getChildren2($dataPermission,0);


                                ?>

                                <div class="container-fluid">

                                <br>
                                <br>
                                <div>Tampilan menu secara larik</div>
                                    <?php function option2($v){  ?>
                                        <ul class="dropdown-menu perm-menu-dwn"  style="min-width:300px"  aria-labelledby="dLabel">
                                        <li class="perm-menu-dwn-item" >
                                            <?= $v->icon ?>
                                            <span><?= $v->perm_name ?> </span>
                                        </li>

                                        <li class="perm-menu-dwn-item">
                                            <span>
                                            <a href="<?= base_url() ?><?= $v->url ?>">
                                            <i style=" color:green"
                                                    class="fa fa-globe"></i>
                                            Kunjungi
                                            </a>
                                            </span>
                                        </li>

                                        <li class="perm-menu-dwn-item" onclick="addSubPermissionFromParent('<?= $v->perm_id ?>','<?= htmlspecialchars($v->icon) ?>')">
                                            <span>
                                            <i style=" color:green"
                                                    class="fa fa-plus"></i>
                                            Tambah Sub Permission
                                            </span>
                                        </li>

                                        <li class="perm-menu-dwn-item"  onclick="ubahPermission('<?= $v->perm_id ?>','<?= htmlspecialchars($v->icon) ?>')">
                                            <span id="<?= $v->perm_id ?>" data-level="<?= $v->level ?>"  data-id="<?= $v->perm_id ?>" >
                                                <i style="color:green" class="fa fa-edit"></i>
                                                Ubah
                                            </span>
                                        </li>              

                                        <li class="perm-menu-dwn-item" onclick="hapusPermission('<?= base64_encode ('users/Permissions/delete_perm/'. $v->perm_id) ?>')">
                                            <span>   
                                            <a href="google.com" >
                                                <i style="color:red" class="fa fa-trash"></i>
                                                Hapus
                                            </a>
                                            </span>
                                        </li>
                                        </ul>
                                    <?php }?>

                                    
                                    <div style='background:#fafafa; padding:1rem; '>
                                    
                                    <?php 
                                       


                                        function myList($n){
                                        echo "<ul style='list-style:none; width:100%; '>";
                                            
                                                foreach($n as $row){
                                                    $fontweight = count($row->child)>0? 'bold' : $row->parent_id==0? 'bold':'normal';
                                                echo '<li '.($row->parent_id==0? "style='background:#ebeced; padding:1rem 1rem 0rem 1rem;'":"").'>

                                                <div class="btn-group">
                                                    <span title="urutan ke '.$row->urutan.', keterangan: '.$row->keterangan.'" style="font-weight:'.$fontweight.'" >'.$row->urutan.':: '.$row->icon.' '.$row->perm_name.' </span>
                                                    <span  class="btn  dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-caret-down"></i>
                                                    </span>
                                                    <div class="dropdown-menu">
                                                        <span class="dropdown-item"> '.$row->perm_name.'</span>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="'.base_url().$row->url.'">
                                                            <i style=" color:blue" class="fa fa-globe"></i>
                                                            Kunjungi
                                                        </a>
                                                        <a class="dropdown-item" href="#" onclick="addSubPermissionFromParent('."'".$row->perm_id."'".','."'".htmlspecialchars($row->icon)."'".')">
                                                            <i style=" color:green" class="fa fa-plus"></i> Tambah Sub Permission
                                                        </a>

                                                        <a class="dropdown-item" href="#" onclick="ubahPermission('."'".$row->perm_id."'".','."'".htmlspecialchars($row->icon)."'".')">
                                                            <i style=" color:orange" class="fa fa-edit"></i> Ubah Sub Permission
                                                        </a>

                                                        <a class="dropdown-item" onclick="hapusPermission('."'".base64_encode('users/Permissions/delete_perm/'.$row->perm_id)."'".')">
                                                            <i style=" color:red" class="fa fa-trash"></i> Hapus Sub Permission
                                                        </a>
                                                        
                                                        
                                                    </div>
                                                </div>

                    
                                            </li>';

                                                    if(count($row->child) >0){
                                                        echo "<ul>".myList($row->child)."</ul>";
                                                    }
                                                }
                                            echo "</ul>";
                                        }
                                
                                        myList($nav);

                                    
                                    ?>
                                    </div>

                                    <br>
                                    <br>
                                    <br>
                                    <div>Tampilan menu secara tabel</div>
                    


                                    <table class="table table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    perm id
                                                </th>
                                                <th>
                                                    nama
                                                </th>
                                                <th>
                                                    parent
                                                </th>
                                                <th>
                                                    urutan
                                                </th>
                                                <th>
                                                opsi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            function tableListMenu($n){
                                                foreach ($n as $k => $row) {
                                                    echo '
                                                    <tr>
                                                        <td>'.$row->perm_id.'</td>
                                                        <td>'.$row->icon.' '.$row->perm_name.'</td>
                                                        <td>'.$row->parent_id.'</td>
                                                        <td>'.$row->urutan.'</td>
                                                        <td>
                                                        <div class="btn-group">
                                                            <span style="font-weight:normal" > </span>
                                                            <span  class="btn  btn-default dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Kelola <i class="fas fa-caret-down"></i>
                                                            </span>
                                                            <div class="dropdown-menu">
                                                                <span class="dropdown-item"> '.$row->perm_name.'</span>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="'.base_url().$row->url.'">
                                                                    <i style=" color:blue" class="fa fa-globe"></i>
                                                                    Kunjungi
                                                                </a>
                                                                <a class="dropdown-item" href="#" onclick="addSubPermissionFromParent('."'".$row->perm_id."'".','."'".htmlspecialchars($row->icon)."'".')">
                                                                    <i style=" color:green" class="fa fa-plus"></i> Tambah Sub Permission
                                                                </a>

                                                                <a class="dropdown-item" href="#" onclick="ubahPermission('."'".$row->perm_id."'".','."'".htmlspecialchars($row->icon)."'".')">
                                                                    <i style=" color:orange" class="fa fa-edit"></i> Ubah Sub Permission
                                                                </a>

                                                                <a class="dropdown-item" onclick="hapusPermission('."'".base64_encode('users/Permissions/delete_perm/'.$row->perm_id)."'".')">
                                                                    <i style=" color:red" class="fa fa-trash"></i> Hapus Sub Permission
                                                                </a>
                                                                
                                                                
                                                            </div>
                                                        </div>

                                                        </td>
                                                    </tr>
                                                    ';
                                                    if(count($row->child)>0){
                                                        tableListMenu($row->child);
                                                    }
                                                }
                                            }
                                            tableListMenu($nav);
                                                
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<!-- Head Permission Modal -->
<div class="modal fade colored-header colored-header-primary" id="headModel" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-colored">
                <h3 class="modal-title"> <span class="icon mdi mdi-plus-circle-o-duplicate"></span> Add Head Permission
                </h3>
                <button class="close md-close" type="button" data-dismiss="modal" aria-hidden="true"><span
                        class="mdi mdi-close"> </span></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('users/Permissions/save_head_permission') ?>" method="post" role="form">
                    <div class="form-group">
                        <label>
                            <span color="#8bc34a">Head Permission Name </span>&nbsp;
                        </label>
                        <input type="text" name="perm_name" id="perm" class="form-control"
                            placeholder="example.. Dashboard,Users etc" required>
                    </div>
                    <div class="form-group">
                        <label>
                            <span color="#8bc34a">Add Icon </span>&nbsp;
                        </label>
                        <input type="text" name="icon" id="icon" class="form-control"
                            placeholder='example.. <i class="fa fa-chevron-right" aria-hidden="true"></i>' value='<i class="fa fa-chevron-right" aria-hidden="true"></i>' required>
                        <p class="help-block">font lain bisa dicari di web FontAwesome, misalnya  
                         </p>
                    </div>
                    <div class="form-group">
                        <label>
                            <span color="#8bc34a"> Add URL (Optional) </span>&nbsp;
                        </label>
                        <input type="text" name="url" id="url" class="form-control"
                            placeholder="example .. Module/Controller/Function">
                        <p class="help-block">Tentukan Nama Modul / Nama Controller / Nama Fungsi, misalnya  "dash/sakip/index"</p>
                    </div>

                    <div class="form-group">
                        <label>
                            <span color="#8bc34a">Keterangan </span>&nbsp;
                        </label>
                        <input type="text" name="keterangan" id="url" class="form-control"
                            placeholder="" required>
                        <p class="help-block">Keterangan singkat dari menu ini</p>
                    </div>

                    
                    <div class="form-group">
                        <label>
                            <span color="#8bc34a"> Urutan menu </span>&nbsp;
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
                <h3 class="modal-title"> <span class="icon mdi mdi-plus-circle-o-duplicate"></span> Add Sub Permission
                </h3>
                <button class="close md-close" type="button" data-dismiss="modal" aria-hidden="true"><span
                        class="mdi mdi-close"> </span></button>
            </div>
            <div class="modal-body">
                <form class="" action="<?= base_url('users/Permissions/sub_permission') ?>" method="post" role="form">
                    <div class="form-group">
                        <label>
                            <span color="#8bc34a"> Head Permission </span>&nbsp;
                        </label>
                        <select name="head_perm" id="head_perm" class="form-control" required>
                        <?php 
                                function get_select2($data){
                                    static $i =0;
                                    $tab = str_repeat("-",$i);
                                    $i++;
                                    foreach($data as $k => $v){
                                        echo "<option value='$v->perm_id'>$tab".' '."$v->perm_name <small> [ level: $i ]</small></option>";
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
                            <span color="#8bc34a">Permission Name </span>&nbsp;
                        </label>
                        <input type="text" name="perm" id="perm" class="form-control" placeholder="Permission Name"
                            required>
                    </div>
                    <div class="form-group">
                        <label>
                            <span color="#8bc34a"> Add URL </span>&nbsp;
                        </label>
                        <input type="text" name="url" id="url" class="form-control"
                            placeholder="example .. Module/Controller/Function" required>
                        <p class="help-block">pastikan  Module Name / Controller Name / function Name</p>
                    </div>

                    <div class="form-group">
                        <label>
                            <span color="#8bc34a">Keterangan </span>&nbsp;
                        </label>
                        <input type="text" name="keterangan" id="url" class="form-control"
                            placeholder="" required>
                        <p class="help-block">Keterangan singkat dari menu ini</p>
                    </div>

                    
                    <div class="form-group">
                        <label>
                            <span color="#8bc34a"> Urutan menu </span>&nbsp;
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
                            <span color="#8bc34a">Head Permission Name </span>&nbsp;
                        </label>
                        <input type="text" name="perm_name" id="update_perm" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label>
                            <span color="#8bc34a">Add Icon </span>&nbsp;
                        </label>
                        <input type="text" name="icon" id="update_icon" class="form-control" value=''>
                        <p class="help-block">Just copy and paste icons from font Awesome</p>
                    </div>
                    <div class="form-group">
                        <label>
                            <span color="#8bc34a"> Add URL (Optional) </span>&nbsp;
                        </label>
                        <input type="text" name="url" id="update_url" class="form-control" value="">
                        <p class="help-block">Specify Module Name / Controller Name / function Name</p>
                    </div>

                    <div class="form-group">
                        <label>
                            <span color="#8bc34a">Keterangan </span>&nbsp;
                        </label>
                        <input type="text" name="keterangan" id="update_keterangan" class="form-control"
                            placeholder="" required>
                        <p class="help-block">Keterangan singkat dari menu ini</p>
                    </div>

                    <div class="form-group">
                        <label>
                            <span color="#8bc34a">Urutan menu</span>&nbsp;
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
                            <span color="#8bc34a"> Head Permission </span>&nbsp;
                        </label>
                        <select name="head_perm" value='' class="form-control" id="default_select" required>
                            <?php 
                                function build_select_sub($sub_nav,$p,$level){ ?>
                                    <?php $pref = str_repeat("- ",$level); ?>
                                    
                                    <?php foreach($sub_nav as $k => $v): ?>
                                    <?php if(count($v->child) > 0) : ?>
                                    
                                        <option value="<?= $v->perm_id ?>"> <?= $pref.$v->perm_name ?> </option>
                                         <?php build_select($sub_nav, $v->perm_id,$level); ?>
                                         
                                         

                                    <?php else : ?>
                                        <option value="<?= $v->perm_id ?>"> <?= $pref.$v->perm_name ?> </option>

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
                                            <option value="<?= $v->perm_id ?>"> <?= $v->perm_name ?> </option>
                                        <?php else:?>
                                            <option value="<?= $v->perm_id ?>"> <?= $pref.$v->perm_name ?> </option>
                                        <?php endif; ?>
                                        
                                        <?php 
                                        build_select_sub($v->child,$v->perm_id,$l); 
                                        $l-=1;
                                         ?>
                                        
                                        

                                    <?php elseif($v->parent_id == 0 || $v->parent_id == null) : $l=0;?>
                                        <option value="<?= $v->perm_id ?>"> <?= $v->perm_name ?> </option>
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
                                        echo "<option value='$v->perm_id'>$tab".' '."$v->perm_name <small>[ level: $i ]</small></option>";
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
                            <span color="#8bc34a">Permission Name </span>&nbsp;
                        </label>
                        <input type="text" name="perm" id="sub_perm" class="form-control" placeholder="Permission Name"
                            required>
                    </div>
                    <div class="form-group">
                        <label>
                            <span color="#8bc34a"> Add URL </span>&nbsp;
                        </label>
                        <input type="text" name="url" id="sub_url" class="form-control"
                            placeholder="example .. Module/Controller/Function" required>
                        <p class="help-block">Specify Module Name / Controller Name / function Name</p>
                    </div>

                    <div class="form-group">
                        <label>
                            <span color="#8bc34a">Keterangan </span>&nbsp;
                        </label>
                        <input type="text" name="keterangan" id="sub_keterangan" class="form-control"
                            placeholder="" required>
                        <p class="help-block">Keterangan singkat dari menu ini</p>
                    </div>

                    <div class="form-group">
                        <label>
                            <span color="#8bc34a">Urutan menu </span>&nbsp;
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




<?php 
    $navForUpdate=[];
    foreach($dataPermission as $kk => $vv){
        if(isset($vv)){
            unset($vv->icon);
        $navForUpdate[] = $vv;
        }
        
    }
?>
<script>

    function hapusPermission(link){
        let c = confirm("Yakin hapus menu ini?");
        if(c){
            console.log(link)
            console.log(atob(link))
            window.location.href = '<?= bs()?>'+atob(link)
        }
    }

    function addSubPermissionFromParent(id,icon){
        let nav = <?= json_encode($navForUpdate); ?> ;
        let obj = nav.find((i)=>{if(i.perm_id == id)return i})

        $('#myModal').modal('show');
        console.log(id)

        setTimeout(() => {
            $('#head_perm').val(obj.perm_id)
        }, 250);
        
        
    }
    
    function ubahPermission(id,icon){
        let nav = <?= json_encode($navForUpdate); ?> ;
        let obj = nav.find((i)=>{if(i.perm_id == id)return i})

        if (obj.parent_id == 0) {

            $('#updateheadModel').modal('show');
            $('#update_perm').val(obj.perm_name);
            $('#update_keterangan').val(obj.keterangan)
            if(obj.urutan==0){
                
                $('#update_urutan').prop("disabled",true)
            }else{
                $('#update_urutan').prop("disabled",false)
                $('#update_urutan').val(obj.urutan)
            }
            
            $('#update_icon').val(icon);
            $('#update_url').val(obj.url);
            $('#head_id').val(obj.perm_id);
        } else {
            $('#updatesubmyModal').modal('show');
            $('#default_select').val(obj.parent_id)
            $('#sub_keterangan').val(obj.keterangan)
            $('#sub_urutan').val(obj.urutan)
            $('#sub_perm').val(obj.perm_name)
            $('#sub_url').val(obj.url)
            $('#sub_id').val(obj.perm_id)
        }


      console.log(obj)
   }
$(document).ready(function() {

    $("body").on('click', '.update', function(event) {
        event.preventDefault();

        var level = $(this).attr('data-level');
        var id = $(this).attr('data-id');

        $.ajax({

            url: "<?php bs('users/permissions/get_perm') ?>/" + id,
            type: 'POST',
            data: {
                id: id,
                level: level,
            },
            success: function(success) {
                var obj = $.parseJSON(success);
                if (obj.level == 0) {

                    $('#updateheadModel').modal('show');
                    $('#update_perm').val(obj.perm_name);
                    $('#update_icon').val(obj.icon);
                    $('#update_url').val(obj.url);
                    $('#update_url').val(obj.url);
                    $('#head_id').val(obj.perm_id);
                } else {
                    $('#updatesubmyModal').modal('show');
                    $('#default_select').val(obj.parent_id)
                    $('#sub_perm').val(obj.perm_name)
                    $('#sub_url').val(obj.url)
                    $('#sub_id').val(obj.perm_id)
                }
            }

        })
    })
});
</script>