<?php

require_once 'Controllers/Controller.php';
class Route
{

    private $url;
    private $method;

    function __construct()
    {

        
        $this->url = explode('/',$_GET['action']);
        var_dump($this->url);
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->seeSession();
        $this->direct();
       
    }
    private function seeSession()
    {

    }
    private function direct()
    {

        $json = $this->retriveRoutesJSON();
        $this->findMatch($json);
        if($this->findMatch($json) == 'No Route')
        {
            
        }
        else{
            $route = $this->findMatch($json);
        }
        


    }

    private function retriveRoutesJSON()
    {
        $json = file_get_contents("Repositories/RouteMap.json");
        return json_decode($json);
    }

    private function findMatch($json)
    {


        foreach ($json->routes as $route) {

            if ($route->point == $this->url && $route->method == $this->method) {
                return $route;
            }
        }
        return "No Route";
       
    }
}
