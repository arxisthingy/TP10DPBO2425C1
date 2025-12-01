<h3>Depo Induk</h3>
<a href="index.php?page=depo_form" class="btn btn-primary mb-3">Tambah Depo</a>
<table class="table table-striped bg-white shadow-sm">
    <thead class="table-dark"><tr><th>Nama</th><th>Wilayah</th><th>Aksi</th></tr></thead>
    <tbody><?php foreach($list as $row): ?>
        <tr>
            <td><?=$row['nama_depo']?></td>
            <td><?=$row['kode_wilayah']?></td>
            <td>
                <a href="index.php?page=depo_form&id=<?=$row['id_depo']?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="index.php?page=depo_delete&id=<?=$row['id_depo']?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?></tbody>
</table>