<?php

require_once __DIR__ . '/../Config/Database.php';

use Config\Database;

class Karyawan {

    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        $sql = "SELECT k.*, p.nama as nama_perusahaan 
                FROM karyawan k 
                LEFT JOIN perusahaan p ON k.id = p.id 
                ORDER BY k.kode_karyawan DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($kode_karyawan) {
        $sql = "SELECT * FROM karyawan WHERE kode_karyawan = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$kode_karyawan]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create($kode_karyawan, $nama, $alamat, $jabatan, $no_telp, $email, $no_rekening, $rek_bank, $perusahaan_id) {
        $sql = "INSERT INTO karyawan (kode_karyawan, nama, alamat, jabatan, no_telp, email, no_rekening, rek_bank, id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$kode_karyawan, $nama, $alamat, $jabatan, $no_telp, $email, $no_rekening, $rek_bank, $perusahaan_id]);
    }

    public function update($kode_karyawan, $nama, $alamat, $jabatan, $no_telp, $email, $no_rekening, $rek_bank, $perusahaan_id) {
        $sql = "UPDATE karyawan SET nama = ?, alamat = ?, jabatan = ?, no_telp = ?, email = ?, no_rekening = ?, rek_bank = ?, id = ? 
                WHERE kode_karyawan = ?";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$nama, $alamat, $jabatan, $no_telp, $email, $no_rekening, $rek_bank, $perusahaan_id, $kode_karyawan]);
    }

    public function delete($kode_karyawan) {
        $sql = "DELETE FROM karyawan WHERE kode_karyawan = ?";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$kode_karyawan]);
    }

    public function generateKodeKaryawan() {
        $sql = "SELECT MAX(CAST(SUBSTRING(kode_karyawan, 4) AS UNSIGNED)) as max_number FROM karyawan WHERE kode_karyawan LIKE 'KAR%'";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        $nextNumber = ($result['max_number'] ?? 0) + 1;
        return 'KAR' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }
}