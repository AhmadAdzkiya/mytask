<form method="post" action="<?php bs() ?>users/edit_profile">
    <div class="form-group">
        <label for="exampleInputEmail1">Judul</label>
        <input type="text" class="form-control" name="first_name"
            value="<?php echo $raperda->judul ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Periode</label>
        <input type="text" class="form-control" name="last_name"
            value="<?php echo $raperda->thn_anggaran ?>">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Tahun Anggaran</label>
        <input type="text" class="form-control" name="last_name"
            value="<?php echo $raperda->thn_anggaran ?>">
    </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
</form>