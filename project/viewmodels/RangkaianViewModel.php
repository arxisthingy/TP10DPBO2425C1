<?php
require_once 'models/Rangkaian.php';// Include the Rangkaian model

class RangkaianViewModel {
    // model
    private $model;
    // constructor
    public function __construct() { $this->model = new Rangkaian(); }

    // methods
    // list all rangkaian
    public function index() {
        $stmt = $this->model->getAll();
        $dataSiap = [];
        // prepare data with gerbong list and color coding
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $gerbongList = [];
            if($row['list_gerbong']) {
                foreach(explode(',', $row['list_gerbong']) as $item) {
                    $p = explode('|', $item);
                    $jenis = $p[1] ?? '';
                    $bg = 'bg-secondary';
                    if($jenis == 'Eksekutif') $bg='bg-primary';
                    elseif($jenis == 'Ekonomi') $bg='bg-warning text-dark';
                    elseif($jenis == 'Kereta Makan') $bg='bg-danger';
                    elseif($jenis == 'Pembangkit') $bg='bg-success';
                    elseif($jenis == 'Luxury') $bg='bg-info text-dark';
                    elseif($jenis == 'Priority') $bg='bg-dark';
                    $gerbongList[] = (object)['nomor'=>$p[0], 'jenis'=>$jenis, 'warna'=>$bg];
                }
            }
            // assemble data
            $dataSiap[] = (object)[
                'id' => $row['id_rangkaian'], 'ka' => $row['nama_ka'], 'rute' => $row['rute'],
                'tgl' => date('d M Y', strtotime($row['tanggal_dinas'])),
                'loko' => $row['kode_loko'], 'depo' => $row['nama_depo'], 'gerbongs' => $gerbongList
            ];
        }
        return $dataSiap;
    }

    // form data
    public function form() {
        return (object)['lokos' => $this->model->getAllLokoReady()->fetchAll(PDO::FETCH_ASSOC)];
    }

    // save data
    public function save() {
        $this->model->insert($_POST['nama_ka'], $_POST['rute'], $_POST['tgl'], $_POST['loko']);
        header("Location: index.php");
    }
    public function delete($id) { $this->model->delete($id); header("Location: index.php"); }
}
?>