<?php
//Example of a singleton
class Db {
    private static $_instance = null; // the single instance
    private $_connection; // connection to db

    private function __construct() {
        // create connection, when obj is created
        try {
            $this->_connection = new PDO("mysql:host=localhost:3307; dbname=blog", "root", "124468");
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    private function __clone(){}

    private function __wakeup(){}

    public static function getInstance() {
        if(self::$_instance === null) {
            // if no object then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getConnection() {
        return $this->_connection;
    }
}