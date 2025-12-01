<?php
// Include database configuration
require_once 'config/Database.php';

class Lokomotif {
    // connection
    private $conn;

    // constructor to initialize connection
    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    // get all lokomotif with depo names
    public function getAll() { 
        return $this->conn->query("SELECT l.*, d.nama_depo FROM lokomotif l JOIN depo_induk d ON l.id_depo = d.id_depo ORDER BY l.kode_loko ASC"); 
    }

    // get lokomotif by ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM lokomotif WHERE id_loko = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // get all depo
    public function getAllDepo() { 
        return $this->conn->query("SELECT * FROM depo_induk"); 
    }
    
    // CRUD operations
    public function insert($kode, $status, $depo) {
        $stmt = $this->conn->prepare("INSERT INTO lokomotif (kode_loko, status_mesin, id_depo) VALUES (?, ?, ?)");
        return $stmt->execute([$kode, $status, $depo]);
    }

    public function update($id, $kode, $status, $depo) {
        $stmt = $this->conn->prepare("UPDATE lokomotif SET kode_loko=?, status_mesin=?, id_depo=? WHERE id_loko=?");
        return $stmt->execute([$kode, $status, $depo, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM lokomotif WHERE id_loko=?");
        return $stmt->execute([$id]);
    }
}
?>