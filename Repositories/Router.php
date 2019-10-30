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

        if ($this->url[0] == "") {
            Route::directDefault();
        } else {

            $count = count($this->url);



            foreach ($this->JsonRoutes as $jsonRoute) {


                if ($jsonRoute->getHttpMethod() == $this->httpMethod) {


                    $matches = 0;
                    $UrlArray = explode("/", $jsonRoute->getURL());


                    

                    if ($count == count($UrlArray)) {

                        $contador = 0;
                        foreach ($this->url as $key => $actualURL) {
                            // echo $contador." ".$UrlArray[$key];
                            // echo "<br>";
                            // echo $contador." ".$this->url[$key];
                            // echo "<hr>";
                     
             
                            if ($actualURL == $UrlArray[$key]) {
                                $contador++;
                            }

                            elseif(count(explode("[",$jsonRoute->getURL()))>1)
                            {
                                $parameter = trim(explode("[",$jsonRoute->getURL())[1],']');
                                $value = $this->url[$key];
                                $parameters = [$parameter=>$value];
                                $contador++;
                            }

                        }
                        
                   
                        if ($contador == $count) {

                            if(isset($parameters))
                            {

                                $route = new Route($jsonRoute->getURL(), $jsonRoute->getHTTPMethod(), $jsonRoute->getController(), 
                                $jsonRoute->getControllerMethod(),  $parameters[$parameter] );
                                $route->direct();
                               
                            }
                            else{
                                $route = new Route($jsonRoute->getURL(), $jsonRoute->getHTTPMethod(), $jsonRoute->getController(), 
                                $jsonRoute->getControllerMethod(), false );
                                $route->direct();
                                
                            }
                           
                            die;
                        } 
                    }
                }

              
            }
            Route::directDefault();
        }
    }
}
