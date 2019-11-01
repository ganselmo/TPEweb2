<?php
require_once("Repositories/SQLQuery.php");

class Model {

    private $idName = 'id';
    protected $sqlQuery;
    function __construct()
    {
        $this->sqlQuery = new SQLQuery();
    }


    function all()
    {
        return $this->sqlQuery->all($this->tabla);
    }

    function save($parameters)
    {
        return $this->sqlQuery->save($this->tabla,$parameters);
    }

    function findById($id)
    {
        return $this->sqlQuery->findById($this->tabla,$this->idName,$id);
    }

    

    function findByColumn($column,$parameter)
    {
        return $this->sqlQuery->findByColumn($this->tabla,$column,$parameter);
    }

    function nextNumber()
    {
        return $this->sqlQuery->maxNumber($this->tabla,$this->idName);
    }




}