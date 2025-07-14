<?php
    $title = "Tambah Keterangan Gaji";
    ob_start(); 
?>

<h3 class="mb-5">Tambah Keterangan Gaji</h3>

<form action="index.php?controller=keterangan-gaji&action=store" method="POST">
    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Contoh: Gaji Pokok, Tunjangan Transport, Potongan BPJS" required>
    </div>
    <div class="mb-3">
        <label for="debitkredit" class="form-label">Tipe</label>
        <select class="form-control" id="debitkredit" name="debitkredit" required>
            <option value="">Pilih Tipe</option>
            <option value="kredit">Kredit (Pendapatan)</option>
            <option value="debit">Debit (Potongan)</option>
        </select>
        <div class="form-text">
            <strong>Kredit:</strong> Gaji pokok, tunjangan, bonus<br>
            <strong>Debit:</strong> Potongan pajak, BPJS, denda
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="reset" class="btn btn-danger">Reset</button>
</form>

<?php 
    $content = ob_get_clean();
    require __DIR__ . '/../../Layout/app.php'; 
?>