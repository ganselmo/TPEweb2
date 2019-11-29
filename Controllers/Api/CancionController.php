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
        $this->json->response($canciones, 200);
    }

    public function show($id)
    {

        $cancion = $this->model->getWithArtista($id);

        $cancion->imagenes = $this->model->getImages($id);


        if (count($this->model->getImages($id))<1) {
            $cancion->imagenes[0]= new \stdClass();
            $cancion->imagenes[0]->id = 0;
            $cancion->imagenes[0]->id_cancion = $id;
            $cancion->imagenes[0]->path = "./Repositories/images/canciones/noimage.png";
        } else {
            $cancion->imagenes = $this->model->getImages($id);
        }
        $this->json->response($cancion, 200);
    }
    public function save($data)
    {
        $this->model->update($data);
        $this->json->response("Satisfactorio", 200);
    }

    public function insert($data)
    {
        $this->model->create($data);
        $this->json->response("Satisfactorio", 200);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        $this->json->responseStatus(200);
    }
}
