<?php


class Route
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

        
        if(!$parameters){
            if($this->httpMethod == "POST")
            $this->parameters = $_POST;

        }
        else{
            $this->parameters=$parameters;
        }
        
    }
  
    public function direct()
    {
        

        require_once("Controllers/".$this->controller.".php");
        require_once("Controllers/RoleController.php");
        
        if((new RoleController())->validateRole("SYNC",$this->httpMethod,$this->url))
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
            $this->directDefault();
        }
        

    }

    public static function directDefault()
    {
        require_once("Controllers/HomeController.php");

        (new HomeController())->index();

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
