<!DOCTYPE html>
<html lang="en">

<head>
  <title>Laporan visit</title>
  <link rel="stylesheet" href="<?php echo base_url().'public/b-asset/css/print.css'?>">

  <script src="<?php echo base_url().'public/b-asset/lib/jspdf/jspdf.js'?>"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>


  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script>


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js">
  </script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>



</head>


<body>

  <button onclick="back()" style="margin-right:1rem" class="button">Back</button>
  <button onclick="saveToImagePdf()" class="button">Save PDF</button>

  <table id="table_view_laporan" class="display" style="width:100%">
    <thead>
      <tr>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>
          <div id="view_laporan" class="view_laporan" style="text-align:left; width:100%; font-family:'Arial'">


            <div style="text-align:center; align-contents:center">
              <img src="https://turangga.web.id/public/b-asset/img/turanggalogo.png"
                style="height:50px; align-self:center;" alt="">
            </div>
            <div style="text-align:center; font-weight:600; font-size:1.5rem ">
              <strong>LAPORAN VISIT</strong> <br>
              
            </div>
            <div style="text-align:center; font-size:0.9rem">
            <small><?php  echo $visitDataUmum->id_visit." - ".$visitDataUmum->visit_created; ?></small>
              <br>
              <small>Oleh  <strong> <?php  echo $visitDataUmum->visitor_first_name. ' '.$visitDataUmum->visitor_last_name; ?> </strong></small>
            </div>

            <br>
            <br>
            <div style="background:#d4d4d4; text-align:center; padding:5px; font-weight:600">
              Informasi Umum
            </div>
            <table class="table table-bordered table-bordered-collapse">
              <tbody>

                <tr>
                  <td style="width:30%">Status Perizinan</td>

                  <td> <input disabled style="margin:5px;" type="checkbox"
                      <?php  echo $visitDataUmum->status_izin_iup == '1'?'checked':null; ?>> IUP

                    <input disabled style="margin:5px" type="checkbox"
                      <?php  echo $visitDataUmum->status_izin_pkp2b_gen_1 == '1'?'checked':null; ?>> PKP2B
                    Generasi 1

                    <input disabled style="margin:5px" type="checkbox"
                      <?php  echo $visitDataUmum->status_izin_pkp2b_gen_2 == '1'?'checked':null; ?>> PKP2B
                    Generasi 2

                    <input disabled style="margin:5px" type="checkbox"
                      <?php  echo $visitDataUmum->status_izin_pkp2b_gen_3 == '1'?'checked':null; ?>> PKP2B
                    Generasi 3
                  </td>
                </tr>

                <tr>
                  <td>Nama Perusahaan</td>
                  <td><?php  echo $visitDataUmum->nama_perusahaan; ?></td>
                </tr>




                <tr>
                  <td rowspan='6'>Nama dan lokasi Tambang</td>
                  <td>Nama: <?php  echo ' '. $visitDataUmum->nama_stockpile; ?></td>

                </tr>
                <tr>
                  <td>Alamat: <?php  echo ' '. $visitDataUmum->alamat; ?></td>

                </tr>
                <tr>
                  <td>Desa: <?php  echo ' '. $visitDataUmum->desa_nama; ?></td>

                </tr>
                <tr>
                  <td>Kecamatan: <?php  echo ' '. $visitDataUmum->kec_nama; ?></td>

                </tr>
                <tr>
                  <td>Kabupaten: <?php  echo ' '. $visitDataUmum->kab_nama; ?></td>

                </tr>
                <tr>
                  <td>Provinsi:<?php  echo ' '. $visitDataUmum->prov_nama; ?></td>

                </tr>



              </tbody>
            </table>

            <div style="background:#d4d4d4; text-align:center; padding:5px; font-weight:600">
              Produksi & Operasional
            </div>
            <table class="table table-bordered table-bordered-collapse">
              <tbody>

                <tr>
                  <td style="width:30%">Jumlah Produksi / Tahun</td>

                  <td><?php  echo $visitDataProduksi !== null ? $visitDataProduksi->jml_produksi:"-"; ?></td>
                </tr>

                <tr>
                  <td>Tahun Produksi</td>

                  <td><?php  echo $visitDataProduksi !== null ? $visitDataProduksi->tahun_produksi:"-"; ?></td>
                </tr>

                <tr>
                  <td>Cadangan Batubara (Ton)</td>

                  <td><?php  echo $visitDataProduksi !== null ? $visitDataProduksi->cadangan_batubara:"-"; ?></td>
                </tr>

                <tr>
                  <td>Tahun Cadangan Batubara</td>

                  <td><?php  echo $visitDataProduksi !== null ? $visitDataProduksi->thn_cadangan_batubara:"-"; ?></td>
                </tr>

                <tr>
                  <td>Jenis Seam</td>

                  <td><?php  echo $visitDataProduksi !== null ? $visitDataProduksi->jenis_seam:"-"; ?></td>
                </tr>

                <tr>
                  <td>Ketebalan Jenis Seam</td>

                  <td><?php  echo $visitDataProduksi !== null ? $visitDataProduksi->ketebalan_jenis_seam:"-"; ?></td>
                </tr>

                <tr>
                  <td>Jarak Hauling Tambang Ke Pelabuhan</td>

                  <td>
                    <?php  echo $visitDataProduksi !== null ? $visitDataProduksi->jarak_hauling_tambang_ke_pelabuhan:"-"; ?>
                  </td>
                </tr>

                <tr>
                  <td>Durasi Tambang Ke Pelabuhan</td>

                  <td><?php  echo $visitDataProduksi !== null ? $visitDataProduksi->durasi_tambang_ke_pelabuhan:"-"; ?>
                  </td>
                </tr>


                <tr>
                  <td>Jarak Pelabuhan Ke Anchorage</td>

                  <td><?php  echo $visitDataProduksi !== null ? $visitDataProduksi->jarak_pelabuhan_ke_anchorage:"-"; ?>
                  </td>
                </tr>


                <tr>
                  <td> Durasi Pelabuhan Ke Anchorage</td>

                  <td>
                    <?php  echo $visitDataProduksi !== null ? $visitDataProduksi->durasi_pelabuhan_ke_anchorage:"-"; ?>
                  </td>
                </tr>


                <tr>
                  <td> Kapasitas Hauling Per Hari</td>

                  <td><?php  echo $visitDataProduksi !== null ? $visitDataProduksi->kapasitas_hauling_per_hari:"-"; ?>
                  </td>
                </tr>

               
                <tr>
                  <td>Jumlah Dump Truck</td>

                  <td><?php  echo $visitDataProduksi !== null ? $visitDataProduksi->jumlah_dump_truck:"-"; ?></td>
                </tr>



              </tbody>
            </table>


            <div style="background:#d4d4d4; text-align:center; padding:5px; font-weight:600">
              Infrastruktur
            </div>
            <table class="table table-bordered table-bordered-collapse">

              <tbody>

                <tr>
                  <td style="width:30%">CPP Kapasitas Raw</td>

                  <td><?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->cpp_kapasitas_raw:"-"; ?>
                    Ton
                  </td>
                </tr>

                <tr>
                  <td>CPP Kapasitas Produk</td>

                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->cpp_kapasitas_produk:"-"; ?>
                  </td>
                </tr>


                <tr>
                  <td>Fasilitas</td>

                  <td>

                  
                  
                    <input disabled style="margin:5px;" type="checkbox" 
                    <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_fasilitas_magnetic_sparator=="1"?  "checked":'' ?>> Magnetic Sparator




                    <input disabled style="margin:5px;" type="checkbox"
                    <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_fasilitas_crusher=="1"?  "checked":'' ?>> Crusher



                    <input disabled style="margin:5px;" type="checkbox" 
                    <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_fasilitas_grizzly=="1"?  "checked":'' ?>> Grizzly


                    <input disabled style="margin:5px;" type="checkbox" 
                    <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_fasilitas_chemical_spray=="1"?  "checked":'' ?>> Chemical Spray



                  </td>
                </tr>


                <tr>
                  <td>Produktivitas Crusher (TPH)</td>

                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->cpp_fasilitas_produksivitas_crusher:"-"; ?>
                  </td>
                </tr>


                <tr>
                  <td>Ukuran Grizzly (mm)</td>

                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->cpp_fasilitas_ukuran_grizzly:"-"; ?>
                  </td>
                </tr>

                <tr>
                  <td>Fasilitas lainnya</td>

                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->cpp_fasilitas_lainnya:"-"; ?>
                  </td>
                </tr>




                <tr>
                  <td>Drainase</td>

                  <td>
                    <div style="display:inline-block; align-items:space-between">

                      <div style="display:inline-block; margin:5px;">Sangat Kurang </div>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_drainase"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_drainase=="1"?  "checked":'' ?>
                        value="1">
                      <span>1</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_drainase"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_drainase=="2"?  "checked":'' ?>
                        value="2">
                      <span>2</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_drainase"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_drainase=="3"?  "checked":'' ?>
                        value="3">
                      <span>3</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_drainase"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_drainase=="4"?  "checked":'' ?>
                        value="4">
                      <span>4</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_drainase"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_drainase=="5"?  "checked":'' ?>
                        value="5">
                      <span>5</span>
                      <div style="display:inline-block; margin:5px;"> Sangat Baik</div>

                    </div>

                  </td>
                </tr>

                <tr>
                  <td>Bebas Genangan Air </td>

                  <td>
                    <div style="display:inline-block; align-items:space-between">

                      <div style="display:inline-block; margin:5px;">Sangat Kurang </div>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bebas_genangan_air"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bebas_genangan_air=="1"?  "checked":'' ?>
                        value="1">
                      <span>1</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bebas_genangan_air"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bebas_genangan_air=="2"?  "checked":'' ?>
                        value="2">
                      <span>2</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bebas_genangan_air"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bebas_genangan_air=="3"?  "checked":'' ?>
                        value="3">
                      <span>3</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bebas_genangan_air"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bebas_genangan_air=="4"?  "checked":'' ?>
                        value="4">
                      <span>4</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bebas_genangan_air"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bebas_genangan_air=="5"?  "checked":'' ?>
                        value="5">
                      <span>5</span>
                      <div style="display:inline-block; margin:5px;"> Sangat Baik</div>

                    </div>

                  </td>
                </tr>




                <tr>
                  <td>Bebas Kontaminen </td>

                  <td>
                    <div style="display:inline-block; align-items:space-between">

                      <div style="display:inline-block; margin:5px;">Sangat Kurang </div>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bebas_kontaminan"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bebas_kontaminan=="1"?  "checked":'' ?>
                        value="1">
                      <span>1</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bebas_kontaminan"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bebas_kontaminan=="2"?  "checked":'' ?>
                        value="2">
                      <span>2</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bebas_kontaminan"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bebas_kontaminan=="3"?  "checked":'' ?>
                        value="3">
                      <span>3</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bebas_kontaminan"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bebas_kontaminan=="4"?  "checked":'' ?>
                        value="4">
                      <span>4</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bebas_kontaminan"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bebas_kontaminan=="5"?  "checked":'' ?>
                        value="5">
                      <span>5</span>
                      <div style="display:inline-block; margin:5px;"> Sangat Baik</div>

                    </div>

                  </td>
                </tr>


                <tr>
                  <td>Bedding </td>

                  <td>
                    <div style="display:inline-block; align-items:space-between">

                      <div style="display:inline-block; margin:5px;">Sangat Kurang </div>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bedding"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bedding=="1"?  "checked":'' ?>
                        value="1">
                      <span>1</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bedding"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bedding=="2"?  "checked":'' ?>
                        value="2">
                      <span>2</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bedding"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bedding=="3"?  "checked":'' ?>
                        value="3">
                      <span>3</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bedding"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bedding=="4"?  "checked":'' ?>
                        value="4">
                      <span>4</span>
                      <input disabled style="margin:5px;" type="radio" name="cpp_stockpile_bedding"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->cpp_stockpile_bedding=="5"?  "checked":'' ?>
                        value="5">
                      <span>5</span>
                      <div style="display:inline-block; margin:5px;"> Sangat Baik</div>

                    </div>

                  </td>
                </tr>


                <tr>
                  <td colspan="2">Port</td>
                </tr>

                <tr>
                  <td>Nama </td>
                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->port_nama:"-"; ?>


                  </td>
                </tr>



                <tr>
                  <td>Status </td>

                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->port_status:"-"; ?>
                  </td>

                </tr>


                <tr>
                  <td>Pengguna </td>

                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->port_pengguna:"-"; ?>
                  </td>

                </tr>


                <tr>
                  <td>Kapasitas </td>

                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->port_kapasitas:"-"; ?>
                  </td>

                </tr>

                <tr>
                  <td>Jetty </td>

                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->port_jetty:"-"; ?>
                  </td>

                </tr>


                <tr>
                  <td>Produktivitas TPH </td>

                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->port_produktivitas_tph:"-"; ?>
                  </td>

                </tr>


                <tr>
                  <td>Shift Kerja </td>

                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->port_shift_kerja:"-"; ?>
                  </td>

                </tr>


                <tr>
                  <td>Waktu </td>

                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->port_waktu:"-"; ?>
                  </td>

                </tr>




                <tr>
                  <td>Fasilitas</td>

                  <td>
                    <input disabled style="margin:5px;" type="checkbox"
                    <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_fasilitas_magnetic_sparator=="1"?  "checked":'' ?>> Magnetic Sparator




                    <input disabled style="margin:5px;" type="checkbox" 
                    <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_fasilitas_crusher=="1"?  "checked":'' ?> > Crusher



                    <input disabled style="margin:5px;" type="checkbox" 
                    <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_fasilitas_grizzly=="1"?  "checked":'' ?> > Grizzly


                    <input disabled style="margin:5px;" type="checkbox" 
                    <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_fasilitas_chemical_spray=="1"?  "checked":'' ?>> Chemical Spray



                  </td>
                </tr>


                <tr>
                  <td>Produktivitas port (Ton) </td>
                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->port_produktivitas:"-"; ?>
                  </td>

                </tr>



                <tr>
                  <td>Ukuran Grizzly (mm) </td>

                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->port_ukuran_grizzly:"-"; ?>
                  </td>

                </tr>



                <tr>
                  <td colspan="2">Kondisi Stockpile port </td>
                </tr>

                <tr>
                  <td>Drainase </td>

                  <td>
                    <div style="display:inline-block; align-items:space-between">

                      <div style="display:inline-block; margin:5px;">Sangat Kurang </div>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_drainase"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_drainase=="1"?  "checked":'' ?>
                        value="1">
                      <span>1</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_drainase"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_drainase=="2"?  "checked":'' ?>
                        value="2">
                      <span>2</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_drainase"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_drainase=="3"?  "checked":'' ?>
                        value="3">
                      <span>3</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_drainase"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_drainase=="4"?  "checked":'' ?>
                        value="4">
                      <span>4</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_drainase"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_drainase=="5"?  "checked":'' ?>
                        value="5">
                      <span>5</span>
                      <div style="display:inline-block; margin:5px;"> Sangat Baik</div>

                    </div>

                  </td>
                </tr>



                <tr>
                  <td>Bebas Genangan Air </td>

                  <td>
                    <div style="display:inline-block; align-items:space-between">

                      <div style="display:inline-block; margin:5px;">Sangat Kurang </div>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bebas_genangan_air"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bebas_genangan_air=="1"?  "checked":'' ?>
                        value="1">
                      <span>1</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bebas_genangan_air"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bebas_genangan_air=="2"?  "checked":'' ?>
                        value="2">
                      <span>2</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bebas_genangan_air"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bebas_genangan_air=="3"?  "checked":'' ?>
                        value="3">
                      <span>3</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bebas_genangan_air"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bebas_genangan_air=="4"?  "checked":'' ?>
                        value="4">
                      <span>4</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bebas_genangan_air"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bebas_genangan_air=="5"?  "checked":'' ?>
                        value="5">
                      <span>5</span>
                      <div style="display:inline-block; margin:5px;"> Sangat Baik</div>

                    </div>

                  </td>
                </tr>


                <tr>
                  <td>Bebas Kontaminen</td>

                  <td>
                    <div style="display:inline-block; align-items:space-between">

                      <div style="display:inline-block; margin:5px;">Sangat Kurang </div>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bebas_kontaminan"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bebas_kontaminan=="1"?  "checked":'' ?>
                        value="1">
                      <span>1</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bebas_kontaminan"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bebas_kontaminan=="2"?  "checked":'' ?>
                        value="2">
                      <span>2</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bebas_kontaminan"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bebas_kontaminan=="3"?  "checked":'' ?>
                        value="3">
                      <span>3</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bebas_kontaminan"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bebas_kontaminan=="4"?  "checked":'' ?>
                        value="4">
                      <span>4</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bebas_kontaminan"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bebas_kontaminan=="5"?  "checked":'' ?>
                        value="5">
                      <span>5</span>
                      <div style="display:inline-block; margin:5px;"> Sangat Baik</div>

                    </div>

                  </td>
                </tr>



                <tr>
                  <td>Bedding</td>

                  <td>
                    <div style="display:inline-block; align-items:space-between">

                      <div style="display:inline-block; margin:5px;">Sangat Kurang </div>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bedding"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bedding=="1"?  "checked":'' ?>
                        value="1">
                      <span>1</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bedding"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bedding=="2"?  "checked":'' ?>
                        value="2">
                      <span>2</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bedding"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bedding=="3"?  "checked":'' ?>
                        value="3">
                      <span>3</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bedding"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bedding=="4"?  "checked":'' ?>
                        value="4">
                      <span>4</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_bedding"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_bedding=="5"?  "checked":'' ?>
                        value="5">
                      <span>5</span>
                      <div style="display:inline-block; margin:5px;"> Sangat Baik</div>

                    </div>

                  </td>
                </tr>



                <tr>
                  <td>Pasang Surut</td>

                  <td>
                    <div style="display:inline-block; align-items:space-between">

                      <div style="display:inline-block; margin:5px;">Kejadian </div>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_pasang_surut_kejadian"
                        <?= $visitDataInfrastruktur !== null && $visitDataInfrastruktur->port_stockpile_pasang_surut_kejadian=="y"?  "checked":'' ?>
                        value="y">
                      <span>Ya</span>
                      <input disabled style="margin:5px;" type="radio" name="port_stockpile_pasang_surut_kejadian"
                        <?= $visitDataInfrastruktur !== null&& $visitDataInfrastruktur->port_stockpile_pasang_surut_kejadian=="t"?  "checked":'' ?>
                        value="t">
                      <span>Tidak</span>

                    </div>

                  </td>

                </tr>


                <tr>
                  <td>Barge Maximum (feet) </td>
                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->port_stockpile_pasang_barge_maximum:"-"; ?>
                  </td>

                </tr>




                <tr>
                  <td>Barge Maximum (feet) </td>
                  <td>
                    <?php  echo $visitDataInfrastruktur !== null ? $visitDataInfrastruktur->port_stockpile_pasang_barge_minimum:"-"; ?>
                  </td>

                </tr>




              </tbody>
            </table>

            <br>
            <div style="background:#d4d4d4; text-align:center; padding:5px; font-weight:600">
              Informasi Tambahan: Geoservices-hasil ROA
            </div>
            <table class="table table-bordered table-bordered-collapse">
              <thead>
                <th>No.</th>
                <th>Lab Sample ID</th>
                <th>Customer Sample Id</th>
                <th>Mass Recieved</th>
                <th>Total Moisture</th>
                <th>Moisture In Analysis Sample</th>
                <th>Ash Content</th>
                <th>Volatile Matter</th>
                <th>Fixed Carbon</th>
                <th>Total Sulphur</th>
                <th>Calorific Value Adb</th>
                <th>Calorific Value Ar</th>
                <th>Calorific Value Daf</th>
                <th>Tanggal Keluar Hasil Tes</th>
                <th>Surveyor</th>
              </thead>

              <tbody>
                <?php

                if($visitDataTambahan)
                $no = 1;
                foreach ($visitDataTambahan as $key => $v) { ?>
                <tr>
                  <td><?php echo $v->lab_sample_id; ?></td>
                  <td><?php echo $v->lab_sample_id; ?></td>
                  <td><?php echo $v->customer_sample_id; ?></td>
                  <td><?php echo $v->mass_recieved; ?></td>
                  <td><?php echo $v->total_moisture; ?></td>
                  <td><?php echo $v->moisture_in_analysis_sample; ?></td>
                  <td><?php echo $v->ash_content; ?></td>
                  <td><?php echo $v->volatile_matter; ?></td>
                  <td><?php echo $v->fixed_carbon; ?></td>
                  <td><?php echo $v->total_sulphur; ?></td>
                  <td><?php echo $v->calorific_value_adb; ?></td>
                  <td><?php echo $v->calorific_value_ar; ?></td>
                  <td><?php echo $v->calorific_value_daf; ?></td>
                  <td><?php echo substr($v->tgl_hasil_tes,0,10); ?></td>
                  <td><?php echo $v->nama_surveyor; ?></td>
                  </tr>
                <?php 
                $no++; }
                ?>
              </tbody>
            </table>

            <br>
            <div style="background:#d4d4d4; text-align:center; padding:5px; font-weight:600">
              Foto visit
            </div>

            
            <?php if($visitDataFoto !== null) {
              
              ?>




            <div class="list-foto-container">

            <?php foreach ($visitDataFoto as $key => $v) { ?>
             <div class="foto-wraper">
               <!-- <img style="height:100px;" src="<?php echo base_url()."uploads/visit/foto/$v->filename"; ?>" alt=""> -->
               <div style="background:url('<?php echo base_url()."uploads/visit/foto/$v->filename"; ?>'); background-repeat:no-repeat;  background-position:center center;  background-size:contain; height:200px " ></div>
               <div class="foto-desc"><?php echo $v->catatan; ?></div> 
             </div>
           <?php  }
            ?>

            </div>
            <?php } ?>

          </div>
        </td>
      </tr>
    </tbody>
  </table>



  <!-- <h3>Preview :</h3> -->
  <div id="previewImg" style="padding:1rem">
  <button onclick="back()" style="margin-right:1rem" class="button">Back</button>
  
    <button onclick="saveToImagePdf()" class="button">Save PDF</button>

    <script>

      function back(){
        history.back()
      }
    function saveToImagePdf() {
      window.scrollTo(0, 0);

      html2canvas(document.getElementById("table_view_laporan"), {
        scrollY: window.scrollY
      }).then(function(canvas) {
        var anchorTag = document.createElement("a");
        document.body.appendChild(anchorTag);
        // document.getElementById("previewImg").appendChild(canvas);
        anchorTag.download = "filename.png";
        anchorTag.href = canvas.toDataURL("image/png");
        anchorTag.target = '_blank';
        // anchorTag.click();


        window.jsPDF = window.jspdf.jsPDF;

        // var img = new Image();
        // img.src = path.resolve(canvas.toDataURL());

        var date = new Date();


        var doc = new jsPDF({
          orientation: 'p',
          unit: 'pt',
          format: [canvas.width + 60, canvas.height + 160], // set surface larger according to desired margins
        }); // optional parameters
        doc.addImage(canvas.toDataURL(), 'PNG', 15, 15, canvas.width, canvas.height);
        doc.save(`Laporan_visit_${date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate()}.pdf`);


      });
    }
    </script>


</body>

</html>