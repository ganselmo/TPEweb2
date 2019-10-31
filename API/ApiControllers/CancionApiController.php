<?php
require_once 'ApiController.php';
require_once '.\Models\CancionModel.php';
require_once '.\API\ApiViews\CancionApiView.php';

class CancionApiController extends ApiController{

    function __construct() {
        $this->model = new CancionModel();
        $this->view = new CancionApiView();
        $this->session = new UserApiController();
    }

    public function create() {
        $this->checkLogIn();
        if(isset($_POST) && isset($_POST['nombre']) && isset($_POST['duracion']) && isset($_POST['genero']) && isset($_POST['album']) && isset($_POST['artista']) && isset($_POST['ranking'])) {
            $this->model->create(array($_POST['nombre'], $_POST['duracion'], $_POST['genero'], $_POST['album'], $_POST['artista'], $_POST['ranking']));
        }
        header("Location: " . BASE_CANCION);
    }

    public function delete() {
        $this->checkLogIn();
        if(isset($_POST) && isset($_POST['id'])) {
            $this->model->delete($_POST['id']);
        }
        header("Location: " . BASE_CANCION);
    }

    public function update() {
        $this->checkLogIn();
        if(isset($_POST) && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['duracion']) && isset($_POST['genero']) && isset($_POST['album']) && isset($_POST['artista']) && isset($_POST['ranking'])) {
            $this->model->update(array($_POST['nombre'], $_POST['duracion'], $_POST['genero'], $_POST['album'], $_POST['artista'], $_POST['ranking'], $_POST['id']));
            header("Location: " . BASE_CANCION);
        } elseif (isset($_POST) && isset($_POST['id'])) {
            $cancion = $this->findById($_POST['id']);
            $this->view->displayUpdate($cancion);
        }
    }

    private function findById($id) {
        $this->checkLogIn();
        return $this->model->getByID($id);
    }

    public function findByColumn($column,$parameter) {
        $this->checkLogIn();
        $obj = $this->model->findByColumn($column,$parameter);
        var_dump($obj);die;
    }

    public function checkLogin() {
        $this->session->checkLogin();
    }
}