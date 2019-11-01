<?php
require_once 'Controller.php';
require_once '.\Models\Artista.php';
require_once '.\Views\ArtistaView.php';

class ArtistaController extends Controller {

    function __construct() {
        $this->model = new Artista();
        $this->view= new ArtistaView();
    }

    public function index()
    {
        $artistas = $this->model->all();

        $this->view->showIndex($artistas);
    }

    public function create()
    {
        $this->view->create();
    }
    public function edit($id)

    {
        $artista = $this->model->findById($id);

        $this->view->edit($artista);
    }
    public function save($data)
    {
        $this->model->update($data);
        $this->index();
    }

    public function insert($data)
    {
        $this->model->insert($data);
        $this->index();
    }

    public function delete($id)
    {
        $this->model->delete($id['id']);
        $this->index();
    }

    

    

}

