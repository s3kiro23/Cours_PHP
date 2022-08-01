<?php
/*require_once '../Controller/shared.php';*/
require_once 'Database.php';

$db = new Database();
$GLOBALS['Database'] = $db->connexion();

class Settings
{
    static public function timeSetting()
    {

        $requete = "SELECT * FROM `settings`";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;

        return mysqli_fetch_assoc($result);
    }

}