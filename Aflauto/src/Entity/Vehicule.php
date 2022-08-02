<?php

require_once 'Database.php';

$db = new Database();
$GLOBALS['Database'] = $db->connexion();

class Vehicule
{
    private $id_vehicule;
    private $id_marque;
    private $id_modele;
    private $immat_vehicule;
    private $annee_vehicule;
    private $carburant_vehicule;
    private $infos_vehicule;

    public function __construct($id)
    {
        $this->id_vehicule = $id;
        if ($this->id_vehicule != 0) {
            $this->checkData($id);
        }
    }

    public function checkData($id)
    {
        $requete = "SELECT * FROM `vehicules` WHERE `id_vehicule` = '" . mysqli_real_escape_string($GLOBALS['Database'], $id) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        if ($data = mysqli_fetch_array($result)) {
            $this->id_marque = $data['id_marque'];
            $this->id_modele = $data['id_modele'];
            $this->immat_vehicule = $data['immat_vehicule'];
            $this->annee_vehicule = $data['annee_vehicule'];
            $this->carburant_vehicule = $data['carburant_vehicule'];
            $this->infos_vehicule = $data['infos_vehicule'];
        }
    }

    static public function newVehicule($id_marque, $id_modele, $immat_vehicule, $annee_vehicule, $carburant_vehicule)
    {

        $requete = "INSERT INTO `vehicules` (`id_marque`, `id_modele`, `immat_vehicule`, `annee_vehicule`, `carburant_vehicule`) 
                    VALUES ('" . mysqli_real_escape_string($GLOBALS['Database'], $id_marque) . "','" . mysqli_real_escape_string($GLOBALS['Database'], $id_modele) . "',
                    '" . mysqli_real_escape_string($GLOBALS['Database'], $immat_vehicule) . "','" . mysqli_real_escape_string($GLOBALS['Database'], $annee_vehicule) . "',
                    '" . mysqli_real_escape_string($GLOBALS['Database'], $carburant_vehicule) . "')";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;

        return $GLOBALS['Database']->insert_id;

    }

    static public function checkMarques()
    {
        $list_marque = [];
        $result = mysqli_query($GLOBALS['Database'], "SELECT * FROM marques") or die;

        while ($data = mysqli_fetch_array($result)) {
            $list_marque[] = $data;
        }
        return $list_marque;
    }

    static public function checkModeles($idMarque)
    {
        $list_modele = [];
        $requete = " SELECT * FROM modeles WHERE id_marque='" . mysqli_real_escape_string($GLOBALS['Database'], $idMarque) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        while ($data = mysqli_fetch_array($result)) {
            $list_modele[] = $data;
        }
        return $list_modele;
    }

    public function getId_vehicule()
    {
        return $this->id_vehicule;
    }

    public function setId_vehicule($id_vehicule)
    {
        $this->id_vehicule = $id_vehicule;
    }

    public function getId_marque()
    {
        return $this->id_marque;
    }

    public function setId_marque($id_marque)
    {
        $this->id_marque = $id_marque;
    }

    public function getId_modele()
    {
        return $this->id_modele;
    }

    public function setId_modele($id_modele)
    {
        $this->id_modele = $id_modele;
    }

    public function getImmat_vehicule()
    {
        return $this->immat_vehicule;
    }

    public function setImmat_vehicule($immat_vehicule)
    {
        $this->immat_vehicule = $immat_vehicule;
    }

    public function getAnnee_vehicule()
    {
        return $this->annee_vehicule;
    }

    public function setAnnee_vehicule($annee_vehicule)
    {
        $this->annee_vehicule = $annee_vehicule;
    }

    public function getCarburant_vehicule()
    {
        return $this->carburant_vehicule;
    }

    public function setCarburant_vehicule($carburant_vehicule)
    {
        $this->carburant_vehicule = $carburant_vehicule;
    }

    public function getInfos_vehicule()
    {
        return $this->infos_vehicule;
    }

    public function setInfos_vehicule($infos_vehicule)
    {
        $this->infos_vehicule = $infos_vehicule;
    }

}