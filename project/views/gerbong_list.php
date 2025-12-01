<h3>Gerbong</h3>
<a href="index.php?page=gerbong_form" class="btn btn-primary mb-3">Tambah Gerbong</a>
<table class="table table-striped bg-white shadow-sm">
    <thead class="table-dark"><tr><th>Nomor</th><th>Jenis</th><th>Depo</th><th>Aksi</th></tr></thead>
    <tbody><?php foreach($list as $row): ?>
        <tr>
            <td><?=$row['nomor_seri']?></td>
            <td>
                <span class="badge <?=$row['warna']?>">
                    <?=$row['jenis']?>
                </span>
            </td>
            <td><?=$row['nama_depo']?></td>
            <td>
                <a href="index.php?page=gerbong_form&id=<?=$row['id_gerbong']?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="index.php?page=gerbong_delete&id=<?=$row['id_gerbong']?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?></tbody>
</table>