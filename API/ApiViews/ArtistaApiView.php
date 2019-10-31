<?php
require_once("ApiView.php");

class ArtistaApiView extends ApiView{


    public function showIndex($artistas){

        $this->smarty->assign('artistas',$artistas);
        $this->smarty->display('templates/allArtistas copy.tpl');
    }

    public function showOne($artista){

        $this->smarty->assign('artista',$artista);
        $this->smarty->display('templates/Artista.tpl');
    }

    public function displayUpdate($artista) {
        $smarty = new Smarty();
        $smarty->assign('titulo',"Artista a modificar");
        $smarty->assign('artista',$artista);
        $smarty->assign('BASE',BASE_ARTISTA);
        $smarty->display('templates/artistaAdmUpdate.tpl');
    }
}
