<?php 
$user = $this->ion_auth->user()->row();
$id_group = $this->ion_auth->get_users_groups()->row()->id;
$user_groups = $this->ion_auth->get_users_groups($user->id)->result();
$baseUrl = base_url();
$user = $this->ion_auth->user()->row();
$user_groups = $this->ion_auth->get_users_groups($user->id)->result();

?>

<style>
@media screen and (max-width:600px) {
    #sdb-btn {
        display: none;
    }
}
</style>
<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Menu</a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content" style="background:#ffffff">
                    <ul class="sidebar-elements" id="sdb-el" style="background:#ffffff">
                        <li title="Menu aplikasi" id="sdb-btn" class="divider">Menu</li>
                        <li title="Dashboard untuk ringakasan informasi yang ada dalam sistem" class=" active ">
                            <a href="<?= $baseUrl; ?>dash" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Dashboard ">
                                <i class="fa fa-home" aria-hidden="true"></i> <span>Dashboard </span>
                            </a>
                        </li>

                        <?php foreach ($user_groups as $key => $value) {

                            if($value->id == "2"){ ?>
                        <li title="Memuat informasi Tugas" class="parent">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Laporan ">
                                <i class="fa fa-file" aria-hidden="true"></i> <span>Tugas </span>
                            </a>
                            <ul title="Memuat informasi Tugas" class="sub-menu">
                                <li class="nav-items">
                                    <a href="<?= $baseUrl; ?>dash/tugas/tugas/index">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        <span>Histori Pembuatan Tugas </span>
                                    </a>
                                </li>

                                <li class="nav-items">
                                    <a href="<?= $baseUrl; ?>dash/tugas/tugas/buatTugas">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        <span>Buat Tugas Baru</span>
                                    </a>
                                </li>

                                <li class="nav-items">
                                    <a href="<?= $baseUrl; ?>dash/tugas/tugas/penugasansaya">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        <span> Penugasan</span>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <?php  }
                            
                            else if($value->id == "1"){ ?>
                        <li title="manajemen tentang pengguna" class="parent  ">
                            <a href="javascript:;" data-toggle="tooltip" data-placement="right" title=""
                                data-original-title="Para pengguna ">
                                <i class="fas fa-users"></i> <span>Para pengguna </span>
                            </a>
                            <ul title="manajemen tentang pengguna" class="sub-menu">
                                <li class="title">Para pengguna </li>
                                <li class="nav-items">
                                    <div class="be-scroller">
                                        <div class="content">
                                            <ul>
                                                <li title="" class="  ">
                                                    <a title="" href="<?= $baseUrl; ?>users/create_user">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> Add Users</div>
                                                    </a>
                                                </li>
                                                <li title="" class="  ">
                                                    <a title="" href="<?= $baseUrl; ?>users">
                                                        <div title=""><i class="fa fa-angle-right"
                                                                aria-hidden="true"></i> View Users</div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <?php  }
                        }
                        ?>





                        <!-- <li title="Mengatur menu akses" class="parent open">
								<a href="javascript:;" data-toggle="tooltip" data-placement="right" title=""
									data-original-title="Aturan &amp; Perijinan ">
									<i class="fas fa-ruler-combined"></i> <span>Aturan &amp; Perijinan </span>
								</a>
								<ul title="Mengatur menu akses" class="sub-menu">
									<li class="title">Aturan &amp; Perijinan </li>
									<li class="nav-items">
										<div class="be-scroller">
											<div class="content">
												<ul>
													<li title="" class="  ">
														<a title="" href="http://localhost/lkppapp/users/User_groups/create_group">
															<div title=""><i class="fa fa-angle-right" aria-hidden="true"></i> Create Roles
															</div>
														</a>
													</li>
													<li title="" class="  ">
														<a title="" href="http://localhost/lkppapp/users/permissions">
															<div title=""><i class="fa fa-angle-right" aria-hidden="true"></i> Permissions</div>
														</a>
													</li>
													<li title="" class="  ">
														<a title="" href="http://localhost/lkppapp/users/User_groups">
															<div title=""><i class="fa fa-angle-right" aria-hidden="true"></i> View Roles</div>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</li> -->
                       
                        <li title="mengatur tentang informasi profile pengguna aplikasi" class="  ">
                            <a href="<?= $baseUrl; ?>users/Profile" data-toggle="tooltip" data-placement="right"
                                title="" data-original-title="Profil ">
                                <i class="fas fa-user" aria-hidden="true"></i> <span>Profil </span>
                            </a>
                        </li>

                        
                            
                    </ul>
                </div>
            </div>
        </div>

    </div>
   
</div>