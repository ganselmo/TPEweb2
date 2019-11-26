<?php
require_once 'ApiController.php';
require_once '.\Models\ComentarioModel.php';


class ComentarioController extends ApiController
{

    function __construct()
    {
        parent::__construct();  
        $this->model = new ComentarioModel();
    }

    public function allInCancion($idCancion)
    {
        $comentarios = $this->model->allInCancion($idCancion);
        $this->json->response($comentarios,200);
    }


    public function show($id)
    {
        $comentario = $this->model->getByID($id);  
        $this->json->response($comentario,200);
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
