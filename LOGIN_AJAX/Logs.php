<?php
require_once 'function.php';
require_once 'Database.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

class Log
{
    private $user_id;
    private $try;

    public function __construct($user_id, $try)
    {
        $this->user_id = $user_id;
        $this->try = $try;
        error_log('ObjectLog');
    }

    static public function create($user_id, $try)
    {
        error_log('createLog');

        try {

            $preparedSql2 = $GLOBALS['db']->prepare('INSERT INTO log (`user_id`, `try`)
                VALUES (:user_id, :try)');
            error_log('prepLog');

            $preparedSql2->execute(array(
                'user_id' => $user_id,
                'try' => $try,
            ));
            error_log('prepLogOK');

            // $dbco->exec($sql);

            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }
    }

    public function update()
    {

        try {
            $query = $GLOBALS['db']->prepare('UPDATE `user` SET user_id=:user_id, try=:try WHERE log_id=:log_id');

            $query->bindValue(':user_id', $this->user_id);
            $query->bindValue(':try', $this->try);
            $query->execute();
            $GLOBALS['db']->commit();
            error_log('updateOK');

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }

    }

    public function getUser_id(){
        return $this->user_id;
    }

    public function setUser_id($user_id){
        $this->user_id = $user_id;
    }

    public function getTry(){
        return $this->try;
    }

    public function setTry($try){
        $this->try = $try;
    }


}