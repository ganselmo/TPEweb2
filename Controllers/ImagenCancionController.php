<?php
require_once("Models/HomeView.php");
require_once("Models/ImagenCancionModel.php");
class HomeController extends Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new ImagenCancionModel();
    }
    function save()
    {
        $this->model->save();
    }
    function delete()
    {
        $this->model->save();
    }        
}