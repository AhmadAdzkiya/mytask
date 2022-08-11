<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>

<?php  
//cek mode edit atau new 
$mode = isset($mode) ? $mode : "new"; 
$stockpile = isset($stockpile) ? $stockpile:null; 

?>

<?php if($this->session->flashdata('message')): ?>
<p><?php echo $this->session->flashdata('message'); ?></p>
<?php endif; ?>



<?php 
    if(count($list_tagihan_siswa)>0){
?>
<!-- <div>
    <h5>Hasil pecarian dengan kata kunci <strong><?php echo $keys; ?></strong> </h5>
</div> -->


<h4><?php echo $this->session->flashdata('message');
unset($_SESSION['message']);
?></h4>




<form id="id_form_input_bayar" action="<?php echo base_url().'dash/transaksi/tagihan/simpanbayartagihan';?>"
    method="POST">

    <div class="row">
        <div class="col-sm-12 col-lg-12">

            <table class="table" id="tablexxx">
                <thead>
                    <tr>
                        <!-- <th scope="col"><input id="id_check_all" type="checkbox"></th> -->
                        <th scope="col">Tagihan</th>
                        <!-- <th scope="col">Nomor Tagihan</th>
                        <th scope="col">Jumlah Tagihan</th>
                        <th scope="col">Telah Bayar Tagihan</th>
                        <th scope="col">Sisa Tagihan</th>
                        <th scope="col">Bayar Tagihan</th> -->
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    foreach ($list_tagihan_siswa as $key => $v) { ?>
                        <!-- <?php  if($v->nominal > $v->bayar){ ?> -->
                        <tr>
                            <td>
                                <div style="background:#fafafa; border-radius:15px; padding:1rem;" >
                                <div>
                                    <div style="text-align:center; font-size:1.2rem" >  
                                    <span   span style="font-weight:500;" ><?php echo $v->nisn ." / ".$v->siswa_nama; ?></span> 
                                    </div>

                                    <div  style="text-align:center" >
                                    <span style="font-style:italic;"><?php echo $v->kelas_nama ." / ".$v->prodi_nama ." / ".$v->jurusan_nama; ?> </span>
                                    </div>
                                    
                                     
                                </div>
                                <hr>

                                <div>
                                    <div> Tagihan  : <span><?php echo $v->id; ?></span> </div>
                                    <div> Deskripsi : <span><?php echo $v->deskripsi; ?></span> </div>
                                    <br>
                                    <div>Jumlah <span style="color:blue; text-align:right; float:right " id="<?php echo 'id_tagihan_nominal'.$v->id; ?>"  ><?php echo number_format($v->nominal,0,",","."); ?></span> </div>

                                    <div>Telah Bayar<span style="color:green; text-align:right; float:right" id="<?php echo 'id_tagihan_bayar'.$v->id; ?>" ><?php echo number_format($v->bayar,0,",","."); ?></span> </div>

                                    <div>Sisa<span style="color:red; text-align:right; float:right; font-size:1.2rem;" id="<?php echo 'id_tagihan_sisa'.$v->id; ?>"><?php echo number_format($v->sisa,0,",","."); ?></span></div>
                                </div>

                                <br>

                                <div>
                                    Input Bayar 
                                </div>

                                <div>
                                    <input type="hidden" id="<?php echo 'id_nominal_bayar_tagihan'.$v->id; ?>"  name="nominal_bayar[]">
                                    <input type="hidden" name="tagihan_id[]" value="<?php echo $v->id; ?>">

                                    <input type="text" 
                                    style="font-weight:600; min-width:200px; border-radius:10px;; text-align:right"
                                    id="<?php echo 'id_input_bayar_tagihan'.$v->id; ?>" 
                                    onchange="isNumeric('<?php echo $v->id; ?>')"  
                                    onkeyup="isNumeric('<?php echo $v->id; ?>')"
                                    placeholder="Masukan nominal bayar"
                                    pattern="[0-9]" style="min-width:150px" 
                                    class="form-control"  >
                                    
                                </div>

                                </div>
                            </td>
                        </tr>
                        <!-- <?php } ?> -->
                    <?php } ?>

                </tbody>

            </table>

        </div>
    </div>


    <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="form-group">
                    <?php $user = $this->ion_auth->user()->row(); ?>
                    <label>Creator</label>
                    <input type="text" style="border:none" value="<?= $user->email?>" name="createdby" id="createdby"
                        readonly>
                    <input type="hidden" value="<?= $user->id?>" name="creatorid" id="creatorid" readonly>
                    <input type="hidden" value="<?= $user->email?>" name="modifiedby" id="modifiedby">
                    <input type="hidden" value="<?= $user->id?>" name="modifierid" id="modifierid">
                </div>
            </div>
        </div>


        
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div style="text-align:center; padding:2rem; align-items:center; width:100%">
                <div class="btn btn-primary md-close" onclick="cekConfirm()"
                    style="align-self:center; margin:auto; padding:1rem;">
                    <span style="font-size:1.2rem"><?php echo $mode == "new" ? "Simpan Bayar": "Perbarui" ?></span>
                </div>
            </div>
        </div>
    </div>

</form>
<script>



function isNumeric(id_tagihan) {

    var form = $("#id_input_bayar_tagihan"+id_tagihan)
    var form_nominal_bayar = $("#id_nominal_bayar_tagihan"+id_tagihan)

    
    var value = $("#id_input_bayar_tagihan"+id_tagihan).val()

    var sisa_tagihan_form = $("#id_tagihan_sisa"+id_tagihan);

    

    if (typeof value == "string"){
        if(isNaN(value) || isNaN(parseFloat(value))){
            // form.val(``)

        }else{


            var sisa_tagihan = parseFloat(sisa_tagihan_form.text().replaceAll('.',''))

            value = parseFloat(value.replaceAll('.',''))

            if(value <= 0){
                form.val(``) 
            }

            if(sisa_tagihan < value){

                console.log(sisa_tagihan)
                console.log(value)
                form.val(``);
                alert("Maaf.. Input Bayar tidak boleh melebihi sisa tagihan, silakan input ulang ya. ")
            }else{                
                var nf = Intl.NumberFormat();
                value = value.toLocaleString("id-ID")
                form.val(value)

            }

            
            
        }
    }

    form_nominal_bayar.val(form.val().replaceAll('.',''));

}


function cekConfirm() {

let c = confirm("Yakin bayar tagihan ini ?")

if(c){ 
    
    $("#id_form_input_bayar").submit()
}else{
    
}

}



$(() => {
    $("#id_check_all").click(function() {
        // $('input:checkbox').not(this).prop('checked', this.checked);
    });

    setTimeout(() => {
        // $("#id_check_all").click();

        // var table = $('#example').DataTable({
        //     retrieve: true,
        // });

        // if ($.fn.dataTable.isDataTable('#table1')) {
        //     table = $('#table1').DataTable();
        // } else {

        //     table = $("#table1").DataTable({
        //         "lengthMenu": [
        //             [10, 25, 50, -1],
        //             [10, 25, 50, "All"]
        //         ]
        //     });
        // }
    }, 250);
})
</script>


<?php } else{ ?>
<div style="background:#fafafa; font-size:1.5rem; padding:1rem; ">Tidak Menemukan siswa</div>
<?php } ?>