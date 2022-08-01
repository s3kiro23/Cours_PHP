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

    public function __construct($id_controle)
    {
        $this->id_controle = 0;

        $GLOBALS['db']->beginTransaction();
        $query = $GLOBALS['db']->prepare('SELECT * FROM `controle_tech` WHERE id=?');
        $query->execute([$id_controle]);
        error_log('ObjectCMD');

        if ($ct = $query->fetch(PDO::FETCH_ASSOC)) {
            error_log('ObjectAlreadyExist');
            $this->id_controle = $ct['id'];
            $this->id_tech = $ct['expert_id'];
            $this->id_user = $ct['user_id'];
            $this->id_vehicule = $ct['time_slot_id'];
            $this->id_time_slot = $ct['time_slot_id'];
            $this->booked_date = $ct['booked_date'];
            $this->state = $ct['booked_date'];
        }
    }

    static public function newCT($expert_id, $user_id, $time_slot_id)
    {

        try {

            $GLOBALS['db']->beginTransaction();
            $query = $GLOBALS['db']->prepare('INSERT INTO control_tech (`expert_id`, `user_id`, `time_slot_id`)
                VALUES (:expert_id, :user_id, :time_slot_id)');

            $query->execute(array(
                'expert_id' => $expert_id,
                'user_id' => $user_id,
                'time_slot_id' => $time_slot_id,
            ));

            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
        }

        error_log($GLOBALS['db']->lastInsertId());
        return $GLOBALS['db']->lastInsertId();

    }

    static public function generateSlotAvailable($currentDate)
    {
        $tab_available = [];
        $timeSettings = Settings::timeSetting();

        for ($e = strtotime($currentDate) + $timeSettings['start_time_am']; $e <= strtotime($currentDate) + $timeSettings['end_time_am']; $e = $e + $timeSettings['slot_interval']) {
            $tab_available[] = $e;
        }

        for ($i = strtotime($currentDate) + $timeSettings['start_time_pm']; $i <= strtotime($currentDate) + $timeSettings['end_time_pm']; $i = $i + $timeSettings['slot_interval']) {
            $tab_available[] = $i;
        }

        return $tab_available;
    }

    static public function generateSlotUpdate($updateDate)
    {
        $tab_available = [];
        $timeSettings = Settings::timeSetting();

        for ($a = $updateDate + $timeSettings['start_time_am']; $a <= $updateDate + $timeSettings['end_time_am']; $a = $a + $timeSettings['slot_interval']) {
            $tab_available[] = $a;
        }

        for ($u = $updateDate + $timeSettings['start_time_pm']; $u <= $updateDate + $timeSettings['end_time_pm']; $u = $u + $timeSettings['slot_interval']) {
            $tab_available[] = $u;
        }

        return $tab_available;
    }

    static public function checkTimeSlotReserved($date)
    {

        $timeSlotCheck = false;

        /*try {
            $query = $GLOBALS['db']->prepare('SELECT time_slot_id FROM `rdv` WHERE time_slot_id BETWEEN :date + 28800 AND :date + 64800');
            $query->execute(array(
                'date' => $date,
            ));
            $timeSlotCheck = $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
        }*/

        $requete = "SELECT * FROM `controle_tech`  WHERE `id_time_slot` BETWEEN $date + 28800 AND $date + 64800 ";
        error_log($requete);
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        while ($data = mysqli_fetch_assoc($result)) {
            $timeSlotCheck[] = $data;
        }
        error_log(json_encode($timeSlotCheck));

        return $timeSlotCheck;
    }

}

