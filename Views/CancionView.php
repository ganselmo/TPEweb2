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
    public function edit()
    {
        $this->smarty->display('templates/CancionEdit.tpl');
    }
    public function show()
    {
       
        $this->smarty->display('templates/CancionShow.tpl');
    }
}