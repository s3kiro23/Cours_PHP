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

    if (empty($_POST['prenom'])) {

        return true; 

    } 
    else if (empty($_POST['nom'])) {

        return true; 

    } 
    else if (empty($_POST['login'])) {

        return true; 

    }
    else if (empty($_POST['password'])) {

        return true; 

    }
    else if (empty($_POST['password2'])) {

        return true; 
    
    }
    return false;

}

function checkPassword($passwd, $passwd2){

    if (isset($passwd) && isset($passwd2)){
        
        if ($passwd == $passwd2){

            return true;

        }

    }

}

function checkPasswdLenght($passwd){

    $pattern = '/[A-Z][a-z][0-9]{8}/';

    if (preg_match_all($pattern, $passwd)){

        return true;

    }
    return false;

}

function captcha(){

    $nb_verif = random_int(0, 999);

    return $nb_verif;

}

function checkCaptcha($postCap){

    if ($postCap == captcha()){

        return true;

    }
    return false;

}


