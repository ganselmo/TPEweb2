<?php
require_once 'Controller.php';
require_once '.\Models\Artista.php';

class ArtistaController extends Controller
{

    function __construct()
    {
        $this->model = new Artista();
        $this->view = new View('Artista/index');
        
    }

    public function index()
    {
        $models = $this->model->all();
        
        $this->view->returnView($models);
    }
    public function show($id)
    {
        $artista = $this->model->findById($id);
        $this->returnView('Artista/show', $artista);
    }

    public function edit($id)
    { }

    public function insert($params)
    { }

    public function delete($id)
    { }

    public function update($id)
    { }
}
