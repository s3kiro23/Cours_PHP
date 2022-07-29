<?php

require_once '../Controller/shared.php';
require_once 'Database.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

class Settings
{
    static public function timeSetting()
    {
        $timeSetting = false;

        try {
            $query = $GLOBALS['db']->prepare('SELECT * FROM `settings`');
            $query->execute();
            $timeSetting = $query->fetch(PDO::FETCH_ASSOC);
/*            error_log(json_encode($timeSetting));*/

        } catch (PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
        }
        return $timeSetting;
    }

}