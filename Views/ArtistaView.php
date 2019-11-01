<?php

require_once("View.php");
class ArtistaView extends View{


    public function showIndex($artistas){

        $this->smarty->assign('artistas',$artistas);
        $this->smarty->display('templates/allArtistas.tpl');
    }

    public function create()
    {
        $this->smarty->display('templates/ArtistaCreate.tpl');
    }
    public function edit($artista)
    {
        $this->smarty->assign('artista',$artista);
        $this->smarty->display('templates/ArtistaEdit.tpl');
    }
    



}
