<?php

abstract class Modelo
{
    private $db;
    private $query;
    private $tabla;

    public abstract function create();
    public abstract function get();
    public abstract function update();
    public abstract function delete();
    
}
