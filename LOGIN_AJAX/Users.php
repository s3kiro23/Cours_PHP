<?php

class User {

    private $login;
    private $password;
    private $prenom;
    private $nom;

    public function __construct($login, $password, $prenom, $nom){
        
        $this->login = $login;
        $this->password = $password;
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
		$this->password = $password;
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

    public function setPassword(){

        password_hash($password, PASSWORD_BCRYPT);

    }

}