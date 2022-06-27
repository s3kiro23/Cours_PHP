<?php

abstract class Produit {

    protected $ref;
    protected $description; 
    protected $prix;
    protected $quantite;

    public function __construct($ref, $description, $prix, $quantite)
    {
        $this->ref = $ref;
        $this->description = $description;
        $this->prix = $prix;
        $this->quantite = $quantite;
    }

	public function getRef(){
		return $this->ref;
	}

	public function setRef($ref){
		$this->ref = $ref;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getPrix(){
		return $this->prix;
	}

	public function setPrix($prix){
		$this->prix = $prix;

        if ($this->prix < 0){

            throw new PrixException("<span style='color:blue'>Le prix de ".$this->getDescription()." ne peut être négatif !</span><br>");

        }
	}

	public function getQuantite(){
		return $this->quantite;
	}

	public function setQuantite($quantite){
		$this->quantite = $quantite;

        if ($this->quantite < 0){

            throw new QuantiteException("<span style='color:red'>La quantité de ".$this->getDescription()." ne peut être négative !</span><br>"); 

        }

	}

}