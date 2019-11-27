<?php

require_once 'Controllers/Api/ApiController.php';
require_once 'Repositories/ApiRoute.php';
class RouterApi
{
    private $JsonRoutes = [];
    private $url;
    private $httpMethod;
    private $params;
    function __construct()
    {
        $this->httpMethod = $_SERVER['REQUEST_METHOD'];
        $this->url = $this->parseURL($_GET['resource']);
        $this->params = file_get_contents("php://input"); 
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
                $newRoute = new ApiRoute($route->url, $route->httpMethod, $route->controller, $route->controllerMethod, false);
            } else {
                $newRoute = new ApiRoute($route->url, $route->httpMethod, $route->controller, $route->controllerMethod, $route->parameters);
            }
            array_push($completeRoutes, $newRoute);
        }
        return $completeRoutes;
    }

    private function retriveRoutesJSON()
    {
        $json = file_get_contents("Repositories/ApiRouteMap.json");
        return json_decode($json);
    }

    private function findMatch()
    {
            $count = count($this->url);


            foreach ($this->JsonRoutes as $jsonRoute) {
                if ($jsonRoute->getHttpMethod() == $this->httpMethod) {

                   
                    $UrlArray = explode("/", $jsonRoute->getURL());

                    if ($count == count($UrlArray)) {

                        $contador = 0;
                        foreach ($this->url as $key => $actualURL) {
                     
             
                            if ($actualURL == $UrlArray[$key]) {

                                $contador++;
     
                                
                            }

                            else
                
                            if(count(explode("[",$UrlArray[$key]))>1)
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
                                
                              
                                $route = new ApiRoute($jsonRoute->getURL(), $jsonRoute->getHTTPMethod(), $jsonRoute->getController(), 
                                $jsonRoute->getControllerMethod(),  $parameters[$parameter] );
                                
                                $route->direct();

                               
                            }
                            else{
                                $route = new ApiRoute($jsonRoute->getURL(), $jsonRoute->getHTTPMethod(), $jsonRoute->getController(), 
                                $jsonRoute->getControllerMethod(), json_decode(file_get_contents("php://input")));
                                $route->direct();
                                
                            }
                           
                            die;
                        } 
                    }
                }

              
            }
        (new ApiController())->notFound();
    
    }
    
}
