<?php

require_once __DIR__ . '/../Config/Database.php';

use Config\Database;

class DetailGaji {

    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function create($no, $no_ref, $nominal) {
        $sql = "INSERT INTO detail_gaji (no, no_ref, nominal) VALUES (?, ?, ?)";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$no, $no_ref, $nominal]);
    }

    public function getBySlip($no_ref) {
        $sql = "SELECT d.*, k.keterangan, k.debitkredit,
                CAST(d.nominal AS DECIMAL(15,2)) as nominal_numeric
                FROM detail_gaji d 
                LEFT JOIN keterangan_gaji k ON d.no = k.no 
                WHERE d.no_ref = ?
                ORDER BY k.debitkredit DESC, k.keterangan ASC";
        $statement = $this->db->prepare($sql);
        $statement->execute([$no_ref]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}