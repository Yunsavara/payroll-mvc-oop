<?php
$title = "Tambah Perusahaan";
ob_start(); 
?>

<h3 class="mb-5">Tambah Perusahaan</h3>

<form action="index.php?controller=perusahaan&action=store" method="POST">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Perusahaan</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="no_telpon" class="form-label">No Telpon</label>
        <input type="text" class="form-control" id="no_telpon" name="no_telpon" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="d-flex flex-wrap justify-content-end align-items-center gap-md-3">
        <button type="submit" class="col-12 col-md-auto btn btn-primary">Simpan</button>
        <button type="reset" class="col-12 col-md-auto btn btn-danger">Reset</button>
    </div>
</form>

<?php 
$content = ob_get_clean();
require __DIR__ . '/../../Layout/app.php'; 
?>