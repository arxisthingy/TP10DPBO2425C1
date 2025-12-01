<?php
require_once 'models/Gerbong.php';// Include the Gerbong model

class GerbongViewModel {
    // model
    private $model;

    // constructor
    public function __construct() { $this->model = new Gerbong(); }

    // methods
    public function index() { 
        $data = $this->model->getAll()->fetchAll(PDO::FETCH_ASSOC); // fetchall for view
        
        // bind colors (same logic as Rangkaian)
        foreach($data as &$row) {
            $jenis = $row['jenis'];
            $bg = 'bg-secondary';
            if($jenis == 'Eksekutif') $bg='bg-primary';
            elseif($jenis == 'Ekonomi') $bg='bg-warning text-dark';
            elseif($jenis == 'Kereta Makan') $bg='bg-danger';
            elseif($jenis == 'Pembangkit') $bg='bg-success';
            elseif($jenis == 'Luxury') $bg='bg-info text-dark';
            elseif($jenis == 'Priority') $bg='bg-dark';
            $row['warna'] = $bg;
        }
        
        return $data;
    } 
    
    public function delete($id) { $this->model->delete($id); header("Location: index.php?page=gerbong"); } // delete gerbong

    // form data
    public function form($id = null) {
        $depos = $this->model->getAllDepo()->fetchAll(PDO::FETCH_ASSOC);
        $data = (object)['id'=>'', 'nomor'=>'', 'jenis'=>'Eksekutif', 'id_depo'=>'', 'judul'=>'Tambah Gerbong', 'depos'=>$depos];
        if($id) {
            $row = $this->model->getById($id);
            $data->id = $row['id_gerbong']; $data->nomor = $row['nomor_seri']; $data->jenis = $row['jenis'];
            $data->id_depo = $row['id_depo']; $data->judul = "Edit Gerbong";
        }
        return $data;
    }
    // save data
    public function save() {
        if($_POST['id']) $this->model->update($_POST['id'], $_POST['nomor'], $_POST['jenis'], $_POST['depo']);
        else $this->model->insert($_POST['nomor'], $_POST['jenis'], $_POST['depo']);
        header("Location: index.php?page=gerbong");
    }
}
?>