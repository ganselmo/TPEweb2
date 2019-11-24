<?php
require_once 'Controller.php';
require_once '.\Models\ArtistaModel.php';
require_once '.\Views\ArtistaView.php';

class ArtistaController extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->model = new ArtistaModel();
        $this->view = new ArtistaView($this->session);
    }

    public function index()
    {
        $artistas = $this->model->get();

        $this->view->showIndex($artistas);
    }

    public function create()
    {
        if ($this->session->isLoggedIn()) {

            $this->view->create();
        } else {
            Route::directDefault();
        }
    }

    public function show($id)
    {

        $artista = $this->model->getByID($id);

        $this->view->showOne($artista);
    }
    public function edit($id)

    {
        if ($this->session->isLoggedIn()) {

            $artista = $this->model->getByID($id);

            $this->view->edit($artista);
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
