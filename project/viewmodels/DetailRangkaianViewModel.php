<?php
require_once 'models/DetailRangkaian.php'; //   Include the DetailRangkaian model

class DetailRangkaianViewModel {
    // model
    private $model;
    // constructor
    public function __construct() { $this->model = new DetailRangkaian(); }

    // methods
    // display index
    public function index($id) {
        // get header, details, available gerbong
        $header = $this->model->getHeader($id);
        $details = $this->model->getDetails($id);
        $available = $this->model->getAvailableGerbong($id);

        // prepare list gerbong with color coding
        $listGerbong = [];
        foreach($details as $row) {
            $bg = 'bg-secondary';
            if($row['jenis'] == 'Eksekutif') $bg='bg-primary';
            elseif($row['jenis'] == 'Ekonomi') $bg='bg-warning text-dark';
            elseif($row['jenis'] == 'Kereta Makan') $bg='bg-danger';
            elseif($row['jenis'] == 'Pembangkit') $bg='bg-success';
            elseif($row['jenis'] == 'Luxury') $bg='bg-info text-dark';
            elseif($row['jenis'] == 'Priority') $bg='bg-dark';
            
            $row['warna'] = $bg;
            $listGerbong[] = (object)$row;
        }

        // return assembled data
        return (object)[
            'id_rangkaian' => $id, 'ka_nama' => $header['nama_ka'], 'ka_rute' => $header['rute'],
            'ka_loko' => $header['kode_loko'], 'tgl' => date('d M Y', strtotime($header['tanggal_dinas'])),
            'list_gerbong' => $listGerbong, 'opsi_tambah' => $available
        ];
    }
    // add gerbong to rangkaian
    public function add() {
        $this->model->add($_POST['id_rangkaian'], $_POST['id_gerbong'], $_POST['urutan']);
        header("Location: index.php?page=detail_rangkaian&id=".$_POST['id_rangkaian']);
    }
    // delete gerbong from rangkaian
    public function delete($id_detail, $id_parent) {
        $this->model->delete($id_detail);
        header("Location: index.php?page=detail_rangkaian&id=".$id_parent);
    }
}
?>