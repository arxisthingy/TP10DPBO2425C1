<?php
// Include database configuration
require_once 'config/Database.php';

class DetailRangkaian {
    // connection
    private $conn;
    public function __construct() { $this->conn = (new Database())->getConnection(); }

    // CRUD methods
    public function getHeader($id) {
        $stmt = $this->conn->prepare("SELECT r.*, l.kode_loko FROM rangkaian r JOIN lokomotif l ON r.id_loko=l.id_loko WHERE r.id_rangkaian=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Get detail rangkaian by rangkaian ID
    public function getDetails($id) {
        $stmt = $this->conn->prepare("SELECT dr.*, g.nomor_seri, g.jenis FROM detail_rangkaian dr JOIN gerbong g ON dr.id_gerbong=g.id_gerbong WHERE dr.id_rangkaian=? ORDER BY dr.urutan_gerbong");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get available gerbong not yet in the rangkaian
    public function getAvailableGerbong($id) {
        $sql = "SELECT * FROM gerbong WHERE id_gerbong NOT IN (SELECT id_gerbong FROM detail_rangkaian WHERE id_rangkaian=?) ORDER BY jenis, nomor_seri";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add gerbong to rangkaian
    public function add($id_rangkaian, $id_gerbong, $urutan) {
        $stmt = $this->conn->prepare("INSERT INTO detail_rangkaian (id_rangkaian, id_gerbong, urutan_gerbong) VALUES (?, ?, ?)");
        return $stmt->execute([$id_rangkaian, $id_gerbong, $urutan]);
    }

    // Delete gerbong from rangkaian
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM detail_rangkaian WHERE id_detail=?");
        return $stmt->execute([$id]);
    }
}
?>