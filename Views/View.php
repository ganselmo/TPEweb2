<?php


class View 
{
    private $view;
    function __construct($ActualView)
    {
        $this->view = $ActualView;
    }
    public function returnView($models)
    {
        
        require_once("Views/Header.php");
        require_once("Views/".$this->view.".php");
        require_once("Views/Footer.php");

    }
}