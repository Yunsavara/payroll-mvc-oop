<?php

require_once __DIR__ . '/../Model/Karyawan.php';
require_once __DIR__ . '/../Model/Perusahaan.php';

class KaryawanController {
    
    private $model;
    private $perusahaanModel;

    public function __construct() {
        $this->model = new Karyawan();
        $this->perusahaanModel = new Perusahaan();
    }

    public function index() {
        $data = $this->model->getAll();
        require __DIR__ . '/../View/Karyawan/index.php';
    }

    public function create() {
        $perusahaan = $this->perusahaanModel->getAll();
        $kode_karyawan = $this->model->generateKodeKaryawan();
        require __DIR__ . '/../View/Karyawan/create.php';
    }

    public function store() {
        if ($_POST) {
            $kode_karyawan = $_POST['kode_karyawan'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $jabatan = $_POST['jabatan'];
            $no_telp = $_POST['no_telp'];
            $email = $_POST['email'];
            $no_rekening = $_POST['no_rekening'];
            $rek_bank = $_POST['rek_bank'];
            $perusahaan_id = $_POST['id'];
            
            $result = $this->model->create($kode_karyawan, $nama, $alamat, $jabatan, $no_telp, $email, $no_rekening, $rek_bank, $perusahaan_id);
            
            if ($result) {
                header('Location: index.php?controller=karyawan&action=index');
                exit;
            }
        }
    }

    public function edit($kode_karyawan) {
        $data = $this->model->getById($kode_karyawan);
        $perusahaan = $this->perusahaanModel->getAll();
        require __DIR__ . '/../View/Karyawan/edit.php';
    }

    public function update($kode_karyawan) {
        if ($_POST) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $jabatan = $_POST['jabatan'];
            $no_telp = $_POST['no_telp'];
            $email = $_POST['email'];
            $no_rekening = $_POST['no_rekening'];
            $rek_bank = $_POST['rek_bank'];
            $perusahaan_id = $_POST['id'];
            
            $result = $this->model->update($kode_karyawan, $nama, $alamat, $jabatan, $no_telp, $email, $no_rekening, $rek_bank, $perusahaan_id);
            
            if ($result) {
                header('Location: index.php?controller=karyawan&action=index');
                exit;
            }
        }
    }

    public function delete($kode_karyawan) {
        $result = $this->model->delete($kode_karyawan);
        
        if ($result) {
            header('Location: index.php?controller=karyawan&action=index');
            exit;
        }
    }
}