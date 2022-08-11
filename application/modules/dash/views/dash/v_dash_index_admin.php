<?php defined('BASEPATH') or exit('No direct script access allowed');/*Author bee*/?>
<style>
.img_widget_title {
    width: 50px;
    height: 50px;
}

.img_widget_title:hover {
    transform: scale(1.2);
    transition: ease 1s;
}
</style>

<div class="be-content">

    <div class="page-head">
        <h2 class="page-head-title">Dashboard <span class="page-head-sub-title"> </span></h2>
    </div>
    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div>
                    <h2>Halo, <strong> <?php echo $user->first_name." ".$user->last_name; ?></strong></h2>

                    <div class="row">

                        
                    </div>

                </div>
            </div>
        </div>
    </div>



</div>

<script>
$(() => {

})
</script>