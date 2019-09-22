<?php

class Controller 
{
    private $model;
    private $view;

    function __construct() {
        
    }
    
    abstract function add();

    abstract function delete();

    abstract function update();

    abstract function get();
}