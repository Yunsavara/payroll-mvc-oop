<?php
$title = "Edit Keterangan Gaji";
ob_start(); 
?>

<h3 class="mb-5">Mengubah Keterangan Gaji</h3>

<form action="index.php?controller=keterangan-gaji&action=update&id=<?= $data['no'] ?>" method="POST">
    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= htmlspecialchars($data['keterangan']) ?>" required>
    </div>
    <div class="mb-3">
        <label for="debitkredit" class="form-label">Tipe</label>
        <select class="form-control" id="debitkredit" name="debitkredit" required>
            <option value="">Pilih Tipe</option>
            <option value="kredit" <?= $data['debitkredit'] == 'kredit' ? 'selected' : '' ?>>Kredit (Pendapatan)</option>
            <option value="debit" <?= $data['debitkredit'] == 'debit' ? 'selected' : '' ?>>Debit (Potongan)</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Ubah</button>
    <a href="index.php?controller=keterangan-gaji&action=index" class="btn btn-danger">Batal</a>
</form>

<?php 
$content = ob_get_clean();
require __DIR__ . '/../../Layout/app.php'; 
?>