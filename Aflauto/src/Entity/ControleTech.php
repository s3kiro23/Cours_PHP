<?php

/*require_once '../Controller/shared.php';*/
require_once 'Database.php';

$db = new Database();
$GLOBALS['Database'] = $db->connexion();

class ControleTech
{
    private $id_controle;
    private $id_tech;
    private $id_user;
    private $id_vehicule;
    private $id_time_slot;
    private $booked_date;
    private $state;

    public function __construct($id)
    {
        $this->id_controle = $id;
        if($this->id_controle != 0){
            $this->checkData($id);
        }
    }

    public function checkData($id){
        $requete = "SELECT * FROM `controle_tech` WHERE `id_controle` = '".mysqli_real_escape_string($GLOBALS['Database'],$id) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        if ($data = mysqli_fetch_array($result)){
            $this->id_tech = $data['id_tech'];
            $this->id_user = $data['id_user'];
            $this->id_vehicule = $data['id_vehicule'];
            $this->id_time_slot = $data['id_time_slot'];
            $this->booked_date = $data['booked_date'];
            $this->state = $data['state'];
        }
    }

    static public function newCT($id_time_slot, $id_vehicule, $state)
    {

        $requete = "INSERT INTO `controle_tech` (`id_time_slot`, `id_vehicule`, `state`) VALUES ('". mysqli_real_escape_string($GLOBALS['Database'],$id_time_slot) ."','". mysqli_real_escape_string($GLOBALS['Database'],$id_vehicule)."','". mysqli_real_escape_string($GLOBALS['Database'],$state)."')";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;

        return $GLOBALS['Database']->insert_id;

    }

    static public function generateSlotAvailable($currentDate)
    {
        $tab_available = [];
        $timeSettings = Settings::timeSetting();

        for ($e = strtotime($currentDate) + $timeSettings['start_time_am']; $e <= strtotime($currentDate) + $timeSettings['end_time_pm']; $e = $e + $timeSettings['slot_interval']) {
            $tab_available[] = $e;
        }

/*        for ($i = strtotime($currentDate) + $timeSettings['start_time_pm']; $i <= strtotime($currentDate) + $timeSettings['end_time_pm']; $i = $i + $timeSettings['slot_interval']) {
            $tab_available[] = $i;
        }*/

        return $tab_available;
    }

    static public function generateSlotUpdate($updateDate)
    {
        $tab_available = [];
        $timeSettings = Settings::timeSetting();

        for ($a = $updateDate + $timeSettings['start_time_am']; $a <= $updateDate + $timeSettings['end_time_pm']; $a = $a + $timeSettings['slot_interval']) {
            $tab_available[] = $a;
        }

/*        for ($u = $updateDate + $timeSettings['start_time_pm']; $u <= $updateDate + $timeSettings['end_time_pm']; $u = $u + $timeSettings['slot_interval']) {
            $tab_available[] = $u;
        }*/

        return $tab_available;
    }

    static public function checkTimeSlotReserved($date)
    {

        $timeSlotCheck = false;

        $requete = "SELECT * FROM `controle_tech`  WHERE `id_time_slot` BETWEEN $date + 28800 AND $date + 64800 ";
        error_log($requete);
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        while ($data = mysqli_fetch_assoc($result)) {
            $timeSlotCheck[] = $data;
        }
        error_log(json_encode($timeSlotCheck));

        return $timeSlotCheck;
    }

    public function getId_controle(){
        return $this->id_controle;
    }

    public function setId_controle($id_controle){
        $this->id_controle = $id_controle;
    }

    public function getId_tech(){
        return $this->id_tech;
    }

    public function setId_tech($id_tech){
        $this->id_tech = $id_tech;
    }

    public function getId_user(){
        return $this->id_user;
    }

    public function setId_user($id_user){
        $this->id_user = $id_user;
    }

    public function getId_vehicule(){
        return $this->id_vehicule;
    }

    public function setId_vehicule($id_vehicule){
        $this->id_vehicule = $id_vehicule;
    }

    public function getId_time_slot(){
        return $this->id_time_slot;
    }

    public function setId_time_slot($id_time_slot){
        $this->id_time_slot = $id_time_slot;
    }

    public function getBooked_date(){
        return $this->booked_date;
    }

    public function setBooked_date($booked_date){
        $this->booked_date = $booked_date;
    }

    public function getState(){
        return $this->state;
    }

    public function setState($state){
        $this->state = $state;
    }

}

