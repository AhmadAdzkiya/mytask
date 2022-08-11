<div class="hero-wrap img" style="background-attachment: fixed; background-image: url('<?= bs() ?>public/b-asset/img/ijen-dev.jpg');">
  <div class="overlay"></div>
  <div class="container" style="z-index:999; border-radius:3rem 3rem;position:relative; min-height:80vh; margin-top:10vh; padding-bottom:20vh; background: rgba(43, 44, 44, 0.773)">
    <br>
    <div style="color:#ffffff; background:transparent;" class="">

      <?= isset($content) ? $this->load->view($content) : $this->load->view("v_resume"); ?>


    </div>
  </div>
</div>

<script>
  // let  elLainnya = $("#lainnya");
  // elLainnya.click(()=>{alert("lainnya")});
</script>