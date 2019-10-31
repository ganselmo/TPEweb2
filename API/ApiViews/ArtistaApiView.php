<?php
require_once("ApiView.php");

class ArtistaApiView extends ApiView{


    public function showIndex($artistas){
        $this->smarty->assign('titulo',"Artistas");
        $this->smarty->assign('artistas',$artistas);
        $this->smarty->display('templates/allArtistas copy.tpl');
    }

    public function showOne($artista){
        $this->smarty->assign('titulo',"Artista");
        $this->smarty->assign('artista',$artista);
        $this->smarty->display('templates/Artista.tpl');
    }

    public function displayUpdate($artista) {
        $this->smarty->assign('titulo',"Artista a modificar");
        $this->smarty->assign('artista',$artista);
        $this->smarty->assign('BASE',BASE_ARTISTA);
        $this->smarty->display('templates/artistaAdmUpdate.tpl');
    }

    public function displayVisitante($artistas){
        $this->smarty->assign('titulo',"Artistas");
        $this->smarty->assign('artistas',$artistas);
        $this->smarty->display('templates/artistas.tpl');
    }
}
