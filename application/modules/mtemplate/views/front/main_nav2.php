<div id="header" class="sticky dark header-md translucent noborder clearfix">
    <!-- <div class="headline-main-header">
					<div class="container align-items-center justify-content-center text-center">
						<a href='#'>
							<span style="color:white;"> 
								<strong>super headline, contoh: pencegahan  virus telah dilakukan Pemkab </strong> 
							</span>
						</a>
					</div>
				</div> -->

    <!-- TOP NAV -->
    <header id="topNav">
        <div class="container-fluid">
            <!-- add .full-container for fullwidth -->
            <nav class="navbar navbar-expand-lg ">

                <b class="screen-overlay"></b>
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <div style="display: flex; flex-direction:row;">
                        <img src="<?= base_url() . 'public/b-asset/img/mulanlogo.png' ?>" class="logo-beranda-img">
                        <div id="title-teks" class="logo-beranda">
                            <span class="title-teks-sub-a"></span>
                            <span class="title-teks-sub-b"></span>
                        </div>
                    </div>
                </a>
                <button data-trigger="#navbar_main" class="btn btn-default d-lg-none navbar-nav ml-auto a-nav navbar-dark"> <i class="fas fa-ellipsis-v"></i> </button>

                <nav id="navbar_main" class="ml-auto mobile-offcanvas navbar navbar-expand-lg navbar-dark ">
                    <div class="offcanvas-header">
                        <button class="btn float-right btn-close a-nav"><i class="fas fa-times"></i> </button>
                        <a class="navbar-brand" href="<?= base_url() ?>">
                            <div style="display: flex; flex-direction:row;">
                                <img src="<?= base_url() . 'public/b-asset/img/mulanlogo.png' ?>" class="logo-beranda-img">
                                <div id="title-teks" class="logo-beranda">
                                    <span class="title-teks-sub-a"></span>
                                    <span class="title-teks-sub-b"></span>
                                </div>
                            </div>
                        </a>

                    </div>


                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item dropdown a-nav">
                            <a class="nav-link dropdown-toggle a-nav " href="#" data-toggle="dropdown">  First level 3  </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"> Second level 1 </a></li>
                            <li><a class="dropdown-item" href="#"> Second level 2 &raquo </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="fdfsdf"> Third level 1</a></li>
                                    <li><a class="dropdown-item" href="sdfsdf"> Third level 2</a></li>
                                    <li><a class="dropdown-item" href="sdfsd"> Third level 3 &raquo </a>
                                    <ul class="submenu dropdown-menu">
                                        <li><a class="dropdown-item" href="sdfsd"> Fourth level 1</a></li>
                                        <li><a class="dropdown-item" href="sdfds"> Fourth level 2</a></li>
                                    </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="sdfs"> Second level  4</a></li>
                                    <li><a class="dropdown-item" href="sdfsdf"> Second level  5</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
                            <li><a class="dropdown-item" href="#"> Dropdown item 4 </a>
                            </ul>
                        </li> -->



                        <?php
                        $dtMenuMain  = list_page(["a.is_private" => '0']);


                        function getCMainMenu($dtMenuMain, $p)
                        {
                            $r = array();
                            foreach ($dtMenuMain as $row) {
                                if ($row->parent_id == $p) {
                                    $row->child = getCMainMenu($dtMenuMain, $row->id);
                                    $r[$row->id] = $row;
                                }
                            }
                            return $r;
                        }

                        $nav = getCMainMenu($dtMenuMain, 0);

                        function mylMainSubMenu($nn)
                        {
                            foreach ($nn as $k => $row) {
                                if (count($row->child) > 0) {
                                    echo '<li> 
                                        <a class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"> 
                                        ' . $row->nama . '
                                        </a>';
                                    echo ' <ul title="' . $row->keterangan . '" 
                                            class="submenu submenu-left dropdown-menu" >';
                                    mylMainSubMenu($row->child);
                                    echo '</ul>';


                                    echo "</li>";
                                } else {
                                    myLMainMenu($row->child);
                                }
                            }
                        }


                        function myLMainMenu($n, $sub = null)
                        {

                            foreach ($n as $k => $row) {
                                $fontweight = count($row->child) > 0 ? 'bold' : $row->parent_id == 0 ? 'bold' : 'normal';
                                $parent = count($row->child) > 0 ? "xparent" : null;
                                $active = (uri_string() == $row->url ? 'xactive' : '');

                                if (count($row->child) > 0) {

                                    if ($row->parent_id != 0) {
                                        if ($sub != null) {
                                            echo '<li> 
                                                <a class="dropdown-item dropdown-toggle" href="#"> 
                                                ' . $row->nama . '
                                                </a>';
                                            echo ' <ul title="' . $row->keterangan . '" 
                                                    class="submenu submenu-left dropdown-menu" >';
                                            myLMainMenu($row->child, "submenu");
                                            echo '</ul>';


                                            echo "</li>";
                                        } else {
                                            echo '<li> 
                                                <a class="dropdown-item dropdown-toggle" href="#"> 
                                                ' . $row->nama . '
                                                </a>';
                                            echo ' <ul title="' . $row->keterangan . '" 
                                                    class="submenu submenu-left dropdown-menu" >';
                                            myLMainMenu($row->child, "submenu");
                                            echo '</ul>';


                                            echo "</li>";
                                        }
                                    } else {
                                        echo '<li class="nav-item dropdown"> 
                                            <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown"> 
                                            ' . $row->nama . '
                                            </a>';
                                        echo ' <ul title="' . $row->keterangan . '" 
                                                class="dropdown-menu dropdown-menu-right" >';
                                        myLMainMenu($row->child);
                                        echo '</ul>';


                                        echo "</li>";
                                    }
                                } else {
                                    if (count($row->child) == 0 && $row->parent_id == 0) {
                                        if ($row->is_statis == 1) {
                                            $base = base_url() . $row->url . "/" . $row->slug;
                                        } else {
                                            $base = base_url() . $row->url;
                                        }
                                        echo '<li  class=" nav-item  "> 
                                            <a title="' . $row->keterangan . '"  
                                            href="' . $base . '"
                                            onclick="loc(\'' . $base . '\')"
                                             class="nav-link">
                                             ' . $row->nama . '
                                             </a> </li>';
                                    } else {
                                        if ($row->is_statis == 1) {
                                            $base = base_url() . $row->url . "/" . $row->slug;
                                        } else {
                                            $base = base_url() . $row->url;
                                        }


                                        echo '<li class=" nav-item  ">
                                            <a class="dropdown-item" title="' . $row->keterangan . '" 
                                            href="' . $base . '"
                                            onclick="loc(\'' . $base . '\')"
                                            class="nav-link">
											' . $row->nama . ' 
											</a>';
                                        echo "</li>";
                                    }
                                }
                            };
                        }

                        myLMainMenu($nav);


                        ?>




                    </ul>
                </nav>
            </nav>


        </div>
    </header>

</div>
<script>
    function loc(url) {
        window.location.href = url;
    }
</script>