<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>
<div class="row">
    <div class="col-sm-12" style='overflow:auto'>

        <?php  if(count($list_akd)>0){ ?>
            <table style='width:100%; background:#fafafa; border-radius:1rem; padding:1rem' style="padding:0.5rem" id="tbbxx">
            <thead>
                <tr>
                    
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

            $level = [];
                            
            foreach ($list_akd as $k => $value) {
                if(isset($list_akd[$k-1])){
                    if($list_akd[$k-1]->jabatan_level != $value->jabatan_level ){
                        $level[] = $value->jabatan_level;
                    }
                    
                }else{
                    $level[] = $value->jabatan_level;
                }
            }

            $d=null;
            foreach ($level as $ve) {
                foreach ($list_akd as $k1=> $v1) {
                    if($ve == $v1->jabatan_level){
                        $d[$ve][] = $v1;
                    }
                }
            }


            $el="";
            foreach($d as $k=>$v){
                if($k=='1'){
                    
                    
                    $el.=" <tr>
                    <td><div style='width:100%;  background:#F9F9F6; padding:1rem; align-items:center; align-content:center; text-align:center;'>";
                    foreach($v as $kk => $vv){
                        $foto = strlen($vv->fotoUrl)>5?$vv->fotoUrl: base_url().'public/b-asset/img/avatar_dprd_dewan.jpg';

                        $el.="<img src='$foto' style='width:200px; height:250px; text-align:center; margin:auto;'/> 
                        <br><div style='text-align:center'><strong>$vv->biodata_nama</strong></div>
                        <div style='text-align:center'>$vv->jabatan_nama</div> ";
                    } 
                    $el.="</div></td></tr>  ";
                    echo $el;
                    $el="";
                }
                
                
                else{
                    if($k=='2'){

                    $el.="<tr>
                    <td><div style='width:100%; background:#F7F7F6; display:flex;  justify-content:space-around; padding:1rem; '>";
                        foreach($v as $kk => $vv){
                            $foto = strlen($vv->fotoUrl)>5?$vv->fotoUrl:base_url().'public/b-asset/img/avatar_dprd_dewan.jpg';

                            $el.="<div style='background:transparent; text-align:center; margin:auto'; padding:0.5rem; >
                            <img src='$foto' style='width:180px; height:230px; text-align:center; margin:auto'>
                            <br><div style='text-align:center'><strong>$vv->biodata_nama</strong></div>
                            <div style='text-align:center'>$vv->jabatan_nama</div>
                            </div>";
                        } 
                        $el.="</div> </td></tr> ";
                    }

                    else if($k=='3'){

                        $el.="<tr>
                        <td><div style='width:100%; display: flex; background:#F3F3F1; padding:1rem; '>";
                            foreach($v as $kk => $vv){
                                $foto = strlen($vv->fotoUrl)>5?$vv->fotoUrl:base_url().'public/b-asset/img/avatar_dprd_dewan.jpg';
    
                                $el.="<div style='background:transparent; margin:1rem; text-align:center; margin:auto'>
                                <img src='$foto' style='width:180px; height:230px; text-align:center; margin:auto'>
                                <br><div style='text-align:center'><strong>$vv->biodata_nama</strong></div>
                                <div style='text-align:center'>$vv->jabatan_nama</div>
                                </div>";
                            } 
                            $el.="</div> </td></tr> ";
                        }

                    else{
                        $el.="<tr>
                        <td><div style='width:100%; background:#EFEFED; padding:1rem; '>";
                        foreach($v as $kk => $vv){
                            $foto = strlen($vv->fotoUrl)>5?$vv->fotoUrl:base_url().'public/b-asset/img/avatar_dprd_dewan.jpg';
                            $el.="<div style='display:inline-block; width:180px; height:230px; background:yellow; margin: 1rem 1rem 1rem 1rem;  '>
                            <img src='$foto' style='width:100%; height:100%; text-align:center; margin:auto'>
                            <br><div style='text-align:center'><strong>$vv->biodata_nama</strong></div>
                            <div style='text-align:center'>$vv->jabatan_nama</div>
                            </div> ";
                        } 
                        $el.="</div> </td></tr>";
                    }
                    echo $el;
                    $el="";
                }

                
            }

            // echo $el;


            //     foreach ($list_akd as $k=> $v) {
            //         echo "
            //         <tr>
            //             <td>
            //             <div style='display:flex; padding:0.5rem;'>
            //             <img src='$v->fotoUrl' style='width:70px; height:80px'>
            //             <div style='padding-left:1rem;'>
            //             <span><strong>$v->biodata_nama</strong></span><br><span>$v->jabatan_nama</span>
            //             </div>
                        
            //             </div>
                        
            //             <hr>
            //             </td>
                        
            //         </tr>
            //         ";
            //     }
                ?>
            </tbody>
        </table>

        <hr>

        <?php 

                // $level = [];
                
                // foreach ($list_akd as $k => $value) {
                //     if(isset($list_akd[$k-1])){
                //         if($list_akd[$k-1]->jabatan_level != $value->jabatan_level ){
                //             $level[] = $value->jabatan_level;
                //         }
                        
                //     }else{
                //         $level[] = $value->jabatan_level;
                //     }
                // }

                // $d=null;
                // foreach ($level as $ve) {
                //     foreach ($list_akd as $k1=> $v1) {
                //         if($ve == $v1->jabatan_level){
                //             $d[$ve][] = $v1;
                //         }
                //     }
                // }


                // $el="";
                // foreach($d as $k=>$v){
                //     if($k=='1'){
                        
                        
                //         $el.="<div style='width:100%; background:gray; align-items:center; align-content:center; text-align:center;'>";
                //         foreach($v as $kk => $vv){

                //             $el.="<img src='$vv->fotoUrl' style='width:200px; height:250px; text-align:center; margin:auto;'/>";
                //         } 
                //         $el.="</div> <br> ";
                //     }
                    
                    
                //     else{
                //         if($k=='2'){

                //         $el.="<div style='width:100%; background:gray; display: flex;'>";
                //             foreach($v as $kk => $vv){
    
                //                 $el.="<img src='$vv->fotoUrl' style='width:180px; height:230px; text-align:center; margin:auto'>";
                //             } 
                //             $el.="</div> <br> ";
                //         }
                //         else{
                //             $el.="<div style='width:100%; background:gray;'>";
                //             foreach($v as $kk => $vv){
    
                //                 $el.="<div style='display:inline-block;
                //                 width:180px; height:230px;
                //                 padding: 1rem;  '><img src='$vv->fotoUrl' style='width:100%; height:100%; text-align:center; margin:auto'></div>";
                //             } 
                //             $el.="</div> <br> ";
                //         }
                //     }

                    
                // }

                // echo $el;
                

                // foreach ($list_akd as $k=> $v) {
                //     if(isset($list_akd[$k-1])){
                       
                //         if($list_akd[$k-1]->jabatan_level < $v->jabatan_level || $list_akd[$k-1]->jabatan_level == $v->jabatan_level){
                //             $el.="<div style='width:100%; background:blue;'>";
                            
                //         }else{
                //             $el.="</div><br>";
                //         }
                //         $el.=" <img src='$v->fotoUrl' style='width:70px; height:80px; text-align:center; margin-left:33%; margin-rught:33%;'>";
                //     }else{
                //         $el.="<div style='width:100%; background:gray; align-items:center; align-content:center; text-align:center;'>
                //         <img src='$v->fotoUrl' style='width:170px; height:200px; text-align:center; margin:auto;'>
                        
                //         </div> ";
                //     }

                    
                // }
               
                
            } else{ ?>
            <div style="background:#ffffff; font-size:1rem; padding:1rem">Tidak ada data AKD </div>
        <?php } ?>
        
    </div>
</div>

<script>

var table = $('#tbbxx').DataTable({
        paging: false,
        bFilter: false,
        ordering: false,
        searching: true,
        dom: 't'         // This shows just the table
    })

    $('#cari_anggota_id').on( 'keyup', function () {
        table.search( this.value ).draw();
    } );


</script>