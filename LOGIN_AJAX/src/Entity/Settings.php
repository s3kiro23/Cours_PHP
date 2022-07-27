<?php

require_once '../Controller/shared.php';
require_once 'Database.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

class Settings
{

    static public function changeSlotAM () {


    }

    static public function changeSlotPM () {


    }

}