<div class="hero-wrap img" style="background-attachment: fixed; background-image: url('<?= bs() ?>public/b-asset/img/ijen-dev.jpg');">

  <div style="width:100%; diplay:tabel; align-items:center; text-align:center">
    <img src="<?= bs() ?>public/b-asset/img/partly-cloudy-day-64-dev.png" class="icon-weather">
  </div>

  <div class="overlay"></div>
  <div class="container" style="z-index:999; border-radius:3rem 3rem;position:relative; margin-top:30vh; background: rgba(43, 44, 44, 0.773)">
    <br>
    <div style="color:#ffffff; background:transparent;" class="">

      <?= isset($content) ? $this->load->view($content) : $this->load->view("v_resume"); ?>
      <br>

      <br>

    </div>
  </div>
</div>

<script>
  // let  elLainnya = $("#lainnya");
  // elLainnya.click(()=>{alert("lainnya")});
</script>