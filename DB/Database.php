<?php

class Database {
    private $connection;
    private static $instance;

    private function __construct() {
        $this->connection = new PDO('mysql:host=localhost;dbname=db_cancionero_v2;charset=utf8', 'root', '');
    }

    public static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}