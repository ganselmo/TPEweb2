<?php
require_once(".\API\ApiViews\HomeApiView.php");

class HomeApiController extends ApiController 
{
    public function __construct()
    {
        $this->view = new HomeApiView();
    }

    function index()
    {
        $this->view->showIndex();
    }

    public function getMenu() {
        $this->view->displayMenu();
    }

    public function checkLogIn() {
        $this->view->showIndex(); 
    }   
}