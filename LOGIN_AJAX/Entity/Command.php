<?php
require_once '../Entity/function.php';
require_once '../Entity/Database.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

class Command {

    private $id;
    private $title;
    private $label;
    private $date;
    private $user_id;

    public function __construct($id) {

        $GLOBALS['db']->beginTransaction();
        $query = $GLOBALS['db']->prepare('SELECT * FROM `command` WHERE id=?');
        $query->execute([$id]);
        error_log('ObjectCMD');

        if ($cmd = $query->fetch(PDO::FETCH_ASSOC)) {
            error_log('ObjectAlreadyExist');
            $this->id = $cmd['id'];
            $this->title = $cmd['title'];
            $this->label = $cmd['label'];
            $this->date = $cmd['date'];
            $this->user_id = $cmd['user_id'];
        }

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

    public function getUser_id(){
        return $this->user_id;
    }

    public function setUser_id($user_id){
        $this->user_id = $user_id;
    }

    static public function createCmd($title, $label, $user_id){

        try {

            $query = $GLOBALS['db']->prepare('INSERT INTO command (`title`, `label`, `user_id`)
                VALUES (:title, :label, :user_id)');

            $query->execute(array(
                'title' => $title,
                'label' => $label,
                'user_id' => $user_id,
            ));
            // $dbco->exec($sql);

            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }

        return $GLOBALS['db']->lastInsertId();

    }

    static public function checkCurrentCmd($id)
    {
        $cmdCheck = false;
        try {

            $query = $GLOBALS['db']->prepare('SELECT * FROM `command` WHERE id=?');
            $query->execute([($id)]);
            $cmdCheck = $query->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            /*            $msg = "Erreur : ".$e->getMessage();*/
        }
        return $cmdCheck;

    }

    static public function checkAllCmd()
    {
        $AllCmdCheck = false;
        try {

            $query = $GLOBALS['db']->prepare('SELECT * FROM `command`');
            $query->execute();
            $AllCmdCheck = $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            /*            $msg = "Erreur : ".$e->getMessage();*/
        }
        return $AllCmdCheck;

    }



}