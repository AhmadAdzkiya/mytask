<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>


  <!-- <script src="<?php echo base_url().'public/b-asset/lib/jspdf/jspdf.js'?>"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script> -->
  <script src = "https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

<div><h5>Hasil pecarian dengan kata kunci <strong><?php echo $keys; ?></strong> </h5></div>

  <button onclick="saveToImagePdf()" class="button">Save PDF</button>

  <div id="table_preview" style="padding:1rem; ">
    <div style="text-align:center; width:100%; font-weight:600">
        <h3>Daftar Total Tagihan Per Siswa</h3>

    </div>
    
    <table class="table table-striped" id="tablexx1">
        <thead>
            <tr>
                <th scope="col">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin </th>
                <th scope="col">Kelas</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Prodi</th>
                <th scope="col">Total Tagihan</th>
                <th scope="col">Bayar Tagihan</th>
                <th scope="col">Sisa Tagihan</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                foreach ($siswa as $key => $v) { ?>
            <tr>
                
                <td>
                    <strong>
                        <a href="<?php echo base_url().'dash/transaksi/tagihan/bayar/'.$v->nisn; ?>" ><?php echo $v->nisn; ?></a>
                    </strong>
                </td>

                <td>
                    <div>
                        <span><?php echo $v->siswa_nama; ?></span>
                    </div>
                </td>

                <td>
                    <div>
                        <span><?php echo $v->siswa_jenis_kelamin; ?></span>
                    </div>
                </td>


                <td>
                    <div>
                        <span><?php echo $v->kelas_nama; ?></span>
                    </div>
                </td>

                <td>
                    <div>
                        <span><?php echo $v->jurusan_nama; ?></span>
                    </div>
                </td>

                <td>
                    <div>
                        <span><?php echo $v->prodi_nama; ?></span>
                    </div>
                </td>

                <td>
                    <div style="text-align:right">
                        <span style="color:blue; " ><?php echo number_format($v->jml_tagihan,0,",","."); ?></span>
                    </div>
                </td>

                <td>
                    <div style="text-align:right">
                        <span style="color:green; text-align:right"><?php echo number_format($v->bayar_tagihan,0,",","."); ?></span>
                    </div>
                </td>

                <td>
                    <div style="text-align:right">
                        <span style="color:red; text-align:right"><?php echo number_format($v->sisa_tagihan,0,",","."); ?></span>
                    </div>
                </td>
            </tr>



            <?php } ?>

        </tbody>

    </table>
</div>


    <button onclick="saveToImagePdf()" class="button">Save PDF</button>

<script>
    $(()=>{
        $("#id_check_all").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        setTimeout(() => {
            $("#id_check_all").click();

            
            if ( $.fn.dataTable.isDataTable( '#table1' ) ) {
                var table = $('#table1').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'pdf'
                    ]
                });
            }
            else {

                var table = $("#table1").DataTable({
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    dom: 'Bfrtip',
                    buttons: [
                        'pdf'
                    ]
                });
            }
        }, 250);
    })
    
</script>

<script>

function back(){
  history.back()
}

function setDPI(canvas, dpi) { 
     console.log('0',canvas.toDataURL()); // **I's normal.** 
     var scaleFactor = dpi / 96; 
     canvas.width = Math.ceil(canvas.width * scaleFactor); 
     canvas.height = Math.ceil(canvas.height * scaleFactor); 
     console.log('1',canvas.toDataURL()); // **Canvas becomes blank** ？？？？ 
     var ctx = canvas.getContext('2d'); 
     ctx.scale(scaleFactor, scaleFactor); 
}




function saveToImagePdf() {


   

    window.scrollTo(0, 0);

    html2canvas(document.getElementById("table_preview"), {
    scrollY: window.scrollY
    }).then(function(canvas) {
    var anchorTag = document.createElement("a");
    document.body.appendChild(anchorTag);
    // document.getElementById("previewImg").appendChild(canvas);
    anchorTag.download = "filename.png";
    anchorTag.href = canvas.toDataURL("image/png");
    anchorTag.target = '_blank';
    // anchorTag.click();


    
    // var jsPDF = window.jspdf.jsPDF;

    // var img = new Image();
    // img.src = path.resolve(canvas.toDataURL());

    var date = new Date();

    // setDPI(canvas, 100)                     // <----- canvas1  ?
     var ctx = canvas.getContext('2d'); 
     ctx.scale(2,2); 
     const contentWidth = canvas.width; 
     const contentHeight = canvas.height; 
      const pageData = canvas.toDataURL(); 
    const rotate = ['l', 'p'][(contentWidth < contentHeight) + 0];

    var doc = new jsPDF(rotate,'mm', [contentWidth, contentHeight]); // optional parameters
    doc.addImage(pageData, 'PNG', 15, 15,contentWidth, contentHeight);
    doc.save(`Laporan_Tagihan_${date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate()}.pdf`);


    });
}
</script>




