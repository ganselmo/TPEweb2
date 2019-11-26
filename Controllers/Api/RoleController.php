<?php
require_once("Models/Role.php");

class RoleController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Role();
    }

    
}
