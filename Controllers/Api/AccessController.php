<?php

require_once("Models/AccessModel.php");
class AccessController extends ApiController
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new AccessModel();
    }
    function all()
    {

        $access = $this->model->allForRole($this->session->getRole());
        $this->json->response($access,200);
    }
}