<?php  $tem = 'bwi';  ?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title><?php echo isset($page_title)? $page_title : '';?></title>
    <meta name="keywords" content="<?php echo isset($keywords)? $keywords : '';?>" />
    <meta name="description" content="<?php echo isset($description)? $description : '';?>" />
    <meta name="Author" content="" />

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- WEB FONTS : use %7C instead of | (pipe) -->
    <link rel="shortcut icon" href="<?= bs() ?>public/b-asset/img/dprd_logo.png">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700"
        rel="stylesheet" type="text/css" />

  
    <!-- CORE CSS -->
    <!-- <link href="<?php echo base_url()?>templates/<?php echo $tem; ?>/assets/plugins/bootstrap/css/bootstrap.min.css"
        rel="stylesheet" type="text/css" /> -->

        <link rel="stylesheet" href="<?= bs() ?>public/b-asset/lib/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="<?= bs() ?>public/b-asset/css/dprddev.css" type="text/css" />
        <link rel="stylesheet" href="<?= bs() ?>public/b-asset/css/timeline.css" type="text/css" />

    <!-- THEME CSS -->
    <!-- <link href="<?php echo base_url()?>templates/<?php echo $tem; ?>/assets/css/essentials.css" rel="stylesheet"
        type="text/css" /> -->
    <link href="<?php echo base_url()?>templates/<?php echo $tem; ?>/assets/css/layout.css" rel="stylesheet"
        type="text/css" />

    <!-- PAGE LEVEL SCRIPTS -->
    <link href="<?php echo base_url()?>templates/<?php echo $tem; ?>/assets/css/header-1.css" rel="stylesheet"
        type="text/css" />
    <!-- <link href="<?php echo base_url()?>templates/<?php echo $tem; ?>/assets/css/color_scheme/green.css" rel="stylesheet"
        type="text/css" id="color_scheme" /> -->
    <link href="<?php echo base_url()?>templates/<?php echo $tem; ?>/assets/css/style.css" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url()?>templates/<?php echo $tem; ?>/assets/css/animate.css" rel="stylesheet"
        type="text/css" />

    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url()?>templates/<?php echo $tem; ?>/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url()?>templates/<?php echo $tem; ?>/assets/css/font-awesome.css">


    <link href="<?= base_url('templates/bwi/owl/owlcarousel/assets/owl.carousel.min.css');?>" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url('templates/bwi/owl/owlcarousel/assets/owl.theme.default.min.css');?>" rel="stylesheet"
        type="text/css" /> 

        <!-- ogchart -->
        <link href="<?= base_url('public/b-asset/lib/orgchart/css/orgchart.min.css');?>" rel="stylesheet"
    type="text/css" /> 


    <link href=" <?= bs() ?>public/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    

    <script src="https://kit.fontawesome.com/e339540122.js" crossorigin="anonymous"></script>

    <script src="<?php echo base_url()?>templates/<?php echo $tem; ?>/assets/js/apexcharts.js"></script>



    <script type="text/javascript"
        src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/plugins/jquery/jquery-2.2.3.min.js"></script>
    <!--MAPS HU-->
    <!-- <link rel="stylesheet"
        href="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/plugins/leaflet/leaflet.css" />
    <script type="text/javascript"
        src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/plugins/leaflet/leaflet-src.js"></script>
    <script src='<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/plugins/leaflet/Leaflet.GoogleMutant.js'>
    </script> -->
    <script>
    var site = '<?php echo site_url()?>';
    </script>
<!-- tamabhan bootstrap -->
    <style>


        @media (min-width: 992px){
            .dropdown-menu .dropdown-toggle:after{
                border-top: .3em solid transparent;
                border-right: 0;
                border-bottom: .3em solid transparent;
                border-left: .3em solid;
            }
            .dropdown-menu .dropdown-menu{
                margin-left:0; margin-right: 0;
            }
            .dropdown-menu li{
                position: relative;
            }
            .nav-item .submenu{ 
                display: none;
                position: absolute;
                left:100%; top:-7px;
            }
            .nav-item .submenu-left{ 
                right:100%; left:auto;
            }
            .dropdown-menu > li:hover{ background-color: #f1f1f1 }
            .dropdown-menu > li:hover > .submenu{
                display: block;
            }
        }

        .navbar-expand-lg{
            background:inherit;
        }
    </style>

<style>
.offcanvas-header{ display:none; }
.screen-overlay {
  height: 100%;
  z-index: 30;
  position: fixed;
  top: 0;
  left: 0;
  opacity:0;
  visibility:hidden;
  background-color: rgba(34, 34, 34, 0.6);
  transition:opacity .2s linear, visibility .1s, width 1s ease-in;
}
.screen-overlay.show {
  transition:opacity .5s ease, width 0s;
  opacity:1;
  width:100%;
  visibility:visible;
}
    
.offcanvas-header-berita{ display:none; }
.screen-overlay-berita {
  height: 100%;
  z-index: 31;
  position: fixed;
  top: 0;
  left: 0;
  opacity:0;
  visibility:hidden;
  background-color: rgba(34, 34, 34, 1);
  transition:opacity .2s linear, visibility .1s, width 1s ease-in;
}
.screen-overlay-berita.show {
  transition:opacity .5s ease, width 0s;
  opacity:1;
  width:100%;
  visibility:visible;
}
    


@media all and (max-width:992px) { 

 .offcanvas-header{ display:block; }
 
 .mobile-offcanvas{
    visibility: hidden;
    transform:translateX(-100%);
    border-radius:0; 
    display:block;
    position: fixed;
    top: 0; left:0;
    height: 100%;
    z-index: 1200;
    width:90%;
    overflow-y: scroll;
    overflow-x: hidden;
    transition: visibility .2s ease-in-out, transform .2s ease-in-out;
    
  }

  .mobile-offcanvas.show{
    visibility: visible;
    transform: translateX(0);
    background:black;
    opacity:0.9;
  }

  .offcanvas-header-berita{ display:block; }
  .mobile-offcanvas-berita{
    visibility: hidden;
    transform:translateX(-100%);
    border-radius:0; 
    display:block;
    position: fixed;
    top: 0; left:0;
    height: 100%;
    z-index: 9999;
    width:90%;
    overflow-y: scroll;
    overflow-x: hidden;
    transition: visibility .2s ease-in-out, transform .2s ease-in-out;
    
  }

  .mobile-offcanvas-berita.show{
    visibility: visible;
    transform: translateX(0);
    background:black;
    opacity:1;
    margin-top:5rem;
    overflow:auto
  }

}
</style>

<style>
@media (min-width: 992px){
	.dropdown-menu .dropdown-toggle:after{
		border-top: .3em solid transparent;
	    border-right: 0;
	    border-bottom: .3em solid transparent;
	    border-left: .3em solid;
	}
	.dropdown-menu .dropdown-menu{
		margin-left:0; margin-right: 0;
	}
	.dropdown-menu li{
		position: relative;
	}
	.nav-item .submenu{ 
		display: none;
		position: absolute;
		left:100%; top:-7px;
	}
	.nav-item .submenu-left{ 
		right:100%; left:auto;
	}
	.dropdown-menu > li:hover{ background-color: #f1f1f1 }
	.dropdown-menu > li:hover > .submenu{
		display: block;
	}
}	

</style>



    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NHTLPMF1NG"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-NHTLPMF1NG');
    </script>

</head>

<body class="smoothscroll bg-abu">

    <!-- wrapper -->
    <div id="wrapper">
        <?= $this->load->view("bwidevtemplate/front/main_nav2"); ?>


        <?php isset($top1)? $this->load->view($top1) : $this->load->view('bwidevtemplate/front/top_bwi') ;?>
        <?php isset($top2)? $this->load->view($top2) : '';?>
        <?php isset($page)? $this->load->view($page) : '';?>
        <?php isset($bottom1)? $this->load->view($bottom1) : '';?>
        <?php isset($bottom2)? $this->load->view($bottom2) : '';?>
        <?php isset($bottom3)? $this->load->view($bottom3) : '';?>
        <?php isset($footer)? $this->load->view($footer) : '';?>




    </div>
    <!-- /wrapper -->


    <!-- SCROLL TO TOP -->
    <a href="#" id="toTop"></a>




    <!-- JAVASCRIPT FILES -->
    <script type="text/javascript">
    var plugin_path = '<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/plugins/';
    </script>


    <script type="text/javascript" src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/js/scripts.js">
    </script>
    <script src="<?php echo base_url()?>templates/bwi/app.js"></script>
    <script src="<?php echo base_url()?>templates/bwi/jquery.bootpag.min.js"></script>
    <script type="text/javascript"
        src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
        src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/owl/owl.carousel.js">
    </script>
    <script src="<?= bs() ?>public/b-asset/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    
    <!-- ogchart -->
    <script src="<?= bs() ?>public/b-asset/lib/orgchart/js/orgchart.min.js" type="text/javascript"></script>
    
    
    <!-- <script type="text/javascript" src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/owl/vendors/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/owl/jquery3.5.1.min.js"></script> -->

    <!-- <script type="text/javascript" src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/owl/owlcarousel/owl.carousel.min.js"></script> -->
    <!-- <script type="text/javascript"
        src="<?php echo base_url()?>templates/<?php  echo $tem; ?>/assets/plugins/bootstrap/js/bootstrap.min.js">
    </script> -->


    <!-- 
		<script type="text/javascript">
			$(()=>{



				$(".search-input-form").css({
					marginLeft: 0,
					width: 141
				});

				$(".search-input-form").mouseenter(function() {
					if(screen.width >360)
					$(this).stop().animate({
					width: "300"
					}, 100);
				});

				$(".search-input-form").mouseleave(function() {
					if(screen.width >360)
					$(this).animate({
					marginLeft: 0,
					width: "141"
					}, 100);
				});

				$(".search-input-form").focus(function() {
					if(screen.width >360)
					$(this).stop().animate({
					width: "300"
					}, 100);
				});

				$(".search-input-form").focusout(function() {
					if(screen.width >360)
					$(this).animate({
					marginLeft: 0,
					width: "141"
					}, 100);
				});


			});
		</script> -->

            <!-- Menu boostrap 4 -->
            <script>
                $(document).on('click', '.dropdown-menu', function (e) {
                    e.stopPropagation();
                    });

                    // make it as accordion for smaller screens
                    if ($(window).width() < 992) {
                    $('.dropdown-menu a').click(function(e){
                        e.preventDefault();
                        if($(this).next('.submenu').length){
                            $(this).next('.submenu').toggle();
                        }
                        $('.dropdown').on('hide.bs.dropdown', function () {
                        $(this).find('.submenu').hide();
                    })
                    });
                
                    //mobile out of canvas
                    $("[data-trigger]").on("click", function(e){
                        e.preventDefault();
                        e.stopPropagation();
                        var offcanvas_id =  $(this).attr('data-trigger');
                        $(offcanvas_id).toggleClass("show");
                        $('body').toggleClass("offcanvas-active");
                        $(".screen-overlay").toggleClass("show");
                    }); 

                    $(".btn-close, .screen-overlay").click(function(e){
                        $(".screen-overlay").removeClass("show");
                        $(".mobile-offcanvas").removeClass("show");
                        $("body").removeClass("offcanvas-active");
                    }); 

                    //mobile out of canvasberita
                    $("[data-trigger-berita]").on("click", function(e){
                        e.preventDefault();
                        e.stopPropagation();
                        var offcanvas_id =  $(this).attr('data-trigger-berita');
                        $(offcanvas_id).toggleClass("show");
                        $('body').toggleClass("offcanvas-active");
                        $(".screen-overlay-berita").toggleClass("show");
                    }); 

                    $(".close-berita, .screen-overlay-berita").click(function(e){
                        $(".screen-overlay-berita").removeClass("show");
                        $(".mobile-offcanvas-berita").removeClass("show");
                        $("body").removeClass("offcanvas-active");
                    }); 


                    }
            </script>

        

</body>

</html>