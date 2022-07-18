<?php

require_once 'function.php';
require_once 'Database.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

class RDV
{
    private $id;
    private $expert_id;
    private $user_id;
    private $time_slot_id;
    private $booked_date;

    public function __construct($id)
    {
        $GLOBALS['db']->beginTransaction();
        $query = $GLOBALS['db']->prepare('SELECT * FROM `command` WHERE id=?');
        $query->execute([$id]);
        error_log('ObjectCMD');

        if ($rdv = $query->fetch(PDO::FETCH_ASSOC)) {
            error_log('ObjectAlreadyExist');
            $this->id = $rdv['id'];
            $this->expert_id = $rdv['expert_id'];
            $this->user_id = $rdv['user_id'];
            $this->time_slot_id = $rdv['time_slot_id'];
            $this->booked_date = $rdv['booked_date'];
        }
    }

    static public function createRdv($expert_id, $user_id, $time_slot_id)
    {

        try {

            $GLOBALS['db']->beginTransaction();
            $query = $GLOBALS['db']->prepare('INSERT INTO rdv (`expert_id`, `user_id`, `time_slot_id`)
                VALUES (:expert_id, :user_id, :time_slot_id)');

            $query->execute(array(
                'expert_id' => $expert_id,
                'user_id' => $user_id,
                'time_slot_id' => $time_slot_id,
            ));
            // $dbco->exec($sql);

            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
        }

        error_log($GLOBALS['db']->lastInsertId());
        return $GLOBALS['db']->lastInsertId();

    }

    static public function createSlotTime($hour)
    {

        try {

            $GLOBALS['db']->beginTransaction();
            $query = $GLOBALS['db']->prepare('INSERT INTO time_slot (`hour`)
                VALUES (:hour)');

            $query->execute(array(
                'hour' => $hour,
            ));
            // $dbco->exec($sql);

            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
        }

        error_log($GLOBALS['db']->lastInsertId());
        return $GLOBALS['db']->lastInsertId();

    }


    static public function rdvPerPages($off7)
    {
        $rdvPerPages = false;
        try {

            $query = $GLOBALS['db']->prepare('SELECT * FROM `rdv` ORDER BY id DESC LIMIT 10 OFFSET :off7');
            $query->bindValue(':off7', $off7, PDO::PARAM_INT);
            $query->execute();
            $rdvPerPages = $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Erreur : ".$e->getMessage());
        }
        return $rdvPerPages;

    }

    static public function checkCurrentRdv($id)
    {

        $rdvCheck = false;
        try {

            $query = $GLOBALS['db']->prepare('SELECT * FROM `rdv` WHERE id=?');
            $query->execute([($id)]);
            $rdvCheck = $query->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
        }
        return $rdvCheck;

    }

    static public function checkAllRdv()
    {

        $query = $GLOBALS['db']->prepare('SELECT count(*) AS nbRdv FROM `rdv`');
        $query->execute();
        $result = $query->fetch();

        return (int)$result['nbRdv'];

    }


    static public function checkTimeSlotReserved()
    {

        $timeSlotCheck = false;

        try {

            $query = $GLOBALS['db']->prepare('SELECT time_slot_id FROM `rdv`');
            $query->execute();
            $timeSlotCheck = $query->fetchAll(PDO::FETCH_NUM);

        } catch (PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
        }
        return $timeSlotCheck;

    }


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getExpert_id(){
        return $this->expert_id;
    }

    public function setExpert_id($expert_id){
        $this->expert_id = $expert_id;
    }

    public function getUser_id(){
        return $this->user_id;
    }

    public function setUser_id($user_id){
        $this->user_id = $user_id;
    }

    public function getTime_slot_id(){
        return $this->time_slot_id;
    }

    public function setTime_slot_id($time_slot_id){
        $this->time_slot_id = $time_slot_id;
    }

    public function getBooked_date(){
        return $this->booked_date;
    }

    public function setBooked_date($booked_date){
        $this->booked_date = $booked_date;
    }

}