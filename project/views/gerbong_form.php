<div class="card col-md-6 mx-auto shadow-sm">
    <div class="card-body">
        <h4><?=$data->judul?></h4>
        <form action="index.php?page=gerbong_save" method="POST">
            <input type="hidden" name="id" value="<?=$data->id?>">
            <div class="mb-3"><label>Nomor Seri</label><input type="text" name="nomor" class="form-control" value="<?=$data->nomor?>" required></div>
            <div class="mb-3"><label>Jenis</label>
                <select name="jenis" class="form-select">
                    <?php foreach(['Eksekutif','Ekonomi','Luxury','Priority','Kereta Makan','Pembangkit'] as $j): ?>
                        <option value="<?=$j?>" <?=$data->jenis==$j?'selected':''?>><?=$j?></option>
                    <?php endforeach; ?>
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