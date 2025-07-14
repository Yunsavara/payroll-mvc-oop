<?php

require_once __DIR__ . '/../Config/Database.php';

use Config\Database;

class SlipGaji {

    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        $sql = "SELECT s.*, k.nama as nama_karyawan
                FROM slip_gaji s 
                LEFT JOIN karyawan k ON s.kode_karyawan = k.kode_karyawan 
                ORDER BY s.tgl DESC";
        $statement = $this->db->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($no_ref) {
        $sql = "SELECT s.*, k.nama as nama_karyawan
                FROM slip_gaji s 
                LEFT JOIN karyawan k ON s.kode_karyawan = k.kode_karyawan 
                WHERE s.no_ref = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$no_ref]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create($no_ref, $tgl, $total, $kode_karyawan) {
        $sql = "INSERT INTO slip_gaji (no_ref, tgl, total, kode_karyawan) VALUES (?, ?, ?, ?)";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$no_ref, $tgl, $total, $kode_karyawan]);
    }

    public function generateNoRef() {
        $sql = "SELECT MAX(CAST(SUBSTRING(no_ref, 4) AS UNSIGNED)) as max_number FROM slip_gaji WHERE no_ref LIKE 'SLG%'";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        $nextNumber = ($result['max_number'] ?? 0) + 1;
        return 'SLG' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
    }

    public function checkExisting($kode_karyawan, $periode) {
        $sql = "SELECT * FROM slip_gaji WHERE kode_karyawan = ? AND DATE_FORMAT(tgl, '%Y-%m') = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$kode_karyawan, $periode]);
        
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($no_ref) {
        // Delete detail gaji first
        $sql1 = "DELETE FROM detail_gaji WHERE no_ref = ?";
        $statement1 = $this->db->prepare($sql1);
        $statement1->execute([$no_ref]);
        
        // Delete slip gaji
        $sql2 = "DELETE FROM slip_gaji WHERE no_ref = ?";
        $statement2 = $this->db->prepare($sql2);
        return $statement2->execute([$no_ref]);
    }
}