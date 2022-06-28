<?php

function is_logged(){

    return isset($_SESSION['login']);

}

function get_login(){

    if (is_logged()){
        
        return $_SESSION['login'];

    }

    return $_POST['login'];

}

// function write_logs(){

//     $logs = "/log.txt";
//     file_put_contents($logs, "\n ".$date."\n ".$_SESSION['login']."\n l'utilisateur s'est connecté!", FILE_APPEND);

//     if (!is_logged()){

//         file_put_contents($logs, "\n ".$date."\n ".$_SESSION['login']."\n l'utilisateur s'est déconnecté!", FILE_APPEND);

//     }


// }

function dateJour(){

    $date = new dateTime();

    return $date->format("d-m-Y H:i:s");

}

function checkField(){

    if (isset($_POST['prenom']) && empty($_POST['prenom'])) {

        return 'prenom'; 

    } 
    else if (isset($_POST['nom']) && empty($_POST['nom'])) {

        return 'nom'; 

    } 
    else if (isset($_POST['login']) && empty($_POST['login'])) {

        return 'login'; 

    }
    else if (isset($_POST['passwd']) && empty($_POST['passwd'])) {

        return 'password'; 

    }
    else if (isset($_POST['passwd2']) && empty($_POST['passwd2'])) {

        return 'password2'; 
    
    }
    else if (isset($_POST['checkCap']) && empty($_POST['checkCap'])) {

        return 'Captcha vérif'; 
    
    }
    return false;

}

function checkPassword($passwd, $passwd2){

    if (isset($passwd) && isset($passwd2)){

        if (!empty($passwd) && !empty($passwd2)){

            if ($passwd == $passwd2){
    
                return true;
    
            }

        }
        
    }
    return false;

}

/*function checkPasswdLenght($passwd){

    $pattern = '/[A-Z][a-z][0-9]{8}/';

    if (preg_match_all($pattern, $passwd)){

        return true;

    }
    return false;

}*/

function captcha(){

    $nb_verif = random_int(0, 999);

    return $nb_verif;

}

function checkCaptcha($capToCheck, $RandCap){

    if ($capToCheck == $RandCap){

        return true;

    }
    return false;

}


