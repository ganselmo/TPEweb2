<?php
require_once 'Controller.php';
require_once '.\Models\CancionModel.php';
require_once '.\Models\Artista.php';
require_once '.\Views\CancionView.php';

class CancionController extends Controller
{

    function __construct()
    {
        $this->model = new CancionModel();
        $this->modelArt = new Artista();
        $this->view = new CancionView();
    }

    public function update()
    {
        if (isset($_POST) && isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['duracion']) && isset($_POST['genero']) && isset($_POST['album']) && isset($_POST['artista']) && isset($_POST['ranking'])) {
            $this->model->update(array($_POST['nombre'], $_POST['duracion'], $_POST['genero'], $_POST['album'], $_POST['artista'], $_POST['ranking'], $_POST['id']));
            header("Location: " . BASE_CANCION);
        } elseif (isset($_GET) && isset($_GET['id'])) {
            $cancion = $this->findById($_GET['id']);
            $this->view->displayUpdate($cancion);
        }
    }

    private function findById($id)
    {
        return $this->model->getByID($id);
    }

    public function findByColumn($column, $parameter)
    {
        $obj = $this->model->findByColumn($column, $parameter);
        var_dump($obj);
        die;
    }


    public function index()
    {
        $canciones = $this->model->get();

        $this->view->showIndex($canciones);
    }

    public function show($id)
    {

        $cancion = $this->model->findById($id);

        $this->view->showOne($cancion);
    }
    public function edit($id)

    {
        if ($this->view->returnSession()->isLoggedIn()) {
            $cancion = $this->model->getByID($id);
            $this->view->edit($cancion);
        } else {
            Route::directDefault();
        }
    }
    public function save($data)
    {
        if ($this->view->returnSession()->isLoggedIn()) {
            $values = [];
            foreach ($data as $key => $value) {
                array_push($values, $key);
            }
            $this->model->update($values);
            $this->index();
        } else {
            Route::directDefault();
        }
    }

    public function create()
    {
        if ($this->view->returnSession()->isLoggedIn()) {
            $artistas = $this->modelArt->all();
            $this->view->create($artistas);
        } else {
            Route::directDefault();
        }
    }

    public function insert($data)
    {
        if ($this->view->returnSession()->isLoggedIn()) {
            $values = [];
            foreach ($data as $key => $value) {
                array_push($values, $value);
            }
            $this->model->create($values);
            $this->index();
        } else {
            Route::directDefault();
        }
    }

    public function delete($id)
    {
        if ($this->view->returnSession()->isLoggedIn()) {
            $this->model->delete($id['id']);
            $this->index();
        } else {
            Route::directDefault();
        }
    }
}
