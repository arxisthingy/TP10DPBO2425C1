<h3>Lokomotif</h3>
<a href="index.php?page=loko_form" class="btn btn-primary mb-3">Tambah Loko</a>
<table class="table table-striped bg-white shadow-sm">
    <thead class="table-dark"><tr><th>Kode</th><th>Status</th><th>Depo</th><th>Aksi</th></tr></thead>
    <tbody><?php foreach($list as $row): ?>
        <tr>
            <td><?=$row['kode_loko']?></td>
            <td><?=$row['status_mesin']?></td>
            <td><?=$row['nama_depo']?></td>
            <td>
                <a href="index.php?page=loko_form&id=<?=$row['id_loko']?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="index.php?page=loko_delete&id=<?=$row['id_loko']?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?></tbody>
</table>