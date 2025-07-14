<?php
    $title = "Data Slip Gaji";
    ob_start(); 
?>

<h3 class="mb-3">Data Slip Gaji</h3>

<div class="container-fluid d-flex justify-content-end align-items-center py-3">
    <a href="index.php?controller=slip-gaji&action=create">
        <button class="btn btn-primary">Proses Gaji Baru</button>
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>No Referensi</th>
                <th>Tanggal</th>
                <th>Karyawan</th>
                <th>Total Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $i => $row): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($row['no_ref']) ?></td>
                        <td><?= date('d M Y', strtotime($row['tgl'])) ?></td>
                        <td><?= htmlspecialchars($row['nama_karyawan']) ?></td>
                        <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                        <td>
                            <a href="index.php?controller=slip-gaji&action=show&id=<?= $row['no_ref'] ?>" class="btn btn-info btn-sm">Lihat</a>
                            <a href="index.php?controller=slip-gaji&action=delete&id=<?= $row['no_ref'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Tidak ada data slip gaji</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php 
    $content = ob_get_clean();
    require __DIR__ . '/../../Layout/app.php'; 
?>