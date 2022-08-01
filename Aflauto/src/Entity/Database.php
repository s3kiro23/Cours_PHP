<?php

class Database{

    private $db;

    public function __construct(){

        try{
            $this->db = mysqli_connect("localhost", "db", "Db123!@20", "aflauto");
        } catch (RuntimeException $e){

            error_log($e->getMessage());
            exit(0);
        }
    }

    public function connexion(){
        return $this->db;
    }

}