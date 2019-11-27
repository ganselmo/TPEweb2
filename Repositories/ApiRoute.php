<?php


class ApiRoute
{

    private $url;
    private $httpMethod;
    private $controllerMethod;
    private $controller;
    private $parameters= [];

    function __construct($url,$httpMethod,$controller,$controllerMethod,$parameters)
    {
        $this->url = $url;
        $this->httpMethod = $httpMethod;
        $this->controller = $controller;
        $this->controllerMethod = $controllerMethod;
        $this->parameters = $parameters; 
    }
  
    public function direct()
    {
        require_once("Controllers/Api/".$this->controller.".php");
        require_once("Controllers/Api/RoleController.php");
        
        if((new RoleController())->validateRole("API",$this->httpMethod,$this->url))
        {
            $controller= new $this->controller;
            $method  =$this->controllerMethod;
            $params = $this->parameters;
            if(isset($params))
            $controller->$method($params); 
            else
            $controller->$method();
        }
        else
        {
            (new ApiController())->accessDenied();
        }
        
        
        
        
       

    }

    public function getURL()
    {
        return $this->url;
    }

    public function getHTTPMethod()
    {
        return $this->httpMethod;
    }


    public function getController()
    {
        return $this->controller;
    }

    public function getControllerMethod()
    {
        return $this->controllerMethod;
    }


  
}
