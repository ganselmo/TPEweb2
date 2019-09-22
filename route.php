<?php
require_once("Models/Artista.php");
require_once("Models/Cancion.php");



$test2 = new Cancion();
var_dump($test2->findByColumn('album','Nacional'));

