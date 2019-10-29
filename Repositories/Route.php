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

        if($parameters){
            $this->parameters = $parameters;
        }
    }
  
    public function direct()
    {
        require_once("Controllers/".$this->controller.".php");

        $controller=new $this->controller;
        $method  =$this->controllerMethod;
        $params = $this->parameters;
        if(isset($params))
        $controller->$method($params); 
        else
        $controller->$method();

    }

    public function directDefault()
    {

    }

    public function getURL()
    {
        return $this->url;
    }

    public function getHTTPMethod()
    {
        return $this->httpMethod;
    }

    

  
}
