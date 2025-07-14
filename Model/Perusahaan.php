<?php

require_once __DIR__ . '/../Config/Database.php';

use Config\Database;

class Perusahaan {

    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        $sql = "SELECT * FROM perusahaan";
        $statement = $this->db->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM perusahaan WHERE id = ?";
        $statement = $this->db->prepare($sql);
        $statement->execute([$id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama, $alamat, $no_telpon, $email) {
        $sql = "INSERT INTO perusahaan (nama, alamat, no_telpon, email) VALUES (?, ?, ?, ?)";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$nama, $alamat, $no_telpon, $email]);
    }

    public function update($id, $nama, $alamat, $no_telpon, $email) {
        $sql = "UPDATE perusahaan SET nama = ?, alamat = ?, no_telpon = ?, email = ? WHERE id = ?";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$nama, $alamat, $no_telpon, $email, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM perusahaan WHERE id = ?";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$id]);
    }
}