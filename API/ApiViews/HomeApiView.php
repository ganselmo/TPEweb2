<?php
require_once("ApiView.php");

class HomeApiView extends ApiView{


    public function showIndex(){
        $this->smarty->display('templates/home copy.tpl');
    }

}