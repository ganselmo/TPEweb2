<?php
require_once 'ApiController.php';
require_once '.\Models\CancionModel.php';
require_once '.\API\ApiViews\CancionApiView.php';

class CancionApiController extends ApiController{

    function __construct() {
        $this->model = new CancionModel();
        $this->view = new CancionApiView();
    }

    public function create() {
        if(isset($_POST) && isset($_POST['nombre']) && isset($_POST['duracion']) && isset($_POST['genero']) && isset($_POST['album']) && isset($_POST['artista']) && isset($_POST['ranking'])) {
            $this->model->create(array($_POST['nombre'], $_POST['duracion'], $_POST['genero'], $_POST['album'], $_POST['artista'], $_POST['ranking']));
        }
        header("Location: " . BASE_CANCION);
    }

    public function delete() {
        if(isset($_POST) && isset($_POST['id'])) {
            $this->model->delete($_POST['id']);
        }
        header("Location: " . BASE_CANCION);
    }

    public function update() {
        if(isset($_POST) && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['duracion']) && isset($_POST['genero']) && isset($_POST['album']) && isset($_POST['artista']) && isset($_POST['ranking'])) {
            $this->model->update(array($_POST['nombre'], $_POST['duracion'], $_POST['genero'], $_POST['album'], $_POST['artista'], $_POST['ranking'], $_POST['id']));
            header("Location: " . BASE_CANCION);
        } elseif (isset($_POST) && isset($_POST['id'])) {
            $cancion = $this->findById($_POST['id']);
            $this->view->displayUpdate($cancion);
        }
    }

    private function findById($id) {
        return $this->model->getByID($id);
    }

    public function findByColumn($column,$parameter) {
        $obj = $this->model->findByColumn($column,$parameter);
        var_dump($obj);die;
    }
}