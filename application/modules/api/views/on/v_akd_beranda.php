<div class="container" style="background:#fafafb">
   
    <div>Anda bisa mengunjungi halaman berikut ini :</div>
    <div>
    <br>
    <?php 
    $dataPermission  = list_page(["a.is_private"=>"0"]); 

    function getChildrenSidebar($dataPermission,$p) {
        $r = array();
        foreach($dataPermission as $row) {
            if ($row->parent_id ==$p) {
                $row->child = getChildrenSidebar($dataPermission,$row->id);
                $r[$row->id] = $row;
            }
        }
        return $r;
    }
    
    $nav = getChildrenSidebar($dataPermission,0);


    function myListSidebar($n){
        
        foreach($n as $row){
            $fontweight = count($row->child)>0? 'bold' : $row->parent_id==0? 'bold':'normal';
            $parent = count($row->child)>0? "parent":null;
            $active = (uri_string() == $row->url ? 'active' : '');

            if(count($row->child)>0){
                myListSidebar($row->child);
            }
            
            else{

                if($row->is_statis == 1){
                    $base = base_url(). $row->url."/".$row->slug;
                }else{
                    $base = base_url(). $row->url;
                }

                if(count($row->child)==0 && $row->parent_id ==0  ){
                echo '
                <div>
                        <div>
                        <a href="'.$base.'" style="font-size:1.1rem; color: #ba9f47 "> <i class="fas fa-globe-asia"></i> '.$row->nama.'</a> 
                        <br>
                        <span style="font-size:0.7rem;"> '.$row->keterangan.' </span>
                        </div>
                    </div>
                    <br>
                ';

                }else{
                    echo '
                    <div>
                        <div>
                        <a href="'.$base.'" style="font-size:1.1rem; color: #ba9f47 "> <i class="fas fa-globe-asia"></i> '.$row->nama.'</a> 
                        <br>
                        <span style="font-size:0.7rem;"> '.$row->keterangan.' </span>
                        </div>
                    </div>
                    <br>
                    ';
                }
            }
        };
    }


    // echo '<ul class="list-group">';
    myListSidebar($nav);
    // echo '</ul>';
    
    ?>
    
    </div>
    
</div>
