<?php
$title = "Edit Karyawan";
ob_start(); 
?>

<h3 class="mb-5">Mengubah Karyawan</h3>

<form action="index.php?controller=karyawan&action=update&id=<?= $data['kode_karyawan'] ?>" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= htmlspecialchars($data['alamat']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= htmlspecialchars($data['jabatan']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telpon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= htmlspecialchars($data['no_telp']) ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="no_rekening" class="form-label">No Rekening</label>
                <input type="text" class="form-control" id="no_rekening" name="no_rekening" value="<?= htmlspecialchars($data['no_rekening']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="rek_bank" class="form-label">Bank</label>
                <input type="text" class="form-control" id="rek_bank" name="rek_bank" value="<?= htmlspecialchars($data['rek_bank']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="perusahaan_id" class="form-label">Perusahaan</label>
                <select class="form-control" id="perusahaan_id" name="id" required>
                    <option value="">Pilih Perusahaan</option>
                    <?php foreach ($perusahaan as $p): ?>
                        <option value="<?= $p['id'] ?>" <?= $p['id'] == $data['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($p['nama']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="d-flex flex-wrap justify-content-end align-items-center gap-md-3">
        <button type="submit" class="col-12 col-md-auto btn btn-primary">Ubah</button>
        <a href="index.php?controller=karyawan&action=index" class="btn btn-danger">Batal</a>
    </div>
</form>

<?php 
$content = ob_get_clean();
require __DIR__ . '/../../Layout/app.php'; 
?>