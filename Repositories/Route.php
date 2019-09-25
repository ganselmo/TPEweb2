<?php

require_once 'Controllers/Controller.php';
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

        $json = $this->retriveRoutesJSON();
        var_dump($json);
        var_dump ($this->url);
        if(findMatch())
        {

        }
        else{
            
        }  

    }

    private function retriveRoutesJSON()
    {
        $json =file_get_contents ("Repositories/RouteMap.json");
        return json_decode($json);  
        
    }



   

   
}