<div class="container">
    <div style="font-weight:bolder; font-size:1.3rem;">Struktur AKD <?= $profile->nama; ?></div>
    <div><?= $profile->keterangan; ?></div>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div style="width:100%; overflow:auto" id="aaaa"></div>
        </div>
        <div class="col-lg-12">
            <div id="dt_filter"></div>
        </div>
    </div>


    <?php 
        function getChild($all,$arrChild){
            $arrv = [];
            
            foreach ($arrChild as $k => $v) {
                $v = root($all,$v->parent_id);
                // $arrv[] = $x;

                // if(count($arrv)==1){
                //     echo "<pre>";print_r($arrv);echo "</pre>";
                // }

                if(count($arrv)>0){
                    if($arrv[($k-1)]->nama == $v->nama){
                        $arrv[] = $v;    
                    }
                }else{
                    $arrv[] = $v;
                }
            }

            
            return $arrChild;
        }


        function root($akdx,$p) {
            $arrcHild = [];

            foreach($akdx as $k => $v) {
                //jika dia parent cari anaknya
                
                if ($v->parent_id ==$p) {
                    $obj= $v;
                   

                    foreach($akdx as $ci => $vi){
                        if($v->id == $vi->parent_id){
                            $arrcHild[] = $vi;
                        }
                    }
                }
            }


            if(count($arrcHild)>0){
             

                $obj->children  = getChild($akdx,$arrcHild);
            }
            // else if(count($arrcHild)>=2){
            //     $obj->children  = $arrcHild;
            //     foreach ($obj->children as $k => $v) {
            //         $arr = [];
            //         $arr[] = $v;
            //         $v->children = [];
            //         // $v->children = root($akdx,$v->parent_id);;
            //         echo "<pre>";print_r($v->children);echo "</pre>";
                    
            //         // $v->children = getChild($akdx,$arr);
            //     }
            // }
            // else{
            //     $obj->children =[]; 
            // }
            

            // dd($akd);
            return $obj;

            
        }
        
        

        // $nav2 = root($akd,0);

        function onRoot($akd,$parent){
            //kembalikan root;
            foreach($akd as $k => $v) {
                //jika dia parent cari anaknya
                if($v->parent_id==$parent){
                    $v->children =[];
                    return $v;
                    break;
                }
            }

        }

        function getChild3($root,$akd){
            $childs = [];

            foreach ($akd as $k => $v) {
                if($root->id == $v->parent_id){
                    // $v = onRoot($akd,$v->id);
                    // echo base_url()." == ";
                    $v->children = getChild3($v,$akd);
                    $v->linkNode= true;
                    // $b64image = strlen($v->foto_anggota)>3? base64_encode( file_get_contents( base_url().'uploads/dewan/foto_profil/'.$v->foto_anggota)) :"'";
                    
                    // $v->keterangan = strlen($v->nama_anggota)>3? '<strong>'.$v->nama_anggota.'</strong>':'';

                   

                    $childs[] = $v;
                }
            }

            return $childs;
        }

        $nav3 = onRoot($akd,0);
        $nav3->children = getChild3($nav3,$akd);
       

    ?>

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>





<script>
function getImg(id_akd) {
    var bs = '<?php echo bs(); ?>'
    var ur = 'akd/getPjbAkd'

    $.ajax({
        type: 'POST',
        contentType: "application/json; charset=utf-8",
        url: bs + ur,
        data: JSON.stringify({
            "id_akd": id_akd
        }),
        dataType: "json",
        beforeSend: () => {
            $("#dt_filter").after("");
            el = `<span style="text-align:center; margin:auto; width:100%" id="informasi_loading_element"><i  class="fas fa-sync-alt"> </i> Memuat daftar data...</span>`
            $("#dt_filter").after(el);

        },
        success: (res) => {
            console.log("==== pejabat eksis ====")
            console.log(res)
            if (res.data.length > 0) {
                //simpan sementara data pejabat 

                var html = `<ul class="list-group">

                `
                res.data.map((item, i) => {
                    html += `
                    <li class="list-group-item">
                        <div><strong>Nama AKD</strong> : ${item.nama_akd}</div>
                        <div><strong>Pejabat </strong> : ${item.nama}</div>
                        <div style="padding:1rem">
                            <img style="height:200px; width:150px" src="${bs}uploads/dewan/foto_profil/${item.foto_profil}"/>
                        
                        </div>
                    </li>
                    `
                })

                html += `</ul>`

                $("#dt_filter").html(html)


            } else {

                // alert("Gagal karena : "+res.data);
                console.log(res)
            }

            $("#informasi_loading_element").fadeOut(1000, function() {
                $(this).remove();
            });
        },
        error: (err) => {
            $("#informasi_loading_element").fadeOut(1000, function() {
                $(this).remove();
            });
            console.log("error")
            console.log(err)
        }
    });
}

function renderImg($node, data) {
    if (data.id_anggota == null) {
        
        $node.find('.title').css({
            "width": "100%"
        });
        $node.find('.content').css({
            "display": "none"
        });
    } else {
        var bs = '<?php echo base_url(); ?>'
        var nodeId = $node.attr('id');
        var txt = $node.find('.content').text();
        $node.find('.title').css({
            "width": "100%"
        });
        $node.find('.content').css({
            "height": "250px"
        });
        $node.find('.content').html("");
        $node.find('.content')
            .html(`<div style='padding:0.5rem; font-size: 1rem;'>
                ${data.nama_anggota} <br>
                <img style="
                width:150px; 
                height:170px;"
                src='${bs}uploads/dewan/foto_profil/${data.foto_anggota}' >
                </div>
            `);
    }

}

$(document).ready(function() {
    var dt = JSON.parse('<?php echo json_encode($nav3); ?>')
    console.log(dt)



    var ds = {
        'nama': 'Lao Lao',
        'title': 'general manager',
        'children': [{
                'nama': 'Bo Miao',
                'title': '<strong>department manager</strong>'
            },
            {
                'nama': 'Su Miao',
                'title': 'department manager',
                'children': [{
                        'nama': 'Tie Hua',
                        'title': 'senior engineer'
                    },
                    {
                        'nama': 'Hei Hei',
                        'title': 'senior engineer',
                        'children': [{
                                'nama': 'Pang Pang',
                                'title': 'engineer'
                            },
                            {
                                'nama': 'Xiang Xiang',
                                'title': 'UE engineer'
                            }
                        ]
                    }
                ]
            },
            {
                'nama': 'Yu Jie',
                'title': 'department manager'
            },
            {
                'nama': 'Yu Li',
                'title': 'department manager'
            },
            {
                'nama': 'Hong Miao',
                'title': 'department manager'
            },
            {
                'nama': 'Yu Wei',
                'title': 'department manager'
            },
            {
                'nama': 'Chun Miao',
                'title': 'department manager'
            },
            {
                'nama': 'Yu Tie',
                'title': 'department manager'
            }
        ]
    };

    if (dt) {
        var oc = $('#aaaa').orgchart({
            'data': dt,
            'nodeContent': 'keterangan',
            'nodeTitle': 'nama',
            'pan': true,
            'zoom': false
        });


        setTimeout(function() {

        }, 1000);


        oc.init({
            'createNode': function($node, data) {
                $node.on('click', function(event) {

                    getImg(data.id)
                });
                var bs = '<?php echo base_url(); ?>'

                // console.log(data)
                // console.log($node)
                // console.log("===============")
                renderImg($node, data)


            }
        });


        $(window).resize(function() {
            var width = $(window).width();
            if (width > 576) {
                oc.init({

                    'verticalLevel': undefined,
                    'createNode': function($node, data) {

                        renderImg($node, data)


                    }


                });
            } else {
                oc.init({
                    'createNode': function($node, data) {
                        $node.on('click', function(event) {
                            console.log(data)
                            if (!$(event.target).is('.edge, .toggleBtn')) {
                                var $this = $(this);
                                var $chart = $this.closest('.orgchart');
                                var newX = window.parseInt(($chart.outerWidth(
                                    true) / 2) - ($this.offset().left -
                                    $chart.offset().left) - ($this
                                    .outerWidth(true) / 2));
                                var newY = window.parseInt(($chart.outerHeight(
                                    true) / 2) - ($this.offset().top -
                                    $chart.offset().top) - ($this
                                    .outerHeight(true) / 2));
                                $chart.css('transform', 'matrix(1, 0, 0, 1, ' +
                                    newX + ', ' + newY + ')');
                            }
                        });


                        renderImg($node, data)


                    }
                });
            }
        });


    } else {
        $('#aaaa').html(`tidak bisa proses data`)
    }

});
</script>