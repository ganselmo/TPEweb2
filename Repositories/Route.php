<?php

class Route
{

    private $url;

    function __construct($action)
    {
        
        $this->url = $action;
        $this->direct();

    }

    private function direct()
    {
        $json = file_get_contents ("Repositories/RouteMap.json");
        $json = json_decode($json);
        
        

    }



   

   
}