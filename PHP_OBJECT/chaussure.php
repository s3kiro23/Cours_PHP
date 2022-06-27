<?php

class Chaussure extends Produit{

    private $pointure;

    public function __construct($ref, $description, $prix, $quantite, $pointure)
    {
        $this->ref = $ref;
        $this->description = $description;
        $this->prix = $prix;
        $this->quantite = $quantite;
        $this->pointure = $pointure;
    }

    public function getPointure(){
		return $this->pointure;
	}

	public function setPointure($pointure){
		$this->pointure = $pointure;
	}

    public function __toString()
    {
        return "Les chaussures ".$this->getDescription()." ".$this->getRef()." en pointure ".$this->getPointure()." coûte ".$this->getPrix()." €, quantité = ".$this->getQuantite().". <br>";
    }

}