<?php

require_once("View.php");
class ArtistaView extends View{


    public function showIndex($artistas){

        $this->smarty->assign('artistas',$artistas);
        $this->smarty->display('templates/allArtistas.tpl');
    }

}
