<?php
require_once 'models/Depo.php'; // Include the Depo model

// ViewModel for Depo
class DepoViewModel {
    // model
    private $model;
    // constructor
    public function __construct() { $this->model = new Depo(); }

    // methods
    public function index() { return $this->model->getAll()->fetchAll(PDO::FETCH_ASSOC); } 
    public function delete($id) { $this->model->delete($id); header("Location: index.php?page=depo"); }

    // form data
    public function form($id = null) {
        $data = (object)['id'=>'', 'nama'=>'', 'kode'=>'', 'judul'=>'Tambah Depo'];
        if($id) {
            $row = $this->model->getById($id);
            $data = (object)['id'=>$row['id_depo'], 'nama'=>$row['nama_depo'], 'kode'=>$row['kode_wilayah'], 'judul'=>'Edit Depo'];
        }
        return $data;
    }

    // save data
    public function save() {
        if($_POST['id']) $this->model->update($_POST['id'], $_POST['nama'], $_POST['kode']);
        else $this->model->insert($_POST['nama'], $_POST['kode']);
        header("Location: index.php?page=depo");
    }
}
?>