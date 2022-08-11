<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>

<div><h5>Hasil pecarian dengan kata kunci <strong><?php echo $keys; ?></strong> </h5></div>

<table class="table table-striped" id="table1">
    <thead>
        <tr>
            <th scope="col"><input id="id_check_all" type="checkbox"></th>
            <th scope="col">NISN</th>
            <th scope="col">Nama</th>
            <th scope="col">Kelas</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Prodi</th>
        </tr>
    </thead>
    <tbody>

        <?php 
            foreach ($siswa as $key => $v) { ?>
        <tr>
            <td>
                <div>
                    <input style="inline" type="checkbox" name="siswa[]" value="<?php echo $v->nisn; ?>" >
                </div>
            </td>
            <td>
                <div>
                    <span><?php echo $v->nisn; ?></span>
                </div>
            </td>

            <td>
                <div>
                    <span><?php echo $v->nama; ?></span>
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
        </tr>



        <?php } ?>

    </tbody>

</table>

<script>
    $(()=>{
        $("#id_check_all").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        setTimeout(() => {
            $("#id_check_all").click();

            if ( $.fn.dataTable.isDataTable( '#table1' ) ) {
                table = $('#table1').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'pdf'
                    ]
                });
            }
            else {

                table = $("#table1").DataTable({
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    {
                        dom: 'Bfrtip',
                        buttons: [
                            'pdf'
                        ]
                    }
                });
            }


            
        }, 250);
    })
    
</script>