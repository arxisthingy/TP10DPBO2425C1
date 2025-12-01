<?php
require_once 'models/Lokomotif.php';// Include the Lokomotif model


class LokomotifViewModel {
    // model
    private $model;

    // constructor
    public function __construct() { $this->model = new Lokomotif(); }

    // methods
    public function index() { return $this->model->getAll()->fetchAll(PDO::FETCH_ASSOC); } // fetchall for view
    public function delete($id) { $this->model->delete($id); header("Location: index.php?page=loko"); } // delete lokomotif

    // form data
    public function form($id = null) {
        $depos = $this->model->getAllDepo()->fetchAll(PDO::FETCH_ASSOC); // dropdown depo
        $data = (object)['id'=>'', 'kode'=>'', 'status'=>'Siap', 'id_depo'=>'', 'judul'=>'Tambah Lokomotif', 'depos'=>$depos];
        // edit mode
        if($id) {
            $row = $this->model->getById($id);
            $data->id = $row['id_loko']; $data->kode = $row['kode_loko']; $data->status = $row['status_mesin'];
            $data->id_depo = $row['id_depo']; $data->judul = "Edit Lokomotif";
        }
        return $data;
    }
    
    // save data
    public function save() {
        if($_POST['id']) $this->model->update($_POST['id'], $_POST['kode'], $_POST['status'], $_POST['depo']);
        else $this->model->insert($_POST['kode'], $_POST['status'], $_POST['depo']);
        header("Location: index.php?page=loko");
    }
}
?>