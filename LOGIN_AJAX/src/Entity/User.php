<?php
require_once '../Controller/shared.php';
require_once '../Entity/Database.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

class User
{

    private $id;
    private $login;
    private $password;
    private $prenom;
    private $nom;
    private $type;
    private $pwdExp;
    private $created_date;

    public function __construct($id)
    {

        $this->id = 0;

        /*        $GLOBALS['db']->beginTransaction();*/
        $query = $GLOBALS['db']->prepare('SELECT * FROM `user` WHERE id=?');
        $query->execute([$id]);
        /*        error_log('test');*/
        if ($user = $query->fetch(PDO::FETCH_ASSOC)) {
            $this->id = $user['id'];
            $this->login = $user['login'];
            $this->password = password_hash($user['password'], PASSWORD_BCRYPT);
            $this->prenom = $user['prenom'];
            $this->nom = $user['nom'];
            $this->type = $user['type'];
            $this->pwdExp = $user['pwdExp'];
            $this->created_date = $user['created_date'];
        }
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPwdExp()
    {
        return $this->pwdExp;
    }

    public function setPwdExp($pwdExp)
    {
        $this->pwdExp = $pwdExp;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    static public function create($login, $nom, $prenom, $type, $password, $pwdExp, $created_date, $hash)
    {

        try {

            $preparedSql = $GLOBALS['db']->prepare('INSERT INTO user (`login`, `nom`, `prenom`, `type`, `password`, `pwdExp`, `created_date`, `hash`)
                VALUES (:login, :nom, :prenom, :type, :password, :pwdExp, :created_date, :hash)');

            $preparedSql->execute(array(
                'login' => $login,
                'nom' => $nom,
                'prenom' => $prenom,
                'type' => $type,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'pwdExp' => $pwdExp,
                'created_date' => $created_date,
                'hash' => $hash
            ));
            // $dbco->exec($sql);

            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }
    }

    static public function random_hash()
    {

        $longueur = 30;
        $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!%@$#?';
        $chaine = '';
        $max = mb_strlen($listeCar, '8bit') - 1;
        for ($i = 0; $i < $longueur; ++$i) {
            $chaine .= $listeCar[random_int(0, $max)];
        }
        return $chaine;
    }

    public function update()
    {

        try {
            $query = $GLOBALS['db']->prepare('UPDATE `user` SET nom=:nom, prenom=:prenom, login=:login, password=:password, pwdExp=:pwdExp WHERE id=:id');

            $query->bindValue(':id', $this->id);
            $query->bindValue(':nom', $this->nom);
            $query->bindValue(':prenom', $this->prenom);
            $query->bindValue(':login', $this->login);
            $query->bindValue(':password', $this->password);
            $query->bindValue(':pwdExp', $this->pwdExp);
            $query->execute();
            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }

    }

    public function checkUploadedFiles()
    {
        $filesChecked = "";

        try {
            $query = $GLOBALS['db']->prepare('SELECT * FROM `upload` WHERE user_id = :user_id');
            $query->execute(array(
                'user_id' => $this->id,
            ));
            $filesChecked = $query->fetchAll(PDO::FETCH_ASSOC);
/*            error_log(json_encode($filesChecked));*/

        } catch (PDOException $e) {
            error_log("Erreur : " . $e->getMessage());
        }

        return $filesChecked;
    }

    public function delete($ID)
    {
        error_log('deleteFct');
        $GLOBALS['db']->beginTransaction();
        $query = $GLOBALS['db']->prepare('DELETE FROM `user` WHERE id=:id');
        $query->bindValue(':id', $ID);
        $query->execute();
        $GLOBALS['db']->commit();

    }

    /*    public function generate(){
            try {

                $GLOBALS['db']->beginTransaction();

                $preparedSql = $GLOBALS['db']->prepare('INSERT INTO user (`login`, `nom`, `prenom`, `password`)
                    VALUES (:login, :nom, :prenom, :password)');

                $preparedSql->execute(array(
                    'login' => $this->login,
                    'nom' => $this->nom,
                    'prenom' => $this->prenom,
                    'password' => $this->password,
                ));
                error_log(json_encode(array('login' => $this->login, 'nom' => $this->nom, 'prenom' => $this->prenom, 'password' => $this->password)));
                // $dbco->exec($sql);

                $GLOBALS['db']->commit();

            } catch (PDOException $e) {
                // echo "Erreur : ".$e->getMessage();
            }

        }*/

    static public function checkUser($login)
    {
        $userCheck = false;
        try {

            $GLOBALS['db']->beginTransaction();
            $query = $GLOBALS['db']->prepare('SELECT * FROM `user` WHERE login=?');
            $query->execute([$login]);
            $userCheck = $query->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            /*            $msg = "Erreur : ".$e->getMessage();*/
        }
        return $userCheck;

    }

    static public function sms($user_id)
    {

        $code = random_int(1000, 10000);
        $GLOBALS['db']->beginTransaction();
        $query = $GLOBALS['db']->prepare('INSERT INTO log_sms (`user_id`, `code`)
                VALUES (:user_id, :code)');

        $query->execute(array(
            'user_id' => $user_id,
            'code' => $code,
        ));

        $GLOBALS['db']->commit();

    }

    static public function checkSmsCode($user_id, $input)
    {
        $smsCheck = false;

        try {
            $query = $GLOBALS['db']->prepare('SELECT * FROM `log_sms` WHERE user_id=? AND code=? AND state="0"');
            $query->execute([$user_id, $input]);
            $smsCheck = $query->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            /*            $msg = "Erreur : ".$e->getMessage();*/
        }
        return $smsCheck;

    }

    static public function updateSMS($user_id)
    {
        try {
            $query = $GLOBALS['db']->prepare('UPDATE `log_sms` SET state=:state WHERE user_id=:user_id');
            $query->bindValue(':state', 1);
            $query->bindValue(':user_id', $user_id);
            $query->execute();
            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }

    }

    static public function request($user_id)
    {

        $hash = random_hash();

        $query = $GLOBALS['db']->prepare('INSERT INTO request (`user_id`, `hash`)
                VALUES (:user_id, :hash)');

        $query->execute(array(
            'user_id' => $user_id,
            'hash' => $hash,
        ));

        $GLOBALS['db']->commit();

        return $hash;

    }

    static public function checkRequest($hash)
    {
        $requestCheck = false;

        try {
            $query = $GLOBALS['db']->prepare('SELECT * FROM `request` WHERE hash=? AND state="0"');
            $query->execute([$hash]);
            $requestCheck = $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            /*            $msg = "Erreur : ".$e->getMessage();*/
        }
        return $requestCheck;

    }

    static public function updateRequest($user_id)
    {
        try {
            $query = $GLOBALS['db']->prepare('UPDATE `request` SET state=:state WHERE user_id=:user_id');
            $query->bindValue(':state', 1);
            $query->bindValue(':user_id', $user_id);
            /*            $query->bindValue(':hash', $hash);*/
            $query->execute();
            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }

    }


}