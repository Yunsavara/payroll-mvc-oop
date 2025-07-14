<?php 
$title = "Proses Gaji Karyawan";
ob_start(); 
?>

<h3 class="mb-4">Proses Gaji Karyawan</h3>

<form action="index.php?controller=slip-gaji&action=store" method="POST">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Informasi Dasar</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="no_ref" class="form-label">No Referensi</label>
                        <input type="text" class="form-control" id="no_ref" name="no_ref" value="<?= $no_ref ?>" readonly>
                        <small class="text-muted">Auto generate: <?= $no_ref ?></small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="kode_karyawan" class="form-label">Karyawan</label>
                        <select class="form-control" id="kode_karyawan" name="kode_karyawan" required>
                            <option value="">Pilih Karyawan</option>
                            <?php foreach ($karyawan as $k): ?>
                                <option value="<?= $k['kode_karyawan'] ?>"><?= htmlspecialchars($k['nama']) ?> (<?= $k['kode_karyawan'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="periode" class="form-label">Periode (Bulan-Tahun)</label>
                        <input type="month" class="form-control" id="periode" name="periode" required>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Komponen Gaji</h5>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                <small>
                    <strong>Petunjuk:</strong><br>
                    • <span class="badge bg-success">Kredit</span> = Pendapatan (Gaji Pokok, Tunjangan, Bonus)<br>
                    • <span class="badge bg-danger">Debit</span> = Potongan (BPJS, Pajak, Denda)<br>
                    • Masukkan nominal tanpa titik atau koma (contoh: 5000000 untuk 5 juta)
                </small>
            </div>

            <?php if (!empty($keterangan)): ?>
                <div class="row">
                    <?php foreach ($keterangan as $ket): ?>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <?= htmlspecialchars($ket['keterangan']) ?>
                                <?php if ($ket['debitkredit'] == 'kredit'): ?>
                                    <span class="badge bg-success ms-2">Kredit</span>
                                <?php else: ?>
                                    <span class="badge bg-danger ms-2">Debit</span>
                                <?php endif; ?>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" 
                                       class="form-control" 
                                       name="nominal[<?= $ket['no'] ?>]" 
                                       min="0" 
                                       step="1000" 
                                       placeholder="0">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center text-muted py-4">
                    <p>Belum ada keterangan gaji.</p>
                    <a href="index.php?controller=keterangan-gaji&action=create" target="_blank" class="btn btn-outline-primary">
                        Tambah Keterangan Gaji
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="d-flex justify-content-end gap-2 mt-4 mb-5">
        <button type="submit" class="btn btn-primary">
            Proses Gaji
        </button>
        <button type="reset" class="btn btn-warning">
            Reset
        </button>
        <a href="index.php?controller=slip-gaji&action=index" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</form>

<?php 
$content = ob_get_clean();
require __DIR__ . '/../../Layout/app.php'; 
?>