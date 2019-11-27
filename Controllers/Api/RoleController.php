<?php
require_once("Models/RoleModel.php");

class RoleController extends ApiController
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
    public function show($id)
    {

        $role = $this->model->getById($id);
        $this->json->response($role, 200);
    }
    public function save($data)
    {
        $this->model->update($data);
        $this->json->responseStatus(200);
    }

    public function insert($data)
    {
        $this->model->create($data);
        $this->json->responseStatus(200);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        $this->json->responseStatus(200);
    }
}
