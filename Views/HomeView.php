<?php
require_once("View.php");

class HomeView extends View{


    public function showIndex(){
        //header("Location: " . BASE);
        $this->smarty->display('templates/home.tpl');
    }

}