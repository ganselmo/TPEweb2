<?php
require_once("View.php");

class UserView extends View{
    public function loginView(){
        //header("Location: " . BASE);


        $this->smarty->display('templates/userLogin.tpl');  

    }
    public function registerView(){
        set_url();

        
        $this->smarty->display('templates/userRegister.tpl');
    }

}