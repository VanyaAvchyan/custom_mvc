<?php
namespace app\models;

abstract class Model {
    private $dbh = null;
    public function __construct() {
        $config = getCongig();
        try {
            $this->dbh = new \PDO('mysql:host='.$config['DB_HOST'].';dbname='.$config['DB_NAME'],$config['DB_USERNAME'],$config['DB_PASSWORD']); 
        } 
        catch (PDOException $exc) {
            dd($exc->getMessage());
        }
    }
    
    public function getCurrentConn()
    {
        return $this->dbh;
    }

        public function __destruct() {
        $this->dbh = NULL;
    }
}