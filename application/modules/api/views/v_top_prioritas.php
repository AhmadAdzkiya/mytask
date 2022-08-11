<?php 
  $wall = "";
    if(isset($page_wallpaper)){
      
      if($page_wallpaper !== ""){
        $wall =  $page_wallpaper;
      }else{
        $wall = base_url()."public/b-asset/img/dprd_wallpaper.jpg";
      }
    }else{
      $wall = base_url()."public/b-asset/img/dprd_wallpaper.jpg";
    }
        ?>

<div class="top-bwi-default img" 
style="display:flex; background-attachment: fixed; min-height:50vh;background-image: url('<?= $wall ?>');">
  <div class="overlay-sub-page"></div>  
</div>
