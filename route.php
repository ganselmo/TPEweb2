<?php
require_once 'Controllers\CancionController.php';
require_once 'Controllers\ArtistaController.php';

$action = $_GET["action"];
define("BASE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$cancion = new CancionController();
$artista = new ArtistaController();

if($action == ''){
    echo "Página en contrucción";
}else{
    $partesURL = explode("/", $action);
    if($partesURL[0] == "cancion") {
        if((count($partesURL) > 1) && ($partesURL[1] != "") && ($partesURL[2] != "")) {
            if($partesURL[2] == "add") {
                $cancion->add();
            } elseif($partesURL[2] == "delete") {
                $cancion->delete();
            } elseif($partesURL[2] == "update") {
                $cancion->update();
            } elseif($partesURL[2] == "findId") {
                $cancion->findById($partesURL[1]);
            } elseif($partesURL[2] == "findColumn") {
                $cancion->findByColumn($partesURL[3],$partesURL[1]);
            }
        } else {
            $cancion->get();
        }
    } elseif ($partesURL[0] == "artista") {
        if((count($partesURL) > 1) && ($partesURL[1] != "") && ($partesURL[2] != "")) {
            if($partesURL[2] == "add") {
                $artista->add();
            } elseif($partesURL[2] == "delete") {
                $artista->delete();
            } elseif($partesURL[2] == "update") {
                $artista->update();
            }
        } else {
            $artista->get();
        }
    }
}