<?php
require_once 'ApiController.php';
require_once '.\Models\ArtistaModel.php';


class ArtistaController extends ApiController
{

    function __construct()
    {
        parent::__construct();  
        $this->model = new ArtistaModel();
    }

    public function index()
    {
        $artistas = $this->model->get();
        $this->json->response($artistas,200);
    }


    public function show($id)
    {
        $artista = $this->model->getByID($id);  
        $this->json->response($artista,200);
    }

    public function save($data)
    {
           
        $this->model->update($data);
        $this->json->response("Exito",200);
    }

    public function insert($data)
    {

        $this->model->create($data);
        $this->json->response("Exito",200);
        
    }

    public function delete($id)
    {
        $this->model->delete($id);
        $this->json->response("Exito",200);
    }
}
