<div class="card col-md-6 mx-auto shadow-sm">
    <div class="card-body">
        <h4><?=$data->judul?></h4>
        <form action="index.php?page=depo_save" method="POST">
            <input type="hidden" name="id" value="<?=$data->id?>">
            <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control" value="<?=$data->nama?>" required></div>
            <div class="mb-3"><label>Wilayah</label><input type="text" name="kode" class="form-control" value="<?=$data->kode?>" required></div>
            <button class="btn btn-success w-100">Simpan</button>
        </form>
    </div>
</div>