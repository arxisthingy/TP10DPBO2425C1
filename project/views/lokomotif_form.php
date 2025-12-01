<div class="card col-md-6 mx-auto shadow-sm">
    <div class="card-body">
        <h4><?=$data->judul?></h4>
        <form action="index.php?page=loko_save" method="POST">
            <input type="hidden" name="id" value="<?=$data->id?>">
            <div class="mb-3"><label>Kode</label><input type="text" name="kode" class="form-control" value="<?=$data->kode?>" required></div>
            <div class="mb-3"><label>Status</label>
                <select name="status" class="form-select">
                    <option value="Siap" <?=$data->status=='Siap'?'selected':''?>>Siap</option>
                    <option value="Perbaikan" <?=$data->status=='Perbaikan'?'selected':''?>>Perbaikan</option>
                </select>
            </div>
            <div class="mb-3"><label>Depo</label>
                <select name="depo" class="form-select">
                    <?php foreach($data->depos as $d): ?>
                        <option value="<?=$d['id_depo']?>" <?=$data->id_depo==$d['id_depo']?'selected':''?>><?=$d['nama_depo']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="btn btn-success w-100">Simpan</button>
        </form>
    </div>
</div>