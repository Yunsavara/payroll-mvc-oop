<?php

require_once __DIR__ . '/../Model/Perusahaan.php';

class PerusahaanController {
    
    private $model;

    public function __construct() {
        $this->model = new Perusahaan();
    }

    public function index() {
        $data = $this->model->getAll();
        require __DIR__ . '/../View/Perusahaan/index.php';
    }

    public function create() {
        require __DIR__ . '/../View/Perusahaan/create.php';
    }

    public function store() {
        if ($_POST) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $no_telpon = $_POST['no_telpon'];
            $email = $_POST['email'];
            
            $result = $this->model->create($nama, $alamat, $no_telpon, $email);
            
            if ($result) {
                header('Location: index.php?controller=perusahaan&action=index');
                exit;
            }
        }
    }

    public function edit($id) {
        $data = $this->model->getById($id);
        require __DIR__ . '/../View/Perusahaan/edit.php';
    }

    public function update($id) {
        if ($_POST) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $no_telpon = $_POST['no_telpon'];
            $email = $_POST['email'];
            
            $result = $this->model->update($id, $nama, $alamat, $no_telpon, $email);
            
            if ($result) {
                header('Location: index.php?controller=perusahaan&action=index');
                exit;
            }
        }
    }

    public function delete($id) {
        $result = $this->model->delete($id);
        
        if ($result) {
            header('Location: index.php?controller=perusahaan&action=index');
            exit;
        }
    }
}