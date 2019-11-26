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
        $this->view = new CancionView($this->session);
    }
    public function index()
    {   
        $this->view->showIndex();
    }
    public function edit($id)
    {
        if ($this->session->isLoggedIn()) {
            $this->view->edit();
        } else {
            Route::directDefault();
        }
    }
    public function create()
    {
        if ($this->session->isLoggedIn()) {

            $this->view->create();
        } else {
            Route::directDefault();
        }
    }
}
