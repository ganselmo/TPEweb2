<?php
require_once("View.php");

class HomeView extends View{


    public function showIndex(){

        $this->smarty->display('templates/home.tpl');
    }

}