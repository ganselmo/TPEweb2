<?php
require_once 'Controller.php';
require_once '.\Models\CancionModel.php';
require_once '.\Models\ArtistaModel.php';
require_once '.\Views\CancionView.php';

class CancionController extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->view = new CancionView();
    }
    public function index()
    {   
        $this->view->showIndex();
    }
    public function show()
    {
        $this->view->show();
    }

    public function edit()
    {
        $this->view->edit();

    }

    public function create()
    {
            $this->view->create();

    }
}
