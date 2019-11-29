<?php

require_once("Models/ImagenCancionModel.php");
class ImagenCancionController extends ApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new ImagenCancionModel();
    }
    function delete($data)
    {
        $image = $this->model->getById($data->id);
        if(isset($image) )
        {
            $this->model->delete($data);
            $this->json->response("Imagen eliminada correctamente",200);
            unlink($image->path);
        }
        else
        {
            $this->json->response("Imagen no encontrada",404);
        }
     
        
    }
}