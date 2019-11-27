<?php
require_once("Models/RoleModel.php");

class RoleController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new RoleModel();
    }

    public function validateRole($type,$method,$url)
    {
        $role = $this->model->get($this->session->getRole());
        if(!isset($role[0]->id))
        $role->id = 1;
        
       
        if(count($this->model->validateAccess($role[0]->id,$type,$method,$url))>0)
        {
            return true;
        }
        else{
            return false;
        }
        

       


    }


}
