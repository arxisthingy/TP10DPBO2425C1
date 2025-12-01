<div class="d-flex justify-content-between mb-3">
    <h3>Jadwal Perjalanan</h3>
    <a href="index.php?page=rangkaian_add" class="btn btn-primary">Jadwalkan KA</a>
</div>
<table class="table table-striped bg-white shadow-sm">
    <thead class="table-dark"><tr><th>KA & Rute</th><th>Tanggal</th><th>Lokomotif</th><th>Susunan</th><th>Aksi</th></tr></thead>
    <tbody><?php foreach($list as $ka): ?>
        <tr>
            <td><strong><?=$ka->ka?></strong><br><small><?=$ka->rute?></small></td>
            <td><?=$ka->tgl?></td>
            <td><?=$ka->loko?><br><small><?=$ka->depo?></small></td>
            <td><?php foreach($ka->gerbongs as $g): ?>
                <span class="badge <?=$g->warna?>"><?=$g->nomor?></span>
            <?php endforeach; ?></td>
            <td>
                <a href="index.php?page=detail_rangkaian&id=<?=$ka->id?>" class="btn btn-sm btn-info text-white mb-1">Kelola</a>
                <a href="index.php?page=rangkaian_delete&id=<?=$ka->id?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">X</a>
            </td>
        </tr>
    <?php endforeach; ?></tbody>
</table>