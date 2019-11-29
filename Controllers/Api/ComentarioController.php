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

    public function insert($data)
    {
        $data->user = $this->session->getLoggedUserId();        
        $this->model->create($data);
        $this->json->response("Sucess",200); 
    }
    public function delete($id)
    {
        $this->model->delete($id);
        $this->json->response("Sucess",200);
    }
}
