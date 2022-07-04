<?php session_start();
require_once 'function.php';
require_once 'Users.php';
require_once 'Database.php';


$db = new Database();
$GLOBALS['db'] = $db->checkDb();

switch ($_POST['request']){

    case 'connexion':

        $status = 1;
        $msg = "Connexion réussi!";
        $log_path = 'log.txt';

        try {

            $user = User::checkUser($_POST['login']);
/*            error_log(json_encode($user));*/
/*            print_r($user);*/
/*            error_log(json_encode($user));*/
            if ($user && password_verify($_POST['password'], $user['password'])){
/*            if ($user){*/
                $_SESSION['id'] = $user['id'];
                file_put_contents($log_path, "\n ".dateJour()." ".get_login()." s'est connecté", FILE_APPEND);

            } else {
                $status = 0;
                $msg = "Mauvais login ou mot de passe!";
            }

        } catch (PDOException $e) {
            $status = 0;
            $msg = "Erreur : ".$e->getMessage();
        }

        echo json_encode(array("status" => $status, "msg" => $msg));

    break;  

    case 'logout':

        $status = 1;
        $msg = "Déconnexion réussi!";
        $log_path = 'log.txt';

        file_put_contents($log_path, "\n ".dateJour()." ".get_login()." s'est déconnecté", FILE_APPEND);
        session_destroy();
        unset($_SESSION);

        echo json_encode(array("status" => $status, "msg" => $msg));

    break;
    
    case 'to_signIn' :
        
        $msg = "Redirection vers la page d'inscription en cours!";
        
        echo json_encode(array("msg" => $msg));

    break;
    
    case 'to_logIn' :
        
        $msg = "Redirection vers la page de connexion en cours!";
        
        echo json_encode(array("msg" => $msg));

    break;

    case 'to_home' :

        $msg = "Redirection vers la page Home!";

        echo json_encode(array("msg" => $msg));

    break;

    case 'to_profil' :

        $msg = "Redirection vers la page de profil!";

        echo json_encode(array("msg" => $msg));

    break;

    case 'signIn' :

        $status = 1;
        $msg = "Création de votre compte réussi, Enjoy :D !";

        if (checkField()){

            $status = 0;
            $msg = "Le champ ".checkField()." est vide !";

        }

        else if (!checkPassword($_POST['passwd'], $_POST['passwd2'])){

            $status = 0;
            $msg = "Les mots de passe ne correspondent pas!";

        }
        else if (!checkCaptcha($_POST['checkCap'], $_POST['captcha'])){

            $status = 0;
            $msg = "Les captcha ne correspondent pas!";

        }

        else if (User::checkUser($_POST['login'])){
            $status = 0;
            $msg = "Le login existe déjà!";
        }


    /*    else if (!checkPasswdLenght($_POST['passwd'])){

            $status = 0;
            $msg = "Condition de création du mot de passe non remplies!";

        }*/

        if ($status == 1){

            User::create($_POST['login'], $_POST['passwd'], $_POST['prenom'], $_POST['nom']);
            $query = $GLOBALS['db']->prepare('SELECT * FROM `user` WHERE login=?');
            $query->execute([$_POST['login']]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
            /*$user = new User(0);

            $user->setLogin($_POST['login']);
            $user->setPassword($_POST['passwd']);
            $user->setPrenom($_POST['prenom']);
            $user->setNom($_POST['nom']);
            $user->generate();*/

            $_SESSION['id'] = $user['id'];

            $log_path = 'log.txt';
            file_put_contents($log_path, "\n ".dateJour()." ".get_login()." a créé un nouveau compte.", FILE_APPEND);

        }

        echo json_encode(array("status" => $status, "msg" => $msg));
                
    break;  

    case 'user_login' :

        $login = "Vous n'êtes pas connecté ! ";
        $user = false;
/*        error_log($_SESSION['id']);*/
        if (is_logged()){
/*            error_log($_SESSION['id']);*/
            $user = new User($_SESSION['id']);

        }
/*        error_log(json_encode($user));*/
        if(!$user){
            echo json_encode(1);

        }else{
            echo json_encode(array("login" => $user->getLogin(), "nom" => $user->getNom(), "prenom" => $user->getPrenom(), "password" => $user->getPassword()));
        }


    break;

    case 'modify' :
        error_log('query_mod');
        $status = 0;
        $msg = 'Login avec un @ obligatoire!';
        $user = new User($_SESSION['id']);

        if (isset($_POST['type_value']) && !empty($_POST['type_value']) &&  $_POST['type_value'] == 'Nom'){

            $user->setNom($_POST['value']);

        }
        else if (isset($_POST['type_value']) &&  !empty($_POST['type_value']) &&  $_POST['type_value'] == 'Prenom'){

            $user->setPrenom($_POST['value']);

        }
        else if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Login'){
            if (strstr($_POST['value'], '@')) {
                $user->setLogin($_POST['value']);
                $status = 1;
            }
        }

        else if (isset($_POST['type_value']) && !empty($_POST['type_value']) && $_POST['type_value'] == 'Password'){

            $user->setPassword($_POST['value']);

        }

        $user->update();

    echo json_encode(array("status" => $status, "msg" => $msg));

    break;

    case 'deleteAccount' :
        $msg = "";

        if (isset($_SESSION['id']) & !empty($_SESSION['id'])){

            $user = new User($_SESSION['id']);
            $user ->delete();

            $msg = 'test';
/*            $GLOBALS['db']->beginTransaction();
            $query = $GLOBALS['db']->prepare('DELETE FROM `user` WHERE login=:login');
            $query->bindValue(':login', $_SESSION['login']);
            $query->execute();
            $GLOBALS['db']->commit();*/

        }

        echo json_encode(array('msg' => $msg));

    break;

    case 'captcha' :

        $get_captcha = captcha();

        echo json_encode(array('get_captcha' => $get_captcha));

    break;   
    
    default :

    echo json_encode(1);

    break;

}