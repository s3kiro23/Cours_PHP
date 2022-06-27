<?php session_start(); 
require_once 'function.php';
require_once 'Users.php';

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

    
    case 'to_signIn' :
        
        $msg = "Redirection vers la page d'inscription en cours!";
        
        echo json_encode(array("msg" => $msg));

    break;
    
    case 'to_logIn' :
        
        $msg = "Redirection vers la page de connexion en cours!";
        
        echo json_encode(array("msg" => $msg));

    break;
        
    case 'signIn' :
        
    $user = '';
    $status = 1;
    $msg = "Création de votre compte réussi, Enjoy :D !";
    
    if (checkField()){

        $status = 0;
        $msg = "Le champ ".checkField()." est vide !";

        if (checkPassword($_POST['passwd'], $_POST['passwd2']) && checkPasswdLenght($_POST['passwd']) && checkCaptcha($_POST['checkCap'])){

            $status = 1;
            $msg = "Création de votre compte réussi, Enjoy :D !";
            
        }
        if (!checkPassword($_POST['passwd'], $_POST['passwd2'])){
            
            $status = 0;
            $msg = "Les mots de passe ne correspondent pas!";
            
        }
    }
    
    if ($status == 1){
        
        $log_path = 'log.txt';
        
        $user = new User($_POST['login'], $_POST['passwd'], $_POST['prenom'], $_POST['nom']);
        $_SESSION['nom'] = $user->getNom();
        $_SESSION['prenom'] = $user->getPrenom();
        $_SESSION['login'] = $user->getLogin();
        $_SESSION['passwd'] = $user->getPassword();
        file_put_contents($log_path, "\n ".dateJour()." ".get_login()." a créé un nouveau compte.", FILE_APPEND);
        
    }
    
    // if (checkCaptcha()){
        
        //     $status = 0;
        //     $msg = "Captcha erroné.";
        
        // }
        
        
        // if (!checkPasswdLenght($_POST['passwd'])){
            
            //     $status = 0;
            //     $msg = "Condition de création du mot de passe non remplies.";
            
            // }
                
    echo json_encode(array("status" => $status, "msg" => $msg, "user" => $user));
                
    break;  

    case 'user_login' :

        $login = "Vous n'êtes pas connecté ! ";

        if (is_logged()){

            $login = get_login();
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $password = $_SESSION['passwd'];

        }

        echo json_encode(array("login" => $login, "nom" => $nom, "prenom" => $prenom, "password" => $password));

    break;
                
    case 'captcha' :

        $get_captcha = captcha();

        echo json_encode(array('get_captcha' => $get_captcha));

    break;   
    
    default :

    echo json_encode(1);

    break;

}