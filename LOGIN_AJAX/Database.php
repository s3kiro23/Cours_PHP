<?php

class Database {

    private $dbco;

    public function __construct()
    {

        try {

            $this->dbco = new PDO("mysql:host=localhost;dbname=user_aflokkat", 'root', '');
            $this->dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Erreur : ".$e->getMessage();
        }
    }

    public function checkDb()
    {
        return $this->dbco;
    }

}