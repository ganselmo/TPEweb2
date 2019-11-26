<?php
require_once '.\Repositories\Session.php';
require_once '.\Views\JsonResponse.php';

class ApiController 
{
    protected $model;
    protected $json;
    protected $session;
   
    public function __construct()
    {
        $this->session = new Session();
        $this->json = new JsonResponse();

    }

    public function notFound()
    {
        $this->json->responseStatus(404);
    }
    public function accessDenied()
    {
        $this->json->responseStatus(402);
    }
}