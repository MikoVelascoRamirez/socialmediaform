<?php

class Dbh{

    private $HOST = "containers-us-west-193.railway.app";
    private $USER = "postgres";
    private $PWD = "NCYMARKQYN1s7iaNy0XI";
    private $DBNAME = "railway";

    protected function connect(){

        try{
            $dsn  = "pgsql:host={$this->HOST};port=6518;dbname={$this->DBNAME}";
            $pdo = new PDO($dsn, $this->USER, $this->PWD);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
            return $pdo;
        }catch(PDOException $pdo){
            echo $pdo->getMessage();
            die();
        }
    }
}