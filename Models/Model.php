<?php
require_once("Repositories/SQLQuery.php");

class Model {

    private $idName = 'id';
    private $sqlQuery;
    function __construct()
    {
        $this->sqlQuery = new SQLQuery();
    }

    function all()
    {
        return $this->sqlQuery->all($this->tabla);

    }

    function findById($id)
    {
        return $this->sqlQuery->findById($this->tabla,$this->idName,$id);
    }

    function findByColumn($column,$parameter)
    {
        return $this->sqlQuery->findByColumn($this->tabla,$column,$parameter);
    }




}