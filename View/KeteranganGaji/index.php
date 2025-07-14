<?php
    $title = "Data Keterangan Gaji";
    ob_start(); 
?>

<h3 class="mb-3">Data Penggajian</h3>

<div class="container-fluid d-flex justify-content-end align-items-center py-3 gap-3">
    <a class="nav-link" href="index.php?controller=slip-gaji&action=index">
        <button class="btn btn-secondary">Proses Gaji</button>
    </a>
    <a href="index.php?controller=keterangan-gaji&action=create">
        <button class="btn btn-primary">Tambah</button>
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Debit/Kredit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $i => $row): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($row['keterangan']) ?></td>
                        <td>
                            <?php if ($row['debitkredit'] == 'kredit'): ?>
                                <span class="badge bg-success">Kredit</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Debit</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="index.php?controller=keterangan-gaji&action=edit&id=<?= $row['no'] ?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="index.php?controller=keterangan-gaji&action=delete&id=<?= $row['no'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Tidak ada data keterangan gaji</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php 
    $content = ob_get_clean();
    require __DIR__ . '/../../Layout/app.php'; 
?>