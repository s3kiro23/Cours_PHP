<?php
require_once 'function.php';
require_once 'Database.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

class Log
{
    private $user_id;
    private $date;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
/*        $this->date = $date;*/
        error_log('ObjectLog');
    }

    static public function create($user_id, $date)
    {
        error_log('createLog');

        try {

            $preparedSql2 = $GLOBALS['db']->prepare('INSERT INTO log (`user_id`, `date`)
                VALUES (:user_id, :date)');
            error_log('prepLog');

            $preparedSql2->execute(array(
                'user_id' => $user_id,
                'date' => $date,
            ));
            error_log('prepLogOK');

            // $dbco->exec($sql);

            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }
    }

    static public function checkLog($user_id)
    {
        $LogCheck = false;
        try {

/*            $GLOBALS['db']->beginTransaction();*/
            $query = $GLOBALS['db']->prepare('SELECT * FROM `log` WHERE user_id=?');
            $query->execute([$user_id]);
            $LogCheck = $query->rowCount();

        } catch (PDOException $e) {
            /*            $msg = "Erreur : ".$e->getMessage();*/
        }
        return $LogCheck;

    }

    /*    public function update()
        {

            try {
                $query = $GLOBALS['db']->prepare('UPDATE `user` SET user_id=:user_id, try=:try WHERE log_id=:log_id');

                $query->bindValue(':user_id', $this->user_id);
                $query->bindValue(':date', $this->date);
                $query->execute();
                $GLOBALS['db']->commit();
                error_log('updateOK');

            } catch (PDOException $e) {
                // echo "Erreur : ".$e->getMessage();
            }

        }*/

    public function getUser_id(){
        return $this->user_id;
    }

    public function setUser_id($user_id){
        $this->user_id = $user_id;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }


}