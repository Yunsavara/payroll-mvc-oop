<?php

require_once __DIR__ . '/../Config/Database.php';

use Config\Database;

class KeteranganGaji {

    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        $sql = "SELECT * FROM keterangan_gaji ORDER BY no ASC";
        $statement = $this->db->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($no) {
        $sql = "SELECT * FROM keterangan_gaji WHERE no = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$no]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create($keterangan, $debitkredit) {
        $sql = "INSERT INTO keterangan_gaji (keterangan, debitkredit) VALUES (?, ?)";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$keterangan, $debitkredit]);
    }

    public function update($no, $keterangan, $debitkredit) {
        $sql = "UPDATE keterangan_gaji SET keterangan = ?, debitkredit = ? WHERE no = ?";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$keterangan, $debitkredit, $no]);
    }

    public function delete($no) {
        $sql = "DELETE FROM keterangan_gaji WHERE no = ?";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$no]);
    }
}