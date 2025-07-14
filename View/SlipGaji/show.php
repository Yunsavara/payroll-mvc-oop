<?php
    $title = "Detail Slip Gaji";
    ob_start(); 
?>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0 text-center">SLIP GAJI KARYAWAN</h4>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <strong>No Referensi:</strong> <?= $slip['no_ref'] ?><br>
                        <strong>Periode:</strong> <?= date('F Y', strtotime($slip['tgl'])) ?>
                    </div>
                    <div class="col-md-6">
                        <strong>Nama Karyawan:</strong> <?= htmlspecialchars($slip['nama_karyawan']) ?><br>
                        <strong>Kode Karyawan:</strong> <?= $slip['kode_karyawan'] ?>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th class="text-center">Pendapatan (Kredit)</th>
                            <th class="text-center">Potongan (Debit)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total_kredit = 0;
                        $total_debit = 0;
                        
                        if (!empty($details)):
                            foreach ($details as $detail): 
                                // Use nominal_numeric (DECIMAL cast)
                                $nominal = $detail['nominal_numeric'];
                                
                                if ($detail['debitkredit'] == 'kredit') {
                                    $total_kredit += $nominal;
                                } else {
                                    $total_debit += $nominal;
                                }
                        ?>
                            <tr>
                                <td><?= htmlspecialchars($detail['keterangan']) ?></td>
                                <td class="text-end">
                                    <?= $detail['debitkredit'] == 'kredit' ? 'Rp ' . number_format($nominal, 0, ',', '.') : '-' ?>
                                </td>
                                <td class="text-end">
                                    <?= $detail['debitkredit'] == 'debit' ? 'Rp ' . number_format($nominal, 0, ',', '.') : '-' ?>
                                </td>
                            </tr>
                        <?php 
                            endforeach;
                        else:
                        ?>
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada detail gaji</td>
                            </tr>
                        <?php endif; ?>
                        
                        <tr class="table-secondary">
                            <th><strong>TOTAL</strong></th>
                            <th class="text-end"><strong>Rp <?= number_format($total_kredit, 0, ',', '.') ?></strong></th>
                            <th class="text-end"><strong>Rp <?= number_format($total_debit, 0, ',', '.') ?></strong></th>
                        </tr>
                        <tr class="table-success">
                            <th><strong>GAJI BERSIH</strong></th>
                            <th colspan="2" class="text-center">
                                <h5><strong>Rp <?= number_format($slip['total'], 0, ',', '.') ?></strong></h5>
                            </th>
                        </tr>
                    </tbody>
                </table>

                <!-- Signature area for print -->
                <div class="row mt-5 d-none d-print-block">
                    <div class="col-md-6">
                        <div class="text-center">
                            <p>Mengetahui,</p>
                            <br><br><br>
                            <p>_______________________</p>
                            <p><strong>HRD</strong></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-center">
                            <p><?= date('d F Y', strtotime($slip['tgl'])) ?></p>
                            <p>Yang Menerima,</p>
                            <br><br>
                            <p>_______________________</p>
                            <p><strong><?= htmlspecialchars($slip['nama_karyawan']) ?></strong></p>
                        </div>
                    </div>
                </div>

                <!-- Button area -->
                <div class="text-end mt-4 no-print-area">
                    <button onclick="window.print()" class="btn btn-success">Print Slip Gaji</button>
                    <a href="index.php?controller=slip-gaji&action=index" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
require __DIR__ . '/../../Layout/app.php'; 
?>