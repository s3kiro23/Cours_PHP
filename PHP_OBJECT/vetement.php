<?php

class Vetement extends Produit{

    public function __toString(){

        return "Le vêtement ".$this->getDescription()." ".$this->getRef()." coûte ".$this->getPrix()." €, quantité = ".$this->getQuantite().".<br>";
    }


}