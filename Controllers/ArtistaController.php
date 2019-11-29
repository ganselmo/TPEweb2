<?php
require_once 'Controller.php';
require_once '.\Models\ArtistaModel.php';
require_once '.\Views\ArtistaView.php';

class ArtistaController extends Controller
{

    function __construct()
    {
        parent::__construct();

        $this->view = new ArtistaView();
    }

    public function index()
    {
        $this->view->showIndex();
    }

    public function create()
    {
        $this->view->create();

    }
    public function edit()

    {
        $this->view->edit();
    }
}
