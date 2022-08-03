<?php
require_once '../Controller/shared.php';
require_once '../Entity/Database.php';

$db = new Database();
$GLOBALS['Database'] = $db->connexion();

class User
{

    private $id_user;
    private $civilite_user;
    private $prenom_user;
    private $nom_user;
    private $email_user;
    private $telephone_user;
    private $adresse_user;
    private $password_user;
    private $type;
    private $pwdExp_user;
    private $created_date;

    public function __construct($id)
    {

        $this->id_user = $id;
        if ($this->id_user != 0) {
            $this->checkData($id);
        }

    }

    public function checkData($id)
    {
        $requete = "SELECT * FROM `clients` WHERE `id_user` = '" . mysqli_real_escape_string($GLOBALS['Database'], $id) . "'";
        error_log($requete);
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        if ($data = mysqli_fetch_assoc($result)) {
            $this->id_user = $data['id_user'];
            $this->civilite_user = $data['civilite_user'];
            $this->nom_user = $data['nom_user'];
            $this->prenom_user = $data['prenom_user'];
            $this->telephone_user = $data['telephone_user'];
            $this->email_user = $data['email_user'];
            $this->adresse_user = $data['adresse_user'];
            $this->password_user = password_hash($data['password_user'], PASSWORD_BCRYPT);
            $this->type = $data['type'];
            $this->pwdExp_user = $data['pwdExp_user'];
            $this->created_date = $data['created_date'];
        }
    }

    static public function create($civilite_user, $prenom_user, $nom_user, $email_user, $telephone_user, $password_user, $type, $pwdExp_user, $hash)
    {
        error_log('newUser1');
        $requete = "INSERT INTO `clients` (`civilite_user`, `prenom_user`, `nom_user`, `email_user`, `telephone_user`, 
                     `password_user`, `type`, `pwdExp_user`, `hash`) 
                    VALUES ('" . mysqli_real_escape_string($GLOBALS['Database'], $civilite_user) . "','" . mysqli_real_escape_string($GLOBALS['Database'], $prenom_user) . "',
                    '" . mysqli_real_escape_string($GLOBALS['Database'], $nom_user) . "','" . mysqli_real_escape_string($GLOBALS['Database'], $email_user) . "',
                    '" . mysqli_real_escape_string($GLOBALS['Database'], $telephone_user) . "','" . mysqli_real_escape_string($GLOBALS['Database'], password_hash($password_user, PASSWORD_BCRYPT)) . "',
                    '" . mysqli_real_escape_string($GLOBALS['Database'], $type) . "','" . mysqli_real_escape_string($GLOBALS['Database'], $pwdExp_user) . "',
                    '" . mysqli_real_escape_string($GLOBALS['Database'], $hash) . "')";
        error_log($requete);
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;

        return $GLOBALS['Database']->insert_id;

    }

    static public function random_hash()
    {

        $longueur = 30;
        $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!%@$#?';
        $chaine = '';
        $max = mb_strlen($listeCar, '8bit') - 1;
        for ($i = 0; $i < $longueur; ++$i) {
            $chaine .= $listeCar[random_int(0, $max)];
        }
        return $chaine;
    }

    public function update()
    {

        $requete = "UPDATE `clients` SET `nom_user`='" . mysqli_real_escape_string($GLOBALS['Database'], $this->nom_user) . "', `prenom_user`='" . mysqli_real_escape_string($GLOBALS['Database'], $this->prenom_user) . "',
        `email_user`='" . mysqli_real_escape_string($GLOBALS['Database'], $this->email_user) . "', `telephone_user`='" . mysqli_real_escape_string($GLOBALS['Database'], $this->telephone_user) . "',
        `adresse_user`='" . mysqli_real_escape_string($GLOBALS['Database'], $this->adresse_user) . "'
        WHERE `id_user` ='" . mysqli_real_escape_string($GLOBALS['Database'], $this->id_user) . "'";
        /*        error_log($requete);*/
        mysqli_query($GLOBALS['Database'], $requete) or die;

    }

    public function checkUploadedFiles()
    {
        $filesChecked = [];

        $requete = "SELECT * FROM `upload` WHERE `id_user` = '" . mysqli_real_escape_string($GLOBALS['Database'], $this->id_user) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        if ($data = mysqli_fetch_assoc($result)) {
            $filesChecked[] = $data;
        }
        return $filesChecked;
    }

    public function delete($ID)
    {
        error_log('deleteFct');
        $GLOBALS['db']->beginTransaction();
        $query = $GLOBALS['db']->prepare('DELETE FROM `user` WHERE id=:id');
        $query->bindValue(':id', $ID);
        $query->execute();
        $GLOBALS['db']->commit();

    }

    static public function checkUser($mail)
    {
        $userCheck = false;

        $requete = "SELECT * FROM `clients` WHERE `email_user` = '" . mysqli_real_escape_string($GLOBALS['Database'], $mail) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        if ($data = mysqli_fetch_assoc($result)) {
            $userCheck[] = $data;
        }

        return $userCheck;

    }

    static public function checkCars($id_user)
    {

        $tab_cars = [];

        $requete = "SELECT * FROM `vehicules` 
                    INNER JOIN `marques` ON `vehicules`.`id_marque` = `marques`.`id_marque`  
                    INNER JOIN `modeles` ON `vehicules`.`id_modele` = `modeles`.`id_modele`
                    WHERE `id_user` = '" . mysqli_real_escape_string($GLOBALS['Database'], $id_user) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        while ($data = mysqli_fetch_assoc($result)) {
            $tab_cars[] = $data;
        }
        return $tab_cars;
    }

    static public function checkRdv($id_user)
    {

        $tab_rdv = [];

        $requete = "SELECT * FROM `controle_tech` 
                    INNER JOIN `vehicules` ON `controle_tech`.`id_vehicule` = `vehicules`.`id_vehicule`
                    INNER JOIN `marques` ON `vehicules`.`id_marque` = `marques`.`id_marque`  
                    INNER JOIN `modeles` ON `vehicules`.`id_modele` = `modeles`.`id_modele`
                    WHERE `controle_tech`.`id_user` = '" . mysqli_real_escape_string($GLOBALS['Database'], $id_user) . "' AND `state` != '" . mysqli_real_escape_string($GLOBALS['Database'], 3) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        while ($data = mysqli_fetch_assoc($result)) {
            $tab_rdv[] = $data;
        }
        return $tab_rdv;
    }

    static public function checkHistory($id_user)
    {

        $tab_history = [];

        $requete = "SELECT * FROM `controle_tech` 
                    INNER JOIN `vehicules` ON `controle_tech`.`id_vehicule` = `vehicules`.`id_vehicule`
                    INNER JOIN `marques` ON `vehicules`.`id_marque` = `marques`.`id_marque`  
                    INNER JOIN `modeles` ON `vehicules`.`id_modele` = `modeles`.`id_modele`
                    WHERE `controle_tech`.`id_user` = '" . mysqli_real_escape_string($GLOBALS['Database'], $id_user) . "' AND `state` = '" . mysqli_real_escape_string($GLOBALS['Database'], 3) . "'";
        error_log($requete);
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        while ($data = mysqli_fetch_assoc($result)) {
            $tab_history[] = $data;
        }
        return $tab_history;
    }


    static public function sms($id_user)
    {

        $code = random_int(1000, 10000);

        $requete = "INSERT INTO `sms` (`id_user`, `code`) 
                    VALUES ('" . mysqli_real_escape_string($GLOBALS['Database'], $id_user) . "',
                    '" . mysqli_real_escape_string($GLOBALS['Database'], $code) . "')";
        error_log($requete);
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;

    }

    static public function checkSmsCode($id_user, $input)
    {
        $smsCheck = false;

        $requete = "SELECT * FROM `sms` WHERE `id_user` = '" . mysqli_real_escape_string($GLOBALS['Database'], $id_user) . "' 
                    AND `code` = '" . mysqli_real_escape_string($GLOBALS['Database'], $input) . "' 
                    AND `state` = 0";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        if ($data = mysqli_fetch_assoc($result)) {
            $smsCheck = $data;
        }
        return $smsCheck;
    }

    static public function updateSMS($id_user)
    {

        $requete = "UPDATE `sms` SET `state`='" . mysqli_real_escape_string($GLOBALS['Database'], 1) . "' WHERE `id_user` ='" . mysqli_real_escape_string($GLOBALS['Database'], $id_user) . "'";
        mysqli_query($GLOBALS['Database'], $requete) or die;

    }

    static public function request($user_id)
    {

        $hash = random_hash();

        $query = $GLOBALS['db']->prepare('INSERT INTO request (`user_id`, `hash`)
                VALUES (:user_id, :hash)');

        $query->execute(array(
            'user_id' => $user_id,
            'hash' => $hash,
        ));

        $GLOBALS['db']->commit();

        return $hash;

    }

    static public function checkRequest($hash)
    {
        $requestCheck = false;

        try {
            $query = $GLOBALS['db']->prepare('SELECT * FROM `request` WHERE hash=? AND state="0"');
            $query->execute([$hash]);
            $requestCheck = $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            /*            $msg = "Erreur : ".$e->getMessage();*/
        }
        return $requestCheck;

    }

    static public function updateRequest($user_id)
    {
        try {
            $query = $GLOBALS['db']->prepare('UPDATE `request` SET state=:state WHERE user_id=:user_id');
            $query->bindValue(':state', 1);
            $query->bindValue(':user_id', $user_id);
            /*            $query->bindValue(':hash', $hash);*/
            $query->execute();
            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }

    }

    public function getId_user()
    {
        return $this->id_user;
    }

    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
    }

    public function getCivilite_user()
    {
        return $this->civilite_user;
    }

    public function setCivilite_user($civilite_user)
    {
        $this->civilite_user = $civilite_user;
    }

    public function getPrenom_user()
    {
        return $this->prenom_user;
    }

    public function setPrenom_user($prenom_user)
    {
        $this->prenom_user = $prenom_user;
    }

    public function getNom_user()
    {
        return $this->nom_user;
    }

    public function setNom_user($nom_user)
    {
        $this->nom_user = $nom_user;
    }

    public function getEmail_user()
    {
        return $this->email_user;
    }

    public function setEmail_user($email_user)
    {
        $this->email_user = $email_user;
    }

    public function getTelephone_user()
    {
        return $this->telephone_user;
    }

    public function setTelephone_user($telephone_user)
    {
        $this->telephone_user = $telephone_user;
    }

    public function getAdresse_user()
    {
        return $this->adresse_user;
    }

    public function setAdresse_user($adresse_user)
    {
        $this->adresse_user = $adresse_user;
    }

    public function getPassword_user()
    {
        return $this->password_user;
    }

    public function setPassword_user($password_user)
    {
        $this->password_user = password_hash($password_user, PASSWORD_BCRYPT);

    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getPwdExp_user()
    {
        return $this->pwdExp_user;
    }

    public function setPwdExp_user($pwdExp_user)
    {
        $this->pwdExp_user = $pwdExp_user;
    }

    public function getCreated_date()
    {
        return $this->created_date;
    }

    public function setCreated_date($created_date)
    {
        $this->created_date = $created_date;
    }


}