<?php
require_once 'function.php';
require_once 'Database.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

class Commands {

    private $c_id;
    private $title;
    private $label;
    private $date;
    private $user_id;

    public function __construct($c_id, $title, $label, $date, $user_id) {

        $this->c_id = $c_id;
        $this->title = $title;
        $this->label = $label;
        $this->date = $date;
        $this->user_id = $user_id;

    }

    public function getId(){
        return $this->c_id;
    }

    public function setId($c_id){
        $this->c_id = $c_id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getLabel(){
        return $this->label;
    }

    public function setLabel($label){
        $this->label = $label;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getUser_id(){
        return $this->user_id;
    }

    public function setUser_id($user_id){
        $this->user_id = $user_id;
    }

    public function createCmd(){

        try {

            $GLOBALS['db']->beginTransaction();

            $query = $GLOBALS['db']->prepare('INSERT INTO command (`title`, `label`, `date`, `user_id`)
                VALUES (:title, :label, :date, :user_id)');

            $query->execute(array(
                'title' => $this->title,
                'label' => $this->label,
                'date' => $this->date,
                'user_id' => $this->user_id,
            ));
            // $dbco->exec($sql);

            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }

    }

}