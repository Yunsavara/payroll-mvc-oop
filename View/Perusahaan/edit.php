<?php
$title = "Edit Perusahaan";
ob_start(); 
?>

<h3 class="mb-5">Mengubah Perusahaan</h3>

<form action="index.php?controller=perusahaan&action=update&id=<?= $data['id'] ?>" method="POST">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Perusahaan</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= htmlspecialchars($data['alamat']) ?></textarea>
    </div>
    <div class="mb-3">
        <label for="no_telpon" class="form-label">No Telpon</label>
        <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="<?= htmlspecialchars($data['no_telpon']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>
    </div>
    <div class="d-flex flex-wrap justify-content-end align-items-center gap-md-3">
        <button type="submit" class="col-12 col-md-auto btn btn-primary">Simpan</button>
        <a href="index.php?controller=perusahaan&action=index" class="btn btn-danger">Batal</a>
    </div>
</form>

<?php 
$content = ob_get_clean();
require __DIR__ . '/../../Layout/app.php'; 
?>