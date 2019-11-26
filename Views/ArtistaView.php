<?php

require_once("View.php");
class ArtistaView extends View{


    public function showIndex(){

        $this->smarty->display('templates/allArtistas.tpl');
        $this->set_url("Artistas/Get");
    }
    public function showOne(){
        $this->smarty->display('templates/Artista.tpl');
    }

    public function create()
    {
        
        $this->smarty->display('templates/ArtistaCreate.tpl');
    }
    public function edit()
    {
        $this->smarty->display('templates/ArtistaEdit.tpl');
    }
    



}
