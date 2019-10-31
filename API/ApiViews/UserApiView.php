<?php
require_once("ApiView.php");

class UserApiView extends ApiView{

    public function __construct() {
        parent::__construct();
    }

    public function loginView(){
        $this->smarty->assign('titulo',"Bienvenidos");
        $this->smarty->display('templates/userLogin copy.tpl');
    }
    public function registerView(){
        $this->smarty->assign('titulo',"Bienvenidos");
        $this->smarty->display('templates/userRegister copy.tpl');
    }

}