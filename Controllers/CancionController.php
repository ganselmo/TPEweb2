<?php
require_once 'Controller.php';
require_once '.\Models\CancionModel.php';
require_once '.\Models\ArtistaModel.php';
require_once '.\Views\CancionView.php';

class CancionController extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new CancionModel();
        $this->modelArt = new ArtistaModel();
        $this->view = new CancionView($this->session);
    }

    private function findById($id)
    {
        return $this->model->getByID($id);
    }

    public function findByColumn($column, $parameter)
    {
        $obj = $this->model->findByColumn($column, $parameter);
        die;
    }


    public function index()
    {
        $canciones = $this->model->getCancionesArtistas();
        $this->view->showIndex($canciones);
    }

    public function show($id)
    {

        $cancion = $this->model->findById($id);

        $this->view->showOne($cancion);
    }
    public function edit($id)

    {
        if ($this->session->isLoggedIn()) {
            $cancion = $this->model->getByID($id);
            $this->view->edit($cancion);
        } else {
            Route::directDefault();
        }
    }
    public function save($data)
    {
        if ($this->session->isLoggedIn()) {
            $values = [];
            foreach ($data as $key => $value) {
                array_push($values, $value);
            }
            $this->model->update($values);
            $this->index();
        } else {
            Route::directDefault();
        }
    }

    public function create()
    {
        if ($this->session->isLoggedIn()) {
            $artistas = $this->modelArt->get();
            $this->view->create($artistas);
        } else {
            Route::directDefault();
        }
    }

    public function insert($data)
    {
        if ($this->session->isLoggedIn()) {
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
        if ($this->session->isLoggedIn()) {
            $this->model->delete($id['id']);
            $this->index();
        } else {
            Route::directDefault();
        }
    }
}
