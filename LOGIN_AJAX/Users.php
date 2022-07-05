<?php
require_once 'function.php';
require_once 'Database.php';

$db = new Database();
$GLOBALS['db'] = $db->checkDb();

class User {

    private $id;
    private $login;
    private $password;
    private $prenom;
    private $nom;
    private $pwdExp;

    public function __construct($id){

        $this->id = 0;

        $GLOBALS['db']->beginTransaction();
        $query = $GLOBALS['db']->prepare('SELECT * FROM `user` WHERE id=?');
        $query->execute([$id]);
/*        error_log('test');*/
        if ($user = $query->fetch(PDO::FETCH_ASSOC)) {
            error_log(json_encode($user));
            $this->id = $user['id'];
            $this->login = $user['login'];
            $this->password = password_hash($user['password'], PASSWORD_BCRYPT);
            $this->prenom = $user['prenom'];
            $this->nom = $user['nom'];
            $this->pwdExp = $user['pwdExp'];
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

    public function getPwdExp(){
        return $this->pwdExp;
    }

    public function setPwdExp($pwdExp){
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

	public function getNom()
    {
		return $this->nom;
	}

	public function setNom($nom)
    {
		$this->nom = $nom;
	}

	static public function create($login, $nom, $prenom, $password, $pwdExp)
    {

        try {

            $preparedSql = $GLOBALS['db']->prepare('INSERT INTO user (`login`, `nom`, `prenom`, `password`, `pwdExp`)
                VALUES (:login, :nom, :prenom, :password, :pwdExp)');

            $preparedSql->execute(array(
                'login' => $login,
                'nom' => $nom,
                'prenom' => $prenom,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'pwdExp' => $pwdExp
            ));
            // $dbco->exec($sql);

            $GLOBALS['db']->commit();

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }
	}

    public function update()
    {

        try {
            $query = $GLOBALS['db']->prepare('UPDATE `user` SET nom=:nom, prenom=:prenom, login=:login, password=:password WHERE id=:id');

            $query->bindValue(':id', $this->id);
            $query->bindValue(':nom', $this->nom);
            $query->bindValue(':prenom', $this->prenom);
            $query->bindValue(':login', $this->login);
            $query->bindValue(':password', $this->password);
            $query->execute();
            $GLOBALS['db']->commit();
            error_log('updateOK');

        } catch (PDOException $e) {
            // echo "Erreur : ".$e->getMessage();
        }

    }

    public function delete(){
        error_log('deleteFct');
        $query = $GLOBALS['db']->prepare('DELETE FROM `user` WHERE id=:id');
        $query->bindValue(':id', $_SESSION['id']);
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

}