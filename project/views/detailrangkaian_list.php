<div class="row">
    <div class="col-md-8">
        <div class="card shadow-sm mb-3">
            <div class="card-header bg-dark text-white d-flex justify-content-between">
                <span><?=$data->ka_nama?> (<?=$data->ka_rute?>)</span>
                <span><?=$data->tgl?></span>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead><tr><th>Urut</th><th>Gerbong</th><th>Jenis</th><th>Aksi</th></tr></thead>
                    <tbody>
                        <?php foreach($data->list_gerbong as $g): ?>
                        <tr>
                            <td><?=$g->urutan_gerbong?></td>
                            <td><?=$g->nomor_seri?></td>
                            <td><span class="badge <?=$g->warna?>"><?=$g->jenis?></span></td>
                            <td><a href="index.php?page=detail_delete&id=<?=$g->id_detail?>&parent=<?=$data->id_rangkaian?>" class="btn btn-sm btn-danger" onclick="return confirm('Lepas?')">Lepas</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">Tambah Gerbong</div>
            <div class="card-body">
                <form action="index.php?page=detail_add" method="POST">
                    <input type="hidden" name="id_rangkaian" value="<?=$data->id_rangkaian?>">
                    <div class="mb-3"><label>Urutan</label><input type="number" name="urutan" class="form-control" value="<?=count($data->list_gerbong)+1?>" required></div>
                    <div class="mb-3"><label>Gerbong Tersedia</label>
                        <select name="id_gerbong" class="form-select">
                            <?php foreach($data->opsi_tambah as $opt): ?>
                                <option value="<?=$opt['id_gerbong']?>"><?=$opt['nomor_seri']?> (<?=$opt['jenis']?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-success w-100">Pasang</button>
                </form>
            </div>
        </div>
    </div>
</div>