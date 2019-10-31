<?php
require_once 'API\ApiControllers\CancionApiController.php';
require_once 'API\ApiControllers\ArtistaApiController.php';
require_once 'API\ApiControllers\HomeApiController.php';

$action = $_GET["action"];
define("BASE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("BASE_CANCION", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/API/cancion');
define("BASE_ARTISTA", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/API/Artistas');

if($action == ''){
    $homeController = new HomeApiController();
    $homeController->index();
}else{
    $partesURL = explode("/", $action);
    if($partesURL[0] == "cancion") {
        $cancionController = new CancionApiController();
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
    } elseif ($partesURL[0] == "Artistas") {
        $artistaController = new ArtistaApiController();
        if((count($partesURL) > 1) && ($partesURL[1] != "")) {
            if($partesURL[1] == "create") {
                $artistaController->add();
            } elseif($partesURL[1] == "delete") {
                $artistaController->delete();
            } elseif($partesURL[1] == "Edit") {
                $artistaController->update();
            }
        } else {
            $artistaController->index();
        }
    }
}