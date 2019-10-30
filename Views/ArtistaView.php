<?php

require_once("View.php");
class ArtistaView extends View{


    public function showIndex($artistas){

        $this->smarty->assign('artistas',$artistas);
        $this->smarty->display('templates/allArtistas.tpl');
    }

    public function showOne($artista){

        $this->smarty->assign('artista',$artista);
        $this->smarty->display('templates/Artista.tpl');
    }
}
