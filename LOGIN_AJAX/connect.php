<?php session_start(); 
require_once 'function.php';
require_once 'User.php';

switch ($_POST['request']){

    case 'connexion':

        $status = 1;
        $msg = "Connexion réussi!";
        $log_path = 'log.txt';
    
        if ($_POST['login'] != "a@g.c"){

            $status = 0;
            $msg = "Utilisateur incorrect!";
            file_put_contents($log_path, "\n ".dateJour()." ".get_login()." mauvaise saisie du login", FILE_APPEND);

        }

        else if ($_POST['password'] != "123"){

            $status = 0;
            $msg = "Mot de passe incorrect!";
            file_put_contents($log_path, "\n ".dateJour()." ".get_login()." mauvaise saisie du mot de passe!", FILE_APPEND);

        }

        if($status == 1){
            
            $_SESSION['login'] = $_POST['login'];
            file_put_contents($log_path, "\n ".dateJour()." ".get_login()." s'est connecté", FILE_APPEND);
        
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

    case 'user_login' :

        $html = "Vous n'êtes pas connecté ! ";

        if (is_logged()){

            $html = "Bienvenue ".get_login();

        }

        echo json_encode(array("html" => $html));

    break;

    case 'password' :

        $msg = "Les mots de passe ne correspondent pas!";

        if (checkPassword($_POST['password'], $_POST['password2'])){

            $msg = "OK!";

        }

        echo json_encode(array("msg" => $msg));

    break;

    case 'signIn' :

        $status = 1;
        $msg = "Création de votre compte réussi, Enjoy :D !";


        if (checkField()){

            $status = 0;
            $msg = "Au moins un champ n'a pas été rempli !";

        }

        echo json_encode(array("status" => $status, "msg" => $msg));

    break;  

    case 'captcha' :

        $get_captcha = captcha();

        echo json_encode(array('get_captcha' => $get_captcha));


    break;   
    
    default :

    echo json_encode(1);

    break;

}