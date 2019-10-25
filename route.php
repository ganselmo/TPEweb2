<?php
require_once 'Controllers\CancionController.php';
require_once 'Controllers\ArtistaController.php';

$action = $_GET["action"];
define("BASE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("BASE_CANCION", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/cancion');

if($action == ''){
    echo "Página en contrucción";
}else{
    $partesURL = explode("/", $action);
    if($partesURL[0] == "cancion") {
        $cancionController = new CancionController();
        if((count($partesURL) > 1) && ($partesURL[1] != "")) {
            if($partesURL[1] == "create") {
                $cancionController->create();
            } elseif($partesURL[1] == "delete") {
                $cancionController->delete();
            } elseif($partesURL[1] == "update") {
                $cancionController->update();
            } elseif($partesURL[1] == "findId") {
                $cancionController->findById($partesURL[1]);
            } elseif($partesURL[1] == "findColumn") {
                $cancionController->findByColumn($partesURL[3],$partesURL[1]);
            }
        } else {
            $cancionController->get();
        }
    } elseif ($partesURL[0] == "artista") {
        $artistaController = new ArtistaController();
        if((count($partesURL) > 1) && ($partesURL[1] != "")) {
            if($partesURL[1] == "create") {
                $artistaController->add();
            } elseif($partesURL[1] == "delete") {
                $artistaController->delete();
            } elseif($partesURL[1] == "update") {
                $artistaController->update();
            }
        } else {
            $artistaController->get();
        }
    }
}