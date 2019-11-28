<?php
require_once("Models/RoleModel.php");

class RoleController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new RoleModel();
    }

    public function validateRole($type, $method, $url)
    {
        if (!is_null($this->session->getRole())) {
            $role = $this->model->getByID($this->session->getRole())->id;
 
        }
        else{
            $role = "1";
        }

        if (count($this->model->validateAccess($role, $type, $method, $url)) > 0) {
            return true;
        } else {
            return false;
        }
    }

   
}
