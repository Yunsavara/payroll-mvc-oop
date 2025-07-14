<?php

require_once __DIR__ . '/../Model/SlipGaji.php';
require_once __DIR__ . '/../Model/DetailGaji.php';
require_once __DIR__ . '/../Model/Karyawan.php';
require_once __DIR__ . '/../Model/KeteranganGaji.php';

class SlipGajiController {
    
    private $model;
    private $detailModel;
    private $karyawanModel;
    private $keteranganModel;

    public function __construct() {
        $this->model = new SlipGaji();
        $this->detailModel = new DetailGaji();
        $this->karyawanModel = new Karyawan();
        $this->keteranganModel = new KeteranganGaji();
    }

    public function index() {
        $data = $this->model->getAll();
        require __DIR__ . '/../View/SlipGaji/index.php';
    }

    public function create() {
        $karyawan = $this->karyawanModel->getAll();
        $keterangan = $this->keteranganModel->getAll();
        $no_ref = $this->model->generateNoRef();
        require __DIR__ . '/../View/SlipGaji/create.php';
    }

    public function store() {
        if ($_POST) {
            $no_ref = $_POST['no_ref'];
            $kode_karyawan = $_POST['kode_karyawan'];
            $periode = $_POST['periode'];
            $tgl = $periode . '-01';
            
            // Check if already exists
            $existing = $this->model->checkExisting($kode_karyawan, $periode);
            if ($existing) {
                echo "<script>alert('Gaji untuk karyawan ini pada periode tersebut sudah ada!'); history.back();</script>";
                return;
            }

            // Calculate total
            $total_kredit = 0;
            $total_debit = 0;
            
            // Get keterangan gaji for debit/kredit info
            $keterangan_list = $this->keteranganModel->getAll();
            $keterangan_map = [];
            foreach ($keterangan_list as $ket) {
                $keterangan_map[$ket['no']] = $ket['debitkredit'];
            }
            
            foreach ($_POST['nominal'] as $no => $nominal) {
                if (!empty($nominal) && $nominal > 0) {
                    // Pastikan nominal positif
                    $nominal = abs((float)$nominal);
                    
                    if ($keterangan_map[$no] == 'kredit') {
                        $total_kredit += $nominal;
                    } else {
                        $total_debit += $nominal;
                    }
                }
            }
            
            $total = $total_kredit - $total_debit;
            
            // Create slip gaji
            $result = $this->model->create($no_ref, $tgl, $total, $kode_karyawan);
            
            if ($result) {
                // Create detail gaji
                foreach ($_POST['nominal'] as $no => $nominal) {
                    if (!empty($nominal) && $nominal > 0) {
                        $this->detailModel->create($no, $no_ref, abs((float)$nominal));
                    }
                }
                
                header('Location: index.php?controller=slip-gaji&action=index');
                exit;
            }
        }
    }

    public function show($no_ref) {
        $slip = $this->model->getById($no_ref);
        $details = $this->detailModel->getBySlip($no_ref);
        require __DIR__ . '/../View/SlipGaji/show.php';
    }

    public function delete($no_ref) {
        $result = $this->model->delete($no_ref);
        
        if ($result) {
            header('Location: index.php?controller=slip-gaji&action=index');
            exit;
        }
    }
}