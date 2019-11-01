<?php
require_once 'Controller.php';
require_once '.\Models\CancionModel.php';
require_once '.\Views\CancionView.php';

class CancionController extends Controller{

    function __construct() {
        $this->model = new CancionModel();
        $this->view = new CancionView();
    }

    public function create() {
        if(isset($_POST) && isset($_POST['nombre']) && isset($_POST['duracion']) && isset($_POST['genero']) && isset($_POST['album']) && isset($_POST['artista']) && isset($_POST['ranking'])) {
            $this->model->create(array($_POST['nombre'], $_POST['duracion'], $_POST['genero'], $_POST['album'], $_POST['artista'], $_POST['ranking']));
        }
        header("Location: " . BASE_CANCION);
    }

    public function deleter() {
        if(isset($_POST) && isset($_POST['id'])) {
            $this->model->delete($_POST['id']);
        }
        header("Location: " . BASE_CANCION);
    }

    public function update() {
        if(isset($_POST) && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['duracion']) && isset($_POST['genero']) && isset($_POST['album']) && isset($_POST['artista']) && isset($_POST['ranking'])) {
            $this->model->update(array($_POST['nombre'], $_POST['duracion'], $_POST['genero'], $_POST['album'], $_POST['artista'], $_POST['ranking'], $_POST['id']));
            header("Location: " . BASE_CANCION);
        } elseif (isset($_GET) && isset($_GET['id'])) {
            $cancion = $this->findById($_GET['id']);
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


    public function index()
    {
        $canciones = $this->model->get();

        $this->view->showIndex($canciones);
    }

    public function show($id)
    {
        $cancion = $this->model->findById($id[]);

        $this->view->showOne($cancion);
    }
    public function edit($id)

    {

        $cancion = $this->model->getByID($id);

        $this->view->edit($cancion);
    }
    public function save($data)
    {
        $this->model->create($data);
        $this->index();
    }

    public function insert($data)
    {
        $this->model->insert($data);
        $this->index();
    }

    public function delete($id)
    {
        $this->model->delete($id);
        $this->index();
    }
}