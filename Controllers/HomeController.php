<?php
require_once("Views/HomeView.php");
class HomeController extends Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->view= new HomeView();
    }
    function index()
    {
        $this->view->showIndex();
    }    
}