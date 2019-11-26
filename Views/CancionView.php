<?php
require_once("View.php");

class CancionView extends View{
  
    public function showIndex(){

        $this->smarty->display('templates/allCanciones.tpl');
    }


    public function create()
    {

        $this->smarty->display('templates/CancionCreate.tpl');
    }
    public function edit($cancion)
    {

        $this->smarty->display('templates/CancionEdit.tpl');
    }
}