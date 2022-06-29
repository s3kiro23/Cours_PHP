<?php

class User {

    private $login;
    private $password;
    private $prenom;
    private $nom;

    public function __construct($login, $password, $prenom, $nom){
        
        $this->login = $login;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->prenom = $prenom;
        $this->nom = $nom;

    }

    public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = password_hash($password, PASSWORD_BCRYPT);
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}

	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom = $nom;
	}

	public function create(){

        try {

            $dbco = new PDO("mysql:host=localhost;dbname=user_aflokkat", 'root', '');
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $dbco->beginTransaction();

                    // $sql = "CREATE DATABASE user_aflokkat";



                    // $sql = "CREATE TABLE user (
                    // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    // login VARCHAR(30) NOT NULL ,
                    // nom VARCHAR(30) NOT NULL,
                    // prenom VARCHAR(30) NOT NULL,
                    // password VARCHAR(150) NOT NULL
                    // )";

            $preparedSql = $dbco->prepare('INSERT INTO user (`login`, `nom`, `prenom`, `password`)
                VALUES (:login, :nom, :prenom, :password)');

            $preparedSql->execute(array(
                'login' => $this->login,
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'password' => $this->password
            ));
            // $dbco->exec($sql);

            $dbco->commit();

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }
	}

    static public function checkUser(){
        
    }

}