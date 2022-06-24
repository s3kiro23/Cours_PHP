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

    return $date->format("F j, Y, g:i a");

}

// function changeField(){

//     return checkData();

// }

// function checkData(){

//     if ($_POST['prenom'] == '' || $_POST['nom'] == '' || $_POST['login'] == '' || $_POST['passwd'] == '' || $_POST['passwd2'] == ''){

//         return false;

//     }

// }


