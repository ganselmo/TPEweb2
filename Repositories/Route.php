<?php

require_once 'Controllers/Controller.php';
class Route
{

    private $url;
    private $method;
    private $params;

    function __construct()
    {
        $this->seeSession();
        $this->method = $_SERVER['REQUEST_METHOD'];

        $sanitizedURL = explode('?', $_GET['action']);
        $this->url = $sanitizedURL[0];
        if (isset($sanitizedURL[1])) {
            $this->params = $sanitizedURL[1];
        }
        $this->direct();
    }
    private function seeSession()
    { 

    }
    private function direct()
    {
        $json = $this->retriveRoutesJSON();
        $route = $this->findMatch($json);
        if ($route == 'No Route') {       
            
        } else {
            
            $controller = new $route->controller();
            call_user_func($route->function);    
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

            if ($this->urlMatches($route->point) && $this->methodMatches($route->method)) {
                return $route;
            }
        }
        return "No Route";
    }

    private function urlMatches($url)
    {
        if ($this->url == $url) {
            return true;
        } else {
            return false;
        }
    }
    private function methodMatches($method)
    {
        if ($this->method == $method) {
            return true;
        } else {
            return false;
        }
    }
}
