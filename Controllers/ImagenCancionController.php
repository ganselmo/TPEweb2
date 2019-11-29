<?php

require_once("Models/ImagenCancionModel.php");
class ImagenCancionCOntroller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new ImagenCancionModel();
    }
    function create($data)
    {
        if ($_FILES["input_name"]['error'] == 0) {
            $filePath = "./Repositories/images/canciones/" . uniqid("", true) . "." . strtolower(pathinfo($_FILES['input_name']['name'], PATHINFO_EXTENSION));

            move_uploaded_file($_FILES['input_name']["tmp_name"], $filePath);

            $this->model->create($data['id_cancion'], $filePath);
        }
        else
        {
            
        }
        $url = "Canciones/Get/".$data['id_cancion'];
        header( "Location:".BASE.$url);


        
    }
}
