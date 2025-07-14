<?php

require_once __DIR__ . '/../Model/KeteranganGaji.php';

class KeteranganGajiController {
    
    private $model;

    public function __construct() {
        $this->model = new KeteranganGaji();
    }

    public function index() {
        $data = $this->model->getAll();
        require __DIR__ . '/../View/KeteranganGaji/index.php';
    }

    public function create() {
        require __DIR__ . '/../View/KeteranganGaji/create.php';
    }

    public function store() {
        if ($_POST) {
            $keterangan = $_POST['keterangan'];
            $debitkredit = $_POST['debitkredit'];
            
            $result = $this->model->create($keterangan, $debitkredit);
            
            if ($result) {
                header('Location: index.php?controller=keterangan-gaji&action=index');
                exit;
            }
        }
    }

    public function edit($no) {
        $data = $this->model->getById($no);
        require __DIR__ . '/../View/KeteranganGaji/edit.php';
    }

    public function update($no) {
        if ($_POST) {
            $keterangan = $_POST['keterangan'];
            $debitkredit = $_POST['debitkredit'];
            
            $result = $this->model->update($no, $keterangan, $debitkredit);
            
            if ($result) {
                header('Location: index.php?controller=keterangan-gaji&action=index');
                exit;
            }
        }
    }

    public function delete($no) {
        $result = $this->model->delete($no);
        
        if ($result) {
            header('Location: index.php?controller=keterangan-gaji&action=index');
            exit;
        }
    }
}