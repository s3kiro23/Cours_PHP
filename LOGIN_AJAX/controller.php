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

    /*    else if (!checkPasswdLenght($_POST['passwd'])){

            $status = 0;
            $msg = "Condition de création du mot de passe non remplies!";

        }*/

        if ($status == 1){

            User::create($_POST['login'], $_POST['passwd'], $_POST['prenom'], $_POST['nom']);
            /*$user = new User(0);

            $user->setLogin($_POST['login']);
            $user->setPassword($_POST['passwd']);
            $user->setPrenom($_POST['prenom']);
            $user->setNom($_POST['nom']);
            $user->generate();*/

            $_SESSION['login'] = $_POST['login'];

            $log_path = 'log.txt';
            file_put_contents($log_path, "\n ".dateJour()." ".get_login()." a créé un nouveau compte.", FILE_APPEND);

        }

        echo json_encode(array("status" => $status, "msg" => $msg));
                
    break;  

    case 'user_login' :

        $user = "Vous n'êtes pas connecté ! ";

        if (is_logged()){

            $user = User::checkUser($_SESSION['id']);

        }

        echo json_encode(array("login" => get_login(), "nom" => $user['nom'], "prenom" => $user['prenom'], "password" => $user['password']));

    break;

    case 'modify' :

        $msg = 'Echec modification!';

        if (!empty($_POST['fieldName'])){

           $msg = 'Modif réussi!';

        }

    echo json_encode(array("msg" => $msg));

    break;

    case 'deleteAccount' :
        $msg = "";

        if (isset($_SESSION['login']) & !empty($_SESSION['login'])){

            $user = new User($_SESSION['login']);
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