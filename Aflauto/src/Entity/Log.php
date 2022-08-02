<?php
require_once '../Controller/shared.php';
require_once '../Entity/Database.php';

$db = new Database();
$GLOBALS['db'] = $db->connexion();

class Log
{
    private $id_user;
    private $date;

    public function __construct($id_user)
    {
        $this->id_user = $id_user;
    }

    static public function create($id_user)
    {

        $requete = "INSERT INTO `error` (`id_user`) 
                    VALUES ('" . mysqli_real_escape_string($GLOBALS['Database'], $id_user) . "')";
        error_log($requete);
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;

        return $GLOBALS['Database']->insert_id;
    }

    static public function checkLog($id_user)
    {

        $result = mysqli_query($GLOBALS['Database'], "SELECT * FROM error WHERE id_user='" . mysqli_real_escape_string($GLOBALS['Database'], $id_user) . "'") or die;
        return mysqli_num_rows($result);

    }


}