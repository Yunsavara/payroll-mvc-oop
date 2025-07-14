<?php
    $title = "Data Karyawan";
    ob_start(); 
?>

<h3 class="mb-3">Data Karyawan</h3>

<div class="container-fluid d-flex justify-content-end align-items-center py-3">
    <a href="index.php?controller=karyawan&action=create">
        <button class="btn btn-primary">Tambah</button>
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jabatan</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>No Rekening</th>
                <th>Bank</th>
                <th>Perusahaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $i => $row): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($row['kode_karyawan']) ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['alamat']) ?></td>
                        <td><?= htmlspecialchars($row['jabatan']) ?></td>
                        <td><?= htmlspecialchars($row['no_telp']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['no_rekening']) ?></td>
                        <td><?= htmlspecialchars($row['rek_bank']) ?></td>
                        <td><?= htmlspecialchars($row['nama_perusahaan'] ?? '-') ?></td>
                        <td>
                            <a href="index.php?controller=karyawan&action=edit&id=<?= $row['kode_karyawan'] ?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="index.php?controller=karyawan&action=delete&id=<?= $row['kode_karyawan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="11">Tidak ada data karyawan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php 
    $content = ob_get_clean();
    require __DIR__ . '/../../Layout/app.php'; 
?>