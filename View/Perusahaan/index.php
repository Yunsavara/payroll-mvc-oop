<?php
    $title = "Data Perusahaan";
    ob_start(); 
?>

<h3 class="mb-3">Data Perusahaan</h3>

<div class="container-fluid d-flex justify-content-end align-items-center py-3">
    <a href="index.php?controller=perusahaan&action=create">
        <button class="btn btn-primary">Tambah</button>
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $i => $row): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['alamat']) ?></td>
                        <td><?= htmlspecialchars($row['no_telpon']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td>
                            <a href="index.php?controller=perusahaan&action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="index.php?controller=perusahaan&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Tidak ada data perusahaan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php 
    $content = ob_get_clean();
    require __DIR__ . '/../../Layout/app.php'; 
?>