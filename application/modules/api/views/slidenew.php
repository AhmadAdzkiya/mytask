<style>
#owl-demo .item {
  display: block;
  margin-top:100px;
  /* width: 100%;
  height: auto; */
}
.owl-back{
  /* background: #5b8; */
  height: 550px;
  /* background-color: rgba(140, 92, 226,0.8); */
  background: rgb(236,69,250);
  background: linear-gradient(94deg, rgb(230, 216, 91) 3%, rgb(230, 216,81) 29%, rgb(230, 216,70) 83%);
}
.over-bold {
  font-weight: bold;
}
#owl-demo h2 {
  font-weight: bold !important;
}
#owl-demo h3 {
  font-weight: bold !important;
}
#owl-demo h4 {
  font-weight: bold !important;
}
.owl-carousel .owl-item img {
  display: inline-block;
  width: 100%;
}

.font-small{
  font-size:12px;
}

.owl-controls
{
  display: none !important;
}

@media (min-width: 320px) and (max-width: 480px) {
  #owl-demo {
    display: none;
  }
}

.container-wide{
  margin-left: 20px;
  margin-right: 10px;
}

.owl-carousel .nav-btn{
  height: 47px;
  position: absolute;
  width: 26px;
  cursor: pointer;
  top: 100px !important;
}

.owl-carousel .owl-prev.disabled,
.owl-carousel .owl-next.disabled{
pointer-events: none;
opacity: 0.2;
}

.owl-carousel .prev-slide{
  background: url(nav-icon.png) no-repeat scroll 0 0;
  left: -33px;
}
.owl-carousel .next-slide{
  background: url(nav-icon.png) no-repeat scroll -24px 0px;
  right: -33px;
}
.owl-carousel .prev-slide:hover{
 background-position: 0px -53px;
}
.owl-carousel .next-slide:hover{
background-position: -24px -53px;
}
.btns{
  display: table;
  margin: 30px auto;
  z-index: 9999;
  margin-top: -100px;
position: relative;
}
.customNextBtn, .customPreviousBtn{
      float: right;
    background: #2d9070;
    color: #fff;
    padding: 10px;
    margin-left: 5px;
    cursor: pointer;
}
</style>
<div id="owl-demo" class="owl-carousel owl-theme owl-back">
  
  <div class="item">
    <img class="img-responsive" src="https://www.beritatkp.com/wp-content/uploads/2017/08/zIMG_20170721_135150.jpg" alt="" style="width:80%;height:400px"/>
  </div>

  <div class="item">
    <img class="img-responsive" src="https://radarbangsa.co.id/wp-content/uploads/2019/09/IMG_20092019_105414_700_x_400_piksel.jpg" alt="" style="width:80%;height:400px"/>
  </div>

</div>
<!-- <div class="btns">
  <div class="customNextBtn">Slide Selanjutnya <i class="fa fa-arrow-right"></i></div>
  <div class="customPreviousBtn"><i class="fa fa-arrow-left"></i> Slide Sebelumnya</div>
</div> -->

<script type="text/javascript">
$(document).ready(function() {

var owl = $('#owl-demo');

$("#owl-demo").owlCarousel({
      items: 1,
      loop: true,
      margin: 10,
      autoplay:true,
      autoplayTimeout:20000,
      // animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      itemsMobile : false,
    // "singleItem:true" is a shortcut for:
    // items : 1,
    // itemsDesktop : false,
    // itemsDesktopSmall : false,
    // itemsTablet: false,
    // itemsMobile : false
});
});
</script>
