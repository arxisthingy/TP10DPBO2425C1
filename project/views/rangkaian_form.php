<div class="card col-md-6 mx-auto shadow-sm">
    <div class="card-body">
        <h4>Buat Dinasan Baru</h4>
        <form action="index.php?page=rangkaian_save" method="POST">
            <div class="mb-3"><label>Nama KA</label><input type="text" name="nama_ka" class="form-control" required></div>
            <div class="mb-3"><label>Rute</label><input type="text" name="rute" class="form-control" required></div>
            <div class="mb-3"><label>Tanggal</label><input type="date" name="tgl" class="form-control" required></div>
            <div class="mb-3"><label>Lokomotif</label>
                <select name="loko" class="form-select">
                    <?php foreach($data->lokos as $l): ?>
                        <option value="<?=$l['id_loko']?>"><?=$l['kode_loko']?> (<?=$l['status_mesin']?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="btn btn-primary w-100">Simpan</button>
        </form>
    </div>
</div>