<?php

function is_logged(): bool
{

    return isset($_SESSION['id']);

}

function get_login(){

    if (is_logged()){
        
        return $_SESSION['id'];

    }

/*    return "toto";*/

}

// function write_logs(){

//     $logs = "/log.txt";
//     file_put_contents($logs, "\n ".$date."\n ".$_SESSION['login']."\n l'utilisateur s'est connecté!", FILE_APPEND);

//     if (!is_logged()){

//         file_put_contents($logs, "\n ".$date."\n ".$_SESSION['login']."\n l'utilisateur s'est déconnecté!", FILE_APPEND);

//     }


// }

function dateJour(): string
{

    $date = new dateTime();

    return $date->format("d-m-Y H:i:s");

}

function checkDateVSpwdExp(){

    $tomorrow = date("d-m-Y H:i:s", mktime(0, 0, 0, date("m")+1, date("d"), date("Y")));
    $currentDate = date("d-m-Y H:i:s");

    if ($tomorrow < $currentDate){
        echo "tomorrow < à currentdate";
    } else {
        echo "tomorrow > à currentdate";
    }

}

function checkField()
{

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

function checkPassword($passwd, $passwd2): bool
{

    if (isset($passwd) && isset($passwd2)){

        if (!empty($passwd) && !empty($passwd2)){

            if ($passwd == $passwd2){
    
                return true;
    
            }

        }
        
    }
    return false;

}

function checkPasswdLenght($passwd){

    $pattern = '/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,15}$/';

    if (preg_match_all($pattern, $passwd)){

        return true;

    }
    return false;

}

function captcha(): int
{
    return random_int(0, 999);
}

function checkCaptcha($capToCheck, $RandCap): bool
{

    if ($capToCheck == $RandCap){

        return true;

    }
    return false;

}


