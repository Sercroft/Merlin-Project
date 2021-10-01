<?php

class Db{

    private $dbHost = 'localhost';
    private $dbUser = 'root';
    private $dbPass = '';
    private $dbName = 'mproject';
    private $dbPort = '3306';

    private $connection = null;

    public function getConnection(){

        try {

            if($this->connection == null){

                $arrOptions = array(
                    PDO::ATTR_EMULATE_PREPARES => FALSE,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
                );

                $dsn = 'mysql:dbname='.$this->dbName.';host='.$this->dbHost;

                $this->connection = new PDO($dsn, $this->dbUser, $this->dbPass, $arrOptions);
            }

            return $this->connection;
        } catch (PDOException $ex) {
            die($ex->getMessage() );
        }
    }
}