<?php
require_once 'ApiController.php';
require_once '.\Models\CancionModel.php';

class CancionController extends ApiController
{

    function __construct()
    {
        parent::__construct();
        $this->model = new CancionModel();
    }
    public function index()
    {
        $canciones = $this->model->getAllWithArtista();
        $this->json->response($canciones,200);
    }

    public function show($id)
    {

        $cancion = $this->model->getWithArtista($id);
        $cancion->imagenes = $this->model->getImages($id);
        $this->json->response($cancion,200);
    }
    public function save($data)
    {
        $this->model->update($data);
        $this->json->responseStatus(200);
    }

    public function insert($data)
    {
        $this->model->create($data);
        $this->json->responseStatus(200);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        $this->json->responseStatus(200);
    }
}
