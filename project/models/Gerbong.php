<?php
// Include database configuration
require_once 'config/Database.php';

class Gerbong {
    // connection
    private $conn;
    // constructor to initialize connection
    public function __construct() { $this->conn = (new Database())->getConnection(); }

    // Get all gerbong with depo names
    public function getAll() { 
        return $this->conn->query("SELECT g.*, d.nama_depo FROM gerbong g JOIN depo_induk d ON g.id_depo = d.id_depo"); 
    }

    // Get gerbong by ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM gerbong WHERE id_gerbong = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Get all depo
    public function getAllDepo() { return $this->conn->query("SELECT * FROM depo_induk"); }

    // CRUD operations
    public function insert($nomor, $jenis, $depo) {
        $stmt = $this->conn->prepare("INSERT INTO gerbong (nomor_seri, jenis, id_depo) VALUES (?, ?, ?)");
        return $stmt->execute([$nomor, $jenis, $depo]);
    }
    public function update($id, $nomor, $jenis, $depo) {
        $stmt = $this->conn->prepare("UPDATE gerbong SET nomor_seri=?, jenis=?, id_depo=? WHERE id_gerbong=?");
        return $stmt->execute([$nomor, $jenis, $depo, $id]);
    }
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM gerbong WHERE id_gerbong=?");
        return $stmt->execute([$id]);
    }
}
?>