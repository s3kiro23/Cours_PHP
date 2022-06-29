<?php session_start(); 
require_once 'function.php';
require_once 'Users.php';
// require_once 'dbConnect.php';
// $db = new Database();
// $GLOBAL['db'] = $db->checkDB();

switch ($_POST['request']){

    case 'connexion':

        $status = 1;
        $msg = "Connexion réussi!";
        $log_path = 'log.txt';

        try {

            $dbco = new PDO("mysql:host=localhost;dbname=user_aflokkat", 'root', '');
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $dbco->beginTransaction();

            $query = $dbco->prepare('SELECT id, login, password FROM user WHERE login=?');
            $query->execute([$_POST['login']]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
/*            print_r($user);*/

            if ($user && password_verify($_POST['password'], $user['password'])){
/*            if ($user){*/
                $_SESSION['login'] = $_POST['login'];
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

            $user = new User($_POST['login'], $_POST['passwd'], $_POST['prenom'], $_POST['nom']);
            $user->create();
            $_SESSION['login'] = $_POST['login'];

            $log_path = 'log.txt';
            file_put_contents($log_path, "\n ".dateJour()." ".get_login()." a créé un nouveau compte.", FILE_APPEND);

        }

        echo json_encode(array("status" => $status, "msg" => $msg));
                
    break;  

    case 'user_login' :

        $login = "Vous n'êtes pas connecté ! ";

        if (is_logged()){

            try {

                $dbco = new PDO("mysql:host=localhost;dbname=user_aflokkat", 'root', '');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $dbco->beginTransaction();

                $query = $dbco->prepare('SELECT id, nom, prenom, password FROM user WHERE login=?');
                $query->execute([get_login()]);
                $user = $query->fetch(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                $status = 0;
                $msg = "Erreur : ".$e->getMessage();
            }

        }

        echo json_encode(array("login" => get_login(), "nom" => $user['nom'], "prenom" => $user['prenom'], "password" => $user['password']));

    break;
                
    case 'captcha' :

        $get_captcha = captcha();

        echo json_encode(array('get_captcha' => $get_captcha));

    break;   
    
    default :

    echo json_encode(1);

    break;

}