<?php session_start(); 
require_once 'function.php';

switch ($_POST['request']){

    case 'connexion':

        $status = 1;
        $msg = "Connexion réussi!";
        $logs = 'log.txt';
    
        if ($_POST['login'] != "a@g.c"){

            $status = 0;
            $msg = "Utilisateur incorrect!";
            file_put_contents($logs, "\n ".dateJour()." ".get_login()." mauvaise saisie du login", FILE_APPEND);

        }

        else if ($_POST['password'] != "123"){

            $status = 0;
            $msg = "Mot de passe incorrect!";
            file_put_contents($logs, "\n ".dateJour()." ".get_login()." mauvaise saisie du mot de passe!", FILE_APPEND);

        }

        if($status == 1){
            
            $_SESSION['login'] = $_POST['login'];
            file_put_contents($logs, "\n ".dateJour()." ".get_login()." l'utilisateur s'est connecté!", FILE_APPEND);
        
        }

        echo json_encode(array("status" => $status, "msg" => $msg));


    break;  

    case 'logout':

        $status = 1;
        $msg = "Déconnexion réussi!";

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

    default :

    echo json_encode(1);

    break;

}