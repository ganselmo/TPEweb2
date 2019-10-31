<?php
require_once("ApiView.php");

class HomeApiView extends ApiView{

    public function __construct() {
        parent::__construct();
    }

    public function showIndex(){
        $this->smarty->assign('titulo',"Bienvenido Administador");
        $this->smarty->display('templates/home copy.tpl');
    }

    public function displayMenu() {
        $this->smarty->assign('titulo',"Bienvenidos");
        $this->smarty->display('templates/menu copy.tpl');
    }

}