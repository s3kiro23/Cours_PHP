<?php

function is_logged(): bool
{

    return decrypt($_SESSION['id']);

}

function get_login()
{

    if (is_logged()) {

        return decrypt($_SESSION['id']);

    }

    return false;
}

function write_logs($login, $state)
{

    $dateJour = date("d-m-Y H:i:s");

    if ($state == 1) {

        file_put_contents("../Logs/login_logout.txt", "\n " . $dateJour . " " . $login . " s'est connecté!", FILE_APPEND);

    } elseif ($state == 2) {

        file_put_contents("../Logs/login_logout.txt", "\n " . $dateJour . " " . $login . " s'est déconnecté!", FILE_APPEND);

    } elseif ($state == 3) {

        file_put_contents("../Logs/recovery.txt", "\n " . $dateJour . " " . $login . " a récupéré son compte suite à une RAZ du pwd!", FILE_APPEND);

    } elseif ($state == 4) {

        file_put_contents("../Logs/login_logout.txt", "\n " . $dateJour . " l'utilisateur avec l'ID " . $login . " a supprimé son compte!", FILE_APPEND);

    } elseif ($state == 5) {

        file_put_contents("../Logs/newCommand.txt", "\n " . $dateJour . " " . $login . " a créé une nouvelle commande!", FILE_APPEND);

    }


    /*    if (!is_logged()) {

            file_put_contents($logs, "\n " . $date . "\n " . $_SESSION['login'] . "\n l'utilisateur s'est déconnecté!", FILE_APPEND);

        }*/


}

function dateJour(): string
{

    $date = new dateTime();

    return $date->format("d-m-Y H:i:s");

}

function checkDateVSpwdExp()
{

    $tomorrow = date("d-m-Y H:i:s", mktime(0, 0, 0, date("m") + 1, date("d"), date("Y")));
    $currentDate = date("d-m-Y H:i:s");

    if ($tomorrow < $currentDate) {
        echo "tomorrow < à currentdate";
    } else {
        echo "tomorrow > à currentdate";
    }

}

function checkField()
{

    if (isset($_POST['prenom']) && empty($_POST['prenom'])) {

        return 'prenom';

    } else if (isset($_POST['nom']) && empty($_POST['nom'])) {

        return 'nom';

    } else if (isset($_POST['login']) && empty($_POST['login'])) {

        return 'login';

    } else if (isset($_POST['passwd']) && empty($_POST['passwd'])) {

        return 'password';

    } else if (isset($_POST['passwd2']) && empty($_POST['passwd2'])) {

        return 'password2';

    } else if (isset($_POST['checkCap']) && empty($_POST['checkCap'])) {

        return 'Captcha vérif';

    }
    return false;

}

function checkPassword($passwd, $passwd2): bool
{

    if (isset($passwd) && isset($passwd2)) {

        if (!empty($passwd) && !empty($passwd2)) {

            if ($passwd == $passwd2) {

                return true;

            }

        }

    }
    return false;

}

function checkPasswdLenght($passwd)
{

    $pattern = '/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,15}$/';

    if (preg_match_all($pattern, $passwd)) {

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

    if ($capToCheck == $RandCap) {

        return true;

    }
    return false;

}

function encrypt($data)
{
    $key = base64_decode("H2F:Dm94S|b+&3fE6=epazezaAZEzea@!");
    $encryption_key = base64_decode($key);
    $initVector = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $initVector);
    return base64_encode($encrypted . '::' . $initVector);
}

function decrypt($data)
{
    $key = base64_decode("H2F:Dm94S|b+&3fE6=epazezaAZEzea@!");
    $encryption_key = base64_decode($key);
    list($encrypted_data, $initVector) = explode('::', base64_decode($data), 2);
    $result = openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $initVector);
    return $result;
}

function random_hash()
{

    $longueur = 30;
    $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!%@$?';
    $chaine = '';
    $max = mb_strlen($listeCar, '8bit') - 1;
    for ($i = 0; $i < $longueur; ++$i) {
        $chaine .= $listeCar[random_int(0, $max)];
    }
    return $chaine;
}



