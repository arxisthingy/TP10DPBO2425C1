<?php
// Include database configuration
require_once 'config/Database.php';

class Depo {
    // connection
    private $conn;

    // constructor to initialize connection
    public function __construct() { $this->conn = (new Database())->getConnection(); }
    
    // get all depo
    public function getAll() { 
        return $this->conn->query("SELECT * FROM depo_induk ORDER BY kode_wilayah ASC"); 
    }

    // get depo by ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM depo_induk WHERE id_depo = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // CRUD operations
    public function insert($nama, $kode) {
        $stmt = $this->conn->prepare("INSERT INTO depo_induk (nama_depo, kode_wilayah) VALUES (?, ?)");
        return $stmt->execute([$nama, $kode]);
    }
    public function update($id, $nama, $kode) {
        $stmt = $this->conn->prepare("UPDATE depo_induk SET nama_depo=?, kode_wilayah=? WHERE id_depo=?");
        return $stmt->execute([$nama, $kode, $id]);
    }
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM depo_induk WHERE id_depo=?");
        return $stmt->execute([$id]);
    }
}
?>