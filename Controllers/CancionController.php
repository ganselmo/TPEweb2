<?php
require_once 'Controller.php';
require_once '.\Models\CancionModel.php';
require_once '.\Views\CancionView.php';

class CancionController extends Controller{

    function __construct() {
        $this->model = new CancionModel();
        $this->view = new CancionView();
    }

    public function add() {
        if(isset($_POST) && isset($_POST['nombre']) && isset($_POST['duracion']) && isset($_POST['genero']) && isset($_POST['album'])) {
            $cancion = array($_POST['nombre'], $_POST['duracion'], $_POST['genero'], $_POST['album'], $_POST['artista'], $_POST['ranking']);
            $this->model->add($cancion);
        }
        header("Location: " . BASE);
    }

    public function delete() {
        if(isset($_POST) && isset($_POST['id'])) {
            $this->model->delete($_POST['id']);
        }
        header("Location: " . BASE);
    }

    public function update() {
        if(isset($_POST) && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['duracion']) && isset($_POST['genero']) && isset($_POST['album'])) {
            $this->model->update($_POST['id'], $_POST['nombre'], $_POST['duracion'], $_POST['genero'], $_POST['album'], $_POST['artista'], $_POST['ranking']);
        }
        header("Location: " . BASE);
    }

    public function findById($id) {
        $obj = $this->model->findById($id);
        var_dump($obj);die;
    }

    public function findByColumn($column,$parameter) {
        $obj = $this->model->findByColumn($column,$parameter);
        var_dump($obj);die;
    }
}