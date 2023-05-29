<?php

class Dbh{

    private $HOST = "localhost";
    private $USER = "postgres";
    private $PWD = "passwd";
    private $DBNAME = "oopphplogin";

    protected function connect(){

        try{
            $dsn  = "pgsql:host={$this->HOST};port=5432;dbname={$this->DBNAME}";
            $pdo = new PDO($dsn, $this->USER, $this->PWD);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
            return $pdo;
        }catch(PDOException $pdo){
            echo $pdo->getMessage();
            die();
        }
    }
}