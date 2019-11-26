<?php
require_once("View.php");

class UserView extends View{
    public function loginView(){
        $this->smarty->display('templates/userLogin.tpl');  
    }
    public function registerView(){
        $this->smarty->display('templates/userRegister.tpl');
    }

}