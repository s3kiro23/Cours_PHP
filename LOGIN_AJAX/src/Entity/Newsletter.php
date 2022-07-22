<?php

require_once '../Controller/shared.php';
require_once 'Database.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

class Newsletter
{
    private $id;
    private $title;
    private $tab_user;
    private $content;

    public function __construct($id)
    {
        $this->id = 0;

        $GLOBALS['db']->beginTransaction();
        $query = $GLOBALS['db']->prepare('SELECT * FROM `newsletters` WHERE id=?');
        $query->execute([$id]);
        error_log('ObjectNews');

        if ($news = $query->fetch(PDO::FETCH_ASSOC)) {
            error_log('ObjectAlreadyExist');
            $this->id = $news['id'];
            $this->title = $news['title'];
            $this->tab_user = $news['tab_user'];
            $this->content = $news['content'];
        }
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getTab_user()
    {
        return json_decode($this->tab_user,true);
    }

    public function setTab_user($tab_user)
    {
        $this->tab_user = json_encode($tab_user);
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function addSub()
    {

        try {
            $query = $GLOBALS['db']->prepare('UPDATE `newsletters` SET tab_user=:tab_user WHERE id=:id');

            /*$query->bindValue(':tab_user', json_encode($this->tab_user));
            $query->bindValue(':id', $this->id);
            $query->execute();*/

            $query->execute(array(
                'tab_user' => json_encode($this->tab_user),
                'id' =>  $this->id,
            ));

            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
        }

    }

    static public function checkSubs()
    {

        $checkSubs = false;

        try {

            $query = $GLOBALS['db']->prepare('SELECT tab_user FROM `newsletters`');
            $query->execute();
            $checkSubs = $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
        }
        return $checkSubs;

    }

    static public function createNews($title, $tab_user, $content)
    {

        try {

            $GLOBALS['db']->beginTransaction();
            $query = $GLOBALS['db']->prepare('INSERT INTO newsletters (`title`, `tab_user`, `content`)
                VALUES (:title, :tab_user, :content)');

            $query->execute(array(
                'title' => $title,
                'tab_user' => json_encode($tab_user),
                'content' => $content,
            ));
            // $dbco->exec($sql);

            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
        }

        error_log($GLOBALS['db']->lastInsertId());
        return $GLOBALS['db']->lastInsertId();

    }


}