<?php

require_once 'Controllers/Controller.php';
require_once 'Repositories/Route.php';
class Router
{
    private $JsonRoutes = [];
    private $url;
    private $httpMethod;
    function __construct()
    {
        $this->httpMethod = $_SERVER['REQUEST_METHOD'];
        $this->url = $this->parseURL($_GET['action']);
        $this->params = $_POST;
        $this->JsonRoutes = $this->extractRoutes();

        $this->findMatch();
    }

    private function parseURL($url)
    {
        $parsedURL = explode("/", $url);

        return $parsedURL;
    }
    private function extractRoutes()
    {
        $routes = $this->retriveRoutesJSON();
        $completeRoutes = [];
        foreach ($routes->routes as $route) {
            if (!isset($route->parameters)) {
                $newRoute = new Route($route->url, $route->httpMethod, $route->controller, $route->controllerMethod, false);
            } else {
                $newRoute = new Route($route->url, $route->httpMethod, $route->controller, $route->controllerMethod, $route->parameters);
            }
            array_push($completeRoutes, $newRoute);
        }
        return $completeRoutes;
    }

    private function retriveRoutesJSON()
    {
        $json = file_get_contents("Repositories/RouteMap.json");
        return json_decode($json);
    }

    private function findMatch()
    {

        foreach ($this->JsonRoutes as $jsonRoute) {

            
            $route = new Route("","GET","HomeController","index",false);
            $route->direct();
            
            
            if ($jsonRoute->getHTTPMethod() == $this->httpMethod) {

                $routeURLarray = explode("/", $jsonRoute->getURL());
                if ($routeURLarray = null) { 

                    
                } 
                else {
                    $quantity = $routeURLarray->count;
                }
                $actualQuantity = 0;


                foreach ($routeURLarray as $key => $part) {
                    if ($part == $this->url[$key]) {
                        $actualQuantity++;
                    } else {

                        if (strpos("[", $part)) {
                            trim($part, ["[", "]"]);
                            $jsonRoute->params = [$part, $this->url[$key]];
                            $actualQuantity++;
                        }
                    }
                }
                if ($actualQuantity == $quantity) {
                    $jsonRoute->direct();
                }
            }
        }
    }
}
