<?php
require_once 'config/Database.php';

class Rangkaian {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->getConnection();
    }

    public function getAll() {
        $sql = "SELECT r.*, l.kode_loko, d.nama_depo,
                GROUP_CONCAT(CONCAT(g.nomor_seri, '|', g.jenis) ORDER BY dr.urutan_gerbong ASC SEPARATOR ',') as list_gerbong
                FROM rangkaian r
                JOIN lokomotif l ON r.id_loko = l.id_loko
                JOIN depo_induk d ON l.id_depo = d.id_depo
                LEFT JOIN detail_rangkaian dr ON r.id_rangkaian = dr.id_rangkaian
                LEFT JOIN gerbong g ON dr.id_gerbong = g.id_gerbong
                GROUP BY r.id_rangkaian ORDER BY r.tanggal_dinas ASC";
        
        return $this->conn->query($sql);
    }

    public function getAllLokoReady() {
        return $this->conn->query("SELECT * FROM lokomotif WHERE status_mesin='Siap'");
    }
    
    public function insert($nama, $rute, $tgl, $loko) {
        $sql = "INSERT INTO rangkaian (nama_ka, rute, tanggal_dinas, id_loko) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nama, $rute, $tgl, $loko]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM rangkaian WHERE id_rangkaian = ?");
        return $stmt->execute([$id]);
    }
}
?>